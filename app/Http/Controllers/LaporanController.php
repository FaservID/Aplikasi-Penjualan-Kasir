<?php

namespace App\Http\Controllers;

use App\Models\Pesanan;
use App\Models\Stock;
use Illuminate\Http\Request;
use Illuminate\View\View;

class LaporanController extends Controller
{
    public function laporanStock(): View
    {
        return view('pages.admin.laporan.laporan-stock', [
            'stocks' => Stock::with('barang')->orderBy('created_at', 'DESC')->get(),
        ]);
    }

    public function cetakLaporanStock(Request $request)
    {
        $date_from = $request->date_from;
        $date_to = $request->date_to;
        $out_stock = Pesanan::with('detailOrders')->whereBetween('created_at', [$date_from, $date_to])->get();
        // dd($out_stock);
        $stocks = Stock::whereBetween('tanggal', [$date_from, $date_to])->get();
        if()
        return view('pages.reports.laporan-stock', ['stocks' => $stocks, 'date_from' => $date_from, 'date_to' => $date_to]);
    }

    public function laporanTransaksi(): View
    {
        return view('pages.admin.laporan.laporan-transaksi', [
            'transactions' => Pesanan::with('user', 'barang', 'detailOrders')->where('status', 'Selesai')->orderBy('id', 'DESC')->get(),
        ]);
    }


    public function cetakLaporanTransaksi(Request $request)
    {
        $date_from = $request->date_from;
        $date_to = $request->date_to;
        $transactions = Pesanan::with('user', 'barang', 'detailOrders')->where('status', 'Selesai')->whereBetween('created_at', [$date_from, $date_to])->get();
        return view('pages.reports.laporan-transaksi', ['transactions' => $transactions, 'date_from' => $date_from, 'date_to' => $date_to]);
    }
}
