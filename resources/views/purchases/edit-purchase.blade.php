@extends('layouts.app')

@push('page-css')
    <!-- Select2 CSS -->
    <link rel="stylesheet" href="{{ asset('jambasangsang/assets/select2/css/select2.min.css') }}">
@endpush

@section('content')
<div class="page-header">
    <div class="page-block">
        <div class="row align-items-center">
            <div class="col-md-9 col-auto">
                <div class="page-header-title">
                    <h3 class="m-b-10">Modifier  Achat</h3>
                </div>
            </div>
            <div class="col-sm-3 col">
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}"><i class="feather icon-home"></i> Dashboard</a></li>
                    <li class="breadcrumb-item active">Modifier  Achats</li>
                </ul>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-sm-12">
        <div class="card">
            <div class="card-header">
                <h5>Modifier  Achat</h5>
                <div class="card-header-right">
                    <a href="{{ route('purchases') }}" class="btn btn-primary float-right">Retour</a>
                    <div class="btn-group card-option">
                        <button type="button" class="btn dropdown-toggle btn-icon" data-toggle="dropdown"
                            aria-haspopup="true" aria-expanded="false">
                            <i class="feather icon-more-horizontal"></i>
                        </button>
                        <ul class="list-unstyled card-option dropdown-menu dropdown-menu-right">
                            <li class="dropdown-item full-card"><a href="#!"><span><i class="feather icon-maximize"></i> maximize</span><span style="display:none"><i class="feather icon-minimize"></i> Restore</span></a></li>
                            <li class="dropdown-item minimize-card"><a href="#!"><span><i class="feather icon-minus"></i> collapse</span><span style="display:none"><i class="feather icon-plus"></i> expand</span></a></li>
                            <li class="dropdown-item reload-card"><a href="#!"><i class="feather icon-refresh-cw"></i> reload</a></li>
                            <li class="dropdown-item close-card"><a href="#!"><i class="feather icon-trash"></i> remove</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="card-body custom-edit-service">
                <!-- Edit Purchase -->
                <form method="post" enctype="multipart/form-data" id="update_service" action="{{ route('edit-purchase', $purchase->id) }}">
                    @csrf
                    @method('PUT')

                    <div class="service-fields mb-3">
                        <div class="row">
                            <div class="col-lg-6 col-md-6">
                                <div class="form-group">
                                    <label>Produit  <span class="text-danger">*</span></label>
                                    <select class="select2 form-select form-control" name="product_id">
                                        @foreach ($products as $product)
                                            <option @if($product->id == $purchase->product_id) selected @endif value="{{ $product->id }}">{{ $product->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="col-lg-6 col-md-6">
                                <div class="form-group">
                                    <label>Fournisseur <span class="text-danger">*</span></label>
                                    <select class="select2 form-select form-control" name="supplier">
                                        @foreach ($suppliers as $supplier)
                                            <option @if($supplier->id == $purchase->supplier_id) selected @endif value="{{ $supplier->id }}">{{ $supplier->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="service-fields mb-3">
                        <div class="row">
                            <div class="col-lg-6 col-md-6">
                                <div class="form-group">
                                    <label>N_Facture<span class="text-danger">*</span></label>
                                    <input class="form-control" type="text" name="N_Facture" value="{{ $purchase->N_Facture }}">
                                </div>
                            </div>

                            <div class="col-lg-6 col-md-6">
                                <div class="form-group">
                                    <label>date_ajoute<span class="text-danger">*</span></label>
                                    <input class="form-control" type="date" name="date" value="{{ $purchase->date }}">
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="service-fields mb-3">
                        <div class="row">
                            <div class="col-lg-6 col-md-6">
                                <div class="form-group">
                                    <label>N_Lot<span class="text-danger">*</span></label>
                                    <input class="form-control" type="text" name="N_lot" value="{{ $purchase->N_lot }}">
                                </div>
                            </div>

                            <div class="col-lg-6 col-md-6">
                                <div class="form-group">
                                    <label>Prix<span class="text-danger">*</span></label>
                                    <input class="form-control" type="text" name="price" value="{{ $purchase->price }}">
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="service-fields mb-3">
                        <div class="row">
                            <div class="col-lg-6 col-md-6">
                                <div class="form-group">
                                    <label>Quantitie<span class="text-danger">*</span></label>
                                    <input class="form-control" type="text" name="quantity" value="{{ $purchase->quantity }}">
                                </div>
                            </div>

                            <div class="col-lg-6 col-md-6">
                                <div class="form-group">
                                    <label>Date d'expiration<span class="text-danger">*</span></label>
                                    <input class="form-control" type="date" name="expiry_date" value="{{ $purchase->expiry_date }}">
                                </div>
                            </div>
                        </div>
                    </div>

                   
                    <div class="submit-section">
                        <button class="btn btn-primary submit-btn" type="submit" name="form_submit" value="submit">Submit</button>
                    </div>
                </form>
                <!-- /Edit Purchase -->
            </div>
        </div>
    </div>
</div>

@endsection

@push('page-js')
    <!-- Select2 JS -->
    <script src="{{ asset('jambasangsang/assets/select2/js/select2.min.js') }}"></script>
    <script>
        $(document).ready(function() {
            $('.select2').select2().maximizeSelect2Height();
        });
    </script>
@endpush
