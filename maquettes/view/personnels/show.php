<!DOCTYPE html>
<html lang="fr">

<!-- Include the header -->
<?php include_once "../layouts/heade.php" ?>

<style>
    .info-personnel .active {
        background-color: #17a2b8 !important;
        border-color: #17a2b8 !important;
    }
</style>

<body class="sidebar-mini" style="height: auto;">

    <div class="wrapper">
        <!-- Navigation -->
        <?php include_once "../layouts/nav.php" ?>
        <!-- Barre latérale -->
        <?php include_once "../layouts/aside.php" ?>
        <div class="content-wrapper" style="min-height: 1604.71px;">

            <section class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1>Plus d'une formation</h1>
                        </div>
                        <div class="col-sm-6">
                            <a href="javascript:history.go(-1);" class="btn btn-default float-right"><i class="fa-solid fa-arrow-left"></i> Retoure</a>
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
                                        <img class="profile-user-img img-fluid img-circle" src="../assets/images/user.png" alt="Photo de profil">
                                    </div>
                                    <h3 class="profile-username text-center">Mohamed alami</h3>
                                    <p class="text-muted text-center">Formateur</p>
                                    <ul class="list-group list-group-unbordered ">
                                        <li class="list-group-item">
                                            <b>Établissement</b>
                                            <h6 class="float-right text-purple">Solicode</h6>
                                        </li>
                                        <li class="list-group-item">
                                            <b>Fonction</b>
                                            <h6 class="float-right text-purple">développement</h6>
                                        </li>
                                        <li class="list-group-item">
                                            <b>Type :</b>
                                            <h6 class="float-right text-purple">Formateur</h6>
                                        </li>
                                    </ul>

                                    <div class="row pt-1">
                                        <a href="/view/conge/show.php" class="btn btn-default btn-block col-md-4 mt-2"><i class="fa-solid fa-bars-staggered mr-2"></i></a>
                                        <a href="/view/absences/show.php" class="btn btn-default btn-block col-md-4 mt-2"><i class="fa-regular fa-calendar-minus mr-2"></i></a>
                                        <a href="/view/missions/show.php" class="btn btn-default btn-block col-md-4 mt-2"><i class="fa-solid fa-business-time mr-2"></i></a>
                                    </div>
                                </div>

                            </div>

                        </div>

                        <div class="col-md-9">
                            <div class="card card-purple card-outline">
                                <div class="card-header p-2">
                                    <ul class="nav nav-pills info-personnel">
                                        <li class="nav-item"><a class="nav-link active" href="#personnelles" data-toggle="tab">Personnelles</a></li>
                                        <li class="nav-item"><a class="nav-link" href="#professionnelles" data-toggle="tab">Professionnelles</a></li>
                                        <li class="nav-item"><a class="nav-link" href="#contact" data-toggle="tab">Contact</a></li>
                                    </ul>
                                </div>
                                <div class="card-body">
                                    <div class="tab-content">
                                        <div class="tab-pane active" id="personnelles">

                                            <div class="col-lg-12 d-flex px-0">
                                                <!-- Prénom (français) -->
                                                <div class="form-group col-lg-6">
                                                    <label for="prenom" class="form-label">Nom :</label>
                                                    <p id="prenom" name="prenom">Alami</p>
                                                </div>
                                                <!-- Prénom (arabe) -->
                                                <div class="form-group col-lg-6">
                                                    <label for="prenomArab" class="form-label text-start d-flex flex-row-reverse"> :
                                                        النسب </label>
                                                    <p type="text" class="text-end d-flex flex-row-reverse" id="prenomArab">العلمي</p>
                                                </div>
                                            </div>

                                            <div class="col-lg-12 d-flex px-0">
                                                <!-- Prénom (français) -->
                                                <div class="form-group col-lg-6">
                                                    <label for="prenom" class="form-label">Prénom :</label>
                                                    <p id="prenom" name="prenom">Mohamed</p>
                                                </div>
                                                <!-- Prénom (arabe) -->
                                                <div class="form-group col-lg-6">
                                                    <label for="prenomArab" class="form-label text-start d-flex flex-row-reverse"> :
                                                        الاسم</label>
                                                    <p type="text" class="text-end d-flex flex-row-reverse" id="prenomArab">العلمي</p>
                                                </div>
                                            </div>

                                            <div class="col-sm-12">
                                                <label for="nom">CIN :</label>
                                                <p>KB78293982</p>
                                            </div>

                                            <div class="col-sm-12">
                                                <label for="nom">Date de naissance :</label>
                                                <p>02/03/1980</p>
                                            </div>

                                        </div>

                                        <!-- Contact -->
                                        <div class="tab-pane" id="contact">

                                            <div class="col-sm-12">
                                                <label for="nom">Numéro de téléphone :</label>
                                                <p>+21278438905</p>
                                            </div>

                                            <div class="col-sm-12">
                                                <label for="nom">Email :</label>
                                                <p>mohamedAlami@gmail.com</p>
                                            </div>

                                            <div class="col-sm-12">
                                                <label for="nom">Adresse :</label>
                                                <p>Complexe Hassani</p>
                                            </div>

                                            <div class="col-sm-12">
                                                <label for="nom">Ville :</label>
                                                <p>Tanger</p>
                                            </div>
                                        </div>

                                        <div class="tab-pane" id="professionnelles">
                                            <div class="col-sm-12">
                                                <label for="nom">Matricule :</label>
                                                <p>21278438905</p>
                                            </div>

                                            <div class="col-sm-12">
                                                <label for="nom">Affectation :</label>
                                                <p>Solicode</p>
                                            </div>

                                            <div class="col-sm-12">
                                                <label for="nom">AFP de Travail :</label>
                                                <p>Solicode</p>
                                            </div>

                                            <div class="col-sm-12">
                                                <label for="nom">Fonction :</label>
                                                <p>Développement</p>
                                            </div>

                                            <div class="col-sm-12">
                                                <label for="nom">Type :</label>
                                                <p>Formateur</p>
                                            </div>

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


    <!-- Include the script -->
    <?php include_once "../layouts/script-link.php" ?>
</body>

</html>