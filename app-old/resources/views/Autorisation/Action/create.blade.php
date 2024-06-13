@extends('layouts.app')
@section('content')

<div class="content-header">
    @if (session('success'))
    <div class="alert alert-success alert-dismissible">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
        {{ session('success') }}.
    </div>
    @endif

    @if (session('error'))
    <div class="alert alert-danger alert-dismissible">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
        {{ session('error') }}.
    </div>
    @endif







</div>
<section class="content">

<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">

            <div class="card card-info">
                <div class="card-header">
                    <h3 class="card-title">{{__('Autorisation/action/message.addAction')}}</h3>
                </div>
                <form action="{{ route('actions.store') }}" method="POST">
                    @csrf
                    @method('POST')
                    <div class="card-body">
                        @include('Autorisation.action.fields')
                    </div>

                    <div class="card-footer">
                        <a href="{{ route('actions.index') }}" class="btn btn-default">{{__('Autorisation/action/message.cancel')}}</a>
                        <button type="submit" class="btn btn-info">{{__('Autorisation/action/message.add')}}</button>
                    </div>
                </form>
            </div>

        </div>
    </div>
</div>
</section>

@endsection
