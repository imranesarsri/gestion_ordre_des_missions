@extends('layouts.app')
@section('content')

 

    <!-- Main content -->
    <section class="content mt-5">

      @if (session('success'))
      <div class="alert alert-success alert-dismissible">
          <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
          {{ session('success') }}.
      </div>
      @endif
      @if($errors->has('User_exist'))
          <div class="alert alert-danger">
              {{ $errors->first('User_exist') }}
          </div>
      @else
          @if($errors->has('unexpected_error'))
              <div class="alert alert-danger">
                  {{ $errors->first('unexpected_error') }}
              </div>
          @endif
      @endif

      <div class="container-fluid">
            <!-- general form -->
            <div class="card card-info">
              <div class="card-header">
                <h3 class="card-title">{{ __('Autorisation/GestionAutorisation/message.Create Permission') }}</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->

              <div class="card-body">

              <form method="POST" action="{{ route('autorisations.store') }}">

                @csrf

                <div class="form-group">
                  <label for="roleSelect">{{ __('Autorisation/GestionAutorisation/message.Role') }}</label>
                  <select class="form-control" name="role_id" id="roleSelect">
                    @foreach ($roles as $role)
                    <option value="{{$role->id}}">{{$role->name}}</option>
                     @endforeach
                  </select>
              </div>
              <div style="color:red">
                @error("role_id")
                {{$message}}
                @enderror
                </div>
          
              <div class="form-group">
                  <label for="controllerSelect">{{ __('Autorisation/GestionAutorisation/message.Controller') }}</label>
                  <select class="form-control" name="controller_name" id="controllerSelect" data-placeholder="Select Controller" style="width: 100%;">
                    @foreach ($controllers as $controller)
                    <option value="{{$controller->nom}}">{{$controller->nom}}</option>
                @endforeach
                  </select>
              </div>
              <div style="color:red">
                @error("controller_name")
                {{$message}}
                @enderror
                </div>
        
          
              <div class="form-group">
                  <label for="actionSelect1">{{ __('Autorisation/GestionAutorisation/message.Actions') }}</label>
                  <select multiple class="form-control select2" class="action_names" name="action_names[]" id="actionSelect1" data-placeholder="Select actions" style="width: 100%;">
                    @foreach ($actions as $action)
                    <option value="{{$action->nom}}">{{$action->nom}}</option>
                @endforeach
                  </select>
              </div>
              
              <div style="color:red">
                @error("action_names")
                {{$message}}
                @enderror
                </div>
          
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-info">{{ __('Autorisation/GestionAutorisation/message.Add Permission') }}</button>
           
                    <a href="{{route('autorisations.index')}}" type="submit" class="btn btn-secondary">{{ __('Autorisation/GestionAutorisation/message.Cancel') }}</a>
  
                </div>
              </form>
            </div>
    </div>
    </section>

  
            <!-- /.card -->
<script>
$(document).ready(function() {
    $('.action_names').select2();
});

</script>
@endsection
