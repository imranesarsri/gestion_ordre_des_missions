<li class="nav-item">
    <a href="{{ route('missions.index') }}" class="nav-link {{ Request::is('OrderDesMissions*') ? 'active' : '' }}">
        <i class="fa-solid fa-business-time mr-2"></i>
        <p>{{ __('Layouts/Menu.missions') }}</p>
    </a>
</li>
