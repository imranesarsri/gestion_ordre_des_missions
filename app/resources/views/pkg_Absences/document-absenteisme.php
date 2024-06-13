<!DOCTYPE html>
<html lang="fr">

<?php

include_once "../../view/layouts/heade.php"

?>

<body class="sidebar-mini layout-fixed">
    <div class="wrapper">

        <?php include_once "../../view/layouts/nav.php" ?>

        <?php include_once "../../view/layouts/aside.php" ?>


        <div class="content-wrapper" style="min-height: 213.4px;">
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1>Document d'absentéisme</h1>
                        </div>
                        <div class="col-sm-6">
                            <div class="float-sm-right">
                                <a href="./imprimer.php" class="btn btn-default"> <i class="fa-solid fa-arrow-flesh"></i> retoure</a>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
            <section class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-body">
                                    <form action="./imprimer.php">
                                        <div class="form-group">
                                            <label for="exampleInputPassword1">Date de début</label>
                                            <input name="startDate" type="date" class="form-control" id="exampleInputPassword1" placeholder="Date de début" value="2024-02-01">
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputPassword1">Date de fin</label>
                                            <input name="endDate" type="date" class="form-control" id="exampleInputPassword1" placeholder="Date de début" value="2024-02-29">
                                        </div>
                                        <div class="form-group">
                                            <label>Motif</label><br>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="checkbox" name="project[]" id="project1" value="1" checked>
                                                <label class="form-check-label" for="project1">Vacances</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="checkbox" name="project[]" id="project2" value="2" checked>
                                                <label class="form-check-label" for="project2">Congé</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="checkbox" name="project[]" id="project3" value="3" checked>
                                                <label class="form-check-label" for="project3">Malade</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="checkbox" name="project[]" id="project4" value="4">
                                                <label class="form-check-label" for="project4">Ordre de mission</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="checkbox" name="project[]" id="projectAll" value="all">
                                                <label class="form-check-label" for="projectAll">Toutes</label>
                                            </div>
                                        </div>


                                        <div class="card-footer d-flex justify-content-end gap-2">
                                            <a href="./index.php" class="btn btn-default mr-3">Annuler</a>
                                            <button type="submit" class="btn bg-purple"><i class="fa-solid fa-print"></i> Imprimer</button>
                                        </div>
                                    </form>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>



        <?php include_once "../../view/layouts/footer.php" ?>

    </div>
</body>


<!-- get script -->
<?php include_once "../../view/layouts/script-link.php"; ?>

</html>