@extends('layouts.app')
@section('title', __('pkg_Absences/Absence.singular'))

@section('content')

    <section class="content pt-4">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">

                    <div class="card card-info">
                        <div class="card-header">
                            <h2 class="card-title"> <i class="fa-regular fa-calendar-minus mr-2"></i> Ajouter une absence
                            </h2>
                        </div>
                        @include('pkg_Absences.form')
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
