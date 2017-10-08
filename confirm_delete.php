<?php
    if (!isset($_SESSION)) session_start();

    if (($_SESSION['userlevel'] === NULL) OR ($_SESSION['userlevel'] == 0)) {
        die ("<h3 style='text-align: center; color: coral; margin-bottom: 10px'><span style='color: red'>Haha</span>! C'mon you can do better!</h3><form style='text-align: center' action=\"logout.php\" method=\"post\"><button style='font-size: larger' class=\"form1 btn btn-info btn-block\">Back</button><br/><br/></form>");
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Confirm Delete Account (Admin) : CCNB</title>
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

        if (isset($_SESSION['username']) AND isset($_SESSION['departId'])) {
            $departID= $_SESSION['departId'];

            $query = "DELETE FROM departments WHERE departmentId='$departID'";
            $result = mysqli_query($mysql, $query) or die ('<h3>Something went wrong!.</h3>');

                $query4 = "DELETE FROM contact_info WHERE departmentId='$departID'";
                $result4 = mysqli_query($mysql, $query4) or die ('<h3>Something went wrong!.4</h3>');

                    $query1 = "SELECT * FROM login_details WHERE departmentId='$departID'";
                    $result1 = mysqli_query($mysql, $query1) or die ('<h3>Something went wrong!.1</h3>');
                    while ($row1 = mysqli_fetch_assoc($result1)) {
                        $username = $row1['username'];

                        $query2 = "DELETE FROM notification WHERE username='$username'";
                        $result2 = mysqli_query($mysql, $query2) or die ('<h3>Something went wrong!.2</h3>');

                            $query3 = "DELETE FROM login_details WHERE username='$username'";
                            $result3 = mysqli_query($mysql, $query3) or die ('<h3>Something went wrong!.3</h3>');
                    }

            echo '<h3 style="text-align: center; color: coral; margin-bottom: 10px;">Account has been <span style="color: red">deleted</span> successfully!</h3><form action="edit_others_profile.php" method="post"><button class="form1 btn btn-success btn-block">Back to Control Panel</button></form>';
        }
    ?>

</body>
</html>