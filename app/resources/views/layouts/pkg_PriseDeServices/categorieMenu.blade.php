<li class="nav-item">
    <a href="{{-- route('categories.index') --}}" class="nav-link {{ Request::is('categories*') ? 'active' : '' }}">
        <i class="fa-solid fa-list mr-2"></i>
        <p>{{ __('Layouts/Menu.categories') }}</p>
    </a>
</li>
