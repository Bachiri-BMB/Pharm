<form method="POST" action="<?php echo e(route('sales')); ?>">
    <?php echo csrf_field(); ?>
    <div class="row form-row">
        <div class="col-12">
            <div class="form-group">
                <label>Stock</label>
                <select class="select2 form-select form-control edit_purchase" name="purchase_id">
                    <option value="" selected disabled>choisir Produit</option>
                    <?php $__currentLoopData = $distinctPurchases; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $purchase): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($purchase->purchase_id); ?>" <?php if($purchase->purchase_id == old('purchase_id', $sale->purchase_id)): ?> selected <?php endif; ?>>
                            <?php echo e($purchase->name); ?> - <?php echo e(date_format(date_create($purchase->expiry_date), 'd/m/y')); ?> (Quantitie: <?php echo e($purchase->quantity); ?>)
                        </option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>
            </div>
        </div>
        <div class="col-12">
            <div class="form-group">
                <label>Service</label>
                <select class="select2 form-select form-control edit_service" name="service_id">
                    <option value="" selected disabled>Selectionné Service</option>
                    <?php $__currentLoopData = $services; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $service): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($service->id); ?>" <?php if($service->id == old('service_id', $sale->service_id)): ?> selected <?php endif; ?>>
                            <?php echo e($service->name); ?>

                        </option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
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
<?php /**PATH C:\xampp\htdocs\Pharmacy-Management-System\resources\views/sales/create.blade.php ENDPATH**/ ?>