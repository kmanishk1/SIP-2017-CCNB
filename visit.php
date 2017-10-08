<?php
if (!isset($_SESSION)) session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>View post : CCNB</title>
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

    <div style="margin: 20px">
        <form action="index.php" method="post">
            <button class="form1 btn btn-success btn-block">Back</button>
        </form>
    </div>

    <?php
        $department = addslashes($_POST['department']);
        echo '<div class="form"><h2 id="head">'.stripslashes($department).'</h2></div>';
    ?>

    <div class="container-fluid" style="max-width:80%;">
        <?php
            require 'connect.php';

            if (isset($_POST['department'])) {

                GLOBAL $department;
                $query = "SELECT * FROM departments WHERE department='$department'";
                $result = mysqli_query($mysql, $query) or die('<h3>Sorry! Couldn\'t connect.</h3>');
                while ($row = mysqli_fetch_assoc($result)) {
                    $departmentID = $row['departmentId'];


                    GLOBAL $departmentID;
                    $query1 = "SELECT * FROM login_details WHERE departmentId='$departmentID'";
                    $result1 = mysqli_query($mysql, $query1) or die('<h3>Sorry! Couldn\'t connect.1</h3>');
                    while ($row1 = mysqli_fetch_assoc($result1)) {
                        $username = $row1['username'];

                        GLOBAL $username;
                        $query2 = "SELECT * FROM notification WHERE username='$username' ORDER BY notificationId DESC";
                        $result2= mysqli_query($mysql, $query2) or die('<h3>Sorry! Couldn\'t connect.2</h3>');
                        while ($row2 = mysqli_fetch_assoc($result2)) {
                            $time = $row2['time_stamp'];
                            $heading = $row2['heading'];
                            $description = $row2['description'];

                            echo '<div class="row" style="padding: 10px; border-radius: 10px; overflow: scroll; margin: 20px; background-color: dimgrey; text-align: center"><div style="overflow: scroll; padding: 15px; border-radius: 5px; background-color: dimgrey; text-align: center"><span style="color: orange"><i class="fa fa-calendar" style="color: oldlace"></i> ' . $time . '</span><h4 style="color: #333333;  background-color: azure; padding: 10px; border-radius: 5px; font-size: 16px;">' . $heading . '</h4><p style="color: aliceblue; white-space: pre-line">' . $description . '</p></div></div>';
                        }
                    }

                }
            } else {
                echo "<h3 style='text-align: center; color: coral; margin-bottom: 10px'>Please <span style='color: red'>try</span> again.</h3>";
            }

        ?>
    </div>
    <div style="margin: 20px">
        <form action="index.php" method="post">
            <button class="form1 btn btn-success btn-block">Back</button>
        </form>
    </div>

</body>
</html>