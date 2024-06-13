<!DOCTYPE html>
<html lang="fr">

<?php include_once '../layouts/heade.php'; ?>

<body class="sidebar-mini" style="height: auto;">

    <div class="wrapper">
        <!-- Navigation -->
        <?php include_once '../layouts/nav.php'; ?>
        <!-- Barre latérale -->
        <?php include_once '../layouts/aside.php'; ?>

        <div class="wrapper">
            <!-- Navigation -->
            <?php include_once '../layouts/nav.php'; ?>
            <!-- Barre latérale -->
            <?php include_once '../layouts/aside.php'; ?>


            <div class="content-wrapper" style="min-height: 1302.4px;">
                <div class="content-header">
                    <div class="container-fluid">
                        <div class="row mb-2">
                            <div class="col-sm-6">
                                <h1>Liste des congés</h1>
                            </div>
                            <div class="col-sm-6">
                                <div class="float-sm-right">
                                    <a href="./create.php" class="btn btn-info">
                                        <i class="fas fa-plus"></i> Nouveau congé
                                    </a>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
                <section class="content">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-header col-md-12">
                                        <div class="d-flex justify-content-between">
                                            <div class="col-md-5 row">
                                                <div class="input-group input-group-sm">
                                                    <div class="input-group-prepend">
                                                        <button type="submit" class="btn btn-default">
                                                            <i class="fas fa-filter"></i>
                                                        </button>
                                                    </div>
                                                    <label for="startDate" class="sr-only">Date debut</label>
                                                    <input type="date" class="form-control" id="startDate" aria-label="Start Date">
                                                    <label for="" class="px-2 d-flex align-items-center">au</label>
                                                    <label for="endDate" class="sr-only">Date fin</label>
                                                    <input type="date" class="form-control" id="endDate" aria-label="End Date">
                                                </div>
                                            </div>
                                            <div class=" p-0">
                                                <div class="input-group input-group-sm">
                                                    <input type="text" name="table_search" class="form-control" placeholder="Recherche">
                                                    <div class="input-group-append">
                                                        <button type="submit" class="btn btn-default">
                                                            <i class="fas fa-search"></i>
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="card-body table-responsive p-0">
                                        <?php include_once './table-index.php'; ?>
                                    </div>

                                    <div class="d-flex justify-content-between align-items-center p-2">
                                        <div class="d-flex align-items-center mb-2">
                                            <button type="button" class="btn btn-default btn-sm">
                                                <i class="fa-solid fa-file-arrow-down"></i>
                                                IMPORTER</button>
                                            <button type="button" class="btn btn-default btn-sm mt-0 mx-2">
                                                <i class="fa-solid fa-file-export"></i>
                                                EXPORTER</button>
                                        </div>
                                        <div class="mr-5">
                                            <ul class="pagination  m-0 float-right">
                                                <li class="page-item"><a class="page-link text-secondary"
                                                        href="#">«</a>
                                                </li>
                                                <li class="page-item"><a class="page-link text-secondary active"
                                                        href="#">1</a></li>
                                                <li class="page-item"><a class="page-link text-secondary"
                                                        href="#">2</a>
                                                </li>
                                                <li class="page-item"><a class="page-link text-secondary"
                                                        href="#">3</a>
                                                </li>
                                                <li class="page-item"><a class="page-link text-secondary"
                                                        href="#">»</a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>

            
            <!-- Inclure le pied de page -->
            <?php include_once '../layouts/footer.php'; ?>

        </div>

    </div>
</body>

<!-- get script -->
<?php include_once '../layouts/script-link.php'; ?>

</html>
