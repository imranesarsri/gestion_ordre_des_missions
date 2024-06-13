<!DOCTYPE html>
<html lang="fr">

<!-- Inclure l'en-tête -->
<?php include_once "../../view/layouts/heade.php" ?>


<body class="sidebar-mini" style="height: auto;">

    <div class="wrapper">
        <!-- Navigation -->
        <?php include_once "../../view/layouts/nav.php" ?>
        <!-- Barre latérale -->
        <?php include_once "../../view/layouts/aside.php" ?>


        <div class="content-wrapper" style="min-height: 1302.4px;">
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1>Document d'absentéisme</h1>
                        </div>
                        <div class="col-sm-6">
                            <div class="float-sm-right">
                                <button id="printButton" class="btn bg-purple"><i class="fa-solid fa-print"></i> Imprimer</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <section class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-12">

                            <section class="content">
                                <div class="container-fluid">
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="w-100 d-flex justify-content-end">
                                                <p>le 01/01/2023 à 01/04/2023</p>
                                            </div>
                                            <div class="card">
                                                <div class="card-body table-responsive p-0">
                                                    <table class="table table-bordered text-nowrap table-print">
                                                        <thead>
                                                            <tr>
                                                                <th>Matricule</th>
                                                                <th>Nom</th>
                                                                <th>Prénom</th>
                                                                <th>Motif</th>
                                                                <th>date debut</th>
                                                                <th>date fin</th>
                                                                <th>Durée absence</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <tr>
                                                                <td>24517</td>
                                                                <td>Alami</td>
                                                                <td>Amine</td>
                                                                <td>Vacances</td>
                                                                <td>11/03/2023</td>
                                                                <td>15/03/2023</td>
                                                                <td class="text-center">4 jours</td>
                                                            </tr>
                                                            <tr>
                                                                <td>32651</td>
                                                                <td>Chami</td>
                                                                <td>Mohammed</td>
                                                                <td>Congé</td>
                                                                <td>02/03/2023</td>
                                                                <td>11/03/2023</td>
                                                                <td class="text-center">7 jours</td>
                                                            </tr>
                                                            <tr>
                                                                <td>478122</td>
                                                                <td>Sarsri</td>
                                                                <td>Imrane</td>
                                                                <td>Malade</td>
                                                                <td>10/02/2023</td>
                                                                <td>12/02/2023</td>
                                                                <td class="text-center">2 jours</td>
                                                            </tr>
                                                            <tr>
                                                                <td>326523</td>
                                                                <td>Alami</td>
                                                                <td>Yahya</td>
                                                                <td>Malade</td>
                                                                <td>02/02/2023</td>
                                                                <td>04/02/2023</td>
                                                                <td class="text-center">2 jours</td>
                                                            </tr>
                                                            <tr>
                                                                <td>12345</td>
                                                                <td>Madani</td>
                                                                <td>Ali</td>
                                                                <td>Ordre de mission</td>
                                                                <td>22/01/2023</td>
                                                                <td>29/01/2023</td>
                                                                <td class="text-center">5 jours</td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
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

    </div>

    <?php include_once "../../view/layouts/script-link.php"; ?>

    <!-- Inclure le script -->
    <script>
        document.getElementById("printButton").addEventListener("click", function() {
            window.print();
        });
    </script>
</body>

</html>