@extends('layouts.app')

@push('page-css')
    <!-- Select2 CSS -->
    <link rel="stylesheet" href="{{ asset('assets/plugins/select2/css/select2.min.css') }}">
    <style>
    @keyframes blink {
        0% { opacity: 1; }
        50% { opacity: 0; }
        100% { opacity: 1; }
    }

    .blink-me {
        animation: blink 1.5s infinite;
    }
</style>

@endpush

@section('content')

<div class="container-fluid">
    <!-- Page Header -->
    <div class="page-header">
        <div class="page-header-title">
            <h3 class="m-b-10">Dashboard</h3>
        </div>
        <div class="page-header-subtitle">
            <h5 class="m-b-0">Salut {{ auth()->user()->name }}!</h5>
        </div>
    </div>
    <!-- /Page Header -->
      <!-- OutStock Medicines -->
      <div class="row">
        <div class="col-md-12">
            <input type="text" id="searchInput" class="form-control mb-3" placeholder="Rechercher un médicament">
        </div>
    </div>
      <div class="row">
        <div class="col-md-6">
            <div class="card">
                  <div class="card-header">
                      <div class="alert alert-danger" role="alert">
                          <h5 class="alert-heading blink-me">Alert-Stock</h5>
                      </div>
                      <audio id="alertSound">
                          <source src="alert-sound.mp3" type="audio/mpeg">
                          Your browser does not support the audio element.
                      </audio>
                      <style>
                          @keyframes blink {
                              0% { opacity: 1; }
                              50% { opacity: 0; }
                              100% { opacity: 1; }
                          }
      
                          .blink-me {
                              animation: blink 1.5s infinite;
                          }
                      </style>
                      <div class="card-header-right">
                          <div class="btn-group card-option">
                              <button type="button" class="btn dropdown-toggle btn-icon" data-toggle="dropdown"
                                  aria-haspopup="true" aria-expanded="false">
                                  <i class="feather icon-more-horizontal"></i>
                              </button>
                              <!-- ... (Your existing card options code) ... -->
                          </div>
                      </div>
                  </div>
                  <div class="card-body">  
                   

                      <div class="alert alert-warning mb-3">
                          <i class="feather icon-alert-triangle mr-2"></i>
                          Certains médicaments sont en rupture de stock. Veuillez prendre les mesures nécessaires.
                      </div>
                      <div class="table-responsive">
                          <table id="datatable-export" class="table table-hover table-center mb-0">
                              <thead>
                                  <tr>
                                      <th>Reference</th>
                                      <th>Nom</th>
                                      <th>Categorie</th>
                                      <th>Quantité</th>
                                      <th>Date d'expiration</th>
                                  </tr>
                              </thead>
                              <tbody>
                                  @foreach ($product_outs as $product)
                                  <tr>
                                      <td>{{$product->product->reference}}</td>
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
                                      <td>
                                          <span class="btn btn-sm btn-danger"> {{ $product->quantity }}</span>
                                      </td>
                                      <td>
                                          <span class="btn btn-sm btn-info">
                                              {{ date_format(date_create($product->expiry_date), 'd/m/y') }}
                                          </span>
                                      </td>
                                  </tr>
                                  @endforeach

                              </tbody>
                          </table>
                      </div>
                  </div>
              </div>
          </div>
          
      
          <div class="col-md-6">
            <div class="card">
                  <div class="card-header">
                      <h5>Produit Piremies</h5>
                  </div>
                  <div class="card-body">
                      <div class="alert alert-danger mb-3">
                          <i class="feather icon-alert-triangle mr-2"></i>
                          Certains médicaments sont périmés. Veuillez prendre les mesures nécessaires.
                      </div>
                      <div class="table-responsive">
                          <table id="datatable-export" class="table table-hover table-center mb-0">
                              <thead>
                                  <tr>
                                      <th>Référence</th>
                                      <th>Nom</th>
                                      <th>Categorie</th>
                                      <th>Quantité</th>
                                      <th>Date de Pirmi</th>
                                  </tr>
                              </thead>
                              <tbody>
                                  @foreach ($pirimes as $product)
                                  <tr>
                                      <td>{{$product->product->reference}}</td>
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
                                      <td>
                                          <span class="btn btn-sm btn-danger"> {{ $product->quantity }}</span>
                                      </td>
                                      <td>
                                          <span class="btn btn-sm btn-info">
                                              {{ date_format(date_create($product->expiry_date), 'd/m/y') }}
                                          </span>
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
      

    <!-- /OutStock Medicines-->
    <div class="row">
        <!-- Today's Sales -->
        <div class="col-md-6 col-xl-3">
            <div class="card card-border-c-primary">
                <div class="card-body">
                    <div class="media align-items-center">
                        <img src="{{ asset('img/payment.png') }}" width="60" alt="Today's Sales" class="mr-3">
                        <div class="media-body">
                            <h5 class="m-b-0">{{ $today_sales }} DA</h5>
                            <span>Valeur Sortie Produit d'aujourd'hui</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /Today's Sales -->

        <!-- Yesterday's Sales -->
        <div class="col-md-6 col-xl-3">
            <div class="card card-border-c-secondary">
                <div class="card-body">
                    <div class="media align-items-center">
                        <img src="{{ asset('img/cash-payment.png') }}" width="60" alt="Yesterday's Sales" class="mr-3">
                        <div class="media-body">
                            <h5 class="m-b-0">{{ $yesterday_sales }} DA</h5>
                            <span>Valeur Sortie  Hier</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /Yesterday's Sales -->

        <!-- Last 7 Days Sales -->
        <div class="col-md-6 col-xl-3">
            <div class="card card-border-c-info">
                <div class="card-body">
                    <div class="media align-items-center">
                        <img src="{{ asset('img/cash-flow.png') }}" width="60" alt="Last 7 Days Sales" class="mr-3">
                        <div class="media-body">
                            <h5 class="m-b-0">{{ $last_sevenDays }} DA</h5>
                            <span>Valeur Sortie  7 Jours</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /Last 7 Days Sales -->

        <!-- Total Revenue -->
     
        <!-- /Total Revenue -->
    </div>

    <!-- Suppliers, Expired Medicines, Users, Categories -->
    <div class="row">
        <div class="col-md-6 col-xl-3">
            <div class="card card-border-c-primary">
                <div class="card-body">
                    <div class="media align-items-center">
                        <img src="{{ asset('img/inventory.png') }}" width="60" alt="Total Suppliers" class="mr-3">
                        <div class="media-body">
                            <h5 class="m-b-0">{{ $total_suppliers }}</h5>
                            <span>Fournisseurs</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-6 col-xl-3">
            <div class="card card-border-c-secondary">
                <div class="card-body">
                    <div class="media align-items-center">
                        <img src="{{ asset('img/drugs.png') }}" width="60" alt="Total Expired Medicines" class="mr-3">
                        <div class="media-body">
                            <h5 class="m-b-0">{{  $total_expired_products }}</h5>
                            <span>Médicaments périmés</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-6 col-xl-3">
            <div class="card card-border-c-info">
                <div class="card-body">
                    <div class="media align-items-center">
                        <img src="{{ asset('img/medical-team.png') }}" width="60" alt="Total Users" class="mr-3">
                        <div class="media-body">
                            <h5 class="m-b-0">{{ \DB::table('users')->count() }}</h5>
                            <span>Utilisateurs</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-6 col-xl-3">
            <div class="card card-border-c-warning">
                <div class="card-body">
                    <div class="media align-items-center">
                        <img src="{{ asset('img/options.png') }}" width="60" alt="All Categories" class="mr-3">
                        <div class="media-body">
                            <h5 class="m-b-0">{{ $total_categories }}</h5>
                            <span>Toutes catégories</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /Suppliers, Expired Medicines, Users, Categories -->

    <!-- Total Medicines -->
    <div class="row">
        <div class="col-md-12 col-lg-4">
            <div class="card support-bar">
                <div class="card-body pb-0">
                    <div class="media align-items-center">
                        <img src="{{ asset('img/medicine.png') }}" width="50" alt="Total Medicines" class="mr-3">
                        <div class="media-body">
                            <h2 class="m-b-0">{{ $total_medicines }}</h2>
                            <span class="text-c-blue">Total des médicaments</span>
                            <p class="mb-3 mt-3">Nombre total de médicaments dans la pharmacie.</p>
                        </div>
                    </div>
                </div>
                <div class="card-footer bg-primary text-white">
                    <div class="row text-center">
                        <div class="col">
                            <h4 class="m-0">{{ $available_medicines }}</h4>
                            <span>Disponible</span>
                        </div>
                        <div class="col">
                            <h4 class="m-0">{{ $total_medicines_runningOutStock }}</h4>
                            <span>À court de</span>
                        </div>
                        <div class="col">
                            <h4 class="m-0">{{ $total_medicines_outStock }}</h4>
                            <span>Rupture de stock</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /Total Medicines -->

    <!-- OutStock Medicines -->

    <!-- /OutStock Medicines -->
</div>
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
