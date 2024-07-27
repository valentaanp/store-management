<?php

namespace App\Http\Controllers\barang;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\BarangModel;

class Barang extends Controller
{
  public function index()
  {
    $barang = BarangModel::all();
    // dd($barang);
    return view('content.barang.index', compact('barang'));
  }

  public function store(Request $request)
  {
    // dd($request->input('itemName'), $request->input('itemDesc'), $request->input('itemUnit'), $request->input('itemQuantity'), $request->input('itemPrice'));
    // Create a new barang
    $barang = new BarangModel();
    $barang->NamaBarang = $request->input('itemName');
    $barang->Keterangan = $request->input('itemDesc');
    $barang->Satuan = $request->input('itemUnit');
    $barang->Jumlah = $request->input('itemQuantity');
    $barang->HargaPerBarang = $request->input('itemPrice');
    $barang->IdPengguna = 1;
    $barang->save();

    // Redirect or return response
    return redirect()->route('barang')->with('success', 'Barang sukses ditambahkan.');
  }

  public function update(Request $request, $id)
  {
    // dd($request->input('itemId'), $request->input('itemName'), $request->input('itemDesc'), $request->input('itemUnit'), $request->input('itemQuantity'), $request->input('itemPrice'));
    $barang = BarangModel::find($id);

    if (!$barang) {
      return redirect()->route('dashboard-analitycs')->with('error', 'Barang tidak ditemukan.');
    }

    // Edit  barang
    $barang->NamaBarang = $request->input('itemName');
    $barang->Keterangan = $request->input('itemDesc');
    $barang->Satuan = $request->input('itemUnit');
    $barang->Jumlah = $request->input('itemQuantity');
    $barang->HargaPerBarang = $request->input('itemPrice');
    $barang->IdPengguna = 1;
    $barang->save();

    // Redirect or return response
    return redirect()->route('barang')->with('success', 'Barang sukses diupdate.');
  }

  public function destroy($id)
  {
    $barang = BarangModel::find($id);

    if ($barang) {
      $barang->delete();
      return response()->json(['success' => true], 200);
    }

    return response()->json(['success' => false, 'message' => 'Barang tidak ditemukan'], 404);
  }
}
