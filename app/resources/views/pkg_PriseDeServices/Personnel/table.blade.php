<div class="card-body table-responsive p-0">
    <table class="table table-striped text-nowrap">
        <thead>
            <tr>
                <th>{{ __('app.matricule') }}</th>
                <th>{{ __('app.name') }}</th>
                <th>{{ __('app.lastName') }}</th>
                <th>{{__('app.phoneNumber')}}</th>
                <th>{{__('app.role')}}</th>
                <th>{{__('app.school')}}</th>
                <th>{{__('app.certificate')}}</th>
                <th class="text-center">{{__('app.action')}}</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($personnelsData as $employee)
                <tr>
                    <td>{{ $employee->matricule }}</td>
                    <td>{{ $employee->nom }}</td>
                    <td>{{ $employee->prenom }}</td>
                    <td>{{ $employee->telephone }}</td>
                    @if ($employee->fonction !== null)
                          <td>{{ $employee->fonction->nom }}</td>
                    <td>{{ $employee->etablissement->nom }}</td>
                    @endif
                  
                    <td class="text-center"><a href="./attestation.php" class='btn btn-default btn-sm'><i class="fa-regular fa-file"></i></a></td>
                    
                    <td class="text-center">
                        <a href="{{ route('personnels.show', $employee) }}" class="btn btn-default btn-sm">
                            <i class="far fa-eye"></i>
                        </a>
                        <a href="{{ route('personnels.edit', $employee) }}" class="btn btn-sm btn-default">
                            <i class="fa-solid fa-pen-to-square"></i>
                        </a>
                        <form action="{{ route('personnels.destroy', $employee) }}" method="POST" style="display: inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger"
                                onclick="return confirm('Êtes-vous sûr de vouloir supprimer ce personnel ?')">
                                <i class="fa-solid fa-trash"></i>
                            </button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>

<div class="d-flex justify-content-between align-items-center p-2">
    <div class="d-flex align-items-center mb-2 ml-2 mt-2">
        <form action="{{ route('personnels.import') }}" method="post" class="mt-2" enctype="multipart/form-data"
            id="importForm">
            @csrf
            <label for="upload" class="btn btn-default btn-sm">
                <i class="fa-solid fa-file-arrow-down"></i>
                {{__('app.import')}}
            </label>
            <input type="file" id="upload" name="file" style="display:none;" onchange="submitForm()" />
        </form>
        <form>
            <a href="{{ route('personnels.export') }}" class="btn  btn-default btn-sm mt-0 mx-2 text-bold">
            <i class="fa-solid fa-file-export"></i>
            {{__('app.export')}}</a>
        </form>
        
    </div>
    <div class="">
        <ul class="pagination  m-0 float-right">
            {{ $personnelsData->links() }}
        </ul>
    </div>
</div>
