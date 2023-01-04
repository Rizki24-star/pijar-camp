@extends('main')

@section('content')
<div class="container">
    <div class="title">
        <h5 class="text-primary">PRODUK</h5>
        <div class="breadcumb">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item " aria-current="page"><a class="link text-primary text-decoration-none" href="/">Produk</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Edit produk</li>
                </ol>
            </nav>
        </div>
    </div>
    <div class="form-create-table col-10">
        <form action="/produk/{{$data->id}}" method="post">
            @method('put')
            @csrf
            <div class="input-form p-2">
                <label for="">Nama Produk</label>
                <input type="text" class="form-control" name="nama_produk" value="{{old('nama_produk',$data->nama_produk)}}" required placeholder="Masukkan nama produk">
            </div>
            <div class="input-form p-2">
                <label for="">Harga</label>
                <input type="number" class="form-control" name="harga" min="1" value="{{old('harga',$data->harga)}}" required placeholder="Masukkan harga">
            </div>
            <div class="input-form p-2">
                <label for="">Jumlah</label>
                <input type="number" class="form-control" name="jumlah" min="1" value="{{old('jumlah',$data->jumlah)}}" required placeholder="Masukkan jumlah">
            </div>
            <div class="input-form p-2">
                <label for="keterangan">keterangan</label>
               <textarea class="form-control" name="keterangan" id="" cols="30" rows="5" required placeholder="Masukkan keterangan">{{old('keterangan',$data->keterangan)}}</textarea>
            </div>
            <div class="d-flex">
                <button type="submit" class="btn btn-success ms-auto">Edit</button>
            </div>
        </form>
    </div>
</div>
@endsection