<?php $__env->startComponent('app_settings::input_group', compact('field')); ?>

    <br>
    <input type="file"
           name="<?php echo e($field['name']); ?>"
           <?php if( $placeholder = Arr::get($field, 'placeholder') ): ?>
           placeholder="<?php echo e($placeholder); ?>"
           <?php endif; ?>
           class="<?php echo e(Arr::get( $field, 'class')); ?> <?php echo e($errors->has($field['name']) ? config('app_settings.input_invalid_class', 'is-invalid') : ''); ?>"
           <?php if( $styleAttr = Arr::get($field, 'style')): ?> style="<?php echo e($styleAttr); ?>" <?php endif; ?>
           id="<?php echo e(Arr::get($field, 'name')); ?>"
    >

    <?php if( $filePath = \setting($field['name'])): ?>
        <label class="text-danger" style="float:right; font-size: 0.8rem">
            <input type="checkbox" value="1" name="remove_file_<?php echo e($field['name']); ?>">
            <?php echo e(Arr::get($field, 'remove_label', 'Remove')); ?>

        </label>
        <?php $fileUrl = \Storage::disk(Arr::get($field, 'disk', 'public'))->url($filePath) ?>
        <?php if(in_array(pathinfo($filePath, PATHINFO_EXTENSION), ["gif", "jpg", "jpeg", "png", "tiff", "tif"])): ?>
            <a href="<?php echo e($fileUrl); ?>" target="_blank">
                <img src="<?php echo e($fileUrl); ?>" alt="<?php echo e($field['name']); ?>" class="<?php echo e(Arr::get( $field, 'preview_class')); ?>" style="<?php echo e(Arr::get($field, 'preview_style')); ?>"/>
            </a>
        <?php else: ?>
            <a target="_blank" class="btn btn-light btn-sm" href="<?php echo e($fileUrl); ?>">View <?php echo e($field['label']); ?></a>
        <?php endif; ?>
    <?php endif; ?>

<?php echo $__env->renderComponent(); ?>
<?php /**PATH C:\xampp\htdocs\Pharmacy-Management-System\vendor\qcod\laravel-app-settings\src/resources/views/fields/_file.blade.php ENDPATH**/ ?>