<!doctype html>
<html lang="en">
    <head>
        <title>Mini Projects</title>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="css/bootstrap.min.css">
        <link rel="stylesheet" href="css/animate.css">



    </head>
    <body>
        <div class="container animated shake">
            <br>
            <a href="admin/login.php" class="btn btn-primary pull-right">Login here</a>
            <h1 class="text-center">Students Managment System</h1>
            <br>
            <div class="row">
                <div class="col-sm-4 col-sm-offset-4">
                    <form action="" method="post">
                        <table class="table table-bordered">
                            <tr>
                                <th class="text-center" colspan="2"><label>Student Info</label></th>
                            </tr>
                            <tr>
                                <td><label for="choose">Choose Class</label></td>
                                <td>
                                    <select class="form-control" id="choose" name="choose">
                                        <option value="">Select One</option>
                                        <option value="1st">1st</option>
                                        <option value="2nd">2nd</option>
                                        <option value="3rd">3rd</option>
                                        <option value="4th">4th</option>
                                        <option value="5th">5th</option>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td><label class="form-control" for="roll">Roll</label></td>
                                <td><input name="roll" type="text" pattern="[0-9]{6}" placeholder="Enter 6 digits Roll"></td>
                            </tr>
                            <tr>
                                <td class="text-center"><input class="btn btn-default" name="show_info" colspan="2" type="submit" value="Show Info"></td>
                            </tr>

                        </table>
                    </form>


                    <?php
                    require_once './admin/dbcon.php';

                    if (isset($_POST['show_info']))
                    {
                        $choose = $_POST['choose'];
                        $roll = $_POST['roll'];

                        $query = "SELECT * FROM `students_info` WHERE `class`='$choose' and `roll`='$roll' ";
                        $db_con = mysqli_query($link, $query);

                        $row_data = mysqli_fetch_assoc($db_con);

                        if (mysqli_num_rows($db_con) == 1)
                        {
                            ?>
                            <div class = "row">
                                <div class = "col-sm-9 col-sm-offset-2">
                                    <table class = "table table-bordered">
                                        <tr>
                                            <td rowspan = "4">
                                                <img src = "admin/students_img/<?= $row_data['photo']; ?>" width = "100px" class = "img-thumbnail">
                                            </td>
                                            <td>Name</td>
                                            <td><?= $row_data['name']; ?></td>
                                        </tr>
                                        <tr>
                                            <td>Roll</td>
                                            <td><?= $row_data['roll']; ?></td>
                                        </tr>
                                        <tr>
                                            <td>Class</td>
                                            <td><?= $row_data['class']; ?></td>
                                        </tr>
                                        <tr>
                                            <td>City</td>
                                            <td><?= $row_data['city']; ?></td>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                            <?php
                        }
                        else
                        {
                            ?>
                            <script type="text/javascript">
                                alert('Data Not Found');
                            </script>
                            <?php
                        }
                    }
                    ?>

                </div>
            </div>
        </div>
    </body>
</html>