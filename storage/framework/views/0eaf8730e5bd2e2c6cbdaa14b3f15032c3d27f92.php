<?php if(Session::has('error')): ?>
<div class="alert alert-danger alert-dismissible fade show" role="alert">
    <strong>Oh Nooo!! 😢</strong> <?php echo e(Session::get('error')); ?>

    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
</div>

<?php elseif(Session::has('success')): ?>
  <div class="alert alert-success alert-dismissible fade show" role="alert">
    <strong>Oh Yess! 👍</strong> <?php echo e(Session::get('success')); ?>

    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
</div>
<?php elseif($errors->any()): ?>
<div class="alert alert-danger alert-dismissible fade show" role="alert">
    <ul>
        <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <li><?php echo e($error); ?></li>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </ul>
    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
</div>
<?php endif; ?>
<?php /**PATH C:\xampp\htdocs\Pharmacy-Management-System\resources\views/flash.blade.php ENDPATH**/ ?>