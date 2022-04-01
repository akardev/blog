<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
                <div class="sidebar-brand-icon rotate-n-15">
                    <i class="fas fa-code"></i>
                </div>
                <div class="sidebar-brand-text mx-3">AKARDEV</div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item @if(Request::segment(2)==" panel") active @endif">
                <a class="nav-link" href="{{route('admin.dashboard')}}">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Panel</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                İçerik Yönetimi
            </div>

            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link @if(Request::segment(2)==" makaleler") in collapsed @endif" href="#"
                    data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
                    <i class="fas fa-newspaper"></i>
                    <span>Makaleler</span>
                </a>
                <div id="collapseTwo" class="collapse @if(Request::segment(2)==" makaleler") show @endif"
                    aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Makale İşlemleri:</h6>
                        <a class="collapse-item @if(Request::segment(2)==" makaleler" and !Request::segment(3)) active
                            @endif" href="{{route('admin.makaleler.index')}}">Tüm Makaleler</a>
                        <a class="collapse-item @if(Request::segment(2)==" makaleler" and Request::segment(3)=="olustur"
                            ) active @endif" href="{{route('admin.makaleler.create')}}">Yeni Makale Oluştur!</a>
                    </div>
                </div>
            </li>

            <!-- Nav Item - Utilities Collapse Menu -->
            <li class="nav-item  @if (Request::segment(2)==" kategoriler" ) active @endif">
                <a class="nav-link" href="{{route('admin.category.index')}}">
                    <i class="fas fa-list"></i>
                    <span>Kategoriler</span>
                </a>
            </li>


            <li class="nav-item">
                <a class="nav-link @if(Request::segment(2)==" makaleler") in collapsed @endif" href="#"
                    data-toggle="collapse" data-target="#collapsePage" aria-expanded="true"
                    aria-controls="collapsePage">
                    <i class="far fa-copy"></i>
                    <span>Sayfalar</span>
                </a>
                <div id="collapsePage" class="collapse @if(Request::segment(2)==" sayfalar") show @endif"
                    aria-labelledby="headingPage" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Sayfa İşlemleri:</h6>
                        <a class="collapse-item @if(Request::segment(2)==" sayfalar" and !Request::segment(3)) active
                            @endif" href="{{route('admin.pages.index')}}">Tüm Sayfalar</a>
                        <a class="collapse-item @if(Request::segment(2)==" sayfalar" and Request::segment(3)=="olustur"
                            ) active @endif" href="{{route('admin.pages.create')}}">Yeni Sayfa Oluştur!</a>
                    </div>
                </div>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Site Ayarları
            </div>

            <!-- Nav Item - Tables -->
            <li class="nav-item">
                <a class="nav-link" href="{{route('admin.config.index')}}">
                    <i class="fas fa-fw fa-cogs"></i>
                    <span>Ayarlar</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>


        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>



                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">






                        <div class="topbar-divider d-none d-sm-block"></div>

                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small">Barış Akar</span>
                                <img class="img-profile rounded-circle" src="{{asset('back')}}/img/ba.jpg">
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="userDropdown">
                                <!--  <a class="dropdown-item" href="#">
                                    <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Profile
                                </a>
                                <a class="dropdown-item" href="#">
                                    <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Settings
                                </a>
                                <a class="dropdown-item" href="#">
                                    <i class="fas fa-list fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Activity Log
                                </a> -->
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Çıkış
                                </a>
                            </div>
                        </li>

                    </ul>

                </nav>
                <!-- End of Topbar -->



                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">@yield('title')</h1>
                        <a target="_blank" href="{{route('homepage')}}"
                            class="d-none d-sm-inline-block btn btn-sm btn-dark shadow-sm"><i class="fas fa-globe"></i>
                            Siteyi görüntüle</a>
                    </div>