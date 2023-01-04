<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use Illuminate\Http\Request;

class produkController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $produk = Produk::latest()->get();
        return view('index',['produk' => $produk]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // return $request;
        $data = [
            'nama_produk' => 'required',
            'harga' => 'required',
            'jumlah' => 'required',
            'keterangan' => 'required',
        ];

        $validasi = $request->validate($data);
        Produk::create($validasi);

        return redirect('/produk')->with('success', 'Produk berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Produk  $produk
     * @return \Illuminate\Http\Response
     */
    public function show(Produk $produk)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Produk  $produk
     * @return \Illuminate\Http\Response
     */
    public function edit(Produk $produk)
    {
        // return $produk;
        $data = Produk::where('id',$produk->id)->first();
        return view('edit', ['data' => $data]);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Produk  $produk
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Produk $produk)
    {
        $data = [
            'nama_produk' => 'required',
            'harga' => 'required',
            'jumlah' => 'required',
            'keterangan' => 'required',
        ];

        $validasi = $request->validate($data);
        Produk::where('id',$produk->id)->update($validasi);

        return redirect('/produk')->with('success', 'Produk berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Produk  $produk
     * @return \Illuminate\Http\Response
     */
    public function destroy(Produk $produk)
    {
        $data = Produk::where('id',$produk->id)->first();
        $data->delete();

        return redirect('/produk')->with('success', 'Produk berhasil dihapus');
    }
}
