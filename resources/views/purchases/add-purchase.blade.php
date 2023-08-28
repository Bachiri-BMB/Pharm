@extends('layouts.app')

@push('page-css')
    <!-- Select2 CSS -->
    <link rel="stylesheet" href="{{ asset('jambasangsang/assets/select2/css/select2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap-datetimepicker.min.css') }}">
@endpush

@section('content')
    <div class="page-header">
        <!-- ... (rest of the content) ... -->
    </div>
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <!-- ... (rest of the content) ... -->
                <div class="card-body custom-edit-service">
                    <!-- Ajouter un médicament -->
                    <form method="post" enctype="multipart/form-data" autocomplete="off" action="{{ route('store-stock') }}">
                        @csrf
                        @if($errors->any())
                            <h4>{{$errors->first()}}</h4>
                          @endif

                        <div class="service-fields mb-3">
                            <div class="row">
                                <div class="col-lg-6 col-auto">
                                    <div class="form-group">
                                        <label>Numéro de Facture<span class="text-danger">*</span></label>
                                        <input class="form-control" type="text" name="N_Facture" required>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-auto">
                                    <div class="form-group">
                                        <label>Produit <span class="text-danger">*</span></label>
                                        <select class="select2-medicaments form-select form-control" name="product_id"
                                            required>
                                            <option value="" selected disabled>Choisir un médicament*</option>
                                            @foreach ($products as $product)
                                                <option value="{{ $product->id }}">{{ $product->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>


                        <div class="service-fields mb-3">
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label>Quantité<span class="text-danger">*</span></label>
                                        <input class="form-control" type="text" name="quantity" required>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label>Date d'expiration<span class="text-danger">*</span></label>
                                        <input class="form-control" type="date" name="expiry_date" required>
                                    </div>
                                </div>
                            </div>
                        </div>
                        



                        <div class="service-fields mb-3">
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label>Numéro de Lot<span class="text-danger">*</span></label>
                                        <input class="form-control" type="text" name="N_lot" required>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label>Date<span class="text-danger">*</span></label>
                                        <input class="form-control" type="date" name="date" required>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="service-fields mb-3">
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label>Prix d'achat<span class="text-danger">*</span></label>
                                        <input class="form-control" type="text" name="price" required>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label>Fournisseur <span class="text-danger">*</span></label>
                                        <select class="select2-fournisseur form-select form-control" name="supplier"
                                            required>
                                            <option value="" selected disabled>Sélectionnez un fournisseur</option>
                                            @foreach ($suppliers as $supplier)
                                                <option value="{{ $supplier->id }}">{{ $supplier->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>

                       

                        <div class="submit-section">
                            <button class="btn btn-primary submit-btn" type="submit">Soumettre</button>
                        </div>
                    </form>
                    <!-- /Ajouter un médicament -->
                </div>
            </div>
        </div>
    </div>
@endsection

@push('page-js')
    <!-- Datetimepicker JS -->
    <script src="{{ asset('assets/js/moment.min.js') }}"></script>
    <script src="{{ asset('assets/js/bootstrap-datetimepicker.min.js') }}"></script>
    <!-- Select2 JS -->
    <script src="{{ asset('jambasangsang/assets/select2/js/select2.min.js') }}"></script>
    <script>
        $(document).ready(function () {
            // Initialize Select2 for the "Médicaments" dropdown
            $('.select2-medicaments').select2({
                placeholder: 'Sélectionnez un médicament',
                allowClear: true,
            });

            // Initialize Select2 for the "Fournisseur" dropdown
            $('.select2-fournisseur').select2({
                placeholder: 'Sélectionnez un fournisseur',
                allowClear: true,
            });
        });
    </script>
@endpush
