<?php
    if (!isset($_SESSION)) session_start();

    if (($_SESSION['userlevel'] === NULL) OR ($_SESSION['userlevel'] == 0)) {
        die ("<h3 style='text-align: center; color: coral; margin-bottom: 10px'><span style='color: red'>Haha</span>! C'mon you can do better!</h3><form style='text-align: center' action=\"logout.php\" method=\"post\"><button style='font-size: larger' class=\"form1 btn btn-info btn-block\">Back</button><br/><br/></form>");
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Save New Account (Admin) : CCNB</title>
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

            if (isset($_SESSION['password'])) {
                $pass = $_SESSION['password'];

                if (isset($_POST['username']) AND isset($_POST['password']) AND isset($_POST['department']) AND isset($_POST['description']) AND isset($_POST['link']) AND isset($_POST['name']) AND isset($_POST['userlevel']) AND isset($_POST['designation']) AND isset($_POST['website']) AND isset($_POST['phone']) AND isset($_POST['email']) AND isset($_POST['password1'])) {
                    $password1 = md5($_POST['password1']);

                    if ($pass === $password1) {
                        $username = addslashes($_POST['username']);
                        $password = md5($_POST['password']);
                        $department = addslashes($_POST['department']);
                        $description = addslashes($_POST['description']);
                        $link = $_POST['link'];
                        $name = addslashes($_POST['name']);
                        $userlevel = $_POST['userlevel'];
                        $designation = addslashes($_POST['designation']);
                        $website = $_POST['website'];
                        $phone = $_POST['phone'];
                        $email = $_POST['email'];

                        $insert = "INSERT INTO departments (department, dep_description, linked) VALUES ('$department', '$description', '$link')";
                        $res = mysqli_query($mysql, $insert) or die ("<h5 style=\"margin-bottom: 100px; text-align: center; color: coral\">Something went <span style=\"color: red\">wrong</span>! (<span style=\"color: red\">Database or Server issue</span>)</h5><form action=\"add.php\" method=\"post\"><button class=\"form1 btn btn-success btn-block\">Back</button></form>");
                        if ($res === TRUE) {

                            $query = "SELECT * FROM departments WHERE department='$department'";
                            $result = mysqli_query($mysql, $query)  or die ("<h5 style=\"margin-bottom: 100px; text-align: center; color: coral\">Something went <span style=\"color: red\">wrong</span>! (<span style=\"color: red\">Database or Server issue</span>)</h5><form action=\"add.php\" method=\"post\"><button class=\"form1 btn btn-success btn-block\">Back</button></form>");
                            while ($row = mysqli_fetch_assoc($result)) {
                                $departmentID = $row['departmentId'];

                                $insert1 = "INSERT INTO login_details (departmentId, username, password, name, userlevel) VALUES ('$departmentID', '$username', '$password', '$name', '$userlevel')";
                                $result1 = mysqli_query($mysql, $insert1) or die ("<h5 style=\"margin-bottom: 100px; text-align: center; color: coral\">Something went <span style=\"color: red\">wrong</span>! (<span style=\"color: red\">Database or Server issue</span>)</h5><form action=\"add.php\" method=\"post\"><button class=\"form1 btn btn-success btn-block\">Back</button></form>");
                                if ($result1 === TRUE) {

                                    $insert2 = "INSERT INTO contact_info (departmentId, designation, website, phone, email) VALUES ('$departmentID','$designation', '$website', '$phone', '$email')";
                                    $result2 = mysqli_query($mysql, $insert2) or die ("<h5 style=\"margin-bottom: 100px; text-align: center; color: coral\">Something went <span style=\"color: red\">wrong</span>! (<span style=\"color: red\">Database or Server issue</span>)</h5><form action=\"add.php\" method=\"post\"><button class=\"form1 btn btn-success btn-block\">Back</button></form>");
                                    if ($result2 === TRUE) {

                                        if ($userlevel == 1) {

                                            echo "<h3 style='text-align: center; color: #2daae4; margin-bottom: 10px'>Congratulations! New <span style='color: dodgerblue'>ADMIN</span> has been added successfully.</h3>";
                                            include 'add.php';
                                        } else {
                                            echo "<h3 style='text-align: center; color: #2daae4; margin-bottom: 10px'>Congratulations! New <span style='color: dodgerblue'>USER</span> has been added successfully.</h3>";
                                            include 'add.php';
                                        }
                                    } else {
                                        echo "<h3 style='text-align: center; color: coral; margin-bottom: 10px'>Sorry! Couldn't enter <span style='color: red'>details</span>!.3</h3>";
                                        include 'add.php';
                                    }
                                } else {
                                    echo "<h3 style='text-align: center; color: coral; margin-bottom: 10px'>Sorry! Couldn't enter <span style='color: red'>details</span>!.2</h3>";
                                    include 'add.php';
                                }
                            }
                        } else {
                            echo "<h3 style='text-align: center; color: coral; margin-bottom: 10px'>Sorry! Couldn't enter <span style='color: red'>details</span>!.1</h3>";
                            include 'add.php';
                        }
                    } else {
                        echo "<h3 style='text-align: center; color: coral; margin-bottom: 10px'>Make sure your <span style='color: red'>password</span> is correct!</h3>";
                        include 'add.php';
                    }
                } else {
                    echo "<h3 style='text-align: center; color: coral; margin-bottom: 10px'>Make sure all <span style='color: red'>entries</span> are filled with constraints!</h3>";
                    include 'add.php';
                }
            } else {
                echo "<h3 style='text-align: center; color: coral; margin-bottom: 10px'>Make sure you're <span style='color: red'>logged in</span>!</h3>";
                include 'add.php';
            }
    ?>

</body>
</html>