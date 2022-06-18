@extends('layouts.app')

@section('title')
Dashboard | {{ config('app.name') }}
@endsection

@section('content')
<section class="section">
  <div class="section-header">
    <h1>Dashboard</h1>
  </div>
  <div class="row">
    <div class="col-lg-3 col-md-6 col-sm-6 col-12">
      <div class="card card-statistic-1">
        <div class="card-icon bg-primary">
          <i class="fas fa-plane-arrival"></i>
        </div>
        <div class="card-wrap">
          <div class="card-header">
            <h4>Bandara</h4>
          </div>
          <div class="card-body">
            {{ $airport }}
          </div>
        </div>
      </div>
    </div>
    <div class="col-lg-3 col-md-6 col-sm-6 col-12">
      <div class="card card-statistic-1">
        <div class="card-icon bg-danger">
          <i class="fas fa-route"></i>
        </div>
        <div class="card-wrap">
          <div class="card-header">
            <h4>Rute</h4>
          </div>
          <div class="card-body">
            {{ $route }}
          </div>
        </div>
      </div>
    </div>
    <div class="col-lg-3 col-md-6 col-sm-6 col-12">
      <div class="card card-statistic-1">
        <div class="card-icon bg-warning">
          <i class="fas fa-paper-plane"></i>
        </div>
        <div class="card-wrap">
          <div class="card-header">
            <h4>Maskapai</h4>
          </div>
          <div class="card-body">
            {{ $airline }}
          </div>
        </div>
      </div>
    </div>
    <div class="col-lg-3 col-md-6 col-sm-6 col-12">
      <div class="card card-statistic-1">
        <div class="card-icon bg-success">
          <i class="fas fa-plane"></i>
        </div>
        <div class="card-wrap">
          <div class="card-header">
            <h4>Pesawat</h4>
          </div>
          <div class="card-body">
            {{ $plane }}
          </div>
        </div>
      </div>
    </div>
    <div class="col-lg-3 col-md-6 col-sm-6 col-12">
      <div class="card card-statistic-1">
        <div class="card-icon bg-primary">
          <i class="fas fa-user"></i>
        </div>
        <div class="card-wrap">
          <div class="card-header">
            <h4>Customer</h4>
          </div>
          <div class="card-body">
            {{ $customer }}
          </div>
        </div>
      </div>
    </div>
    <div class="col-lg-3 col-md-6 col-sm-6 col-12">
      <div class="card card-statistic-1">
        <div class="card-icon bg-warning">
          <i class="fas fa-circle"></i>
        </div>
        <div class="card-wrap">
          <div class="card-header">
            <h4>Admin</h4>
          </div>
          <div class="card-body">
            {{ $admin }}
          </div>
        </div>
      </div>
    </div>
    <div class="col-lg-3 col-md-6 col-sm-6 col-12">
      <div class="card card-statistic-1">
        <div class="card-icon bg-info">
          <i class="fas fa-ticket-alt"></i>
        </div>
        <div class="card-wrap">
          <div class="card-header">
            <h4>Tiket Aktif</h4>
          </div>
          <div class="card-body">
            {{ $ticket }}
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
@endsection