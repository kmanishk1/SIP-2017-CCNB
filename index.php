<?php
    if (!isset($_SESSION)) session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Centralised College Notice Board</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script src="js/index.js"></script>
    <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">
    <link rel="shortcut icon" href="img/logo.png" type="image/x-icon">
    <link rel="icon" href="img/logo.png" type="image/x-icon">
</head>
<body>
    <!-- header -->
    <?php
        include 'header.php';
    ?>
    <!-- background image -->
    <div class="container-fluid">
        <div class="row" style="max-height: 500px; min-height: 500px; overflow: hidden;">
            <div class="image">
                <img src="img/bg.png" alt="Centralised College Notice Board" />
                <h1 class="col-lg-12">Centralised College Notice Board</h1>
            </div>
        </div>
    </div>
    <!-- content -->
    <div class="form"><h2 id="head">Recent Posts</h2></div>
    <div class="container-fluid" style="max-width: 80%;">
            <?php
                require "connect.php";

                    $query = "SELECT * FROM notification ORDER BY notificationId DESC LIMIT 10";
                    $result = mysqli_query($mysql, $query) or die('<h3>Sorry! Couldn\'t connect. (0)</h3>');
                    while ($row = mysqli_fetch_assoc($result)) {
                        $notificationID = $row['notificationId'];

                        $query1 = "SELECT * FROM notification WHERE notificationId='$notificationID'";
                        $result1 = mysqli_query($mysql, $query1) or die('<h3>Sorry! Couldn\'t connect. (1)</h3>');

                        while ($row1 = mysqli_fetch_assoc($result1)) {
                            $username = $row1['username'];
                            $heading = $row1['heading'];
                            $description = $row1['description'];
                            $time_stamp = $row1['time_stamp'];

                            $query2 = "SELECT * FROM login_details WHERE username='$username'";
                            $result2 = mysqli_query($mysql, $query2) or die('<h3>Sorry! Couldn\'t connect. (2)</h3>');

                            while ($row2 = mysqli_fetch_assoc($result2)) {
                                $departmentID = $row2['departmentId'];

                                $query3 = "SELECT * FROM departments WHERE departmentId='$departmentID'";
                                $result3 = mysqli_query($mysql, $query3) or die('<h3>Sorry! Couldn\'t connect. (3)</h3>');

                                while ($row3 = mysqli_fetch_assoc($result3)) {
                                    $department = $row3['department'];

                                    echo '<div class="row" style="padding: 10px; min-height: 200px; border-radius: 10px; overflow: auto; margin: 20px; background-color: dimgrey; text-align: center"><div class="col-lg-2"><span style="color: orange;"><i class="fa fa-calendar" style="color: oldlace"></i> ' . $time_stamp . '</span><h4 class="form1" id="head" style="color: white;">' . $department . '</h4></div><div class="col-lg-8"><h4 style="color: #333333; background-color: azure; padding: 10px; border-radius: 5px;font-size: 16px;">' . $heading . '</h4><p style="color: aliceblue; white-space: pre-line; margin-top: 20px">' . $description . '</p></div><div class="col-lg-2"><form style="text-align: center; margin: 30px" method="post" action="visit.php"><button name="department" value="' . $department . '" type="submit" class="form btn btn-info">Visit other posts</button><br/></form></div></div>';
                                }
                            }
                        }
                    }
            ?>
    </div>
    <!-- footer -->
    <?php
        include 'footer.php';
    ?>
</body>
</html>