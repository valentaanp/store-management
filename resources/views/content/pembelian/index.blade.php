@extends('layouts/contentNavbarLayout') @section('title', 'Pembelian')
@section('content')
<!-- Responsive Table -->
<div class="card">
  <h5 class="card-header">List Pembelian</h5>
  <div class="table-responsive text-nowrap">
    <table class="table">
      <thead>
        <tr class="text-nowrap">
          <th>#</th>
          <th>Jumlah Pembelian</th>
          <th>Harga Beli</th>
          <th>Nama Barang</th>
          <th>Nama Pengguna</th>
        </tr>
      </thead>
      <tbody>
        @foreach($pembelian as $index => $item)
        <tr>
          <td>{{ $loop->iteration }}</td>
          <td>{{ $item->JumlahPembelian }}</td>
          <td>{{ $item->HargaBeli }}</td>
          <td>{{ $item->barang->NamaBarang }}</td>
          <td>{{ $item->pengguna->NamaPengguna }}</td>
        </tr>
        @endforeach
      </tbody>
    </table>
  </div>
</div>
<!--/ Responsive Table -->
@endsection
