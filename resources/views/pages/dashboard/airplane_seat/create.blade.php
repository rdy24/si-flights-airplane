@extends('layouts.app')

@section('title')
Tambah Kursi Pesawat | {{ config('app.name') }}
@endsection

@push('css-libraries')
<link rel="stylesheet" href={{ asset("assets/module/select2/dist/css/select2.min.css") }}>
@endpush

@section('content')
<div class="section-header">
  <h1>Tambah Data Kursi Pesawat</h1>
  <div class="section-header-breadcrumb">
    <div class="breadcrumb-item"><a href="#">Dashboard</a></div>
    <div class="breadcrumb-item"><a href="#">Data Kursi Pesawat</a></div>
    <div class="breadcrumb-item active">Tambah Data</div>
  </div>
</div>

<div class="section-body">
  <div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-body">
          <form action="{{ route('dashboard.airplane_seat.store') }}" method="POST">
            @csrf
            <div class="form-group">
              <label for="plane_id">Nama Pesawat</label>
              <select name="plane_id" required class="form-control select2">
                @foreach($planes as $plane)
                <option value="{{ $plane->id }}" {{ old('plane_id')==$plane->id ? 'selected' : '' }}>
                  {{ $plane->nama }}
                </option>
                @endforeach
              </select>
            </div>
            <div class="form-group">
              <label for="kuota">Kuota</label>
              <input type="text" class="form-control" id="kuota" name="kuota" required value="{{ old('kuota') }}">
              @error('kuota')
              <div class="invalid-feedback">
                {{ $message }}
              </div>
              @enderror
            </div>
            <div class="form-group">
              <label for="harga">Harga</label>
              <input type="text" class="form-control" id="harga" name="harga" required value="{{ old('harga') }}">
              @error('harga')
              <div class="invalid-feedback">
                {{ $message }}
              </div>
              @enderror
            </div>
            <div class="form-group">
              <label for="kelas_kursi">Kelas kursi</label>
              <div class="form-check">
                <input class="form-check-input" type="radio" name="kelas_kursi" id="ekonomi" value="Ekonomi" {{
                  old('kelas_kursi')=='Ekonomi' ? 'checked' : '' }}>
                <label class="form-check-label" for="ekonomi">
                  Ekonomi
                </label>
              </div>
              <div class="form-check">
                <input class="form-check-input" type="radio" name="kelas_kursi" id="bisnis" value="Bisnis" {{
                  old('kelas_kursi')=='Bisnis' ? 'checked' : '' }}>
                <label class="form-check-label" for="bisnis">
                  Bisnis
                </label>
              </div>
              <div class="form-check">
                <input class="form-check-input" type="radio" name="kelas_kursi" id="first" value="First" {{
                  old('kelas_kursi')=='First' ? 'checked' : '' }}>
                <label class="form-check-label" for="first">
                  First
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
<script src={{ asset("assets/module/select2/dist/js/select2.full.min.js") }}></script>
@endpush

@push('js-page')
<script src={{ asset("assets/js/page/forms-advanced-forms.js") }}></script>
@endpush