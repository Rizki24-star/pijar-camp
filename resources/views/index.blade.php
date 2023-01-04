@extends('main')

@section('content')
<div class="container">
    <div class="title">
        <h5 class="text-primary">PRODUK</h5>
        <div class="breadcumb">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item active" aria-current="page">Produk</li>
                </ol>
            </nav>
        </div>
    </div>
    <div class="table-index">
        @if (session()->has('success'))
        <div class="alert alert-success" role="alert">
            {{session('success')}}
          </div>
        @else
            
        @endif
        <br>
        <div class="d-flex">
            <a href="/produk/create" class="btn btn-success ms-auto">Tambah produk</a>
        </div>
        <table class="table table-striped table-hover">
            <thead>
                <th>No</th>
                <th>Nama produk</th>
                <th>Harga</th>
                <th>Jumlah</th>
                <th>Aksi</th>
            </thead>
            <tbody>
            @foreach ($produk as $p)
            <tr>
                <td>{{$loop->iteration}}</td>
                <td>{{$p->nama_produk}}</td>
                <td>{{$p->harga}}</td>
                <td>{{$p->jumlah}}</td>
                <td class="w-25">
                    <div class="d-xl-flex justify-content-end border border-1">
                        <!-- Button trigger modal -->
                        <button type="button" class="btn btn-sm btn-info" data-bs-toggle="modal" data-bs-target="#detail{{$p->id}}">
                            detail
                        </button>
 
                        <a href="/produk/{{$p->id}}/edit" class="btn btn-sm btn-warning ms-auto">Edit</a>
                        <form action="/produk/{{$p->id}}" method="post">
                            @method('delete')
                            @csrf
                            <button class="btn btn-sm btn-danger ms-auto">Hapus</button>
                        </form>
                    </div>
                </td>

                 <!-- Modal -->
                <div class="modal fade" id="detail{{$p->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">{{$p->nama_produk}}</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                        <div class="p-2">
                            <small>Nama produk :</small><br>
                            <b>{{$p->nama_produk}}</b>
                        </div>
                        <div class="p-2">
                            <small>Harga :</small><br>
                            <b>{{$p->nama_produk}}</b>
                        </div>
                        <div class="p-2">
                            <small>Jumlah :</small><br>
                            <b>{{$p->jumlah}}</b>
                        </div>
                        <div class="p-2">
                            <small>Keterangan :</small><br>
                            <b>{{$p->keterangan}}</b>
                        </div>
                        </div>
                        <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        </div>
                    </div>
                    </div>
                </div>

            </tr>
            @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection