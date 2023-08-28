

<?php $__env->startSection('content'); ?>

<style>
    /* Define a media query to hide elements when printing */
    @media  print {
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
                    <h3 class="m-b-10">Annual Stock Report</h3>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-4">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Selectionner  l'année</h5>
                <form action="<?php echo e(route('annual')); ?>" method="POST">
                    <?php echo csrf_field(); ?>
                    <div class="form-group">
                        <label for="year">Selectionner L'année:</label>
                        <input type="number" id="year" name="year" value="<?php echo e(old('year')); ?>" class="form-control" required>
                        <?php $__errorArgs = ['year'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                            <div class="text-danger"><?php echo e($message); ?></div>
                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    </div>
                    <button type="submit" class="btn btn-primary">Generer le  Raport</button>
                </form>
            </div>
        </div>
    </div>
    <div class="col-md-8">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Rapport Annuel de Stock</h5>
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Nom de Produit </th>
                            <th>Année</th>
                            <th>Entrie</th>
                            <th>prix_Entrie</th>
                            <th>Sortie</th>
                            <th>prix_Sortie</th>
                            <th>Report</th>
                            <th>Stock</th>
                        </tr>                    
                    </thead>
                    <tbody>
                        <?php if(!empty($reportData)): ?>
                            <?php $__currentLoopData = $reportData; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td><?php echo e($data['product']); ?></td>
                                    <td><?php echo e($data['year']); ?></td>
                                    <td><?php echo e($data['entry']); ?></td>
                                    <td><?php echo e($data['prix']); ?></td>
                                    <td><?php echo e($data['exit']); ?></td>
                                    <td><?php echo e($data['price_exit']); ?></td>
                                    <td><?php echo e($data['report']); ?></td>
                                    <td><?php echo e($data['stock']); ?></td>                                
                                </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td><strong>Total</strong></td>
                                <td><?php echo e($data['year']); ?></td>
                                <td><strong><?php echo e($totalEntry); ?></strong></td>
                                <td><strong><?php echo e($totalPriceEntry); ?></strong></td>
                                <td><strong><?php echo e($totalExit); ?></strong></td>
                                <td><strong><?php echo e($totalPriceExit); ?></strong></td>
                                <td><strong><?php echo e($totalReport); ?></strong></td>
                                <td><strong><?php echo e($totalStock); ?></strong></td>                            
                            </tr>
                        <?php endif; ?>
                    </tbody>
                    <div class="row mt-3">
                        <div class="col-md-12 text-right">
                            <!-- Add print button -->
                            <button class="btn btn-secondary" onclick="printPage()">Imprimer</button>
                        </div>
                    </div>
                </table>
            </div>
        </div>
    </div>
</div>
<div id="print-container" style="display: none;">
    <div style="display: flex; justify-content: space-between;">
        <img src="<?php echo e(asset('img/Police_Algérie.png')); ?>" width="150" alt="Left Image">
        <img src="<?php echo e(asset('img/Police_Algérie.png')); ?>" width="150" alt="Right Image">
    </div>
    

    <h3 style="text-align: center; font-weight: bold;">Rapport Annuel de Stock de Pharmacy <?php echo e($data['year']); ?></h3>
    <h4 style="text-align: center;">Année: <?php echo e($year); ?></h4>

    <div class="col-md-12">
        <div class="card">
            <div class="card-body" style="padding: 8;"> <!-- Remove any padding that might affect the width -->
                <table class="table table-bordered" style="width: 27cm; margin: 0 auto;">
                        <tr>
                            <th>Nom de Produit</th>
                            <th>Anné</th>
                            <th>Entré</th>
                            <th>prix_Entrie</th>
                            <th>Sortie</th>
                            <th>prix_Sortie</th>
                            <th>Report</th>
                            <th>Stock</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if(!empty($reportData)): ?>
                            <?php $__currentLoopData = $reportData; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td><?php echo e($data['product']); ?></td>
                                    <td><?php echo e($data['year']); ?></td>
                                    <td><?php echo e($data['entry']); ?></td>
                                    <td><?php echo e($data['prix']); ?></td>
                                    <td><?php echo e($data['exit']); ?></td>
                                    <td><?php echo e($data['price_exit']); ?></td>
                                    <td><?php echo e($data['report']); ?></td>
                                    <td><?php echo e($data['stock']); ?></td>
                                </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td><strong>Total</strong></td>
                                <td><?php echo e($data['year']); ?></td>
                                <td><strong><?php echo e($totalEntry); ?></strong></td>
                                <td><strong><?php echo e($totalPriceEntry); ?></strong></td>
                                <td><strong><?php echo e($totalExit); ?></strong></td>
                                <td><strong><?php echo e($totalPriceExit); ?></strong></td>
                                <td><strong><?php echo e($totalReport); ?></strong></td>
                                <td><strong><?php echo e($totalStock); ?></strong></td>
                            </tr>
                        <?php endif; ?>
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
<!-- Print-only section for title and report table -->



<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\Pharmacy-Management-System\resources\views/stock/annual_report.blade.php ENDPATH**/ ?>