@extends('layouts.app')
@section('content')

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12 mt-4">

                    @if (session('success'))
                        <div class="alert alert-success alert-dismissible">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                            {{ session('success') }}.
                        </div>
                    @endif
                    @if ($errors->has('role_exists'))
                        <div class="alert alert-danger">
                            {{ $errors->first('role_exists') }}
                        </div>
                    @else
                        @if ($errors->has('unexpected_error'))
                            <div class="alert alert-danger">
                                {{ $errors->first('unexpected_error') }}
                            </div>
                        @endif
                    @endif

                    <div class="card card-info">
                        <div class="card-header">
                            <h3 class="card-title"> <i class="far fa-user-circle nav-icon"></i>
                                {{ __('Autorisation/roles/message.editRole') }}</h3>
                        </div>
                        <div class="card-body">
                            {{-- get form --}}
                            @include('Autorisation.roles.form')
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </section>
@endsection
