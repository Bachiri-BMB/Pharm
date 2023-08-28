<div class="<?php echo e(Arr::get( $field, 'input_wrapper_class', config('app_settings.input_wrapper_class', 'form-group'))); ?> <?php echo e($errors->has($field['name']) ? Arr::get( $field, 'input_error_class', config('app_settings.input_error_class', 'has-danger')) : ''); ?>">
    <?php echo $__env->make('app_settings::fields._label', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <?php echo e($slot); ?>


    <?php echo $__env->make('app_settings::fields._hint', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
</div>
<?php /**PATH C:\xampp\htdocs\Pharmacy-Management-System\vendor\qcod\laravel-app-settings\src/resources/views/input_group.blade.php ENDPATH**/ ?>