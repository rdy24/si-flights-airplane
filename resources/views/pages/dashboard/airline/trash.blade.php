@extends('layouts.app')

@section('title')
Trashed Maskapai | {{ config('app.name') }}
@endsection

@push('css-libraries')
<link rel="stylesheet" href={{ asset("assets/module/datatables.net-bs4/css/dataTables.bootstrap4.min.css") }}>
<link rel="stylesheet" href={{ asset("assets/module/datatables.net-select-bs4/css/select.bootstrap4.min.css") }}>
@endpush

@section('content')
<div class="section-header">
  <h1>Trashed Data Maskapai</h1>
  <div class="section-header-breadcrumb">
    <div class="breadcrumb-item active"><a href="{{ route('dashboard.') }}">Dashboard</a></div>
    <div class="breadcrumb-item">Trashed Data Maskapai</div>
  </div>
</div>

<div class="section-body">
  <div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-striped" id="table-1">
              <thead>
                <tr>
                  <th>No</th>
                  <th>Nama</th>
                  <th>Kode Maskapai</th>
                  <th>Logo</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                @forelse ($airlines as $airline)
                <tr>
                  <td>{{ $loop->iteration }}</td>
                  <td>{{ $airline->nama }}</td>
                  <td>{{ $airline->kode_maskapai }}</td>
                  <td>
                    <img src="{{ asset('storage/'.$airline->logo) }}" alt="logo" class="img-fluid" width="200px">
                  </td>
                  <td>
                    <a href="{{ route('dashboard.restore.airline', $airline->id) }}" class="btn btn-success"
                      onclick="return confirm('apakah anda yakin mengembalikan data ini?')"><i
                        class="fa fa-trash-restore" aria-hidden="true"></i></a>
                    <a href="{{ route('dashboard.delete.airline', $airline->id) }}" class="btn btn-danger"
                      onclick="return confirm('apakah anda yakin ingin menghapus permanen?')"><i class="fa fa-trash"
                        aria-hidden="true"></i></a>
                  </td>
                </tr>
                @empty
                <tr>
                  <td colspan="6" class="text-center">Tidak ada data</td>
                </tr>
                @endforelse
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection

@push('js-libraries')
<script src={{ asset("assets/module/datatables/media/js/jquery.dataTables.min.js") }}></script>
<script src={{ asset("assets/module/datatables.net-bs4/js/dataTables.bootstrap4.min.js") }}></script>
<script src={{ asset("assets/module/datatables.net-select-bs4/js/select.bootstrap4.min.js") }}></script>
@endpush

@push('js-page')
<script src={{ asset("assets/js/page/modules-datatables.js") }}></script>
@endpush