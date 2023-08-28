@extends('layouts.app')

@push('page-css')
    <!-- Select2 CSS -->
    <link rel="stylesheet" href="{{ asset('jambasangsang/assets/select2/css/select2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap-datetimepicker.min.css') }}">
@endpush

@section('content')
    <div class="page-header">
        <div class="page-block">
            <div class="row align-items-center">
                <div class="col-md-9 col-auto">
                    <div class="page-header-title">
                        <h3 class="m-b-10">Achats de stocks</h3>
                    </div>
                </div>
                <div class="col-sm-3 col">
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}"><i class="feather icon-home"></i>
                                Tableau de bord</a>
                        </li>
                        <li class="breadcrumb-item active">Achats de stock</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <input type="text" id="searchInput" class="form-control mb-3" placeholder="Rechercher un médicament">
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <!-- Commandes récentes -->
            <div class="card">
                <div class="card-header">
                    <h5>Achats de stock</h5>
                    <div class="card-header-right">
                        <a href="{{ route('add-purchase') }}" class="btn btn-primary float-right">Ajouter nouvelle achat</a>
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
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <input type="text" id="searchInput" class="form-control" placeholder="Rechercher par nom, date ou N_Facture">
                        </div>
                    </div>
                    <div class="table-responsive">
                        <table id="datatable-export" class="table table-hover table-center mb-0">
                            <thead>
                                <tr>
                                    <th>Reference</th>
                                    <th>Nom du médicament</th>
                                    <th>N_Facture</th>
                                    <th>N_lot</th>
                                    <th>Prix Unitaire</th>
                                    <th>Quantité</th>
                                    <th>Fournisseur</th>
                                    <th>Decompete</th>
                                    <th>date_ajoute</th>
                                    <th>Date d'expiration</th>
                                    <th class="action-btn">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($purchases as $purchase)
                                    <tr>
                                        <td>{{$purchase->product->reference}}</td>
                                        <td>
                                            @if (!empty($purchase->product->image))
                                                <span class="avatar avatar-sm mr-2">
                                                    <img class="avatar-img" width="30"
                                                        src="{{ asset('storage/products/' . $purchase->product->image) }}"
                                                        alt="Image du produit">
                                                </span>
                                            @endif
                                                @if ($purchase->product)
                                                    {{ $purchase->product->name }}
                                                @else
                                                    N/A
                                                @endif
                                        </td>                                       
                                        <td>{{ $purchase->N_Facture }}</td>
                                        <td>{{ $purchase->N_lot }}</td>
                                        <td>{{ AppSettings::get('app_currency', 'dz') }}{{ $purchase->price }}</td>
                                        <td>{{ $purchase->quantity }}</td>
                                        <td>{{ $purchase->supplier->name }}</td>
                                        <td>{{ AppSettings::get('app_currency', '$') }}{{ $purchase->price * $purchase->quantity }}</td>
                                        <td>{{ date('d/m/y', strtotime($purchase->date)) }}</td>
                                        <td>{{ date('d/m/y', strtotime($purchase->expiry_date)) }}</td>
                                        <td>
                                            <div class="actions">
                                                <a class="btn btn-sm btn-info"
                                                    href="{{ route('edit-purchase', $purchase) }}">
                                                    <i class="fe fe-pencil"></i> Modifier
                                                </a>
                                                <a data-id="{{ $purchase->id }}" href="javascript:void(0);"
                                                    class="btn btn-sm btn-danger deletebtn" data-toggle="modal">
                                                    <i class="fe fe-trash"></i> Supprimer
                                                </a>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <!-- /Commandes récentes -->
        </div>
    </div>
    <!-- Modale de suppression -->
    <x-modals.delete :route="'purchases'" :title="'Achat'" />
    <!-- /Modale de suppression -->
@endsection

@push('page-js')
    <!-- Select2 JS -->
    <script src="{{ asset('assets/plugins/select2/js/select2.min.js') }}"></script>
    <script>
        // Function to filter the table based on search input
        $(document).ready(function () {
            $("#searchInput").on("keyup", function () {
                var value = $(this).val().toLowerCase();
                $("#datatable-export tbody tr").filter(function () {
                    $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
                });
            });
        });

    </script>
@endpush
