<nav class = "d-flex align-items-center justify-content-between px-5" style = "background-color: #1a1a1a; margin-top:-80px">
    <a href="/Basic-E-Commerce-Application/admin_panel/dashboard.php">
        <h1 style = "font-size: 28px; margin-top:8px; color:white">Admin | Yigit's Store</h1>
    </a>
    <ul class="nav navbar-nav pull-right">
        <li class="dropdown">
            <a class="dropdown-toggle" data-toggle="dropdown" href="javascript:;">
                <i class="fa fa-user"></i>
                <?php echo $_SESSION['admin_username']; ?>
            </a>

            <ul class="dropdown-menu" role="menu" style = "position: absolute">
                <li>
                    <a href="logout.php">
                        <i class="fa fa-sign-out"></i> 
                        &nbsp;&nbsp;Logout
                    </a>
                </li>
            </ul>
        </li>
    </ul>
</nav>