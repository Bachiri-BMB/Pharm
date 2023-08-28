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
                    <h3 class="m-b-10">Annual Category Report</h3>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-4">
        <div class="card">
            <div class="card-body">
                <h5>Select Year</h5>
                <form action="{{ route('annual-category-report') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="year">Select Year</label>
                        <input type="number" id="year" name="year" class="form-control" value="{{ $selectedYear }}" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Generate Report</button>
                </form>
            </div>
        </div>
    </div>
    <div class="col-md-8">
        <div class="card">
            <div class="card-body">
                <h5>Category Report for {{ $selectedYear }}</h5>
                <table class="table">
                    <thead>
                        <tr>
                            <th>Categorie</th>
                            <th>Anné</th>
                            <th>Prix Total Entré </th>
                            <th>Prix total Sortie</th>
                            <th>Prix Stock</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($categoryReport as $data)
                        <tr>
                            <td>{{ $data['category'] }}</td>
                            <td>{{ $data['year'] }}</td>
                            <td>{{ $data['entry'] }}</td>
                            <td>{{ $data['exit'] }}</td>
                            <td>{{ $data['stock'] }}</td>
                        </tr>
                        @endforeach
                        <tr>
                            <td><strong>Total</strong></td>
                            <td>{{ $data['year'] }}</td>
                            <td><strong>{{ $totalEntry }}</strong></td>
                            <td><strong>{{ $totalExit }}</strong></td>
                            <td><strong>{{ $totalStock}}</strong></td>

                        </tr>
                    </tbody>

                </table>
                <div class="row mt-3">
                    <div class="col-md-12 text-right">
                        <!-- Add print button -->
                        <button class="btn btn-secondary" onclick="printPage()">Imprimer</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div id="print-container" style="display: none;">
    <div style="display: flex; justify-content: space-between;">
        <img src="{{ asset('img/Police_Algérie.png') }}" width="150" alt="Left Image">
        <img src="{{ asset('img/Police_Algérie.png') }}" width="150" alt="Right Image">
    </div>
    

    <h3 style="text-align: center; font-weight: bold;">Rapport Annuel de Stock Par Categories de Pharmacy {{ $data['year'] }}</h3>

    <div class="col-md-12">
        <div class="card">
            <div class="card-body" style="padding: 8;"> <!-- Remove any padding that might affect the width -->
                <table class="table table-bordered" style="width: 27cm; margin: 0 auto;">
                    <thead>
                        <tr>
                            <th>Categorie</th>
                            <th>Anné</th>
                            <th>Prix Total Entré </th>
                            <th>Prix total Sortie</th>
                            <th>Prix Stock</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($categoryReport as $data)
                        <tr>
                            <td>{{ $data['category'] }}</td>
                            <td>{{ $data['year'] }}</td>
                            <td>{{ $data['entry'] }}</td>
                            <td>{{ $data['exit'] }}</td>
                            <td>{{ $data['stock'] }}</td>
                        </tr>
                        @endforeach
                        <tr>
                            <td><strong>Total</strong></td>
                            <td>{{ $data['year'] }}</td>
                            <td><strong>{{ $totalEntry }}</strong></td>
                            <td><strong>{{ $totalExit }}</strong></td>
                            <td><strong>{{ $totalStock}}</strong></td>

                        </tr>
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
