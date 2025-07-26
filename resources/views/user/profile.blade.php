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
                        <div class="card-body">
                            <div>
                                <form action="{{ url('users', $user->id) }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <div class="modal-dialog modal-dialog-centered">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h4 class="">Modification</h4>
                                            </div>
                                            <div class="modal-body p-3">
                                                <div class="col-12">
                                                    <div class="mb-3">
                                                        <label for="firstNameinput" class="form-label">Photo</label>
                                                        <input type="file" class="form-control" required name="photo">
                                                    </div>
                                                </div>
                                                <div class="col-12">
                                                    <div class="mb-3">
                                                        <label for="firstNameinput" class="form-label">Nom</label>
                                                        <input type="text" class="form-control" required name="nom"
                                                            value="{{ $user->name }}" placeholder="Entrez le nom"
                                                            id="firstNameinput">
                                                    </div>
                                                </div>
                                                <div class="col-12">
                                                    <div class="mb-3">
                                                        <label for="firstNameinput" class="form-label">Prénom</label>
                                                        <input type="text" class="form-control" required name="prenom"
                                                            value="{{ $user->last_name }}" placeholder="Entrez le prénom"
                                                            id="firstNameinput">
                                                    </div>
                                                </div>
                                                <div class="col-12">
                                                    <div class="mb-3">
                                                        <label for="firstNameinput" class="form-label">Email</label>
                                                        <input type="email" class="form-control" required name="email"
                                                            value="{{ $user->email }}" placeholder="Entrez le email"
                                                            id="firstNameinput">
                                                    </div>
                                                </div>
                                                <div class="col-12">
                                                    <div class="mb-3">
                                                        <label for="firstNameinput" class="form-label">Téléphone</label>
                                                        <input type="tel" class="form-control" name="phone"
                                                            placeholder="" value="{{ $user->phone }}" id="firstNameinput">
                                                    </div>
                                                </div>
                                                <div class="col-12">
                                                    <div class="mb-3">
                                                        <label for="firstNameinput" class="form-label">Mot de
                                                            passe</label>
                                                        <input type="password" class="form-control" name="password"
                                                            placeholder="" id="firstNameinput">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-light border me-2"
                                                    data-bs-dismiss="modal">Annuler</button>
                                                <button type="submit" class="btn btn-info">Modifier</button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </div>
@endsection
