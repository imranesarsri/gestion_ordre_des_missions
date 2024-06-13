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
            <section class="content">
                <div class="container-fluid">
                    <div class="row">
                        <!--  -->
                        <div class="col-12 col-sm-12 pt-3">
                            <div class="card card-teal card-tabs">
                                <div class="card-header p-0 pt-1">
                                    <div class="d-flex justify-content-between">
                                        <h3 class="card-title"> <i class="fa-solid fa-bars-staggered mr-2 pt-2 pl-3"></i> Modifier un congé</h3>
                                        <ul class="nav nav-tabs" id="custom-tabs-one-tab" role="tablist">
                                            <li class="nav-item">
                                                <a class="nav-link active" id="custom-tabs-one-form-tab" data-toggle="pill" href="#form" role="tab" aria-controls="custom-tabs-one-home" aria-selected="true">Form</a>
                                            </li>
                                            <li class="nav-item mr-3">
                                                <a class="nav-link" id="custom-tabs-one-moreDetails-tab" data-toggle="pill" href="#detailsJourReson" role="tab" aria-controls="custom-tabs-one-profile" aria-selected="false">Details de calcule</a>
                                            </li>
                                        </ul>

                                    </div>
                                </div>
                                <div class="card-body">
                                    <div class="tab-content" id="custom-tabs-one-tabContent">
                                        <!-- get form -->
                                        <?php include_once "./form.php" ?>
                                        <!-- get détails calcule -->
                                        <?php include_once "./details-calcule.php" ?>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
            </section>

        </div>

        <!-- Inclure le pied de page -->
        <?php include_once "../layouts/footer.php" ?>

        <!-- Inclure le script -->
        <?php include_once "../layouts/script-link.php" ?>
    </div>

    <script>
        // JavaScript
        function moreDetails() {
            // Remove 'active' class from the "Form" button
            document.getElementById('custom-tabs-one-form-tab').classList.remove('active');
            // Add 'active' class to the "Details de calcule" button
            document.getElementById('custom-tabs-one-moreDetails-tab').classList.add('active');
        };
    </script>

</body>

</html>