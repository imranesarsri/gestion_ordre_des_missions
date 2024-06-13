<form action="{{ isset($absence) ? route('absence.update', $absence->id) : route('absence.store') }}" method="POST">
    @csrf
    @if (isset($absence))
        @method('PUT')
    @endif
    <div class="card-body">

        <div class="form-group">
            <label for="exampleInputProject">Personnels</label>
            <select name="personnel" class="form-control personnel" id="personnel">
                <option value="" selected disabled>--Veuillez choisir un personnel--</option>
                <option value="1">Lamchatab Amine</option>
                <option value="2">Achaou Hamid</option>
                <option value="3">Sarsri Imran</option>
            </select>
        </div>


        <div class="form-group">
            <label for="exampleInputProject">Motif</label>
            <select name="motif" class="form-control" id="exampleInputProject">
                <option value="" selected disabled>--Veuillez choisir un motif--</option>
                <option value="1">Vacances</option>
                <option value="2">Congé</option>
                <option value="3">Malade</option>
                <option value="4">Ordre de mission</option>
            </select>
        </div>

        <div class="form-group">
            <label for="exampleInputPassword1">Date de début</label>
            <input name="date_debut" type="date" class="form-control" id="exampleInputPassword1"
                placeholder="Date de début" required>
        </div>

        <div class="form-group">
            <label for="exampleInputPassword1">Date de fin</label>
            <input name="date_fin" type="date" class="form-control" id="exampleInputPassword1"
                placeholder="Date de début" required>
        </div>


        <div class="form-group">
            <label for="Remarques">Remarques</label>
            <textarea name="remarques" class="form-control" rows="7" id="Remarques" placeholder="Remarques"></textarea>
        </div>


    </div>

    <div class="card-footer">
        <a href="{{ route('absence.index') }}" class="btn btn-default">Annuler</a>
        <button type="submit"
            class="btn {{ isset($absence) ? 'bg-teal' : 'btn-info' }}">{{ isset($absence) ? __('app.edit') : __('app.add') }}</button>
    </div>

</form>
