<?php $__env->startSection('content'); ?>
    <div class="page-header">
        <div class="page-block">
            <div class="row align-items-center">
                <div class="col-md-9 col-auto">
                    <div class="page-header-title">
                        <h3 class="m-b-10">User</h3>
                    </div>
                </div>
                <div class="col-sm-3 col">
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="<?php echo e(route('dashboard')); ?>"><i class="feather icon-home"></i>
                                Dashboard</a>
                        </li>
                        <li class="breadcrumb-item active">Users</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h5>Users</h5>
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
                        <table id="datatable-export"
                            class=" table table-striped table-bordered table-hover table-center mb-0">
                            <thead>
                                <tr style="boder:1px solid black;">
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Role</th>
                                    <th>Created date</th>
                                    <th class="text-center action-btn">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr>
                                        <td>
                                            <?php if(!empty($user->avatar)): ?>
                                                <span class="avatar avatar-sm mr-2">
                                                    <img class="avatar-img" width="30"
                                                        src="<?php echo e(asset('storage/users/' . $user->avatar)); ?>"
                                                        alt="product image">
                                                </span>
                                            <?php endif; ?>
                                            <?php echo e($user->name); ?>

                                        </td>
                                        <td>
                                            <?php echo e($user->email); ?>

                                        </td>
                                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('update-role')): ?>
                                            <td>
                                                <?php $__currentLoopData = $user->getRoleNames(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $role): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <?php echo e($role); ?>

                                                    <span data-role="<?php echo e($role); ?>"></span>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </td>
                                        <?php endif; ?>
                                        <td><?php echo e(date_format(date_create($user->created_at), 'd M,Y')); ?></td>

                                        <td class="text-center">
                                            <div class="actions">
                                                <a data-id="<?php echo e($user->id); ?>" data-name="<?php echo e($user->name); ?>"
                                                    data-avatar="<?php echo e($user->avatar); ?>"
                                                    data-email="<?php echo e($user->email); ?>" class="btn btn-sm btn-info editbtn"
                                                    id="edit-user" data-toggle="modal" href="javascript:void(0)">
                                                    <i class="fe fe-pencil"></i> Edit
                                                </a>
                                                <a data-id="<?php echo e($user->id); ?>" href="javascript:void(0);"
                                                    class="btn btn-sm btn-danger deletebtn" data-toggle="modal">
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
        </div>
        <div class="col-md-4">
          <div class="card">
              <div class="card-header">
                <h5>Add User</h5>
                <div class="card-header-right">
                    <a href="<?php echo e(route('users')); ?>" class="btn btn-primary float-right">Add New</a>
                </div>
              </div>
              <div class="card-body">
                <?php echo $__env->make('users.create', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
              </div>
          </div>
        </div>
    </div>

    <!-- Add Modal -->
    <div class="modal fade" id="add_user" aria-hidden="true" role="dialog">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Add User</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form method="POST" enctype="multipart/form-data" action="<?php echo e(route('users')); ?>">
                        <?php echo csrf_field(); ?>
                        <div class="row form-row">
                            <div class="col-12">
                                <div class="form-group">
                                    <label>Full Name</label>
                                    <input type="text" name="name" class="form-control" placeholder="John Doe">
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    <label>Email</label>
                                    <input type="email" name="email" class="form-control">
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    <label>Role</label>
                                    <div class="form-group">
                                        <select class="select2 form-select form-control" name="role">
                                            <?php $__currentLoopData = $roles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $role): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <option value="<?php echo e($role->name); ?>"><?php echo e($role->name); ?></option>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    <label>Picture</label>
                                    <input type="file" name="avatar">
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="row">
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label>Password</label>
                                            <input type="password" name="password" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label>Confirm Password</label>
                                            <input type="password" name="password_confirmation" class="form-control">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary btn-block">Save Changes</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- /ADD Modal -->

    <!-- Edit Details Modal -->
    <div class="modal fade" id="edit_user" aria-hidden="true" role="dialog">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Edit User</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form method="post" enctype="multipart/form-data" action="<?php echo e(route('users')); ?>">
                        <?php echo csrf_field(); ?>
                        <?php echo method_field("PUT"); ?>
                        <div class="row form-row">
                            <input type="hidden" name="id" id="edit_id">
                            <div class="col-12">
                                <div class="form-group">
                                    <label>Full Name</label>
                                    <input type="text" name="name" class="form-control edit_name" placeholder="John Doe">
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    <label for="email">Email</label>
                                    <input type="email" name="email" class="form-control edit_email" id="email">
                                </div>
                            </div>
                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('update-role')): ?>
                                <div class="col-12">
                                    <div class="form-group">
                                        <label>Role</label>
                                        <div class="form-group">
                                            <select class="select2 form-select form-control edit_role" name="role">
                                                <?php $__currentLoopData = $roles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $role): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <option value="<?php echo e($role->name); ?>"><?php echo e($role->name); ?></option>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            <?php endif; ?>
                            <div class="col-12">
                                <div class="form-group">
                                    <label for="avatar">User Picture</label>
                                    <input type="file" name="avatar" id="avatar">
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="row">
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label>Password</label>
                                            <input type="password" name="password" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label>Confirm Password</label>
                                            <input type="password" name="password_confirmation" class="form-control">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary btn-block">Save Changes</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- /Edit Details Modal -->

    <!-- Delete Modal -->
    <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.modals.delete','data' => ['route' => 'users','title' => 'User']]); ?>
<?php $component->withName('modals.delete'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['route' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute('users'),'title' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute('User')]); ?>
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

    <script>
        $(document).ready(function() {
            $('#avatar').hide();
            $('#datatable-export').on('click', '.editbtn', function() {
                event.preventDefault();
                // jQuery.noConflict();
                // $('#edit_user').modal('show');
                var id = $(this).data('id');
                var name = $(this).data('name');
                var email = $(this).data('email');
                var role = $(this).data('role');
                var avatar = $(this).data('avatar');
                $('#edit_id').val(id);
                $('.edit_name').val(name);
                $('.edit_email').val(email);
                $('.edit_role').val(role).trigger('change');
                $('#avatar').show();
            });
            //


        });
    </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\Pharmacy-Management-System\resources\views/users/users.blade.php ENDPATH**/ ?>