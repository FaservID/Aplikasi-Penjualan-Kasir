<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateStockRequest;
use App\Http\Requests\EditStockRequest;
use App\Models\Barang;
use App\Models\Stock;

class StockController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('pages.admin.stock.index', [
            'stocks' => Stock::with('barang')->orderBy('created_at', 'DESC')->get(),
            'barang' => Barang::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CreateStockRequest $request)
    {
        Stock::create($request->validated());
        $barang = Barang::where('id', $request->barang_id);
        $getFirstData = $barang->first();
        $getStock = $getFirstData->in_stock + $request->jumlah;
        $barang->update(['in_stock' => $getStock]);
        return redirect()->route('stock.index')->with('message', 'Berhasil Menambahkan Stock');
    }

    /**
     * Display the specified resource.
     */
    public function show(Stock $stock)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Stock $stock)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(EditStockRequest $request, Stock $stock)
    {
        $currQty = $stock->jumlah;
        // dd($currQty);
        $stock->update($request->validated());
        $barang = Barang::where('id', $request->barang_id);
        $getFirstData = $barang->first();
        $currQty >= $request->jumlah ?
            $getStock = $getFirstData->in_stock - $request->jumlah :
            $getStock = $getFirstData->in_stock + $request->jumlah;
        // $getStock = $getFirstData->in_stock + $request->jumlah;
        $barang->update(['in_stock' => $getStock]);
        return redirect()->route('stock.index')->with('message', 'Berhasil Menambahkan Stock');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Stock $stock)
    {
        $currQty = $stock->jumlah;
        $currId = $stock->barang_id;
        $stock->delete();
        $barang = Barang::where('id', $currId);
        $getFirstData = $barang->first();
        $getStock = $getFirstData->in_stock - $currQty;
        $barang->update(['in_stock' => $getStock]);
        return redirect()->route('stock.index')->with('message', 'Berhasil Menghapus Stock');

        
    }
}
