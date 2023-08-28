<!DOCTYPE html>
<html lang="en">

<head>
    <title><?php echo e(ucfirst(AppSettings::get('app_name', 'App'))); ?> - <?php echo e(ucfirst($title ?? '')); ?></title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="description" content="" />
    <meta name="keywords" content="">
    <meta name="author" content="Phoenixcoded" />
    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon"
        href="<?php if(!empty(AppSettings::get('logo'))): ?> <?php echo e(asset('storage/' . AppSettings::get('favicon'))); ?> <?php else: ?><?php echo e(asset('img/fav.png')); ?> <?php endif; ?>">

    <!-- vendor css -->
    <link rel="stylesheet" href="<?php echo e(asset('jambasangsang/assets/css/style.css')); ?>">
	<style>
		 <style>
        /* ... (your existing styles) ... */
        
        /* Copyright animation */
        .copyright {
            text-align: center;
            font-size: 14px;
            color: #777;
            margin-top: 30px;
            animation: fade-in 0.5s ease;
        }

        @keyframes  fade-in {
            from {
                opacity: 0;
            }
            to {
                opacity: 1;
            }
        }
    </style>

</head>

<body class="bg-light">

    <div class="auth-wrapper d-flex align-items-center justify-content-center">
        <div class="auth-content text-center">
            <div class="card borderless">
                <div class="row align-items-center ">
                    <div class="col-md-12">
                        <div class="card-body">
                            <img src="<?php echo e(asset('img/Police_Algérie.png')); ?>" width="150" alt=""
                                class="img-fluid mb-4 rounded-circle">
                            <h4 class="mb-3">Hopital de Police</h4>
                            <p class="text-muted">Veuillez Vous Connecter a Votre Compte .</p>
                            <form method="POST" action="<?php echo e(route('login')); ?>">
                                <?php echo csrf_field(); ?>
                                <div class="form-group">
                                    <input id="email" type="email" placeholder="Email"
                                        class="form-control <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="email"
                                        value="<?php echo e(old('email')); ?>" required autocomplete="email" autofocus>
                                    <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    <span class="invalid-feedback" role="alert">
                                        <strong><?php echo e($message); ?></strong>
                                    </span>
                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                </div>
                                <div class="form-group">
                                    <input id="password" placeholder="Password" type="password"
                                        class="form-control <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="password"
                                        required autocomplete="current-password">
                                    <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    <span class="invalid-feedback" role="alert">
                                        <strong><?php echo e($message); ?></strong>
                                    </span>
                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                </div>
                                <div class="custom-control custom-checkbox text-left mb-4">
                                    <input type="checkbox" class="custom-control-input" id="customCheck1">
                                    <label class="custom-control-label" for="customCheck1">Remember me</label>
                                </div>
                                <button type="submit" class="btn btn-primary btn-block">Connecter</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
			<div class="copyright">
				&copy; 2023 BECHIRI MOHAMMED EL BACHIR
			</div>
        </div>
    </div>
	

    <!-- Required Js -->
    <script src="<?php echo e(asset('jambasangsang/assets/js/vendor-all.min.js')); ?>"></script>
    <script src="<?php echo e(asset('jambasangsang/assets/js/plugins/bootstrap.min.js')); ?>"></script>
    <script src="<?php echo e(asset('jambasangsang/assets/js/pcoded.min.js')); ?>"></script>

</body>

</html>
<?php /**PATH C:\xampp\htdocs\Pharmacy-Management-System\resources\views/auth/login.blade.php ENDPATH**/ ?>