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
                    <h3 class="m-b-10">Add Medicine</h3>
                </div>
            </div>
            <div class="col-sm-3 col">
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}"><i class="feather icon-home"></i>
                            Dashboard</a>
                    </li>
                    <li class="breadcrumb-item active">Ajouter Medicament</li>
                </ul>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-sm-12">
        <div class="card">
            <div class="card-header">
                <h5>Ajouter Medicament</h5>
                <div class="card-header-right">
                    <a href="{{ route('products') }}" class="btn btn-primary float-right">Back</a>
                    <div class="btn-group card-option">
                        <!-- ... (dropdown menu options) ... -->
                    </div>
                </div>
            </div>
            <div class="card-body custom-edit-service">

                <!-- Add Medicine -->
                <form method="post" enctype="multipart/form-data" id="update_service"
                    action="{{ route('add-product') }}">
                    @csrf
                    <div class="service-fields mb-3">
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label>Nom du médicament<span class="text-danger">*</span></label>
                                <input class="form-control" type="text" name="name">
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label>Catégorie <span class="text-danger">*</span></label>
                                <select class="select2 form-select form-control" name="category">
                                    @foreach ($categories as $category)
                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <!-- Add Reference and Nmbr Min Stock Fields -->
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label>Référence</label>
                                <input class="form-control" type="text" name="reference">
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label>Quantité minimale en stock</label>
                                <input class="form-control" type="number" name="nmbr_min_stock" min="0">
                            </div>
                        </div>
                        
                        <div class="service-fields mb-3">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label>Image du médicament</label>
                                        <input type="file" name="image" class="form-control">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- End of Reference and Nmbr Min Stock Fields -->

                        <div class="service-fields mb-3">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label>Description <span class="text-danger">*</span></label>
                                        <textarea class="form-control service-desc" name="description"></textarea>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="submit-section">
                            <button class="btn btn-primary submit-btn" type="submit" name="form_submit"
                                value="submit">Submit</button>
                        </div>
                    </div>
                </form>
                <!-- /Add Medicine -->
            </div>
        </div>
    </div>
</div>
@endsection

@push('page-js')
    <!-- Select2 JS -->
    <script src="{{ asset('jambasangsang/assets/select2/js/select2.min.js') }}"></script>

    <script>
        $(document).ready(function () {
            $('.select2').select2();
        });
    </script>
@endpush
