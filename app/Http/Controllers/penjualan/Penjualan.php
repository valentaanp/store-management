<?php

namespace App\Http\Controllers\penjualan;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\PenjualanModel;
use App\Models\PenggunaModel;
use App\Models\BarangModel;
use App\Models\PelangganModel;

class Penjualan extends Controller
{
  public function index()
  {
    $penjualan = PenjualanModel::with(['barang', 'pengguna', 'pelanggan'])->get();
    return view('content.penjualan.index', ['penjualan' => $penjualan]);
  }
}
