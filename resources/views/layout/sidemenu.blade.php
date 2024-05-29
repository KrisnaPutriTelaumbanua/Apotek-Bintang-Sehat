<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-success sidebar sidebar-dark accordion" id="accordionSidebar">
    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
        <div class="sidebar-brand-icon rotate-n-15">
            <i class="fas fa-capsules"></i>
        </div>
        <div class="sidebar-brand-text mx-3">Apotek</div>
    </a>

{{--    <!-- Nav Item - Dashboard -->--}}
{{--    <li class="nav-item active">--}}
{{--        <a class="nav-link" href="index.html">--}}
{{--            <i class="fas fa-fw fa-tachometer-alt"></i>--}}
{{--            <span>Dashboard</span></a>--}}
{{--    </li>--}}



    <!-- Nav Item - Charts -->
    <li class="nav-item">
        <a href={{url('/app')}} class="nav-link" >
            <i class="fas fa-money-bill-wave"></i>
            <span>Kasir</span></a>
    </li>

    <li class="nav-item">
        <a href="{{url('/product')}}" class="nav-link" >
            <i class="fas fa-prescription-bottle"></i>
            <span>Data Obat</span></a>
    </li>



    <li class="nav-item" style="display: flex; align-items: center;">
        <a href="{{ url('/karyawan') }}" class="nav-link">
            <i class="nav-icon fas fa-users" style="margin-right: 5px;"></i>
            <span>Karyawan</span>
        </a>
    </li>

    <li class="nav-item" style="display: flex; align-items: center;">
        <a href="{{ url('/shift') }}" class="nav-link">
            <i class="nav-icon fas fa-clock" style="margin-right: 5px;"></i>
            <span>Shift</span>
        </a>
    </li>

</ul>
<!-- End of Sidebar -->
