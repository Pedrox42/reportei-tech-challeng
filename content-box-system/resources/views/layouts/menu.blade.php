<li class="nav-item {{ Request::route()->getPrefix() == '/content-boxes' || Route::is('content-box.index') ? 'menu-open' : ''}}">
    <a href="#" class="nav-link">
        <i class="fas fa-box-open nav-icon"></i>
        <p>
            Content Boxes
            <i class="right fas fa-angle-left"></i>
        </p>
    </a>
    <ul class="nav nav-treeview">
        <li class="nav-item">
            <a href="{{ route('content-box.index') }}" class="nav-link {{ Route::is('content-box.index') ? 'active' : ''}}">
                <i class="fas fa-boxes pr-1"></i>
                <p> Todas</p>
            </a>
        </li>
    </ul>
    <ul class="nav nav-treeview">
        <li class="nav-item">
            <a href="{{ route('content-box.favorites') }}" class="nav-link {{ Route::is('content-box.favorites') ? 'active' : ''}}">
                <i class="fas fa-star pr-1"></i>
                <p> Favoritas</p>
            </a>
        </li>
    </ul>
</li>
<li class="nav-item {{ Request::route()->getPrefix() == '/minha-conta' ? 'menu-open' : ''}}">
    <a href="#" class="nav-link">
        <i class="nav-icon fas fa-user"></i>
        <p>
            Minha conta
        </p>
        <i class="right fas fa-angle-left"></i>
    </a>
    <ul class="nav nav-treeview">
        <li class="nav-item">
            <a href="{{ route('editar-perfil') }}" class="nav-link {{ Route::is('editar-perfil') ? 'active' : ''}}">
                <i class="fas fa-edit"></i>
                <p>Editar perfil</p>
            </a>
        </li>
        <li class="nav-item">
            <a href="#" class="nav-link" onclick="document.getElementById('logout').submit()">
                <i class="fas fa-sign-out-alt"></i>
                <p>Sair</p>
                <form action="{{ route('logout') }}" method="post" id="logout">
                    @csrf
                </form>
            </a>
        </li>
    </ul>
</li>
