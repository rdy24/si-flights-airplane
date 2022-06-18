@extends('layouts.app-print')

@section('content')
<div class="">
  <h3 class="text-center my-5">Laporan Data Tiket</h3>
  <table class="table table-bordered ">
    <thead class="thead-light">
      <tr class="text-center">
        <th>No</th>
        <th>Nama</th>
        <th>Pesawat</th>
        <th>Tanggal Pesan</th>
        <th>Status</th>
      </tr>
    </thead>
    <tbody>
      @forelse ($tickets as $ticket)
      <tr class="text-center">
        <td>{{ $loop->iteration }}</td>
        <td>{{ $ticket->customer->nama ?? '' }}</td>
        <td>{{ $ticket->schedule->plane->nama ?? '' }}</td>
        <td>{{ $ticket->tanggal_pesan }}</td>
        <td>{{ $ticket->status }}</td>
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