<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Laporan Stock Barang</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <style>
        table,
        tr,
        th,
        td {
            border: 1px solid #000;
            font-size: 14px;
        }

        hr {
            border: 1px solid #000;
        }

        body {
            -webkit-print-color-adjust: exact !important;
            print-color-adjust: exact !important;
        }

    </style>
</head>
<body>
    <div class="col-12">
        <div class="row mb-0 text-center">
            <h1 class="display-6" style="font-weight: bold; text-transform: uppercase">CV. Kasur Asssahaz</h1>
            <h5>Laporan Stock Barang</h5>
            <div>Pertanggal {{\Carbon\Carbon::parse($date_from)->isoFormat('D MMMM YYYY')}} - {{\Carbon\Carbon::parse($date_to)->isoFormat('D MMMM YYYY')}}</div>
        </div>
    </div>
    <hr class="mb-4 border-black">
    <table class="table table-bordered table-striped">
        <thead style="background-color:#84B0CA ;" class="text-white text-center align-middle">
            <tr>
                <th scope="col" rowspan="2">#</th>
                <th scope="col" rowspan="2">Nama Barang</th>
                <th scope="col" rowspan="2">Stock Awal</th>
                <th scope="col" colspan="2">Mutasi</th>
                <th scope="col" rowspan="2">Stock Akhir</th>

            </tr>
            <tr>
                <th scope="col">Masuk</th>
                <th scope="col">Keluar</th>
            </tr>
        </thead>
        <tbody>
            <?php $i=1; ?>
            @foreach ($items as $item)
            <tr>
                <th scope="row" class="text-center">{{$i++}}</th>
                <td>{{$item->nama}}</td>
                <td class="text-center">
                    {{-- @if ($item->stocks[0] == null) --}}
                    @foreach ($stocks as $stock)
                    @if ($stock->barang_id == $item->id)
                    @if ($stock->total > 0)
                    {{$item->stocks[0]->stock_awal}}
                    @endif
                    @else
                    {{-- {{$item->in_stock}} --}}
                    @endif
                    {{-- @break --}}
                    @endforeach

                    {{-- @else
                    {{$item->stocks[0]->stock_awal}}

                    @endif --}}

                </td>
                <td class="text-center">
                    @foreach ($stocks as $stock)
                    @if ($stock->barang_id == $item->id)
                    {{$stock->jumlah}}
                    {{-- @else
                    - --}}
                    @endif
                    {{-- @break --}}

                    @endforeach
                </td>
                <td class="text-center">
                    @foreach ($orders as $stock)
                    @if ($stock->barang_id == $item->id)
                    {{$stock->jumlah_out}}

                    @endif
                    {{-- @break --}}

                    @endforeach
                </td>
                <td class="text-center">
                    @foreach ($stocks as $stock)
                    @foreach ($orders as $order)
                    @if ($stock->barang_id == $item->id && $item->id == $order->barang_id)
                    {{($item->stocks[0]->stock_awal + $stock->jumlah) - $order->jumlah_out}}
                    @endif
                    @endforeach
                    {{-- @break --}}

                    @endforeach
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <script>
        // window.print()

    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
</body>
</html>
