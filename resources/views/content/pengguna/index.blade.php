@extends('layouts/contentNavbarLayout') @section('title', 'Pengguna')
@section('content')
<!-- Responsive Table -->
<div class="card">
  <h5 class="card-header">List Pengguna</h5>
  <div class="table-responsive text-nowrap">
    <table class="table">
      <thead>
        <tr class="text-nowrap">
          <th>#</th>
          <th>Nama Pengguna</th>
          <th>Nama Lengkap</th>
          <th>Kontak</th>
          <th>Alamat</th>
        </tr>
      </thead>
      <tbody>
        @foreach($pengguna as $item)
        <tr>
          <td>{{ $loop->iteration }}</td>
          <td>{{ $item->NamaPengguna }}</td>
          <td>{{ $item->NamaDepan }}&nbsp;{{ $item->NamaBelakang }}</td>
          <td>{{ $item->NoHp }}</td>
          <td>{{ $item->Alamat }}</td>
        </tr>
        @endforeach
      </tbody>
    </table>
  </div>
</div>
<!--/ Responsive Table -->
@endsection
