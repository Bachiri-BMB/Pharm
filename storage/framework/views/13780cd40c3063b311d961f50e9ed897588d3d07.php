<nav class="pcoded-navbar theme-horizontal menu-light">
    <div class="navbar-wrapper container">
        <div class="navbar-content sidenav-horizontal" id="layout-sidenav">
            <ul class="nav pcoded-inner-navbar sidenav-inner">

                <li class="nav-item <?php echo e(route_is('dashboard') ? 'active active-cover' : ''); ?>">
                    <a href="<?php echo e(route('dashboard')); ?>" class="nav-link "><span class="pcoded-micon"><i class="feather icon-home"></i></span><span class="pcoded-mtext">Tableau de bord</span></a>
                </li>

                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('view-category')): ?>
                <li class="nav-item  <?php echo e(route_is('categories') ? 'active active-cover' : ''); ?>">
                    <a href="<?php echo e(route('categories')); ?>"><i class="feather icon-layout"></i> <span>Catégories</span></a>
                </li>
                <?php endif; ?>
                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('view-category')): ?>
                <li class="nav-item  <?php echo e(route_is('categories') ? 'active active-cover' : ''); ?>">
                    <a href="<?php echo e(route('services')); ?>"><i class="feather icon-layout"></i> <span>Services</span></a>
                </li>
                <?php endif; ?>

                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('view-products')): ?>
                <li class="nav-item pcoded-hasmenu <?php echo e(route_is(('products')) || route_is(('add-product')) || route_is(('outstock')) || route_is(('expired')) || route_is(('edit-product')) ? 'active active-cover' : ''); ?>">
                    <a href="#"><i class="feather icon-document"></i> <span>Produit</span> <span class="menu-arrow"></span></a>
                    <ul class="pcoded-submenu">
                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('view-products')): ?><li class="<?php echo e(route_is(('products')) ? 'active' : ''); ?>"><a  href="<?php echo e(route('products')); ?>">Produits</a></li><?php endif; ?>
                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('create-product')): ?><li class="<?php echo e(route_is('add-product') ? 'active' : ''); ?>"><a  href="<?php echo e(route('add-product')); ?>">Ajouter un Produit </a></li><?php endif; ?>
                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('view-outstock-products')): ?><li class="<?php echo e(route_is('outstock') ? 'active' : ''); ?>"><a  href="<?php echo e(route('outstock')); ?>">Hors stock</a></li><?php endif; ?>
                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('view-expired-products')): ?><li class="<?php echo e(route_is('expired') ? 'active' : ''); ?>"><a  href="<?php echo e(route('expired')); ?>">Expirés</a></li><?php endif; ?>
                    </ul>
                </li>
                <?php endif; ?>

                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('view-purchase')): ?>
                <li class="nav-item pcoded-hasmenu <?php echo e(route_is(('purchases')) || route_is(('add-purchase')) || route_is(('edit-purchase')) ? 'active active-cover' : ''); ?>">
                    <a href="#"><i class="feather icon-star-o"></i> <span>Entré</span> <span class="menu-arrow"></span></a>
                    <ul class="pcoded-submenu">
                        <li class="<?php echo e(route_is('purchases') ? 'active active-cover' : ''); ?>"><a  href="<?php echo e(route('purchases')); ?>">Entré </a></li>
                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('create-purchase')): ?>
                        <li class="<?php echo e(route_is('add-purchase') ? 'active active-cover' : ''); ?>" ><a href="<?php echo e(route('add-purchase')); ?>">Ajouter des Entrés</a></li>
                        <?php endif; ?>
                    </ul>
                </li>
                <?php endif; ?>

                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('view-sales')): ?>
                <li class="nav-item  <?php echo e(request()->is('sales*') ? 'active active-cover' : ''); ?>"><a href="<?php echo e(route('sales')); ?>"><i class="feather icon-activity"></i> <span>Sorties</span></a></li>
                <?php endif; ?>

                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('view-supplier')): ?>
                <li class="nav-item pcoded-hasmenu <?php echo e(route_is(('suppliers')) || route_is(('add-supplier')) || route_is(('edit-supplier')) ? 'active active-cover' : ''); ?>">
                    <a href="#"><i class="feather icon-user"></i> <span>Fournisseurs</span> <span class="menu-arrow"></span></a>
                    <ul class="pcoded-submenu">
                        <li class="<?php echo e(route_is('suppliers') ? 'active active-cover' : ''); ?>"><a  href="<?php echo e(route('suppliers')); ?>">Fournisseurs</a></li>
                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('create-supplier')): ?><li class="<?php echo e(route_is('add-supplier') ? 'active active-cover' : ''); ?>"><a  href="<?php echo e(route('add-supplier')); ?>">Ajouter un Fournisseur</a></li><?php endif; ?>
                    </ul>
                </li>
                <?php endif; ?>

                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('view-reports')): ?>
                <li class="nav-item pcoded-hasmenu <?php echo e(request()->is('reports*') ? 'active active-cover' : ''); ?>">
                    <a href="#"><i class="feather icon-document"></i> <span>Rapports</span> <span class="menu-arrow"></span></a>
                    <ul class="pcoded-submenu">
                        <li class="<?php echo e(route_is('reports') ? 'active active-cover' : ''); ?>"><a href="<?php echo e(route('reports')); ?>">Rapports</a></li>
                        <!-- Ajouter le lien pour le rapport de stock -->
                        <li class="<?php echo e(route_is('stock-report') ? 'active active-cover' : ''); ?>"><a href="<?php echo e(route('stock-report')); ?>">Rapport de Stock</a></li>
                        <li class="<?php echo e(route_is('annual') ? 'active active-cover' : ''); ?>"><a href="<?php echo e(route('annual')); ?>">Rapport Annuel</a></li>
                        <li class="<?php echo e(route_is('annual-category-report') ? 'active active-cover' : ''); ?>"><a href="<?php echo e(route('annual-category-report')); ?>">Rapport par Catégories</a></li>
                        <li class="<?php echo e(route_is('generate-service-sales-report') ? 'active active-cover' : ''); ?>"><a href="<?php echo e(route('generate-service-sales-report')); ?>">Rapport des Services</a></li>
                        <li class="<?php echo e(route_is('sales-purchases-chart') ? 'active active-cover' : ''); ?>"><a href="<?php echo e(route('sales-purchases-chart')); ?>">Rapport Graphique</a></li>
                    </ul>
                </li>
                <?php endif; ?>

                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('view-access-control')): ?>
                <li class="nav-item pcoded-hasmenu <?php echo e(route_is(('permissions')) || route_is(('add-permissions')) || route_is(('edit-permissions')) || route_is(('roles'))  ? 'active active-cover' : ''); ?>">
                    <a href="#"><i class="feather icon-lock"></i> <span>Contrôle d'accès</span> <span class="menu-arrow"></span></a>
                    <ul class="pcoded-submenu">
                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('view-permission')): ?>
                        <li class="nav-item <?php echo e(route_is('permissions') ? 'active active-cover' : ''); ?>"><a href="<?php echo e(route('permissions')); ?>">Permissions</a></li>
                        <?php endif; ?>
                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('view-role')): ?>
                        <li class="nav-item <?php echo e(route_is('roles') ? 'active active-cover' : ''); ?>"><a href="<?php echo e(route('roles')); ?>">Rôles</a></li>
                        <?php endif; ?>
                    </ul>
                </li>
                <?php endif; ?>

                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('view-users')): ?>
                <li class=" nav-item  <?php echo e(route_is('users') ? 'active active-cover' : ''); ?>">
                    <a href="<?php echo e(route('users')); ?>"><i class="feather icon-users"></i> <span>Utilisateurs</span></a>
                </li>
                <?php endif; ?>

                <li class="nav-item pcoded-hasmenu <?php echo e(route_is(('settings')) || route_is(('backup.index')) ? 'active active-cover' : ''); ?>">
                    <a href="#"><i class="feather icon-gears"></i> <span>Paramètres du Système</span> <span class="menu-arrow"></span></a>
                    <ul class="pcoded-submenu">
                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('view-settings')): ?>
                        <li class="<?php echo e(route_is('settings') ? 'active active-cover' : ''); ?>">
                            <a href="<?php echo e(route('settings')); ?>">
                                <i class="fa fa-gears"></i>
                                <span>Paramètres</span>
                            </a>
                        </li>
                        <?php endif; ?>
                        <li class="nav-item  <?php echo e(route_is('backup.index') ? 'active active-cover' : ''); ?>">
                            <a href="<?php echo e(route('backup.index')); ?>"><i class="material-icons">backup</i> <span>Sauvegardes</span></a>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</nav>

<style>
    .active-cover {
        background-color: cadetblue;
        color: white;
    }
    .active-cover > a {
        color: white !important;
    }
</style>
<?php /**PATH C:\xampp\htdocs\Pharmacy-Management-System\resources\views/layouts/navbar.blade.php ENDPATH**/ ?>