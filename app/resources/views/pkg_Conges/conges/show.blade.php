@extends('layouts.app')

@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>List des congés</h1>
                </div>
                <div class="col-sm-6">
                    <a href="{{ url()->previous() }}" class="btn btn-default float-right">
                        <i class="fas fa-arrow-left"></i> Retour
                    </a>
                </div>
            </div>
        </div>
    </section>

    <section class="content">
        <div class="container-fluid">
            @if (session('success'))
                <div class="alert alert-success alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    {{ session('success') }}.
                </div>
            @endif

            @if ($errors->any())
                <div class="alert alert-danger alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    @foreach ($errors->all() as $error)
                        {{ $error }}<br>
                    @endforeach
                </div>
            @endif
            <div class="row">
                <!-- Profile Section -->
                <div class="col-md-3">
                    <div class="card card-purple card-outline" style="min-height: 401px;">
                        <div class="card-body box-profile">
                            <div class="text-center">
                                <img class="profile-personnel-img img-fluid img-circle"
                                    src="{{ ($personnel->images == null) ? asset('storage/' . $personnel->images) :asset('images/man.png')  }}"
                                    width="130px" height="130px" alt="Profile picture of personnel">
                            </div>

                            <h3 class="profile-personnelname text-center">{{ $personnel->nom }}</h3>
                            <p class="text-muted text-center">{{ $personnel->role }}</p>
                            <ul class="list-group list-group-unbordered mb-3">
                                <li class="list-group-item">
                                    <b>Matricule</b> <a class="float-right text-purple">{{ $personnel->matricule }}</a>
                                </li>
                                <li class="list-group-item">
                                    <b>Etablissement</b> <a
                                        class="float-right text-purple">{{ $personnel->etablissement->nom }}</a>
                                </li>
                                <li class="list-group-item">
                                    <b>Jours restants</b> <a
                                        class="float-right text-purple">{{ $personnel->jours_restants }}</a>
                                </li>
                            </ul>
                            {{-- <a href="{{ route('personnels.show', ['personnel' => $personnel->id]) }}"
                                class="btn bg-purple btn-block" style="margin-top: 2rem">
                                <b>Plus d'informations</b>
                            </a> --}}
                        </div>
                    </div>
                </div>

                <!-- Conges Listing Section -->
                <div class="col-md-9">
                    <div class="card card-purple card-outline" style="min-height: 401px;">
                        <!-- Filter and Search Bar -->
                        <div class="card-header">
                            <div class="row justify-content-between">
                                <!-- Filter Dropdown -->
                                <div class="col-md-4">
                                    {{-- <form method="GET" action="{{ route('conges.index') }}"> --}}
                                    <div class="input-group input-group-sm">
                                        <div class="input-group-append">
                                            <div class="btn btn-default">
                                                <i class="fas fa-filter"></i>
                                            </div>
                                        </div>
                                        <select class="form-select form-control" name="year">
                                            <option value="" selected>Sélectionner une année</option>
                                            @foreach (range(date('Y'), date('Y') - 5) as $year)
                                                <option value="{{ $year }}">{{ $year }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    </form>
                                </div>

                                <!-- Search Bar -->
                                <div class="col-md-4">
                                    <form method="GET" action="{{ route('conges.index') }}">
                                        <div class="input-group input-group-sm">
                                            <input type="hidden" name="page" id="page" value="1">
                                            <input type="text" name="table_search" id="table_search" class="form-control"
                                                placeholder="Recherche">
                                            <div class="input-group-append">
                                                <button type="submit" class="btn btn-default">
                                                    <i class="fas fa-search"></i>
                                                </button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>

                        <!-- Conges Table -->
                        <div class="card-body table-responsive p-0">
                            <table class="table table-striped text-nowrap">
                                <thead>
                                    <tr>
                                        <th class="text-center">Date début</th>
                                        <th class="text-center">Date fin</th>
                                        <th class="text-center">Jours prend</th>
                                        <th class="text-center">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($conges as $conge)
                                        <tr>
                                            <td class="text-center">
                                                {{ \Carbon\Carbon::parse($conge->date_debut)->format('Y-m-d') }}</td>
                                            <td class="text-center">
                                                {{ \Carbon\Carbon::parse($conge->date_fin)->format('Y-m-d') }}</td>
                                            <td class="text-center">
                                                {{ \Carbon\Carbon::parse($conge->date_debut)->diffInDays(\Carbon\Carbon::parse($conge->date_fin)) + 1 }}
                                            </td>
                                            <td class="text-center">
                                                <!-- Edit button -->
                                                <a href="{{ route('conges.edit', ['conge' => $conge->id]) }}"
                                                    class="btn btn-secondary btn-sm">
                                                    <i class="fa fa-edit"></i>
                                                </a>

                                                <!-- Delete button that opens modal -->
                                                <button type="button" class="btn btn-danger btn-sm"
                                                    onclick="AddIdInModal({{ $conge->id }}, {{ $personnel->id }})"
                                                    data-toggle="modal" data-target="#deleteMod">
                                                    <i class="fa-solid fa-trash"></i>
                                                </button>
                                            </td>

                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="6" class="text-center">Aucun congé trouvé.</td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>


                        </div>

                        <!-- Pagination -->
                        <div class="d-flex justify-content-end align-items-center p-2">
                            <!-- Pagination Links -->
                            <div class="">
                                <ul class="pagination m-0 float-right">
                                    {{ $conges->links() }}
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- modal delete --}}
    <div class="modal fade" id="deleteMod" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="deleteModalLabel">Confirmation de suppression</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    Êtes-vous sûr de vouloir supprimer ce congé?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
                    <form id="deleteForm" method="POST">
                        @csrf
                        @method('DELETE')
                        <input type="hidden" id="inpUserId" name="inpUserId">
                        <button type="submit" class="btn btn-danger">Supprimer</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script>
        function AddIdInModal(congeId, userId) {
            document.getElementById('deleteForm').action = "{{ route('conges.destroy', ':congeId') }}".replace(':congeId',
                congeId);
            document.getElementById('inpUserId').value = userId
        }
    </script>
@endsection
