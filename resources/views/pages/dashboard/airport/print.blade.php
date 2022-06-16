@extends('layouts.app-print')

@section('content')
<div class="">
  <h3 class="text-center my-5">Laporan Data Bandara</h3>
  <table class="table table-bordered ">
    <thead class="thead-light">
      <tr class="text-center">
        <th>No</th>
        <th>Nama</th>
        <th>Alamat</th>
        <th>Kota</th>
        <th>Negara</th>
      </tr>
    </thead>
    <tbody>
      @forelse ($airports as $airport)
      <tr class="text-center">
        <td>{{ $loop->iteration }}</td>
        <td>{{ $airport->name }}</td>
        <td>{{ $airport->alamat }}</td>
        <td>{{ $airport->kota }}</td>
        <td>{{ $airport->negara }}</td>
      </tr>
      @empty
      <tr>
        <td colspan="6" class="text-center">Tidak ada data</td>
      </tr>
      @endforelse
    </tbody>
  </table>
</div>
@endsection