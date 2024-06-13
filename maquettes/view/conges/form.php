<div class="tab-pane fade show active" id="form" role="tabpanel" aria-labelledby="custom-tabs-one-form-tab">
    <form method="POST">
        <div class="card-body">

            <div class="card-body">

                <div class="form-group">
                    <label for="exampleInputProject">Personnel : <span class="text-danger">*</span></label>
                    <select name="project" class="form-control js-example-basic-single" id="exampleInputProject">
                        <option value="projet1">Mohamed alami</option>
                        <option value="projet2">ahmed Alami</option>
                        <option value="projet3">jalil alami</option>
                        <option value="projet4">imran lmadani</option>
                    </select>
                </div>

                <div class="row d-flex justify-content-center">
                    <div class="col-12 col-sm-4">
                        <div class="info-box bg-light">
                            <div class="info-box-content">
                                <span class="info-box-text text-center text-muted">Nombre du Jours restants</span>
                                <span class="info-box-number text-center text-muted mb-0">8</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-sm-4">
                        <div class="info-box bg-light">
                            <div class="info-box-content">
                                <span class="info-box-text text-center text-muted"> <a class="btn btn-default" id="custom-tabs-one-moreDetails-tab" onclick="moreDetails()" data-toggle="pill" href="#detailsJourReson" role="tab" aria-controls="custom-tabs-one-profile" aria-selected="false">Details de calcule</a>
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Motif -->
                <div class="form-group">
                    <label for="inputAffectation">Motif : <span class="text-danger">*</span></label>
                    <select name="NumeroDeAffectation" class="form-control" id="inputAffectation">
                        <option value="Solicode" selected>Mariage</option>
                        <option value="ISTA NTIC" selected>Vacances</option>
                        <option value="Ibn marhal" selected>Maternité</option>
                        <option value="Ibn marhal" selected>Personnel</option>
                    </select>
                </div>


                <div class="form-group">
                    <label for="inputStartDate">Date de début : <span class="text-danger">*</span></label>
                    <input name="startDate" type="date" class="form-control" id="inputStartDate" placeholder="Sélectionnez la date de début" value="2024-02-01">
                </div>

                <div class="form-group">
                    <label for="inputEndDate">Date de fin : <span class="text-danger">*</span></label>
                    <input name="endDate" type="date" class="form-control" id="inputEndDate" placeholder="Sélectionnez la date de fin" value="2024-02-05">

                </div>

                <div class="form-group">
                        <label for="inputEndDate">Nombre des jours :</label>
                        <p name="nobreJours" class="form-control">3</p>
                </div>
            </div>


            <div class="card-footer w-100 d-flex justify-content-end">
                <a href="./index.php" class="btn btn-default mr-2">Annuler</a>
                <button type="submit" class="btn <?php echo strpos($current_route, 'edit') !== false ? 'bg-teal' : 'btn-info'; ?>"><?php echo strpos($current_route, 'edit') !== false ? 'Modifier' : 'Ajouter'; ?></button>
            </div>
        </div>
    </form>

</div>