<?php $__env->startPush('page-css'); ?>
    <!-- Select2 CSS -->
    <link rel="stylesheet" href="<?php echo e(asset('jambasangsang/assets/select2/css/select2.min.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('assets/css/bootstrap-datetimepicker.min.css')); ?>">
<?php $__env->stopPush(); ?>

<?php $__env->startSection('content'); ?>
    <div class="page-header">
        <div class="page-block">
            <div class="row align-items-center">
                <div class="col-md-9 col-auto">
                    <div class="page-header-title">
                        <h3 class="m-b-10">Achats de stocks</h3>
                    </div>
                </div>
                <div class="col-sm-3 col">
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="<?php echo e(route('dashboard')); ?>"><i class="feather icon-home"></i>
                                Tableau de bord</a>
                        </li>
                        <li class="breadcrumb-item active">Achats de stock</li>
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
            <!-- Commandes récentes -->
            <div class="card">
                <div class="card-header">
                    <h5>Achats de stock</h5>
                    <div class="card-header-right">
                        <a href="<?php echo e(route('add-purchase')); ?>" class="btn btn-primary float-right">Ajouter nouvelle achat</a>
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
                                                class="feather icon-plus"></i> agrandir</span></a>
                                </li>
                                <li class="dropdown-item reload-card"><a href="#!"><i class="feather icon-refresh-cw"></i>
                                        recharger</a></li>
                                <li class="dropdown-item close-card"><a href="#!"><i class="feather icon-trash"></i>
                                        supprimer</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <input type="text" id="searchInput" class="form-control" placeholder="Rechercher par nom, date ou N_Facture">
                        </div>
                    </div>
                    <div class="table-responsive">
                        <table id="datatable-export" class="table table-hover table-center mb-0">
                            <thead>
                                <tr>
                                    <th>Reference</th>
                                    <th>Nom du médicament</th>
                                    <th>N_Facture</th>
                                    <th>N_lot</th>
                                    <th>Prix Unitaire</th>
                                    <th>Quantité</th>
                                    <th>Fournisseur</th>
                                    <th>Decompete</th>
                                    <th>date_ajoute</th>
                                    <th>Date d'expiration</th>
                                    <th class="action-btn">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $__currentLoopData = $purchases; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $purchase): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr>
                                        <td><?php echo e($purchase->product->reference); ?></td>
                                        <td>
                                            <?php if(!empty($purchase->product->image)): ?>
                                                <span class="avatar avatar-sm mr-2">
                                                    <img class="avatar-img" width="30"
                                                        src="<?php echo e(asset('storage/products/' . $purchase->product->image)); ?>"
                                                        alt="Image du produit">
                                                </span>
                                            <?php endif; ?>
                                                <?php if($purchase->product): ?>
                                                    <?php echo e($purchase->product->name); ?>

                                                <?php else: ?>
                                                    N/A
                                                <?php endif; ?>
                                        </td>                                       
                                        <td><?php echo e($purchase->N_Facture); ?></td>
                                        <td><?php echo e($purchase->N_lot); ?></td>
                                        <td><?php echo e(AppSettings::get('app_currency', 'dz')); ?><?php echo e($purchase->price); ?></td>
                                        <td><?php echo e($purchase->quantity); ?></td>
                                        <td><?php echo e($purchase->supplier->name); ?></td>
                                        <td><?php echo e(AppSettings::get('app_currency', '$')); ?><?php echo e($purchase->price * $purchase->quantity); ?></td>
                                        <td><?php echo e(date('d/m/y', strtotime($purchase->date))); ?></td>
                                        <td><?php echo e(date('d/m/y', strtotime($purchase->expiry_date))); ?></td>
                                        <td>
                                            <div class="actions">
                                                <a class="btn btn-sm btn-info"
                                                    href="<?php echo e(route('edit-purchase', $purchase)); ?>">
                                                    <i class="fe fe-pencil"></i> Modifier
                                                </a>
                                                <a data-id="<?php echo e($purchase->id); ?>" href="javascript:void(0);"
                                                    class="btn btn-sm btn-danger deletebtn" data-toggle="modal">
                                                    <i class="fe fe-trash"></i> Supprimer
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
            <!-- /Commandes récentes -->
        </div>
    </div>
    <!-- Modale de suppression -->
    <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.modals.delete','data' => ['route' => 'purchases','title' => 'Achat']]); ?>
<?php $component->withName('modals.delete'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['route' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute('purchases'),'title' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute('Achat')]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
    <!-- /Modale de suppression -->
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

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\Pharmacy-Management-System\resources\views/purchases/purchases.blade.php ENDPATH**/ ?>