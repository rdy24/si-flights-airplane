@extends('layouts.app-print')

@section('content')
<div class="">
  <h3 class="text-center my-5">Laporan Data Rute</h3>
  <table class="table table-bordered ">
    <thead class="thead-light">
      <tr class="text-center">
        <th>No</th>
        <th>Bandara Asal</th>
        <th>Bandara Tujuan</th>
        <th>Kode Rute</th>
      </tr>
    </thead>
    <tbody>
      @forelse ($routes as $route)
      <tr class="text-center">
        <td>{{ $loop->iteration }}</td>
        <td>{{ $route->airportOrigin->name ?? ''}}</td>
        <td>{{ $route->airportDestination->name ?? ''}}</td>
        <td>{{ $route->kode_rute }}</td>
      </tr>
      @empty
      <tr>
        <td colspan="5" class="text-center">Tidak ada data</td>
      </tr>
      @endforelse
    </tbody>
  </table>
</div>

@endsection