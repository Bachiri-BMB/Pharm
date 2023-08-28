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
                    <h3 class="m-b-10">Annual Stock Report</h3>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-4">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Selectionner  l'année</h5>
                <form action="{{ route('annual') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="year">Selectionner L'année:</label>
                        <input type="number" id="year" name="year" value="{{ old('year') }}" class="form-control" required>
                        @error('year')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-primary">Generer le  Raport</button>
                </form>
            </div>
        </div>
    </div>
    <div class="col-md-8">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Rapport Annuel de Stock</h5>
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Nom de Produit </th>
                            <th>Année</th>
                            <th>Entrie</th>
                            <th>prix_Entrie</th>
                            <th>Sortie</th>
                            <th>prix_Sortie</th>
                            <th>Report</th>
                            <th>Stock</th>
                        </tr>                    
                    </thead>
                    <tbody>
                        @if (!empty($reportData))
                            @foreach ($reportData as $data)
                                <tr>
                                    <td>{{ $data['product'] }}</td>
                                    <td>{{ $data['year'] }}</td>
                                    <td>{{ $data['entry'] }}</td>
                                    <td>{{ $data['prix'] }}</td>
                                    <td>{{ $data['exit'] }}</td>
                                    <td>{{ $data['price_exit'] }}</td>
                                    <td>{{ $data['report'] }}</td>
                                    <td>{{ $data['stock'] }}</td>                                
                                </tr>
                            @endforeach
                            <tr>
                                <td><strong>Total</strong></td>
                                <td>{{ $data['year'] }}</td>
                                <td><strong>{{ $totalEntry }}</strong></td>
                                <td><strong>{{ $totalPriceEntry }}</strong></td>
                                <td><strong>{{ $totalExit }}</strong></td>
                                <td><strong>{{ $totalPriceExit }}</strong></td>
                                <td><strong>{{ $totalReport }}</strong></td>
                                <td><strong>{{ $totalStock}}</strong></td>                            
                            </tr>
                        @endif
                    </tbody>
                    <div class="row mt-3">
                        <div class="col-md-12 text-right">
                            <!-- Add print button -->
                            <button class="btn btn-secondary" onclick="printPage()">Imprimer</button>
                        </div>
                    </div>
                </table>
            </div>
        </div>
    </div>
</div>
<div id="print-container" style="display: none;">
    <div style="display: flex; justify-content: space-between;">
        <img src="{{ asset('img/Police_Algérie.png') }}" width="150" alt="Left Image">
        <img src="{{ asset('img/Police_Algérie.png') }}" width="150" alt="Right Image">
    </div>
    

    <h3 style="text-align: center; font-weight: bold;">Rapport Annuel de Stock de Pharmacy {{ $data['year'] }}</h3>
    <h4 style="text-align: center;">Année: {{ $year }}</h4>

    <div class="col-md-12">
        <div class="card">
            <div class="card-body" style="padding: 8;"> <!-- Remove any padding that might affect the width -->
                <table class="table table-bordered" style="width: 27cm; margin: 0 auto;">
                        <tr>
                            <th>Nom de Produit</th>
                            <th>Anné</th>
                            <th>Entré</th>
                            <th>prix_Entrie</th>
                            <th>Sortie</th>
                            <th>prix_Sortie</th>
                            <th>Report</th>
                            <th>Stock</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if (!empty($reportData))
                            @foreach ($reportData as $data)
                                <tr>
                                    <td>{{ $data['product'] }}</td>
                                    <td>{{ $data['year'] }}</td>
                                    <td>{{ $data['entry'] }}</td>
                                    <td>{{ $data['prix'] }}</td>
                                    <td>{{ $data['exit'] }}</td>
                                    <td>{{ $data['price_exit'] }}</td>
                                    <td>{{ $data['report'] }}</td>
                                    <td>{{ $data['stock'] }}</td>
                                </tr>
                            @endforeach
                            <tr>
                                <td><strong>Total</strong></td>
                                <td>{{ $data['year'] }}</td>
                                <td><strong>{{ $totalEntry }}</strong></td>
                                <td><strong>{{ $totalPriceEntry }}</strong></td>
                                <td><strong>{{ $totalExit }}</strong></td>
                                <td><strong>{{ $totalPriceExit }}</strong></td>
                                <td><strong>{{ $totalReport }}</strong></td>
                                <td><strong>{{ $totalStock}}</strong></td>
                            </tr>
                        @endif
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
<!-- Print-only section for title and report table -->



@endsection
