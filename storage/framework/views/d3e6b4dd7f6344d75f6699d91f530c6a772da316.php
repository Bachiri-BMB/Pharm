<?php $attributes = $attributes->exceptProps(['route'=>$route,'title'=>$title]); ?>
<?php foreach (array_filter((['route'=>$route,'title'=>$title]), 'is_string', ARRAY_FILTER_USE_KEY) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
} ?>
<?php $__defined_vars = get_defined_vars(); ?>
<?php foreach ($attributes as $__key => $__value) {
    if (array_key_exists($__key, $__defined_vars)) unset($$__key);
} ?>
<?php unset($__defined_vars); ?>

<!-- Delete Modal -->
<div class="modal fade" id="deleteConfirmModal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="acc_title">Delete <?php echo e($title); ?></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?php echo e(route($route)); ?>" method="post">  
                <?php echo csrf_field(); ?>
                <?php echo method_field("DELETE"); ?>
                <div class="modal-body">
                    <p id="acc_msg">Are you sure you want to delete ?</p>
                    <input type="hidden" name="id" id="delete_id">
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-success si_accept_confirm">Yes</button>
                    <button type="button" class="btn btn-danger si_accept_cancel" data-dismiss="modal">Cancel</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- /Delete Modal --><?php /**PATH C:\xampp\htdocs\Pharmacy-Management-System\resources\views/components/modals/delete.blade.php ENDPATH**/ ?>