@extends('layouts.app')
@section('content')
    <div class="content">
        <section class="content-header">
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1>{{ __('Autorisation/roles/message.roles') }}</h1>
                        </div>
                        <div class="col-sm-6">
                            @can('create-RoleController')
                                <div class="float-sm-right mr-2">
                                    <a href="{{ route('roles.create') }}" class="btn btn-info">
                                        <i class="fas fa-plus"></i> {{ __('Autorisation/roles/message.ajouter') }}
                                    </a>
                                </div>
                            @endcan
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                @if (session('success'))
                    <div class="alert alert-success alert-dismissible">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                        {{ session('success') }}.
                    </div>
                @endif

                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header col-md-12">
                                <div class=" p-0">
                                    <div class="input-group input-group-sm float-sm-right col-md-3 p-0">
                                        <input type="text" id="roles_search" class="form-control float-right"
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
                                {{-- get table --}}
                                @include('Autorisation.roles.table')
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- /.content -->
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script>
        $(document).ready(function() {
            function fetch_data(page, search) {
                var projectID = $('#projectID').data('projectid');
                var url;

                url = '/Autorisations/roles?page=' + page + '&searchRole=' + search;

                $.ajax({
                    url: url,
                    success: function(data) {
                        var newData = $(data);
                        console.log(newData);
                        $('#role-table').html(newData.find('#role-table').html());
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
                var search = $('#roles_search').val();
                fetch_data(page, search);
            });

            $('body').on('keyup', '#roles_search', function() {
                var search = $('#roles_search').val();
                var page = 1;
                fetch_data(page, search);
            });

            // fetch_data(1, '');
        });
    </script>
@endsection
