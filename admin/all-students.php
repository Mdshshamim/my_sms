<h1 class="text-primary"><i class="fa fa-users">All Student- </i><small>All Student Details</small></i></h1>
<ol class="breadcrumb">
    <li><a href="index.php?page=dashboard"><i class="fa fa-dashboard">Dashboard</i></a></li>
    <li class="active"><a href=""><i class="fa fa-user-plus">Add Student</i></a></li>
</ol>


<table id="data" class="table table-hover table-bordered table-striped">
    <thead>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Roll</th>
            <th>Class</th>
            <th>City</th>
            <th>Contact</th>
            <th>Photo</th>
            <th>Action</th>
        </tr>
    </thead>


    <tbody>
        <?php
        $db_std_info = mysqli_query($link, "SELECT * FROM `students_info`");
        while ($row = mysqli_fetch_assoc($db_std_info))
        {
            ?>

            <tr>
                <td><?php echo $row['id']; ?></td>
                <td><?php echo ucwords($row['name']); ?></td>
                <td><?php echo $row['roll']; ?></td>
                <td><?php echo $row['class']; ?></td>
                <td><?php echo ucwords($row['city']); ?></td>
                <td><?php echo $row['pcontact']; ?></td>
                <td><img src="students_img/<?php echo $row['photo'] ?>" alt="" style="width: 100px; height: 100px"></td>
                <td>
                    <a href="index.php?page=update-student&id=<?php echo base64_encode($row['id']); ?>" class="btn btn-xs btn-warning"><i class="fa fa-pencil">Edit</i></a>
                    <a href="delete_student.php?id=<?php echo base64_encode($row['id']); ?>" class="btn btn-xs btn-danger"><i class="fa fa-trash">Delete</i></a>
                </td>
            </tr>
            <?php
        }
        ?>
    </tbody>
</table>