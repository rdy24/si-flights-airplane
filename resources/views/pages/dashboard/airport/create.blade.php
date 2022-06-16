@extends('layouts.app')

@section('title', 'Tambah Data Bandara')

@section('content')
<div class="section-header">
  <h1>Tambah Data Bandara</h1>
  <div class="section-header-breadcrumb">
    <div class="breadcrumb-item"><a href="#">Dashboard</a></div>
    <div class="breadcrumb-item"><a href="#">Data Bandara</a></div>
    <div class="breadcrumb-item active">Tambah Data</div>
  </div>
</div>

<div class="section-body">
  <div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-body">
          <form action="{{ route('dashboard.airport.store') }}" method="POST">
            @csrf
            <div class="form-group">
              <label for="name">Nama Bandara</label>
              <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}" required>
              @error('name')
              <div class="invalid-feedback">
                {{ $message }}
              </div>
              @enderror
            </div>
            <div class="form-group">
              <label for="alamat">Alamat</label>
              <input type="text" class="form-control" id="alamat" name="alamat" value="{{ old('alamat') }}" required>
              @error('alamat')
              <div class="invalid-feedback">
                {{ $message }}
              </div>
              @enderror
            </div>
            <div class="form-group">
              <label for="kota">Kota</label>
              <input type="text" class="form-control" id="kota" name="kota" value="{{ old('kota') }}" required>
              @error('kota')
              <div class="invalid-feedback">
                {{ $message }}
              </div>
              @enderror
            </div>
            <div class="form-group">
              <label for="negara">Negara</label>
              <input type="text" class="form-control" id="negara" name="negara" value="{{ old('negara') }}" required>
              @error('negara')
              <div class="invalid-feedback">
                {{ $message }}
              </div>
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