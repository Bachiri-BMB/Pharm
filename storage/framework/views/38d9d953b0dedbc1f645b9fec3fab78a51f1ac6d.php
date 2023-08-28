<?php $__env->startPush('page-css'); ?>
	<!-- Select2 CSS -->
	<link rel="stylesheet" href="<?php echo e(asset('assets/plugins/select2/css/select2.min.css')); ?>">
<?php $__env->stopPush(); ?>

<?php $__env->startPush('page-header'); ?>
<div class="col-sm-7 col-auto">
	<h3 class="page-title">Backups</h3>
	<ul class="breadcrumb">
		<li class="breadcrumb-item"><a href="<?php echo e(route('dashboard')); ?>">Dashboard</a></li>
		<li class="breadcrumb-item active">App Backups</li>
	</ul>
</div>
<div class="col-sm-5 col">
    <form action="<?php echo e(route('backup.store')); ?>" method="post">
        <?php echo csrf_field(); ?>
        <?php echo method_field("PUT"); ?>
        <button class="btn btn-primary float-right mt-2" type="submit">Create Backup</button>
    </form>
	
</div>

<?php $__env->stopPush(); ?>

<?php $__env->startSection('content'); ?>
<div class="page-header">
    <div class="page-block">
        <div class="row align-items-center">
            <div class="col-md-9 col-auto">
                <div class="page-header-title">
                    <h3 class="m-b-10">Backups</h3>
                </div>
            </div>
            <div class="col-sm-3 col">
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="<?php echo e(route('dashboard')); ?>"><i class="feather icon-home"></i>
                            Dashboard</a>
                    </li>
                    <li class="breadcrumb-item active">Create Backup</li>
                </ul>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h5>Users</h5>
                <form action="<?php echo e(route('backup.store')); ?>" method="post">
                    <?php echo csrf_field(); ?>
                    <?php echo method_field("PUT"); ?>
                    <button class="btn btn-primary float-right mt-2" type="submit">Create Backup</button>
                </form>
                <div class="card-header-right">
                    <div class="btn-group card-option">
                        <button type="button" class="btn dropdown-toggle btn-icon" data-toggle="dropdown"
                            aria-haspopup="true" aria-expanded="false">
                            <i class="feather icon-more-horizontal"></i>
                        </button>
                        <ul class="list-unstyled card-option dropdown-menu dropdown-menu-right">
                            <li class="dropdown-item full-card"><a href="#!"><span><i class="feather icon-maximize"></i>
                                        maximize</span><span style="display:none"><i class="feather icon-minimize"></i>
                                        Restore</span></a>
                            </li>
                            <li class="dropdown-item minimize-card"><a href="#!"><span><i
                                            class="feather icon-minus"></i> collapse</span><span style="display:none"><i
                                            class="feather icon-plus"></i> expand</span></a></li>
                            <li class="dropdown-item reload-card"><a href="#!"><i class="feather icon-refresh-cw"></i>
                                    reload</a></li>
                            <li class="dropdown-item close-card"><a href="#!"><i class="feather icon-trash"></i>
                                    remove</a></li>
                        </ul>
                    </div>
                </div>
            </div>
			<div class="card-body">
				<div class="table-responsive">
					<table id="category-table" class="datatable table table-striped table-bordered table-hover table-center mb-0">
						<thead>
							<tr style="boder:1px solid black;">
                                <th>ID</th>
                                <th>Disk</th>
                                <th>Backup Date</th>
                                <th>File Size</th>
								<th class="text-center action-btn">Actions</th>
							</tr>
						</thead>
						<tbody>
                            <?php $__currentLoopData = $backups; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $k => $b): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td><?php echo e($k+1); ?></td>
                                <td><?php echo e($b['disk']); ?></td>
                                <td><?php echo e(\Carbon\Carbon::createFromTimeStamp($b['last_modified'])->formatLocalized('%d %B %Y, %H:%M')); ?></td>
                                <td><?php echo e(round((int)$b['file_size']/1048576, 2).' MB'); ?></td>
                                <td class="text-center">
                                    <div class="actions">
                                        <?php if($b['download']): ?>
                                        <a class="float-left" href="<?php echo e(route('backup.download')); ?>?disk=<?php echo e($b['disk']); ?>&path=<?php echo e(urlencode($b['file_path'])); ?>&file_name=<?php echo e(urlencode($b['file_name'])); ?>">
                                            <button title="download backup" class="btn btn-primary" >
                                                <i class="fe fe-download"></i>
                                            </button>
                                        </a>
                                        <?php endif; ?>
                                        <form action="<?php echo e(route('backup.destroy',$b['file_name'])); ?>?disk=<?php echo e($b['disk']); ?>" method="post">
                                            <?php echo csrf_field(); ?>
                                            <?php echo method_field("DELETE"); ?>
                                            <button title="delete backup" class="btn btn-danger" type="submit">
                                                <i class="fe fe-trash"></i>
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
</div>



<!-- Delete Modal -->
<?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.modals.delete','data' => ['route' => 'categories','title' => 'Category']]); ?>
<?php $component->withName('modals.delete'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['route' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute('categories'),'title' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute('Category')]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
<!-- /Delete Modal -->
<?php $__env->stopSection(); ?>


<?php $__env->startPush('page-js'); ?>
<!-- Select2 JS -->
	<script src="<?php echo e(asset('assets/plugins/select2/js/select2.min.js')); ?>"></script>
	<script>
		$(document).ready(function() {
			$('#category-table').on('click','.editbtn',function (){
				event.preventDefault();
				jQuery.noConflict();
				$('#edit_category').modal('show');
				var id = $(this).data('id');
				var name = $(this).data('name');
				$('#edit_id').val(id);
				$('.edit_name').val(name);
			});
			//
		});
	</script>

<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\Pharmacy-Management-System\resources\views/settings/backups.blade.php ENDPATH**/ ?>