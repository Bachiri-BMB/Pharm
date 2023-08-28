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
                    <h3 class="m-b-10">Ajouter  Vente</h3>
                </div>
            </div>
            <div class="col-sm-3 col">                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="<?php echo e(route('dashboard')); ?>"><i class="feather icon-home"></i>
                            Dashboard</a>
                    </li>
                    <li class="breadcrumb-item active">Ajouter Vente</li>
                </ul>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-8">
        <!-- Recent Sales -->
        <div class="card">
            <div class="card-header">
                <h5>ventes Ajouter</h5>
                <div class="card-header-right">
                    <div class="btn-group card-option">
                        <button type="button" class="btn dropdown-toggle btn-icon" data-toggle="dropdown"
                            aria-haspopup="true" aria-expanded="false">
                            <i class="feather icon-more-horizontal"></i>
                        </button>
                        <ul class="list-unstyled card-option dropdown-menu dropdown-menu-right">
                            <li class="dropdown-item full-card"><a href="#!"><span><i class="feather icon-maximize"></i>
                                        maximize</span><span style="display:none"><i class="feather icon-minimize"></i>
                                        Restore</span></a>
                            </li>
                            <li class="dropdown-item minimize-card"><a href="#!"><span><i
                                            class="feather icon-minus"></i> collapse</span><span style="display:none"><i
                                            class="feather icon-plus"></i> expand</span></a></li>
                            <li class="dropdown-item reload-card"><a href="#!"><i class="feather icon-refresh-cw"></i>
                                    reload</a></li>
                            <li class="dropdown-item close-card"><a href="#!"><i class="feather icon-trash"></i>
                                    remove</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <div class="col-md-6">
                        <input type="text" id="searchInput" class="form-control" placeholder="Rechercher par nom, date ou N_Facture">
                    </div>
                    
                    <table id="datatable-export" class="table table-hover table-center mb-0">
                        <thead>
                            <tr>
                                <th>Nom de Medicament</th>
                                <th>N_Facture</th>
                                <th>Date Retire</th>
                                <th>Service</th>
                                <th>Total Price</th>
                                <th>Date Expiration</th>
                                <th class="action-btn">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $__currentLoopData = $sales; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $sale): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td>
                                    <?php if($sale->purchase_id && $sale->purchase && $sale->purchase->product): ?>
                                    <span class="avatar avatar-sm mr-2">
                                        <img class="avatar-img" width="30"
                                            src="<?php echo e(asset('storage/products/' . $sale->purchase->product->image)); ?>"
                                            alt="Image du produit">
                                    </span><?php echo e($sale->purchase->product->name); ?>

                                    <?php else: ?>
                                        N/A
                                    <?php endif; ?>
                                </td>
                                <td>
                                    <?php if($sale->purchase_id && $sale->purchase): ?>
                                        <?php echo e($sale->purchase->N_Facture); ?>

                                    <?php else: ?>
                                        N/A
                                    <?php endif; ?>
                                </td>
                                <td>
                                    <?php if($sale->purchase_id && $sale->purchase): ?>
                                        <?php echo e(date_format(date_create($sale->purchase->date), 'd M, Y')); ?>

                                    <?php else: ?>
                                        N/A
                                    <?php endif; ?>
                                </td>
                                <td><?php echo e($sale->services->name ?? 'N/A'); ?></td>
                                <td><?php echo e(AppSettings::get('app_currency', 'dz')); ?> <?php echo e($sale->total_price); ?></td>
                                <td>
                                    <?php if($sale->purchase_id && $sale->purchase): ?>
                                        <?php echo e(date_format(date_create($sale->purchase->expiry_date), 'd M, Y')); ?>

                                    <?php else: ?>
                                        N/A
                                    <?php endif; ?>
                                </td>
                                <td>
                                    <div class="actions">
                                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('update-sales')): ?>
                                            <?php if( $sale->purchase && $sale->purchase->quantity != 0): ?>
                                            <a data-id="<?php echo e($sale->id); ?>"
                                                data-product="<?php echo e($sale->purchase_id); ?>"
                                                data-quantity="<?php echo e($sale->quantity); ?>"
                                                class="btn btn-sm btn-info editbtn" href="javascript:void(0);">
                                                <i class="fe fe-pencil"></i> Edit
                                            </a>
                                            <?php else: ?>
                                                <label class="badge badge-danger"> Out of Stock</label>
                                            <?php endif; ?>
                                        <?php endif; ?>
                                
                                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('destroy-sales')): ?>
                                            <a data-id="<?php echo e($sale->id); ?>" href="javascript:void(0);"
                                                class="btn btn-sm btn-danger deletebtn" data-toggle="modal">
                                                <i class="fe fe-trash"></i> Delete
                                            </a>
                                        <?php endif; ?>
                                    </div>
                                </td>
                                
                                    </tr>
                                
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <!-- /Recent sales -->
    </div>
    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('create-sales')): ?>
    <div class="col-md-4">
        <div class="card">
            <div class="card-header">
                <h5>Add Sale</h5>
                <div class="card-header-right">
                    <a href="#" id="add_new" class="btn btn-primary float-right">Add New</a>
                </div>
            </div>
            <div class="card-body">
                <?php echo $__env->make('sales.create', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            </div>
        </div>
    </div>
    <?php endif; ?>
</div>
<!-- Delete Modal -->
<?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.modals.delete','data' => ['route' => 'sales','title' => 'Product Sale']]); ?>
<?php $component->withName('modals.delete'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['route' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute('sales'),'title' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute('Product Sale')]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
<!-- /Delete Modal -->
<?php $__env->stopSection(); ?>

<?php $__env->startPush('page-js'); ?>
    <!-- Select2 js -->
    <script src="<?php echo e(asset('jambasangsang/assets/select2/js/select2.min.js')); ?>"></script>
    <script>
        $(document).ready(function() {


            $('#datatable-export').on('click', '.editbtn', function() {
                event.preventDefault();
                var id = $(this).data('id');
                var product = $(this).data('product');
                var quantity = $(this).data('quantity');
                $('#edit_id').val(id);
                $(".edit_product").val(product).trigger('change');
                console.log(product)
                $('.edit_quantity').val(quantity);
                $('.btn-block').text("Update Changes");

            });

            $('#add_new').on('click', function() {
                event.preventDefault();
                $('#edit_id').val('');
                $(".edit_product").val('').trigger('change');
                $('.edit_quantity').val(1);
                $('.btn-block').text("Save Changes");

            });
        });
        $(document).ready(function () {
            $("#searchInput").on("keyup", function () {
                var value = $(this).val().toLowerCase();
                $("#datatable-export tbody tr").filter(function () {
                    $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
                });
            });
        });

</script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\Pharmacy-Management-System\resources\views/sales/sales.blade.php ENDPATH**/ ?>