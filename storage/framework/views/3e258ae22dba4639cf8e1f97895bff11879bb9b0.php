<?php
	$title = "app Setting";
?>

<?php $__env->startSection('content'); ?>
<div class="page-header">
    <div class="page-block">
        <div class="row align-items-center">
            <div class="col-md-9 col-auto">
                <div class="page-header-title">
                    <h3 class="m-b-10">Parametre  General</h3>
                </div>
            </div>
            <div class="col-sm-3 col">
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="<?php echo e(route('dashboard')); ?>"><i class="feather icon-home"></i>
                            Dashboard</a>
                    </li>
                    <li class="breadcrumb-item active">Parametre General</li>
                </ul>
            </div>
        </div>
    </div>
</div>

<?php $__env->startPush('page-css'); ?>
<style>
    .sidebar-img {
  background: url("img/setting_logo.jpg") no-repeat center center fixed;
  -webkit-background-size: contain;
  -moz-background-size: contain;
  -o-background-size: contain;
  background-size: contain;
  background-repeat: no-repeat;
}
</style>
    
<?php $__env->stopPush(); ?>

<div class="row">				
	<div class="col-md-9">
		<?php echo $__env->make('app_settings::_settings', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>	
	</div>
    <div class="col-md-3 sidebar-img">
        
    </div>
</div>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\Pharmacy-Management-System\resources\views/settings/settings.blade.php ENDPATH**/ ?>