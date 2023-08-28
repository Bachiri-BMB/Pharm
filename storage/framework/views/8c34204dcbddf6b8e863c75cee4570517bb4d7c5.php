<?php $__env->startPush('page-css'); ?>
    <!-- Select2 CSS -->
    <link rel="stylesheet" href="<?php echo e(asset('jambasangsang/assets/select2/css/select2.min.css')); ?>">
<?php $__env->stopPush(); ?>

<?php $__env->startSection('content'); ?>
<div class="page-header">
    <div class="page-block">
        <div class="row align-items-center">
            <div class="col-md-9 col-auto">
                <div class="page-header-title">
                    <h3 class="m-b-10">Modifier  Achat</h3>
                </div>
            </div>
            <div class="col-sm-3 col">
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="<?php echo e(route('dashboard')); ?>"><i class="feather icon-home"></i> Dashboard</a></li>
                    <li class="breadcrumb-item active">Modifier  Achats</li>
                </ul>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-sm-12">
        <div class="card">
            <div class="card-header">
                <h5>Modifier  Achat</h5>
                <div class="card-header-right">
                    <a href="<?php echo e(route('purchases')); ?>" class="btn btn-primary float-right">Retour</a>
                    <div class="btn-group card-option">
                        <button type="button" class="btn dropdown-toggle btn-icon" data-toggle="dropdown"
                            aria-haspopup="true" aria-expanded="false">
                            <i class="feather icon-more-horizontal"></i>
                        </button>
                        <ul class="list-unstyled card-option dropdown-menu dropdown-menu-right">
                            <li class="dropdown-item full-card"><a href="#!"><span><i class="feather icon-maximize"></i> maximize</span><span style="display:none"><i class="feather icon-minimize"></i> Restore</span></a></li>
                            <li class="dropdown-item minimize-card"><a href="#!"><span><i class="feather icon-minus"></i> collapse</span><span style="display:none"><i class="feather icon-plus"></i> expand</span></a></li>
                            <li class="dropdown-item reload-card"><a href="#!"><i class="feather icon-refresh-cw"></i> reload</a></li>
                            <li class="dropdown-item close-card"><a href="#!"><i class="feather icon-trash"></i> remove</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="card-body custom-edit-service">
                <!-- Edit Purchase -->
                <form method="post" enctype="multipart/form-data" id="update_service" action="<?php echo e(route('edit-purchase', $purchase->id)); ?>">
                    <?php echo csrf_field(); ?>
                    <?php echo method_field('PUT'); ?>

                    <div class="service-fields mb-3">
                        <div class="row">
                            <div class="col-lg-6 col-md-6">
                                <div class="form-group">
                                    <label>Produit  <span class="text-danger">*</span></label>
                                    <select class="select2 form-select form-control" name="product_id">
                                        <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option <?php if($product->id == $purchase->product_id): ?> selected <?php endif; ?> value="<?php echo e($product->id); ?>"><?php echo e($product->name); ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                </div>
                            </div>

                            <div class="col-lg-6 col-md-6">
                                <div class="form-group">
                                    <label>Fournisseur <span class="text-danger">*</span></label>
                                    <select class="select2 form-select form-control" name="supplier">
                                        <?php $__currentLoopData = $suppliers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $supplier): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option <?php if($supplier->id == $purchase->supplier_id): ?> selected <?php endif; ?> value="<?php echo e($supplier->id); ?>"><?php echo e($supplier->name); ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="service-fields mb-3">
                        <div class="row">
                            <div class="col-lg-6 col-md-6">
                                <div class="form-group">
                                    <label>N_Facture<span class="text-danger">*</span></label>
                                    <input class="form-control" type="text" name="N_Facture" value="<?php echo e($purchase->N_Facture); ?>">
                                </div>
                            </div>

                            <div class="col-lg-6 col-md-6">
                                <div class="form-group">
                                    <label>date_ajoute<span class="text-danger">*</span></label>
                                    <input class="form-control" type="date" name="date" value="<?php echo e($purchase->date); ?>">
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="service-fields mb-3">
                        <div class="row">
                            <div class="col-lg-6 col-md-6">
                                <div class="form-group">
                                    <label>N_Lot<span class="text-danger">*</span></label>
                                    <input class="form-control" type="text" name="N_lot" value="<?php echo e($purchase->N_lot); ?>">
                                </div>
                            </div>

                            <div class="col-lg-6 col-md-6">
                                <div class="form-group">
                                    <label>Prix<span class="text-danger">*</span></label>
                                    <input class="form-control" type="text" name="price" value="<?php echo e($purchase->price); ?>">
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="service-fields mb-3">
                        <div class="row">
                            <div class="col-lg-6 col-md-6">
                                <div class="form-group">
                                    <label>Quantitie<span class="text-danger">*</span></label>
                                    <input class="form-control" type="text" name="quantity" value="<?php echo e($purchase->quantity); ?>">
                                </div>
                            </div>

                            <div class="col-lg-6 col-md-6">
                                <div class="form-group">
                                    <label>Date d'expiration<span class="text-danger">*</span></label>
                                    <input class="form-control" type="date" name="expiry_date" value="<?php echo e($purchase->expiry_date); ?>">
                                </div>
                            </div>
                        </div>
                    </div>

                   
                    <div class="submit-section">
                        <button class="btn btn-primary submit-btn" type="submit" name="form_submit" value="submit">Submit</button>
                    </div>
                </form>
                <!-- /Edit Purchase -->
            </div>
        </div>
    </div>
</div>

<?php $__env->stopSection(); ?>

<?php $__env->startPush('page-js'); ?>
    <!-- Select2 JS -->
    <script src="<?php echo e(asset('jambasangsang/assets/select2/js/select2.min.js')); ?>"></script>
    <script>
        $(document).ready(function() {
            $('.select2').select2().maximizeSelect2Height();
        });
    </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\Pharmacy-Management-System\resources\views/purchases/edit-purchase.blade.php ENDPATH**/ ?>