<li class="nav-item">
    <a href="{{ route('conges.index') }}" class="nav-link {{ Request::is('conges*') ? 'active' : '' }}">
        <i class="fa-solid fa-person-walking-luggage mr-2"></i>
        <p>{{ __('Layouts/Menu.leave') }}</p>
    </a>
</li>
