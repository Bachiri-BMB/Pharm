

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
                    <h3 class="m-b-10">Annual Category Report</h3>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-4">
        <div class="card">
            <div class="card-body">
                <h5>Select Year</h5>
                <form action="<?php echo e(route('annual-category-report')); ?>" method="POST">
                    <?php echo csrf_field(); ?>
                    <div class="form-group">
                        <label for="year">Select Year</label>
                        <input type="number" id="year" name="year" class="form-control" value="<?php echo e($selectedYear); ?>" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Generate Report</button>
                </form>
            </div>
        </div>
    </div>
    <div class="col-md-8">
        <div class="card">
            <div class="card-body">
                <h5>Category Report for <?php echo e($selectedYear); ?></h5>
                <table class="table">
                    <thead>
                        <tr>
                            <th>Categorie</th>
                            <th>Anné</th>
                            <th>Prix Total Entré </th>
                            <th>Prix total Sortie</th>
                            <th>Prix Stock</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $__currentLoopData = $categoryReport; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <td><?php echo e($data['category']); ?></td>
                            <td><?php echo e($data['year']); ?></td>
                            <td><?php echo e($data['entry']); ?></td>
                            <td><?php echo e($data['exit']); ?></td>
                            <td><?php echo e($data['stock']); ?></td>
                        </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <td><strong>Total</strong></td>
                            <td><?php echo e($data['year']); ?></td>
                            <td><strong><?php echo e($totalEntry); ?></strong></td>
                            <td><strong><?php echo e($totalExit); ?></strong></td>
                            <td><strong><?php echo e($totalStock); ?></strong></td>

                        </tr>
                    </tbody>

                </table>
                <div class="row mt-3">
                    <div class="col-md-12 text-right">
                        <!-- Add print button -->
                        <button class="btn btn-secondary" onclick="printPage()">Imprimer</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div id="print-container" style="display: none;">
    <div style="display: flex; justify-content: space-between;">
        <img src="<?php echo e(asset('img/Police_Algérie.png')); ?>" width="150" alt="Left Image">
        <img src="<?php echo e(asset('img/Police_Algérie.png')); ?>" width="150" alt="Right Image">
    </div>
    

    <h3 style="text-align: center; font-weight: bold;">Rapport Annuel de Stock Par Categories de Pharmacy <?php echo e($data['year']); ?></h3>

    <div class="col-md-12">
        <div class="card">
            <div class="card-body" style="padding: 8;"> <!-- Remove any padding that might affect the width -->
                <table class="table table-bordered" style="width: 27cm; margin: 0 auto;">
                    <thead>
                        <tr>
                            <th>Categorie</th>
                            <th>Anné</th>
                            <th>Prix Total Entré </th>
                            <th>Prix total Sortie</th>
                            <th>Prix Stock</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $__currentLoopData = $categoryReport; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <td><?php echo e($data['category']); ?></td>
                            <td><?php echo e($data['year']); ?></td>
                            <td><?php echo e($data['entry']); ?></td>
                            <td><?php echo e($data['exit']); ?></td>
                            <td><?php echo e($data['stock']); ?></td>
                        </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <td><strong>Total</strong></td>
                            <td><?php echo e($data['year']); ?></td>
                            <td><strong><?php echo e($totalEntry); ?></strong></td>
                            <td><strong><?php echo e($totalExit); ?></strong></td>
                            <td><strong><?php echo e($totalStock); ?></strong></td>

                        </tr>
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

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\Pharmacy-Management-System\resources\views/Stock/annual_category_report.blade.php ENDPATH**/ ?>