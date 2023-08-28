<form method="POST" action="{{ route('sales') }}">
    @csrf
    <div class="row form-row">
        <div class="col-12">
            <div class="form-group">
                <label>Stock</label>
                <select class="select2 form-select form-control edit_purchase" name="purchase_id">
                    <option value="" selected disabled>choisir Produit</option>
                    @foreach ($distinctPurchases as $purchase)
                        <option value="{{ $purchase->purchase_id }}" @if ($purchase->purchase_id == old('purchase_id', $sale->purchase_id)) selected @endif>
                            {{ $purchase->name }} - {{ date_format(date_create($purchase->expiry_date), 'd/m/y') }} (Quantitie: {{ $purchase->quantity }})
                        </option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="col-12">
            <div class="form-group">
                <label>Service</label>
                <select class="select2 form-select form-control edit_service" name="service_id">
                    <option value="" selected disabled>Selectionné Service</option>
                    @foreach ($services as $service)
                        <option value="{{ $service->id }}" @if ($service->id == old('service_id', $sale->service_id)) selected @endif>
                            {{ $service->name }}
                        </option>
                    @endforeach
                </select>
            </div>
        </div>
        
        <input type="hidden" name="edit_id" id="edit_id">
        <div class="col-12">
            <div class="form-group">
                <label>Quantitie</label>
                <input type="number" value="1" class="form-control edit_quantity" name="quantity">
            </div>
        </div>
    </div>
    <button type="submit" class="btn btn-primary btn-block">Sauvgarder </button>
</form>
