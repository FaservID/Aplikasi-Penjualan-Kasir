<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\Pesanan;
use App\Models\Stock;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;
use Mockery\Undefined;

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
        // $stocks = Stock::whereBetween('created_at', [$date_from, $date_to])->groupBy('barang_id')
        //     ->orderBy('id', 'DESC')
        //     ->get(array(
        //         DB::raw('barang_id as barang_id'),
        //         DB::raw('SUM(jumlah) as "jumlah"')
        //     ));

        $stocks = DB::table("barang")
            // ->select("barang.*")
            ->join(DB::raw("(SELECT 
            stocks.barang_id,
            SUM(stocks.jumlah) as jumlah,
            Count(*) as total
            FROM stocks
            GROUP BY stocks.barang_id
            ) as stocks"), function ($join) {
                $join->on("stocks.barang_id", "=", "barang.id");
            })
            ->groupBy("barang.id")
            ->whereBetween('created_at', [$date_from, $date_to])
            ->get();

        $orders = DB::table("barang")
            ->join(DB::raw("(SELECT 
            detail_pesanan.barang_id,
            SUM(detail_pesanan.jumlah) as jumlah_out
            FROM detail_pesanan
            GROUP BY detail_pesanan.barang_id
            ) as detail_pesanan"), function ($join) {
                $join->on("detail_pesanan.barang_id", "=", "barang.id");
            })
            ->groupBy("barang.id")
            ->whereBetween('created_at', [$date_from, $date_to])
            ->get();

        $items = Barang::with('stocks')->whereBetween('created_at', [$date_from, $date_to])->get();
        $first = Barang::with('stocks')->whereBetween('created_at', [$date_from, $date_to])->orderBy('created_at', 'ASC')->first();
        // dd($first->stocks[0]->stock_awal);
        return view('pages.reports.laporan-stock', [
            'stocks' => $stocks,
            'items' => $items,
            'date_from' => $date_from,
            'date_to' => $date_to,
            'orders' => $orders,
            'first' => $first
        ]);
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
        $transactions = Pesanan::with('user', 'barang', 'detailOrders')->where('status', 'Selesai')->whereDate('created_at', '>=', $date_from)->whereDate('created_at', '<=', $date_to)->get();
        return view('pages.reports.laporan-transaksi', ['transactions' => $transactions, 'date_from' => $date_from, 'date_to' => $date_to]);
    }

    public function jurnalUmum(): View
    {
        return view('pages.admin.laporan.jurnal-umum', [
            'data' => Stock::orderBy('tanggal', 'ASC')->get(),
        ]);
    }

    public function cetakjurnalUmum(Request $request)
    {
        $date_from = $request->date_from;
        $date_to = $request->date_to;
        $data = Stock::whereDate('created_at', '>=', $date_from)->whereDate('created_at', '<=', $date_to)->orderBy('tanggal', 'ASC')->get();
        $balance = 0;
        foreach ($data as $item) {
            $balance += $item->harga_beli;
        }
        return view('pages.reports.jurnal-umum', [
            'data' => $data,
            'date_from' => $date_from,
            'date_to' => $date_to,
            'balance' => $balance
        ]);
    }
}
