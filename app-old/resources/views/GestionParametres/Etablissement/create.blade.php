@extends('layouts.app')
@section('content')
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <!--  -->
                <div class="col-12 col-sm-12 pt-3">
                    @if (session('success'))
                        <div class="alert alert-success alert-dismissible">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                            {{ session('success') }}.
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
                    <div class="card card-info card-tabs">
                        <div class="card-header p-2 pt-1">
                            <div class="d-flex justify-content-between">
                                <h3 class="card-title">
                                    <i class="fa-solid fa-bars-staggered mr-2 pt-2 pl-3"></i>
                                    {{ __('GestionParametres/Etablissement/message.BtnAjouterEtablissement') }}
                                </h3>
                            </div>
                        </div>
                        <div class="card-body pt-2">
                            <div class="tab-content" id="custom-tabs-one-tabContent">
                                @include('GestionParametres.Etablissement.form')
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </section>
@endsection
