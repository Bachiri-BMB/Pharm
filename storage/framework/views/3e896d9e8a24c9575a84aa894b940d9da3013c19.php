<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
		<meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
        <title><?php echo e(ucfirst(AppSettings::get('app_name', 'App'))); ?> - <?php echo e(ucfirst($title ?? '')); ?></title>
		<meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="description" content="" />
    <meta name="keywords" content="">
    <meta name="author" content="Phoenixcoded" />
  	<!-- Favicon -->
      <link rel="shortcut icon" type="image/x-icon" href="<?php if(!empty(AppSettings::get('logo'))): ?> <?php echo e(asset('storage/'.AppSettings::get('favicon'))); ?> <?php else: ?><?php echo e(asset('img/fav.png')); ?> <?php endif; ?>">

    <!-- prism css -->
    <link rel="stylesheet" href="<?php echo e(asset('jambasangsang/assets/css/plugins/prism-coy.css')); ?>">
    <!-- vendor css -->
    <link rel="stylesheet" href="<?php echo e(asset('jambasangsang/assets/css/style.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('jambasangsang/assets/css/pcoded-horizontal.min.css')); ?>">

     <!-- Scripts -->
     

    <!-- Styles -->
    

    <style>
        .select2,
        .select2-search__field,
        .select2-results__option {
            font-size: 1.1em !important;
        }

        .select2-selection__rendered {
            line-height: 3em !important;
        }

        .select2-container .select2-selection--single {
            height: 3em !important;
        }

        .select2-selection__arrow {
            height: 3em !important;
        }

    </style>
    <!-- page css -->
    <?php echo $__env->yieldPushContent('page-css'); ?>
</head>

<body>
    <!-- [ Pre-loader ] start -->
    <div class="loader-bg">
        <div class="loader-track">
            <div class="loader-fill"></div>
        </div>
    </div>
    <!-- [ Pre-loader ] End -->
    <!-- [ navigation menu ] start -->
    <?php echo $__env->make('layouts.navbar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <!-- [ navigation menu ] end -->
    <!-- [ Header ] start -->
    <?php echo $__env->make('layouts.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <!-- [ Header ] end -->
    


    <main class="py-4 mt-5">
        <div class="pcoded-wrapper container mt-5">
            <div class="pcoded-content">
                <div class="pcoded-inner-content">
                    <div class="main-body">
                        <div class="page-wrapper">
                            <?php echo $__env->make('flash', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                            <?php echo $__env->yieldContent('content'); ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
    

    <!-- Required Js -->
    <script src="<?php echo e(asset('jambasangsang/assets/js/vendor-all.min.js')); ?>"></script>
    <script src="<?php echo e(asset('jambasangsang/assets/js/plugins/bootstrap.min.js')); ?>"></script>
    <script src="<?php echo e(asset('jambasangsang/assets/js/pcoded.min.js')); ?>"></script>


    <!-- prism Js -->
    <script src="<?php echo e(asset('jambasangsang/assets/js/plugins/prism.js')); ?>"></script>


    <script src="<?php echo e(asset('jambasangsang/assets/js/horizontal-menu.js')); ?>"></script>
    <script>
        (function() {
            if ($('#layout-sidenav').hasClass('sidenav-horizontal') || window.layoutHelpers.isSmallScreen()) {
                return;
            }
            try {
                window.layoutHelpers._getSetting("Rtl")
                window.layoutHelpers.setCollapsed(
                    localStorage.getItem('layoutCollapsed') === 'true',
                    false
                );
            } catch (e) {}
        })();
        $(function() {
            $('#layout-sidenav').each(function() {
                new SideNav(this, {
                    orientation: $(this).hasClass('sidenav-horizontal') ? 'horizontal' : 'vertical'
                });
            });
            $('body').on('click', '.layout-sidenav-toggle', function(e) {
                e.preventDefault();
                window.layoutHelpers.toggleCollapsed();
                if (!window.layoutHelpers.isSmallScreen()) {
                    try {
                        localStorage.setItem('layoutCollapsed', String(window.layoutHelpers.isCollapsed()));
                    } catch (e) {}
                }
            });
        });
        // $(document).ready(function() {
        //     $("#pcoded").pcodedmenu({
        //         themelayout: 'horizontal',
        //         MenuTrigger: 'hover',
        //         SubMenuTrigger: 'hover',
        //     });
        // });
        $(document).ready(function() {
            $("#pcoded").pcodedmenu({
                themelayout: 'horizontal',
                FixedNavbarPosition: true,
                FixedHeaderPosition: true,
            });
        });

        $(document).ready(function(){

		// delete confirmation modal
		$('.deletebtn').on('click',function (){
			event.preventDefault();
			// jQuery.noConflict();
			$('#deleteConfirmModal').modal('show');
			var id = $(this).data('id');
			console.log(id);
			$('#delete_id').val(id);
		});

        $('.select2').select2({
				placeholder: 'Select an option'
			});


	});
    </script>

    <script src="<?php echo e(asset('jambasangsang/assets/js/analytics.js')); ?>"></script>

    <?php echo $__env->yieldPushContent('page-js'); ?>
    <?php echo $__env->yieldContent('script'); ?>

</body>

</html>
<?php /**PATH C:\xampp\htdocs\Pharmacy-Management-System\resources\views/layouts/app.blade.php ENDPATH**/ ?>