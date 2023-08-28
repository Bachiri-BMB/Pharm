<header class="navbar pcoded-header navbar-expand-lg navbar-light header-dark">
    <div class="container">
        <div class="m-header">
            
                <a href="<?php echo e(route('dashboard')); ?>" class="b-brand">
                <!-- ========   change your logo hear   ============ -->
			    <img class="logo" width="200" height="70" src="<?php if(!empty(AppSettings::get('logo'))): ?> <?php echo e(asset('storage/'.AppSettings::get('logo'))); ?> <?php else: ?><?php echo e(asset('img/p.jpg')); ?> <?php endif; ?>" alt="Logo">
                <img src="<?php echo e(asset('jambasangsang/assets/images/logo-icon.png')); ?>" alt="" class="logo-thumb">
            </a>
            <a href="#!" class="mob-toggler">
                <i class="feather icon-more-vertical"></i>
            </a>

        </div>
        <div class="collapse navbar-collapse">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                    <a href="#!" class="pop-search"><i class="feather icon-search"></i></a>
                    <div class="search-bar">
                        <input type="text" class="form-control border-0 shadow-none" placeholder="Search hear">
                        <button type="button" class="close" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                </li>
                <li class="nav-item">
                    <div class="dropdown">
                        <a class="dropdown-toggle h-drop" href="#" data-toggle="dropdown">
                            Dropdown
                        </a>
                        <div class="dropdown-menu profile-notification ">
                            <ul class="pro-body">
                                <li><a href="<?php echo e(route('profile')); ?>" class="dropdown-item"><i class="fas fa-circle"></i> Profile</a></li>
                                <li><a href="email_inbox.html" class="dropdown-item"><i class="fas fa-circle"></i> My Messages</a></li>
                                <li><a href="auth-signin.html" class="dropdown-item"><i class="fas fa-circle"></i> Lock Screen</a></li>
                            </ul>
                        </div>
                    </div>
                </li>
                <li class="nav-item">
                    <div class="dropdown mega-menu">
                        <a class="dropdown-toggle h-drop" href="#" data-toggle="dropdown">
                            Mega
                        </a>
                        <div class="dropdown-menu profile-notification ">
                            <div class="row no-gutters">
                                <div class="col">
                                    <h6 class="mega-title">UI Element</h6>
                                    <ul class="pro-body">
                                        <li><a href="#!" class="dropdown-item"><i class="fas fa-circle"></i> Alert</a></li>
                                        <li><a href="#!" class="dropdown-item"><i class="fas fa-circle"></i> Button</a></li>
                                        <li><a href="#!" class="dropdown-item"><i class="fas fa-circle"></i> Badges</a></li>
                                        <li><a href="#!" class="dropdown-item"><i class="fas fa-circle"></i> Cards</a></li>
                                        <li><a href="#!" class="dropdown-item"><i class="fas fa-circle"></i> Modal</a></li>
                                        <li><a href="#!" class="dropdown-item"><i class="fas fa-circle"></i> Tabs & pills</a></li>
                                    </ul>
                                </div>
                                <div class="col">
                                    <h6 class="mega-title">Forms</h6>
                                    <ul class="pro-body">
                                        <li><a href="#!" class="dropdown-item"><i class="feather icon-minus"></i> Elements</a></li>
                                        <li><a href="#!" class="dropdown-item"><i class="feather icon-minus"></i> Validation</a></li>
                                        <li><a href="#!" class="dropdown-item"><i class="feather icon-minus"></i> Masking</a></li>
                                        <li><a href="#!" class="dropdown-item"><i class="feather icon-minus"></i> Wizard</a></li>
                                        <li><a href="#!" class="dropdown-item"><i class="feather icon-minus"></i> Picker</a></li>
                                        <li><a href="#!" class="dropdown-item"><i class="feather icon-minus"></i> Select</a></li>
                                    </ul>
                                </div>
                                <div class="col">
                                    <h6 class="mega-title">Application</h6>
                                    <ul class="pro-body">
                                        <li><a href="#!" class="dropdown-item"><i class="feather icon-mail"></i> Email</a></li>
                                        <li><a href="#!" class="dropdown-item"><i class="feather icon-clipboard"></i> Task</a></li>
                                        <li><a href="#!" class="dropdown-item"><i class="feather icon-check-square"></i> To-Do</a></li>
                                        <li><a href="#!" class="dropdown-item"><i class="feather icon-image"></i> Gallery</a></li>
                                        <li><a href="#!" class="dropdown-item"><i class="feather icon-help-circle"></i> Helpdesk</a></li>
                                    </ul>
                                </div>
                                <div class="col">
                                    <h6 class="mega-title">Extension</h6>
                                    <ul class="pro-body">
                                        <li><a href="#!" class="dropdown-item"><i class="feather icon-file-plus"></i> Editor</a></li>
                                        <li><a href="#!" class="dropdown-item"><i class="feather icon-file-minus"></i> Invoice</a></li>
                                        <li><a href="#!" class="dropdown-item"><i class="feather icon-calendar"></i> Full calendar</a></li>
                                        <li><a href="#!" class="dropdown-item"><i class="feather icon-upload-cloud"></i> File upload</a></li>
                                        <li><a href="#!" class="dropdown-item"><i class="feather icon-scissors"></i> Image cropper</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </li>
            </ul>
            <ul class="navbar-nav ml-auto">
                <li>
                    <div class="dropdown">
                        <a class="dropdown-toggle" href="#" data-toggle="dropdown">
                            <i class="icon feather icon-bell"></i>
                            <span class="badge badge-pill badge-danger"><?php echo e(auth()->user()->unReadNotifications->count()); ?></span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right notification">
                            <div class="noti-head">
                                <h6 class="d-inline-block m-b-0">Notifications</h6>
                                <?php if(auth()->user()->unReadNotifications->count() > 0): ?>
                                <div class="float-right">
                                    <a href="<?php echo e(route('mark-as-read')); ?>" class="m-r-10">mark all as read</a>
                                    <a href="#!">clear all</a>
                                </div>
                                <?php endif; ?>
                            </div>
                            <ul class="noti-body">

                                <?php $__empty_1 = true; $__currentLoopData = auth()->user()->unReadNotifications; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $notification): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                <?php if($loop->first): ?>
                                <li class="n-title">
                                    <p class="m-b-0">Stock Alert</p>
                                </li>
                                <?php endif; ?>
                                <li class="notification">
                                    <a href="<?php echo e(route('read')); ?>">
                                    <div class="media">
                                        <img class="img-radius" alt="Product image" src="<?php echo e(asset('storage/purchases/' .$notification->data['image'])); ?>">
                                        <div class="media-body">
                                            <p><strong><?php echo e($notification->data['product_name']); ?> </strong><span class="n-time text-muted"><i class="icon feather icon-clock m-r-10"></i><?php echo e($notification->created_at->diffForHumans()); ?></span></p>
                                            <p>is out of stock <?php echo e($notification->data['quantity']); ?> left in quantity.</p>
                                        </div>
                                    </div>
                                    </a>
                                </li>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                            <li class="notification text-center">
                                <strong class="text-center">No Message</strong>
                            </li>
                            <?php endif; ?>
                                
                            </ul>
                            <div class="noti-footer">
                                <a href="#!">show all</a>
                            </div>
                        </div>
                    </div>
                </li>
                <li>
                    <button id="fullscreen-toggle" class="btn btn-sm btn-primary">
                        <i class="feather icon-maximize"></i> Full Screen
                    </button>
                    
                    <div class="dropdown drp-user">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <i class="feather icon-user"></i>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right profile-notification">
                            <div class="pro-head">
                                <img src="<?php echo e(asset('/img/Police_Algérie.png')); ?>" class="img-radius" alt="User-Profile-Image">
                                <span> <?php echo e(Auth::user()->name); ?></span>
                                <a href="<?php echo e(route('logout')); ?>" onclick="event.preventDefault();
                                              document.getElementById('logout-form').submit();" class="dud-logout" title="Logout">
                                    <i class="feather icon-log-out"></i>
                                </a>
                                <form id="logout-form" action="<?php echo e(route('logout')); ?>" method="POST" class="d-none">
                                    <?php echo csrf_field(); ?>
                                </form>
                            </div>
                            <ul class="pro-body">
                                <li><a href="<?php echo e(route('profile')); ?>" class="dropdown-item"><i class="feather icon-user"></i> Profile</a></li>
                                <li><a href="email_inbox.html" class="dropdown-item"><i class="feather icon-mail"></i> My Messages</a></li>
                                <li><a href="auth-signin.html" class="dropdown-item"><i class="feather icon-lock"></i> Lock Screen</a></li>
                            </ul>
                        </div>
                    </div>
                </li>
            </ul>
        </div>
    </div>
