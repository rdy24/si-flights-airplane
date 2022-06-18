@extends('layouts.app-print')

@section('content')
<div class="">
  <h3 class="text-center my-5">Laporan Data Kursi Pesawat</h3>
  <table class="table table-bordered ">
    <thead class="thead-light">
      <tr class="text-center">
        <th>No</th>
        <th>Nama Pesawat</th>
        <th>Kelas Kursi</th>
        <th>Kuota</th>
        <th>Harga</th>
      </tr>
    </thead>
    <tbody>
      @forelse ($airplane_seats as $airplane_seat)
      <tr class="text-center">
        <td>{{ $loop->iteration }}</td>
        <td>{{ $airplane_seat->plane->nama ?? ''}}</td>
        <td>{{ $airplane_seat->kelas_kursi }}</td>
        <td>{{ $airplane_seat->kuota }}</td>
        <td>Rp. {{ number_format($airplane_seat->harga) }}</td>
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