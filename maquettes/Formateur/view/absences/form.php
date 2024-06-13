<?php
$current_route = $_SERVER['REQUEST_URI'];
?>
<form>
    <div class="card-body">

        <div class="form-group">
            <label for="exampleInputProject">Personnels</label>
            <select name="project" class="form-control personnel" id="personnel">
                <option value="1">Lamchatab Amine</option>
                <option value="2">Achaou Hamid</option>
                <option value="3">Sarsri Imran</option>
            </select>
        </div>


        <div class="form-group">
            <label for="exampleInputProject">Motif</label>
            <select name="project" class="form-control" id="exampleInputProject">
                <option value="1">Vacances</option>
                <option value="2" selected>Congé</option>
                <option value="3">Malade</option>
                <option value="4">Ordre de mission</option>
            </select>
        </div>

        <div class="form-group">
            <label for="exampleInputPassword1">Date de début</label>
            <input name="startDate" type="date" class="form-control" id="exampleInputPassword1" placeholder="Date de début" value="2023-01-01">
        </div>

        <div class="form-group">
            <label for="exampleInputPassword1">Date de fin</label>
            <input name="endDate" type="date" class="form-control" id="exampleInputPassword1" placeholder="Date de début" value="2023-12-31">
        </div>


        <div class="form-group">
            <label for="Remarques">Remarques</label>
            <textarea name="startDate" class="form-control" rows="7" id="Remarques" placeholder="Date de début">Compensé travail tard le soir du 01</textarea>
        </div>


    </div>

    <div class="card-footer">
        <a href="./index.php" class="btn btn-default">Annuler</a>
        <button type="submit" class="btn <?php echo (strpos($current_route, 'edit') !== false) ? 'bg-teal' : 'btn-info'; ?>"><?php echo (strpos($current_route, 'edit') !== false) ? 'Modifier' : 'Ajouter'; ?></button>
    </div>

</form>

<script src="https://cdn.ckeditor.com/ckeditor5/36.0.1/classic/ckeditor.js"></script>
<script>
    ClassicEditor
        .create(document.querySelector('#Remarques'))
        .catch(error => {
            console.error(error);
        });
</script>