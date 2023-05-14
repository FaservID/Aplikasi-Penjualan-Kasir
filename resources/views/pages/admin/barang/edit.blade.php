@extends('layouts.main')
@section('title', 'Edit Barang')

@section('content')

<h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Barang / </span> Edit Barang</h4>


<div class="row">
    <div class="col-12">
        <div class="card mb-4">
            <div class="container py-4">
                <form action="{{route('barang.update', $barang->slug)}}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="col-12">
                        <div class="row">
                            <div class="col-md-12">
                                <label for="defaultFormControlInput" class="form-label">Nama Barang</label>
                                <input type="text" value="{{$barang->nama}}" class="form-control @error('nama_barang') is-invalid @enderror" name="nama_barang" id="nama_barang" {{-- placeholder="John Doe" --}} aria-describedby="defaultFormControlHelp" />
                                @error('nama_barang')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{$message}}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-md-4">
                                <label for="defaultFormControlInput" class="form-label">Tipe</label>
                                <input type="text" value="{{$barang->tipe}}" class="form-control @error('tipe') is-invalid @enderror" name="tipe" id="tipe" {{-- placeholder="John Doe" --}} aria-describedby="defaultFormControlHelp" />
                                @error('tipe')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{$message}}</strong>
                                </span>
                                @enderror
                            </div>
                            <div class="col-md-4">
                                <label for="defaultFormControlInput" class="form-label">Panjang</label>
                                <input type="text" value="{{ $barang->panjang }}" class="form-control @error('panjang') is-invalid @enderror" name="panjang" id="panjang" {{-- placeholder="John Doe" --}} aria-describedby="defaultFormControlHelp" />
                                @error('panjang')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{$message}}</strong>
                                </span>
                                @enderror
                            </div>
                            <div class="col-md-4">
                                <label for="defaultFormControlInput" class="form-label">Lebar</label>
                                <input type="text" value="{{ $barang->lebar }}" class="form-control @error('lebar') is-invalid @enderror" name="lebar" id="lebar" {{-- placeholder="John Doe" --}} aria-describedby="defaultFormControlHelp" />
                                @error('lebar')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{$message}}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-md-6">
                                <label for="defaultFormControlInput" class="form-label">Harga</label>
                                <div class="input-group">
                                    <span class="input-group-text" id="basic-addon1">Rp.</span>
                                    <input type="text" value="{{ $barang->harga }}" class="form-control @error('harga') is-invalid @enderror" name="harga" id="harga" {{-- placeholder="John Doe" --}} aria-describedby="defaultFormControlHelp" />
                                    @error('harga')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{$message}}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <label for="defaultFormControlInput" class="form-label">Stock</label>
                                <input type="number" value="{{ $barang->in_stock }}" class="form-control @error('in_stock') is-invalid @enderror" name="in_stock" id="in_stock" {{-- placeholder="John Doe" --}} aria-describedby="defaultFormControlHelp" />
                                @error('in_stock')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{$message}}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-md-6">
                                <label for="kategori_id" class="form-label">Kategori</label>
                                <select name="kategori_id" id="kategori_id" class="form-control form-select @error('kategori_id') is-invalid @enderror">
                                    <option value="" selected disabled>-- Pilih Kategori --</option>
                                    @foreach ($categories as $category)
                                    <option value="{{$category->id}}" {{$category->id === $barang->kategori_id ? 'selected' : ''}}>{{$category->nama}}</option>
                                    @endforeach
                                </select>
                                @error('kategori_id')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{$message}}</strong>
                                </span>
                                @enderror
                            </div>
                            <div class="col-md-6">
                                <label for="foto" class="form-label">Product Image</label>
                                <div class="d-flex justify-content-center">
                                    <input type="file" class="form-control @error('foto') is-invalid @enderror" name="foto" id="foto" {{-- placeholder="John Doe" --}} aria-describedby="defaultFormControlHelp" />
                                    <a href="{{asset('product_image')}}/{{$barang->foto}}" target="_blank" class=" btn btn-primary btn-sm"><i class='bx bxs-file-jpg'></i> </a>
                                </div>
                                <p class="text-muted fw-bold mt-1" style="font-size: 13px">*) jpg & png only!</p>
                                @error('foto')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{$message}}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <label for="keterangan" class="form-label">Keterangan</label>
                                <textarea class="form-control @error('keterangan') is-invalid @enderror" rows="5" name="keterangan">{{$barang->keterangan}}</textarea>
                                @error('keterangan')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{$message}}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="mt-4 mb-2 text-end">
                            <a href="{{route('barang.index')}}" class="btn btn-secondary">Kembali</a>
                            <button type="submit" class="btn btn-primary">Simpan</button>
                        </div>
                </form>
            </div>
        </div>
    </div>
</div>


@endsection
