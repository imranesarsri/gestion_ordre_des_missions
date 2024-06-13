<li class="nav-item">
    <a href="{{ route('personnels.index') }}" class="nav-link {{ Request::is('personnels*') ? 'active' : '' }}">
        <i class="fa-solid fa-users mr-2"></i>
        <p>{{ __('Layouts/Menu.staff') }}</p>
    </a>
</li>
