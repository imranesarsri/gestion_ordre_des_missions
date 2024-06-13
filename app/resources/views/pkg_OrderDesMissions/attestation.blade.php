@extends('layouts.app')

@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>
                        {{ __('pkg_OrderDesMissions/certificate.certificate') }}
                        {{ __('pkg_OrderDesMissions/mission.plural') }}
                    </h1>
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
    <section class="content" id="Attestation">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body row">
                            <section class="col-12 headerLogo mb-5">
                                <img src="{{ asset('images/logo-ofppt.png') }}" class="logoOfppt" alt="ofppt">
                                <div class="d-flex flex-row-reverse">
                                    <div class=" mt-auto">
                                        <p>OFP/DRTTA/CFPT1/OM/N<sup>o</sup> 07/22</p>
                                        <p>Date : {{ $presentDate }}</p>
                                    </div>
                                </div>
                            </section>
                            <section class="col-12 mt-3 headerTitle">
                                <H2 class="text-center text-uppercase font-weight-bold ">
                                    {{ __('pkg_OrderDesMissions/mission.plural') }}
                                </H2>
                                <p class="text-center font-weight-normal text-capitalize mt-3 mb-0"
                                    style="font-size: 20px;">
                                    {{ __('pkg_OrderDesMissions/certificate.regional_director') }}
                                </p>
                                <p class="text-center font-weight-normal text-capitalize" style="font-size: 20px;">-Tanger-
                                </p>
                            </section>
                            <section class="col-12 mt-3">
                                <h3 class="text-center text-uppercase font-weight-normal">
                                    {{ __('pkg_OrderDesMissions/certificate.designates') }}
                                </h3>
                                <div class="bodyContent row justify-content-center border border-dark">
                                    <div class="col-12 row border border-dark">
                                        <div class="col-8 pl-0">
                                            <p> {{ __('pkg_OrderDesMissions/certificate.mr_mrs') }}
                                                <span class="font-weight-bold">{{ $user->full_name }}</span>
                                            </p>
                                        </div>
                                        <div class="col-4">
                                            <p>Matricule :
                                                <span class="font-weight-bold">{{ $user->matricule }}</span>
                                            </p>
                                        </div>
                                    </div>
                                    <div class="col-12 border border-dark">
                                        <p>Catégorie :
                                            <span class="font-weight-bold">{{ $user->avancement->echell }}</span>
                                        </p>
                                    </div>
                                    <div class="col-12 border border-dark">
                                        <p>Affectation :
                                            <span class="font-weight-bold text-uppercase">
                                                {{ $user->etablissement->nom }}
                                            </span>
                                        </p>
                                    </div>
                                    <div class="col-12 border border-dark">
                                        <p> {{ __('pkg_OrderDesMissions/certificate.to_go_to') }} :
                                            <span class="font-weight-bold text-uppercase">
                                                {{ $user->etablissement->nom }}
                                            </span>
                                        </p>
                                    </div>
                                    <div class="col-12 border border-dark">
                                        <p>{{ __('app.name') }} de
                                            {{ __('pkg_OrderDesMissions/mission.singular') }} :
                                            <span class="font-weight-bold">
                                                <i class="fa-solid fa-angles-left"></i>
                                                {{ $mission->type_de_mission }}
                                                <i class="fa-solid fa-angles-right"></i>
                                            </span>
                                        </p>
                                    </div>
                                    <div class="col-12 border border-dark row">
                                        <div class="col-8 pl-0">
                                            <p>
                                                {{ __('pkg_OrderDesMissions/mission.date_depart') }} :
                                                <span class="font-weight-bold">{{ $mission->date_depart }}</span>
                                            </p>
                                        </div>
                                        <div class="col-4 pl-0">
                                            <p>{{ __('pkg_OrderDesMissions/mission.heure_de_depart') }} :
                                                <span class="font-weight-bold">{{ $mission->heure_de_depart }}</span>
                                            </p>
                                        </div>
                                    </div>
                                    <div class="col-12 border border-dark row">
                                        <div class="col-8 pl-0">
                                            <p>
                                                {{ __('pkg_OrderDesMissions/mission.date_return') }} :
                                                <span class="font-weight-bold">{{ $mission->date_return }}</span>
                                            </p>
                                        </div>
                                        <div class="col-4 pl-0">
                                            <p>
                                                {{ __('pkg_OrderDesMissions/mission.heure_de_return') }} :
                                                <span class="font-weight-bold">{{ $mission->heure_de_return }}</span>
                                            </p>
                                        </div>
                                    </div>
                                    @foreach ($transports as $transport)
                                        <div class="col-12 border border-dark">
                                            <p>L'intéressé (e) utilisera :
                                                <span class="font-weight-bold text-capitalize">
                                                    {{ $transport->transport_utiliser }}
                                                </span>
                                            </p>
                                            <div class="row m-3 border border-dark">
                                                @if ($transport && !empty($transport->marque))
                                                    <div class="col border border-dark px-2 py-3">
                                                        <p class="text-capitalize p-0 m-0">
                                                            {{ __('pkg_OrderDesMissions/transport.marque') }} :
                                                            <span class="font-weight-bold">{{ $transport->marque }}</span>
                                                        </p>
                                                    </div>
                                                @endif
                                                @if ($transport && !empty($transport->numiro_plaque))
                                                    <div class="col border border-dark px-2 py-3">
                                                        <p class=" text-capitalize p-0 m-0">
                                                            {{ __('pkg_OrderDesMissions/transport.numiro_plaque') }} :
                                                            <span
                                                                class="font-weight-bold">{{ $transport->numiro_plaque }}</span>
                                                        </p>
                                                    </div>
                                                @endif
                                                @if ($transport && !empty($transport->puissance_fiscal))
                                                    <div class="col border border-dark px-2 py-3">
                                                        <p class="text-capitalize p-0 m-0">
                                                            {{ __('pkg_OrderDesMissions/transport.puissance_fiscal') }}:
                                                            <span
                                                                class="font-weight-bold">{{ $transport->puissance_fiscal }}</span>
                                                        </p>
                                                    </div>
                                                @endif
                                            </div>
                                        </div>
                                    @endforeach

                                </div>
                            </section>
                            <section class="col-12 mt-3 signature">
                                <div class="row border border-dark">
                                    <div class="col border border-dark">
                                        <h5 class="text-center  pt-2">
                                            <span>
                                                {{ __('pkg_OrderDesMissions/certificate.cfp_director') }}
                                            </span>
                                        </h5>

                                    </div>
                                    <div class="col border border-dark">
                                        <h5 class="text-center pt-2">
                                            <span>
                                                {{ __('pkg_OrderDesMissions/certificate.regional_director_drt') }}
                                            </span>
                                        </h5>
                                    </div>
                                </div>
                            </section>
                            <section class="col-12 mt-3 footer">
                                <div class="mt-5">
                                    <p class="display-5 font-weight-bold text-capitalize text-center">
                                        {{ __('pkg_OrderDesMissions/certificate.footer_title') }}
                                    </p>
                                    <div class="row">
                                        <div class="col font-weight-bold firstPartOfFoter">
                                            {{ __('pkg_OrderDesMissions/certificate.regional_director_drt_cfp') }}
                                        </div>
                                        <div class="col">
                                            <ul>
                                                <li class="text-uppercase">
                                                    {{ __('pkg_OrderDesMissions/certificate.ista_ntic') }}
                                                </li>
                                                <li class="text-capitalize">
                                                    {{ __('pkg_OrderDesMissions/certificate.km_06_route') }}
                                                </li>
                                                <li>{{ __('pkg_OrderDesMissions/certificate.telephone') }} : 05 39 38 08 71

                                                </li>
                                            </ul>
                                        </div>
                                        <div class="col">
                                            <ul>
                                                <li class="text-uppercase">
                                                    {{ __('pkg_OrderDesMissions/certificate.ista_ibn_marhal') }}
                                                </li>
                                                <li class="text-capitalize">
                                                    {{ __('pkg_OrderDesMissions/certificate.ibn_marhal_address') }}
                                                </li>
                                                <li>{{ __('pkg_OrderDesMissions/certificate.telephone') }} : 05 39 94 00 97
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="col">
                                            <ul>
                                                <li class="text-uppercase">
                                                    {{ __('pkg_OrderDesMissions/certificate.solicode_tangier') }}
                                                </li>
                                                <li class="text-capitalize">
                                                    {{ __('pkg_OrderDesMissions/certificate.solicode_address') }}
                                                </li>
                                                <li>{{ __('pkg_OrderDesMissions/certificate.telephone') }} : 05 39 30 88 85
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </section>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <div class="row content">
        <div class="container-fluid pb-3">

            <div class="col ">
                <div class="float-sm-right">
                    <button id="printButton" class="btn bg-purple"><i class="fa-solid fa-print"></i>
                        {{ __('app.imprimer') }}
                    </button>
                </div>
            </div>
        </div>
    </div>
@endsection
