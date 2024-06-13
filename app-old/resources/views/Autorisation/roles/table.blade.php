<table class="table table-striped text-nowrap">
    <thead>
        <tr>
            <th>{{ __('Autorisation/roles/message.nom') }}</th>
            <th class="text-center">{{ __('Autorisation/roles/message.actions') }}</th>
        </tr>
    </thead>
    <tbody id="role-table">
        @forelse ($roles as $role)
            <tr>
                <td>{{ $role->name }}</td>
                <td class="text-center">
                    @can('edit-RoleController')
                        <a href="{{ route('roles.edit', $role->id) }}" class="btn btn-sm btn-default"><i class="fa-solid fa-pen-to-square"></i></a>
                    @endcan
                    @can('destroy-RoleController')
                        <button type="button" class="btn btn-danger btn-sm" onclick="AddIdInModal({{ $role->id }})" data-toggle="modal" data-target="#deleteMod">
                            <i class="fa-solid fa-trash"></i>
                        </button>
                    @endcan
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="2" class="text-center">{{ __('Autorisation/roles/message.rolesTrouvé') }}</td>
            </tr>
        @endforelse
    </tbody>
</table>
</div>
<div class="d-flex justify-content-between align-items-center p-2">
    <div class="d-flex align-items-center mb-2 ml-2 mt-2">
        <form action="{{ route('roles.import') }}" method="post" class="mt-2" enctype="multipart/form-data"
            id="importForm">
            @csrf
            <label for="upload" class="btn btn-default btn-sm">
                <i class="fa-solid fa-file-arrow-down"></i>
                IMPORTER
            </label>
            <input type="file" id="upload" name="file" style="display:none;" onchange="submitForm()" />
        </form>
        <a href="{{ route('role.export') }}" class="btn  btn-default btn-sm mt-0 mx-2 text-bold">
            <i class="fa-solid fa-file-export"></i>
            EXPORTER</a>
    </div>
    <div class="">
        <ul class="pagination  m-0 float-right">
            {{ $roles->links() }}
        </ul>
    </div>
</div>

{{--  modal delete roles --}}
  <div class="modal fade" id="deleteMod" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-danger">
                <h5 class="modal-title" id="exampleModalLabel"><i class="fas fa-exclamation-triangle"></i> Supprimer le
                    Role</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Fermer">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p>Êtes-vous sûr de vouloir supprimer cette role ?</p>
            </div>
            <div class="modal-footer">
                <form id="deleteForm" method="POST">
                    @csrf
                    @method('DELETE')
                    <input type="hidden" id="role_id" name="id">
                    <div class="container pb-3 d-flex flex-row-reverse gap-2 bd-highlight">
                        <button type="submit" onclick="submitDeleteForm()"
                            class="btn btn-danger ml-2">Supprimer</button>
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">annuler</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
    function submitForm() {
        document.getElementById('importForm').submit();
    }

    function AddIdInModal(roleId) {
        document.getElementById('deleteForm').action = "{{ route('roles.destroy', ':roleId') }}".replace(':roleId', roleId);
    }
</script>
