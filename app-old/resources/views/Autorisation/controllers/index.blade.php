@extends('layouts.app')
@section('content')
    <div class="content-header">
        <div class="container-fluid">
            @if (session('success'))
                <div class="alert alert-success alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    {{ session('success') }}.
                </div>
            @endif
            @if (session('error'))
                <div class="alert alert-warning alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    {{ session('error') }}.
                </div>
            @endif

            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>{{ __('Autorisation/controllers/message.Controllers') }}</h1>
                </div>
                <div class="col-sm-6">
                    <div class="float-sm-right d-flex justify-content-end">
                    @can('downloadSeeder-GestionControllersController')
                        <form action="{{ route('controllers.download') }}" method="post">
                            @csrf
                            @method('post')
                            <button type="submit" class="btn btn-secondary mx-2"> <i class="fas fa-download"></i>
                                {{ __('Autorisation/controllers/message.downloadControllers') }}
                            </button>
                        </form>
                        @endcan
                        @can('create-GestionControllersController')
                        <a href="{{ route('controllers.create') }}" class="btn btn-info">
                            <i class="fas fa-plus"></i>
                            {{ __('Autorisation/controllers/message.addController') }}
                        </a>
                        @endcan
                    </div>
                </div>
            </div>
        </div>
    </div>

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">

                    <div class="card">
                        <div class="card-header col-md-12">
                            <div class=" p-0">
                                <div class="input-group input-group-sm float-sm-right col-md-3 p-0">
                                    <input type="text" name="table_search" class="form-control float-right"
                                        placeholder="Recherche">
                                    <div class="input-group-append">
                                        <button type="submit" class="btn btn-default">
                                            <i class="fas fa-search"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="card-body table-responsive p-0">
                            @include('Autorisation.controllers.table')
                        </div>

                    </div>
                </div>
            </div>

    </section>

    <script>
        function confirmDelete(form, message) {
            if (confirm(message)) {
                form.submit();
            }
        }
    </script>
@endsection
