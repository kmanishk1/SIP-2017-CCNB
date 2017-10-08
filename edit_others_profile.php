<?php
if (!isset($_SESSION)) session_start();

    if (($_SESSION['userlevel'] === NULL) OR ($_SESSION['userlevel'] == 0)) {
        die ("<h3 style='text-align: center; color: coral; margin-bottom: 10px'><span style='color: red'>Haha</span>! C'mon you can do better!</h3><form style='text-align: center' action=\"logout.php\" method=\"post\"><button style='font-size: larger' class=\"form1 btn btn-info btn-block\">Back</button><br/><br/></form>");
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Edit Others' Profile (Admin) : CCNB</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">
    <link rel="shortcut icon" href="img/logo.png" type="image/x-icon">
    <link rel="icon" href="img/logo.png" type="image/x-icon">
</head>
<body>
    <?php
        echo "<h3 style='text-align: center; color: #2daae4; margin-bottom: 10px'>Hello <span style='color: dodgerblue'>" . $_SESSION['name'] . "</span>, welcome to <span style='color: dodgerblue'>Control Panel</span>.</h3>";
    ?>

    <form class="form">
        <h1 class="heading" id="head">Control Panel</h1>
    </form>
    <div style="margin: 20px">
        <form action="loggedin.php" method="post">
            <button class="form1 btn btn-warning btn-block">Back</button>
        </form>
    </div>
    <div class="row" style="overflow: scroll">
        <?php
            require 'connect.php';

            $query = "SELECT * FROM contact_info";
            $result = mysqli_query($mysql, $query) or die('<h3>Sorry! Couldn\'t connect. (0)</h3>');
            while ($row = mysqli_fetch_assoc($result)) {
                $departmentID = $row['departmentId'];

                if ($departmentID != $_SESSION['departmentId']) {

                    $query1 = "SELECT * FROM login_details WHERE departmentId='$departmentID'";
                    $result1 = mysqli_query($mysql, $query1) or die('<h3>Sorry! Couldn\'t connect. (1)</h3>');
                    while ($row1 = mysqli_fetch_assoc($result1)) {
                        $name = $row1['name'];

                        $query2 = "SELECT * FROM departments WHERE departmentId='$departmentID'";
                        $result2 = mysqli_query($mysql, $query2) or die('<h3>Sorry! Couldn\'t connect. (2)</h3>');
                        while ($row2 = mysqli_fetch_assoc($result2)) {
                            $department = $row2['department'];

                            $query3 = "SELECT * FROM contact_info WHERE departmentId='$departmentID'";
                            $result3 = mysqli_query($mysql, $query3) or die('<h3>Sorry! Couldn\'t connect. (3)</h3>');
                            while ($row3 = mysqli_fetch_assoc($result3)) {
                                $designation = $row3['designation'];

                                echo '<div class="col-lg-3" style="padding: 20px; overflow: scroll"><div style="padding: 25px; border-radius: 5px; text-align: center; max-height: 500px; min-height: 500px; overflow: scroll; background-color: dimgrey;"><h4 class="form2" style="color: white">'.$department.'</h4><h4 class="form-control" style="color: #333333">'.$name.'</h4><h6 class="form-control" style="color: #333333">'.$designation. '</h6><form action="edit_others_user.php" method="post"><button value="' .$departmentID.'" type="submit" name="departmentid" class="form1 btn btn-info btn-block">Edit profile</button></form><form action="delete_others_user.php" method="post"><button value="' .$departmentID.'" type="submit" name="departmentid" class="form1 btn btn-danger btn-block">Delete account</button></form></div></div>';

                            }
                        }
                    }
                }
            }

        ?>
    </div>

    <div style="margin: 20px">
        <form action="loggedin.php" method="post">
            <button class="form1 btn btn-warning btn-block">Back</button>
        </form>
    </div>

</body>
</html>