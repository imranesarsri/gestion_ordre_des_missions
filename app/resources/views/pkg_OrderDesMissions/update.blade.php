@extends('layouts.app')

@section('content')
    <section class="content">
        <div class="row justify-content-end content-header">
            <div class="col-sm-6 ">
                <a href="http://127.0.0.1:8000/OrderDesMissions/missions" class="btn btn-default float-right"><i
                        class="fas fa-arrow-left"></i>
                    {{ __('app.back') }}
                </a>
            </div>
        </div>
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card card-info">
                        <div class="card-header">
                            <h3 class="card-title">
                                <i class="nav-icon fas fa-table"></i>
                                {{ __('app.edit') }} une {{ __('pkg_OrderDesMissions/mission.singular') }}
                            </h3>
                        </div>
                        <!-- Obtenir le formulaire -->
                        @livewire('multi-step-fomr', ['dataToEdit' => 'update', 'ID' => $id])
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
