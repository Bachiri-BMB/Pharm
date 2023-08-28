<?php $__env->startPush('page-css'); ?>
    <!-- Select2 CSS -->
    <link rel="stylesheet" href="<?php echo e(asset('jambasangsang/assets/select2/css/select2.min.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('assets/css/bootstrap-datetimepicker.min.css')); ?>">
<?php $__env->stopPush(); ?>

<?php $__env->startSection('content'); ?>
    <div class="page-header">
        <!-- ... (rest of the content) ... -->
    </div>
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <!-- ... (rest of the content) ... -->
                <div class="card-body custom-edit-service">
                    <!-- Ajouter un médicament -->
                    <form method="post" enctype="multipart/form-data" autocomplete="off" action="<?php echo e(route('store-stock')); ?>">
                        <?php echo csrf_field(); ?>
                        <?php if($errors->any()): ?>
                            <h4><?php echo e($errors->first()); ?></h4>
                          <?php endif; ?>

                        <div class="service-fields mb-3">
                            <div class="row">
                                <div class="col-lg-6 col-auto">
                                    <div class="form-group">
                                        <label>Numéro de Facture<span class="text-danger">*</span></label>
                                        <input class="form-control" type="text" name="N_Facture" required>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-auto">
                                    <div class="form-group">
                                        <label>Produit <span class="text-danger">*</span></label>
                                        <select class="select2-medicaments form-select form-control" name="product_id"
                                            required>
                                            <option value="" selected disabled>Choisir un médicament*</option>
                                            <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <option value="<?php echo e($product->id); ?>"><?php echo e($product->name); ?></option>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>


                        <div class="service-fields mb-3">
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label>Quantité<span class="text-danger">*</span></label>
                                        <input class="form-control" type="text" name="quantity" required>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label>Date d'expiration<span class="text-danger">*</span></label>
                                        <input class="form-control" type="date" name="expiry_date" required>
                                    </div>
                                </div>
                            </div>
                        </div>
                        



                        <div class="service-fields mb-3">
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label>Numéro de Lot<span class="text-danger">*</span></label>
                                        <input class="form-control" type="text" name="N_lot" required>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label>Date<span class="text-danger">*</span></label>
                                        <input class="form-control" type="date" name="date" required>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="service-fields mb-3">
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label>Prix d'achat<span class="text-danger">*</span></label>
                                        <input class="form-control" type="text" name="price" required>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label>Fournisseur <span class="text-danger">*</span></label>
                                        <select class="select2-fournisseur form-select form-control" name="supplier"
                                            required>
                                            <option value="" selected disabled>Sélectionnez un fournisseur</option>
                                            <?php $__currentLoopData = $suppliers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $supplier): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <option value="<?php echo e($supplier->id); ?>"><?php echo e($supplier->name); ?></option>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>

                       

                        <div class="submit-section">
                            <button class="btn btn-primary submit-btn" type="submit">Soumettre</button>
                        </div>
                    </form>
                    <!-- /Ajouter un médicament -->
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('page-js'); ?>
    <!-- Datetimepicker JS -->
    <script src="<?php echo e(asset('assets/js/moment.min.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/js/bootstrap-datetimepicker.min.js')); ?>"></script>
    <!-- Select2 JS -->
    <script src="<?php echo e(asset('jambasangsang/assets/select2/js/select2.min.js')); ?>"></script>
    <script>
        $(document).ready(function () {
            // Initialize Select2 for the "Médicaments" dropdown
            $('.select2-medicaments').select2({
                placeholder: 'Sélectionnez un médicament',
                allowClear: true,
            });

            // Initialize Select2 for the "Fournisseur" dropdown
            $('.select2-fournisseur').select2({
                placeholder: 'Sélectionnez un fournisseur',
                allowClear: true,
            });
        });
    </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\Pharmacy-Management-System\resources\views/purchases/add-purchase.blade.php ENDPATH**/ ?>