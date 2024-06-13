<table class="table table-striped text-nowrap">
    <thead>
        <tr>
            <th>{{ __('Autorisation/controllers/message.NameController') }}</th>
            <th class="action-column" style="width: 150px;">{{ __('Autorisation/controllers/message.Actions') }}
            </th>
        </tr>
    </thead>
    <tbody>
        @forelse ($controllers as $controller)
            <tr>
                <td>{{ $controller->nom }}</td>
                <td class="d-flex justify-content-center">

                    @can('edit-GestionControllersController')
                    <a href="{{ route('controllers.edit', $controller) }}" class="btn btn-sm btn-default"><i
                            class="fas fa-edit"></i></a>
                    @endcan
                    @can('destroy-GestionControllersController')
                    <form action="{{ route('controllers.destroy', $controller) }}" class="ml-2" method="post">
                        @csrf
                        @method('delete')
                        <button type="button" class="btn btn-sm btn-danger"
                            onclick="confirmDelete(this.form, `{{ __('Autorisation/controllers/message.ConfirmDeleteController') }}`)"><i
                                class="fa-solid fa-trash"></i></button>
                    </form>
                    @endcan
                </td>
            </tr>
        @empty
            <tr>
                <td>{{ __('Autorisation/controllers/message.NoControllers') }}</td>
            </tr>
        @endforelse
    </tbody>
    <tfoot>
        <tr>
            <td colspan="2">
                <ul class="pagination  m-0 float-right">
                    {{ $controllers->links() }}
                </ul>
            </td>
        </tr>
    </tfoot>
</table>
