<?php
include("config.php");

include("logged_in_check.php");

?>

<?php include('header.php'); ?>

<body>

<div id="wrapper">


    <?php include('top_bar.php'); ?>

    <?php include('left_sidebar.php'); ?>

    
    <div id="content">      
        
        <div id="content-header">
            <h1>Dashboard</h1>
        </div> <!-- #content-header --> 


        <div id="content-container">


            <div class="row">

                <div class="col-md-12 col-xs-12">

                    <h1>Welcome to Dashboad, <?php echo $_SESSION['admin_username']; ?></h1>

                </div> <!-- /.col -->

            </div> <!-- /.row -->

        </div> <!-- /#content-container -->
        

    </div> <!-- #content -->    
    
</div> <!-- #wrapper -->

<?php include('footer.php'); ?>

</body>
</html>




