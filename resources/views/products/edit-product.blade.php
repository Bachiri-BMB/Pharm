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
                    <h3 class="m-b-10">Edit Medicine</h3>
                </div>
            </div>
            <div class="col-sm-3 col">
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}"><i class="feather icon-home"></i> Dashboard</a></li>
                    <li class="breadcrumb-item active">Edit Medicine</li>
                </ul>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-sm-12">
        <div class="card">
            <div class="card-header">
                <h5>Edit Medicine</h5>
                <div class="card-header-right">
                    <a href="{{ route('products') }}" class="btn btn-primary float-right">Back</a>
                    <div class="btn-group card-option">
                        <!-- ... (dropdown menu options) ... -->
                    </div>
                </div>
            </div>
            <div class="card-body custom-edit-service">
                <!-- Edit Medicine -->
                <form method="post" enctype="multipart/form-data" id="update_service" action="{{ route('edit-product', $product->id) }}">
                    @csrf
                    <div class="service-fields mb-3">
                        <div class="row">
                            <div class="col-lg-12 col-auto">
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label>Nom<span class="text-danger">*</span></label>
                                        <input class="form-control" type="text" name="name" value="{{ $product->name }}">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>Référence<span class="text-danger">*</span></label>
                                    <input class="form-control" type="text" name="reference" value="{{ $product->reference }}">
                                </div>
                                <div class="form-group">
                                    <label>Min Stock Quantity<span class="text-danger">*</span></label>
                                    <input class="form-control" type="number" name="nmbr_min_stock" value="{{ $product->nmbr_min_stock }}">
                                </div>
                                <div class="form-group">
                                    <label>Medicine <span class="text-danger">*</span></label>
                                    <select class="select2 form-select form-control" name="category">
                                        @foreach ($categories as $category)
                                            <option @if($category->id == $product->category->id) selected @endif value="{{ $category->id }}">{{ $category->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="service-fields mb-3">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label>Image</label>
                                    <input class="form-control" type="file" name="image">
                                    @if ($product->image)
                                        <img src="{{ asset('storage/purchases/' . $product->image) }}" alt="Product Image" style="max-width: 150px; margin-top: 10px;">
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="service-fields mb-3">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label>Description <span class="text-danger">*</span></label>
                                    <textarea class="form-control service-desc" name="description">{{ $product->description }}</textarea>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="submit-section">
                        <button class="btn btn-primary submit-btn" type="submit" name="form_submit" value="submit">Submit</button>
                    </div>
                </form>
                <!-- /Edit Medicine -->
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
