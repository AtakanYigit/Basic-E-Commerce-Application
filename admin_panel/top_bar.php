    
    <header id="header">

        <h1 id="site-logo">
            <a href="">
                <img src="admin_template/Theme/img/logos/logo.png" alt="Site Logo" />
            </a>
        </h1>   

        <a href="javascript:;" data-toggle="collapse" data-target=".top-bar-collapse" id="top-bar-toggle" class="navbar-toggle collapsed">
            <i class="fa fa-cog"></i>
        </a>

        <a href="javascript:;" data-toggle="collapse" data-target=".sidebar-collapse" id="sidebar-toggle" class="navbar-toggle collapsed">
            <i class="fa fa-reorder"></i>
        </a>

    </header> <!-- header -->


    <nav id="top-bar" class="collapse top-bar-collapse">

        <!-- <ul class="nav navbar-nav pull-left">
            <li class="">
                <a href="./index.html">
                    <i class="fa fa-home"></i> 
                    Home
                </a>
            </li>

            <li class="dropdown">
                <a class="dropdown-toggle" data-toggle="dropdown" href="javascript:;">
                    Dropdown <span class="caret"></span>
                </a>

                <ul class="dropdown-menu" role="menu">
                    <li><a href="javascript:;"><i class="fa fa-user"></i>&nbsp;&nbsp;Example #1</a></li>
                    <li><a href="javascript:;"><i class="fa fa-calendar"></i>&nbsp;&nbsp;Example #2</a></li>
                    <li class="divider"></li>
                    <li><a href="javascript:;"><i class="fa fa-tasks"></i>&nbsp;&nbsp;Example #3</a></li>
                </ul>
            </li>
            
        </ul> -->

        <ul class="nav navbar-nav pull-right">
            <li class="dropdown">
                <a class="dropdown-toggle" data-toggle="dropdown" href="javascript:;">
                    <i class="fa fa-user"></i>
                    <?php echo $_SESSION['admin_username']; ?>
                    <span class="caret"></span>
                </a>

                <ul class="dropdown-menu" role="menu">
                    <!-- <li>
                        <a href="./page-profile.html">
                            <i class="fa fa-user"></i> 
                            &nbsp;&nbsp;My Profile
                        </a>
                    </li>
                    <li>
                        <a href="./page-calendar.html">
                            <i class="fa fa-calendar"></i> 
                            &nbsp;&nbsp;My Calendar
                        </a>
                    </li>
                    <li>
                        <a href="./page-settings.html">
                            <i class="fa fa-cogs"></i> 
                            &nbsp;&nbsp;Settings
                        </a>
                    </li> -->
                    <li class="divider"></li>
                    <li>
                        <a href="logout.php">
                            <i class="fa fa-sign-out"></i> 
                            &nbsp;&nbsp;Logout
                        </a>
                    </li>
                </ul>
            </li>
        </ul>

    </nav> <!-- /#top-bar -->