</header>
<script>
    document.addEventListener("DOMContentLoaded", function() {
        var fullscreenToggle = document.getElementById("fullscreen-toggle");
        var isFullScreen = false;
    
        fullscreenToggle.addEventListener("click", function(event) {
            event.preventDefault(); // Prevent the default button behavior
            toggleFullScreen();
        });
    
        function toggleFullScreen() {
            if (!isFullScreen) {
                enterFullScreen();
            } else {
                exitFullScreen();
            }
        }
    
        function enterFullScreen() {
            if (document.documentElement.requestFullscreen) {
                document.documentElement.requestFullscreen();
            } else if (document.documentElement.mozRequestFullScreen) {
                document.documentElement.mozRequestFullScreen();
            } else if (document.documentElement.webkitRequestFullscreen) {
                document.documentElement.webkitRequestFullscreen(Element.ALLOW_KEYBOARD_INPUT);
            } else if (document.documentElement.msRequestFullscreen) {
                document.documentElement.msRequestFullscreen();
            }
            isFullScreen = true;
        }
    
        function exitFullScreen() {
            if (document.exitFullscreen) {
                document.exitFullscreen();
            } else if (document.mozCancelFullScreen) {
                document.mozCancelFullScreen();
            } else if (document.webkitExitFullscreen) {
                document.webkitExitFullscreen();
            } else if (document.msExitFullscreen) {
                document.msExitFullscreen();
            }
            isFullScreen = false;
        }
    
        // Prevent exiting full screen when clicking other buttons
        document.addEventListener("fullscreenchange", function() {
            isFullScreen = document.fullscreenElement !== null;
        });
    });
    </script>
    <?php /**PATH C:\xampp\htdocs\Pharmacy-Management-System\resources\views/layouts/header.blade.php ENDPATH**/ ?>