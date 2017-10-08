<?php
if (!isset($_SESSION)) session_start();

    if (($_SESSION['userlevel'] === NULL) OR ($_SESSION['userlevel'] == 0)) {
        echo "<!DOCTYPE html>
                <html lang=\"en\">
                <head>
                    <title>Edit profile (Non-Admin) : CCNB</title>
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
                   
                    <div class=\"form\">
                        <a href=\"edit_username.php\" class=\"form2 btn btn-info btn-block\">Change username</a>
                        <a href=\"edit_password.php\" class=\"form2 btn btn-danger btn-block\">Change password</a><br/>
                        <a href=\"edit_department.php\" class=\"form2 btn btn-warning btn-block\">Change Department's name</a>
                        <a href=\"edit_description.php\" class=\"form2 btn btn-warning btn-block\">Change Department's description</a>
                        <a href=\"edit_link.php\" class=\"form2 btn btn-warning btn-block\">Change Department's link</a><br/>
                        <a href=\"edit_name.php\" class=\"form2 btn btn-info btn-block\">Change Profile Name</a>
                        <a href=\"edit_designation.php\" class=\"form2 btn btn-primary btn-block\">Change designation</a>
                        <a href=\"edit_website.php\" class=\"form2 btn btn-primary btn-block\">Change your Website</a>
                        <a href=\"edit_phone.php\" class=\"form2 btn btn-primary btn-block\">Change Phone number</a>
                        <a href=\"edit_email.php\" class=\"form2 btn btn-primary btn-block\">Change E-mail</a>
                    </div>
                
                    <form action=\"loggedin.php\" method=\"post\">
                        <button class=\"form1 btn btn-warning btn-block\">Back</button>
                    </form>
                
                </body>
                </html>";
    } else {
        echo "<!DOCTYPE html>
                <html lang=\"en\">
                <head>
                    <title>Edit profile (Admin) : CCNB</title>
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
                
                    <div class=\"form\">
                        <a href=\"edit_username.php\" class=\"form2 btn btn-info btn-block\">Change username</a>
                        <a href=\"edit_password.php\" class=\"form2 btn btn-danger btn-block\">Change password</a><br/>
                        <a href=\"edit_department.php\" class=\"form2 btn btn-warning btn-block\">Change Department's name</a>
                        <a href=\"edit_description.php\" class=\"form2 btn btn-warning btn-block\">Change Department's description</a>
                        <a href=\"edit_link.php\" class=\"form2 btn btn-warning btn-block\">Change Department's link</a><br/>
                        <a href=\"edit_name.php\" class=\"form2 btn btn-info btn-block\">Change Profile Name</a>
                        <a href=\"edit_designation.php\" class=\"form2 btn btn-primary btn-block\">Change designation</a>
                        <a href=\"edit_website.php\" class=\"form2 btn btn-primary btn-block\">Change your Website</a>
                        <a href=\"edit_phone.php\" class=\"form2 btn btn-primary btn-block\">Change Phone number</a>
                        <a href=\"edit_email.php\" class=\"form2 btn btn-primary btn-block\">Change E-mail</a>
                    </div>
                
                    <form action=\"loggedin.php\" method=\"post\">
                        <button class=\"form1 btn btn-success btn-block\">Back</button>
                    </form>
                
                </body>
                </html>";
    }
?>