<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <div class="user-panel mt-3 pb-3 mb-3 d-flex justify-content-center">
        <a href="{{ route('content-box.index') }}" class="navbar-links-color text-center">
            <span class="brand-text">{{ config('app.name') }}</span>
        </a>
    </div>
    <div class="user-panel mt-3 pb-3 mb-3 d-flex justify-content-center">
        <div class="image">
            <img src="{{ asset('/img/defaults/user-default-image.png') }}" class="img-circle elevation-2" alt="User Image">
        </div>
        <a href="{{ route('content-box.index') }}" class="navbar-links-color info">
            <span href="#" class="brand-text">{{ Auth::user()->name }}</span>
        </a>
    </div>
    <div class="sidebar">
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar nav-child-indent flex-column" data-widget="treeview" role="menu" data-accordion="false">
                @include('layouts.menu')
            </ul>
        </nav>
    </div>
</aside>
