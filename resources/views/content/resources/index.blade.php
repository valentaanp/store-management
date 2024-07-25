@extends('layouts/contentNavbarLayout')
@section('title', 'Member List')
@section('content')

<h4 class="fw-bold py-3 mb-4">
  <span class="text-muted fw-light">Group 7 -</span> Introduction to Data and Information Management
</h4>

@php
  $members = [
    ['name' => 'FADILLA RATNA DWITA', 'id' => '2702453672'],
    ['name' => 'LIANA RAMDHANIA TRISNAWATI', 'id' => '2702458162'],
    ['name' => 'SHELA AMANDA PUTRI', 'id' => '2702452902'],
    ['name' => 'VALENTA ABRAM NUGRAHA PUTRA', 'id' => '2702449826'],
  ];
@endphp

<!-- Responsive Table -->
<div class="card">
  <h5 class="card-header">Member List</h5>
  <div class="table-responsive text-nowrap">
    <table class="table">
      <thead>
        <tr class="text-nowrap">
          <th>#</th>
          <th>Name</th>
          <th>ID</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($members as $index => $member)
      <tr>
        <th scope="row">{{ $index + 1 }}</th>
        <td>{{ $member['name'] }}</td>
        <td>{{ $member['id'] }}</td>
      </tr>
    @endforeach
      </tbody>
    </table>
  </div>
</div>
<!--/ Responsive Table -->
@endsection