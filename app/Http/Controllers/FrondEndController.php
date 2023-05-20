<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use Illuminate\Http\Request;
use Illuminate\View\View;

class FrondEndController extends Controller
{
    public function index(): View
    {
        return view('index', [
            'items' => Barang::all()
        ]);
    }
}
