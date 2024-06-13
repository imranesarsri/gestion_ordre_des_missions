@extends('layouts.app')

@section('content')
    <div class="content-header">
        @if (session('success'))
            <div class="alert alert-success alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                {{ session('success') }}.
            </div>
        @endif
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>{{ __('pkg_PriseDeServices/personnels.plural') }}</h1>
                </div>
                <div class="col-sm-6">
                    <div class="float-sm-right">
                        <a href="{{route('personnels.create')}}" class="btn btn-info">
                            {{ __('app.add') }} {{ __('pkg_PriseDeServices/personnels.singular') }}
                        </a>
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
                                    <input type="text" name="table_search" id="table_search"
                                        class="form-control float-right" placeholder="Recherche">
                                    <div class="input-group-append">
                                        <button type="submit" class="btn btn-default">
                                            <i class="fas fa-search"></i>
                                        </button>
                                    </div>
                                </div>

                            </div>
                        </div>
                        @include('pkg_PriseDeServices.Personnel.table')
                    </div>
                </div>
            </div>
        </div>
        <input type="hidden" id='page' value="1">
    </section>
@endsection
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script>
    $(document).ready(function() {
        function fetchData(page, searchValue) {
            $.ajax({
                url: '/personnels/?page=' + page + '&searchValue=' + searchValue,
                success: function(data) {
                    var newData = $(data);

                    $('tbody').html(newData.find('tbody').html());
                    $('#card-footer').html(newData.find('#card-footer').html());
                    var paginationHtml = newData.find('.pagination').html();
                    if (paginationHtml) {
                        $('.pagination').html(paginationHtml);
                    } else {
                        $('.pagination').html('');
                    }
                }
            });
            console.log(searchValue);
        }

        $('body').on('click', '.pagination a', function(param) {

            param.preventDefault();

            var page = $(this).attr('href').split('page=')[1];
            console.log(page);
            var searchValue = $('#table_search').val();

            fetchData(page, searchValue);

        });

        $('body').on('keyup', '#table_search', function() {
            var page = $('#page').val();
            var searchValue = $('#table_search').val();

            fetchData(page, searchValue);
        });

    });

    function submitForm() {
        document.getElementById("importForm").submit();
    }
</script>
