
<li class="nav-item">
    <a href="{{ route('livres.index') }}" class="nav-link {{ Request::is('livres*') ? 'active' : '' }}">
        <i class="nav-icon fas fa-home"></i>
        <p>Livres</p>
    </a>
</li>

<li class="nav-item">
    <a href="{{ route('specialites.index') }}" class="nav-link {{ Request::is('specialites*') ? 'active' : '' }}">
        <i class="nav-icon fas fa-home"></i>
        <p>Specialites</p>
    </a>
</li>
