@extends('admin.layout.app')
@section('body')

<style>
.brand-link {
    border-bottom: none;
}
</style>
<div class="hold-transition sidebar-mini">
    <div class="wrapper">

        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand navbar-white navbar-light" style="height: 43px;">
            <!-- Left navbar links -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
                </li>
                <li class="nav-item d-none d-sm-inline-block">
                    <a href="{{ route('admin.dashboard') }}" class="nav-link">Home</a>
                </li>
            </ul>

            <!-- Right navbar links -->
            <ul class="navbar-nav ml-auto">

                <li class="nav-item">
                    <a class="nav-link" data-widget="fullscreen" href="#" role="button">
                        <i class="fas fa-expand-arrows-alt"></i>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- /.navbar -->

        <aside class="main-sidebar sidebar-dark-primary elevation-4">
            <!-- Brand Logo -->
            <a href="{{ route('admin.dashboard') }}" class="brand-link" style="height: 43px;">

                <span class="brand-text font-weight-light" style="margin-top: 0px;">Vudoo Live Admin Panel </span>
            </a>
            <!-- Sidebar -->
            <div class="sidebar">
                <!-- Sidebar user panel (optional) -->
                <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                    <div class="image">
                        <img src="{{ asset('assets/vudoo_logo.png') }}" class="img-circle elevation-2" alt="User Image">
                    </div>
                    <div class="info">
                        <a href="#" class="d-block">{{ auth()->user()->name }}</a>
                    </div>
                </div>
                <!-- Sidebar Menu -->
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                        data-accordion="false">

                        <li class="nav-item">
                            @if(Session::get('page')=="dashboard")
                            <?php $active = "active";?>
                            @else
                            <?php $active = "";?>
                            @endif
                            <a href="{{ route('admin.dashboard') }}" class="nav-link {{$active}}">
                                <i class="fa fa-home nav-icon"></i>
                                <p>Home</p>
                            </a>
                        </li>
{{--                        <li class="nav-item ">--}}
{{--                            @if(Session::get('page')=="user")--}}
{{--                            <?php $active = "active";?>--}}
{{--                            @else--}}
{{--                            <?php $active = "";?>--}}
{{--                            @endif--}}
{{--                            <a href="#" class="nav-link {{$active}}">--}}
{{--                                <i class="nav-icon fas fa-user"></i>--}}
{{--                                <p>--}}
{{--                                    User--}}
{{--                                    <i class="fas fa-angle-left right"></i>--}}
{{--                                </p>--}}
{{--                            </a>--}}
{{--                            <ul class="nav nav-treeview">--}}
{{--                                <!-- all users -->--}}
{{--                                <li class="nav-item">--}}
{{--                                    @if(Session::get('page')=="user")--}}
{{--                                    <?php $active = "active";?>--}}
{{--                                    @else--}}
{{--                                    <?php $active = "";?>--}}
{{--                                    @endif--}}
{{--                                    <a href="{{ route('admin.users') }}" class="nav-link {{$active}}">--}}
{{--                                        <i class="fas fa-users nav-icon"></i>--}}
{{--                                        <p>All Users</p>--}}
{{--                                    </a>--}}
{{--                                </li>--}}
{{--                                <!-- all hosts -->--}}
{{--                                <li class="nav-item">--}}
{{--                                    @if(Session::get('page')=="host")--}}
{{--                                    <?php $active = "active";?>--}}
{{--                                    @else--}}
{{--                                    <?php $active = "";?>--}}
{{--                                    @endif--}}
{{--                                    <a href="{{ route('admin.hosts') }}" class="nav-link {{$active}}">--}}
{{--                                        <i class="fas fa-users nav-icon"></i>--}}
{{--                                        <p>All Hosts</p>--}}
{{--                                    </a>--}}
{{--                                </li>--}}
{{--                                <li class="nav-item">--}}
{{--                                    @if(Session::get('page')=="banneduser")--}}
{{--                                    <?php $active = "active";?>--}}
{{--                                    @else--}}
{{--                                    <?php $active = "";?>--}}
{{--                                    @endif--}}
{{--                                    <a href="{{ route('admin.bannedUsers') }}" class="nav-link {{$active}}">--}}
{{--                                        <i class="fa fa-ban nav-icon"></i>--}}
{{--                                        <p>Banned Users</p>--}}
{{--                                    </a>--}}
{{--                                </li>--}}
{{--                            </ul>--}}
{{--                        </li>--}}
{{--                        <li class="nav-item">--}}
{{--                            <a href="#" class="nav-link">--}}
{{--                                <i class="nav-icon fas fa-video"></i>--}}
{{--                                <p>--}}
{{--                                    Live--}}
{{--                                    <i class="fas fa-angle-left right"></i>--}}
{{--                                </p>--}}
{{--                            </a>--}}
{{--                            <ul class="nav nav-treeview">--}}
{{--                                <li class="nav-item">--}}
{{--                                    @if(Session::get('page')=="user")--}}
{{--                                    <?php $active = "active";?>--}}
{{--                                    @else--}}
{{--                                    <?php $active = "";?>--}}
{{--                                    @endif--}}
{{--                                    <a href="{{ route('admin.live.running') }}" class="nav-link">--}}
{{--                                        <i class="fas fa-video nav-icon"></i>--}}
{{--                                        <p>Running Live</p>--}}
{{--                                    </a>--}}
{{--                                </li>--}}
{{--                                <li class="nav-item">--}}
{{--                                    @if(Session::get('page')=="user")--}}
{{--                                    <?php $active = "active";?>--}}
{{--                                    @else--}}
{{--                                    <?php $active = "";?>--}}
{{--                                    @endif--}}
{{--                                    <a href="{{ route('admin.live.all') }}" class="nav-link">--}}
{{--                                        <i class="fas fa-video nav-icon"></i>--}}
{{--                                        <p>All Live</p>--}}
{{--                                    </a>--}}
{{--                                </li>--}}
{{--                            </ul>--}}
{{--                        </li>--}}
{{--                        <li class="nav-item">--}}
{{--                            <a href="#" class="nav-link">--}}
{{--                                <i class="nav-icon fas fa-user"></i>--}}
{{--                                <p>--}}
{{--                                    Agency--}}
{{--                                    <i class="fas fa-angle-left right"></i>--}}
{{--                                </p>--}}
{{--                            </a>--}}
{{--                            <ul class="nav nav-treeview">--}}
{{--                                <li class="nav-item">--}}
{{--                                    <a href="{{ route('admin.reseller.create') }}" class="nav-link">--}}
{{--                                        <i class="fas fa-user-plus nav-icon"></i>--}}
{{--                                        <p>Add Agency</p>--}}
{{--                                    </a>--}}
{{--                                </li>--}}
{{--                                <li class="nav-item">--}}
{{--                                    <a href="{{ route('admin.reseller.index') }}" class="nav-link">--}}
{{--                                        <i class="fas fa-users nav-icon"></i>--}}
{{--                                        <p>Host Agency</p>--}}
{{--                                    </a>--}}
{{--                                </li>--}}
{{--                                <li class="nav-item">--}}
{{--                                    <a href="{{ route('admin.coin-agency.index') }}" class="nav-link">--}}
{{--                                        <i class="fas fa-users nav-icon"></i>--}}
{{--                                        <p>Coin Agency</p>--}}
{{--                                    </a>--}}
{{--                                </li>--}}
{{--                            </ul>--}}
{{--                        </li>--}}
{{--                        <li class="nav-item">--}}
{{--                            <a href="#" class="nav-link">--}}
{{--                                <i class="nav-icon fas fa-coins"></i>--}}
{{--                                <p>--}}
{{--                                    Coin Recharge--}}
{{--                                    <i class="fas fa-angle-left right"></i>--}}
{{--                                </p>--}}
{{--                            </a>--}}
{{--                            <ul class="nav nav-treeview">--}}
{{--                                <li class="nav-item">--}}
{{--                                    <a href="{{ route('admin.coin-recharge.recharge') }}" class="nav-link">--}}
{{--                                        <i class="fas fa-coins nav-icon"></i>--}}
{{--                                        <p>Coin Recharge</p>--}}
{{--                                    </a>--}}
{{--                                </li>--}}
{{--                                <li class="nav-item">--}}
{{--                                    <a href="{{ route('admin.coin-recharge.recharge-history') }}" class="nav-link">--}}
{{--                                        <i class="fas fa-coins nav-icon"></i>--}}
{{--                                        <p>Recharge History</p>--}}
{{--                                    </a>--}}
{{--                                </li>--}}
{{--                            </ul>--}}
{{--                        </li>--}}
{{--                        <li class="nav-item">--}}
{{--                            <a href="#" class="nav-link">--}}
{{--                                <i class="nav-icon fas fa-money-bill"></i>--}}
{{--                                <p>--}}
{{--                                    Salary--}}
{{--                                    <i class="fas fa-angle-left right"></i>--}}
{{--                                </p>--}}
{{--                            </a>--}}
{{--                            <ul class="nav nav-treeview">--}}
{{--                                <li class="nav-item">--}}
{{--                                    <a href="{{ route('admin.salary.salary-targets') }}" class="nav-link">--}}
{{--                                        <i class="fas fa-money-bill nav-icon"></i>--}}
{{--                                        <p>Salary Targets</p>--}}
{{--                                    </a>--}}
{{--                                </li>--}}
{{--                                <li class="nav-item">--}}
{{--                                    <a href="{{ route('admin.salary.salary') }}" class="nav-link">--}}
{{--                                        <i class="fas fa-money-bill nav-icon"></i>--}}
{{--                                        <p>Salaries</p>--}}
{{--                                    </a>--}}
{{--                                </li>--}}
{{--                            </ul>--}}
{{--                        </li>--}}
{{--                        <li class="nav-item">--}}
{{--                            <a href="#" class="nav-link">--}}
{{--                                <i class="nav-icon fas fa-store"></i>--}}
{{--                                <p>--}}
{{--                                    Assets--}}
{{--                                    <i class="fas fa-angle-left right"></i>--}}
{{--                                </p>--}}
{{--                            </a>--}}
{{--                            <ul class="nav nav-treeview">--}}
{{--                                <li class="nav-item">--}}
{{--                                    <a href="{{ route('admin.asset.gift.index') }}" class="nav-link">--}}
{{--                                        <i class="fas fa-gift nav-icon"></i>--}}
{{--                                        <p>Gifts</p>--}}
{{--                                    </a>--}}
{{--                                </li>--}}
{{--                                <li class="nav-item">--}}
{{--                                    <a href="{{ route('admin.asset.entrance.index') }}" class="nav-link">--}}
{{--                                        <i class="fas fa-gift nav-icon"></i>--}}
{{--                                        <p>Entrances</p>--}}
{{--                                    </a>--}}
{{--                                </li>--}}
{{--                                <li class="nav-item">--}}
{{--                                    <a href="{{ route('admin.asset.frame.index') }}" class="nav-link">--}}
{{--                                        <i class="fas fa-gift nav-icon"></i>--}}
{{--                                        <p>Frames</p>--}}
{{--                                    </a>--}}
{{--                                </li>--}}
{{--                            </ul>--}}
{{--                        </li>--}}
{{--                        <li class="nav-item">--}}
{{--                            <a href="{{ route('admin.logout') }}" class="nav-link">--}}
{{--                                <i class="nav-icon fas fa-sign-out-alt"></i>--}}
{{--                                <p>--}}
{{--                                    Logout--}}
{{--                                </p>--}}
{{--                            </a>--}}
{{--                        </li>--}}
                    </ul>
                </nav>
                <!-- /.sidebar-menu -->
            </div>
            <!-- /.sidebar -->
        </aside>

        @yield('content')


    </div>
</div>
@endsection
