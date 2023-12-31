@extends('layouts.app')

@section('content')
<div class="page-header">
    <div class="page-block">
        <div class="row align-items-center">
            <div class="col-md-9 col-auto">
                <div class="page-header-title">
                    <h3 class="m-b-10">Permissions</h3>
                </div>
            </div>
            <div class="col-sm-3 col">
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}"><i class="feather icon-home"></i>
                            Tableau de bord</a>
                    </li>
                    <li class="breadcrumb-item active">Permissions</li>
                </ul>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-sm-12">
        <div class="card">
            <div class="card-header">
                <h5>Permissions</h5>
                <div class="card-header-right">
                    <a href="#add_permission" data-toggle="modal" class="btn btn-primary float-right">Ajouter une permission</a>
                    <div class="btn-group card-option">
                        <button type="button" class="btn dropdown-toggle btn-icon" data-toggle="dropdown"
                            aria-haspopup="true" aria-expanded="false">
                            <i class="feather icon-more-horizontal"></i>
                        </button>
                        <ul class="list-unstyled card-option dropdown-menu dropdown-menu-right">
                            <li class="dropdown-item full-card"><a href="#!"><span><i class="feather icon-maximize"></i>
                                        agrandir</span><span style="display:none"><i class="feather icon-minimize"></i>
                                        Restaurer</span></a>
                            </li>
                            <li class="dropdown-item minimize-card"><a href="#!"><span><i
                                            class="feather icon-minus"></i> réduire</span><span style="display:none"><i
                                            class="feather icon-plus"></i> agrandir</span></a>
                            </li>
                            <li class="dropdown-item reload-card"><a href="#!"><i class="feather icon-refresh-cw"></i>
                                    recharger</a></li>
                            <li class="dropdown-item close-card"><a href="#!"><i class="feather icon-trash"></i>
                                    supprimer</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table id="perm-table"
                        class="datatable table table-striped table-bordered table-hover table-center mb-0">
                        <thead>
                            <tr>
                                <th>Nom</th>
                                <th>Date de création</th>
                                <th class="text-center action-btn">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($permissions as $permission)
                                <tr>
                                    <td>
                                        {{ $permission->name }}
                                    </td>

                                    <td>{{ date_format(date_create($permission->created_at), 'd M,Y') }}</td>

                                    <td class="text-center">
                                        <div class="actions">
                                            @can('update-permission')
                                                <a data-id="{{ $permission->id }}"
                                                    data-permission="{{ $permission->name }}"
                                                    class="btn btn-sm btn-info editbtn" data-toggle="modal"
                                                    href="javascript:void(0)">
                                                    <i class="fe fe-pencil"></i> Modifier
                                                </a>
                                            @endcan
                                            @can('destroy-permission')
                                                <a data-id="{{ $permission->id }}" data-toggle="modal"
                                                    href="javascript:void(0)" class="btn btn-sm btn-danger deletebtn">
                                                    <i class="fe fe-trash"></i> Supprimer
                                                </a>
                                            @endcan
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

<!-- Modal Ajout -->
<div class="modal fade" id="add_permission" aria-hidden="true" role="dialog">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Ajouter une permission</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Fermer">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="POST" action="{{ route('permissions') }}">
                    @csrf
                    <div class="row form-row">
                        <div class="col-12">
                            <div class="form-group">
                                <label>Permission</label>
                                <input type="text" name="permission" class="form-control">
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary btn-block">Enregistrer les modifications</button>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- /Modal Ajout -->

<!-- Modal Modification -->
<div class="modal fade" id="edit_permission" aria-hidden="true" role="dialog">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Modifier la permission</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Fermer">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="post" action="{{ route('permissions') }}">
                    @csrf
                    @method("PUT")
                    <div class="row form-row">
                        <div class="col-12">
                            <input type="hidden" name="id" id="edit_id">
                            <div class="form-group">
                                <label>Permission</label>
                                <input type="text" class="form-control edit_permission" name="permission">
                            </div>
                        </div>

                    </div>
                    <button type="submit" class="btn btn-primary btn-block">Enregistrer les modifications</button>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- /Modal Modification -->

<!-- Modal Suppression -->
<x-modals.delete :route="'permissions'" :title="'Permission'" />
<!-- /Modal Suppression -->
@endsection

@push('page-js')
    <!-- Select2 JS -->
    <script src="{{ asset('assets/plugins/select2/js/select2.min.js') }}"></script>
    <script>
        $(document).ready(function() {
            $('#perm-table').on('click', '.editbtn', function() {
                event.preventDefault();
                $('#edit_permission').modal('show');
                var id = $(this).data('id');
                var permission = $(this).data('permission');
                $('#edit_id').val(id);
                $('.edit_permission').val(permission);
            });
            //
        });
    </script>

@endpush
