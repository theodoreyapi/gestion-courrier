@extends('layouts.master', ['title' => 'Uitilisateurs'])

@push('csss')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/dataTables.bootstrap5.min.css" />
    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.2.9/css/responsive.bootstrap.min.css" />
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.2.2/css/buttons.dataTables.min.css">
@endpush

@push('scripts')
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"
        integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/dataTables.bootstrap5.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.2.9/js/dataTables.responsive.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.2.2/js/dataTables.buttons.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.2.2/js/buttons.print.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.2.2/js/buttons.html5.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>

    <script src="{{ URL::asset('') }}assets/js/pages/datatables.init.js"></script>
@endpush

@section('content')
    <div class="page-content">
        <div class="container-fluid">

            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between bg-galaxy-transparent">
                        <h4 class="mb-sm-0">Utilisateurs</h4>

                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="javascript: void(0);">Liste</a></li>
                                <li class="breadcrumb-item active">Utilisateurs</li>
                            </ol>
                        </div>

                    </div>
                </div>
            </div>

            @include('layouts.status')

            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header" style="align-self: flex-end;">
                            <a href="#" class="btn btn-primary" data-bs-toggle="modal"
                                data-bs-target=".add-department">Ajouter un
                                Utilisateur</a>
                        </div>

                        <div class="modal fade add-department" tabindex="-1" aria-labelledby="mySmallModalLabel"
                            aria-hidden="true" style="display: none;">
                            <form action="{{ route('userss.store') }}" method="POST">
                                @csrf
                                <div class="modal-dialog modal-dialog-centered">
                                    <div class="modal-content">
                                        <div class="modal-header bg-primary">
                                            <h4 class=" text-white">Ajout d'un Utilisateur</h4>
                                        </div>
                                        <div class="modal-body p-3">
                                            <div class="col-12">
                                                <div class="mb-3">
                                                    <label for="firstNameinput" class="form-label">Nom</label>
                                                    <input type="text" class="form-control" required name="nom"
                                                        placeholder="Entrez le nom" id="firstNameinput">
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="mb-3">
                                                    <label for="firstNameinput" class="form-label">Prénom</label>
                                                    <input type="text" class="form-control" required name="prenom"
                                                        placeholder="Entrez le prénom" id="firstNameinput">
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="mb-3">
                                                    <label for="firstNameinput" class="form-label">Email</label>
                                                    <input type="email" class="form-control" required name="email"
                                                        placeholder="Entrez le email" id="firstNameinput">
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="mb-3">
                                                    <label for="firstNameinput" class="form-label">Téléphone</label>
                                                    <input type="tel" class="form-control" name="phone" placeholder=""
                                                        id="firstNameinput">
                                                </div>
                                            </div>
                                            <div class="col-lg-12">
                                                <h6 class="fw-semibold">Département</h6>
                                                <select required id="ForminputState" class="form-select" name="departement">
                                                    <option value="">Choisir...</option>
                                                    @foreach ($bureau as $bure)
                                                        <option value="{{ $bure->id_bureau }}">{{ $bure->nom_bureau }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="col-12">
                                                <div class="mb-3">
                                                    <label for="ForminputState" class="form-label">Type</label>
                                                    <select name="type" required id="ForminputState" class="form-select">
                                                        <option value="">Choisir...</option>
                                                        <option value="admin">Admin</option>
                                                        <option value="courrier">Agent du service courrier</option>
                                                        <option value="dg">Directeur Général (DG)</option>
                                                        <option value="approprie">Employé</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="mb-3">
                                                    <label for="firstNameinput" class="form-label">Mot de passe</label>
                                                    <input type="password" class="form-control" name="password"
                                                        placeholder="" id="firstNameinput">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-light border me-2"
                                                data-bs-dismiss="modal">Annuler</button>
                                            <button type="submit" class="btn btn-primary">Ajouter</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>

                        <div class="card-body">
                            <table id="scroll-horizontal" class="table nowrap align-middle" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>Nom</th>
                                        <th>Contact</th>
                                        <th>Département</th>
                                        <th>Type</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($all as $item)
                                        <tr>
                                            <td><strong>{{ $item->name }} <br> {{ $item->last_name }}</strong></td>
                                            <td>{{ $item->email }} <br> {{ $item->phone }}</td>
                                            <td>{{ $item->nom_bureau }}</td>
                                            <td>
                                                @if ($item->type == 'admin')
                                                    <span class="badge bg-danger-subtle text-danger">Admin</span>
                                                @elseif ($item->type == 'courrier')
                                                    <span class="badge bg-warning-subtle text-info">Agent du service
                                                        courrier</span>
                                                @elseif ($item->type == 'approprie')
                                                    <span class="badge bg-secondary-subtle text-secondary">Employé</span>
                                                @else
                                                    <span class="badge bg-success-subtle text-success">Directeur Général
                                                        (DG)
                                                    </span>
                                                @endif
                                            </td>
                                            <td>
                                                <a href="#" class="btn btn-soft-info btn-sm" data-bs-toggle="modal"
                                                    data-bs-target=".edit-department{{ $item->id }}">Modifier</a>
                                                <div class="modal fade edit-department{{ $item->id }}" tabindex="-1"
                                                    aria-labelledby="mySmallModalLabel" aria-hidden="true"
                                                    style="display: none;">
                                                    <form action="{{ route('userss.update', $item->id) }}" method="POST">
                                                        @csrf
                                                        @method('PATCH')
                                                        <div class="modal-dialog modal-dialog-centered">
                                                            <div class="modal-content">
                                                                <div class="modal-header bg-info">
                                                                    <h4 class=" text-white">Modification</h4>
                                                                </div>
                                                                <div class="modal-body p-3">
                                                                    <div class="col-12">
                                                                        <div class="mb-3">
                                                                            <label for="firstNameinput"
                                                                                class="form-label">Nom</label>
                                                                            <input type="text" class="form-control"
                                                                                required name="nom"
                                                                                value="{{ $item->name }}"
                                                                                placeholder="Entrez le nom"
                                                                                id="firstNameinput">
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-12">
                                                                        <div class="mb-3">
                                                                            <label for="firstNameinput"
                                                                                class="form-label">Prénom</label>
                                                                            <input type="text" class="form-control"
                                                                                required name="prenom"
                                                                                value="{{ $item->last_name }}"
                                                                                placeholder="Entrez le prénom"
                                                                                id="firstNameinput">
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-12">
                                                                        <div class="mb-3">
                                                                            <label for="firstNameinput"
                                                                                class="form-label">Email</label>
                                                                            <input type="email" class="form-control"
                                                                                required name="email"
                                                                                value="{{ $item->email }}"
                                                                                placeholder="Entrez le email"
                                                                                id="firstNameinput">
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-12">
                                                                        <div class="mb-3">
                                                                            <label for="firstNameinput"
                                                                                class="form-label">Téléphone</label>
                                                                            <input type="tel" class="form-control"
                                                                                name="phone" placeholder=""
                                                                                value="{{ $item->phone }}"
                                                                                id="firstNameinput">
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-lg-12">
                                                                        <h6 class="fw-semibold">Département</h6>
                                                                        <select required id="ForminputState"
                                                                            class="form-select" name="departement">
                                                                            @foreach ($bureau as $bur)
                                                                                <option
                                                                                    @if ($item->bureau_id == $bur->id_bureau) selected @endif
                                                                                    value="{{ $bur->id_bureau }}">
                                                                                    {{ $bur->nom_bureau }}
                                                                                </option>
                                                                            @endforeach
                                                                        </select>
                                                                    </div>
                                                                    <div class="col-12">
                                                                        <div class="mb-3">
                                                                            <label for="ForminputState"
                                                                                class="form-label">Type</label>
                                                                            <select name="type" required
                                                                                id="ForminputState" class="form-select">
                                                                                <option @if ($item->type == 'admin') selected @endif value="admin">Admin</option>
                                                                                <option @if ($item->type == 'courrier') selected @endif value="courrier">Agent du service
                                                                                    courrier</option>
                                                                                <option @if ($item->type == 'dg') selected @endif value="dg">Directeur Général
                                                                                    (DG)</option>
                                                                                <option @if ($item->type == 'approprie') selected @endif value="approprie">Employé</option>
                                                                            </select>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-12">
                                                                        <div class="mb-3">
                                                                            <label for="firstNameinput"
                                                                                class="form-label">Mot de passe</label>
                                                                            <input type="password" class="form-control"
                                                                                name="password" placeholder=""
                                                                                id="firstNameinput">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="button"
                                                                        class="btn btn-light border me-2"
                                                                        data-bs-dismiss="modal">Annuler</button>
                                                                    <button type="submit"
                                                                        class="btn btn-info">Modifier</button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </form>
                                                </div>
                                                <a href="#" class="btn btn-soft-danger btn-sm"
                                                    data-bs-toggle="modal"
                                                    data-bs-target=".bs-example-modal-center{{ $item->id }}">
                                                    Supprimer
                                                </a>
                                                <div class="modal fade bs-example-modal-center{{ $item->id }}"
                                                    tabindex="-1" aria-labelledby="mySmallModalLabel" aria-hidden="true"
                                                    style="display: none;">
                                                    <div class="modal-dialog modal-dialog-centered">
                                                        <div class="modal-content">
                                                            <div class="modal-body text-center p-5">
                                                                <lord-icon src="https://cdn.lordicon.com/hrqwmuhr.json"
                                                                    trigger="loop"
                                                                    colors="primary:#121331,secondary:#08a88a"
                                                                    style="width:120px;height:120px"></lord-icon>
                                                                <form action="{{ route('userss.destroy', $item->id) }}"
                                                                    method="post">
                                                                    @csrf
                                                                    @method('DELETE')
                                                                    <div class="mt-4">
                                                                        <h4 class="mb-3">Oups!</h4>
                                                                        <p class="text-muted mb-4"> Êtes-vous sûre de
                                                                            vouloir
                                                                            supprimer?</p>
                                                                        <div class="hstack gap-2 justify-content-center">
                                                                            <button type="button" class="btn btn-light"
                                                                                data-bs-dismiss="modal">Annuler</button>
                                                                            <button type="submit"
                                                                                class="btn btn-danger">Supprimer</button>
                                                                        </div>
                                                                    </div>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </div>
@endsection
