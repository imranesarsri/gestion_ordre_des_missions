@extends('layouts.app')
@section('content')
    <!-- Content Wrapper. Contains page content -->

    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>{{ __('Autorisation/GestionAutorisation/message.Permissions') }}</h1>
                </div>
                <div class="col-sm-6">
                    <div class="float-sm-right">
                        <a href="{{ route('autorisations.create') }}" class="btn btn-info btnAdd"> <i class="fas fa-plus"></i>
                            {{ __('Autorisation/GestionAutorisation/message.Create Permission') }}</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /.content-header   -->

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">

            @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif

            @if (session('error'))
                <div class="alert alert-danger">
                    {{ session('error') }}
                </div>
            @endif
            <!-- Small boxes (Stat box) -->
            <div class="card">

                <div class="card-header col-md-12">
                    <div class="form-row">
                        <div class="form-group form-group-sm col-md-4">
                            <label for="roleSelect">{{ __('Autorisation/GestionAutorisation/message.Role') }}</label>
                            <select class="form-control" id="roleSelect">
                          <option value="">All Roles</option>
                                @foreach ($roles as $role)
                                <option value="{{$role->name}}">{{$role->name}}</option>
                            @endforeach
                            </select>
                        </div>
                        <div class="form-group form-group-sm col-md-4">
                            <label for="controllerSelect">{{ __('Autorisation/GestionAutorisation/message.Controller') }}</label>
                            <select class="form-control" id="controllerSelect">
                    <option value="">All Controllers</option>

                    @foreach ($controllers as $controller)
                        <option value="{{$controller->nom}}">{{$controller->nom}}</option>
                    @endforeach
                            </select>
                        </div>
                        <div class="form-group form-group-sm col-md-4">
                            <label for="searchInput">{{ __('Autorisation/GestionAutorisation/message.Search') }}</label>
                            <div class="input-group">
                                <input type="text" class="form-control" id="searchInput" placeholder="Recherche">
                                <span class="input-group-append">
                                    <button class="btn btn-default" type="button">
                                        <i class="fas fa-search"></i>
                                    </button>
                                </span>
                            </div>
                        </div>
                    </div>
                </div>

                <div id="resulthtml">
                    @include('Autorisation.Autorisations.AutorisationsTablePartial')
                </div>

            </div>

        </div>


    </section>
    <!-- /.content -->
@endsection


<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"
    integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>

<script>
$(document).ready(function() {
    $(document).on('click', '.delete-autorisation', function() {
        var role_id = $(this).data('role-id');
        var controller_name = $(this).data('controller-name'); // Retrieve controller name
        var deleteUrl = "{{ route('autorisations.destroy', ['id' => ':id', 'controller' => ':controller']) }}";
        deleteUrl = deleteUrl.replace(':id', role_id);
        deleteUrl = deleteUrl.replace(':controller', controller_name);

        // Update modal content with the controller name
        $('#modal-default .modal-body').html(`
            <div>
                {{ __('Autorisation/GestionAutorisation/message.if you are sure you want to delete this autorisation') }}
                <strong>"${controller_name}"</strong>
                {{ __('Autorisation/GestionAutorisation/message.Click the Delete button to continue') }}
            </div>
        `);
        // Update form action URL
        $('#deleteForm').attr('action', deleteUrl);
    });
});


    var searchQuery = '';
    const search = (query = '', page = 1) => {
        $.ajax('{{ route('autorisations.index') }}', {
            data: {
                query: query,
                page: page
            },
            success: (data) => updateTable(data)
        });
        history.pushState(null, null, '?query=' + query + '&page=' + page);
    };



    const updateTable = (html) => {
        try {
            $('#resulthtml').html(html); // Target the tbody element and update its content
            updatePaginationLinks();
        } catch (error) {}
    };


    const updatePaginationLinks = () => {
        $('button[page-number]').each(function() {
            $(this).on('click', function() {
                pageNumber = $(this).attr('page-number')
                search(searchQuery, pageNumber)
            })
        })
    }


    $(document).ready(() => {
    $('#searchInput').on('input', function() {
        searchQuery = $(this).val();
        search(searchQuery);
    });

    $('#roleSelect').on('input', function() {
        searchQuery = $(this).val();
        search(searchQuery);
    });

    $('#controllerSelect').on('input', function() {
        searchQuery = $(this).val();
        search(searchQuery);
    });

    updatePaginationLinks();
});



</script>
