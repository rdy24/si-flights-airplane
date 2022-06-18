@extends('layouts.app-print')

@section('content')
<div class="">
  <h3 class="text-center my-5">Laporan Data Customer</h3>
  <table class="table table-bordered ">
    <thead class="thead-light">
      <tr class="text-center">
        <th>No</th>
        <th>Nama</th>
        <th>No Telpon</th>
        <th>Kewarganegaraan</th>
      </tr>
    </thead>
    <tbody>
      @forelse ($customers as $customer)
      <tr class="text-center">
        <td>{{ $loop->iteration }}</td>
        <td>{{ $customer->nama }}</td>
        <td>{{ $customer->no_telepon }}</td>
        <td>{{ $customer->kewarganegaraan }}</td>
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