<!DOCTYPE html>
<html lang="fr">

<?php include_once "../layouts/heade.php" ?>

<body class="sidebar-mini" style="height: auto;">

    <div class="wrapper">
        <!-- Navigation -->
        <?php include_once "../layouts/nav.php" ?>
        <!-- Barre latérale -->
        <?php include_once "../layouts/aside.php" ?>

        <div class="wrapper">
            <!-- Navigation -->
            <?php include_once "../layouts/nav.php" ?>
            <!-- Barre latérale -->
            <?php include_once "../layouts/aside.php" ?>


            <style>
                .decision-body p,
                .NB {
                    letter-spacing: 1px;
                    line-height: 2;
                    font-weight: 500;
                }

                .decision-footer p {
                    font-size: 16px;
                }
/* 

                @media print {
                    body * {
                        visibility: hidden;
                    }

                    .content,
                    .content * {
                        visibility: visible;
                    }

                    .content {
                        position: absolute;
                        left: 0;
                        top: 0;
                    }

                    .content {
                        width: 100%;
                    }

                    .decesion-head-top {
                        text-align: center;
                    }

                    .decesion-head-top img {
                        max-height: 100px;
                        width: auto;
                    }

                    .decision-body {
                        margin-top: 30px;
                    }

                    .decision-body h2 {
                        font-size: 24px;
                        text-align: center;
                    }

                    .decision-body ul {
                        list-style-type: none;
                        padding-left: 0;
                    }

                    .decision-body h5 {
                        font-size: 16px;
                        margin-top: 15px;
                    }

                    .decision-body .table th,
                    .decision-body .table td {
                        font-size: 14px;
                        padding: 5px 10px;
                    }

                    .decision-footer {
                        width: 100%;
                        margin-top: 30px;
                        padding-top: 10px;
                    }

                    .decision-footer h5 {
                        font-size: 14px;
                        text-align: center;
                        margin-left: 10px;
                    }

                    .decision-footer h6 {
                        font-size: 12px;
                        margin-top: 5px;
                        margin-bottom: 5px;
                    }
                } */
            </style>
            <div class="content-wrapper pt-4" style="min-height: 1302.4px;">

                <div class="content-header">
                    <div class="container-fluid">
                        <div class="row mb-2">
                            <div class="col-sm-6">
                                <h1>Liste des congés</h1>
                            </div>
                            <div class="col-sm-6">
                                <div class="float-sm-right">
                                    <button id="printButton" class="btn bg-purple"><i class="fa-solid fa-print"></i> Imprimer</button>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
                <section class="content px-4 mx-4 card">
                    <div class="decesion-head-top">
                        <div class="d-flex justify-content-center">
                            <img src="../assets/images/logo-ofppt.png" alt="" height="130px" width="auth">
                        </div>
                        <div class="d-flex justify-content-between mt-3">
                            <p>REF: OFP/DRTTA/CFP1/SOLICODE/N 38/22</p>
                            <p>Tanger le 30/11/2022</p>
                        </div>
                    </div>

                    <div class="decision-body">
                        <div class="border py-3 my-4 text-center">
                            <h2 class="">DECISION DE CONGE ADMINISTRATIF</h2>
                        </div>
                        <div class="mt-2">
                            <ul class="list-group list-group-flush" style="letter-spacing: 1px; line-height: 2; font-weight: 500;">
                                <li class="list-group-item border-0"><i class="fas fa-check-circle me-2"></i> le Directeur de l'Office de la Formation Professionnelle et de La Promotion du Travail;</li>
                                <li class="list-group-item border-0"><i class="fas fa-check-circle me-2"></i> Vu Le Dahir portant loi N°1-72-183 RabiaII 1394 (21 Mai 1974) instituant l'Office de la Formation Professionnelle et de La Promotion du Travail;</li>
                                <li class="list-group-item border-0"><i class="fas fa-check-circle me-2"></i> Vu la décision de madame le Directeur Général N°11 en Date du 19/01/2022 portant Délégation de signature a Monsieur ABDELHAMID ELMECHRAFI Directeur de Complex Tanger 1;</li>
                            </ul>
                            <p class="pt-3" style="letter-spacing: 1px; line-height: 2; font-weight: 500;">Vu la demande de congé Administratif présentée par : Mme/Mr: Nom Prenom, affecté a CFP Tanger\Centre\ Solicode Tanger.</p>
                        </div>


                        <h4 class="text-center pt-5 pb-4">DECIDE</h4>
                        <div>
                            <h4 style="text-decoration: underline;">ARTICLE UNIQUE :</h4>
                            <P class="mt-3">Il est accordé un congé : Administratif</P>
                            <table class="table table-bordered mt-4">
                                <thead>
                                    <tr>
                                        <th>NOM & PRENOM</th>
                                        <th>AFFECTATION</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>ikhlas lmadani</td>
                                        <td>CFP TANGER 1 / CENTRE SOLICODE TANGER</td>
                                    </tr>
                                    <tr>
                                        <td>Catégorie : C</td>
                                        <td>Durée accordée : 8Jours</td>
                                    </tr>
                                    <tr>
                                        <td>Fonction : Formatrice</td>
                                        <td>Date debut : 04/12/2022</td>
                                    </tr>
                                    <tr>
                                        <td>Fonction : Formatrice</td>
                                        <td>Date fin : 11/12/2022</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="NB py-5 px-4">
                            <h5>NB : L'intéressée est autorisée a quittele territoire marocain</h5>
                        </div>
                    </div>
                    <!-- footer -->
                    <div class="decision-footer   border-top pt-3 mt-5">
                            <div class="text-center">
                                <h5 class="font-weight-bold pl-5 ml-5">Complex de Formation Professionnelle Tanger 1</h5>
                            </div>
                            <div class="d-flex justify-content-between w-100">
                                <p class="font-weight-bold text-center">Direction <br> Réglenale <br> DRTTA <br> CFP Tanger</p>
                                <p class="">ISTA NTIC <br> Km 06, Route de Rabat <br> Tanger <br> Tel : 06 39 38 08 71</p>
                                <p class="">ISTA IBN MARHAL <br> 5Rue Ibn Marhal, Place <br> Mozart Tanger <br> Tel : 0539 380871</p>
                                <p class="">Centre solicode Digitale <br> Quartier Bni Ouryaghel <br> Tanger</p>
                                <p class="">Centre National mohamed <br> VI des handicapés Tanger <br> Souani Tanger</p>
                            </div>
                    </div>

                </section>
            </div>

        </div>

    </div>

    <!-- Inclure le script -->
    <script>
        document.getElementById("printButton").addEventListener("click", function() {
            window.print();
        });
    </script>
</body>


</html>