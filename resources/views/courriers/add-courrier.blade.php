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

            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <h5 class="card-title mb-0">Initier un nouveau traitement</h5>
                        </div>
                        <div class="card-body">
                            <form action="javascript:void(0);">
                                <div class="row g-4">
                                    <div class="col-lg-4">
                                        <h6 class="fw-semibold">Basic Select</h6>
                                        <select class="js-example-basic-single" name="state">
                                            <option value="AL">Alabama</option>
                                            <option value="MA">Madrid</option>
                                            <option value="TO">Toronto</option>
                                            <option value="LO">Londan</option>
                                            <option value="WY">Wyoming</option>
                                        </select>
                                    </div>
                                    <div class="col-lg-4">
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
                                    </div>
                                    <div class="col-lg-4">
                                        <h6 class="fw-semibold">Ajax Select</h6>
                                        <select class="js-example-data-array" name="state"></select>
                                    </div>

                                    <div class="col-lg-4">
                                        <h6 class="fw-semibold">Templating</h6>
                                        <select class="form-control js-example-templating">
                                            <optgroup label="Alaskan/Hawaiian Time Zone">
                                                <option value="AK">Alaska</option>
                                                <option value="HI">Hawaii</option>
                                            </optgroup>
                                            <optgroup label="Pacific Time Zone">
                                                <option value="CA">California</option>
                                                <option value="NV">Nevada</option>
                                                <option value="OR">Oregon</option>
                                                <option value="WA">Washington</option>
                                            </optgroup>
                                        </select>
                                    </div>
                                    <div class="col-lg-4">
                                        <h6 class="fw-semibold">Selections Templating</h6>
                                        <select class="form-control select-flag-templating">
                                            <optgroup label="Alaskan/Hawaiian Time Zone">
                                                <option value="AK">Alaska</option>
                                                <option value="HI">Hawaii</option>
                                            </optgroup>
                                            <optgroup label="Pacific Time Zone">
                                                <option value="CA">California</option>
                                                <option value="NV">Nevada</option>
                                                <option value="OR">Oregon</option>
                                                <option value="WA">Washington</option>
                                            </optgroup>
                                        </select>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-6">
                                        <div class="mb-3">
                                            <label for="firstNameinput" class="form-label">First Name</label>
                                            <input type="text" class="form-control" placeholder="Enter your firstname"
                                                id="firstNameinput">
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="mb-3">
                                            <label for="lastNameinput" class="form-label">Last Name</label>
                                            <input type="text" class="form-control" placeholder="Enter your lastname"
                                                id="lastNameinput">
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="mb-3">
                                            <label for="compnayNameinput" class="form-label">Company Name</label>
                                            <input type="text" class="form-control" placeholder="Enter company name"
                                                id="compnayNameinput">
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="mb-3">
                                            <label for="phonenumberInput" class="form-label">Phone Number</label>
                                            <input type="tel" class="form-control" placeholder="+(245) 451 45123"
                                                id="phonenumberInput">
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="mb-3">
                                            <label for="emailidInput" class="form-label">Email Address</label>
                                            <input type="email" class="form-control" placeholder="example@gamil.com"
                                                id="emailidInput">
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="mb-3">
                                            <label for="address1ControlTextarea" class="form-label">Address</label>
                                            <input type="text" class="form-control" placeholder="Address 1"
                                                id="address1ControlTextarea">
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="mb-3">
                                            <label for="citynameInput" class="form-label">City</label>
                                            <input type="email" class="form-control" placeholder="Enter your city"
                                                id="citynameInput">
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="mb-3">
                                            <label for="ForminputState" class="form-label">State</label>
                                            <select id="ForminputState" class="form-select">
                                                <option selected>Choose...</option>
                                                <option>...</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="dropzone">
                                        <div class="fallback">
                                            <input name="file" type="file" multiple="multiple" />
                                        </div>
                                        <div class="dz-message needsclick">
                                            <h4>Déposez les fichiers ici ou cliquez pour télécharger.</h4>
                                        </div>
                                    </div>

                                    <ul class="list-unstyled mb-0" id="dropzone-preview">
                                        <li class="mt-2" id="dropzone-preview-list">
                                            <!-- This is used as the file preview template -->
                                            <div class="border rounded">
                                                <div class="d-flex p-2">
                                                    <div class="flex-shrink-0 me-3">
                                                        <div class="avatar-sm bg-light rounded">
                                                            <img data-dz-thumbnail class="img-fluid rounded d-block"
                                                                src="assets/images/new-document.png"
                                                                alt="Dropzone-Image" />
                                                        </div>
                                                    </div>
                                                    <div class="flex-grow-1">
                                                        <div class="pt-1">
                                                            <h5 class="fs-14 mb-1" data-dz-name>
                                                                &nbsp;
                                                            </h5>
                                                            <p class="fs-13 text-muted mb-0" data-dz-size></p>
                                                            <strong class="error text-danger"
                                                                data-dz-errormessage></strong>
                                                        </div>
                                                    </div>
                                                    <div class="flex-shrink-0 ms-3">
                                                        <button data-dz-remove class="btn btn-sm btn-danger">
                                                            Supprimer
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                    </ul>
                                    <br>
                                    <br>
                                    <div class="col-lg-12">
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
