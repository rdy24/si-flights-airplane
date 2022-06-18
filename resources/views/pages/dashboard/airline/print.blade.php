@extends('layouts.app-print')

@section('content')
<div class="">
  <h3 class="text-center my-5">Laporan Data Maskapai</h3>
  <table class="table table-bordered ">
    <thead class="thead-light">
      <tr class="text-center">
        <th>No</th>
        <th>Nama</th>
        <th>Kode Maskapai</th>
        <th>Logo</th>
      </tr>
    </thead>
    <tbody>
      @forelse ($airlines as $airline)
      <tr class="text-center">
        <td>{{ $loop->iteration }}</td>
        <td>{{ $airline->nama }}</td>
        <td>{{ $airline->kode_maskapai }}</td>
        <td>
          <img src="{{ asset('storage/'.$airline->logo) }}" alt="logo" class="img-fluid" width="200px">
        </td>
      </tr>
      @empty
      <tr>
        <td colspan="4" class="text-center">Tidak ada data</td>
      </tr>
      @endforelse
    </tbody>
  </table>
</div>
@endsection