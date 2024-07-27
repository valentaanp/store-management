<?php

namespace App\Http\Controllers\dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\PembelianModel;
use App\Models\PenjualanModel;

class Analytics extends Controller
{
  public function index()
  {
    // Retrieve all pembelian and penjualan records
    $pembelian = PembelianModel::with('barang')->get();
    $penjualan = PenjualanModel::with('barang')->get();

    // Calculate total pembelian and penjualan
    $totalPembelian = $pembelian->sum(function ($item) {
      return $item->JumlahPembelian * $item->HargaBeli;
    });

    $totalPenjualan = $penjualan->sum(function ($item) {
      return $item->JumlahPenjualan * $item->HargaJual;
    });

    // Calculate profit or loss
    $labaRugi = $totalPenjualan - $totalPembelian;

    return view('content.dashboard.index', [
      'totalPembelian' => $totalPembelian,
      'totalPenjualan' => $totalPenjualan,
      'labaRugi' => $labaRugi,
    ]);
  }
}
