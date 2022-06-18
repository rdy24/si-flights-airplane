@extends('layouts.app')

@section('title')
Edit Data Customer {{ $customer->nama }}
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
  <h1>Edit Data Customer</h1>
  <div class="section-header-breadcrumb">
    <div class="breadcrumb-item"><a href="#">Dashboard</a></div>
    <div class="breadcrumb-item"><a href="#">Data Customer</a></div>
    <div class="breadcrumb-item active">Edit Data</div>
  </div>
</div>

<div class="section-body">
  <div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-body">
          <form action="{{ route('dashboard.customer.update', $customer->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
              <label for="nama">Nama</label>
              <input type="text" class="form-control" id="nama" name="nama" required
                value="{{ old('nama', $customer->nama) }}">
              @error('nama')
              <p class="text-danger">
                {{ $message }}
              </p>
              @enderror
            </div>
            <div class="form-group">
              <label for="no_ktp">No KTP</label>
              <input type="text" class="form-control" id="no_ktp" name="no_ktp" required
                value="{{ old('no_ktp', $customer->no_ktp) }}">
              @error('no_ktp')
              <p class="text-danger">
                {{ $message }}
              </p>
              @enderror
            </div>
            <div class="form-group">
              <label for="no_passport">No Passport</label>
              <input type="text" class="form-control" id="no_passport" name="no_passport"
                value="{{ old('no_passport', $customer->no_passport) }}">
              @error('no_passport')
              <p class="text-danger">
                {{ $message }}
              </p>
              @enderror
            </div>
            <div class="form-group">
              <label for="tanggal_lahir">Tanggal Lahir</label>
              <input type="text" class="form-control datepicker" id="tanggal_lahir" name="tanggal_lahir" required
                value="{{ old('tanggal_lahir', $customer->tanggal_lahir) }}">
              @error('tanggal_lahir')
              <p class="text-danger">
                {{ $message }}
              </p>
              @enderror
            </div>
            <div class="form-group">
              <label for="alamat">Alamat</label>
              <input type="text" class="form-control" id="alamat" name="alamat" required
                value="{{ old('alamat', $customer->alamat) }}">
              @error('alamat')
              <p class="text-danger">
                {{ $message }}
              </p>
              @enderror
            </div>
            <div class="form-group">
              <label for="no_telepon">No Telepon</label>
              <input type="text" class="form-control" id="no_telepon" name="no_telepon" required
                value="{{ old('no_telepon', $customer->no_telepon) }}">
              @error('no_telepon')
              <p class="text-danger">
                {{ $message }}
              </p>
              @enderror
            </div>
            <div class="form-group">
              <label for="email">Email</label>
              <input type="text" class="form-control" id="email" name="email" required
                value="{{ old('email', $customer->email) }}">
              @error('email')
              <p class="text-danger">
                {{ $message }}
              </p>
              @enderror
            </div>
            <div class="form-group">
              <label for="kewarganegaraan">Kewarganegaraan</label>
              <input type="text" class="form-control" id="kewarganegaraan" name="kewarganegaraan" required
                value="{{ old('kewarganegaraan', $customer->kewarganegaraan) }}">
              @error('kewarganegaraan')
              <p class="text-danger">
                {{ $message }}
              </p>
              @enderror
            </div>
            <button type="submit" class="btn btn-primary">Ubah</button>
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