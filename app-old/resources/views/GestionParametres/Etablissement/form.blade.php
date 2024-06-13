<div class="tab-pane fade show active" id="form" role="tabpanel" aria-labelledby="custom-tabs-one-form-tab">
    <form method="POST"
        action="{{ isset($etablissement) ? route('etablissement.update', $etablissement->id) : route('etablissement.store') }}">
        @csrf
        @if (isset($etablissement))
            @method('PUT')
        @endif

        <div class="card-body">

            <!-- Nom -->
            <div class="form-group">
                <label for="inputNom">Nom: <span class="text-danger">*</span></label>
                <input name="nom" type="text" class="form-control"
                    value="{{ old('nom', isset($etablissement) ? $etablissement->nom : '') }}">
                @error('nom')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <!-- Description -->
            <div class="form-group">
                <label for="inputDescription">Description:</label>
                <input type="text" name="description" class="form-control"
                    value="{{ old('description', isset($etablissement) ? $etablissement->description : '') }}">
                @error('description')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
        </div>

        <div class="card-footer w-100 d-flex justify-content-end">
            <a href="{{ route('etablissement.index') }}" class="btn btn-default mr-2">Annuler</a>
            <button type="submit" class="btn {{ isset($etablissement) ? 'btn-success' : 'btn-info' }}">
                {{ isset($etablissement) ? 'Modifier' : 'Ajouter' }}
            </button>
        </div>
    </form>
</div>
