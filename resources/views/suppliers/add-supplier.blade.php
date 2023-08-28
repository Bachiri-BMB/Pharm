@extends('layouts.app')

@section('content')
<div class="page-header">
    <div class="page-block">
        <div class="row align-items-center">
            <div class="col-md-9 col-auto">
                <div class="page-header-title">
                    <h3 class="m-b-10">Ajouter un fournisseur</h3>
                </div>
            </div>
            <div class="col-sm-3 col">
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}"><i class="feather icon-home"></i>
                            Tableau de bord</a>
                    </li>
                    <li class="breadcrumb-item active">Ajouter un fournisseur</li>
                </ul>
            </div>
        </div>
    </div>
</div>
<div class="row">
	<div class="col-sm-12">
		<div class="card">
            <div class="card-header">
                <h5>Ajouter un fournisseur</h5>
                <div class="card-header-right">
                    <a href="{{ route('suppliers') }}" class="btn btn-primary float-right">Retour</a>
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
			<div class="card-body custom-edit-service">

			<!-- Ajouter un médicament -->
			<form method="post" enctype="multipart/form-data" action="{{route('add-supplier')}}">
				@csrf

				<div class="service-fields mb-3">
					<div class="row">
						<div class="col-lg-6">
							<div class="form-group">
								<label>Nom<span class="text-danger">*</span></label>
								<input class="form-control" type="text" name="name">
							</div>
						</div>
						<div class="col-lg-6">
							<label>Email<span class="text-danger">*</span></label>
							<input class="form-control" type="text" name="email" id="email">
						</div>
					</div>
				</div>

				<div class="service-fields mb-3">
					<div class="row">
						<div class="col-lg-6">
							<div class="form-group">
								<label>Téléphone<span class="text-danger">*</span></label>
								<input class="form-control" type="text" name="phone">
							</div>
						</div>
						<div class="col-lg-6">
							<label>Entreprise<span class="text-danger">*</span></label>
							<input class="form-control" type="text" name="company">
						</div>
					</div>
				</div>

				<div class="service-fields mb-3">
					<div class="row">
						<div class="col-lg-6">
							<div class="form-group">
								<label>Adresse <span class="text-danger">*</span></label>
								<input type="text" name="address" class="form-control">
							</div>
						</div>
						<div class="col-lg-6">
							<label>Produit</label>
							<input type="text" name="product" class="form-control">
						</div>
					</div>
				</div>
				<div class="service-fields mb-3">
					<div class="row">
						<div class="col-12">
							<label>Description</label>
							<textarea name="description" class="form-control" cols="30" rows="3"></textarea>
						</div>
					</div>
				</div>

				<div class="submit-section">
					<button class="btn btn-primary submit-btn" type="submit" name="form_submit" value="submit">Soumettre</button>
				</div>
			</form>
			<!-- /Ajouter un médicament -->


			</div>
		</div>
	</div>
</div>
@endsection

@push('page-js')
	<!-- Select2 JS -->
	<script src="{{asset('assets/plugins/select2/js/select2.min.js')}}"></script>
	<!-- Datetimepicker JS -->
	<script src="{{asset('assets/js/moment.min.js')}}"></script>
	<script src="{{asset('assets/js/bootstrap-datetimepicker.min.js')}}"></script>
@endpush
