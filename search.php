<?php
if (!isset($_SESSION)) session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Search Posts, Contacts, Departments and Clubs : CCNB</title>
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

    <div class="row" style="overflow: scroll">
        <?php
        require 'connect.php';

        if (isset($_POST['search'])) {
            $search_name = addslashes($_POST['search']);

            if (!empty($search_name)) {
                echo '<form action="index.php" method="post"><button class="form1 btn btn-success btn-block">Back to Home</button></form>';
                echo '<h3 class="form" style=\'text-align: center; color: deepskyblue\'>Searched for :<br/><span style="color: dodgerblue">' . stripslashes($search_name) . '</span></h3>';

                if (strlen($search_name) >= 2) {

                    $query = "SELECT * FROM notification WHERE heading LIKE '%{$search_name}%' OR description LIKE '%{$search_name}%'";
                    $result = mysqli_query($mysql, $query) or die ("<form action=\"search.php\" method=\"post\"><button class=\"form1 btn btn-warning btn-block\">Back</button></form>");
                    $count = mysqli_num_rows($result);

                    if ($count > 0) {
                        echo '<h5 class="form" id="head">Search results in Posts :</h5>';

                        while ($row = mysqli_fetch_array($result)) {
                            $username = $row['username'];
                            $heading = $row['heading'];
                            $description = $row['description'];
                            $time_stamp = $row['time_stamp'];

                            $query1 = "SELECT * FROM login_details WHERE username='$username'";
                            $result1 = mysqli_query($mysql, $query1) or die ("<h3>Sorry! Couldn't connect!1</h3>");
                            while ($row1 = mysqli_fetch_assoc($result1)) {
                                $departmentID = $row1['departmentId'];

                                $query2 = "SELECT * FROM departments WHERE departmentId='$departmentID'";
                                $result2 = mysqli_query($mysql, $query2) or die ("<h3>Sorry! Couldn't connect!2</h3>");
                                while ($row2 = mysqli_fetch_assoc($result2)) {
                                    $department = $row2['department'];

                                    echo '<div class="container-fluid" style="max-width: 80%; overflow: scroll"><div class="row" style="padding: 10px; border-radius: 10px; margin: 20px; background-color: dimgrey; text-align: center"><div class="col-lg-2"><span style="color: orange;"><i class="fa fa-calendar" style="color: oldlace"></i> '.$time_stamp.'</span><h4 class="form1" id="head" style="color: white;">'.$department.'</h4></div><div class="col-lg-8"><h4 style="color: #333333; background-color: azure; padding: 10px; border-radius: 5px; font-size: 16px;">'.$heading.'</h4><p style="color: aliceblue; white-space: pre-line; margin-top: 20px">'.$description.'</p></div><div class="col-lg-2"><form style="text-align: center; margin: 30px" method="post" action="visit.php"><button name="department" value="'.$department.'" type="submit" class="form btn btn-info">Visit other posts</button><br/></form></div></div></div>';
                                }
                            }
                        }
                    }

                    $query3 = "SELECT * FROM login_details WHERE name LIKE '%{$search_name}%'";
                    $result3 = mysqli_query($mysql, $query3) or die ("<form action=\"search.php\" method=\"post\"><button class=\"form1 btn btn-warning btn-block\">Back</button></form>");
                    $count3 = mysqli_num_rows($result3);

                    if ($count3 > 0) {
                        echo '<div class="row"><div class="col-lg-12"><h5 class="form" style="display: inherit;" id="head">Search results in Contacts :</h5></div></div>';

                        while ($row3 = mysqli_fetch_array($result3)) {
                            $name = $row3['name'];
                            $departmentID = $row3['departmentId'];

                            $query4 = "SELECT * FROM contact_info WHERE departmentId='$departmentID'";
                            $result4 = mysqli_query($mysql, $query4) or die ("<h3>Sorry! Couldn't connect!4</h3>");
                            while ($row4 = mysqli_fetch_assoc($result4)) {
                                $designation = $row4['designation'];
                                $website = $row4['website'];
                                $phone = $row4['phone'];
                                $email = $row4['email'];

                                $query5 = "SELECT * FROM departments WHERE departmentId='$departmentID'";
                                $result5 = mysqli_query($mysql, $query5) or die ("<h3>Sorry! Couldn't connect!5</h3>");
                                while ($row5 = mysqli_fetch_assoc($result5)) {
                                    $department = $row5['department'];

                                    echo '<div class="col-lg-3" style="padding: 10px;"><div style="padding: 15px; border-radius: 5px; text-align: center; overflow: scroll; max-height: 400px; min-height: 400px; background-color: dimgrey;"><h4 class="form2" style="color: white">'.$department.'</h4><h4 class="form-control" style="color: #333333">'.$name.'</h4><h6 class="form-control" style="color: #333333">'.$designation.'</h6><p style="color: aliceblue"><a style="color: aliceblue" href="'.$website.'" target="_blank"><i class="fa fa-globe fa-lg"></i></a><br/></p><p style="color: aliceblue"><i class="fa fa-phone-square fa-lg"></i> : '.$phone.'<br/></p><p style="color: aliceblue"><i class="fa fa-envelope-o fa-lg"></i> : '.$email.'</p></div></div>';
                                }
                            }
                        }
                    }

                    $query6 = "SELECT * FROM departments WHERE department LIKE '%{$search_name}%' OR dep_description LIKE '%{$search_name}%'";
                    $result6 = mysqli_query($mysql, $query6) or die ("<form action=\"search.php\" method=\"post\"><button class=\"form1 btn btn-warning btn-block\">Back</button></form>");
                    $count6 = mysqli_num_rows($result6);

                    if ($count6 > 0) {
                        echo '<div class="row"><div class="col-lg-12"><h5 class="form" style="display: inherit;" id="head">Search results in Departments and Clubs :</h5></div></div>';

                        while ($row6 = mysqli_fetch_array($result6)) {
                            $department = $row6['department'];
                            $description = $row6['dep_description'];
                            $link = $row6['linked'];

                            echo '<div class="col-lg-3" style="padding: 10px;"><div style="overflow: scroll; padding: 15px; text-align: center; border-radius: 10px; max-height: 500px; min-height: 500px; background-color: dimgrey;"><h3 class="form2"><a id="link" style="color: aliceblue" href="' . $link . '" target="_blank">' . $department . '</a></h3><p style="color: white; white-space: pre-line">' . $description . '</p><form style="margin-top: 80px" method="post" action="visit2.php"><button name="department" value="' . $department . '" type="submit" class="form1 btn btn-info btn-block">Visit other posts</button></form></div></div>';
                        }
                    }

                    if (($count == 0) && ($count3 == 0) && ($count6 == 0)) {
                        echo '<h3 style=\'text-align: center; color: coral\'><span style="color: red">No results</span> found!</h3>';
                    }

                } else {
                    echo '<h3 style=\'text-align: center; color: coral\'>Search for <span style="color: red">Words</span>, not <span style="color: red">Alphabets</span>!</h3>';
                }
            }  else {
                die ('<h3 style=\'text-align: center; color: coral\'>Search for <span style="color: red">something</span>!</h3><form action="index.php" method="post"><button class="form1 btn btn-success btn-block">Back to Home</button></form>');
            }
        } else {
            die ('<h3 style=\'text-align: center; color: coral\'>Search for <span style="color: red">something</span>!</h3><form action="index.php" method="post"><button class="form1 btn btn-success btn-block">Back to Home</button></form>');
        }
        ?>
    </div>
    <form action="index.php" method="post">
        <button class="form1 btn btn-success btn-block">Back to Home</button>
    </form>

    <!-- footer -->
    <?php
        include 'footer.php';
    ?>
</body>
</html>