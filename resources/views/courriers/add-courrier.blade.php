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
                        <h4 class="mb-sm-0">Courrier</h4>
                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="javascript: void(0);">Création</a></li>
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
                            <h5 class="card-title mb-0">Initier un nouveau traitement</h5>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('courrier.store') }}" method="POST" enctype="multipart/form-data"
                                id="courrier-form">
                                @csrf
                                <div class="row g-4">
                                    <div class="col-lg-6">
                                        <h6 class="fw-semibold">Destination</h6>
                                        <select required class="js-example-basic-single" name="destination">
                                            <option value="">Choisir...</option>
                                            @foreach ($bureau as $bure)
                                                <option value="{{ $bure->id_bureau }}">{{ $bure->nom_bureau }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-lg-6">
                                        <h6 class="fw-semibold">Traitement du courrier</h6>
                                        <select required class="js-example-basic-single" name="traitement">
                                            <option value="">Choisir...</option>
                                            @foreach ($categorie as $cate)
                                                <option value="{{ $cate->id_categorie }}">{{ $cate->nom_categorie }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                    {{-- <div class="col-lg-4">
                                        <h6 class="fw-semibold">Multi Select</h6>
                                        <select class="js-example-basic-multiple" name="states[]" multiple="multiple">
                                            <optgroup label="UK">
                                                <option value="London">London</option>
                                                <option value="Manchester" selected>Manchester</option>
                                                <option value="Liverpool">Liverpool</option>
                                            </optgroup>
                                            <optgroup label="FR">
                                                <option value="Paris">Paris</option>
                                                <option value="Lyon">Lyon</option>
                                                <option value="Marseille">Marseille</option>
                                            </optgroup>
                                            <optgroup label="SP">
                                                <option value="Madrid" selected>Madrid</option>
                                                <option value="Barcelona">Barcelona</option>
                                                <option value="Malaga">Malaga</option>
                                            </optgroup>
                                            <optgroup label="CA">
                                                <option value="Montreal">Montreal</option>
                                                <option value="Toronto">Toronto</option>
                                                <option value="Vancouver">Vancouver</option>
                                            </optgroup>
                                        </select>
                                    </div> --}}
                                </div>
                                <br>
                                <div class="row">
                                    <div class="col-6">
                                        <div class="mb-3">
                                            <label for="firstNameinput" class="form-label">Nature des pièces jointes</label>
                                            <input required name="nature" type="text" class="form-control"
                                                placeholder="Ex: Contrat, Facture, Rapport..." id="firstNameinput">
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="mb-3">
                                            <label for="ForminputState" class="form-label">Délais de traitement du
                                                courrier</label>
                                            <select name="delais" required id="ForminputState" class="form-select">
                                                <option value="">Choisir...</option>
                                                <option value="EXTREME URGENCE">EXTREME URGENCE</option>
                                                <option value="48H">48H</option>
                                                <option value="72H">72H</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="mb-3">
                                            <label for="lastNameinput" class="form-label">Notes</label>
                                            <textarea placeholder="Ajoutez des notes ou des informations complémentaires ici..." class="form-control" name="notes"
                                                id="" cols="30" rows="10"></textarea>
                                        </div>
                                    </div>
                                    <label class="form-label fw-bold">Fichiers à joindre</label>
                                    <div class="dropzone" id="file-dropzone">
                                        <div class="fallback">
                                            <input name="file[]" type="file" multiple />
                                        </div>
                                    </div>
                                    <br>
                                    <br>
                                    <div class="col-lg-12 mt-4">
                                        <div class="text-end">
                                            <button type="submit" class="btn btn-primary">Soumettre</button>
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
@endsection
