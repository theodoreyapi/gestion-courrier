@extends('layouts.master', ['title' => 'Courrier'])

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
                        <h4 class="mb-sm-0">Courrier</h4>

                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="javascript: void(0);">Liste</a></li>
                                <li class="breadcrumb-item active">Courrier</li>
                            </ol>
                        </div>

                    </div>
                </div>
            </div>

            <div class="alert alert-danger" role="alert">
                This is <strong>Datatable</strong> page in wihch we have used <b>jQuery</b> with cnd link!
            </div>

            <div class="alert alert-success" role="alert">
                This is <strong>Datatable</strong> page in wihch we have used <b>jQuery</b> with cnd link!
            </div>

            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header" style="align-self: flex-end;">
                            <a href="{{ url('add-courrier') }}" type="button" class="btn btn-primary">Ajouter un
                                courrier</a>
                        </div>
                        <div class="card-body">
                            <table id="scroll-horizontal" class="table nowrap align-middle" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>SR No.</th>
                                        <th>ID</th>
                                        <th>Purchase ID</th>
                                        <th>Title</th>
                                        <th>User</th>
                                        <th>Assigned To</th>
                                        <th>Created By</th>
                                        <th>Create Date</th>
                                        <th>Status</th>
                                        <th>Priority</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>01</td>
                                        <td>VLZ-452</td>
                                        <td>VLZ1400087402</td>
                                        <td><a href="tables-datatables.html#!">Post launch reminder/ post
                                                list</a></td>
                                        <td>Joseph Parker</td>
                                        <td>Alexis Clarke</td>
                                        <td>Joseph Parker</td>
                                        <td>03 Oct, 2021</td>
                                        <td><span class="badge bg-info-subtle text-info">Re-open</span></td>
                                        <td><span class="badge bg-danger">High</span></td>
                                        <td>
                                            <a href="#" class="btn btn-soft-dark btn-sm">
                                                Voir
                                            </a>
                                            <a href="#" class="btn btn-soft-secondary btn-sm">
                                                Modifier
                                            </a>
                                            <a href="#" class="btn btn-soft-danger btn-sm" data-bs-toggle="modal"
                                                data-bs-target=".bs-example-modal-center">
                                                Supprimer
                                            </a>
                                            <div class="modal fade bs-example-modal-center" tabindex="-1"
                                                aria-labelledby="mySmallModalLabel" aria-hidden="true"
                                                style="display: none;">
                                                <div class="modal-dialog modal-dialog-centered">
                                                    <div class="modal-content">
                                                        <div class="modal-body text-center p-5">
                                                            <lord-icon src="https://cdn.lordicon.com/hrqwmuhr.json"
                                                                trigger="loop" colors="primary:#121331,secondary:#08a88a"
                                                                style="width:120px;height:120px"></lord-icon>
                                                            <div class="mt-4">
                                                                <h4 class="mb-3">Oups!</h4>
                                                                <p class="text-muted mb-4"> Êtes-vous sûre de vouloir
                                                                    supprimer?</p>
                                                                <div class="hstack gap-2 justify-content-center">
                                                                    <button type="button" class="btn btn-light"
                                                                        data-bs-dismiss="modal">Annuler</button>
                                                                    <a href="javascript:void(0);"
                                                                        class="btn btn-danger">Supprimer</a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>02</td>
                                        <td>VLZ-453</td>
                                        <td>VLZ1400087425</td>
                                        <td><a href="tables-datatables.html#!">Additional Calendar</a></td>
                                        <td>Diana Kohler</td>
                                        <td>Admin</td>
                                        <td>Mary Rucker</td>
                                        <td>05 Oct, 2021</td>
                                        <td><span class="badge bg-secondary-subtle text-secondary">On-Hold</span>
                                        </td>
                                        <td><span class="badge bg-info">Medium</span></td>
                                        <td>
                                            <div class="dropdown d-inline-block">
                                                <button class="btn btn-soft-secondary btn-sm dropdown" type="button"
                                                    data-bs-toggle="dropdown" aria-expanded="false">
                                                    <i class="ri-more-fill align-middle"></i>
                                                </button>
                                                <ul class="dropdown-menu dropdown-menu-end">
                                                    <li><a href="tables-datatables.html#!" class="dropdown-item"><i
                                                                class="ri-eye-fill align-bottom me-2 text-muted"></i>
                                                            View</a></li>
                                                    <li><a class="dropdown-item edit-item-btn"><i
                                                                class="ri-pencil-fill align-bottom me-2 text-muted"></i>
                                                            Edit</a></li>
                                                    <li>
                                                        <a class="dropdown-item remove-item-btn">
                                                            <i class="ri-delete-bin-fill align-bottom me-2 text-muted"></i>
                                                            Delete
                                                        </a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>03</td>
                                        <td>VLZ-454</td>
                                        <td>VLZ1400087438</td>
                                        <td><a href="tables-datatables.html#!">Make a creating an account
                                                profile</a></td>
                                        <td>Tonya Noble</td>
                                        <td>Admin</td>
                                        <td>Tonya Noble</td>
                                        <td>27 April, 2022</td>
                                        <td><span class="badge bg-danger-subtle text-danger">Closed</span>
                                        </td>
                                        <td><span class="badge bg-success">Low</span></td>
                                        <td>
                                            <div class="dropdown d-inline-block">
                                                <button class="btn btn-soft-secondary btn-sm dropdown" type="button"
                                                    data-bs-toggle="dropdown" aria-expanded="false">
                                                    <i class="ri-more-fill align-middle"></i>
                                                </button>
                                                <ul class="dropdown-menu dropdown-menu-end">
                                                    <li><a href="tables-datatables.html#!" class="dropdown-item"><i
                                                                class="ri-eye-fill align-bottom me-2 text-muted"></i>
                                                            View</a></li>
                                                    <li><a class="dropdown-item edit-item-btn"><i
                                                                class="ri-pencil-fill align-bottom me-2 text-muted"></i>
                                                            Edit</a></li>
                                                    <li>
                                                        <a class="dropdown-item remove-item-btn">
                                                            <i class="ri-delete-bin-fill align-bottom me-2 text-muted"></i>
                                                            Delete
                                                        </a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>04</td>
                                        <td>VLZ-455</td>
                                        <td>VLZ1400087748</td>
                                        <td><a href="tables-datatables.html#!">Apologize for shopping
                                                Error!</a></td>
                                        <td>Joseph Parker</td>
                                        <td>Alexis Clarke</td>
                                        <td>Joseph Parker</td>
                                        <td>14 June, 2021</td>
                                        <td><span class="badge bg-warning-subtle text-warning">Inprogress</span>
                                        </td>
                                        <td><span class="badge bg-info">Medium</span></td>
                                        <td>
                                            <div class="dropdown d-inline-block">
                                                <button class="btn btn-soft-secondary btn-sm dropdown" type="button"
                                                    data-bs-toggle="dropdown" aria-expanded="false">
                                                    <i class="ri-more-fill align-middle"></i>
                                                </button>
                                                <ul class="dropdown-menu dropdown-menu-end">
                                                    <li><a href="tables-datatables.html#!" class="dropdown-item"><i
                                                                class="ri-eye-fill align-bottom me-2 text-muted"></i>
                                                            View</a></li>
                                                    <li><a class="dropdown-item edit-item-btn"><i
                                                                class="ri-pencil-fill align-bottom me-2 text-muted"></i>
                                                            Edit</a></li>
                                                    <li>
                                                        <a class="dropdown-item remove-item-btn">
                                                            <i class="ri-delete-bin-fill align-bottom me-2 text-muted"></i>
                                                            Delete
                                                        </a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>07</td>
                                        <td>VLZ-458</td>
                                        <td>VLZ1400087785</td>
                                        <td><a href="tables-datatables.html#!">Change email option process</a>
                                        </td>
                                        <td>James Morris</td>
                                        <td>Admin</td>
                                        <td>James Morris</td>
                                        <td>12 March, 2022</td>
                                        <td><span class="badge bg-primary-subtle text-primary">Open</span>
                                        </td>
                                        <td><span class="badge bg-danger">High</span></td>
                                        <td>
                                            <div class="dropdown d-inline-block">
                                                <button class="btn btn-soft-secondary btn-sm dropdown" type="button"
                                                    data-bs-toggle="dropdown" aria-expanded="false">
                                                    <i class="ri-more-fill align-middle"></i>
                                                </button>
                                                <ul class="dropdown-menu dropdown-menu-end">
                                                    <li><a href="tables-datatables.html#!" class="dropdown-item"><i
                                                                class="ri-eye-fill align-bottom me-2 text-muted"></i>
                                                            View</a></li>
                                                    <li><a class="dropdown-item edit-item-btn"><i
                                                                class="ri-pencil-fill align-bottom me-2 text-muted"></i>
                                                            Edit</a></li>
                                                    <li>
                                                        <a class="dropdown-item remove-item-btn">
                                                            <i class="ri-delete-bin-fill align-bottom me-2 text-muted"></i>
                                                            Delete
                                                        </a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>09</td>
                                        <td>VLZ-461</td>
                                        <td>VLZ1400087179</td>
                                        <td><a href="tables-datatables.html#!">Form submit issue</a></td>
                                        <td>Grace Coles</td>
                                        <td>Admin</td>
                                        <td>Grace Coles</td>
                                        <td>07 Jan, 2022</td>
                                        <td><span class="badge bg-success-subtle text-success">New</span></td>
                                        <td><span class="badge bg-danger">High</span></td>
                                        <td>
                                            <div class="dropdown d-inline-block">
                                                <button class="btn btn-soft-secondary btn-sm dropdown" type="button"
                                                    data-bs-toggle="dropdown" aria-expanded="false">
                                                    <i class="ri-more-fill align-middle"></i>
                                                </button>
                                                <ul class="dropdown-menu dropdown-menu-end">
                                                    <li><a href="tables-datatables.html#!" class="dropdown-item"><i
                                                                class="ri-eye-fill align-bottom me-2 text-muted"></i>
                                                            View</a></li>
                                                    <li><a class="dropdown-item edit-item-btn"><i
                                                                class="ri-pencil-fill align-bottom me-2 text-muted"></i>
                                                            Edit</a></li>
                                                    <li>
                                                        <a class="dropdown-item remove-item-btn">
                                                            <i class="ri-delete-bin-fill align-bottom me-2 text-muted"></i>
                                                            Delete
                                                        </a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </div>
@endsection
