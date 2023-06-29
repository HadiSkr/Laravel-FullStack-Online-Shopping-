<div class="sidebar" data-color="purple" data-background-color="white" data-image="../assets/img/sidebar-1.jpg">
    <!--
        Tip 1: You can change the color of the sidebar using: data-color="purple | azure | green | orange | danger"

        Tip 2: you can also add an image using data-image tag
    -->
    <div class="logo">
        <a href="#" class="simple-text logo-normal">Tulip</a>
    </div>
    <div class="sidebar-wrapper">
        <ul class="nav">
            <li class="nav-item {{ Request::is('dashboard') ? 'active' : '' }}">
                <a class="nav-link" href="#">
                    <i class="material-icons">dashboard</i>
                    <p>Dashboard</p>
                </a>
            </li>
            <li class="nav-item {{ Request::is('categories') ? 'active' : '' }}">
                <a class="nav-link" href="{{ url('categories') }}">
                    <i class="material-icons">person</i>
                    <p>Categories</p>
                </a>
            </li>
            <li class="nav-item {{ Request::is('add-category') ? 'active' : '' }}">
                <a class="nav-link" href="{{ url('add-category') }}">
                    <i class="material-icons">person</i>
                    <p>Add Category</p>
                </a>
            </li>
            <li class="nav-item {{ Request::is('products') ? 'active' : '' }}">
                <a class="nav-link" href="{{ url('products') }}">
                    <i class="material-icons">person</i>
                    <p>Products</p>
                </a>
            </li>
            <li class="nav-item {{ Request::is('add-product') ? 'active' : '' }}">
                <a class="nav-link" href="{{ url('add-product') }}">
                    <i class="material-icons">person</i>
                    <p>Add Products</p>
                </a>
            </li>
            <li class="nav-item {{ Request::is('orders') ? 'active' : '' }}">
                <a class="nav-link" href="{{ url('orders') }}">
                    <i class="material-icons">content_paste</i>
                    <p>Orders</p>
                </a>
            </li>
            <li class="nav-item {{ Request::is('users') ? 'active' : '' }}">
                <a class="nav-link" href="{{ url('users') }}">
                    <i class="material-icons">persons</i>
                    <p>Users</p>
                </a>
            </li>
            <li class="nav-item {{ Request::is('balance*') ? 'active' : '' }}">
                <a class="nav-link" href="#">
                    <i class="fa fa-money"></i>
                    <p>Virtual Currency</p>
                    <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="{{ route('balance.index') }}" class="nav-link {{ Request::is('balance') ? 'active' : '' }}">
                            <i class="fa fa-list"></i>
                            <p>View Balances</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('balance.edit') }}" class="nav-link {{ Request::is('balance/edit') ? 'active' : '' }}">
                            <i class="fa fa-edit"></i>
                            <p>Edit Balances</p>
                        </a>
                    </li>
                </ul>
            </li>
        </ul>
    </div>
</div>