<?php
if (!isset($_SESSION)) session_start();

if (($_SESSION['userlevel'] === NULL) OR ($_SESSION['userlevel'] == 0)) {
    echo "<!DOCTYPE html>
                <html lang=\"en\">
                <head>
                    <title>Edit post (Non-Admin) : CCNB</title>
                    <meta charset=\"utf-8\">
                    <meta name=\"viewport\" content=\"width=device-width, initial-scale=1\">
                    <link rel=\"stylesheet\" href=\"css/style.css\">
                    <link rel=\"stylesheet\" href=\"https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css\">
                    <script src=\"https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js\"></script>
                    <script src=\"https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js\"></script>
                    <script src=\"js/index.js\"></script>
                    <link href=\"//maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css\" rel=\"stylesheet\">
                    <link rel=\"shortcut icon\" href=\"img/logo.png\" type=\"image/x-icon\">
                    <link rel=\"icon\" href=\"img/logo.png\" type=\"image/x-icon\">
                </head>
                <body>";
} else {
    echo "<!DOCTYPE html>
                <html lang=\"en\">
                <head>
                    <title>Edit post (Admin) : CCNB</title>
                    <meta charset=\"utf-8\">
                    <meta name=\"viewport\" content=\"width=device-width, initial-scale=1\">
                    <link rel=\"stylesheet\" href=\"css/style.css\">
                    <link rel=\"stylesheet\" href=\"https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css\">
                    <script src=\"https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js\"></script>
                    <script src=\"https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js\"></script>
                    <script src=\"js/index.js\"></script>
                    <link href=\"//maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css\" rel=\"stylesheet\">
                    <link rel=\"shortcut icon\" href=\"img/logo.png\" type=\"image/x-icon\">
                    <link rel=\"icon\" href=\"img/logo.png\" type=\"image/x-icon\">
                </head>
                <body>";
}

?>
<?php
    require 'connect.php';

    if (isset($_SESSION['username']) AND isset($_POST['edit'])) {
        $username = $_SESSION['username'];
        $notificationID = $_POST['edit'];

        $query1 = "SELECT * FROM notification WHERE notificationId='$notificationID'";
        $result1 = mysqli_query($mysql, $query1) or die('<h3>Sorry! Couldn\'t connect.</h3>');
        while ($row1 = mysqli_fetch_assoc($result1)) {
            $heading = $row1['heading'];
            $description = $row1['description'];
            $_SESSION['notID'] = $notificationID;

                echo '<div>
                        <form action="saved2.php" class="form2" method="post">
                            <div class="form2">
                                <h2 class="heading">Edit post..</h2><br/>
                                <input type="text" name="heading" class="form-control" style="white-space: pre-line" value="'.$heading.'" required/><br/>
                                <textarea rows="4" name="description" class="form-control" style="white-space: pre-line" required/>'.$description.'</textarea>
                            </div>
                            <div class="form">
                                <a onclick="js()" class="form2 btn btn-warning btn-block">Discard edits</a>
                                <button type="submit" class="form2 btn btn-success btn-block">Save</button>
                            </div>
                        </form>
                      </div>';

        }
    } else {
        die ('');
    }

?>
</body>
</html>