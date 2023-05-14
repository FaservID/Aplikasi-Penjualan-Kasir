@extends('layouts.main')
@section('title', 'Tambah Barang')

@section('content')

<h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Barang / </span> Tambah Baru</h4>


<div class="row">
    <div class="col-12">
        <div class="card mb-4">
            <div class="container py-4">
                <form action="" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('POST')
                    <div class="col-12">
                        <div class="row">
                            <div class="col-md-12">
                                <label for="defaultFormControlInput" class="form-label">Nama Barang</label>
                                <input type="text" value="{{ old('nama_barang') }}" class="form-control @error('nama_barang') is-invalid @enderror" name="nama_barang" id="nama_barang" {{-- placeholder="John Doe" --}} aria-describedby="defaultFormControlHelp" />
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
                                <input type="text" value="{{ old('tipe') }}" class="form-control @error('tipe') is-invalid @enderror" name="tipe" id="tipe" {{-- placeholder="John Doe" --}} aria-describedby="defaultFormControlHelp" />
                                @error('tipe')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{$message}}</strong>
                                </span>
                                @enderror
                            </div>
                            <div class="col-md-4">
                                <label for="defaultFormControlInput" class="form-label">Panjang</label>
                                <input type="text" value="{{ old('panjang') }}" class="form-control @error('panjang') is-invalid @enderror" name="panjang" id="panjang" {{-- placeholder="John Doe" --}} aria-describedby="defaultFormControlHelp" />
                                @error('panjang')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{$message}}</strong>
                                </span>
                                @enderror
                            </div>
                            <div class="col-md-4">
                                <label for="defaultFormControlInput" class="form-label">Lebar</label>
                                <input type="text" value="{{ old('lebar') }}" class="form-control @error('lebar') is-invalid @enderror" name="lebar" id="lebar" {{-- placeholder="John Doe" --}} aria-describedby="defaultFormControlHelp" />
                                @error('lebar')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{$message}}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-md-6">
                                <label for="defaultFormControlInput" class="form-label">Harga Beli</label>
                                <div class="input-group">
                                    <span class="input-group-text" id="basic-addon1">Rp.</span>
                                    <input type="text" value="{{ old('harga_beli') }}" class="form-control @error('harga_beli') is-invalid @enderror" name="harga_beli" id="harga_beli" {{-- placeholder="John Doe" --}} aria-describedby="defaultFormControlHelp" />
                                    @error('harga_beli')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{$message}}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <label for="defaultFormControlInput" class="form-label">Harga Jual</label>
                                <div class="input-group">
                                    <span class="input-group-text" id="basic-addon1">Rp.</span>
                                    <input type="price" value="{{ old('harga_jual') }}" class="form-control @error('harga_jual') is-invalid @enderror" name="harga_jual" id="harga_jual" {{-- placeholder="John Doe" --}} aria-describedby="defaultFormControlHelp" />
                                    @error('harga_jual')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{$message}}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-md-6">
                                <label for="kategori" class="form-label">Kategori</label>
                                <select name="kategori" id="kategori" class="form-control form-select @error('kategori') is-invalid @enderror">
                                    <option value="" selected disabled>-- Pilih Kategori --</option>
                                    @foreach ($categories as $category)
                                    <option value="{{$category->id}}">{{$category->nama}}</option>
                                    @endforeach
                                </select>
                                @error('kategori')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{$message}}</strong>
                                </span>
                                @enderror
                            </div>
                            <div class="col-md-6">
                                <label for="foto" class="form-label">Foto</label>
                                <input type="file" class="form-control @error('foto') is-invalid @enderror" name="foto" id="foto" {{-- placeholder="John Doe" --}} aria-describedby="defaultFormControlHelp" />
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
                                <textarea class="form-control" rows="5"></textarea>
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
