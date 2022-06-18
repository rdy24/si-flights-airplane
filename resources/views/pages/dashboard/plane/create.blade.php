@extends('layouts.app')

@section('title')
Tambah Pesawat | {{ config('app.name') }}
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
  <h1>Tambah Data Pesawat</h1>
  <div class="section-header-breadcrumb">
    <div class="breadcrumb-item"><a href="#">Dashboard</a></div>
    <div class="breadcrumb-item"><a href="#">Data Pesawat</a></div>
    <div class="breadcrumb-item active">Tambah Data</div>
  </div>
</div>

<div class="section-body">
  <div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-body">
          <form action="{{ route('dashboard.plane.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
              <label for="kode_pesawat">Kode pesawat</label>
              <input type="text" class="form-control" id="kode_pesawat" name="kode_pesawat" required
                value="{{ old('kode_pesawat') }}">
              @error('kode_pesawat')
              <p class="text-danger">
                {{ $message }}
              </p>
              @enderror
            </div>
            <div class="form-group">
              <label for="nama">Nama pesawat</label>
              <input type="text" class="form-control" id="nama" name="nama" required value="{{ old('nama') }}">
              @error('nama')
              <p class="text-danger">
                {{ $message }}
              </p>
              @enderror
            </div>
            <div class="form-group">
              <label for="airline_id">Maskapai</label>
              <select name="airline_id" required class="form-control select2">
                @foreach($airlines as $airline)
                <option value="{{ $airline->id }}" {{ old('airline_id')==$airline->id ? 'selected' : '' }}>
                  {{ $airline->nama }}
                </option>
                @endforeach
              </select>
            </div>
            <div class="form-group">
              <label for="tanggal_pembuatan">Tanggal Pembuatan</label>
              <input type="text" class="form-control datepicker" id="tanggal_pembuatan" name="tanggal_pembuatan"
                required value="{{ old('tanggal_pembuatan') }}">
              @error('tanggal_pembuatan')
              <p class="text-danger">
                {{ $message }}
              </p>
              @enderror
            </div>
            <div class="form-group">
              <label for="tanggal_operasional">Tanggal Operasional</label>
              <input type="text" class="form-control datepicker" id="tanggal_operasional" name="tanggal_operasional"
                required value="{{ old('tanggal_operasional') }}">
              @error('tanggal_operasional')
              <p class="text-danger">
                {{ $message }}
              </p>
              @enderror
            </div>
            <div class="form-group">
              <label for="tanggal_kadaluarsa">Tanggal Kadaluarsa</label>
              <input type="text" class="form-control datepicker" id="tanggal_kadaluarsa" name="tanggal_kadaluarsa"
                required value="{{ old('tanggal_kadaluarsa') }}">
              @error('tanggal_kadaluarsa')
              <p class="text-danger">
                {{ $message }}
              </p>
              @enderror
            </div>
            <div class="form-group">
              <label for="status">Status</label>
              <div class="form-check">
                <input class="form-check-input" type="radio" name="status" id="status" value="Siap Terbang" {{
                  old('status')=='Siap Terbang' ? 'checked' : '' }}>
                <label class="form-check-label" for="status">
                  Siap Terbang
                </label>
              </div>
              <div class="form-check">
                <input class="form-check-input" type="radio" name="status" id="status1" value="Dalam Perawatan" {{
                  old('status')=='Dalam Perawatan' ? 'checked' : '' }}>
                <label class="form-check-label" for="status1">
                  Dalam Perawatan
                </label>
              </div>
            </div>
            <div class="form-group">
              <label for="kuota">kuota</label>
              <input type="text" class="form-control" id="kuota" name="kuota" required value="{{ old('kuota') }}">
              @error('kuota')
              <p class="text-danger">
                {{ $message }}
              </p>
              @enderror
            </div>
            <div class="form-group">
              <label for="gambar" class="form-label">Gambar Pesawat</label>
              <img class="img-preview img-fluid mb-3 col-sm-5 d-block">
              <input class="form-control-file" type="file" id="gambar" name="gambar" onchange="previewImage()">
              @error('gambar')
              <p class="text-danger">
                {{ $message }}
              </p>
              @enderror
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
<script>
  function previewImage() {
      const gambar = document.querySelector('#gambar');
      const imgPreview = document.querySelector('.img-preview');
      const blob = URL.createObjectURL(gambar.files[0]);
      imgPreview.src = blob;
    }
</script>
@endpush