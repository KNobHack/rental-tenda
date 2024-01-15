<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\Keranjang;
use App\Models\Paket;
use App\Models\Rental;
use App\Models\Tenda;
use App\Models\Transaksi;
use DateTime;
use Illuminate\Http\Request;

class KeranjangController extends Controller
{
    public function index()
    {
        $this->keranjangInit();

        $keranjang = auth()->user()->penyewa->keranjang;

        $hasil_hitung = $this->hitungKeranjang($keranjang);
        $subtotal    = $hasil_hitung['subtotal'];
        $subdenda    = $hasil_hitung['subdenda'];
        $lama_rental = $hasil_hitung['lama_rental'];
        $total       = $hasil_hitung['total'];

        return view('home.keranjang', [
            'keranjang' => $keranjang,
            'paket' => $keranjang->paket,
            'tenda' => $keranjang->tenda,
            'barang' => $keranjang->barang,
            'subtotal' => $subtotal,
            'lama_rental' => $lama_rental,
            'total' => $total,
            'subdenda' => $subdenda,
        ]);
    }

    public function setTanggal(Request $request)
    {
        $tanggal = explode('-', $request->post('tanggal'));

        $keranjang = auth()->user()->penyewa->keranjang;
        $keranjang->tgl_rental = date('Y-m-d', strtotime(str_replace('/', '-', trim($tanggal[0]))));
        $keranjang->tgl_kembali = date('Y-m-d', strtotime(str_replace('/', '-', trim($tanggal[1]))));
        $keranjang->save();

        return redirect()->route('keranjang');
    }

    public function tambahPaket(Request $request, Paket $paket)
    {
        $this->keranjangInit();

        auth()->user()->penyewa->keranjang->paket()->sync([
            $paket->id => ['jumlah' => $request->post('jumlah') ?? 1],
        ]);

        return redirect()->route('keranjang');
    }

    public function tambahTenda(Request $request, Tenda $tenda)
    {
        $this->keranjangInit();

        auth()->user()->penyewa->keranjang->tenda()->sync([
            $tenda->id => ['jumlah' => $request->post('jumlah') ?? 1],
        ]);

        return redirect()->route('keranjang');
    }

    public function tambahBarang(Request $request, Barang $barang)
    {
        $this->keranjangInit();

        auth()->user()->penyewa->keranjang->barang()->sync([
            $barang->id => ['jumlah' => $request->post('jumlah') ?? 1],
        ]);

        return redirect()->route('keranjang');
    }

    public function hapusPaket(Paket $paket)
    {
        auth()->user()->penyewa->keranjang->paket()->detach($paket->id);
        return redirect()->route('keranjang');
    }

    public function hapusTenda(Tenda $tenda)
    {
        auth()->user()->penyewa->keranjang->tenda()->detach($tenda->id);
        return redirect()->route('keranjang');
    }

    public function hapusBarang(Barang $barang)
    {
        auth()->user()->penyewa->keranjang->barang()->detach($barang->id);
        return redirect()->route('keranjang');
    }

    private function keranjangInit()
    {
        if (auth()->user()->penyewa->keranjang == null) {
            $keranjang = new Keranjang();
            $keranjang->penyewa_id = auth()->user()->penyewa->id;
            $keranjang->tgl_rental = now()->format('Y-m-d');
            $keranjang->tgl_kembali = now()->format('Y-m-d');

            auth()->user()->penyewa->keranjang = $keranjang;
            auth()->user()->penyewa->keranjang->save();
        }
    }

    public function checkoutPreview()
    {
        $this->keranjangInit();

        $penyewa = auth()->user()->penyewa;
        $keranjang = $penyewa->keranjang;

        $hasil_hitung = $this->hitungKeranjang($keranjang);
        $subtotal    = $hasil_hitung['subtotal'];
        $subdenda    = $hasil_hitung['subdenda'];
        $lama_rental = $hasil_hitung['lama_rental'];
        $total       = $hasil_hitung['total'];

        return view('home.checkout', [
            'penyewa' => $penyewa,
            'keranjang' => $keranjang,
            'paket' => $keranjang->paket,
            'tenda' => $keranjang->tenda,
            'barang' => $keranjang->barang,
            'subtotal' => $subtotal,
            'lama_rental' => $lama_rental,
            'total' => $total,
            'subdenda' => $subdenda,
        ]);
    }

    public function checkout()
    {
        $keranjang = auth()->user()->penyewa->keranjang;

        if ($keranjang == null) {
            return redirect()->route('keranjang');
        }

        $hasil_hitung = $this->hitungKeranjang($keranjang);
        $subdenda    = $hasil_hitung['subdenda'];
        $total       = $hasil_hitung['total'];

        $rental = new Rental();
        $rental->penyewa_id = auth()->user()->penyewa->id;
        $rental->tgl_rental = $keranjang->tgl_rental;
        $rental->tgl_kembali = $keranjang->tgl_kembali;
        $rental->save();

        $paket_attach = [];
        foreach ($keranjang->paket as $pkt) {
            $paket_attach[$pkt->id] = ['jumlah' => $pkt->keranjang_paket->jumlah];
        }
        $rental->paket()->attach($paket_attach);

        $tenda_attach = [];
        foreach ($keranjang->tenda as $td) {
            $tenda_attach[$td->id] = ['jumlah' => $td->keranjang_tenda->jumlah];
        }
        $rental->tenda()->attach($tenda_attach);

        $barang_attach = [];
        foreach ($keranjang->barang as $br) {
            $barang_attach[$br->id] = ['jumlah' => $br->keranjang_barang->jumlah];
        }
        $rental->barang()->attach($barang_attach);

        $transaksi = new Transaksi();
        $transaksi->rental_id = $rental->id;
        $transaksi->harga = $total;
        $transaksi->denda = $subdenda;
        $transaksi->lunas = false;
        $transaksi->save();

        $keranjang->paket()->detach();
        $keranjang->tenda()->detach();
        $keranjang->barang()->detach();
        $keranjang->delete();

        return redirect()->route('beranda');
    }

    private function hitungKeranjang(Keranjang $keranjang)
    {
        $subtotal_paket = 0;
        $subdenda_paket = 0;
        foreach ($keranjang->paket as $pkt) {
            $subtotal_paket += $pkt->harga * $pkt->keranjang_paket->jumlah;
            $subdenda_paket += $pkt->denda * $pkt->keranjang_paket->jumlah;
        }

        $subtotal_tenda = 0;
        $subdenda_tenda = 0;
        foreach ($keranjang->tenda as $td) {
            $subtotal_tenda += $td->harga * $td->keranjang_tenda->jumlah;
            $subdenda_tenda += $td->denda * $td->keranjang_tenda->jumlah;
        }

        $subtotal_barang = 0;
        $subdenda_barang = 0;
        foreach ($keranjang->barang as $br) {
            $subtotal_barang += $br->harga * $br->keranjang_barang->jumlah;
            $subdenda_barang += $br->denda * $br->keranjang_barang->jumlah;
        }

        $subtotal = $subtotal_paket + $subtotal_tenda + $subtotal_barang;
        $subdenda = $subdenda_paket + $subdenda_tenda + $subdenda_barang;

        $tgl_rental  = new DateTime($keranjang->tgl_rental);
        $tgl_kembali = new DateTime($keranjang->tgl_kembali);
        $interval = $tgl_rental->diff($tgl_kembali);
        $lama_rental = $interval->d + 1;

        return [
            'subtotal' => $subtotal, 'subdenda' => $subdenda,
            'lama_rental' => $lama_rental, 'total' => $lama_rental * $subtotal,
        ];
    }
}
