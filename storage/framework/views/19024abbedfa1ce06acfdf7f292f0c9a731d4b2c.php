<form method="POST" action="<?php echo e(route('reports')); ?>">
    <?php echo csrf_field(); ?>
    <div class="row form-row">
        <div class="col-12">
            <div class="row">
                <div class="col-6">
                    <div class="form-group">
                        <label>de</label>
                        <input type="date" value="<?php echo e(request()->from_date ?? ''); ?>" name="from_date" class="form-control from_date">
                    </div>
                </div>
                <div class="col-6">
                    <div class="form-group">
                        <label>a</label>
                        <input type="date" value="<?php echo e(request()->to_date ?? ''); ?>" name="to_date" class="form-control to_date">
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label>Resource</label>
                <select class="select2 form-control select" name="resource">
                    <option value="services" <?php echo e(request()->resource == "services" ? 'selected' : ''); ?>>Services</option>
                    <option value="purchases" <?php echo e(request()->resource == "purchases" ? 'selected' : ''); ?>>Stocks</option>
                    <option value="sales" <?php echo e(request()->resource == "sales" ? 'selected' : ''); ?>>Sales</option>
                </select>
            </div>
            
        </div>
    </div>
    <button type="submit" class="btn btn-primary btn-block">Search Report</button>
</form><?php /**PATH C:\xampp\htdocs\Pharmacy-Management-System\resources\views/reports/generate.blade.php ENDPATH**/ ?>