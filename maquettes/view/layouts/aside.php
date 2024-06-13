<?php
$current_route = $_SERVER['REQUEST_URI'];
?>

<aside class="main-sidebar sidebar-dark-info elevation-4 position-fixed">

    <a href="/view/home.php" class="brand-link">
        <img src="/view/assets/images/logo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3">
        <span class="brand-text font-weight-light h6">Gestion Personnelles</span>
    </a>

    <div class="sidebar">
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Start package Accueil -->
                <li class="nav-item">
                    <a href="/view/home.php"
                        class="nav-link <?php echo ($current_route == '/view/home.php') ? 'active' : ''; ?>">
                        <i class="fa-solid fa-house mr-2"></i>
                        <p class="">
                            Accueil
                        </p>
                    </a>
                </li>
                <!-- end package Accueil -->

                <!-- start package Personnels -->


                <li class="nav-item">
                    <a href="/view/personnels/index.php"
                        class="nav-link <?php echo (strpos($current_route, 'personnels') !== false) ? 'active' : ''; ?>">
                        <i class="fa-solid fa-users mr-2"></i>
                        <p class="">
                            Personnels
                        </p>
                    </a>
                </li>
                <!-- end package Personnels -->

                <!-- start package Categories -->
                <li class="nav-item">
                    <a href="/view/categorie/index.php"
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
                    <a href="/view/conges/index.php"
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
                    <a href="/view/absences/index.php"
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
                    <a href="/view/missions/index.php"
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