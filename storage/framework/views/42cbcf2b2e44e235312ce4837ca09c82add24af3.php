<form method="POST" enctype="multipart/form-data" action="<?php echo e(route('users')); ?>">
    <?php echo csrf_field(); ?>
    <input type="hidden" name="id" id="edit_id">
    <div class="row form-row">
        <div class="col-12">
            <div class="form-group">
                <label>Nom Complet</label>
                <input type="text" name="name" class="form-control edit_name" placeholder="John Doe">
            </div>
        </div>
        <div class="col-12">
            <div class="form-group">
                <label>Email</label>
                <input type="email" name="email" class="form-control edit_email">
            </div>
        </div>
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
        <div class="col-12">
           <div class="row">
               <div class="col-md-8">
                <div class="form-group">
                    <label>Photo</label>
                    <input type="file" name="avatar">
                </div>
               </div>
               <div class="col-md-4" id="avatar">
                  <img width="40" src="<?php echo e(asset('storage/users/'.auth()->user()->avatar)); ?>" alt="">
               </div>
           </div>
        </div>
        <div class="col-12">
            <div class="row">
                <div class="col-6">
                    <div class="form-group">
                        <label>MOt_Pass</label>
                        <input type="password" name="password" class="form-control">
                    </div>
                </div>
                <div class="col-6">
                    <div class="form-group">
                        <label>Confirmer Mot_Pass</label>
                        <input type="password" name="password_confirmation" class="form-control">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <button type="submit" class="btn btn-primary btn-block">Save Changes</button>
</form>
<?php /**PATH C:\xampp\htdocs\Pharmacy-Management-System\resources\views/users/create.blade.php ENDPATH**/ ?>