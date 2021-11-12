<h1 class="text-primary"><i class="fa fa-dashboard">Dashboard <small>statistic Overview</small></i></h1>

<ol class="breadcrumb">
    <li class="active"><i class="fa fa-dashboard">Dashboard</i></li>
</ol>


<?php
$query_std = "SELECT * FROM `students_info`";
$con_student = mysqli_query($link, $query_std);
$count_student = mysqli_num_rows($con_student);

$query_usr = "SELECT * FROM `users`";
$con_user = mysqli_query($link, $query_usr);
$count_user = mysqli_num_rows($con_user);
?>


<div class="row">
    <div class="col-sm-4">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-3">
                        <i class="fa fa-user fa-5x"></i>
                    </div>
                    <div class="col-xs-9">
                        <div class="pull-right" style="font-size: 45px"><?= $count_student; ?></div>
                        <div class="clearfix"></div>
                        <div class="pull-right">All Students</div>
                    </div>
                </div>
            </div>

            <a href="index.php?page=all-students">
                <div class="panel-footer">
                    <span class="pull-left">All Students</span>
                    <span class="pull-right"><i class="fa fa-arrow-circle-o-right"></i></span>
                    <div class="clearfix"></div>
                </div>
            </a>
        </div>
    </div>


    <div class="col-sm-4">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-3">
                        <i class="fa fa-user fa-5x"></i>
                    </div>
                    <div class="col-xs-9">
                        <div class="pull-right" style="font-size: 45px"><?= $count_user; ?></div>
                        <div class="clearfix"></div>
                        <div class="pull-right">All Users</div>
                    </div>
                </div>
            </div>
            <a href="index.php?page=all-users">
                <div class="panel-footer">
                    <span class="pull-left">All Users</span>
                    <span class="pull-right"><i class="fa fa-arrow-circle-o-right"></i></span>
                    <div class="clearfix"></div>
                </div>
            </a>
        </div>
    </div>
</div>

<hr/>
<h3>New Students</h3>
<table id="data" class="table table-hover table-bordered table-striped">
    <thead>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Roll</th>
            <th>City</th>
            <th>Contact</th>
            <th>Photo</th>
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
                <td><?php echo ucwords($row['city']); ?></td>
                <td><?php echo $row['pcontact']; ?></td>
                <td><img src="students_img/<?php echo $row['photo'] ?>" alt="" style="width: 50px; height: 50px"></td>
            </tr>
            <?php
        }
        ?>
    </tbody>
</table>