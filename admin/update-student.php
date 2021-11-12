<h1 class="text-primary"><i class="fa fa-pencil-square-o">Update Student <small>Update Students Info</small></i></h1>
<ol class="breadcrumb">
    <li><a href="index.php?page=dashboard"><i class="fa fa-dashboard">Dashboard</i></a></li>
    <li><a href="index.php?page=all-students"><i class="fa fa-users">All Students</i></a></li>
    <li class="active"><i class="fa fa-pencil">Update Student</i></li>
</ol>

<?php
//It used for Showing Data In Text Fileds
$id = base64_decode($_GET['id']);
$db_data = mysqli_query($link, "SELECT * FROM `students_info` WHERE `id` = '$id' ");
$db_row = mysqli_fetch_assoc($db_data);

//For Update Data
if (isset($_POST['update-student']))
{
    $name = $_POST['name'];
    $roll = $_POST['roll'];
    $city = $_POST['city'];
    $pcontact = $_POST['pcontact'];
    $class = $_POST['class'];

    $query = "UPDATE `students_info` SET `name`='$name',`roll`='$roll',`class`='$class',`city`='$city',`pcontact`='$pcontact' WHERE `id` = '$id' ";
    $result = mysqli_query($link, $query);
    if ($result)
    {
        header('location: index.php?page=all-students');
    }
    else
    {
        echo "Error Updating";
    }
}
?>

<div class="row">
    <div class="col-sm-8">
        <form action="" method="POST" enctype="multipart/form-data">
            <div class="form-group">
                <label for="name">Student Name</label>
                <input id="name" type="text" name="name" placeholder="Student Name" class="form-control" value="<?= $db_row['name'] ?>">

                <label for="roll">Student Roll</label>
                <input id="roll" type="text" name="roll" placeholder="Student Roll" class="form-control" pattern="[0-9]{6}" value="<?= $db_row['roll'] ?>">

                <label for="city">City</label>
                <input id="city" type="text" name="city" placeholder="Student city" class="form-control" value="<?= $db_row['city'] ?>">

                <label for="pcontact">Parents Contact</label>
                <input id="pcontact" type="text" name="pcontact" placeholder="01*****" class="form-control" pattern="01[1|5|3|7|8|9][0-9]{8}" value="<?= $db_row['pcontact'] ?>">

                <label for="class">Class Name</label>
                <select id="class" class="form-control" name="class">
                    <option value="">Select One</option>
                    <option <?php echo $db_row['class'] == '1st' ? 'selected=""' : '' ?> value="1st">1st</option>
                    <option <?php echo $db_row['class'] == '2nd' ? 'selected=""' : '' ?> value="2nd">2nd</option>
                    <option <?php echo $db_row['class'] == '3rd' ? 'selected=""' : '' ?> value="3rd">3rd</option>
                    <option <?php echo $db_row['class'] == '4th' ? 'selected=""' : '' ?> value="4th">4th</option>
                    <option <?php echo $db_row['class'] == '5th' ? 'selected=""' : '' ?> value="5th">5th</option>
                </select>

                <div class="form-group">
                    <input type="submit" name="update-student" value="Update Student" class="btn btn-primary pull-right">
                </div>
            </div>
        </form>
    </div>
</div>
