@extends('layouts/contentNavbarLayout') @section('title', 'Penjualan')
@section('content')
<!-- Responsive Table -->
<div class="card">
  <h5 class="card-header">List Penjualan</h5>
  <div class="table-responsive text-nowrap">
    <table class="table">
      <thead>
        <tr class="text-nowrap">
          <th>#</th>
          <th>Jumlah Pembelian</th>
          <th>Harga Beli</th>
          <th>Nama Barang</th>
          <th>Nama Pengguna</th>
          <th>Nama Pelanggan</th>
        </tr>
      </thead>
      <tbody>
        @foreach($penjualan as $index => $item)
        <tr>
          <td>{{ $loop->iteration }}</td>
          <td>{{ $item->JumlahPenjualan }}</td>
          <td>{{ $item->HargaJual }}</td>
          <td>{{ $item->barang->NamaBarang }}</td>
          <td>{{ $item->pengguna->NamaPengguna }}</td>
          <td>{{ $item->pelanggan->NamaPelanggan }}</td>
        </tr>
        @endforeach
      </tbody>
    </table>
  </div>
</div>
<!--/ Responsive Table -->
@endsection
