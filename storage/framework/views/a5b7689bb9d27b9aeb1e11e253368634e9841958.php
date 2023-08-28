<?php $__env->startPush('page-css'); ?>
    <!-- Add your page-specific CSS here -->
<?php $__env->stopPush(); ?>

<?php $__env->startSection('content'); ?>
    <div class="page-header">
        <div class="page-block">
            <div class="row align-items-center">
                <div class="col-md-9 col-auto">
                    <div class="page-header-title">
                        <h3 class="m-b-10"><?php echo e($title); ?></h3>
                    </div>
                </div>
                <div class="col-sm-3 col">
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="<?php echo e(route('products')); ?>">Products</a></li>
                        <li class="breadcrumb-item active"><?php echo e($title); ?></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">

            <!-- Table for expired products -->
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered table-hover table-center mb-0">
                            <thead>
                                <tr>
                                    <th>Nom</th>
                                    <th>Categorie</th>
                                    <th>Prix</th>
                                    <th>Quantitie</th>
                                    <th>DATE D'EXPIRATION	</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr>
                                        <td><?php echo e($product->product->name); ?></td>
                                        <td><?php echo e($product->product->category->name); ?></td>
                                        <td><?php echo e($product->price); ?>DA</td>
                                        <td><?php echo e($product->quantity); ?></td>
                                        <td><?php echo e($product->expiry_date); ?></td>
                                        <td>
                                            <div class="actions">
                                                <a class="btn btn-sm btn-info" href="<?php echo e(route('edit-product', $product->product)); ?>">
                                                    <i class="fe fe-pencil"></i> Edit
                                                </a>
                                                <a data-id="<?php echo e($product->product->id); ?>" href="javascript:void(0);" class="btn btn-sm btn-danger deletebtn" data-toggle="modal">
                                                    <i class="fe fe-trash"></i> Delete
                                                </a>
                                            </div>
                                        </td>
                                    </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <!-- /Table for expired products -->

        </div>
    </div>

    <!-- Delete Modal -->
    <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.modals.delete','data' => ['route' => 'products','title' => 'Expired Product']]); ?>
<?php $component->withName('modals.delete'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['route' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute('products'),'title' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute('Expired Product')]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
    <!-- /Delete Modal -->
<?php $__env->stopSection(); ?>

<?php $__env->startPush('page-js'); ?>
    <!-- Add your page-specific JavaScript here -->
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\Pharmacy-Management-System\resources\views/products/expired.blade.php ENDPATH**/ ?>