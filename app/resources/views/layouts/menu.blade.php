<!-- need to remove -->
@php
    $current_route = $_SERVER['REQUEST_URI'];
@endphp

<!-- Accueil -->
<li class="nav-item">
    <a href="{{ route('home') }}" class="nav-link {{ Request::is('/') ? 'active' : '' }}">
        <i class="nav-icon fas fa-home "></i>
        <p>{{ __('Layouts/Menu.home') }}</p>
    </a>
</li>

{{-- include menu personnels --}}
@include('layouts.pkg_PriseDeServices.personnelMenu')
{{-- include menu Categories --}}
@include('layouts.pkg_PriseDeServices.categorieMenu')
{{-- include menu Congés --}}
@include('layouts.pkg_Absences.absenceMenu')
{{-- include menu Congés --}}
@include('layouts.pkg_Conges.congeMenu')
{{-- include menu missions --}}
@include('layouts.pkg_OrderDesMissions.missionMenu')


<!-- Parameter -->
{{-- @can('index-Fonction') --}}
<li class="nav-item">
    <a href="#" class="nav-link {{ Request::is('parametre*') ? 'active' : '' }}">
        <i class="nav-icon fas fa-cogs"></i>
        <p>
            {{ __('Layouts/Menu.parameters') }}
            <i class="right fas fa-angle-left"></i>
        </p>
    </a>
    <ul class="nav nav-treeview" style="display: none;">

        <!-- Avancement -->
        <li class="nav-item ">
            <a href="{{-- route('avancement.index') --}}" class="nav-link  {{ Request::is('*avancement*') ? 'active' : '' }}">
                <i class="far fa-chart-bar nav-icon"></i>
                <p>{{ __('Layouts/Menu.progress') }}</p>
            </a>

            <!-- Motif -->
        </li>
        <li class="nav-item">
            <a href="{{-- route('motifs.index') --}}" class="nav-link {{ Request::is('*motifs*') ? 'active' : '' }}">
                <i class="fa-solid fa-feather-pointed mr-2"></i>
                <p>{{ __('Layouts/Menu.reason') }}</p>
            </a>
        </li>

        <!-- Fonction -->
        <li class="nav-item">
            <a href="{{-- route('fonctions.index') --}}" class="nav-link {{ Request::is('*fonctions*') ? 'active' : '' }}">
                <i class="fa-solid fa-person-circle-question mr-2"></i>
                <p>{{ __('Layouts/Menu.function') }}</p>
            </a>
        </li>

        <!-- Ville -->
        <li class="nav-item">
            <a href="{{-- route('ville.index') --}}" class="nav-link {{ Request::is('*ville*') ? 'active' : '' }}">
                <i class="fas fa-city nav-icon mr-2"></i>
                <p>{{ __('Layouts/Menu.city') }}</p>
            </a>
        </li>

        <!-- Grad -->
        <li class="nav-item">
            <a href="{{-- route('ville.index') --}}" class="nav-link">
                <i class="fa-solid fa-chalkboard-user mr-2"></i>
                <p>{{ __('Layouts/Menu.grade') }}</p>
            </a>
        </li>

        <!-- Etablissement -->
        <li class="nav-item">
            <a href="{{-- route('etablissement.index') --}}" class="nav-link {{ Request::is('*etablissement*') ? 'active' : '' }}">
                <i class="fa-solid fa-school mr-2"></i>
                <p>{{ __('Layouts/Menu.establissment') }}</p>
            </a>
        </li>

        <!-- Specialite -->
        <li class="nav-item">
            <a href="{{-- route('specialite.index') --}}" class="nav-link {{ Request::is('*specialite*') ? 'active' : '' }}">
                <i class="fa-solid fa-user-doctor mr-2"></i>
                <p>{{ __('Layouts/Menu.specialty') }}</p>
            </a>
        </li>
    </ul>
</li>
{{-- @endcan --}}


<!-- Autorisations -->
<li class="nav-item has-treeview">
    <a
        class="nav-link {{ strpos($current_route, 'utilisateurs') !== false || strpos($current_route, 'Autorisations') !== false ? 'active' : '' }}">
        <i class="nav-icon fas fa-user-lock"></i>
        <p>
            {{ __('Layouts/Menu.authorizations') }}
            <i class="fas fa-angle-left right"></i>
        </p>
    </a>
    <ul class="nav nav-treeview">

        <!-- Autorisations -->
        <li class="nav-item">
            <a href="{{-- route('autorisations.index') --}}"
                class="nav-link {{ strpos($current_route, 'Autorisation.index') !== false ? 'active' : '' }}">
                <i class=" far fa-check-circle nav-icon"></i>
                <p>{{ __('Layouts/Menu.authorization') }}</p>
            </a>
        </li>

        <!-- Role -->
        <li class="nav-item">
            <a href="{{-- route('roles.index') --}}"
                class="nav-link {{ strpos($current_route, 'roles') !== false ? 'active' : '' }}">
                <i class="far fa-user-circle nav-icon"></i>
                <p>{{ __('Layouts/Menu.role') }}</p>
            </a>
        </li>

        <!-- Controllers -->
        <li class="nav-item">
            <a href="{{-- route('controllers.index') --}}"
                class="nav-link {{ strpos($current_route, 'controllers') !== false ? 'active' : '' }}">
                <i class="fas fa-gamepad nav-icon"></i>
                <p>{{ __('Layouts/Menu.controllers') }}</p>
            </a>
        </li>

        <!-- Actions -->
        <li class="nav-item ">
            <a href="{{-- route('actions.index') --}}"
                class="nav-link {{ strpos($current_route, 'actions') !== false ? 'active' : '' }}">
                <i class="fas fa-cogs nav-icon"></i>
                <p>{{ __('Layouts/Menu.actions') }}</p>
            </a>
        </li>
    </ul>
</li>
