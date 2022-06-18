<div class="main-sidebar">
  <aside id="sidebar-wrapper">
    <div class="sidebar-brand">
      <a href="/dashboard">SI-Plane-Flights</a>
    </div>
    <div class="sidebar-brand sidebar-brand-sm">
      <a href="/dashboard">St</a>
    </div>
    <ul class="sidebar-menu">
      <li class="menu-header">Dashboard</li>
      <li class="{{ request()->routeIs('dashboard.') ? 'active' : '' }}"><a href="/dashboard" class="nav-link"><i
            class="fas fa-fire"></i><span>Dashboard</span></a>
      </li>
      <li class="menu-header">Data Master</li>
      <li class="{{ request()->routeIs('dashboard.airport.*') ? 'active' : '' }}"><a
          href="{{ route('dashboard.airport.index') }}" class="nav-link"><i class="fas fa-plane-arrival"></i><span> Data
            Bandara</span></a>
      </li>
      <li class="{{ request()->routeIs('dashboard.route.*') ? 'active' : '' }}"><a class="nav-link"
          href="{{ route('dashboard.route.index') }}"><i class="fas fa-route"></i> <span>Data Rute</span></a></li>
      <li class="{{ request()->routeIs('dashboard.airline.*') ? 'active' : '' }}"><a class="nav-link"
          href="{{ route('dashboard.airline.index') }}"><i class="fas fa-paper-plane"></i> <span>Data
            Maskapai</span></a></li>
      <li class="{{ request()->routeIs('dashboard.plane.*') ? 'active' : '' }}"><a class="nav-link"
          href="{{ route('dashboard.plane.index') }}"><i class="fas fa-plane"></i>
          <span>Data Pesawat</span></a></li>
      <li class="{{ request()->routeIs('dashboard.schedule.*') ? 'active' : '' }}"><a class="nav-link"
          href="{{ route('dashboard.schedule.index') }}"><i class="fas fa-calendar-alt"></i>
          <span>Data Jadwal</span></a></li>
      <li class=""><a class="nav-link" href="#"><i class="fas fa-chair"></i> <span>Data Kursi Pesawat</span></a>
      </li>
      <li class="menu-header">Data Customer</li>
      <li class=""><a class="nav-link" href="#"><i class="fas fa-user"></i> <span>Data Customer</span></a></li>
      <li class=""><a class="nav-link" href="#"><i class="fas fa-ticket-alt"></i> <span>Data Ticket</span></a></li>
      <li class="menu-header">Data Terhapus</li>
      <li class="nav-item dropdown {{ request()->routeIs('dashboard.trash.*') ? 'active' : '' }}">
        <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-trash"></i>
          <span>Trash</span></a>
        <ul class="dropdown-menu">
          <li class="{{ request()->routeIs('dashboard.trash.airport') ? 'active' : '' }}"><a class="nav-link"
              href="{{ route('dashboard.trash.airport') }}">Data Bandara</a></li>
  </aside>
</div>