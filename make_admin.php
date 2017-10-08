<?php
if (!isset($_SESSION)) session_start();

    if (($_SESSION['userlevel'] === NULL) OR ($_SESSION['userlevel'] == 0)) {
        die ("<h3 style='text-align: center; color: coral; margin-bottom: 10px'><span style='color: red'>Haha</span>! C'mon you can do better!</h3><form style='text-align: center' action=\"logout.php\" method=\"post\"><button style='font-size: larger' class=\"form1 btn btn-info btn-block\">Back</button><br/><br/></form>");
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Make Admin (Admin) : CCNB</title>
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
            require 'connect.php';

            if (isset($_SESSION['departId'])) {
                $departmentID = $_SESSION['departId'];
                $name = $_SESSION['anonymous'];

                $query = "SELECT * FROM login_details WHERE departmentId='$departmentID'";
                $result = mysqli_query($mysql, $query) or die ("<h3>Sorry! Couldn\'t connect!.1</h3>");
                while ($row = mysqli_fetch_assoc($result)) {
                    $userlevel = $row['userlevel'];

                    if (($userlevel === NULL) OR ($userlevel == 0)) {

                        $query1 = "UPDATE login_details SET userlevel='1' WHERE departmentId='$departmentID'";
                        $result1 = mysqli_query($mysql, $query1) or die ("<h3>Sorry! Couldn\'t connect!.2</h3>");

                        echo "<h3 style='text-align: center; color: #2daae4; margin-bottom: 10px'>Dear <span style='color: dodgerblue'>" . $_SESSION['name'] . "</span>, <span style='color: dodgerblue'>" . $name . "</span> is an <span style='color: dodgerblue'>Admin</span> now!</h3>";
                        echo '<div class="form">
                                    <a href="make_user.php" class="form2 btn btn-info btn-block">Make User</a>
                                </div>
                                <form action="edit_others_user.php" method="post">
                                    <button class="form1 btn btn-warning btn-block">Back</button>
                                </form>';
                    } else {
                        echo "<h3 style='text-align: center; color: #2daae4; margin-bottom: 10px'>Dear <span style='color: dodgerblue'>" . $_SESSION['name'] . "</span>, <span style='color: dodgerblue'>" . $name . "</span> is already an <span style='color: dodgerblue'>Admin</span>!</h3>";
                        echo '<div class="form">
                                    <a href="make_user.php" class="form2 btn btn-info btn-block">Make User</a>
                                </div>
                                <form action="edit_others_user.php" method="post">
                                    <button class="form1 btn btn-warning btn-block">Back</button>
                                </form>';
                    }
                }
            } else {
                echo "<h3 style='text-align: center; color: coral; margin-bottom: 10px'><span style='color: red'>Something, somewhere</span> went wrong!</h3>";
                include 'edit_userlevel.php';
            }

    ?>

</body>
</html>