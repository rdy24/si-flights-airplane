@extends('layouts.app')

@section('title')
Edit Maskapai | {{ config('app.name') }}
@endsection

@section('content')
<div class="section-header">
  <h1>Edit Data Maskapai</h1>
  <div class="section-header-breadcrumb">
    <div class="breadcrumb-item"><a href="#">Dashboard</a></div>
    <div class="breadcrumb-item"><a href="#">Data Maskapai</a></div>
    <div class="breadcrumb-item active">Edit Data</div>
  </div>
</div>

<div class="section-body">
  <div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-body">
          <form action="{{ route('dashboard.airline.update', $airline->id) }}" method="POST"
            enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="form-group">
              <label for="nama">Nama Maskapai</label>
              <input type="text" class="form-control" id="nama" name="nama" value="{{ old('nama', $airline->nama) }}"
                required>
              @error('nama')
              <p class="text-danger">
                {{ $message }}
              </p>
              @enderror
            </div>
            <div class="form-group">
              <label for="kode_maskapai">Kode Maskapai</label>
              <input type="text" class="form-control" id="kode_maskapai" name="kode_maskapai"
                value="{{ old('kode_maskapai', $airline->kode_maskapai) }}" required>
              @error('kode_maskapai')
              <p class="text-danger">
                {{ $message }}
              </p>
              @enderror
            </div>
            <div class="form-group">
              <label for="logo" class="form-label">Logo</label>
              <img class="img-preview img-fluid mb-3 col-sm-5 d-block"
                src="{{ $airline->logo ? asset('storage/' . $airline->logo) : '' }}">
              <input class="form-control-file" type="file" id="logo" name="logo" onchange="previewImage()">
              @error('logo')
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

@push('js-page')
<script>
  function previewImage() {
      const logo = document.querySelector('#logo');
      const imgPreview = document.querySelector('.img-preview');
      const blob = URL.createObjectURL(logo.files[0]);
      imgPreview.src = blob;
    }
</script>
@endpush