<form action="process_form.php" method="POST">
    <div class="card-body ">

        <div class="row">
            <fieldset class="border col-lg-12">
                <legend>Infos personnelles</legend>
                <div class="col-lg-12 d-flex">
                    <div class="form-group pt-3 col-lg-6">
                        <label for="nom" class="form-label">Nom : <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" id="nom" name="nom" value="Entrez le nom" required>
                    </div>
                    <!-- Nom (Arabic) -->
                    <div class="form-group pt-3 col-lg-6">
                        <label for="nomArab" class="form-label d-flex flex-row-reverse"> :
                            النسب<span class="text-danger">*</span> </label>
                        <input type="text" class="form-control direction-rtl" id="nomArab" name="nomArab"
                            placeholder="أدخل النسب هنا" value="العلمي" required>
                    </div>
                </div>
                <div class="col-lg-12 d-flex">
                    <!-- Prénom (French) -->
                    <div class="form-group pt-3 col-lg-6">
                        <label for="prenom" class="form-label">Prénom : <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" id="prenom" name="prenom" value="alami" required>
                    </div>
                    <!-- Prénom (Arabic) -->
                    <div class="form-group pt-3 col-lg-6">
                        <label for="prenomArab" class="form-label text-start d-flex flex-row-reverse"> :
                            الاسم <span class="text-danger">*</span> </label>
                        <input type="text" class="form-control text-end d-flex flex-row-reverse direction-rtl"
                            id="prenomArab" name="prenomArab" placeholder="أدخل الاسم هنا" value="محمد" required>
                    </div>
                </div>
                <div class="col-lg-12 d-flex">
                    <!-- CIN -->
                    <div class="form-group pt-3 col-lg-6">
                        <label for="inputCIN">CIN : <span class="text-danger">*</span></label>
                        <input name="CIN" type="text" class="form-control" id="inputCIN" placeholder="Entrez le CIN"
                            value="KB21839">
                    </div>
                    <!-- Date de naissance -->
                    <div class="form-group pt-3 col-lg-6">
                        <label for="inputDateDeNaiddance">Date de naissance : <span class="text-danger">*</span></label>
                        <input name="dateNaissance" type="date" class="form-control" id="inputDateDeNaiddance"
                            placeholder="Entrez le Date de naissance" value="1980-03-12">
                    </div>
                </div>
                <div class="col-lg-12 d-flex">
                    <!-- Numéro de téléphone -->
                    <div class="form-group pt-3 col-lg-6">
                        <label for="inputTelephone">Numéro de téléphone : <span class="text-danger">*</span></label>
                        <input name="NumeroDeTelephone" type="text" class="form-control" id="inputTelephone"
                            placeholder="Entrez le Numéro de téléphone" value="+21276453537">
                    </div>
                    <!-- Email -->
                    <div class="form-group pt-3 col-lg-6">
                        <label for="inputEmail">Email : <span class="text-danger">*</span></label>
                        <input name="NumeroDeEmail" type="email" class="form-control" id="inputEmail"
                            placeholder="Entrez le Email" value="mohamedAlami@gmail.com">
                    </div>
                </div>
                <div class="col-lg-12 d-flex">
                    <!-- Adress -->
                    <div class="form-group pt-3 col-lg-6">
                        <label for="inputAdress">Adress : <span class="text-danger">*</span></label>
                        <input name="NumeroDeAdress" type="text" class="form-control" id="inputAdress"
                            placeholder="Entrez le Adress" value="Complex hassani">
                    </div>
                    <!-- Ville -->
                    <div class="form-group pt-3 col-lg-6">
                        <label for="inputVille">Ville : <span class="text-danger">*</span></label>
                        <select name="NumeroDeVille" class="form-control js-example-basic-single" id="inputVille">
                            <option value="Sélectionner une ville" selected>Sélectionner une ville</option>
                            <option value="Agadir">Agadir</option>
                            <option value="Al Hoceima">Al Hoceima</option>
                            <option value="Beni Mellal">Beni Mellal</option>
                            <option value="Casablanca">Casablanca</option>
                            <option value="El Jadida">El Jadida</option>
                            <option value="Fès">Fès</option>
                            <option value="Kénitra">Kénitra</option>
                            <option value="Laâyoune">Laâyoune</option>
                            <option value="Marrakech">Marrakech</option>
                            <option value="Meknès">Meknès</option>
                            <option value="Nador">Nador</option>
                            <option value="Ouarzazate">Ouarzazate</option>
                            <option value="Oujda">Oujda</option>
                            <option value="Rabat">Rabat</option>
                            <option value="Salé">Salé</option>
                            <option value="Tangier">Tangier</option>
                            <option value="Taroudant">Taroudant</option>
                            <option value="Taza">Taza</option>
                            <option value="Tétouan">Tétouan</option>
                        </select>
                    </div>
                </div>
                <!-- Photo -->
                <div class="col-lg-12 d-flex">
                    <div class="form-group pt-3 col-lg-6">
                        <label for="photo">Photo :</label>
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" id="customFile">
                            <label class="custom-file-label" for="customFile">Choose file</label>
                        </div>
                    </div>
                </div>

            </fieldset>
            <fieldset class="border col-lg-12 mt-4">
                <legend>Infos professionnelles</legend>
                <div class="col-lg-12 d-flex">
                    <div class="form-group pt-3 col-lg-6 col-6">
                        <label for="inputMatricule">Matricule : <span class="text-danger">*</span></label>
                        <input name="matricule" type="text" class="form-control" id="inputMatricule"
                            placeholder="Entrez le matricule" value="8934749634">
                    </div>
                    <!-- Affectation -->
                    <div class="form-group pt-3 col-lg-6 col-6">
                        <label for="inputAffectation">Affectation : <span class="text-danger">*</span></label>
                        <select name="NumeroDeAffectation" class="form-control" id="inputAffectation">
                            <option value="Solicode" selected>Solicode</option>
                            <option value="ISTA NTIC" selected>ISTA NTIC</option>
                            <option value="Ibn marhal" selected>Ibn marhal</option>
                        </select>
                    </div>

                </div>
                <div class="col-lg-12 d-flex">
                    <!-- AFP de Travail -->
                    <div class="form-group pt-3 col-lg-6 col-6">
                        <label for="inputAFPdeTravail">EFP de Travail : <span class="text-danger">*</span></label>
                        <select name="NumeroDeAFPdeTravail" class="form-control" id="inputAFPdeTravail">
                            <option value="Solicode" selected>Solicode</option>
                            <option value="ISTA NTIC" selected>ISTA NTIC</option>
                            <option value="Ibn marhal" selected>Ibn marhal</option>
                        </select>
                    </div>
                    <!-- Spécialité -->
                    <div class="form-group pt-3 col-lg-6 col-6">
                        <label for="inputFonction">Spécialité : <span class="text-danger">*</span></label>
                        <select class="form-control select2" style="width: 100%;" data-select2-id="1" tabindex="-1"
                            aria-hidden="true">5-
                            <option selected="selected" data-select2-id="3">Développeur</option>
                            <option data-select2-id="34">comptable</option>
                        </select>
                    </div>
                </div>
                <div class="col-lg-12 d-flex">
                    <div class="form-group pt-3 col-lg-6" data-select2-id="29">
                        <label>Fonction : <span class="text-danger">*</span></label>
                        <select class="form-control select2" style="width: 100%;" data-select2-id="1" tabindex="-1"
                            aria-hidden="true">
                            <option selected="selected" data-select2-id="3">Formateur</option>
                            <option data-select2-id="34">Administrateur</option>
                        </select>
                    </div>
                </div>

            </fieldset>

            <div class="card-footer w-100 d-flex justify-content-end mt-3">
                <a href="./index.php" class="btn btn-default mr-2">Annuler</a>
                <button type="submit"
                    class="btn <?php echo (strpos($current_route, 'edit') !== false) ? 'bg-teal' : 'btn-info' ?>">
                    <?php echo (strpos($current_route, 'edit') !== false) ? 'Modifier' : 'Ajouter'; ?>
                </button>
            </div>

        </div>

    </div>
</form>