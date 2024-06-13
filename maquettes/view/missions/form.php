<form action="process_form.php" method="POST">
    <fieldset class="border col-lg-12 mb-5 p-3">
        <legend>Les Informations de mission</legend>
        <div class="row">
            <div class="form-group col-lg-6 col-12">
                <label for="inputEndDate">Personnel <span class="text-danger">*</span></label>
                <select class="js-example-basic-multiple" style="width: 100%;" name="states[]" multiple="multiple">
                    <option value="AL">Alabama</option>
                    <option value="WY">sdsd</option>
                    <option value="WY">Wyoming</option>
                    <option value="WY">dsfryrt</option>
                </select>
            </div>

            <div class="form-group col-lg-6 col-12">
                <label for="inputEndDate">Numéro de mission <span class="text-danger">*</span></label>
                <input name="endDate" type="" class="form-control" id="inputEndDate"
                    placeholder="Sélectionnez la nom mission" value="102">
            </div>
            <div class="form-group col-lg-6 col-12">
                <label for="inputEndDate">Nature <span class="text-danger">*</span></label>
                <input name="endDate" type="" class="form-control" id="inputEndDate"
                    placeholder="Sélectionnez la nature" value="">
            </div>
            <div class="form-group col-lg-6 col-12">
                <label for="inputDescription">Type de mission <span class="text-danger">*</span></label>
                <input name="nombreDuJour" type="text" class="form-control" id="nombreDuJour"
                    placeholder="Sélectionnez Type de mission" value="Voyage d'affaires">
            </div>
            <div class="form-group col-lg-6 col-12">
                <label for="inputDescription">Numéro d'ordre de mission <span class="text-danger">*</span></label>
                <input name="nombreDuJour" type="text" class="form-control" id="nombreDuJour"
                    placeholder="Sélectionnez Numéro d'ordre de mission" value="12">
            </div>

        </div>

    </fieldset>
    <fieldset class="border col-lg-12 mb-5 p-3">
        <legend>Moyens des transports</legend>
        <div class="row border MoyensTransportsForm p-2">
            <div class="form-group col-lg-6 col-12 moyens-de-transport">
                <label for="date-de-fin">Moyens de transport <span class="text-danger">*</span></label>
                <select class="form-control select-moyens-de-transport">
                    <option value="transport-public" class="transport-public">Transport public</option>
                    <option value="voiture-de-mission" class="voiture-de-mission">Voiture de mission</option>
                    <option value="voiture-de-personnel" class="voiture-de-personnel">Voiture de personnel</option>
                </select>
            </div>
            <div class="form-group col-lg-6 col-12 transport-marque">
                <label for="inputDescription">Marque <span class="text-danger">*</span></label>
                <input name="nombreDuJour" type="text" class="form-control" id="nombreDuJour"
                    placeholder="Sélectionnez Numéro d'ordre de mission" value="Toyota">
            </div>
            <div class="form-group col-lg-6 col-12 transport-numéro-de-plaque">
                <label for="inputDescription">Numéro de plaque <span class="text-danger">*</span></label>
                <input name="nombreDuJour" type="text" class="form-control" id="nombreDuJour"
                    placeholder="Sélectionnez Numéro d'ordre de mission" value="ABC123">
            </div>
            <div class="form-group col-lg-6 col-12 transport-puissance-fiscale">
                <label for="inputDescription">Puissance fiscale<span class="text-danger">*</span></label>
                <input name="nombreDuJour" type="text" class="form-control" id="nombreDuJour"
                    placeholder="Sélectionnez Puissance fiscale" value="4cv">
            </div>
        </div>
        <div class="Moyens_transport">

        </div>
        <div class="row justify-content-center">
            <span class="btn btn-info mt-3">
                <i class="fa-solid fa-plus"></i>
            </span>
        </div>
    </fieldset>
    <fieldset class="border col-lg-12 mb-5 p-3">
        <legend>
            Planification de mission
        </legend>
        <div class="row template">
            <div class="form-group col-lg-6 col-12">
                <label for="Lieu">Lieu <span class="text-danger">*</span></label>
                <input name="Lieu" type="text" class="form-control" id="Lieu" placeholder="Sélectionnez " value="Rabat">
            </div>

            <div class="form-group col-lg-6 col-12">
                <label for="date-de-fin">Date d'ordre de mission <span class="text-danger">*</span></label>
                <input name="date-de-fin" type="date" class="form-control" id="date-de-fin" placeholder="Sélectionnez "
                    value="2024-02-10">
            </div>
            <div class="form-group col-lg-6 col-12">
                <label for="date-début">Date début <span class="text-danger">*</span></label>
                <input name="date-début" type="date" class="form-control" id="date-début" placeholder="Sélectionnez "
                    value="2024-02-15">
            </div>
            <div class="form-group col-lg-6 col-12">
                <label for="date-de-fin">Date de fin <span class="text-danger">*</span></label>
                <input name="date-de-fin" type="date" class="form-control" id="date-de-fin" placeholder="Sélectionnez "
                    value="2024-02-20">
            </div>
            <div class="form-group col-lg-6 col-12">
                <label for="date-de-fin">Date de départ <span class="text-danger">*</span></label>
                <input name="date-de-fin" type="date" class="form-control" id="date-de-fin" placeholder="Sélectionnez "
                    value="2024-02-14">
            </div>
            <div class="form-group col-lg-6 col-12">
                <label for="date-de-fin">Heure de départ <span class="text-danger">*</span></label>
                <input name="date-de-fin" type="text" class="form-control" id="date-de-fin" placeholder="Sélectionnez "
                    value="14H00">
            </div>
            <div class="form-group col-lg-6 col-12">
                <label for="date-de-fin">Date de retour <span class="text-danger">*</span></label>
                <input name="date-de-fin" type="date" class="form-control" id="date-de-fin" placeholder="Sélectionnez "
                    value="2024-02-21">
            </div>
            <div class="form-group col-lg-6 col-12">
                <label for="date-de-fin">Heure de retour <span class="text-danger">*</span></label>
                <input name="date-de-fin" type="text" class="form-control" id="date-de-fin" placeholder="Sélectionnez "
                    value="14H00">
            </div>
        </div>
    </fieldset>

    <div class="card-footer d-flex justify-content-end">
        <a href="./index.php" class="btn btn-default">Annuler</a>
        <button type="submit" class="btn btn-info ml-2">Ajouter</button>
    </div>
</form>

<script>
    $(document).ready(function () {
        $('.js-example-basic-multiple').select2();
    });
</script>