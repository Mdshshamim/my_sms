<?php
require_once './dbcon.php';
session_start();

//Check SESSION
if(isset($_SESSION['user_login']))
        {
            header('location: index.php');
        }
        

//Check Login Details
if(isset($_POST['login']))
    {
    $username = $_POST['username'];
    $password = $_POST['password'];
    
    $username_check = mysqli_query($link, "SELECT * FROM `users` WHERE `username` = '$username'");
   
    if(mysqli_num_rows($username_check) > 0)
    {
        $details_of_row = mysqli_fetch_assoc($username_check);
        if($details_of_row['password'] == md5($password))
        {
            if($details_of_row['status'] == 'active')
            {
                $_SESSION['user_login'] = $username;
                header('location: index.php');
            }
            else
            {
                $status_inactive = "Status Inactive";
            }
            //$username_found = "You are Successfully Login";
        }
        else
        {
            $password_notfound = "Password Error";
        }
    }
    else
    {
        $username_notfound = "This Username not found";
    }
}

?>




<!doctype html>
<html lang="en">
  <head>
	  <title>Mini Projects Login Page</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/animate.css">

    
  </head>
  <body>
      <div class="container animated shake">
          <h1 class="text-center">Student Management system Login</h1>
          <div class="row">
              <div class="col-sm-4 col-sm-offset-4">
                  <h2 class="text-center">Admin Login form</h2>
                  <form action="login.php" method="post">
                      <div>
                          <input type="text" placeholder="Username" required="" class="form-control" name="username" value="<?php if(isset($username)) {echo $username ;} ?>"
                      </div>
                      <div>
                          <br>
                          <input type="password" placeholder="Password" required="" class="form-control" name="password"value="<?php if(isset($password)) {echo $password ;} ?>"
                      </div>
                      <div>
                          <br><input type="submit" value="Submit" class="btn btn-info pull-left" name="login">
                      </div>
                  </form>
                  
                  <br>
                  <br>
                    <!--Showing Error Massage-->
                      <?php
                      if(isset($username_notfound))
                      {
                          echo '<div class="alert alert-danger col-sm-8 col-sm-offset-0">'.$username_notfound.'</div>';
                          
                      }
                      ?>
                  
                      <?php
                      if(isset($password_notfound))
                      {
                          echo '<div class="alert alert-danger col-sm-8 col-sm-offset-0">'.$password_notfound.'</div>';
                          
                      }
                      ?>
                  
                      <?php
                      if(isset($status_inactive))
                      {
                          echo '<div class="alert alert-danger col-sm-8 col-sm-offset-0">'.$status_inactive.'</div>';
                          
                      }
                      ?>
                  
                  </div>
              </div>
          </div>
      </div>
  </body>
</html>