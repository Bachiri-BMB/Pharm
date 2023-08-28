<nav class="pcoded-navbar theme-horizontal menu-light">
    <div class="navbar-wrapper container">
        <div class="navbar-content sidenav-horizontal" id="layout-sidenav">
            <ul class="nav pcoded-inner-navbar sidenav-inner">

                <li class="nav-item {{ route_is('dashboard') ? 'active active-cover' : '' }}">
                    <a href="{{ route('dashboard') }}" class="nav-link "><span class="pcoded-micon"><i class="feather icon-home"></i></span><span class="pcoded-mtext">Tableau de bord</span></a>
                </li>

                @can('view-category')
                <li class="nav-item  {{ route_is('categories') ? 'active active-cover' : '' }}">
                    <a href="{{route('categories')}}"><i class="feather icon-layout"></i> <span>Catégories</span></a>
                </li>
                @endcan
                @can('view-category')
                <li class="nav-item  {{ route_is('categories') ? 'active active-cover' : '' }}">
                    <a href="{{route('services')}}"><i class="feather icon-layout"></i> <span>Services</span></a>
                </li>
                @endcan

                @can('view-products')
                <li class="nav-item pcoded-hasmenu {{ route_is(('products')) || route_is(('add-product')) || route_is(('outstock')) || route_is(('expired')) || route_is(('edit-product')) ? 'active active-cover' : '' }}">
                    <a href="#"><i class="feather icon-document"></i> <span>Produit</span> <span class="menu-arrow"></span></a>
                    <ul class="pcoded-submenu">
                        @can('view-products')<li class="{{ route_is(('products')) ? 'active' : '' }}"><a  href="{{route('products')}}">Produits</a></li>@endcan
                        @can('create-product')<li class="{{ route_is('add-product') ? 'active' : '' }}"><a  href="{{route('add-product')}}">Ajouter un Produit </a></li>@endcan
                        @can('view-outstock-products')<li class="{{ route_is('outstock') ? 'active' : '' }}"><a  href="{{route('outstock')}}">Hors stock</a></li>@endcan
                        @can('view-expired-products')<li class="{{ route_is('expired') ? 'active' : '' }}"><a  href="{{route('expired')}}">Expirés</a></li>@endcan
                    </ul>
                </li>
                @endcan

                @can('view-purchase')
                <li class="nav-item pcoded-hasmenu {{ route_is(('purchases')) || route_is(('add-purchase')) || route_is(('edit-purchase')) ? 'active active-cover' : '' }}">
                    <a href="#"><i class="feather icon-star-o"></i> <span>Entré</span> <span class="menu-arrow"></span></a>
                    <ul class="pcoded-submenu">
                        <li class="{{ route_is('purchases') ? 'active active-cover' : '' }}"><a  href="{{route('purchases')}}">Entré </a></li>
                        @can('create-purchase')
                        <li class="{{ route_is('add-purchase') ? 'active active-cover' : '' }}" ><a href="{{route('add-purchase')}}">Ajouter des Entrés</a></li>
                        @endcan
                    </ul>
                </li>
                @endcan

                @can('view-sales')
                <li class="nav-item  {{ request()->is('sales*') ? 'active active-cover' : '' }}"><a href="{{route('sales')}}"><i class="feather icon-activity"></i> <span>Sorties</span></a></li>
                @endcan

                @can('view-supplier')
                <li class="nav-item pcoded-hasmenu {{ route_is(('suppliers')) || route_is(('add-supplier')) || route_is(('edit-supplier')) ? 'active active-cover' : '' }}">
                    <a href="#"><i class="feather icon-user"></i> <span>Fournisseurs</span> <span class="menu-arrow"></span></a>
                    <ul class="pcoded-submenu">
                        <li class="{{ route_is('suppliers') ? 'active active-cover' : '' }}"><a  href="{{route('suppliers')}}">Fournisseurs</a></li>
                        @can('create-supplier')<li class="{{ route_is('add-supplier') ? 'active active-cover' : '' }}"><a  href="{{route('add-supplier')}}">Ajouter un Fournisseur</a></li>@endcan
                    </ul>
                </li>
                @endcan

                @can('view-reports')
                <li class="nav-item pcoded-hasmenu {{ request()->is('reports*') ? 'active active-cover' : '' }}">
                    <a href="#"><i class="feather icon-document"></i> <span>Rapports</span> <span class="menu-arrow"></span></a>
                    <ul class="pcoded-submenu">
                        <li class="{{ route_is('reports') ? 'active active-cover' : '' }}"><a href="{{ route('reports') }}">Rapports</a></li>
                        <!-- Ajouter le lien pour le rapport de stock -->
                        <li class="{{ route_is('stock-report') ? 'active active-cover' : '' }}"><a href="{{ route('stock-report') }}">Rapport de Stock</a></li>
                        <li class="{{ route_is('annual') ? 'active active-cover' : '' }}"><a href="{{ route('annual') }}">Rapport Annuel</a></li>
                        <li class="{{ route_is('annual-category-report') ? 'active active-cover' : '' }}"><a href="{{ route('annual-category-report') }}">Rapport par Catégories</a></li>
                        <li class="{{ route_is('generate-service-sales-report') ? 'active active-cover' : '' }}"><a href="{{ route('generate-service-sales-report') }}">Rapport des Services</a></li>
                        <li class="{{ route_is('sales-purchases-chart') ? 'active active-cover' : '' }}"><a href="{{ route('sales-purchases-chart') }}">Rapport Graphique</a></li>
                    </ul>
                </li>
                @endcan

                @can('view-access-control')
                <li class="nav-item pcoded-hasmenu {{ route_is(('permissions')) || route_is(('add-permissions')) || route_is(('edit-permissions')) || route_is(('roles'))  ? 'active active-cover' : '' }}">
                    <a href="#"><i class="feather icon-lock"></i> <span>Contrôle d'accès</span> <span class="menu-arrow"></span></a>
                    <ul class="pcoded-submenu">
                        @can('view-permission')
                        <li class="nav-item {{ route_is('permissions') ? 'active active-cover' : '' }}"><a href="{{route('permissions')}}">Permissions</a></li>
                        @endcan
                        @can('view-role')
                        <li class="nav-item {{ route_is('roles') ? 'active active-cover' : '' }}"><a href="{{route('roles')}}">Rôles</a></li>
                        @endcan
                    </ul>
                </li>
                @endcan

                @can('view-users')
                <li class=" nav-item  {{ route_is('users') ? 'active active-cover' : '' }}">
                    <a href="{{route('users')}}"><i class="feather icon-users"></i> <span>Utilisateurs</span></a>
                </li>
                @endcan

                <li class="nav-item pcoded-hasmenu {{ route_is(('settings')) || route_is(('backup.index')) ? 'active active-cover' : '' }}">
                    <a href="#"><i class="feather icon-gears"></i> <span>Paramètres du Système</span> <span class="menu-arrow"></span></a>
                    <ul class="pcoded-submenu">
                        @can('view-settings')
                        <li class="{{ route_is('settings') ? 'active active-cover' : '' }}">
                            <a href="{{route('settings')}}">
                                <i class="fa fa-gears"></i>
                                <span>Paramètres</span>
                            </a>
                        </li>
                        @endcan
                        <li class="nav-item  {{ route_is('backup.index') ? 'active active-cover' : '' }}">
                            <a href="{{route('backup.index')}}"><i class="material-icons">backup</i> <span>Sauvegardes</span></a>
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
