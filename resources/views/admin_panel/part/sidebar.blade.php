<div class="sidebar pe-4 pb-3">
    <nav class="navbar bg-light navbar-light">
        <a href="index.html" class="navbar-brand mx-4 mb-3">
            <h3 class="text-primary"><i class="fa fa-hashtag me-2"></i>{{ $organisation_name->name }}</h3>
        </a>
        <div class="d-flex align-items-center ms-4 mb-4">
            <div class="position-relative">
                <img class="rounded-circle" src="img/user.jpg" alt="" style="width: 40px; height: 40px;">
                <div class="bg-success rounded-circle border border-2 border-white position-absolute end-0 bottom-0 p-1"></div>
            </div>
            <div class="ms-3">
                <h6 class="mb-0">{{ Session::get('user_name') }}</h6>
                <span>Yönetici</span>
            </div>
        </div>
        <div class="navbar-nav w-100">
            <a href="/admin_index" class="nav-item nav-link {{ Request::is('admin_index') ? 'active' : '' }}">
                <i class="fa fa-tachometer-alt me-2"></i>Anasayfa
            </a>
            <a href="/announcement" class="nav-item nav-link {{ Request::is('announcement') ? 'active' : '' }}">
                <i class="fa fa-th me-2"></i>Duyurular
            </a>
            <a href="/" class="nav-item nav-link {{ Request::is('/') ? 'active' : '' }}">
                <i class="fa fa-keyboard me-2"></i>Dersler
            </a>
            <a href="/organisation" class="nav-item nav-link {{ Request::is('organisation') ? 'active' : '' }}">
                <i class="fa fa-table me-2"></i>Kurum Bilgisi
            </a>
            <a href="chart.html" class="nav-item nav-link {{ Request::is('chart.html') ? 'active' : '' }}">
                <i class="fa fa-chart-bar me-2"></i>Mesajlar
            </a>
            <a href="/manager" class="nav-item nav-link {{ Request::is('manager') ? 'active' : '' }}">
                <i class="fa fa-users me-2"></i>Yöneticiler
            </a>
        </div>


    </nav>
</div>