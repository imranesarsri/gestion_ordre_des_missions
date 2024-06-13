<li class="nav-item">
    <a href="{{route('absence.index')}}" class="nav-link {{ Request::is('absence*') ? 'active' : '' }}">
        <i class="fa-regular fa-calendar-minus mr-2"></i>
        <p>{{ __('Layouts/Menu.absences') }}</p>
    </a>
</li>
