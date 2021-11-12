<h1 class="text-primary"><i class="fa fa-user-plus">Add Student <small>Add New Students</small></i></h1>
<ol class="breadcrumb">
    <li><a href="index.php?page=dashboard"><i class="fa fa-dashboard">Dashboard</i></a></li>
    <li class="active"><i class="fa fa-user-plus">Add Student</i></li>
</ol>

<?php
if (isset($_POST['add-student']))
{
    $name = $_POST['name'];
    $roll = $_POST['roll'];
    $city = $_POST['city'];
    $pcontact = $_POST['pcontact'];
    $class = $_POST['class'];

    $picture = explode('.', $_FILES['picture']['name']);
    $picture_extn = end($picture);
    $picture_name = $roll.'.'.$picture_extn;

    $query = "INSERT INTO `students_info`(`name`, `roll`, `class`, `city`, `pcontact`, `photo`) VALUES ('$name','$roll','$class','$city','$pcontact','$picture_name')";
    $result = mysqli_query($link, $query);

    if ($result)
    {
        $success = "Data Insert Success";
        move_uploaded_file($_FILES['picture']['tmp_name'], 'students_img/'.$picture_name);
    }
    else
    {
        $error = "Wrong";
    }
}
?>


<div class="row">
    <?php
    if(isset($success))
    {
        echo '<p class="alert alert-success">'.$success.'</p>';
    }
    if(isset($error))
    {
        echo '<p class="alert alert-success">'.$error.'</p>';
    }
    ?>
</div>
<div class="row">
    <div class="col-sm-8">
        <form action="" method="POST" enctype="multipart/form-data">
            <div class="form-group">
                <label for="name">Student Name</label>
                <input id="name" type="text" name="name" placeholder="Student Name" class="form-control">

                <label for="roll">Student Roll</label>
                <input id="roll" type="text" name="roll" placeholder="Student Roll 6 Digit number" class="form-control" pattern="[0-9]{6}">

                <label for="city">City</label>
                <input id="city" type="text" name="city" placeholder="Student city" class="form-control">

                <label for="pcontact">Parents Contact</label>
                <input id="pcontact" type="text" name="pcontact" placeholder="01*****" class="form-control" pattern="01[1|5|3|7|8|9][0-9]{8}">

                <label for="class">Class Name</label>
                <select id="class" class="form-control" name="class">
                    <option value="">Select One</option>
                    <option value="1st">1st</option>
                    <option value="2nd">2nd</option>
                    <option value="3rd">3rd</option>
                    <option value="4th">4th</option>
                    <option value="5th">5th</option>
                </select>

                <div class="form-group">
                    <label for="picture">Picture</label>
                    <input type="file" name="picture" id="picture" class="bnt btn-link">
                </div>

                <div class="form-group">
                    <input type="submit" name="add-student" value="Add Student" class="btn btn-primary pull-right">
                </div>


            </div>
        </form>
    </div>
</div>