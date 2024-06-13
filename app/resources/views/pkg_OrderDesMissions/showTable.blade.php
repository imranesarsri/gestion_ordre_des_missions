<div class="card-body table-responsive p-0">
    <table class="table table-striped text-nowrap">
        <thead>
            <tr>
                <th>N<sup>o</sup> {{ __('pkg_OrderDesMissions/mission.singular') }}</th>
                <th>{{ __('pkg_OrderDesMissions/mission.numero_mission') }}</th>
                <th>{{ __('pkg_OrderDesMissions/mission.type_de_mission') }}</th>
                <th>{{ __('pkg_OrderDesMissions/mission.lieu') }}</th>
                <th>{{ __('pkg_OrderDesMissions/mission.duration') }}</th>
                <th class="text-center">{{ __('app.action') }}</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($missions as $item)
                <tr>
                    <td>{{ $item->numero_mission }}</td>
                    <td>{{ $item->numero_mission }}</td>
                    <td>{{ $item->type_de_mission }}</td>
                    <td>{{ $item->lieu }}</td>
                    <td>{{ $item->duration }}</td>
                    <td class="text-center">
                        @can('show-MissionsController')
                            <a href="{{ route('missions.moreDetails', $item) }}" class='btn btn-default btn-sm'>
                                <i class="far fa-eye"></i>
                            </a>
                        @endcan
                        @can('edit-MissionsController')
                            <a href="{{ route('missions.edit', $item->id) }}" class="btn btn-sm btn-default">
                                <i class="fa-solid fa-pen-to-square"></i>
                            </a>
                        @endcan
                        @can('destroy-MissionsController')
                            <form action="{{ route('missions.destroy', $item) }}" method="POST" style="display: inline;">
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

<div class="row justify-content-end p-2">

    <div class="col-6">
        <ul class="pagination m-0 float-right">
            {{ $missions->links() }}
        </ul>
    </div>
</div>
