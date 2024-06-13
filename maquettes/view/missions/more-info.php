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



        <div class="content-wrapper" style="min-height: 1302.4px;">
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1>Détail des Missions</h1>
                        </div>
                        <div class="col-sm-6">
                            <a href="javascript:history.go(-1);" class="btn btn-default float-right"><i
                                    class="fas fa-arrow-left"></i> Retoure</a>
                        </div>
                    </div>
                </div>
            </div>
            <section class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-body row">
                                    <div class="col-sm-12 col-lg d-flex">
                                        <fieldset class="border col-lg-12 mb-5 p-3">
                                            <legend>Les Informations de mission</legend>
                                            <div class="col-sm-12">
                                                <label for="matricule">Nom du collaborateur:</label>
                                                <p>madani ali</p>
                                            </div>
                                            <!-- Numéro de mission -->
                                            <div class="col-sm-12">
                                                <label for="Numéro-de-mission">Numéro de mission :</label>
                                                <p>102</p>
                                            </div>
                                            <!-- Nature -->
                                            <div class="col-sm-12">
                                                <label for="Nature">Nature :</label>
                                                <p>Nature</p>
                                            </div>
                                            <!-- Catégorie -->
                                            <div class="col-sm-12">
                                                <label for="Catégorie">Catégorie :</label>
                                                <p>Catégorie</p>
                                            </div>
                                            <!-- Type de mission -->
                                            <div class="col-sm-12">
                                                <label for="Type-de-mission">Type de mission :</label>
                                                <p>Voyage d'affaires</p>
                                                <ul>
                                                    <li><span class="text-bold">Marque :</span> Toyota</li>
                                                    <li><span class="text-bold">Numéro de plaque :</span> ABC123</li>
                                                    <li><span class="text-bold">Puissance fiscale :</span> 4cv</li>
                                                </ul>
                                            </div>
                                            <!-- Numéro d'ordre de mission-->
                                            <div class="col-sm-12">
                                                <label for="Numéro-dordre-de-mission">Numéro d'ordre de mission:</label>
                                                <p>12</p>
                                            </div>
                                            <!-- Moyens de transport -->
                                            <div class="col-sm-12">
                                                <label for="Email">Moyens de transport :</label>
                                                <p>Voiture de personnel</p>
                                            </div>
                                        </fieldset>
                                    </div>
                                    <div class="col-sm-12 col-lg d-flex">
                                        <fieldset class="border col-lg-12 mb-5 p-3">
                                            <legend>Planification de mission</legend>
                                            <!-- Lieu -->
                                            <div class="col-sm-12">
                                                <label for="Lieu">Lieu :</label>
                                                <p>Rabat</p>
                                            </div>
                                            <!-- Date d'ordre de mission -->
                                            <div class="col-sm-12">
                                                <label for="Date-dordre-de-mission">Date d'ordre de mission :</label>
                                                <p>10/02/2024</p>
                                            </div>
                                            <!-- Date début -->
                                            <div class="col-sm-12">
                                                <label for="Date début">Date début :</label>
                                                <p>15/02/2024</p>
                                            </div>
                                            <!-- Date de fin -->
                                            <div class="col-sm-12">
                                                <label for="Date-de-fin">Date de fin :</label>
                                                <p>20/02/2024</p>
                                            </div>

                                            <div class="col-sm-12">
                                                <div class="d-flex justify-content-between">
                                                    <div>
                                                        <!-- Date de départ -->
                                                        <label for="Date-de-départ">Date de départ :</label>
                                                        <p>14/02/2024</p>
                                                    </div>
                                                    <div>
                                                        <!-- Heure de départ -->
                                                        <div class="col-sm-12">
                                                            <label for="Heure-de-depart">Heure de départ :</label>
                                                            <p>14H00</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-sm-12">
                                                <div class="d-flex justify-content-between">
                                                    <div>
                                                        <!-- Date-de-retour -->
                                                        <label for="Date-de-retour">Date de retour :</label>
                                                        <p>21/02/2024</p>
                                                    </div>
                                                    <div>
                                                        <!-- Heure de retour -->
                                                        <label for="Heure-de-retour">Heure de retour :</label>
                                                        <p>14H00</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </fieldset>
                                    </div>
                                </div>
                            </div>
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