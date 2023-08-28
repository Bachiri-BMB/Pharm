<div class="<?php echo e(Arr::get($fields, 'section_class', config('app_settings.section_class', 'card'))); ?> section-<?php echo e(Str::slug($fields['title'])); ?>">
    <div class="<?php echo e(Arr::get($fields, 'section_heading_class', config('app_settings.section_heading_class', 'card-header'))); ?>">
        <i class="<?php echo e(Arr::get($fields, 'icon', 'glyphicon glyphicon-flash')); ?>"></i>
        <?php echo e($fields['title']); ?>

    </div>

    <?php if( $desc = Arr::get($fields, 'descriptions') ): ?>
        <div class="pb-0 <?php echo e(config('app_settings.section_body_class', Arr::get($fields, 'section_body_class', 'card-body'))); ?>">
            <p class="text-muted mb-0 "><?php echo e($desc); ?></p>
        </div>
    <?php endif; ?>

    <?php echo e($slot); ?>

</div>
<!-- end card for <?php echo e($fields['title']); ?> -->
<?php /**PATH C:\xampp\htdocs\Pharmacy-Management-System\vendor\qcod\laravel-app-settings\src/resources/views/section.blade.php ENDPATH**/ ?>