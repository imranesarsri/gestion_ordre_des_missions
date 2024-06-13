<!DOCTYPE html>
<html lang="fr">

<!-- Inclusion de l'en-tête -->
<?php include_once "../../view/layouts/heade.php" ?>

<body class="sidebar-mini" style="height: auto;">

    <div class="wrapper">
        <!-- Navigation -->
        <?php include_once "../../view/layouts/nav.php" ?>
        <!-- Barre latérale -->
        <?php include_once "../../view/layouts/aside.php" ?>


        <div class="content-wrapper pt-4" style="min-height: 1302.4px;">

            <section class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-12">

                            <div class="card card-info">
                                <div class="card-header">
                                    <h2 class="card-title"> <i class="fa-regular fa-calendar-minus mr-2"></i> Ajouter une absence
                                    </h2>
                                </div>
                                <!-- Inclusion du formulaire -->
                                <?php include_once "./form.php" ?>
                            </div>

                        </div>
                    </div>
                </div>

            </section>

        </div>

        <!-- Inclure le pied de page -->
        <?php include_once "../../view/layouts/footer.php" ?>


    </div>

    <!-- Inclure le script -->
    <?php include_once "../../view/layouts/script-link.php"; ?>

</body>

</html>