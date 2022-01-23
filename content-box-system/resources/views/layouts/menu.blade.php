<!-- need to remove -->
<li class="nav-item">
    <a href="{{ route('home') }}" class="nav-link active">
        <i class="nav-icon fas fa-home"></i>
        <p>Home</p>
    </a>
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
    </ul>
</li>
<li class="nav-item {{ Request::route()->getPrefix() == '/content-boxes' ? 'menu-open' : ''}}">
    <a href="#" class="nav-link">
        <i class="fas fa-box-open nav-icon"></i>
        <p>
            Content Boxes
            <i class="right fas fa-angle-left"></i>
        </p>
    </a>
    <ul class="nav nav-treeview">
        <li class="nav-item">
            <a href="{{ route('content-box.index') }}" class="nav-link">
                <i class="fas fa-boxes pr-1"></i>
                <p> Todas</p>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ route('content-box.create') }}" class="nav-link">
                <i class="fas fa-plus pr-1"></i>
                <p> Adicionar</p>
            </a>
        </li>
    </ul>
</li>
