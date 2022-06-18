@extends('layouts.app')

@section('title')
Detail Tiket {{ $ticket->kode_tiket }}
@endsection

@section('content')
<div class="section-header">
  <h1>Detail Data ticket {{ $ticket->kode_tiket }}</h1>
  <div class="section-header-breadcrumb">
    <div class="breadcrumb-item active"><a href="{{ route('dashboard.') }}">Dashboard</a></div>
    <div class="breadcrumb-item active"><a href="{{ route('dashboard.ticket.index') }}">Data Tiket</a></div>
    <div class="breadcrumb-item">Detail Data</div>
  </div>
</div>

<div class="section-body">
  <div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-body d-flex justify-content-between">
          <a href="{{ route('dashboard.print_detail.ticket', $ticket->id) }}" class=" btn btn-dark"><i
              class="fas fa-file-pdf" aria-hidden="true"></i> Cetak PDF</a>
        </div>
        <div class="card-body">
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
            <div class="text-center">
              {!! $qrcode !!}
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection