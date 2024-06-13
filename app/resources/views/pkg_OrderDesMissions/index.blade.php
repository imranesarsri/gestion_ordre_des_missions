@extends('layouts.app')

@section('content')
    <div class="content-header">
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
        @if (session('warning'))
            <div class="alert alert-warning alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                {{ session('warning') }}.
            </div>
        @endif
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>{{ __('app.list') }} {{ __('pkg_OrderDesMissions/mission.plural') }}</h1>
                </div>
                <div class="col-sm-6">
                    @can('create-MissionsController')
                        <div class="float-sm-right">
                            <a href="{{ route('missions.create') }}" class="btn btn-info">
                                <i class="fas fa-plus"></i>
                                {{ __('app.add') }} {{ __('pkg_OrderDesMissions/mission.singular') }}
                            </a>
                        </div>
                    @endcan
                </div>
            </div>

        </div>
    </div>
    <section class="content">
        <div class="container-fluid">
            <div class="col-12">
                <div class="card">
                    <div class="card-header col-md-12">
                        <div class="row justify-content-between">
                            <div class="col-4">
                                <div class="">
                                    <div class=" p-0">
                                        <div class="input-group input-group-sm">
                                            <div class="input-group-append">
                                                <button type="submit" class="btn btn-default">
                                                    <i class="fas fa-filter "></i>
                                                </button>
                                            </div>
                                            <select id="filterSelectByTypeMissions" name="filterSelectByTypeMissions"
                                                class="form-control select-moyens-de-transport">
                                                <option value="choisissez" class="Choisissez">
                                                    Choisissez un type des missions
                                                </option>
                                                <option value="missions_actuelles" class="missions-actuelles">
                                                    {{ __('pkg_OrderDesMissions/mission.current_missions') }}
                                                </option>
                                                <option value="missions_precedentes" class="missions-precedentes">
                                                    {{ __('pkg_OrderDesMissions/mission.previous_missions') }}
                                                </option>
                                                <option value="prochaines_missions" class="prochaines-missions">
                                                    {{ __('pkg_OrderDesMissions/mission.next_missions') }}
                                                </option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-4">
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
                        </div>
                    </div>
                    @include('pkg_OrderDesMissions/table')
                </div>
            </div>
        </div>
        <input type="hidden" id='page' value="1">
    </section>
@endsection
