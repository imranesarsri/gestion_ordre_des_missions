<!-- need to remove -->
<li class="nav-item">
    <a href="{{ route('home') }}" class="nav-link {{ Request::is('/') ? 'active' : '' }}">
        <i class="nav-icon fas fa-home"></i>
        <p>
            Accueil
        </p>
    </a>
</li>
<li class="nav-item">
    <a href="{{ route('personnels.index') }}" class="nav-link {{ Request::is('personnels*') ? 'active' : '' }}">
        <i class="nav-icon fas fa-home"></i>
        <p>Personnels</p>
    </a>
</li>
{{-- conges --}}
<li class="nav-item">
    <a href="{{ route('conges.index') }}" class="nav-link {{ Request::is('conges*') ? 'active' : '' }}">
        <i class="fa-solid fa-person-walking-luggage"></i>
        <p>Conges</p>
    </a>
</li>
{{-- parameter --}}
@can('index-Fonction')
    <li class="nav-item">
    <a href="#" class="nav-link">
        <i class="nav-icon fas fa-cogs"></i>
        <p>
            Parameter
            <i class="right fas fa-angle-left"></i>
        </p>
    </a>
    <ul class="nav nav-treeview" style="display: none;">
        <li class="nav-item">
            <a href="{{ route('motifs.index') }}" class="nav-link {{ Request::is('motifs*') ? 'active' : '' }}">
                <i class="far fa-chart-bar nav-icon"></i>
                <p>Motif</p>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ route('fonctions.index') }}" class="nav-link {{ Request::is('fonctions*') ? 'active' : '' }}">
                <i class="far fa-cogs nav-icon"></i> 
                <p>Fonction</p>
            </a>
        </li>
        <li class="nav-item">
            <a href="pages/charts/inline.html" class="nav-link">
                <i class="fas fa-city nav-icon"></i> 
                <p>Ville</p>
            </a>
        </li>
        <li class="nav-item">
            <a href="pages/charts/uplot.html" class="nav-link">
                <i class="fas fa-leaf nav-icon"></i>
                <p>Grad</p>
            </a>
        </li>
    </ul>
</li>
@endcan


