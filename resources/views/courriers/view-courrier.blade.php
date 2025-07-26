@extends('layouts.master', ['title' => 'Ajouter Courrier'])

@push('csss')
    <script src="{{ URL::asset('') }}assets/libs/dropzone/dropzone-min.js"></script>
    <script src="{{ URL::asset('') }}assets/libs/filepond/filepond.min.js"></script>
    <script src="{{ URL::asset('') }}assets/libs/filepond-plugin-image-preview/filepond-plugin-image-preview.min.js">
    </script>
    <script
        src="{{ URL::asset('') }}assets/libs/filepond-plugin-file-validate-size/filepond-plugin-file-validate-size.min.js">
    </script>
    <script
        src="{{ URL::asset('') }}assets/libs/filepond-plugin-image-exif-orientation/filepond-plugin-image-exif-orientation.min.js">
    </script>
    <script src="{{ URL::asset('') }}assets/libs/filepond-plugin-file-encode/filepond-plugin-file-encode.min.js"></script>

    <script src="{{ URL::asset('') }}assets/js/pages/form-file-upload.init.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
@endpush

@push('scripts')
    <script src="{{ URL::asset('') }}assets/libs/dropzone/dropzone-min.js"></script>
    <script src="{{ URL::asset('') }}assets/libs/filepond/filepond.min.js"></script>
    <script src="{{ URL::asset('') }}assets/libs/filepond-plugin-image-preview/filepond-plugin-image-preview.min.js">
    </script>
    <script
        src="{{ URL::asset('') }}assets/libs/filepond-plugin-file-validate-size/filepond-plugin-file-validate-size.min.js">
    </script>
    <script
        src="{{ URL::asset('') }}assets/libs/filepond-plugin-image-exif-orientation/filepond-plugin-image-exif-orientation.min.js">
    </script>
    <script src="{{ URL::asset('') }}assets/libs/filepond-plugin-file-encode/filepond-plugin-file-encode.min.js"></script>

    <script src="{{ URL::asset('') }}assets/js/pages/form-file-upload.init.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"
        integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script src="{{ URL::asset('') }}assets/js/pages/select2.init.js"></script>
@endpush

