<?php
if (!isset($_SESSION)) session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Contact us : CCNB</title>
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
    <div class="form"><h2 id="head">Contact info</h2></div>
    <!-- content -->
    <div class="container-fluid" style="max-width: 95%">
        <div class="row" style="overflow: scroll;">
            <?php
            require "connect.php";

            $query = "SELECT * FROM contact_info";
            $result = mysqli_query($mysql, $query) or die('<h3>Sorry! Couldn\'t connect. (0)</h3>');
            while ($row = mysqli_fetch_assoc($result)) {
                $departmentID = $row['departmentId'];

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
                            $website = $row3['website'];
                            $phone = $row3['phone'];
                            $email = $row3['email'];

                            echo '<div class="col-lg-3" style="padding: 10px;"><div style="padding: 15px; border-radius: 5px; text-align: center; overflow: scroll; max-height: 400px; min-height: 400px; background-color: dimgrey;"><h4 class="form2" style="color: white">'.$department.'</h4><h4 class="form-control" style="color: #333333">'.$name.'</h4><h6 class="form-control" style="color: #333333">'.$designation.'</h6><p style="color: aliceblue"><a style="color: aliceblue" href="'.$website.'" target="_blank"><i class="fa fa-globe fa-lg"></i></a><br/></p><p style="color: aliceblue"><i class="fa fa-phone-square fa-lg"></i> : '.$phone.'<br/></p><p style="color: aliceblue"><i class="fa fa-envelope-o fa-lg"></i> : '.$email.'</p></div></div>';

                        }
                    }
                }

            }

            ?>
        </div>
    </div>
    <!-- footer -->
    <?php
        include 'footer.php';
    ?>
</body>
</html>