@extends('layouts.app')
@section('content')

    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">{{ __('Autorisation/GestionAutorisation/message.Permission Detail') }}</h1>
                </div><!-- /.col -->

            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header   -->

    <!-- Main content -->
   
    <section class="content">
      <div class="container-fluid">
          <div class="row">
              <div class="col-md-12">
                  <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-sm-12">
                                <label for="nom">{{ __('Autorisation/GestionAutorisation/message.Role') }} :</label>
                                <p>{{ $SelectedRole->name }}</p>
                            </div>                            
                        </div>
                    
                        <div class="row">
                            <div class="col-sm-12">
                                <label for="controller_name">{{ __('Autorisation/GestionAutorisation/message.Controller') }} :</label>
                                <p>{{ $SelectedController }}</p>
                            </div>
                        </div>
                    
                        <!-- Permissions Field -->
                        <div class="row">
                            <div class="col-sm-12">
                                <label for="permissions">{{ __('Autorisation/GestionAutorisation/message.Permissions') }} :</label>
                                <ul>
                                    @foreach ($SelectedPermissions as $permission)
                                    <li>{{ $permission->name }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </div>
                    
                    
                    
                  </div>
              </div>
          </div>
      </div>
  </section>




@endsection