@section('content')
    <div class="page-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between bg-galaxy-transparent">
                        <h4 class="mb-sm-0">Détail Courrier</h4>
                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="javascript: void(0);">Détails</a></li>
                                <li class="breadcrumb-item active">Courrier</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>

            @include('layouts.status')

            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <h5 class="card-title mb-0">Détail sur le courrier</h5>
                        </div>
                        <div class="card-body">
                            <form action="{{ url('note', $courrier->id_courrier) }}" method="POST" id="courrier-form">
                                @csrf
                                <div class="row g-4">
                                    <div class="col-lg-6">
                                        <h6 class="fw-semibold">Objet</h6>
                                        <span>{{ $courrier->objet_courrier }}</span>
                                    </div>
                                    <div class="col-lg-6">
                                        <h6 class="fw-semibold">Numéro</h6>
                                        <span>{{ $courrier->numero_courrier }}</span>
                                    </div>
                                    <div class="col-lg-6">
                                        <h6 class="fw-semibold">Destination</h6>
                                        <span>{{ $courrier->nom_bureau }}</span>
                                    </div>
                                    <div class="col-lg-6">
                                        <h6 class="fw-semibold">Traitement du courrier</h6>
                                        <span>{{ $courrier->nom_categorie }}</span>
                                    </div>
                                </div>
                                <br>
                                <div class="row">
                                    <div class="col-6">
                                        <div class="mb-3">
                                            <label for="firstNameinput" class="form-label">Nature des pièces jointes</label>
                                            <br>
                                            <span>{{ $courrier->nature_niveau }}</span>
                                            <br>
                                            <span>{{ $courrier->nombre_courrier }} Document(s)</span>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="mb-3">
                                            <label for="ForminputState" class="form-label">Délais de traitement du
                                                courrier & Statut</label>
                                            <br>
                                            @if ($courrier->delai_courrier == 'EXTREME URGENCE')
                                                <span class="badge bg-danger">EXTREME URGENCE</span>
                                            @elseif ($courrier->delai_courrier == '48H')
                                                <span class="badge bg-secondary">48H</span>
                                            @else
                                                <span class="badge bg-info">72H</span>
                                            @endif
                                            @if ($courrier->status_courrier == 'initial')
                                                <span class="badge bg-success-subtle text-success">Nouveau</span>
                                            @elseif ($courrier->status_courrier == 'traitement')
                                                <span class="badge bg-warning-subtle text-warning">En traxitement</span>
                                            @elseif ($courrier->status_courrier == 'termine')
                                                <span class="badge bg-secondary-subtle text-secondary">Terminé</span>
                                            @else
                                                <span class="badge bg-danger-subtle text-danger">Annulé</span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="mb-3">
                                            <label for="lastNameinput" class="form-label">Notes</label>
                                            <br>
                                            <span>{{ $courrier->note_courrier }}</span>
                                        </div>
                                    </div>
                                    @if (Auth::user()->type == 'approprie' || Auth::user()->type == 'dg')
                                        <div class="col-12">
                                            <div class="mb-3">
                                                <label for="lastNameinput" class="form-label">Notes</label>
                                                <textarea required placeholder="Ajoutez des notes ou des informations complémentaires ici..." class="form-control"
                                                    name="note" id="" cols="30" rows="10"></textarea>
                                            </div>
                                        </div>
                                    @endif
                                    <label class="form-label fw-bold">Fichiers</label>
                                    <div class="dropzone" id="file-dropzone">
                                        @foreach ($images as $image)
                                            <div class="fallback">
                                                <iframe src="{{ url('courriers/' . $image->fichier_image) }}"
                                                    width="100%" height="600px"></iframe>
                                            </div>
                                        @endforeach
                                    </div>
                                    <br>
                                    <br>
                                    <div class="col-lg-12 mt-4">
                                        <div class="text-end">
                                            @if (Auth::user()->type == 'approprie' || Auth::user()->type == 'dg')
                                                <button type="submit" class="btn btn-primary">Soumettre</button>
                                            @endif
                                            @if (Auth::user()->type == 'dg')
                                                <a href="{{ url('signe', $courrier->id_courrier) }}"
                                                    class="btn btn-success">Signer</a>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </form>
                            <div class="col-lg-12 mt-4">
                                <div class="text-end">
                                    @if (Auth::user()->type == 'dg')
                                        <a href="#" class="btn btn-info" data-bs-toggle="modal"
                                            data-bs-target=".add-department">Transférer</a>
                                    @endif
                                    <div class="modal fade add-department" tabindex="-1"
                                        aria-labelledby="mySmallModalLabel" aria-hidden="true" style="display: none;">
                                        <form action="{{ route('courrier.update', $courrier->id_courrier) }}"
                                            method="POST">
                                            @csrf
                                            @method('PATCH')
                                            <div class="modal-dialog modal-dialog-centered">
                                                <div class="modal-content">
                                                    <div class="modal-header bg-info">
                                                        <h4 class=" text-white">Département</h4>
                                                    </div>
                                                    <div class="modal-body p-3">
                                                        <div class="col-lg-12">
                                                            <select class="js-example-basic-single" name="departement"
                                                                required id="">
                                                                <option value="">Choisir...</option>
                                                                @foreach ($departement as $dep)
                                                                    <option value="{{ $dep->id_bureau }}">
                                                                        {{ $dep->nom_bureau }}
                                                                    </option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-light border me-2"
                                                            data-bs-dismiss="modal">Annuler</button>
                                                        <button type="submit" class="btn btn-info">Transférer</button>
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

        </div>
    </div>
@endsection
