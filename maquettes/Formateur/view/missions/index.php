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


        <div class="content-wrapper">

            <section class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1>Historique des missions</h1>
                        </div>
                    </div>
                </div>
            </section>

            <section class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-12 col-lg-4 col-xl-3">
                            <div class="card card-purple card-outline">
                                <div class="card-body box-profile">
                                    <div class="text-center">
                                        <img class="profile-user-img img-fluid img-circle"
                                            src="../assets/images/user.png" alt="User profile picture">
                                    </div>
                                    <h3 class="profile-username text-center">Mohamed Ali</h3>
                                    <p class="text-muted text-center">143322</p>
                                    <ul class="list-group list-group-unbordered mb-3">
                                        <li class="list-group-item">
                                            <b>Fonction</b> <a class="float-right text-purple">Developper</a>
                                        </li>
                                        <li class="list-group-item">
                                            <b>Phone</b> <a class="float-right text-purple">+212798763543</a>
                                        </li>
                                        <li class="list-group-item">
                                            <b>Type</b> <a class="float-right text-purple">Directeur</a>
                                        </li>
                                    </ul>
                                    <a href="/Formateur/view/personnels/index.php" class="btn bg-purple btn-block"
                                        style="margin-top: 2rem"><b>Plus
                                            d'informations</b></a>
                                </div>
                            </div>
                        </div>

                        <div class="col-12 col-lg-8 col-xl-9">
                            <section class="content">
                                <div class="container-fluid">
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="card card-purple card-outline">
                                                <div class="card-header col-md-12">
                                                    <div class="row justify-content-between">
                                                        <div class="col-6">
                                                            <div class="d-flex justify-content-start">
                                                                <div class=" p-0">
                                                                    <div class="input-group input-group-sm">
                                                                        <div class="input-group-append">
                                                                            <button type="submit"
                                                                                class="btn btn-default">
                                                                                <i class="fa-solid fa-calendar"></i>
                                                                            </button>
                                                                        </div>
                                                                        <input type="text" name="daterange"
                                                                            value="07/03/2024 - 12/03/2024" />
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-4">
                                                            <div class="d-flex justify-content-end">

                                                                <div class=" p-0">
                                                                    <div class="input-group input-group-sm">
                                                                        <input type="text" name="table_search"
                                                                            class="form-control"
                                                                            placeholder="Recherche">
                                                                        <div class="input-group-append">
                                                                            <button type="submit"
                                                                                class="btn btn-default">
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
                                                    <table class="table table-striped text-nowrap">
                                                        <thead>
                                                            <tr>
                                                                <th>N<sup>o</sup> mission</th>
                                                                <th>Type de mission</th>
                                                                <th>Lieu</th>
                                                                <th class="">Durée</th>
                                                                <th class="">Date de départ</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <tr>
                                                                <td>202</td>
                                                                <td>Voyage d'affaires</td>
                                                                <td>Rabat</td>
                                                                <td class="text-center">5</td>
                                                                <td>14/02/2024</td>
                                                            </tr>
                                                            <tr>
                                                                <td>203</td>
                                                                <td>Business Trip</td>
                                                                <td>Paris</td>
                                                                <td class="text-center">8</td>
                                                                <td>21/02/2024</td>

                                                            </tr>

                                                            <tr>
                                                                <td>204</td>
                                                                <td>Conférence</td>
                                                                <td>Tanger, ibn marhal</td>
                                                                <td class="text-center">3</td>
                                                                <td>03/03/2024</td>

                                                            </tr>

                                                            <tr>
                                                                <td>205</td>
                                                                <td>Entraînement</td>
                                                                <td>London</td>
                                                                <td class="text-center">6</td>
                                                                <td>09/03/2024</td>

                                                            </tr>

                                                            <tr>
                                                                <td>206</td>
                                                                <td>Séminaire</td>
                                                                <td>Tokyo</td>
                                                                <td class="text-center">4</td>
                                                                <td>17/03/2024</td>

                                                            </tr>

                                                        </tbody>
                                                    </table>
                                                </div>

                                                <div class="row justify-content-between p-2">
                                                    <div class="col-8 align-self-end">
                                                        <button type="button" class="btn btn-default btn-sm">
                                                            <i class="fa-solid fa-file-arrow-down"></i>
                                                            IMPORTER</button>
                                                        <button type="button" class="btn btn-default btn-sm ">
                                                            <i class="fa-solid fa-file-export"></i>
                                                            EXPORTER</button>
                                                        <a href="./attestation.php" type="button"
                                                            class="btn btn-default bg-purple btn-sm mt-0">
                                                            <i class="fa-solid fa-print"></i>
                                                            Attestation Ordre de Mission</a>
                                                    </div>
                                                    <div class="col-4">
                                                        <ul class="pagination  m-0 float-right">
                                                            <li class="page-item"><a class="page-link text-secondary"
                                                                    href="#">«</a>
                                                            </li>
                                                            <li class="page-item"><a
                                                                    class="page-link text-secondary active"
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