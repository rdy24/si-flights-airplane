@extends('layouts.app-print')

@section('content')
<div class="">
  <h3 class="text-center my-5">Laporan Data Maskapai</h3>
  <table class="table table-bordered ">
    <thead class="thead-light">
      <tr class="text-center">
        <th>No</th>
        <th>Kode Pesawat</th>
        <th>Nama</th>
        <th>Maskapai</th>
        <th>Status</th>
        <th>Kuota</th>
      </tr>
    </thead>
    <tbody>
      @forelse ($planes as $plane)
      <tr>
        <td>{{ $loop->iteration }}</td>
        <td>{{ $plane->kode_pesawat }}</td>
        <td>{{ $plane->nama }}</td>
        <td>{{ $plane->airline->nama }}</td>
        <td>{{ $plane->status }}</td>
        <td>{{ $plane->kuota }}</td>
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