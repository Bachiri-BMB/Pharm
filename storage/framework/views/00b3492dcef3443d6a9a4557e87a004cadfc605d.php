<?php $__env->startSection('content'); ?>
<div class="page-header">
    <div class="page-block">
        <div class="row align-items-center">
            <div class="col-md-9 col-auto">
                <div class="page-header-title">
                    <h3 class="m-b-10">Permissions</h3>
                </div>
            </div>
            <div class="col-sm-3 col">
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="<?php echo e(route('dashboard')); ?>"><i class="feather icon-home"></i>
                            Tableau de bord</a>
                    </li>
                    <li class="breadcrumb-item active">Permissions</li>
                </ul>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-sm-12">
        <div class="card">
            <div class="card-header">
                <h5>Permissions</h5>
                <div class="card-header-right">
                    <a href="#add_permission" data-toggle="modal" class="btn btn-primary float-right">Ajouter une permission</a>
                    <div class="btn-group card-option">
                        <button type="button" class="btn dropdown-toggle btn-icon" data-toggle="dropdown"
                            aria-haspopup="true" aria-expanded="false">
                            <i class="feather icon-more-horizontal"></i>
                        </button>
                        <ul class="list-unstyled card-option dropdown-menu dropdown-menu-right">
                            <li class="dropdown-item full-card"><a href="#!"><span><i class="feather icon-maximize"></i>
                                        agrandir</span><span style="display:none"><i class="feather icon-minimize"></i>
                                        Restaurer</span></a>
                            </li>
                            <li class="dropdown-item minimize-card"><a href="#!"><span><i
                                            class="feather icon-minus"></i> réduire</span><span style="display:none"><i
                                            class="feather icon-plus"></i> agrandir</span></a>
                            </li>
                            <li class="dropdown-item reload-card"><a href="#!"><i class="feather icon-refresh-cw"></i>
                                    recharger</a></li>
                            <li class="dropdown-item close-card"><a href="#!"><i class="feather icon-trash"></i>
                                    supprimer</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table id="perm-table"
                        class="datatable table table-striped table-bordered table-hover table-center mb-0">
                        <thead>
                            <tr>
                                <th>Nom</th>
                                <th>Date de création</th>
                                <th class="text-center action-btn">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $__currentLoopData = $permissions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $permission): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td>
                                        <?php echo e($permission->name); ?>

                                    </td>

                                    <td><?php echo e(date_format(date_create($permission->created_at), 'd M,Y')); ?></td>

                                    <td class="text-center">
                                        <div class="actions">
                                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('update-permission')): ?>
                                                <a data-id="<?php echo e($permission->id); ?>"
                                                    data-permission="<?php echo e($permission->name); ?>"
                                                    class="btn btn-sm btn-info editbtn" data-toggle="modal"
                                                    href="javascript:void(0)">
                                                    <i class="fe fe-pencil"></i> Modifier
                                                </a>
                                            <?php endif; ?>
                                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('destroy-permission')): ?>
                                                <a data-id="<?php echo e($permission->id); ?>" data-toggle="modal"
                                                    href="javascript:void(0)" class="btn btn-sm btn-danger deletebtn">
                                                    <i class="fe fe-trash"></i> Supprimer
                                                </a>
                                            <?php endif; ?>
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

<!-- Modal Ajout -->
<div class="modal fade" id="add_permission" aria-hidden="true" role="dialog">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Ajouter une permission</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Fermer">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="POST" action="<?php echo e(route('permissions')); ?>">
                    <?php echo csrf_field(); ?>
                    <div class="row form-row">
                        <div class="col-12">
                            <div class="form-group">
                                <label>Permission</label>
                                <input type="text" name="permission" class="form-control">
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary btn-block">Enregistrer les modifications</button>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- /Modal Ajout -->

<!-- Modal Modification -->
<div class="modal fade" id="edit_permission" aria-hidden="true" role="dialog">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Modifier la permission</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Fermer">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="post" action="<?php echo e(route('permissions')); ?>">
                    <?php echo csrf_field(); ?>
                    <?php echo method_field("PUT"); ?>
                    <div class="row form-row">
                        <div class="col-12">
                            <input type="hidden" name="id" id="edit_id">
                            <div class="form-group">
                                <label>Permission</label>
                                <input type="text" class="form-control edit_permission" name="permission">
                            </div>
                        </div>

                    </div>
                    <button type="submit" class="btn btn-primary btn-block">Enregistrer les modifications</button>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- /Modal Modification -->

<!-- Modal Suppression -->
<?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.modals.delete','data' => ['route' => 'permissions','title' => 'Permission']]); ?>
<?php $component->withName('modals.delete'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['route' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute('permissions'),'title' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute('Permission')]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
<!-- /Modal Suppression -->
<?php $__env->stopSection(); ?>

<?php $__env->startPush('page-js'); ?>
    <!-- Select2 JS -->
    <script src="<?php echo e(asset('assets/plugins/select2/js/select2.min.js')); ?>"></script>
    <script>
        $(document).ready(function() {
            $('#perm-table').on('click', '.editbtn', function() {
                event.preventDefault();
                $('#edit_permission').modal('show');
                var id = $(this).data('id');
                var permission = $(this).data('permission');
                $('#edit_id').val(id);
                $('.edit_permission').val(permission);
            });
            //
        });
    </script>

<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\Pharmacy-Management-System\resources\views/permissions/permissions.blade.php ENDPATH**/ ?>