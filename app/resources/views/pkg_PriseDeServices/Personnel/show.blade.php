@extends('layouts.app')
@section('content')
    <div style="min-height: 1604.71px;">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Plus d'une formation</h1>
                    </div>
                    <div class="col-sm-6">
                        <a href="javascript:history.go(-1);" class="btn btn-default float-right">
                            <i class="fa-solid fa-arrow-left"></i> Retour
                        </a>
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
                                    <img class="profile-user-img img-fluid img-circle"  src="{{ asset('images/' . $fetchedData->images)}}"
                                        alt="Photo de profil">
                                </div>
                                <h3 class="profile-username text-center">{{ $fetchedData->name }}</h3>
                                <p class="text-muted text-center">{{ $fetchedData->role }}</p>
                                <ul class="list-group list-group-unbordered">
                                    <li class="list-group-item">
                                        <b>Établissement</b>
                                        <h6 class="float-right text-purple">{{ $fetchedData->etablissement->nom }}</h6>
                                    </li>
                                    <li class="list-group-item">
                                        <b>Fonction</b>
                                        <h6 class="float-right text-purple">{{ $fetchedData->specialite->nom }}</h6>
                                    </li>
                                    <li class="list-group-item">
                                        <b>Type :</b>
                                        <h6 class="float-right text-purple">{{ $fetchedData->fonction->nom-- }}</h6>
                                    </li>
                                </ul>
                                <div class="row pt-1">
                                    <a href="{{-- route('conge.show') --}}" class="btn btn-default btn-block col-md-4 mt-2">
                                        <i class="fa-solid fa-bars-staggered mr-2"></i>
                                    </a>
                                    <a href="{{-- route('absences.show') --}}" class="btn btn-default btn-block col-md-4 mt-2">
                                        <i class="fa-regular fa-calendar-minus mr-2"></i>
                                    </a>
                                    <a href="{{-- route('missions.show') --}}" class="btn btn-default btn-block col-md-4 mt-2">
                                        <i class="fa-solid fa-business-time mr-2"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-9">
                        <div class="card card-purple card-outline">
                            <div class="card-header p-2">
                                <ul class="nav nav-pills info-personnel">
                                    <style>
                                        .info-personnel .active {
                                            background-color: #6f42c1 !important;
                                            border-color: #17a2b8 !important;
                                        }
                                    </style>
                                    <li class="nav-item"><a class="nav-link active" href="#personnelles"
                                            data-toggle="tab">Personnelles</a></li>
                                    <li class="nav-item"><a class="nav-link" href="#professionnelles"
                                            data-toggle="tab">Professionnelles</a></li>
                                    <li class="nav-item"><a class="nav-link" href="#contact" data-toggle="tab">Contact</a>
                                    </li>
                                </ul>
                            </div>
                            <div class="card-body">
                                <div class="tab-content">
                                    <div class="tab-pane active" id="personnelles">
                                        <div class="col-lg-12 d-flex px-0">
                                            <!-- Nom (français) -->
                                            <div class="form-group col-lg-6">
                                                <label for="nom" class="form-label">Nom :</label>
                                                <p id="nom">{{ $fetchedData->nom }}</p>
                                            </div>
                                            <!-- Nom (arabe) -->
                                            <div class="form-group col-lg-6">
                                                <label for="nomArab" class="form-label text-start d-flex flex-row-reverse">
                                                    : النسب </label>
                                                <p id="nomArab" class="text-end d-flex flex-row-reverse">
                                                    {{ $fetchedData->nom_arab }}</p>
                                            </div>
                                        </div>

                                        <div class="col-lg-12 d-flex px-0">
                                            <!-- Prénom (français) -->
                                            <div class="form-group col-lg-6">
                                                <label for="prenom" class="form-label">Prénom :</label>
                                                <p id="prenom">{{ $fetchedData->prenom }}</p>
                                            </div>
                                            <!-- Prénom (arabe) -->
                                            <div class="form-group col-lg-6">
                                                <label for="prenomArab"
                                                    class="form-label text-start d-flex flex-row-reverse"> : الاسم </label>
                                                <p id="prenomArab" class="text-end d-flex flex-row-reverse">
                                                    {{ $fetchedData->prenom_arab }}</p>
                                            </div>
                                        </div>

                                        <div class="col-sm-12">
                                            <label for="cin">CIN :</label>
                                            <p id="cin">{{ $fetchedData->cin }}</p>
                                        </div>

                                        <div class="col-sm-12">
                                            <label for="dob">Date de naissance :</label>
                                            <p id="dob">{{ $fetchedData->date_naissance }}</p>
                                        </div>
                                    </div>

                                    <div class="tab-pane" id="contact">
                                        <div class="col-sm-12">
                                            <label for="phone">Numéro de téléphone :</label>
                                            <p id="phone">{{ $fetchedData->telephone }}</p>
                                        </div>

                                        <div class="col-sm-12">
                                            <label for="email">Email :</label>
                                            <p id="email">{{ $fetchedData->email }}</p>
                                        </div>

                                        <div class="col-sm-12">
                                            <label for="address">Adresse :</label>
                                            <p id="address">{{ $fetchedData->address }}</p>
                                        </div>

                                        <div class="col-sm-12">
                                            <label for="city">Ville :</label>
                                            <p id="city">{{ $fetchedData->ville->nom }}</p>
                                        </div>
                                    </div>

                                    <div class="tab-pane" id="professionnelles">
                                        <div class="col-sm-12">
                                            <label for="matricule">Matricule :</label>
                                            <p id="matricule">{{ $fetchedData->matricule }}</p>
                                        </div>

                                        <div class="col-sm-12">
                                            <label for="affectation">Affectation :</label>
                                            <p id="affectation">{{ $fetchedData->etp_Affectation->nom }}</p>
                                        </div>

                                        <div class="col-sm-12">
                                            <label for="afp_travail">AFP de Travail :</label>
                                            <p id="afp_travail">{{ $fetchedData->etablissement->nom }}</p>
                                        </div>

                                        <div class="col-sm-12">
                                            <label for="fonction">Fonction :</label>
                                            <p id="fonction">{{ $fetchedData->specialite->nom }}</p>
                                        </div>

                                        <div class="col-sm-12">
                                            <label for="type">Type :</label>
                                            <p id="type">{{ $fetchedData->fonction->nom }}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
