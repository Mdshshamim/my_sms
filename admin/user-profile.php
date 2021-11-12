<h1 class="text-primary"><i class="fa fa-user-o">User Profile <small>Details</small></i></h1>
<ol class="breadcrumb">
    <li><a href="index.php?page=dashboard"><i class="fa fa-dashboard">Dashboard</i></a></li>
    <li class="active"><i class="fa fa-dashboard">Profile</i></li>
</ol>

<?php

//For Take User data from 'login.php' page
$session_user = $_SESSION['user_login'];
$query = "SELECT * FROM `users` WHERE `username` = '$session_user' ";
$user_data = mysqli_query($link, $query);
//Collect all of Data from 'User' Table
$user_row = mysqli_fetch_assoc($user_data);

?>



<div class="row">
    <div class="col-sm-6">
        <table class="table table-hover table-bordered">
            <tr>
                <td>User ID:</td>
                <td><?= ucwords($user_row['id']);?></td>
            </tr>
            <tr>
                <td>Name:</td>
                <td><?= ucwords($user_row['name']);?></td>
            </tr>
            <tr>
                <td>Username:</td>
                <td><?= ucwords($user_row['username']);?></td>
            </tr>
            <tr>
                <td>E-Mail:</td>
                <td><?= ucwords($user_row['email']);?></td>
            </tr>
            <tr>
                <td>Status:</td>
                <td><?= ucwords($user_row['status']);?></td>
            </tr>
            <tr>
                <td>Signup Date:</td>
                <td><?= ucwords($user_row['datetime']);?></td>
            </tr>
        </table>
        <a href="" class="btn btn-default pull-right">Edit Profile</a>
    </div>
    <div class="col-sm-6 table-bordered">
    <a>
        <img src="images/<?= $user_row['photo']?>" alt="" width="150px" class="img-rounded">
    </a>
        <br>
        <br>
        
        <?php
        if(isset($_POST['upload']))
        {
            $photo = explode('.', $_FILES['photo']['name']);
            $photo = end($photo);
            $photo_name = $session_user.'.'.$photo;
            
            $query = "UPDATE `users` SET `photo`='$photo_name' WHERE `username` = '$session_user' ";
            $upload = mysqli_query($link, $query);
            
           if($upload)
           {
               move_uploaded_file($_FILES['photo']['tmp_name'], 'images/'.$photo_name);
           }
        }
        ?>
        
        <form action="" method="POST" enctype="multipart/form-data">
            <label for="photo">Profile Picture</label>
            <input id="photo" name="photo" type="file" required="">
            
            <input id="submit" type="submit" name="upload" value="Submit Now" class="btn btn-default">
        </form>
</div>
</div>