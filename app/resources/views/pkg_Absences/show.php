<!DOCTYPE html>
<html lang="fr">

<!-- Inclure l'en-tête -->
<?php include_once "../layouts/heade.php" ?>

<body class="sidebar-mini" style="height: auto;">

    <div class="wrapper">
        <!-- Navigation -->
        <?php include_once "../layouts/nav.php" ?>
        <!-- Barre latérale -->
        <?php include_once "../layouts/aside.php" ?>


        <div class="content-wrapper" style="min-height: 1604.44px;">

            <section class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1>Historique des absences</h1>
                        </div>
                        <div class="col-sm-6">
                            <a href="javascript:history.go(-1);" class="btn btn-default float-right"><i class="fas fa-arrow-left"></i> Retoure</a>
                        </div>
                    </div>
                </div>
            </section>

            <section class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-3">

                            <div class="card card-purple card-outline">
                                <div class="card-body box-profile">
                                    <div class="text-center">
                                        <img class="profile-user-img img-fluid img-circle" src="../assets/images/user.png" alt="User profile picture">
                                    </div>
                                    <h3 class="profile-username text-center">Mohamed Ali</h3>
                                    <p class="text-muted text-center">Formateur</p>
                                    <ul class="list-group list-group-unbordered mb-3">
                                        <li class="list-group-item">
                                            <b>Matricule</b> <a class="float-right text-purple">1243566</a>
                                        </li>
                                        <li class="list-group-item">
                                            <b>Etablissement</b> <a class="float-right text-purple">Solicode</a>
                                        </li>
                                        <li class="list-group-item">
                                            <b>Jours restant</b> <a class="float-right text-purple">6</a>
                                        </li>
                                    </ul>
                                    <a href="/view/personnels/show.php" class="btn bg-purple btn-block" style="margin-top: 2rem"><b>Plus
                                            d'informations</b></a>
                                </div>

                            </div>

                        </div>

                        <div class="col-md-9">
                            <section class="content">
                                <div class="container-fluid">
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="card card-purple card-outline">
                                                <div class="card-header col-md-12">
                                                    <div class="row justify-content-between">
                                                        <!-- filter by start date / end date -->
                                                        <div class="col-md-9 row">
                                                            <div class="input-group-sm input-group col-md-4">
                                                                <div class="input-group-append">
                                                                    <button type="submit" class="btn btn-default">
                                                                        <i class="fas fa-filter "></i>
                                                                    </button>
                                                                </div>
                                                                <select class="form-select form-control" id="filterSelectProjrctValue" aria-label="Filter Select">
                                                                    <option value="précédent">anée</option>
                                                                    <option value="précédent">2024</option>
                                                                    <option value="précédent">2023</option>
                                                                    <option value="précédent">2022</option>
                                                                </select>
                                                            </div>
                                                        </div>


                                                        <div class="col-3">
                                                            <div class="d-flex justify-content-end">

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
                                                    </div>
                                                </div>

                                                <div class="card-body table-responsive p-0">
                                                    <table class="table table-striped text-nowrap table-print">
                                                        <thead>
                                                            <tr>
                                                                <th>Matricule</th>
                                                                <th>Motif</th>
                                                                <th>Date de début</th>
                                                                <th>Date de fin</th>
                                                                <th class="text-center">Durée absence</th>
                                                                <th class="text-center">Action</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <tr>
                                                                <td>12345</td>
                                                                <td>Ordre de mission</td>
                                                                <td>20/02/2022</td>
                                                                <td>25/02/2022</td>
                                                                <td class="text-center">5 jour</td>
                                                                <td class="text-center">
                                                                    <a href="./edit.php" class="btn btn-sm btn-default"><i class="fa-solid fa-pen-to-square"></i></a>
                                                                    <button type="button" class="btn btn-sm btn-danger"><i class="fa-solid fa-trash"></i></button>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>12345</td>
                                                                <td>Vacances</td>
                                                                <td>21/02/2022</td>
                                                                <td>25/02/2022</td>
                                                                <td class="text-center">4 jour</td>
                                                                <td class="text-center">
                                                                    <a href="./edit.php" class="btn btn-sm btn-default"><i class="fa-solid fa-pen-to-square"></i></a>
                                                                    <button type="button" class="btn btn-sm btn-danger"><i class="fa-solid fa-trash"></i></button>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>12345</td>
                                                                <td>Congé</td>
                                                                <td>23/02/2022</td>
                                                                <td>25/02/2022</td>
                                                                <td class="text-center">2 jour</td>
                                                                <td class="text-center">
                                                                    <a href="./edit.php" class="btn btn-sm btn-default"><i class="fa-solid fa-pen-to-square"></i></a>
                                                                    <button type="button" class="btn btn-sm btn-danger"><i class="fa-solid fa-trash"></i></button>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>12345</td>
                                                                <td>Malade</td>
                                                                <td>25/02/2022</td>
                                                                <td>27/02/2022</td>
                                                                <td class="text-center">2 jour</td>
                                                                <td class="text-center">
                                                                    <a href="./edit.php" class="btn btn-sm btn-default"><i class="fa-solid fa-pen-to-square"></i></a>
                                                                    <button type="button" class="btn btn-sm btn-danger"><i class="fa-solid fa-trash"></i></button>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>12345</td>
                                                                <td>Malade</td>
                                                                <td>25/02/2022</td>
                                                                <td>27/02/2022</td>
                                                                <td class="text-center">2 jour</td>
                                                                <td class="text-center">
                                                                    <a href="./edit.php" class="btn btn-sm btn-default"><i class="fa-solid fa-pen-to-square"></i></a>
                                                                    <button type="button" class="btn btn-sm btn-danger"><i class="fa-solid fa-trash"></i></button>
                                                                </td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </div>

                                                <div class="row justify-content-between p-2">
                                                    <div class="col-6 align-self-end">
                                                        <button type="button" class="btn btn-default btn-sm">
                                                            <i class="fa-solid fa-file-arrow-down"></i>
                                                            IMPORTER</button>
                                                        <button type="button" class="btn btn-default btn-sm ">
                                                            <i class="fa-solid fa-file-export"></i>
                                                            EXPORTER</button>
                                                    </div>
                                                    <div class="col-6">
                                                        <ul class="pagination  m-0 float-right">
                                                            <li class="page-item"><a class="page-link text-secondary" href="#">«</a>
                                                            </li>
                                                            <li class="page-item"><a class="page-link text-secondary active" href="#">1</a></li>
                                                            <li class="page-item"><a class="page-link text-secondary" href="#">2</a>
                                                            </li>
                                                            <li class="page-item"><a class="page-link text-secondary" href="#">3</a>
                                                            </li>
                                                            <li class="page-item"><a class="page-link text-secondary" href="#">»</a>
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

                    </div>

                </div>
            </section>

        </div>

        <!-- Inclure le pied de page -->
        <?php include_once "../layouts/footer.php" ?>

    </div>

    <!-- Inclure le script -->
    <?php include_once "../layouts/script-link.php" ?>
</body>

</html>