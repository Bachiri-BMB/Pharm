@extends('layouts.app')

@section('content')
<style>
    /* Define a media query to hide elements when printing */
    @media print {
        body * {
            visibility: hidden;
        }
        #print-container, #print-container * {
            visibility: visible;
        }
        #print-container {
            position: absolute;
            left: 0;
            top: 0;
        }
    }
</style>
<div class="page-header">
    <div class="page-block">
        <div class="row align-items-center">
            <div class="col-md-9 col-auto">
                <div class="page-header-title">
                    <h3 class="m-b-10">Rapport de consomation de chaque service</h3>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-4">
        <div class="card">
            <div class="card-body">
                <h5>Selectionner L'année </h5>
                <form action="{{ route('generate-service-sales-report') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="year">Year</label>
                        <input type="number" id="year" name="year" class="form-control" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Generer Rapport</button>
                </form>
            </div>
        </div>
    </div>
    <div class="col-md-8">
        <div class="card">
            <div class="card-body">
                <h5>Rapport des Sortie des produit pour chaque  Service Pour L'année {{ $year }}</h5>
                @if (!empty($serviceSalesReport))
                <table class="table">
                    <thead>
                        <tr>
                            <th>Nom Service</th>
                            <th>total des Sorties</th>
                            <th>Prix Total</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($serviceSalesReport as $data)
                        <tr>
                            <td>{{ $data['service'] }}</td>
                            <td>{{ $data['total_sales'] }}</td>
                            <td>{{ $data['total_price'] }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                    <div class="row mt-3">
                        <div class="col-md-12 text-right">
                            <!-- Add print button -->
                            <button class="btn btn-secondary" onclick="printPage()">Imprimer</button>
                        </div>
                    </div>
                </table>
                @endif
            </div>
        </div>
    </div>
</div>
<div id="print-container" style="display: none;">
    <div style="display: flex; justify-content: space-between;">
        <img src="{{ asset('img/Police_Algérie.png') }}" width="150" alt="Left Image">
        <img src="{{ asset('img/Police_Algérie.png') }}" width="150" alt="Right Image">
    </div>
    

    <h3 style="text-align: center; font-weight: bold;">Rapport des Sortie des produit pour chaque  Service Pour L'année {{ $year }} </h3>
<div class="col-md-12">
    <div class="card">
        <div class="card-body" style="padding: 8;"> <!-- Remove any padding that might affect the width -->
            <table class="table table-bordered" style="width: 27cm; margin: 0 auto;">
                <thead>
                    <tr>
                        <th>Nom de Service</th>
                        <th>Total Entrie</th>
                        <th>Total Prix </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($serviceSalesReport as $data)
                    <tr>
                        <td>{{ $data['service'] }}</td>
                        <td>{{ $data['total_sales'] }}</td>
                        <td>{{ $data['total_price'] }}</td>
                    </tr>
                    @endforeach
                </tbody>

            </table>
        </div>
    </div>
</div>
</div>

<script>
function printPage() {
    var printContainer = document.getElementById("print-container");
    printContainer.style.display = "block";
    window.print();
    printContainer.style.display = "none";
}
</script>


@endsection
