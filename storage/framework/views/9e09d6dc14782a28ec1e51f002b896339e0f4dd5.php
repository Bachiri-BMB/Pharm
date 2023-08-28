<?php if($hint = Arr::get($field, 'hint')): ?>
    <small class="<?php echo e(Arr::get($field, 'input_hint_class', config('app_settings.input_hint_class', ''))); ?>">
       <?php echo e($hint); ?>

    </small>
<?php endif; ?>

<?php if($errors->has($field['name'])): ?>
    <small class="<?php echo e(config('app_settings.input_error_feedback_class', 'invalid-feedback')); ?>">
        <?php echo e($errors->first($field['name'])); ?>

    </small>
<?php endif; ?>
<?php /**PATH C:\xampp\htdocs\Pharmacy-Management-System\vendor\qcod\laravel-app-settings\src/resources/views/fields/_hint.blade.php ENDPATH**/ ?>