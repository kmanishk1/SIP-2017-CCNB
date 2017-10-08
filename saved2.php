<?php
if (!isset($_SESSION)) session_start();

if (($_SESSION['userlevel'] === NULL) OR ($_SESSION['userlevel'] == 0)) {
    echo "<!DOCTYPE html>
                <html lang=\"en\">
                <head>
                    <title>Saved Edited(Non-Admin) : CCNB</title>
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
                    <title>Saved Edited (Admin) : CCNB</title>
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

<?php
    require 'connect.php';

    if (!empty($_POST['heading']) and !empty($_POST['description'])) {

        if (isset($_SESSION['username']) and isset($_POST['heading']) and isset($_POST['description']) and isset($_SESSION['notID'])) {
            $username = $_SESSION['username'];
            $heading = addslashes($_POST['heading']);
            $description = addslashes($_POST['description']);
            $notificationID = $_SESSION['notID'];

            $insert = "UPDATE notification SET heading='$heading', description='$description' WHERE notificationId='$notificationID'";
            $result = mysqli_query($mysql, $insert) or die ("<h5 style=\"margin-bottom: 100px; text-align: center; color: coral\">Something went <span style=\"color: red\">wrong</span>! (<span style=\"color: red\">Database or Server issue</span>)</h5><form action=\"edit_post.php\" method=\"post\"><button class=\"form1 btn btn-success btn-block\">Back</button></form>");
            if ($result === TRUE) {
                $_SESSION['heading'] = $heading;
                $_SESSION['description'] = $description;

                echo "<h3 style='text-align: center; color: #2daae4; margin-bottom: 10px'>Your post has been <span style='color: dodgerblue'>edited</span> successfully.</h3>";
                include 'view_post.php';
            } else {
                echo "<h3 style='text-align: center; color: coral; margin-bottom: 10px'>Make sure your <span style='color: red'>username</span> is correct and try again.</h3>";
                include 'edit_post.php';
            }
        } else {
            echo "<h3 style='text-align: center; color: coral; margin-bottom: 10px'>Make sure you've <span style='color: red'>filled</span> all the entries.</h3>";
            include 'edit_post.php';
        }
    } else {
        echo "<h3 style='text-align: center; color: coral; margin-bottom: 10px'>Make sure you've <span style='color: red'>filled</span> all the entries.</h3>";
        include 'edit_post.php';
    }

?>
