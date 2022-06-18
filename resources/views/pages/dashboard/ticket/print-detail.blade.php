@extends('layouts.app-print')

@section('content')
<div class="container">
  <h3 class="text-center my-5">Data Tiket {{ $ticket->kode_tiket }}</h3>
  <div class="table-responsive">
    <table class="table table-bordered">
      <tr>
        <th>Nama</th>
        <td>{{ $ticket->customer->nama ?? '' }}</td>
      </tr>
      <tr>
        <th>No KTP</th>
        <td>{{ $ticket->customer->no_ktp ?? '' }}</td>
      </tr>
      <tr>
        <th>No Telepon</th>
        <td>{{ $ticket->customer->no_telepon ?? '-' }}</td>
      </tr>
      <tr>
        <th>Pesawat</th>
        <td>{{ $ticket->schedule->plane->nama ?? '' }}</td>
      </tr>
      <tr>
        <th>Maskapai</th>
        <td>{{ $ticket->schedule->plane->airline->nama ?? '' }}</td>
      </tr>
      <tr>
        <th>Rute</th>
        <td>{{ $ticket->schedule->route->airportOrigin->name ?? '' }} - {{
          $ticket->schedule->route->airportDestination->name ?? '' }} ({{ $ticket->schedule->route->kode_rute
          ?? '' }})</td>
      </tr>
      <tr>
        <th>Jadwal Terbang</th>
        <td>{{ $ticket->schedule->waktu_berangkat ?? '' }} - {{ $ticket->schedule->waktu_tiba ?? '' }}</td>
      </tr>
      <tr>
        <th>Tanggal Pesan</th>
        <td>{{ $ticket->tanggal_pesan }}</td>
      </tr>
      <tr>
        <th>Status</th>
        <td>{{ $ticket->status }}</td>
      </tr>
    </table>
  </div>
  <div class="text-center mt-5">
    <img src="data:image/png;base64, {!! $qrcode !!}">
  </div>
</div>
@endsection