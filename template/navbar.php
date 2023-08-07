<!-- Sidebar Toggle (Topbar) -->
<button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-0">
    <i class="fa fa-bars"></i>
</button>

<!-- Topbar Navbar -->
<ul class="navbar-nav mr-auto">

    <!-- Nav Item - User Information -->
    <li class="nav-item dropdown no-arrow">
        <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <img class="img-profile rounded-circle"
                src="assets/img/user_2.png">
            <span class="ml-2 d-none d-md-inline text-gray-600 small"><?= $_SESSION['user']; ?> | Admin</span>
        </a>
    </li>

</ul>

<ul class="navbar-nav ml-auto">
    <a class="nav-link small" href="#" data-toggle="modal" data-target="#logoutModal" 
    style="text-decoration: none;">
        <i class="fas fa-sign-out-alt fa-fw text-gray-600"></i> Logout
    </a>
</ul>