<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="#">
        <div class="sidebar-brand-icon rotate-n-15">
            <i class="fas fa-laugh-wink"></i>
        </div>
        <div class="sidebar-brand-text mx-3">Rivaldo Florist</div>
    </a>

     <!-- Divider -->
     <hr class="sidebar-divider my-0">

     <!-- Nav Item - Dashboard -->
     <li class="nav-item active">
         <a class="nav-link" href="{{ route('admin.dahsboard.index') }}">
             <i class="fas fa-fw fa-tachometer-alt"></i>
             <span>Dashboard</span></a>
     </li>
 
    <!-- Divider -->
    <hr class="sidebar-divider my-0">
    
    <li class="nav-item active">
        <a class="nav-link" href="{{ route('papans.index') }}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Daftar Papan Bunga</span>
        </a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <li class="nav-item active">
        <a class="nav-link" href="{{ route('admin.messages.index') }}">
            <i class="fas fa-envelope"></i>
            <span>Daftar Kritik/Saran</span></a>
    </li>

<!-- Divider -->
<hr class="sidebar-divider my-0">
    
<li class="nav-item active">
    <a class="nav-link" href="{{ route('admin.galeri.index') }}">
        <i class="fas fa-fw fa-tachometer-alt"></i>
        <span>Galeri</span>
    </a>
</li>

    <li class="nav-item active">
        <a class="nav-link" onclick="document.getElementById('logout-form').submit()" href="#">
            <i class="fa-solid fa-right-from-bracket"></i>
            <span>Logout</span>
        </a>
        <form id="logout-form" action="{{ route('logout') }}" method="post">
            @csrf
        </form>
    </li>
    
    


</ul>

