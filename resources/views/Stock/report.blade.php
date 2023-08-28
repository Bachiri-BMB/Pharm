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
                    <h3 class="m-b-10">Rapport de  Stock</h3>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-4">
        <div class="card">
            <div class="card-body">
                <h5>Select Product</h5>
                <form action="{{ route('stock-report') }}" method="GET">
                    <div class="form-group">
                        <label for="product">Selectionner Un Product</label>
                        <select name="product_id" id="product" class="form-control">
                            <option value="" selected disabled>Select Product</option>
                            @foreach ($products as $product)
                                <option value="{{ $product->id }}" {{ $selectedProduct && $selectedProduct->id == $product->id ? 'selected' : '' }}>
                                    {{ $product->reference }} - {{ $product->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary">Generate Report</button>
                </form>
            </div>
            
        </div>
    </div>
    <div class="col-md-8">
        <div class="card">
            <div class="card-body">
                @if ($selectedProduct)
                <h5>Rapport de Stock Pour    {{ $selectedProduct->name }}</h5>
                <table class="table">
                    <thead>
                        <tr>
                            <th>Date</th>
                            <th>Entrée au stock</th>
                            <th>Sortie de stock</th>
                            <th>Total de stock</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($stockReport as $report)
                        <tr>
                            <td>{{ date_format(date_create($report['date']), 'd/m/y') }}</td>
                            <td>
                                @if ($report['entrance_stock'] > 0)
                                    <span class="btn btn-sm btn-danger">{{ $report['entrance_stock'] }}</span>
                                @else
                                    {{ $report['entrance_stock'] }}
                                @endif
                            </td>
                                                        <td>{{ $report['sortie_stock'] }}</td>
                            <td>{{ $report['total_stock'] }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                <div class="row mt-3">
                    <div class="col-md-12 text-right">
                        <!-- Add print button -->
                        <button class="btn btn-secondary" onclick="printPage()">Imprimer</button>
                    </div>
                </div>
                @else
                <p>Selectionner un Produit pour generer le rapport.</p>
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
    
    @if ($selectedProduct)

    <h3 style="text-align: center; font-weight: bold;">Rapport de Stock Pour    {{ $selectedProduct->name }}  </h3>
    @endif
<div class="col-md-12">
    <div class="card">
        <div class="card-body" style="padding: 8;"> <!-- Remove any padding that might affect the width -->
                @if ($selectedProduct)
                <h5>Rapport de Stock Pour    {{ $selectedProduct->name }}</h5>
                <table class="table table-bordered" style="width: 27cm; margin: 0 auto;">
                    <thead>
                        <tr>
                            <th>Date</th>
                            <th>Entrée au stock</th>
                            <th>Sortie de stock</th>
                            <th>Total de stock</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($stockReport as $report)
                        <tr>
                            <td>{{ date_format(date_create($report['date']), 'd/m/y') }}</td>
                            <td>
                                @if ($report['entrance_stock'] > 0)
                                    <span class="btn btn-sm btn-danger">{{ $report['entrance_stock'] }}</span>
                                @else
                                    {{ $report['entrance_stock'] }}
                                @endif
                            </td>
                                                        <td>{{ $report['sortie_stock'] }}</td>
                            <td>{{ $report['total_stock'] }}</td>
                        </tr>
                        @endforeach
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

@endsection
