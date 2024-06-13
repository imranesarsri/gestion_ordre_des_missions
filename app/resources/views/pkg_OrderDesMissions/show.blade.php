@extends('layouts.app')

@section('content')
    <div class="content-header">
        @if (session('success'))
            <div class="alert alert-success alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                {{ session('success') }}.
            </div>
        @endif
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Historique {{ __('pkg_OrderDesMissions/mission.plural') }}</h1>
                </div>
                <div class="col-sm-6">
                    <a href="{{ route('missions.index') }}" class="btn btn-default float-right"><i
                            class="fas fa-arrow-left"></i>
                        {{ __('app.back') }}
                    </a>
                </div>
            </div>
        </div>
    </div>
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12 col-lg-4 col-xl-3">
                    <div class="card card-purple card-outline">
                        <div class="card-body box-profile">
                            <div class="text-center">
                                <img class="profile-user-img img-fluid img-circle" src="{{ asset('images/man.png') }}"
                                    alt="User profile picture">
                            </div>
                            <h3 class="profile-username text-center">{{ $mission->nom }}</h3>
                            <p class="text-muted text-center">{{ $mission->matricule }}</p>
                            <ul class="list-group list-group-unbordered mb-3">
                                <li class="list-group-item">
                                    <b>Fonction</b> <a class="float-right text-purple">{{ $mission->specialite->nom }}</a>
                                </li>
                                <li class="list-group-item">
                                    <b>Phone</b> <a class="float-right text-purple">{{ $mission->telephone }}</a>
                                </li>
                                <li class="list-group-item">
                                    <b>Type</b> <a class="float-right text-purple">{{ $mission->fonction->nom }}</a>
                                </li>
                            </ul>
                            <a href="/view/personnels/more-info.php" class="btn bg-purple btn-block"
                                style="margin-top: 2rem"><b>Plus
                                    d'informations</b></a>
                        </div>
                    </div>
                </div>

                <div class="col-12 col-lg-8 col-xl-9">
                    <section class="content">
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-12">
                                    <div class="card card-purple card-outline">
                                        <div class="card-header col-md-12">
                                            <div class="row justify-content-end">
                                                <div class="col-4">
                                                    <div class="d-flex justify-content-end">

                                                        <div class=" p-0">
                                                            <div class="input-group input-group-sm">
                                                                <input type="text" name="table_search" id="table_search"
                                                                    class="form-control" placeholder="Recherche">
                                                                <div class="input-group-append">
                                                                    <button type="submit" class="btn btn-default">
                                                                        <i class="fas fa-search"></i>
                                                                    </button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        @include('pkg_OrderDesMissions/showTable')
                                    </div>
                                </div>
                            </div>
                        </div>
                        <input type="hidden" id='page' value="1">
                    </section>

                </div>

            </div>

        </div>
    </section>
@endsection
