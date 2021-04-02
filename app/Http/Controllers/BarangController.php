<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Barang;
class BarangController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //fungsi eloquent menampilkab data menggunakan pagination
        $barangs = Barang::all(); //mengambil semua isi table
        $posts = Barang::orderBy('id_barang', 'desc')->paginate(6);
        return view('barangs.index', compact('posts'));
        with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('barangs.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //melakukan validasi data
        $request->validate([
            'id_barang' => 'required',
            'kode barang' => 'required',
            'nama_barang' => 'required',
            'kategori_barang' => 'required',
            'harga' => 'required',
            'qty' => 'required',
        ]);

        //fungsi eloquent untuk tambah data
        Barang::create($request->all());

        //jika tidak berhasil akan kembali ke halaman awal
        return redirect()->route('barangs.index')
        ->with('success', 'Barang berhasil ditambahkan');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id_barang)
    {
        //menampilkan detail data
        $Barang = Barang::find($id_barang);
        return view('barangs.detail', compact ('Barang'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id_barang)
    {
        //menampilkan detail data menemukan berdasarkan id_barang untuk diedit
        $Barang = Barang::find($id_barang);
        return view('barangs.edit', compact('Barang'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id_barang)
    {
        //melakukan validasi data
        $request->validate([
            'id_barang' => 'required',
            'kode barang' => 'required',
            'nama_barang' => 'required',
            'kategori_barang' => 'required',
            'harga' => 'required',
            'qty' => 'required',
        ]);
        //eloquent mengupdate data inputan
        Barang::find($id_barang)->update($request->all());

        //jika berhasil akan kembali ke halaman awal
        return redirect()->route('barangs.index')
        ->with('success', 'Barang berhasil ditambahkan');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id_barang)
    {
        //fungsi eloquent untuk menghapus data
        Barang::find($id_barang)->delete();
        return redirect()->route('barangs.index')
        ->with('success', 'Barang berhasil dihapus');

    }
}
