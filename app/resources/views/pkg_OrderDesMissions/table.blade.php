<div class="card-body table-responsive p-0">
    <table class="table table-striped text-nowrap">
        <thead>
            <tr>
                <th>Matricule</th>
                <th>Personnel</th>
                <th>{{ __('pkg_OrderDesMissions/mission.numero_mission') }}</th>
                <th>{{ __('app.name') }} de {{ __('pkg_OrderDesMissions/mission.singular') }}</th>
                <th>{{ __('pkg_OrderDesMissions/mission.lieu') }}</th>
                <th>{{ __('pkg_OrderDesMissions/mission.duration') }}</th>
                <th>{{ __('app.certificate') }}</th>
                <th class="text-center">{{ __('app.action') }}</th>
            </tr>
        </thead>
        <tbody>

            @if (count($missions) == 0)
                <img width="100%" src="{{ asset('./images/pkg_OrderDesMissions/resultNotFound.png') }}" alt="">
            @endif

            @foreach ($missions as $mission)
                <tr>

                    <td>
                        <ol>
                            @foreach ($mission->users as $user)
                                <li>
                                    {{ $user->matricule }}
                                </li>
                            @endforeach
                        </ol>
                    </td>
                    <td>
                        <ol>
                            @foreach ($mission->users as $user)
                                <li>
                                    {{ $user->nom }}
                                </li>
                            @endforeach
                        </ol>
                    </td>

                    <td>{{ $mission->numero_mission }}</td>
                    <td>{{ $mission->type_de_mission }}</td>
                    <td>{{ $mission->lieu }}</td>
                    <td>{{ $mission->duration }}</td>
                    <td class="text-center">
                        @can('certificate-MissionsController')
                            <ol>
                                @foreach ($mission->users as $user)
                                    <li class="my-1">
                                        <a href="{{ route('missions.certificate', [$mission->id, $user->id]) }}"
                                            class="btn btn-default btn-sm">
                                            <i class="fa-regular fa-file"></i>
                                        </a>
                                    </li>
                                @endforeach
                            </ol>
                        @endcan
                    </td>
                    <td class="text-center">
                        @can('show-MissionsController')
                            <a href="{{ route('missions.moreDetails', $mission) }}" class='btn btn-default btn-sm'>
                                <i class="far fa-eye"></i>
                            </a>
                        @endcan
                        @can('edit-MissionsController')
                            <a href="{{ route('missions.edit', $mission->id) }}" class="btn btn-sm btn-default">
                                <i class="fa-solid fa-pen-to-square"></i>
                            </a>
                        @endcan
                        @can('destroy-MissionsController')
                            <form action="{{ route('missions.destroy', $mission) }}" method="POST"
                                style="display: inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger"
                                    onclick="return confirm('Êtes-vous sûr de vouloir supprimer ce projet ?')">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </form>
                        @endcan
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>

<div class="d-md-flex justify-content-between align-items-center p-2">
    <div class="d-flex align-items-center mb-2 ml-2 mt-2">
        @can('import-MissionsController')
            <form action="{{ route('missions.import') }}" method="post" class="mt-2" enctype="multipart/form-data"
                id="importForm">
                @csrf
                <label for="upload" class="btn btn-default btn-sm font-weight-normal">
                    <i class="fas fa-file-download"></i>
                    {{ __('app.import') }}
                </label>
                <input type="file" id="upload" name="file" style="display:none;" />
            </form>
        @endcan
        @can('export-MissionsController')
            <button type="button" data-target="#modal-sm" data-toggle="modal" class="btn  btn-default btn-sm mt-0 mx-2">
                <i class="fa-solid fa-file-export"></i>
                {{ __('app.export') }}
            </button>
        @endcan
    </div>
    <div>
        <ul class="pagination  m-0 float-right">
            {{ $missions->links() }}
        </ul>
    </div>
</div>


<div class="modal fade" id="modal-sm" style="display: none;" aria-hidden="true">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <form action="{{ route('missions.export') }}">

                <div class="modal-header">
                    <h4 class="modal-title">Exporte des missions</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-check">
                        <input type="checkbox" class="form-check-input" name="mission_precedente"
                            id="mission-precedente">
                        <label class="form-check-label" for="mission-precedente">Missions précédentes</label>
                    </div>
                    <div class="form-check">
                        <input type="checkbox" class="form-check-input" name="mission_actuel" id="mission-actuel">
                        <label class="form-check-label" for="mission-actuel">Missions actuelles</label>
                    </div>
                    <div class="form-check">
                        <input type="checkbox" class="form-check-input" name="prochaines_missions"
                            id="prochaines-missions">
                        <label class="form-check-label" for="prochaines-missions">Prochaines missions</label>
                    </div>


                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Fermer</button>
                    <button type="submit" class="btn  btn-default btn-sm mt-0 mx-2">
                        <i class="fa-solid fa-file-export"></i>
                        EXPORTER</button>
                </div>
            </form>
        </div>

    </div>

</div>
