@extends('layouts.app-print')

@section('content')
<div class="">
  <h3 class="text-center my-5">Laporan Data User</h3>
  <table class="table table-bordered ">
    <thead class="thead-light">
      <tr class="text-center">
        <th>No</th>
        <th>Nama</th>
        <th>Email</th>
        <th>Role</th>
      </tr>
    </thead>
    <tbody>
      @forelse ($users as $user)
      <tr class="text-center">
        <td>{{ $loop->iteration }}</td>
        <td>{{ $user->name }}</td>
        <td>{{ $user->email }}</td>
        <td>{{ $user->role }}</td>
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