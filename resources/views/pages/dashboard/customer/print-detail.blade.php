@extends('layouts.app-print')

@section('content')
<div class="container">
  <h3 class="text-center my-5">Data Customer {{ $customer->nama }}</h3>
  <table class="table table-bordered">
    <tr>
      <th>Nama</th>
      <td>{{ $customer->nama }}</td>
    </tr>
    <tr>
      <th>No KTP</th>
      <td>{{ $customer->no_ktp }}</td>
    </tr>
    <tr>
      <th>No Passport</th>
      <td>{{ $customer->no_passport ?? '-' }}</td>
    </tr>
    <tr>
      <th>Alamat</th>
      <td>{{ $customer->alamat }}</td>
    </tr>
    <tr>
      <th>No Telepon</th>
      <td>{{ $customer->no_telepon }}</td>
    </tr>
    <tr>
      <th>Email</th>
      <td>{{ $customer->email }}</td>
    </tr>
    <tr>
      <th>Kewarganegaraan</th>
      <td>{{ $customer->kewarganegaraan }}</td>
    </tr>
  </table>
</div>
@endsection