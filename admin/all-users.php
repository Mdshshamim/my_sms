<h1 class="text-primary"><i class="fa fa-users">All Users- </i><small>All Users Details</small></i></h1>
<ol class="breadcrumb">
    <li><a href="index.php?page=dashboard"><i class="fa fa-dashboard">Dashboard</i></a></li>
    <li class="active"><a href="all-students.php"><i class="fa fa-user-plus">All Students</i></a></li>
</ol>


<table id="data" class="table table-hover table-bordered table-striped">
    <thead>
        <tr>
            <!--<th>ID</th>-->
            <th>Name</th>
            <th>E-Mail</th>
            <th>User Name</th>
            <th>City</th>
            <th>Photo</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $db_std_info = mysqli_query($link, "SELECT * FROM `users`");
        while ($row = mysqli_fetch_assoc($db_std_info))
        {
            ?>

            <tr>
                <td><?php echo ucwords($row['name']); ?></td>
                <td><?php echo $row['email']; ?></td>
                <td><?php echo $row['username']; ?></td>
                <td><?php echo $row['name']; ?></td>
                <td><img src="images/<?php echo $row['photo'] ?>" alt="" style="width: 100px; height: 100px"></td>
            </tr>
            <?php
        }
        ?>
    </tbody>
</table>