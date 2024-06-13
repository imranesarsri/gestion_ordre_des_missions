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

            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>{{ __('Autorisation/Action/message.actions') }}
                        @isset($controller)
                            de {{ $controller->nom }}<div id="controllerID" data-controllerid="{{ $controller->id }}"></div>
                        @endisset
                    </h1>
                </div>
                <div class="col-sm-6">
                    @csrf
                    @method('post')
                    @can('SyncControllersActions-ActionController')
                        <a href="{{ route('actions.sync') }}" type="submit" class="btn btn-secondary mx-2"> <i
                                class="fas fa-download"></i>
                            {{ __('Autorisation/Action/message.extractActions') }}
                        </a>
                    @endcan
                    @can('create-ActionController')
                        <div class="float-sm-right">
                            <a href="{{ route('actions.create') }}"
                                class="btn btn-info">{{ __('Autorisation/action/message.add') }}
                            </a>
                        </div>
                    @endcan
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
                            <div class="d-flex justify-content-between">

                                <div class="dropdown input-group">
                                    <button class="btn btn-default mr-3 dropdown-toggle" type="button"
                                        id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true"
                                        aria-expanded="false">
                                        <i class="fa-solid fa-filter text-dark pr-2 border-right"></i>
                                        {{ __('Autorisation/action/message.choix') }}
                                    </button>

                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                        @foreach ($controllers as $item)
                                            <a class="dropdown-item"
                                                href="/Autorisations/actions/{{ $item->id }}/actions">{{ $item->nom }}
                                            </a>
                                        @endforeach

                                    </div>
                                </div>

                                <div class=" p-0">
                                    <div class="input-group input-group-sm">
                                        <input type="text" name="action_search" id="action_search" class="form-control"
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
                        @include('Autorisation.action.table')
                    </div>

                </div>
            </div>
        </div>

    </section>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script>
        $(document).ready(function() {
            function fetch_data(page, search) {
                var controllerID = $('#controllerID').data('controllerid');
                var url;

                if (controllerID) {
                    url = '/Autorisations/actions/' + controllerID + '/actions?page=' + page + '&searchAction=' +
                        search;
                } else {
                    url = '/Autorisations/actions?page=' + page + '&searchAction=' + search;
                }

                $.ajax({
                    url: url,
                    success: function(data) {
                        var newData = $(data);
                        console.log(newData);
                        $('#action-table').html(newData.find('#action-table').html());
                        $('.card-footer').html(newData.find('.card-footer').html());
                        var paginationHtml = newData.find('.pagination').html();
                        if (paginationHtml) {
                            $('.pagination').html(paginationHtml);
                        } else {
                            $('.pagination').html('');
                        }
                    }
                });
            }

            $('body').on('click', '.pagination a', function(param) {
                param.preventDefault();
                var page = $(this).attr('href').split('page=')[1];
                var search = $('#action_search').val();
                fetch_data(page, search);
            });

            $('body').on('keyup', '#action_search', function() {
                var search = $('#action_search').val();
                var page = 1;
                fetch_data(page, search);
            });

            fetch_data(1, '');
        });


        function confirmDelete(form) {
            if (confirm("Êtes-vous sûr de vouloir supprimer cette tâche ?")) {
                form.submit();
            }
        }
    </script>
@endsection
