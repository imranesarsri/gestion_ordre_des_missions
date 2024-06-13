@extends('layouts.app')

@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>{{ __('detail') }} des {{ __('pkg_OrderDesMissions/mission.plural') }}</h1>
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
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body col-sm-12 col-lg d-flex ">
                            <fieldset class="border col-lg-12 mb-5 p-3">
                                <legend>Liste des Personnel</legend>
                                <div class="col-12 table-responsive">
                                    <table class="table table-striped">
                                        <thead>
                                            <tr>
                                                <th>Matricule</th>
                                                <th>Personnel</th>
                                                <th>Catégorie</th>
                                                <th>État</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($mission->users as $user)
                                                <tr>
                                                    <td>{{ $user->matricule }}</td>
                                                    <td>{{ $user->nom }}</td>
                                                    <td>{{ $user->avancement->echell }}</td>
                                                    <td class="text-center">
                                                        @can('show-MissionsController')
                                                            <a href="{{ route('missions.show', $user->id) }}"
                                                                class='btn btn-default btn-sm'>
                                                                <i class="far fa-eye"></i>
                                                            </a>
                                                        @endcan
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </fieldset>
                        </div>
                        <div class="card-body row">
                            <div class="col-sm-12 col-lg d-flex">
                                <fieldset class="border col-lg-12 mb-5 p-3">
                                    <legend>Les Informations de mission</legend>
                                    <!-- Numéro de mission -->
                                    <div class="col-sm-12">
                                        <label for="Numéro-de-mission">
                                            {{ __('pkg_OrderDesMissions/mission.numero_mission') }} :
                                        </label>
                                        <p>{{ $mission->numero_mission }}</p>
                                    </div>
                                    <!-- Nature -->
                                    <div class="col-sm-12">
                                        <label for="Nature">
                                            {{ __('pkg_OrderDesMissions/mission.nature') }} :</label>
                                        <p>{{ $mission->nature }}</p>
                                    </div>
                                    <div class="col-sm-12">
                                        <label for="Nature">
                                            {{ __('pkg_OrderDesMissions/mission.type_de_mission') }} :</label>
                                        <p>{{ $mission->type_de_mission }}</p>
                                    </div>
                                    <div class="col-sm-12">
                                        <label
                                            for="Nature">{{ __('pkg_OrderDesMissions/mission.numero_ordre_mission') }}:</label>
                                        <p>{{ $mission->numero_ordre_mission }}</p>
                                    </div>
                                </fieldset>

                            </div>
                            <div class="col-sm-12 col-lg d-flex">
                                <fieldset class="border col-lg-12 mb-5 p-3">
                                    <legend>Planification de mission</legend>
                                    <!-- Lieu -->
                                    <div class="col-sm-12">
                                        <label for="Lieu">
                                            {{ __('pkg_OrderDesMissions/mission.lieu') }} :</label>
                                        <p>{{ $mission->lieu }}</p>
                                    </div>
                                    <!-- Date d'ordre de mission -->
                                    <div class="col-sm-12">
                                        <label for="Date-dordre-de-mission">
                                            {{ __('pkg_OrderDesMissions/mission.data_ordre_mission') }} :</label>
                                        <p>{{ $mission->data_ordre_mission }}</p>
                                    </div>
                                    <!-- Date début -->
                                    <div class="col-sm-12">
                                        <label for="Date début">
                                            {{ __('pkg_OrderDesMissions/mission.date_debut') }} :</label>
                                        <p>{{ $mission->date_debut }}</p>
                                    </div>
                                    <!-- Date de fin -->
                                    <div class="col-sm-12">
                                        <label for="Date-de-fin">
                                            {{ __('pkg_OrderDesMissions/mission.date_fin') }} :</label>
                                        <p>{{ $mission->date_fin }}</p>
                                    </div>

                                    <div class="col-sm-12">
                                        <div class="d-flex justify-content-between">
                                            <div>
                                                <!-- Date de départ -->
                                                <label for="Date-de-départ">
                                                    {{ __('pkg_OrderDesMissions/mission.date_depart') }} :</label>
                                                <p>{{ $mission->date_depart }}</p>
                                            </div>
                                            <div>
                                                <!-- Heure de départ -->
                                                <div class="col-sm-12">
                                                    <label for="Heure-de-depart">
                                                        {{ __('pkg_OrderDesMissions/mission.heure_de_depart') }} :</label>
                                                    <p>{{ $mission->heure_de_depart }}</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-sm-12">
                                        <div class="d-flex justify-content-between">
                                            <div>
                                                <!-- Date-de-retour -->
                                                <label for="Date-de-retour">
                                                    {{ __('pkg_OrderDesMissions/mission.date_return') }} :</label>
                                                <p>{{ $mission->date_return }}</p>
                                            </div>
                                            <div>
                                                <!-- Heure de retour -->
                                                <label for="Heure-de-retour">
                                                    {{ __('pkg_OrderDesMissions/mission.heure_de_return') }} :</label>
                                                <p>{{ $mission->heure_de_return }}</p>
                                            </div>
                                        </div>
                                    </div>
                                </fieldset>
                            </div>
                        </div>
                        <div class="card-body col-sm-12 col-lg d-flex">
                            <fieldset class="border col-lg-12 mb-5 p-3">
                                <legend>Moyens des transports</legend>
                                <div class="col-12 table-responsive">
                                    <table class="table table-striped">
                                        <thead>
                                            <tr>
                                                <th>Matricule</th>
                                                <th>Personnel</th>
                                                <th>{{ __('pkg_OrderDesMissions/transport.transport_utiliser') }}</th>
                                                <th>{{ __('pkg_OrderDesMissions/transport.marque') }}</th>
                                                <th>{{ __('pkg_OrderDesMissions/transport.puissance_fiscal') }}</th>
                                                <th>{{ __('pkg_OrderDesMissions/transport.numiro_plaque') }}</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @for ($i = 0; $i < max($mission->users->count(), $transports->count()); $i++)
                                                <tr>
                                                    {{-- User data --}}
                                                    @if ($i < $mission->users->count())
                                                        <td>{{ $mission->users[$i]->matricule }}</td>
                                                        <td>{{ $mission->users[$i]->nom }}</td>
                                                    @else
                                                        <td></td>
                                                        <td></td>
                                                    @endif

                                                    {{-- Transport data --}}
                                                    @if ($i < $transports->count())
                                                        <td>{{ $transports[$i]->transport_utiliser }}</td>
                                                        <td>{{ $transports[$i]->marque }}</td>
                                                        <td>{{ $transports[$i]->numiro_plaque }}</td>
                                                        <td>{{ $transports[$i]->puissance_fiscal }}</td>
                                                    @else
                                                        <td></td>
                                                        <td></td>
                                                        <td></td>
                                                        <td></td>
                                                    @endif
                                                </tr>
                                            @endfor
                                        </tbody>
                                    </table>
                                </div>
                            </fieldset>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </section>
@endsection
