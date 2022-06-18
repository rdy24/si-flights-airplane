@extends('layouts.app')

@section('title')
Tambah Jadwal | {{ config('app.name') }}
@endsection

@push('css-libraries')
<link rel="stylesheet" href={{ asset("assets/module/select2/dist/css/select2.min.css") }}>
<link rel="stylesheet" href={{ asset("assets/module/bootstrap-daterangepicker/daterangepicker.css") }}>
<link rel="stylesheet" href={{ asset("assets/module/selectric/public/selectric.css") }}>
<link rel="stylesheet" href={{ asset("assets/module/bootstrap-timepicker/css/bootstrap-timepicker.min.css") }}>
<link rel="stylesheet" href={{ asset("assets/module/bootstrap-tagsinput/dist/bootstrap-tagsinput.css") }}>
@endpush

@section('content')
<div class="section-header">
  <h1>Tambah Data Jadwal</h1>
  <div class="section-header-breadcrumb">
    <div class="breadcrumb-item"><a href="#">Dashboard</a></div>
    <div class="breadcrumb-item"><a href="#">Data Jadwal</a></div>
    <div class="breadcrumb-item active">Tambah Data</div>
  </div>
</div>

<div class="section-body">
  <div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-body">
          <form action="{{ route('dashboard.schedule.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
              <label for="plane_id">Pesawat</label>
              <select name="plane_id" required class="form-control select2">
                @foreach($planes as $plane)
                <option value="{{ $plane->id }}" {{ old('plane_id')==$plane->id ? 'selected' : '' }}>
                  {{ $plane->nama }}
                </option>
                @endforeach
              </select>
            </div>
            <div class="form-group">
              <label for="route_id">Kode Rute</label>
              <select name="route_id" required class="form-control select2">
                @foreach($routes as $route)
                <option value="{{ $route->id }}" {{ old('route_id')==$route->id ? 'selected' : '' }}>
                  {{ $route->airportOrigin->name ?? '' }} - {{
                  $route->airportDestination->name ?? '' }} ({{ $route->kode_rute
                  ?? '' }})
                </option>
                @endforeach
              </select>
            </div>
            <div class="form-group">
              <label for="waktu_berangkat">Waktu Berangkat</label>
              <input type="text" class="form-control datetimepicker" id="waktu_berangkat" name="waktu_berangkat"
                required value="{{ old('waktu_berangkat') }}">
              @error('waktu_berangkat')
              <p class="text-danger">
                {{ $message }}
              </p>
              @enderror
            </div>
            <div class="form-group">
              <label for="waktu_tiba">Waktu Tiba</label>
              <input type="text" class="form-control datetimepicker" id="waktu_tiba" name="waktu_tiba" required
                value="{{ old('waktu_tiba') }}">
              @error('waktu_tiba')
              <p class="text-danger">
                {{ $message }}
              </p>
              @enderror
            </div>
            <div class="form-group">
              <label for="status">Status</label>
              <div class="form-check">
                <input class="form-check-input" type="radio" name="status" id="status" value="Menunggu Jadwal" {{
                  old('status')=='Menunggu Jadwal' ? 'checked' : '' }}>
                <label class="form-check-label" for="status">
                  Menunggu Jadwal
                </label>
              </div>
              <div class="form-check">
                <input class="form-check-input" type="radio" name="status" id="status1" value="Sedang Terbang" {{
                  old('status')=='Sedang Terbang' ? 'checked' : '' }}>
                <label class="form-check-label" for="status1">
                  Sedang Terbang
                </label>
              </div>
            </div>
            <button type="submit" class="btn btn-primary">Simpan</button>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection

@push('js-libraries')
<script src={{ asset("assets/module/cleave.js/dist/cleave.min.js") }}></script>
<script src={{ asset("assets/module/select2/dist/js/select2.full.min.js") }}></script>
<script src={{ asset("assets/module/selectric/public/jquery.selectric.min.js") }}></script>
<script src={{ asset("assets/module/bootstrap-daterangepicker/daterangepicker.js") }}></script>
<script src={{ asset("assets/module/bootstrap-timepicker/js/bootstrap-timepicker.min.js") }}></script>
<script src={{ asset("assets/module/bootstrap-tagsinput/dist/bootstrap-tagsinput.min.js") }}></script>
@endpush

@push('js-page')
<script src={{ asset("assets/js/page/forms-advanced-forms.js") }}></script>
@endpush