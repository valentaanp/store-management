<?php

namespace App\Http\Controllers\pembelian;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\PembelianModel;
use App\Models\PenggunaModel;
use App\Models\BarangModel;

class Pembelian extends Controller
{
  public function index()
  {
    $pembelian = PembelianModel::with(['barang', 'pengguna'])->get();
    return view('content.pembelian.index', ['pembelian' => $pembelian]);
  }
}
