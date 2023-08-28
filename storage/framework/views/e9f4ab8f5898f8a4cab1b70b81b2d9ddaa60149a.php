

<?php $__env->startSection('content'); ?>

    <div class="page-header">
        <div class="page-block">
            <div class="row align-items-center">
                <div class="col-md-9 col-auto">
                    <div class="page-header-title">
                        <h5 class="m-b-10">Categorie</h5>
                    </div>
                </div>
                <div class="col-sm-3 col">
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="<?php echo e(route('dashboard')); ?>"><i class="feather icon-home"></i>
                                Dashboard</a>
                        </li>
                        <li class="breadcrumb-item active">Categories</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header">
                    <h5>services</h5>
                    <div class="card-header-right">
                        <a href="#add_categories" data-toggle="modal" class="btn btn-primary float-right mt-20">Ajouter
                            service</a>
                        <div class="btn-group card-option">
                            <button type="button" class="btn dropdown-toggle btn-icon" data-toggle="dropdown"
                                aria-haspopup="true" aria-expanded="false">
                                <i class="feather icon-more-horizontal"></i>
                            </button>
                            <ul class="list-unstyled card-option dropdown-menu dropdown-menu-right">
                                <li class="dropdown-item full-card"><a href="#!"><span><i class="feather icon-maximize"></i>
                                    maximiser</span><span style="display:none"><i class="feather icon-minimize"></i>
                                            Restaurer</span></a>
                                </li>
                                <li class="dropdown-item minimize-card"><a href="#!"><span><i
                                                class="feather icon-minus"></i> effondrement</span><span style="display:none"><i
                                                class="feather icon-plus"></i> développer</span></a></li>
                                <li class="dropdown-item reload-card"><a href="#!"><i class="feather icon-refresh-cw"></i>
                                    recharger</a></li>
                                <li class="dropdown-item close-card"><a href="#!"><i class="feather icon-trash"></i>
                                    retirer</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="category-table"
                            class="datatable table table-striped table-bordered table-hover table-center mb-0">
                            <thead>
                                <tr style="boder:1px solid black;">
                                    <th>Nom</th>
                                    <th class="text-center action-btn">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $__currentLoopData = $services; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr>
                                        <td>
                                            <?php echo e($category->name); ?>

                                        </td>


                                        <td class="text-center">
                                            <div class="actions">
                                                <a data-id="<?php echo e($category->id); ?>" data-name="<?php echo e($category->name); ?>"
                                                    class="btn btn-sm btn-info editbtn" data-toggle="modal"
                                                    href="javascript:void(0)">
                                                    <i class="fe fe-pencil"></i> Modifier
                                                </a>
                                                <a data-id="<?php echo e($category->id); ?>" data-toggle="modal"
                                                    href="#deleteConfirmModal<?php echo e($key); ?>"
                                                    class="btn btn-sm btn-danger deletebtn">
                                                    <i class="fe fe-trash"></i> Supprimer
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
        </div>
    </div>

    <!-- Add Modal -->
    <div class="modal fade" id="add_categories" aria-hidden="true" role="dialog">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Ajouter service</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form method="POST" action="<?php echo e(route('services')); ?>">
                        <?php echo csrf_field(); ?>
                        <div class="row form-row">
                            <div class="col-12">
                                <div class="form-group">
                                    <label>service</label>
                                    <input type="text" name="name" class="form-control">
                                </div>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary btn-block">Sauvegarder les modifications</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- /ADD Modal -->

    <!-- Edit Details Modal -->
    <div class="modal fade" id="edit_category" aria-hidden="true" role="dialog">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Modifier Categorie</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form method="post" action="<?php echo e(route('services')); ?>">
                        <?php echo csrf_field(); ?>
                        <?php echo method_field("PUT"); ?>
                        <div class="row form-row">
                            <div class="col-12">
                                <input type="hidden" name="id" id="edit_id">
                                <div class="form-group">
                                    <label>service</label>
                                    <input type="text" class="form-control edit_name" name="name">
                                </div>
                            </div>

                        </div>
                        <button type="submit" class="btn btn-primary btn-block">Sauvegarder les modifications</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- /Edit Details Modal -->

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


<?php $__env->startSection('script'); ?>

    <script>
        $(document).ready(function() {
            $('#category-table').on('click', '.editbtn', function() {
                // alert(1)
                event.preventDefault();
                // jQuery.noConflict();
                $('#edit_category').modal('show');
                var id = $(this).data('id');
                var name = $(this).data('name');
                $('#edit_id').val(id);
                $('.edit_name').val(name);
            });
            //
        });
    </script>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\Pharmacy-Management-System\resources\views/services/service.blade.php ENDPATH**/ ?>