<?php
require_once './dbcon.php';
session_start();

//Save data in database
if(isset($_POST['registration']))
{
    $name = $_POST['name'];
    $email = $_POST['email'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $c_password = $_POST['c_password'];
    
    $photo = explode('.',$_FILES['photo']['name']);
    $photo = end($photo);
    $photo_name = $username.'.'.$photo;
    
    $input_error = array();
    if(empty($name))
    {
        $input_error['name'] = 'Name Required';
    }
    if(empty($email))
    {
        $input_error['email'] = 'E-Mail Required';
    }
    if(empty($username))
    {
        $input_error['username'] = 'Username Required';
    }
    if(empty($password))
    {
        $input_error['password'] = 'Password Required';
    }
    if(empty($c_password))
    {
        $input_error['c_password'] = 'Confirm Password Required';
    }
    
    
    if(count($input_error) == 0)
    {
        $email_check = mysqli_query($link, "SELECT * FROM users where email = '$email' ");
        $username_check = mysqli_query($link, "SELECT * FROM users where username = '$username' ");
        if(mysqli_num_rows($email_check) == 0 )
        {
            if(mysqli_num_rows($username_check) == 0 )
            {
                if(strlen($username) > 7)
                {
                    if(strlen($password) > 3)
                    {
                        if($password == $c_password)
                        {
                            $password =  md5($password);
                            
                            $value_insert = "INSERT INTO `users`(`name`, `email`, `username`, `password`, `photo`, `status`) VALUES ('$name','$email','$username','$password','$photo_name','inactive') ";
                            $result = mysqli_query($link, $value_insert);
                            
                            if($result)
                            {
                                $_SESSION['data_insert_success'] = "Registration Successful";
                                move_uploaded_file($_FILES['photo']['tmp_name'], 'images/'.$photo_name);
                                header('location: registration.php');
                            }
                            else
                            {
                                $_SESSION['data_insert_error'] = "Registration Failed";
                            }
                        }
                        else
                        {
                            $password_match_error = "Passwords are not Equal";
                        }
                    }
                    else
                    {
                        $password_langth = "Password Must be more then 3 Characters";
                    }
                }
                else
                {
                    $username_langth = "Username must be more then 7 Characters";
                }
            }
            else 
            {
                $username_error = "The Username is already Taken";
            }
        }
        else
        {
            $email_error = "The E-Mail Already Exist";
        }
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
    <link rel="stylesheet" href="../css/style.css">

    
  </head>
  <body class="col-sm-12">
      <div class="container">
          <h1>User Registration Form</h1>
          <!--Success Massage For Registration-->
          
            <?php if(isset($_SESSION['data_insert_success']))
             {
                  echo '<div class="alert alert-success">'.$_SESSION['data_insert_success'].' </div>';
             }    
            ?> 
          
       </div>
          
          <hr>



          <div class="row">
              <div class="col-md-12">
                  <form action="registration.php" method="post" class="form-horizontal" enctype="multipart/form-data">
                      <!--Div For Name-->
                      <div class="form-group">
                          <label for="name" class="control-label col-sm-1">Name</label>
                          <div class="col-sm-4">
                              <input id="name" class="form-control" type="text" name="name" placeholder="Enter Your Name">
                          </div>
                          <label class="error" >
                              <?php
                              if(isset($input_error['name']))
                              {
                                  echo $input_error['name'];
                              }
                              ?>
                          </label>
                      </div>


                      <!--Div For E-Mail-->
                      <div class="form-group">
                          <label for="email" class="control-label col-sm-1">Email</label>
                          <div class="col-sm-4">
                              <input id="email" class="form-control" type="text" name="email" placeholder="Enter Your Email">
                          </div>
                          <label class="error" >
                              <?php
                              if(isset($input_error['email']))
                              {
                                  echo $input_error['email'];
                              }
                              ?>
                              <?php
                              if(isset($email_error))
                              {
                                  echo $email_error;
                              }
                              ?>
                          </label>
                      </div>


                      <!--Div For Username-->
                      <div class="form-group">
                          <label for="username" class="control-label col-sm-1">Username</label>
                          <div class="col-sm-4">
                              <input id="username" class="form-control" type="text" name="username" placeholder="Enter Your Username">
                          </div>
                          <label class="error" >
                              <?php
                              if(isset($input_error['username']))
                              {
                                  echo $input_error['username'];
                              }
                              ?>
                              <?php
                              if(isset($username_error))
                              {
                                  echo $username_error;
                              }
                              ?>
                              <?php
                              if(isset($username_langth))
                              {
                                  echo $username_langth;
                              }
                              ?>
                          </label>
                      </div>


                      <!--Div For Password-->
                      <div class="form-group">
                          <label for="password" class="control-label col-sm-1">Password</label>
                          <div class="col-sm-4">
                              <input id="password" class="form-control" type="password" name="password" placeholder="Enter Your password">
                          </div>
                          <label class="error" >
                              <?php
                              if(isset($input_error['password']))
                              {
                                  echo $input_error['password'];
                              }
                              ?>
                              <?php
                              if(isset($password_langth))
                              {
                                  echo $password_langth;
                              }
                              ?>
                              <?php
                              if(isset($password_match_error))
                              {
                                  echo $password_match_error;
                              }
                              ?>
                          </label>
                      </div>


                      <!--Div For Confrim Password-->
                      <div class="form-group">
                          <label for="c_password" class="control-label col-sm-1">Confrim Password</label>
                          <div class="col-sm-4">
                              <input id="c_password" class="form-control" type="password" name="c_password" placeholder="Enter Your Password again">
                          </div>
                          <label class="error" >
                              <?php
                              if(isset($input_error['c_password']))
                              {
                                  echo $input_error['c_password'];
                              }
                              ?>
                              <?php
                              if(isset($password_match_error))
                              {
                                  echo $password_match_error;
                              }
                              ?>
                          </label>
                      </div>


                      <!--Div For Photo-->
                      <div class="form-group">
                          <label for="photo" class="control-label col-sm-1">Photo</label>
                          <div class="col-sm-4">
                              <input id="photo" class="btn btn-block" type="file" name="photo">
                          </div>
                      </div>

                      
                      <!--Div For Button-->
                      <div class="col-sm-4">
                          <input class="btn btn-primary col-sm-offset-1" type="submit" value="Registration" name="registration">
                      </div>
                  </form>
              </div>

          </div>
          <hr>
          <div>
              <p>If you have account <a href="login.php">Login</a></p>
          </div>
          <footer>
            <p>All Copywrited by Sh Shamim</p>
            
          </footer>
      </div>
  </body>
</html>