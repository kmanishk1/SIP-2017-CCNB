<?php
if (!isset($_SESSION)) session_start();

    if (($_SESSION['userlevel'] === NULL) OR ($_SESSION['userlevel'] == 0)) {
        echo "<!DOCTYPE html>
                <html lang=\"en\">
                <head>
                    <title>View post (Non-Admin) : CCNB</title>
                    <meta charset=\"utf-8\">
                    <meta name=\"viewport\" content=\"width=device-width, initial-scale=1\">
                    <link rel=\"stylesheet\" href=\"css/style.css\">
                    <link rel=\"stylesheet\" href=\"https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css\">
                    <script src=\"https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js\"></script>
                    <script src=\"https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js\"></script>
                    <link href=\"//maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css\" rel=\"stylesheet\">
                    <link rel=\"shortcut icon\" href=\"img/logo.png\" type=\"image/x-icon\">
                    <link rel=\"icon\" href=\"img/logo.png\" type=\"image/x-icon\">
                </head>
                <body>";
    } else {
        echo "<!DOCTYPE html>
                    <html lang=\"en\">
                    <head>
                        <title>View post (Admin) : CCNB</title>
                        <meta charset=\"utf-8\">
                        <meta name=\"viewport\" content=\"width=device-width, initial-scale=1\">
                        <link rel=\"stylesheet\" href=\"css/style.css\">
                        <link rel=\"stylesheet\" href=\"https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css\">
                        <script src=\"https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js\"></script>
                        <script src=\"https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js\"></script>
                        <link href=\"//maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css\" rel=\"stylesheet\">
                        <link rel=\"shortcut icon\" href=\"img/logo.png\" type=\"image/x-icon\">
                        <link rel=\"icon\" href=\"img/logo.png\" type=\"image/x-icon\">
                    </head>
                    <body>";
    }
?>

        <div style="margin: 20px">
            <form action="loggedin.php" method="post">
                <button class="form1 btn btn-success btn-block">Back</button>
            </form>
        </div>

    <?php
        $department = $_SESSION['department'];
        echo '<div class="form"><h2 id="head">'.$department.' : Your posts</h2></div>';
    ?>

    <div class="container-fluid" style="overflow: scroll; max-width: 80%">
        <?php
            require 'connect.php';

            if (isset($_SESSION['username'])) {
                $username = $_SESSION['username'];

                    $query1 = "SELECT * FROM notification WHERE username='$username' ORDER BY notificationId DESC ";
                    $result1 = mysqli_query($mysql, $query1) or die('<h3>Sorry! Couldn\'t connect.</h3>');
                    while ($row1 = mysqli_fetch_assoc($result1)) {
                        $notificationID = $row1['notificationId'];
                        $heading = $row1['heading'];
                        $description = $row1['description'];
                        $time = $row1['time_stamp'];

                        echo '<div class="row" style="padding: 10px; border-radius: 10px; overflow: scroll; margin: 20px; background-color: dimgrey; text-align: center"><div style="overflow: scroll; padding: 15px; border-radius: 5px; background-color: dimgrey; text-align: center"><span style="color: orange"><i class="fa fa-calendar" style="color: oldlace"></i> ' . $time . '</span><h4 style="color: #333333;  background-color: azure; padding: 10px; border-radius: 5px; font-size: 16px;">' . $heading . '</h4><p style="color: aliceblue; white-space: pre-line">' . $description . '</p></div><form action="edit_post.php" method="post"><button class="form1 btn btn-warning btn-block" name="edit" value="'.$notificationID.'">Edit</button></form><form action="delete_post.php" method="post"><button name="delete" class="form1 btn btn-danger btn-block" value="'.$notificationID.'">Delete</button></form></div>';
                    }
            } else {
                echo "<h3 style='text-align: center; color: coral; margin-bottom: 10px'>Please <span style='color: red'>try</span> again.</h3>";
            }

        ?>
    </div>
    <div style="margin: 20px">
        <form action="loggedin.php" method="post">
            <button class="form1 btn btn-success btn-block">Back</button>
        </form>
    </div>

</body>
</html>