<?php

namespace App\Http\Controllers;

use App\Models\TransaksiModel;
use App\Models\BarangModel;
use App\Models\UserModel;
use Illuminate\Http\Request;

class TransaksiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $datatransaksi = ['transaksi' => TransaksiModel::all()];
        $datauser = ['user' => UserModel::all()];
        return view('index', $datatransaksi, $datauser);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create($userId)
    {
        $user = UserModel::find($userId);
        $barang = BarangModel::all();
        return view('create')->with([
            'user' => $user,
            'barang' => $barang,
        ]);

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'id_barang' => 'required',
            'jumlah' => 'required',
            'id_user' => 'required',
        ]);

        $namaBarang = $request->input('id_barang');
        $idUser = $request->input('id_user');

        $transaksi = new TransaksiModel;
        $transaksi->id_barang = $namaBarang;
        $transaksi->jumlah = $request->jumlah;
        $transaksi->id_user = $idUser;
        $transaksi->save();

        return to_route('transaksi.index')->with('success', 'Data barang berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
