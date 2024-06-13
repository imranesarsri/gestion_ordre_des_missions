@extends('layouts.app')
@section('content')
    <div class="content-header">
        @if ($errors->any())
            <div class="alert alert-danger alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                @foreach ($errors->all() as $error)
                    {{ $error }}
                @endforeach
            </div>
        @endif

        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col">
                    <h1>{{ __('Autorisation/controllers/message.editController') }} {{ $controller->nom }}</h1>
                </div>
            </div>
        </div>
    </div>
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card card-info">
                        <div class="card-header">
                            <h3 class="card-title"> <i class="fas fa-gamepad nav-icon"></i>
                                {{ __('Autorisation/controllers/message.edit') }}</h3>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('controllers.update', $controller) }}" method="post">
                                @csrf
                                @method('put')
                                <div class="form-group">
                                    <label
                                        for="ControllerName">{{ __('Autorisation/controllers/message.NameController') }}</label>
                                    <input type="text" name="nom" class="form-control" id="ControllerName"
                                        placeholder="Entrez le nom de Controller"
                                        value="{{ old('nom') ?? $controller->nom }}">
                                </div>
                                <a href="{{ route('controllers.index') }}"
                                    class="btn btn-default">{{ __('Autorisation/controllers/message.cancel') }}</a>
                                <button type="submit"
                                    class="btn btn-info">{{ __('Autorisation/controllers/message.update') }}</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
