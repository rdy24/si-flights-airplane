@extends('layouts.app-print')

@section('content')
<div class="">
  <h3 class="text-center my-5">Laporan Data Jadwal</h3>
  <table class="table table-bordered ">
    <thead class="thead-light">
      <tr class="text-center">
        <th>No</th>
        <th>Pesawat</th>
        <th>Rute</th>
        <th>Waktu Berangkat</th>
        <th>Waktu Tiba</th>
        <th>Status</th>
      </tr>
    </thead>
    <tbody>
      @forelse ($schedules as $schedule)
      <tr class="text-center">
        <td>{{ $loop->iteration }}</td>
        <td>{{ $schedule->plane->nama }}</td>
        <td>{{ $schedule->route->airportOrigin->name ?? '' }} - {{
          $schedule->route->airportDestination->name ?? '' }} ({{ $schedule->route->kode_rute
          ?? '' }})</td>
        <td>{{ $schedule->waktu_berangkat }}</td>
        <td>{{ $schedule->waktu_tiba }}</td>
        <td>{{ $schedule->status }}</td>
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