<?php
if (!isset($_SESSION)) session_start();

if (($_SESSION['userlevel'] === NULL) OR ($_SESSION['userlevel'] == 0)) {
    echo "<!DOCTYPE html>
                <html lang=\"en\">
                <head>
                    <title>Delete post (Non-Admin) : CCNB</title>
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
                        <title>Delete post (Admin) : CCNB</title>
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

        echo "<h3 style='text-align: center; color: #2daae4; margin-bottom: 10px'>Dear <span style='color: dodgerblue'>" . $_SESSION['name'] . "</span>, are you sure to <span style='color: red'>delete</span> this post?</h3>
                        <div class=\"form\">
                                <form action=\"confirm_delete_post.php\" method=\"post\">
                                    <button name='delete' value='".$notificationID."' class=\"form1 btn btn-danger btn-block\">Proceed</button>
                                </form>
                                <form action=\"loggedin.php\" method=\"post\">
                                    <button class=\"form1 btn btn-success btn-block\">Back</button>
                                </form>
                        </div>";
    } else {
        die ('<h3 style="text-align: center; color: coral; margin-bottom: 10px;">Something went wrong!</h3>  
                            <form action="loggedin.php" method="post">
                                <button class="form1 btn btn-success btn-block">Back</button>
                            </form>');
    }
?>

</body>
</html>