<form action="{{ $dataToEdit ? route('personnels.update', $dataToEdit->id) : route('personnels.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    @if ($dataToEdit)
        @method('PUT')
    @endif
    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    <div class="card-body ">
        <div class="row">
            <fieldset class="border col-lg-12">
                <legend>Infos personnelles</legend>
                <div class="col-lg-12 d-flex">
                    <div class="form-group pt-3 col-lg-6">
                        <label for="nom" class="form-label">Nom : <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" id="nom" name="nom"
                            value="{{ $dataToEdit ? $dataToEdit->nom : '' }}" required>
                        @error('nom')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <!-- Nom (Arabic) -->
                    <div class="form-group pt-3 col-lg-6">
                        <label for="nom_arab" class="form-label d-flex flex-row-reverse"> :
                            النسب<span class="text-danger">*</span> </label>
                        <input type="text" class="form-control direction-rtl" id="nom_arab" name="nom_arab"
                            placeholder="أدخل النسب هنا" value="{{ $dataToEdit ? $dataToEdit->nom_arab : '' }}"
                            required>
                        @error('nom_arab')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="col-lg-12 d-flex">
                    <!-- Prénom (French) -->
                    <div class="form-group pt-3 col-lg-6">
                        <label for="prenom" class="form-label">Prénom : <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" id="prenom" name="prenom"
                            value="{{ $dataToEdit ? $dataToEdit->prenom : '' }}" required>
                        @error('prenom')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <!-- Prénom (Arabic) -->
                    <div class="form-group pt-3 col-lg-6">
                        <label for="prenomArab" class="form-label text-start d-flex flex-row-reverse"> :
                            الاسم <span class="text-danger">*</span> </label>
                        <input type="text" class="form-control text-end d-flex flex-row-reverse direction-rtl"
                            id="prenom_arab" name="prenom_arab" placeholder="أدخل الاسم هنا"
                            value="{{ $dataToEdit ? $dataToEdit->prenom_arab : '' }}" required>
                        @error('prenom_arab')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="col-lg-12 d-flex">
                    <!-- CIN -->
                    <div class="form-group pt-3 col-lg-6">
                        <label for="cin">CIN : <span class="text-danger">*</span></label>
                        <input name="cin" type="text" class="form-control" id="cin"
                            value="{{ $dataToEdit ? $dataToEdit->cin : '' }}" required>
                        @error('cin')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <!-- Date de naissance -->
                    <div class="form-group pt-3 col-lg-6">
                        <label for="inputDateDeNaissance">Date de naissance : <span class="text-danger">*</span></label>
                        <input name="date_naissance" type="date" class="form-control" id="date_naissance"
                            placeholder="Entrez le Date de naissance"
                            value="{{ $dataToEdit ? $dataToEdit->date_naissance : '' }}" required>
                        @error('date_naissance')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="col-lg-12 d-flex">
                    <!-- Numéro de téléphone -->
                    <div class="form-group pt-3 col-lg-6">
                        <label for="inputTelephone">Numéro de téléphone : <span class="text-danger">*</span></label>
                        <input name="telephone" type="text" class="form-control" id="telephone"
                            placeholder="Entrez le Numéro de téléphone"
                            value="{{ $dataToEdit ? $dataToEdit->telephone : '' }}" required>
                        @error('telephone')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <!-- Email -->
                    <div class="form-group pt-3 col-lg-6">
                        <label for="inputEmail">Email : <span class="text-danger">*</span></label>
                        <input name="email" type="email" class="form-control" id="email"
                            placeholder="Entrez le Email" value="{{ $dataToEdit ? $dataToEdit->email : '' }}" required>
                        @error('email')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="col-lg-12 d-flex">
                    <!-- Adress -->
                    <div class="form-group pt-3 col-lg-6">
                        <label for="inputAdress">Adress : <span class="text-danger">*</span></label>
                        <input name="address" type="text" class="form-control" id="address"
                            placeholder="Entrez l'adresse" value="{{ $dataToEdit ? $dataToEdit->address : '' }}"
                            required>
                        @error('address')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <!-- Ville -->
                    <div class="form-group pt-3 col-lg-6">
                        <label for="inputVille">Ville : <span class="text-danger">*</span></label>
                        <select name="ville_id" class="form-control js-example-basic-single" id="ville_id" required>
                            <option value="">Sélectionner une ville</option>
                            @foreach ($villes as $ville)
                                <option value="{{ $ville->id }}"
                                    {{ $dataToEdit && $dataToEdit->ville->id == $ville->id ? 'selected' : '' }}>
                                    {{ $ville->nom }}
                                </option>
                            @endforeach
                        </select>
                        @error('ville_id')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <!-- Photo -->
                <div class="col-lg-12 d-flex">
                    <div class="form-group pt-3 col-lg-6">
                        <label for="images">Photo :</label>
                        <div class="">
                            <input type="file" class="" id="images" name="images">
                            {{-- <label class="custom-file-label" for="customFile">Choose file</label> --}}
                        </div>
                        @error('images')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

            </fieldset>
            <fieldset class="border col-lg-12 mt-4">
                <legend>Infos professionnelles</legend>
                <div class="col-lg-12 d-flex">
                    <div class="form-group pt-3 col-lg-6 col-6">
                        <label for="matricule">Matricule : <span class="text-danger">*</span></label>
                        <input name="matricule" type="number" class="form-control" id="matricule"
                            placeholder="Entrez le matricule" value="{{ $dataToEdit ? $dataToEdit->matricule : '' }}"
                            required>
                        @error('matricule')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <!-- Affectation -->
                    <div class="form-group pt-3 col-lg-6 col-6">
                        <label for="inputAffectation">Affectation : <span class="text-danger">*</span></label>
                        <select name="etablissement_id" class="form-control" id="etablissement_id" required>
                            <option value="">Sélectionner une affectation</option>
                            @foreach ($etablissements as $etablissement)
                                <option value="{{ $etablissement->id }}"
                                    {{ $dataToEdit && $dataToEdit->etablissement->id == $etablissement->id ? 'selected' : '' }}>
                                    {{ $etablissement->nom }}
                                </option>
                            @endforeach
                        </select>
                        @error('etablissement_id')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>

                </div>
                <div class="col-lg-12 d-flex">
                    <!-- AFP de Travail -->
                    <div class="form-group pt-3 col-lg-6 col-6">
                        <label for="EFPdeTravail">EFP de Travail : <span class="text-danger">*</span></label>
                        <select name="ETPAffectation_id" class="form-control" id="ETPAffectation_id">
                            <option value="">Sélectionner EFP de travail</option>
                            @foreach ($etablissements as $etablissement)
                                <option value="{{ $etablissement->id }}"
                                    {{ $dataToEdit && $dataToEdit->etablissement->id == $etablissement->id ? 'selected' : '' }}>
                                    {{ $etablissement->nom }}
                                </option>
                            @endforeach
                        </select>
                        @error('EFPdeTravail')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <!-- Spécialité -->
                    <div class="form-group pt-3 col-lg-6 col-6">
                        <label for="inputFonction">Spécialité : <span class="text-danger">*</span></label>
                        <select name="specialite_id" class="form-control" style="width: 100%;" data-select2-id="1"
                            tabindex="-1" aria-hidden="true" required>
                            <option value="">Sélectionner une spécialité</option>
                            @foreach ($specialites as $specialite)
                                <option value="{{ $specialite->id }}"
                                    {{ $dataToEdit && $dataToEdit->specialite->id == $specialite->id ? 'selected' : '' }}>
                                    {{ $specialite->nom }}
                                </option>
                            @endforeach
                        </select>
                        @error('specialite_id')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="col-lg-12 d-flex">
                    <div class="form-group pt-3 col-lg-6" data-select2-id="29">
                        <label>Fonction : <span class="text-danger">*</span></label>
                        <select name="fonction_id" class="form-control select2" style="width: 100%;"
                            data-select2-id="1" tabindex="-1" aria-hidden="true" required>
                            <option value="">Sélectionner une fonction</option>
                            @foreach ($fonctions as $fonction)
                                <option value="{{ $fonction->id }}"
                                    {{ $dataToEdit && $dataToEdit->fonction->id == $fonction->id ? 'selected' : '' }}>
                                    {{ $fonction->nom }}
                                </option>
                            @endforeach
                        </select>
                        @error('fonction_id')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group pt-3 col-lg-6" data-select2-id="29">
                        <label>Avancement : <span class="text-danger">*</span></label>
                        <select name="avancement_id" class="form-control select2" style="width: 100%;"
                            data-select2-id="1" tabindex="-1" aria-hidden="true" required>
                            <option value="">Sélectionner avancement</option>
                            @foreach ($avancements as $avancement)
                                <option value="{{ $avancement->id }}"
                                    {{ $dataToEdit && $dataToEdit->avancement->id == $avancement->id ? 'selected' : '' }}>
                                    {{ $avancement->echell }}
                                </option>
                            @endforeach
                        </select>
                        @error('avancement_id')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
            </fieldset>

            <div class="card-footer w-100 d-flex justify-content-end mt-3">
                <a href="{{ route('personnels.index') }}" class="btn btn-default mr-2">Annuler</a>
                <button type="submit" class="btn {{ $dataToEdit ? 'bg-teal' : 'btn-info' }}">
                    {{ $dataToEdit ? 'Modifier' : 'Ajouter' }}
                </button>
            </div>

        </div>

    </div>
</form>
