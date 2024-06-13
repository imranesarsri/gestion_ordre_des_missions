@extends('layouts.app')

@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>{{ __('GestionParametres/Etablissement/message.LesEtablissements') }}</h1>
                </div>
                <div class="col-sm-6">
                    <div class="float-sm-right">
                        <a href="{{ route('etablissement.create') }}" class="btn btn-info">
                            <i class="fas fa-plus"></i>
                            {{ __('GestionParametres/Etablissement/message.AjouterEtablissement') }}
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    @if (session('success'))
                        <div class="alert alert-success alert-dismissible">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                            {{ session('success') }}.
                        </div>
                    @endif
                    @if (session('error'))
                        <div class="alert alert-danger alert-dismissible">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                            {{ session('error') }}.
                        </div>
                    @endif
                    @if ($errors->any())
                        <div class="alert alert-danger alert-dismissible">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                            @foreach ($errors->all() as $error)
                                {{ $error }}<br>
                            @endforeach
                        </div>
                    @endif
                    <div class="card">
                        <div class="card-header col-md-12">
                            <div class="d-flex justify-content-end">
                                <div class=" p-0">
                                    <div class="input-group input-group-sm">
                                        <input type="text" name="table_search" id="table_search" class="form-control"
                                            placeholder="Recherche">
                                        <div class="input-group-append">
                                            <button type="submit" class="btn btn-default">
                                                <i class="fas fa-search"></i>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-body table-responsive p-0">
                            @include('GestionParametres.Etablissement.table')
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- script and Delete Modal -->
    <div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header bg-danger">
                    <h5 class="modal-title" id="deleteModalLabel">
                        {{ __('GestionParametres/Etablissement/message.ConfirmerDeleteEtablissementTitre') }} </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p>{{ __('GestionParametres/Etablissement/message.ConfirmerDeleteEtablissement') }} </p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary"
                        data-dismiss="modal">{{ __('GestionParametres/Etablissement/message.BtnAnnulerEtablissement') }}</button>
                    <form id="form_delete" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit"
                            class="btn btn-danger">{{ __('GestionParametres/Etablissement/message.BtnDeleteEtablissement') }}</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script>
        function AddIdInModal(etablissementId) {
            var form = document.getElementById("form_delete");
            var actionUrl = "{{ route('etablissement.destroy', '') }}";
            form.action = actionUrl + "/" + etablissementId;
        }

        function submitForm() {
            document.getElementById("importForm").submit();
        }
    </script>
@endsection
