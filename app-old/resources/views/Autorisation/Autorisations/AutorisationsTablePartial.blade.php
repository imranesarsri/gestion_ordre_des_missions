<div class="" id="tablecontainer">
    <div class="card-body p-0 table-data">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>{{ __('Autorisation/GestionAutorisation/message.Role') }}</th>
                    <th>{{ __('Autorisation/GestionAutorisation/message.Controller') }}</th>
                    <th>{{ __('Autorisation/GestionAutorisation/message.Actions') }}</th>             
                </tr>
            </thead>

<tbody id="tbodyresults">
    @forelse($autorisations as $role)
    @foreach($role->permissions->groupBy(function ($permission) {
        return explode('-', $permission->name)[1];
    }) as $controllerName => $permissions)
        <tr>
            <td>{{$role->name}}</td>
            <td>{{ $controllerName }}</td>
            <td>
                <ul>

                @foreach($permissions as $permission)
                    <li>{{ $permission->name }}</li>
                @endforeach
            </ul>

            </td>
            <td class="text-center w-25">
                <!-- Add your action buttons here -->
                <a class="btn btn-default btn-sm" href="{{ route('autorisations.show', ['id' => $role->id, 'controller' => $controllerName]) }}">
                    <i class="far fa-eye"></i>
                </a>
                
                <a href="{{route('autorisations.edit', ['id' => $role->id, 'controller' => $controllerName])}}" class="btn btn-sm btn-default"><i class="fa-solid fa-pen-to-square"></i></a>
                <button type="button" class="btn btn-sm btn-danger delete-autorisation"
                data-toggle="modal" data-target="#modal-default"
                data-role-id="{{ $role->id }}" data-controller-name="{{ $controllerName }}">
                <i class="fa-solid fa-trash"></i>
               </button>
        
            </td>
        </tr>
    @endforeach
@empty
    <tr>
        <td colspan="4">{{ __('Autorisation/GestionAutorisation/message.No Permissions Found') }}</td>
    </tr>
@endforelse
</tbody>

            
            
            
        </table>
    </div>



<div class="modal fade" id="modal-default">
    <div class="modal-dialog">
        <div class="modal-content">
            <form id="deleteForm" style="display: inline-block;" action="" method="post">
                @csrf
                @method("DELETE")

                <div class="modal-header">
                    <h3 class="modal-title fs-5" id="exampleModalLabel">{{ __('Autorisation/GestionAutorisation/message.Are you sure you want to delete this Permission?') }}</h3>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                </div>
                <div class="modal-body">
                
                    <!-- Modal body content here -->
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">{{ __('Autorisation/GestionAutorisation/message.Close') }}</button>
                    <button type="submit" class="btn btn-danger">{{ __('Autorisation/GestionAutorisation/message.Delete Permissions') }}</button>
                </div>
            </form>
        </div>
      <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
  </div>


  


    <div class="card-footer clearfix">
        
            <div class="float-right">
            <div id="paginationContainer">                 
                @if ($autorisations->lastPage() > 1)
                <ul class="pagination m-0">
                    @if ($autorisations->onFirstPage())
                        <li class="page-item disabled" aria-disabled="true" aria-label="@lang('pagination.previous')">
                            <span class="page-link" aria-hidden="true">«</span>
                        </li>
                    @else
                        <li class="page-item">
                            <button class="page-link" page-number="{{ $autorisations->currentPage() - 1 }}" rel="prev"
                                aria-label="@lang('pagination.previous')">«</button>
                        </li>
                    @endif
        
                    @for ($i = 1; $i <= $autorisations->lastPage(); $i++)
                        @if ($i == $autorisations->currentPage())
                            <li class="page-item active" aria-current="page"><span class="page-link">{{ $i }}</span></li>
                        @else
                            <li class="page-item"><button class="page-link" page-number="{{ $i }}">{{ $i }}</button></li>
                        @endif
                    @endfor
        
                    @if ($autorisations->hasMorePages())
                        <li class="page-item">
                            <button class="page-link" page-number="{{ $autorisations->currentPage() + 1 }}" rel="next"
                                aria-label="@lang('pagination.next')">»</button>
                        </li>
                    @else
                        <li class="page-item disabled" aria-disabled="true" aria-label="@lang('pagination.next')">
                            <span class="page-link" aria-hidden="true">»</span>
                        </li>
                    @endif
                </ul>
            @endif              
            </div>
        </div>  
        


            
        </div>

        <script>
        $(document).ready(function() {
            $('#fileButtonautorisations').click(function() {
                $('#formFileInputautorisations').click();
            });
        
            $('#formFileInputautorisations').change(function() {
              
                $('#importForm').submit();
            });
        });
        </script> 
                                            
           
    </div>

</div>



