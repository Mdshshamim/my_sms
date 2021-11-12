<?php
require_once './dbcon.php';
session_start();

if (!isset($_SESSION['user_login']))
{
    header('location: login.php');
}
?>


<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
        <title>SMS</title>

        <!-- Bootstrap -->
        <link href="../css/bootstrap.min.css" rel="stylesheet">
        <link href="../css/font-awesome.min.css" rel="stylesheet">
        <link href="../css/style.css" rel="stylesheet">
        <link href="../css/dataTables.bootstrap4.min.css" rel="stylesheet">
        <!--Java Scripts-->
        <script src="../js/jquery-3.3.1.js" type="text/javascript"></script>
        <script src="../js/jquery.dataTables.min.js" type="text/javascript"></script>
        <script src="../js/dataTables.bootstrap4.min.js" type="text/javascript"></script>
        <script src="../js/script.js" type="text/javascript"></script>

    </head>
    <body>
        <nav class="navbar navbar-inverse">
            <div class="container-fluid">
                <!-- Brand and toggle get grouped for better mobile display -->
                <div class="navbar-header">

                    <a class="navbar-brand" href="index.php">SMS</a>
                </div>

                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                    <ul class="nav navbar-nav navbar-right">
                        <li><a href="#"><i class="fa fa-user"></i>Welcome: Sajjad Hossen</a></li>
                        <li><a href="#"><i class="fa fa-user-md"></i>Add User</i></a></li>
                        <li><a href="index.php?page=user-profile"><i class="fa fa-user-circle"></i>Profile</a></li>
                        <li><a href="logout.php"><i class="fa fa-power-off"></i>Logout</a></li>
                    </ul>
                </div><!-- /.navbar-collapse -->
            </div><!-- /.container-fluid -->
        </nav>
        <!--For Left Side Dashboard-->
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-3">
                    <div class="list-group">
                        <a href="index.php?page=dashboard" class="list-group-item active"><i class="fa fa-dashboard">Dashboard</i></a>
                        <a href="index.php?page=add-student" class="list-group-item"><i class="fa fa-user-plus">Add Students</i></a>
                        <a href="index.php?page=all-students" class="list-group-item"><i class="fa fa-users">All Students</i></a>
                        <a href="index.php?page=all-users" class="list-group-item"><i class="fa fa-users">All Users</i></a>

                    </div>
                </div>
                <div class="col-sm-9">


                    <!-- Redirect Pages after click -->
                    <div class="content">
                        <?php
                        if (isset($_GET['page']))
                        {
                            $page = $_GET['page'].'.php';
                        }
                        else
                        {
                            $page = "dashboard.php";
                        }


                        //If Page not exists
                        if (file_exists($page))
                        {
                            require_once $page;
                        }
                        else
                        {
                            require_once '404.php';
                        }
                        ?>
                    </div>

                </div>
            </div>
        </div>
        <footer class="footer-area">
            <p>Copywrite by Sh Creation | Sajjad</p>
        </footer>
    </body>
</html>