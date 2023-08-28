<?php $__env->startSection('content'); ?>
<div class="page-header">
    <div class="page-block">
        <div class="row align-items-center">
            <div class="col-md-9 col-auto">
                <div class="page-header-title">
                    <h3 class="m-b-10">Suppliers</h3>
                </div>
            </div>
            <div class="col-sm-3 col">
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="<?php echo e(route('dashboard')); ?>"><i class="feather icon-home"></i>
                            Dashboard</a>
                    </li>
                    <li class="breadcrumb-item active">Fournisseurs</li>
                </ul>
            </div>
        </div>
    </div>
</div>
<div class="row">
	<div class="col-md-12">

		<!-- Suppliers -->
		<div class="card">
            <div class="card-header">
                <h5>Fournisseurs</h5>
                <div class="card-header-right">
                    <a href="<?php echo e(route('add-supplier')); ?>" class="btn btn-primary float-right">Add New</a>
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
					<table id="datatable-export" class="table table-hover table-center mb-0">
						<thead>
							<tr>
								<th>Produit</th>
								<th>Nom</th>
								<th>Telephone</th>
								<th>Email</th>
								<th>Address</th>
								<th>Entreprise</th>
								<th class="action-btn">Action</th>
							</tr>
						</thead>
						<tbody>
							<?php $__currentLoopData = $suppliers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $supplier): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
							<tr>
								<td>
									<?php echo e($supplier->product); ?>

								</td>
								<td><?php echo e($supplier->name); ?></td>
								<td><?php echo e($supplier->phone); ?></td>
								<td><?php echo e($supplier->email); ?></td>
								<td><?php echo e($supplier->address); ?></td>
								<td><?php echo e($supplier->company); ?></td>
								<td>
									<div class="actions">
										<a class="btn btn-sm btn-info" href="<?php echo e(route('edit-supplier',$supplier)); ?>">
											<i class="fe fe-pencil"></i> Edit
										</a>
										<a data-id="<?php echo e($supplier->id); ?>" href="javascript:void(0);" class="btn btn-sm btn-danger deletebtn" data-toggle="modal">
											<i class="fe fe-trash"></i> Delete
										</a>
									</div>
								</td>
							</tr>
							<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
						</tbody>
					</table>
				</div>
			</div>
		</div>
		<!-- /Suppliers-->

	</div>
</div>
<!-- Delete Modal -->
<?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.modals.delete','data' => ['route' => 'suppliers','title' => 'Supplier']]); ?>
<?php $component->withName('modals.delete'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['route' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute('suppliers'),'title' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute('Supplier')]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
<!-- /Delete Modal -->
<?php $__env->stopSection(); ?>

<?php $__env->startPush('page-js'); ?>
	<!-- Select2 js-->
	<script src="<?php echo e(asset('assets/plugins/select2/js/select2.min.js')); ?>"></script>
<?php $__env->stopPush(); ?>


<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\Pharmacy-Management-System\resources\views/suppliers/suppliers.blade.php ENDPATH**/ ?>