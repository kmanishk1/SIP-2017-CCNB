<?php
if (!isset($_SESSION)) session_start();

    if (($_SESSION['userlevel'] === NULL) OR ($_SESSION['userlevel'] == 0)) {
        echo "<!DOCTYPE html>
                <html lang=\"en\">
                <head>
                    <title>Save Own Website (Non-Admin) : CCNB</title>
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
                    <title>Save Own Website (Admin) : CCNB</title>
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

if (isset($_POST['website']) AND isset($_POST['password']) AND isset($_SESSION['username'])) {
    $website = $_POST['website'];
    $username = $_SESSION['username'];
    $password = md5($_POST['password']);
    $pass = $_SESSION['password'];

    if ($password === $pass) {

    $query = "SELECT * FROM login_details WHERE username='$username'";
    $result = mysqli_query($mysql, $query) or die ("<h3>Sorry! Couldn't connect!</h3>");
    while ($row = mysqli_fetch_assoc($result)) {
        $departmentID = $row['departmentId'];

        $query1 = "UPDATE contact_info SET website='$website' WHERE departmentId='$departmentID'";
        $result1 = mysqli_query($mysql, $query1) or die ("<h3>Sorry! Couldn't connect!</h3>");

        echo "<h3 style='text-align: center; color: #2daae4; margin-bottom: 10px'>Dear <span style='color: dodgerblue'>" . $_SESSION['name'] . "</span>, your <span style='color: dodgerblue'>own website</span> has been updated successfully!</h3>";
        echo '
                                            <div class="form">
                                                <a href="edit_username.php" class="form2 btn btn-info btn-block">Change username</a>
                                                <a href="edit_password.php" class="form2 btn btn-danger btn-block">Change password</a><br/>
                                                <a href="edit_department.php" class="form2 btn btn-warning btn-block">Change Department\'s name</a>
                                                <a href="edit_description.php" class="form2 btn btn-warning btn-block">Change Department\'s description</a>
                                                <a href="edit_link.php" class="form2 btn btn-warning btn-block">Change Department\'s link</a><br/>
                                                <a href="edit_name.php" class="form2 btn btn-info btn-block">Change Profile Name</a>
                                                <a href="edit_designation.php" class="form2 btn btn-primary btn-block">Change designation</a>
                                                <a href="edit_website.php" class="form2 btn btn-primary btn-block">Change your Website</a> 
                                                <a href="edit_phone.php" class="form2 btn btn-primary btn-block">Change Phone number</a>
                                                <a href="edit_email.php" class="form2 btn btn-primary btn-block">Change E-mail</a>
                                            </div>
                                            <form action="loggedin.php" method="post">
                                                <button class="form1 btn btn-success btn-block">Back</button>
                                            </form>
                                       ';
        }
    } else {
        echo "<h3 style='text-align: center; color: coral; margin-bottom: 10px'>Make sure <span style='color: red'>password</span> is correct!</h3>";
        include 'edit_profile.php';
    }

} else {
    echo "<h3 style='text-align: center; color: coral; margin-bottom: 10px'><span style='color: red'>Sorry</span>! Couldn't read data.</h3>";
    include 'edit_profile.php';
}

?>
