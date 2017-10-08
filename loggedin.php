<?php
if (!isset($_SESSION)) session_start();

    if (($_SESSION['userlevel'] === NULL) OR ($_SESSION['userlevel'] == 0)) {

    echo "<!DOCTYPE html>
    <html lang=\"en\">
    <head>
        <title>Welcome (Non-Admin) : CCNB</title>
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
    <body>
    
            <h3 style='text-align: center; color: #2daae4; margin-bottom: 10px'>Hello <span style='color: dodgerblue'>" . $_SESSION['name'] . "</span>, welcome to <span style='color: dodgerblue'>" . $_SESSION['department'] . "</span>.</h3>
    
            <form action=\"edit_profile.php\" method=\"post\">
                <button class=\"form1 btn btn-warning btn-block\">Edit profile</button>
            </form>
            <div class=\"form\">
                <a href=\"write_post.php\" class=\"form2 btn btn-info btn-block\">Write a post</a>
                <a href=\"view_post.php\" class=\"form2 btn btn-success btn-block\">View posts</a>
            </div>
    
            <form action=\"logout.php\" method=\"post\">
                <button class=\"form1 btn btn-danger btn-block\">Logout</button>
            </form>
    
    </body>
    </html>";
    } else {
        echo "

            <!DOCTYPE html>
            <html lang=\"en\">
            <head>
                <title>Welcome (Admin) : CCNB</title>
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
            <body>
            
            <h3 style='text-align: center; color: #2daae4; margin-bottom: 10px'>Hello <span style='color: dodgerblue'>" . $_SESSION['name'] . "</span>, welcome to <span style='color: dodgerblue'>" . $_SESSION['department'] . "</span>.</h3>
    
                <form action=\"edit_profile.php\" method=\"post\"><button class=\"form1 btn btn-warning btn-block\">Edit profile</button></form>
                <form action=\"edit_others_profile.php\" method=\"post\"><button class=\"form1 btn btn-danger btn-block\">Edit others' profile</button></form>
                <form action=\"add.php\" method=\"post\"><button class=\"form1 btn btn-primary btn-block\">Add Account</button></form>
                <div class=\"form\">
                    <a href=\"write_post.php\" class=\"form2 btn btn-info btn-block\">Write a post</a>
                    <a href=\"view_post.php\" class=\"form2 btn btn-success btn-block\">View posts</a><br/>
                </div>
            
                <form action=\"logout.php\" method=\"post\">
                    <button class=\"form1 btn btn-danger btn-block\">Logout</button>
                </form>
            
            </body>
            </html>";
    }
?>