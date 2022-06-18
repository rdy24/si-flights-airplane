@extends('layouts.app')

@section('title')
Detail Customer {{ $customer->nama }}
@endsection

@section('content')
<div class="section-header">
  <h1>Detail Data Customer {{ $customer->nama }}</h1>
  <div class="section-header-breadcrumb">
    <div class="breadcrumb-item active"><a href="{{ route('dashboard.') }}">Dashboard</a></div>
    <div class="breadcrumb-item active"><a href="{{ route('dashboard.customer.index') }}">Data Customer</a></div>
    <div class="breadcrumb-item">Detail Data</div>
  </div>
</div>

<div class="section-body">
  <div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-body d-flex justify-content-between">
          <a href="{{ route('dashboard.print_detail.customer', $customer->id) }}" class=" btn btn-dark"><i
              class="fas fa-file-pdf" aria-hidden="true"></i> Cetak PDF</a>
        </div>
        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-bordered">
              <tr>
                <th>Nama</th>
                <td>{{ $customer->nama }}</td>
              </tr>
              <tr>
                <th>No KTP</th>
                <td>{{ $customer->no_ktp }}</td>
              </tr>
              <tr>
                <th>No Passport</th>
                <td>{{ $customer->no_passport ?? '-' }}</td>
              </tr>
              <tr>
                <th>Alamat</th>
                <td>{{ $customer->alamat }}</td>
              </tr>
              <tr>
                <th>No Telepon</th>
                <td>{{ $customer->no_telepon }}</td>
              </tr>
              <tr>
                <th>Email</th>
                <td>{{ $customer->email }}</td>
              </tr>
              <tr>
                <th>Kewarganegaraan</th>
                <td>{{ $customer->kewarganegaraan }}</td>
              </tr>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection