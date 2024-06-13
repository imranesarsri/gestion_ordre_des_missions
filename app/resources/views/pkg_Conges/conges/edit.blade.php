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

                    <div class="card card-teal card-tabs">
                        <div class="card-header p-0 pt-1">
                            <div class="d-flex justify-content-between">
                                <h3 class="card-title"> <i class="fa-solid fa-bars-staggered mr-2 pt-2 pl-3"></i> Modifier
                                    un
                                    congé</h3>
                                <ul class="nav nav-tabs" id="custom-tabs-one-tab" role="tablist">
                                    <li class="nav-item">
                                        <a class="nav-link active" id="custom-tabs-one-form-tab" data-toggle="pill"
                                            href="#form" role="tab" aria-controls="custom-tabs-one-home"
                                            aria-selected="true">Form</a>
                                    </li>
                                    <li class="nav-item mr-3">
                                        <a class="nav-link" id="custom-tabs-one-moreDetails-tab" data-toggle="pill"
                                            href="#detailsJourReson" role="tab" aria-controls="custom-tabs-one-profile"
                                            aria-selected="false">Details de calcule</a>
                                    </li>
                                </ul>

                            </div>
                        </div>
                        <div class="card-body">
                            <div class="tab-content" id="custom-tabs-one-tabContent">
                                <!-- get form -->
                                @include('pkg_Conges.conges.form')

                                <!-- get détails calcule -->
                                @include('pkg_Conges.conges.details-calcule')
                            </div>
                        </div>

                    </div>
                </div>
            </div>
    </section>
    <script>
        // JavaScript
        function moreDetails() {
            // Remove 'active' class from the "Form" button
            document.getElementById('custom-tabs-one-form-tab').classList.remove('active');
            // Add 'active' class to the "Details de calcule" button
            document.getElementById('custom-tabs-one-moreDetails-tab').classList.add('active');
        };
    </script>
@endsection
