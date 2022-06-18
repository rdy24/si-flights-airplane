@extends('layouts.app')

@section('title')
Detail Pesawat {{ $plane->nama }}
@endsection

@section('content')
<div class="section-header">
  <h1>Detail Data Pesawat {{ $plane->nama }}</h1>
  <div class="section-header-breadcrumb">
    <div class="breadcrumb-item active"><a href="{{ route('dashboard.') }}">Dashboard</a></div>
    <div class="breadcrumb-item active"><a href="{{ route('dashboard.plane.index') }}">Data Pesawat</a></div>
    <div class="breadcrumb-item">Detail Data</div>
  </div>
</div>

<div class="section-body">
  <div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-body d-flex justify-content-between">
          <a href="{{ route('dashboard.print_detail.plane', $plane->id) }}" class=" btn btn-dark"><i
              class="fas fa-file-pdf" aria-hidden="true"></i> Cetak PDF</a>
        </div>
        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-bordered">
              <tr>
                <th>Kode Pesawat</th>
                <td>{{ $plane->kode_pesawat }}</td>
              </tr>
              <tr>
                <th>Gambar Pesawat</th>
                <td><img src="{{ asset('storage/'.$plane->gambar) }}" alt="gambar" class="img-fluid" width="300px">
                </td>
              </tr>
              <tr>
                <th>Nama Pesawat</th>
                <td>{{ $plane->nama }}</td>
              </tr>
              <tr>
                <th>Maskapai</th>
                <td>{{ $plane->airline->nama }}</td>
              </tr>
              <tr>
                <th>Tanggal Pembuatan</th>
                <td>{{ $plane->tanggal_pembuatan }}</td>
              </tr>
              <tr>
                <th>Tanggal Operasional</th>
                <td>{{ $plane->tanggal_operasional }}</td>
              </tr>
              <tr>
                <th>Tanggal Kadaluarsa</th>
                <td>{{ $plane->tanggal_kadaluarsa }}</td>
              </tr>
              <tr>
                <th>Status</th>
                <td>{{ $plane->status }}</td>
              </tr>
              <tr>
                <th>Kuota</th>
                <td>{{ $plane->kuota }}</td>
              </tr>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection