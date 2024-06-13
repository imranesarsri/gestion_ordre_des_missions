<table class="table table-striped text-nowrap">
    <thead>
        <tr>
            <th>Nom</th>
            <th>Description</th>
            <th class="text-center">Actions</th>
        </tr>
    </thead>
    <tbody>
        @forelse ($etablissements as $etablissement)
            <tr data-id="{{ $etablissement->id }}" data-nom="{{ $etablissement->Nom }}"
                data-description="{{ $etablissement->Description }}">
                <td class="">{{ $etablissement->nom }}</td>
                <td class="">{{ $etablissement->description }}</td>
                <td class="text-center">

                    <!-- Update button -->
                    <a href="{{ route('etablissement.edit', $etablissement->id) }}" class="btn btn-secondary">
                        <i class="fas fa-edit"></i>
                    </a>

                    <!-- Delete button -->
                    <button type="button" class="btn btn-danger" onclick="AddIdInModal({{ $etablissement->id }})"
                        data-toggle="modal" data-target="#deleteModal">
                        <i class="fas fa-trash-alt"></i>
                    </button>
                </td>

            </tr>
        @empty
            <tr>
                <td colspan="7" class="text-center">Aucun établissement trouvé.</td>
            </tr>
        @endforelse
    </tbody>
</table>
<div class="d-flex justify-content-between align-items-center p-2">
    <div class="d-flex align-items-center mb-2 ml-2 mt-2">
        <form action="{{ route('etablissement.import') }}" method="post" class="mt-2" enctype="multipart/form-data"
            id="importForm">
            @csrf
            <label for="upload" class="btn btn-default btn-sm font-weight-normal">
                <i class="fa-solid fa-file-arrow-down"></i>
                IMPORT
            </label>
            <input type="file" id="upload" name="file" style="display:none;" onchange="submitForm()" />
        </form>
        <form>
            <a href="{{ route('etablissement.export') }}" class="btn btn-default btn-sm mt-0 mx-2">
                <i class="fa-solid fa-file-export"></i>
                EXPORT
            </a>
        </form>
    </div>
    <div class="d-flex justify-content-end align-items-center p-2">
        <div class="">
            <ul class="pagination  m-0 float-right">
                {{ $etablissements->links() }}
            </ul>
        </div>
    </div>
</div>
