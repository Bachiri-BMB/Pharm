@extends('layouts.app')
@push('page-css')
    <!-- Select2 CSS -->
    <link rel="stylesheet" href="{{asset('jambasangsang/assets/select2/css/select2.min.css')}}">
@endpush

@section('content')
<div class="page-header">
    <div class="page-block">
        <div class="row align-items-center">
            <div class="col-md-9 col-auto">
                <div class="page-header-title">
                    <h3 class="m-b-10">Médicaments</h3>
                </div>
            </div>
            <div class="col-sm-3 col">
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}"><i class="feather icon-home"></i>
                            Tableau de bord</a>
                    </li>
                    <li class="breadcrumb-item active">Médicaments</li>
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
        <!-- Produits -->
        <div class="card">
            <div class="card-header">
                <h5>Médicaments</h5>
                <div class="card-header-right">
                    <a href="{{route('add-product')}}" class="btn btn-primary float-right">Ajouter un nouveau</a>
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
                                            class="feather icon-plus"></i> agrandir</span></a></li>
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
                    <table id="datatable-export" class="table table-hover table-center mb-0">
                        <thead>
                            <tr>
                                <th>reference</th>
                                <th>Nom du médicament</th>
                                <th>minimum_stock</th>

                                <th>Catégorie</th>
                                <th class="action-btn">Action</th>
                            </tr>
                        </thead>
                        <tbody>

                            @foreach ($products as $product)
                                <tr>
                                    <td>
                                       
                                        {{$product->reference}}
                                    </td>
                                    <td>
                                        @if (!empty($product->image))
                                            <span class="avatar avatar-sm mr-2">
                                                <img class="avatar-img" width="30"
                                                    src="{{ asset('storage/products/' . $product->image) }}"
                                                    alt="Image du produit">
                                            </span>
                                        @endif
                                                {{ $product->name }}
                                          
                                    </td>
                                    <td>{{$product->nmbr_min_stock}}
                                    <td>{{$product->category->name}}</td>
                                
                                    <td>
                                            <a class="btn btn-sm btn-info" href="{{route('edit-product',$product)}}">
                                                <i class="fe fe-pencil"></i> Modifier
                                            </a>
                                    </td>
                                    <td>
                                            <form action="{{ route('products.destroy', ['id' => $product->id]) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger">Supprimer</button>
                                            </form>
                                            
                                           
                                    </td>
                                </tr>
                            @endforeach

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <!-- /Produits -->

    </div>
</div>

<!-- Modal Suppression -->
<x-modals.delete :route="'products'" :title="'Produit'" />
<!-- /Modal Suppression -->
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
