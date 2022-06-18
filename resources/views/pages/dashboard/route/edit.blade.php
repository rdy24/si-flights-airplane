@extends('layouts.app')

@section('title')
Edit Rute | {{ config('app.name') }}
@endsection

@push('css-libraries')
<link rel="stylesheet" href={{ asset("assets/module/select2/dist/css/select2.min.css") }}>
@endpush

@section('content')
<div class="section-header">
  <h1>Edit Data Rute</h1>
  <div class="section-header-breadcrumb">
    <div class="breadcrumb-item"><a href="#">Dashboard</a></div>
    <div class="breadcrumb-item"><a href="#">Data Rute</a></div>
    <div class="breadcrumb-item active">Edit Data</div>
  </div>
</div>

<div class="section-body">
  <div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-body">
          <form action="{{ route('dashboard.route.update', $route->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
              <label for="airport_origin_id">Bandara Asal</label>
              <select name="airport_origin_id" required class="form-control select2">
                @foreach($airports as $airport)
                <option value="{{ $airport->id }}" {{ old('airport_origin_id', $route->airport_origin_id)==$airport->id
                  ? 'selected' : '' }}>
                  {{ $airport->name }}
                </option>
                @endforeach
              </select>
              @error('airport_origin_id')
              <div class="invalid-feedback">
                {{ $message }}
              </div>
              @enderror
            </div>
            <div class="form-group">
              <label for="airport_destination_id">Bandara Tujuan</label>
              <select name="airport_destination_id" required class="form-control select2">
                @foreach($airports as $airport)
                <option value="{{ $airport->id }}" {{ old('airport_destination_id', $route->
                  airport_destination_id)==$airport->id ? 'selected' : '' }}>
                  {{ $airport->name }}
                </option>
                @endforeach
              </select>
              @error('airport_destination_id')
              <div class="invalid-feedback">
                {{ $message }}
              </div>
              @enderror
            </div>
            <div class="form-group">
              <label for="kode_rute">Kode Rute</label>
              <input type="text" class="form-control" id="kode_rute" name="kode_rute" required
                value="{{ old('kode_rute', $route->kode_rute) }}">
              @error('kode_rute')
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
<script src={{ asset("assets/module/select2/dist/js/select2.full.min.js") }}></script>
@endpush

@push('js-page')
<script src={{ asset("assets/js/page/forms-advanced-forms.js") }}></script>
@endpush