<div class="card-body table-responsive p-0">
    <table class="table table-striped text-nowrap table-print">
        <thead>
            <tr>
                <th>Matricule</th>
                <th>Personnels</th>
                <th>Motif</th>
                <th class="text-center">Date debut</th>
                <th class="text-center">Date fin</th>
                <th class="text-center">Durée absence</th>
                <th class="text-center">Action</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($absences as $absence)
                <tr>
                    <td>{{ $absence->personnel->matricule }}</td>
                    <td>{{ $absence->personnel->nom }} {{ $absence->personnel->prenom }}</td>
                    <td>{{ $absence->motif->nom }}</td>
                    <td class="text-center">{{ $absence->date_debut }}</td>
                    <td class="text-center">{{ $absence->date_fin }}</td>
                    <td class="text-center">
                        {{ App\Helpers\pkg_Absences\AbsenceHelper::calculateAbsenceDurationForPersonnel($absence) }}
                    </td>
                    <td class="text-center">
                        <a href="./show.php" class='btn btn-default btn-sm'>
                            <i class="far fa-eye"></i>
                        </a>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="7">Aucune absence ñ'a</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>


<div class="row justify-content-between p-2">
    <div class="col-6 align-self-end">
        <button type="button" class="btn btn-default btn-sm">
            <i class="fa-solid fa-file-arrow-down"></i>
            IMPORTER</button>
        <button type="button" data-toggle="modal" data-target="#exampleModalCenter"
            class="btn  btn-default btn-sm mt-0 mx-2">
            <i class="fa-solid fa-file-export"></i>
            EXPORTER</button>
        <a href="./document-absenteisme.php" type="button" class="btn btn-default bg-purple btn-sm mt-0">
            <i class="fa-solid fa-print"></i>
            IMPRIMER</a>
    </div>
    <div class="col-6">
        <ul class="pagination  m-0 float-right">
            {{ $absences->onEachSide(1)->links() }}
        </ul>
    </div>
</div>
