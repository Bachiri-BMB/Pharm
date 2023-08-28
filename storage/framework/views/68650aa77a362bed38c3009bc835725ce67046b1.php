<?php if( $label = Arr::get($field, 'label') ): ?>
    <label for="<?php echo e(Arr::get($field, 'name')); ?>"><?php echo e($label); ?></label>
<?php endif; ?>
<?php /**PATH C:\xampp\htdocs\Pharmacy-Management-System\vendor\qcod\laravel-app-settings\src/resources/views/fields/_label.blade.php ENDPATH**/ ?>