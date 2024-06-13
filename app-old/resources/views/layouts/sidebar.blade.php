<aside class="main-sidebar sidebar-dark-info elevation-4">
    <a href="{{ route('home') }}" class="brand-link">
        <img src="{{asset('assets/images/logo.png')}}"
             alt="logo ofppt"
             class="brand-image img-circle elevation-3">
        <span class="brand-text font-weight-light h6">Gestion Personnels</span>
    </a>

    <div class="sidebar">
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                @include('layouts.menu')
            </ul>
        </nav>
    </div>

</aside>
