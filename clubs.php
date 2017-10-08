<?php
    if (!isset($_SESSION)) session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Clubs : CCNB</title>
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
    <!-- content -->
    <div class="form"><h2 id="head">Departments & Clubs</h2></div>
    <div class="container-fluid" style="max-width: 95%">
        <div class="row">
            <?php
                require "connect.php";

                $query = "SELECT * FROM departments";
                $result = mysqli_query($mysql, $query) or die('<h3>Sorry! Couldn\'t connect. (0)</h3>');
                while ($row = mysqli_fetch_assoc($result)) {
                    $departmentID = $row['departmentId'];

                        $query1 = "SELECT * FROM departments WHERE departmentId='$departmentID'";
                        $result1 = mysqli_query($mysql, $query1) or die('<h3>Sorry! Couldn\'t connect. (1)</h3>');
                        while ($row1 = mysqli_fetch_assoc($result1)) {
                            $department = $row1['department'];
                            $description = $row1['dep_description'];
                            $link = $row1['linked'];

                            echo '<div class="col-lg-3" style="padding: 10px;"><div style="overflow: scroll; padding: 15px; text-align: center; border-radius: 5px; max-height: 700px; min-height: 700px; background-color: dimgrey;"><h3 class="form2"><a id="link" style="color: aliceblue" href="' . $link . '" target="_blank">' . $department . '</a></h3><p style="color: white; white-space: pre-line">' . $description . '</p><form style="margin-top: 80px" method="post" action="visit2.php"><button name="department" value="' . $department . '" type="submit" class="form1 btn btn-primary btn-block">Visit posts</button></form></div></div>';
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
