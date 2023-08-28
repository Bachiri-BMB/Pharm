<?php $__env->startPush('page-css'); ?>
    <!-- Select2 css-->
    <link rel="stylesheet" href="<?php echo e(asset('jambasangsang/assets/select2/css/select2.min.css')); ?>">
<?php $__env->stopPush(); ?>

<?php $__env->startPush('page-header'); ?>
    <div class="col-sm-7 col-auto">
        <h3 class="page-title">Rapports</h3>
        <ul class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?php echo e(route('dashboard')); ?>">Tableau de bord</a></li>
            <li class="breadcrumb-item active">Générer des rapports</li>
        </ul>
    </div>
    <div class="col-sm-5 col">
        <a href="#generate_report" data-toggle="modal" class="btn btn-primary float-right mt-2">Générer un rapport</a>
    </div>
<?php $__env->stopPush(); ?>

<?php $__env->startSection('content'); ?>
    <div class="page-header">
        <div class="page-block">
            <div class="row align-items-center">
                <div class="col-md-9 col-auto">
                    <div class="page-header-title">
                        <h3 class="m-b-10">Rapports</h3>
                    </div>
                </div>
                <div class="col-sm-3 col">
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="<?php echo e(route('dashboard')); ?>"><i class="feather icon-home"></i>
                                Tableau de bord</a>
                        </li>
                        <li class="breadcrumb-item active">Rapports</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-8">
            <div class="card">
                <div class="card-header">
                    <h5><?php echo e(request()->resource == 'services' ? 'services' : (request()->resource == 'purchases'? "Stocks" : (request()->resource == 'sales'? "Ventes" : '' ))); ?> Rapports</h5>
                    <div class="card-header-right">
                        
                            
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

                        <?php if(isset($sales)): ?>
                        <div class="dash-widget-header">
                            <span class="dash-widget-icon text-primary border-primary">
                                <i class="fe fe-money"></i>
                            </span>
                            <div class="dash-count">
                                <h3><?php echo e(AppSettings::get('app_currency', '$')); ?> <?php echo e($total_cash); ?></h3>
                            </div>
                        </div>
                        <div class="dash-widget-info">
                            <h6 class="text-muted">Total des revenus</h6>
                            <div class="progress progress-sm">
                                <div class="progress-bar bg-primary w-50"></div>
                            </div>
                        </div>
                                        <div class="dash-widget-header">
                                            <span class="dash-widget-icon text-success">
                                                <i class="fe fe-activity"></i>
                                            </span>
                                            <div class="dash-count">
                                                <h3><?php echo e($total_sales); ?></h3>
                                            </div>
                                        </div>
                                        <div class="dash-widget-info">

                                            <h6 class="text-muted">Total des ventes</h6>
                                            <div class="progress progress-sm">
                                                <div class="progress-bar bg-success w-50"></div>
                                            </div>
                                        </div>
                            <hr>
                        <?php endif; ?>

                <div class="col-md-12">
                    <?php if(isset($sales)): ?>
                        <!--  Ventes -->

                                <div class="table-responsive">
                                    <table id="datatable-export" class="table table-hover table-center mb-0">
                                        <thead>
                                            <tr>
                                                <tr>
                                                    <th>Nom de Medicament</th>
                                                    <th>N_Facture</th>
                                                    <th>Date Retire</th>
                                                    <th>Service</th>
                                                    <th>quantity</th>

                                                    <th>Prix Total</th>
                                                    <th>Date Expiration</th>
                                                </tr>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $__currentLoopData = $sales; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $sale): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <tr>
                                                <td>
                                                    <?php if($sale->purchase_id && $sale->purchase && $sale->purchase->product): ?>
                                                        <?php echo e($sale->purchase->product->name); ?>

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
                                                        <?php echo e(date_format(date_create($sale->purchase->date), 'd/m/y')); ?>

                                                    <?php else: ?>
                                                        N/A
                                                    <?php endif; ?>
                                                </td>
                                                <td><?php echo e($sale->services->name ?? 'N/A'); ?></td>
                                                <td> <?php echo e($sale->quantity); ?></td>

                                                <td><?php echo e(AppSettings::get('app_currency', 'dz')); ?> <?php echo e($sale->total_price); ?></td>
                                                <td>
                                                    <?php if($sale->purchase_id && $sale->purchase): ?>
                                                        <?php echo e(date_format(date_create($sale->purchase->expiry_date), 'd/m/y')); ?>

                                                    <?php else: ?>
                                                        N/A
                                                    <?php endif; ?>
                                                </td>
                                                
                                        </tbody>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </table>
                                </div>
                        <!-- / ventes -->
                    <?php endif; ?>

                    <?php if(isset($services)): ?>
                    <!-- Services -->
                    <div class="table-responsive">
                        <table id="datatable-export" class="table table-hover table-center mb-0">
                            <thead>
                                <tr>
                                    <th>Nom du service</th>
                                    <th>Total Medicament</th>
                                    <th>Prix Total</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $__currentLoopData = $services; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $service): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr>
                                        <td>
                                            <?php echo e($service->name); ?> 
                                        </td>
                                        <td>
                                            <?php echo e($service->totalSales); ?> 
                                        </td>
                                        <td>
                                            <?php echo e($service->totalPrice); ?> 
                                        </td>
                                      
                                    </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </tbody>
                        </table>
                    </div>
                    <!-- /Services -->
                <?php endif; ?>
                

                    <?php if(isset($purchases)): ?>
                        <!-- Achats-->
                                <div class="table-responsive">
                                    <table id="datatable-export" class="table table-hover table-center mb-0">
                                        <thead>
                                            <tr>
                                                <th>Nom du médicament</th>
                                                <th>N_Facture</th>
                                                <th>N_lot</th>
                                                <th>Prix Unitaire</th>
                                                <th>Quantité Initital</th>
                                                <th>Quantité Reste</th>
                                                <th>Fournisseur</th>
                                                <th>Decompete</th>
                                                <th>date_ajoute</th>
                                                <th>Date d'expiration</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $__currentLoopData = $purchases; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $purchase): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <tr>
                                                    <td>
                                                        <?php if(!empty($purchase->image)): ?>
                                                            <span class="avatar avatar-sm mr-2">
                                                                <img class="avatar-img" width="30"
                                                                    src="<?php echo e(asset('storage/purchases/' . $purchase->image)); ?>"
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
                                                    <td><?php echo e($purchase->initial_quantity); ?></td>
                                                    <td><?php echo e($purchase->quantity); ?></td>
                                                    <td><?php echo e($purchase->supplier->name); ?></td>
                                                    <td><?php echo e(AppSettings::get('app_currency', '$')); ?><?php echo e($purchase->price * $purchase->quantity); ?></td>
                                                    <td><?php echo e(date('d/m/y', strtotime($purchase->date))); ?></td>
                                                    <td><?php echo e(date('d/m/y', strtotime($purchase->expiry_date))); ?></td>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                        </tbody>
                                    </table>
                                </div>

                        <!-- /Achats -->
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>

            <div class="col-md-4">
                <div class="card">
                    <div class="card-header">
                        <h5>Générer un rapport</h5>
                        <div class="card-header-right">
                            <a href="#" id="add_new" class="btn btn-primary float-right ">Ajouter</a>
                        </div>
                    </div>
                    <div class="card-body">
                        <?php echo $__env->make('reports.generate', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    </div>
                </div>
            </div>
    </div>

<?php $__env->stopSection(); ?>

<?php $__env->startPush('page-js'); ?>
   <!-- Select2 js-->
   <script src="<?php echo e(asset('jambasangsang/assets/select2/js/select2.min.js')); ?>"></script>
<script>
    $(document).ready(function() {
        $('.select2').select2();
    });

    $('#add_new').on('click', function() {
        event.preventDefault();
        $(".select").val('').trigger('change');
        $('.to_date').val('');
        $('.from_date').val('');
    });
</script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\Pharmacy-Management-System\resources\views/reports/reports.blade.php ENDPATH**/ ?>