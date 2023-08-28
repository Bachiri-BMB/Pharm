@extends('layouts.app')

@push('page-css')
    <!-- Add your page-specific CSS here -->
@endpush

@section('content')
    <div class="page-header">
        <div class="page-block">
            <div class="row align-items-center">
                <div class="col-md-9 col-auto">
                    <div class="page-header-title">
                        <h3 class="m-b-10">{{ $title }}</h3>
                    </div>
                </div>
                <div class="col-sm-3 col">
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('products') }}">Products</a></li>
                        <li class="breadcrumb-item active">{{ $title }}</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">

            <!-- Table for expired products -->
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered table-hover table-center mb-0">
                            <thead>
                                <tr>
                                    <th>Nom</th>
                                    <th>Categorie</th>
                                    <th>Prix</th>
                                    <th>Quantitie</th>
                                    <th>DATE D'EXPIRATION	</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($products as $product)
                                    <tr>
                                        <td>{{ $product->product->name }}</td>
                                        <td>{{ $product->product->category->name }}</td>
                                        <td>{{ $product->price }}DA</td>
                                        <td>{{ $product->quantity }}</td>
                                        <td>{{ $product->expiry_date }}</td>
                                        <td>
                                            <div class="actions">
                                                <a class="btn btn-sm btn-info" href="{{ route('edit-product', $product->product) }}">
                                                    <i class="fe fe-pencil"></i> Edit
                                                </a>
                                                <a data-id="{{ $product->product->id }}" href="javascript:void(0);" class="btn btn-sm btn-danger deletebtn" data-toggle="modal">
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
            <!-- /Table for expired products -->

        </div>
    </div>

    <!-- Delete Modal -->
    <x-modals.delete :route="'products'" :title="'Expired Product'" />
    <!-- /Delete Modal -->
@endsection

@push('page-js')
    <!-- Add your page-specific JavaScript here -->
@endpush
