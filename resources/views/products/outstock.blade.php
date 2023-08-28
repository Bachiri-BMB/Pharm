@extends('layouts.app')

@push('page-css')
    <!-- Select2 CSS -->
    <link rel="stylesheet" href="{{ asset('assets/plugins/select2/css/select2.min.css') }}">
@endpush

@push('page-header')
    <div class="col-sm-12">
        <h3 class="page-title">Outstock</h3>
        <ul class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('products') }}">Medicament</a></li>
            <li class="breadcrumb-item active">Alert-Stock</li>
        </ul>
    </div>
@endpush

@section('content')
    <div class="page-header">
        <div class="page-block">
            <div class="row align-items-center">
                <div class="col-md-9 col-auto">
                    <div class="page-header-title">
                        <h3 class="m-b-10"> Alert-Stock</h3>
                    </div>
                </div>
                <div class="col-sm-3 col">
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('products') }}"><i class="feather icon-drug"></i>
                                Medicament</a>
                        </li>
                        <li class="breadcrumb-item active">Alert-Stock</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">

            <!-- Recent Orders -->
            <div class="card">
                <div class="card-header">
                    <h5>Alert-Stock</h5>
                    <div class="card-header-right">
                        <a href="{{ route('purchases') }}" class="btn btn-primary float-right">Retour</a>
                        <div class="btn-group card-option">
                            <button type="button" class="btn dropdown-toggle btn-icon" data-toggle="dropdown"
                                aria-haspopup="true" aria-expanded="false">
                                <i class="feather icon-more-horizontal"></i>
                            </button>
                            <ul class="list-unstyled card-option dropdown-menu dropdown-menu-right">
                                <li class="dropdown-item full-card"><a href="#!"><span><i class="feather icon-maximize"></i>
                                            maximize</span><span style="display:none"><i class="feather icon-minimize"></i>
                                            Restore</span></a>
                                </li>
                                <li class="dropdown-item minimize-card"><a href="#!"><span><i
                                                class="feather icon-minus"></i> collapse</span><span style="display:none"><i
                                                class="feather icon-plus"></i> expand</span></a>
                                </li>
                                <li class="dropdown-item reload-card"><a href="#!"><i class="feather icon-refresh-cw"></i>
                                        reload</a></li>
                                <li class="dropdown-item close-card"><a href="#!"><i class="feather icon-trash"></i>
                                        remove</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="datatable-export" class=" table table-hover table-center mb-0">
                            <thead>
                                <tr>
                                    <th>Nom</th>
                                    <th>Categorie</th>
                                    <th>Prix</th>
                                    <th>Quantitie</th>
                                    <th>DATE D'EXPIRATION	</th>
                                    <th class="action-btn">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($products as $product)
                                    <tr>
                                        <td>
                                            @if (!empty($product->image))
                                            <span class="avatar avatar-sm mr-2">
                                                <img class="avatar-img" width="30"
                                                    src="{{ asset('storage/purchases/' . $product->image) }}"
                                                    alt="Image du produit">
                                            </span>
                                            @endif
                                            {{ $product->product->name }}
                                        </td>
                                        <td>{{ $product->product->category->name }}</td>
                                        <td>{{ $product->price }}DA</td>
                                        <td><span class="btn btn-sm btn-danger"> {{ $product->quantity }}</span></td>
                                        <td>
                                            <span class="btn btn-sm btn-info">
                                                {{ date_format(date_create($product->expiry_date), 'd/m/y') }}</span>
                                            </span>
                                        </td>
                                        <td>
                                            <div class="actions">
                                                <a class="btn btn-sm btn-info"
                                                    href="{{ route('edit-purchase', $product->id) }}">
                                                    <i class="fe fe-pencil"></i> Edit
                                                </a>
                                                <a data-id="{{ $product->id }}" href="javascript:void(0);"
                                                    class="btn btn-sm btn-danger deletebtn" data-toggle="modal">
                                                    <i class="fe fe-trash"></i> Delete
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
            {{ $products->links() }}

            <!-- /Recent Orders -->

        </div>
    </div>

    <!-- Delete Modal -->
    <x-modals.delete :route="'products'" :title="'OutStock Product'" />
    <!-- /Delete Modal -->
@endsection

@push('page-js')
    <!-- Select2 JS -->
    <script src="{{ asset('assets/plugins/select2/js/select2.min.js') }}"></script>
@endpush
