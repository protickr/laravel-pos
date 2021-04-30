<nav class="col-md-2 d-none d-md-block bg-dark sidebar shadow">
    <div class="sidebar-sticky">

        <ul class="nav flex-column">

            <li class="nav-item {{ Request::is('/') || Request::is('dashboard') ? 'active':'' }}">
                <a class="nav-link" href="/dashboard">Dashboard </a>
            </li>

            <li class="nav-item {{ Request::is('sales') ? 'active':'' }}">
                <a class="nav-link" href="/sales"> Sales </a>
            </li>

            <li class="nav-item">
                <a class="nav-link {{ Request::is('products') ? 'active':'' }}" href="/products"> Products </a>
            </li>

            <li class="nav-item">
                <a class="nav-link {{ Request::is('customers') ? 'active':'' }}" href="/customers"> Customers </a>
            </li>

            <li class="nav-item {{ Request::is('user') ? 'active':'' }}">
                <a class="nav-link" href="/user"> User</a>
            </li>
        </ul>
    </div>
</nav>
