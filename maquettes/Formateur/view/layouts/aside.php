<?php
$current_route = $_SERVER['REQUEST_URI'];
?>

<aside class="main-sidebar sidebar-dark-info elevation-4 position-fixed">

    <a href="/Formateur/view/categorie" class="brand-link">
        <img src="/Formateur/view/assets/images/logo.png" alt="AdminLTE Logo"
            class="brand-image img-circle elevation-3">
        <span class="brand-text font-weight-light h6">Gestion Personnelles</span>
    </a>

    <div class="sidebar">
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">

                <!-- start package Categories -->
                <li class="nav-item">
                    <a href="/Formateur/view/categorie/index.php"
                        class="nav-link <?php echo (strpos($current_route, 'categorie') !== false) ? 'active' : ''; ?>">
                        <i class="fa-solid fa-list mr-2"></i>
                        <p class="">
                            Categories
                        </p>
                    </a>
                </li>
                <!-- end package Categories -->

                <!-- start package Congés -->
                <li class="nav-item">
                    <a href="/Formateur/view/conges/index.php"
                        class="nav-link <?php echo (strpos($current_route, 'conge') !== false) ? 'active' : ''; ?>">
                        <i class="fa-solid fa-bars-staggered mr-2"></i>
                        <p class="">
                            Congés
                        </p>
                    </a>
                </li>

                <!-- end package Congés -->

                <!-- start package Absences -->
                <li class="nav-item">
                    <a href="/Formateur/view/absences/index.php"
                        class="nav-link <?php echo (strpos($current_route, 'absences') !== false) ? 'active' : ''; ?>">
                        <i class="fa-regular fa-calendar-minus mr-2"></i>
                        <p class="">
                            Absences
                        </p>
                    </a>
                </li>

                <!-- start package Absences -->

                <!-- start package Missions -->
                <li class="nav-item">
                    <a href="/Formateur/view/missions/index.php"
                        class="nav-link <?php echo (strpos($current_route, 'missions') !== false) ? 'active' : ''; ?>">
                        <i class="fa-solid fa-business-time mr-2"></i>
                        <p class="">
                            Missions
                        </p>
                    </a>
                </li>

                <!-- end package Missions -->
            </ul>
        </nav>
    </div>
</aside>