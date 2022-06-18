@extends('layouts.app')

@section('title')
Tambah Tiket | {{ config('app.name') }}
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
  <h1>Tambah Data Tiket</h1>
  <div class="section-header-breadcrumb">
    <div class="breadcrumb-item"><a href="#">Dashboard</a></div>
    <div class="breadcrumb-item"><a href="#">Data Tiket</a></div>
    <div class="breadcrumb-item active">Tambah Data</div>
  </div>
</div>

<div class="section-body">
  <div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-body">
          <form action="{{ route('dashboard.ticket.store') }}" method="POST">
            @csrf
            <div class="form-group">
              <label for="customer_id">Nama</label>
              <select name="customer_id" required class="form-control select2">
                @foreach($customers as $customer)
                <option value="{{ $customer->id }}" {{ old('customer_id')==$customer->id ? 'selected' : '' }}>
                  {{ $customer->nama }}
                </option>
                @endforeach
              </select>
              @error('customer_id')
              <p class="text-danger">
                {{ $message }}
              </p>
              @enderror
            </div>
            <div class="form-group">
              <label for="schedule_id">Jadwal terbang</label>
              <select name="schedule_id" required class="form-control select2">
                @foreach($schedules as $schedule)
                <option value="{{ $schedule->id }}" {{ old('schedule_id')==$schedule->id ? 'selected' : '' }}>
                  {{ $schedule->plane->airline->nama ?? ''}} - {{ $schedule->plane->nama ?? ''}} - {{
                  $schedule->waktu_berangkat }} - {{ $schedule->waktu_tiba }}
                </option>
                @endforeach
              </select>
              @error('schedule_id')
              <p class="text-danger">
                {{ $message }}
              </p>
              @enderror
            </div>
            <div class="form-group">
              <label for="airplane_seat_id">Kursi</label>
              <select name="airplane_seat_id" required class="form-control select2">
                @foreach($airplane_seats as $airplane_seat)
                <option value="{{ $airplane_seat->id }}" {{ old('airplane_seat_id')==$airplane_seat->id ? 'selected' :
                  '' }}>
                  {{ $airplane_seat->plane->airline->nama ?? ''}} - {{ $airplane_seat->plane->nama ?? ''}} - {{
                  $airplane_seat->kelas_kursi }}
                </option>
                @endforeach
              </select>
              @error('airplane_seat_id')
              <p class="text-danger">
                {{ $message }}
              </p>
              @enderror
            </div>
            <div class="form-group">
              <label for="tanggal_pesan">Tanggal Pesan</label>
              <input type="text" class="form-control datepicker" id="tanggal_pesan" name="tanggal_pesan" required
                value="{{ old('tanggal_pesan') }}">
              @error('tanggal_pesan')
              <p class="text-danger">
                {{ $message }}
              </p>
              @enderror
            </div>
            <div class="form-group">
              <label for="status">Status</label>
              <div class="form-check">
                <input class="form-check-input" type="radio" name="status" id="status" value="Belum Terpakai" {{
                  old('status')=='Belum Terpakai' ? 'checked' : '' }}>
                <label class="form-check-label" for="status">
                  Belum Terpakai
                </label>
              </div>
              <div class="form-check">
                <input class="form-check-input" type="radio" name="status" id="status1" value="Terpakai" {{
                  old('status')=='Terpakai' ? 'checked' : '' }}>
                <label class="form-check-label" for="status1">
                  Terpakai
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