<?php
if (!isset($_SESSION)) session_start();

if (($_SESSION['userlevel'] === NULL) OR ($_SESSION['userlevel'] == 0)) {
    echo "<!DOCTYPE html>
                <html lang=\"en\">
                <head>
                    <title>Confirm Delete post (Non-Admin) : CCNB</title>
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
                        <title>Confirm Delete post (Admin) : CCNB</title>
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

    if (isset($_SESSION['username']) AND $_POST['delete']) {
        $notificationID = $_POST['delete'];

        $query = "DELETE FROM notification WHERE notificationId='$notificationID'";
        $result = mysqli_query($mysql, $query) or die ("<h3>Sorry! Couldn't connect!</h3>");

            echo "<h3 style='text-align: center; color: #2daae4; margin-bottom: 10px'>Dear <span style='color: dodgerblue'>" . $_SESSION['name'] . "</span>, your post has been <span style='color: red'>deleted</span> successfully.</h3>";
            include 'view_post.php';
    } else {
        die ('<h3 style="text-align: center; color: coral; margin-bottom: 10px;">Something went wrong!</h3>  
                        <form action="loggedin.php" method="post">
                            <button class="form1 btn btn-success btn-block">Back</button>
                        </form>');
    }
?>

</body>
</html>