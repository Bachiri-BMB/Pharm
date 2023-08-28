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
                    <h3 class="m-b-10">Médicaments</h3>
                </div>
            </div>
            <div class="col-sm-3 col">
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="<?php echo e(route('dashboard')); ?>"><i class="feather icon-home"></i>
                            Tableau de bord</a>
                    </li>
                    <li class="breadcrumb-item active">Médicaments</li>
                </ul>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <input type="text" id="searchInput" class="form-control mb-3" placeholder="Rechercher un médicament">
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <!-- Produits -->
        <div class="card">
            <div class="card-header">
                <h5>Médicaments</h5>
                <div class="card-header-right">
                    <a href="<?php echo e(route('add-product')); ?>" class="btn btn-primary float-right">Ajouter un nouveau</a>
                    <div class="btn-group card-option">
                        <button type="button" class="btn dropdown-toggle btn-icon" data-toggle="dropdown"
                            aria-haspopup="true" aria-expanded="false">
                            <i class="feather icon-more-horizontal"></i>
                        </button>
                        <ul class="list-unstyled card-option dropdown-menu dropdown-menu-right">
                            <li class="dropdown-item full-card"><a href="#!"><span><i class="feather icon-maximize"></i>
                                        agrandir</span><span style="display:none"><i class="feather icon-minimize"></i>
                                        Restaurer</span></a>
                            </li>
                            <li class="dropdown-item minimize-card"><a href="#!"><span><i
                                            class="feather icon-minus"></i> réduire</span><span style="display:none"><i
                                            class="feather icon-plus"></i> agrandir</span></a></li>
                            <li class="dropdown-item reload-card"><a href="#!"><i class="feather icon-refresh-cw"></i>
                                    recharger</a></li>
                            <li class="dropdown-item close-card"><a href="#!"><i class="feather icon-trash"></i>
                                    supprimer</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table id="datatable-export" class="table table-hover table-center mb-0">
                        <thead>
                            <tr>
                                <th>reference</th>
                                <th>Nom du médicament</th>
                                <th>minimum_stock</th>

                                <th>Catégorie</th>
                                <th class="action-btn">Action</th>
                            </tr>
                        </thead>
                        <tbody>

                            <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td>
                                       
                                        <?php echo e($product->reference); ?>

                                    </td>
                                    <td>
                                        <?php if(!empty($product->image)): ?>
                                            <span class="avatar avatar-sm mr-2">
                                                <img class="avatar-img" width="30"
                                                    src="<?php echo e(asset('storage/products/' . $product->image)); ?>"
                                                    alt="Image du produit">
                                            </span>
                                        <?php endif; ?>
                                                <?php echo e($product->name); ?>

                                          
                                    </td>
                                    <td><?php echo e($product->nmbr_min_stock); ?>

                                    <td><?php echo e($product->category->name); ?></td>
                                
                                    <td>
                                            <a class="btn btn-sm btn-info" href="<?php echo e(route('edit-product',$product)); ?>">
                                                <i class="fe fe-pencil"></i> Modifier
                                            </a>
                                    </td>
                                    <td>
                                            <form action="<?php echo e(route('products.destroy', ['id' => $product->id])); ?>" method="POST">
                                                <?php echo csrf_field(); ?>
                                                <?php echo method_field('DELETE'); ?>
                                                <button type="submit" class="btn btn-danger">Supprimer</button>
                                            </form>
                                            
                                           
                                    </td>
                                </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <!-- /Produits -->

    </div>
</div>

<!-- Modal Suppression -->
<?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.modals.delete','data' => ['route' => 'products','title' => 'Produit']]); ?>
<?php $component->withName('modals.delete'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['route' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute('products'),'title' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute('Produit')]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
<!-- /Modal Suppression -->
<?php $__env->stopSection(); ?>








<?php $__env->startPush('page-js'); ?>
    <!-- Select2 JS -->
    <script src="<?php echo e(asset('assets/plugins/select2/js/select2.min.js')); ?>"></script>
    <script>
        // Function to filter the table based on search input
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

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\Pharmacy-Management-System\resources\views/products/products.blade.php ENDPATH**/ ?>