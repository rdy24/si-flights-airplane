@extends('layouts.app-print')

@section('content')
<div class="container">
  <h3 class="text-center my-5">Data Pesawat {{ $plane->nama }}</h3>
  <table class="table table-bordered">
    <tr>
      <th>Kode Pesawat</th>
      <td>{{ $plane->kode_pesawat }}</td>
    </tr>
    <tr>
      <th>Gambar Pesawat</th>
      <td><img src="{{ asset('storage/'.$plane->gambar) }}" alt="gambar" class="img-fluid" width="300px">
      </td>
    </tr>
    <tr>
      <th>Nama Pesawat</th>
      <td>{{ $plane->nama }}</td>
    </tr>
    <tr>
      <th>Maskapai</th>
      <td>{{ $plane->airline->nama }}</td>
    </tr>
    <tr>
      <th>Tanggal Pembuatan</th>
      <td>{{ $plane->tanggal_pembuatan }}</td>
    </tr>
    <tr>
      <th>Tanggal Operasional</th>
      <td>{{ $plane->tanggal_operasional }}</td>
    </tr>
    <tr>
      <th>Tanggal Kadaluarsa</th>
      <td>{{ $plane->tanggal_kadaluarsa }}</td>
    </tr>
    <tr>
      <th>Status</th>
      <td>{{ $plane->status }}</td>
    </tr>
    <tr>
      <th>Kuota</th>
      <td>{{ $plane->kuota }}</td>
    </tr>
  </table>
</div>
@endsection