@extends('layouts.app')

@section('title')
Edit User | {{ config('app.name') }}
@endsection

@section('content')
<div class="section-header">
  <h1>Edit Data User</h1>
  <div class="section-header-breadcrumb">
    <div class="breadcrumb-item"><a href="#">Dashboard</a></div>
    <div class="breadcrumb-item"><a href="#">Data User</a></div>
    <div class="breadcrumb-item active">Edit Data</div>
  </div>
</div>

<div class="section-body">
  <div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-body">
          <form action="{{ route('dashboard.user.update', $user->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
              <label for="name">Nama</label>
              <input type="text" class="form-control" id="name" name="name" value="{{ old('name', $user->name) }}"
                required>
              @error('name')
              <p class="text-danger">
                {{ $message }}
              </p>
              @enderror
            </div>
            <div class="form-group">
              <label for="email">Email</label>
              <input type="text" class="form-control" id="email" name="email" value="{{ old('email', $user->email) }}"
                required>
              @error('email')
              <p class="text-danger">
                {{ $message }}
              </p>
              @enderror
            </div>
            <div class="form-group">
              <label for="password">Password</label>
              <input type="password" class="form-control" id="password" name="password" value="{{ old('password') }}">
              @error('password')
              <p class="text-danger">
                {{ $message }}
              </p>
              @enderror
            </div>
            <div class="form-group">
              <label for="role">Role</label>
              <div class="form-check">
                <input class="form-check-input" type="radio" name="role" id="admin" value="admin" {{ old('role',
                  $user->role)=='admin' ? 'checked' : '' }}>
                <label class="form-check-label" for="admin">
                  Admin
                </label>
              </div>
              <div class="form-check">
                <input class="form-check-input" type="radio" name="role" id="user" value="user" {{ old('role',
                  $user->role)=='user'
                ? 'checked' : '' }}>
                <label class="form-check-label" for="user">
                  User
                </label>
              </div>
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