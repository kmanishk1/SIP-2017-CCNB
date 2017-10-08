<?php
if (!isset($_SESSION)) session_start();

    if (($_SESSION['userlevel'] === NULL) OR ($_SESSION['userlevel'] == 0)) {

        echo "<!DOCTYPE html>
                <html lang=\"en\">
                <head>
                    <title>Edit Department's Name (Non-Admin) : CCNB</title>
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
                
                <form action=\"save_department.php\" class=\"form\" method=\"post\">
                    <input name=\"department\" type=\"text\" class=\"form-control\" placeholder=\"Your Department's Name\" required/><br/>
                    <input name=\"password\" type=\"password\" class=\"form-control\" placeholder=\"Enter password\" required/><br/>
                    <input type=\"submit\" class=\"form1 btn btn-success btn-block\" value=\"Proceed\"/>
                </form>
                
                <form action=\"edit_profile.php\" method=\"post\">
                    <button class=\"form1 btn btn-warning btn-block\">Back</button>
                </form>
                
                </body>
                </html>";
    } else {
        echo "<!DOCTYPE html>
                <html lang=\"en\">
                <head>
                    <title>Edit Department's Name (Admin) : CCNB</title>
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
                
                <form action=\"save_department.php\" class=\"form\" method=\"post\">
                    <input name=\"department\" type=\"text\" class=\"form-control\" placeholder=\"Your Department's Name\" required/><br/>
                    <input name=\"password\" type=\"password\" class=\"form-control\" placeholder=\"Enter password\" required/><br/>
                    <input type=\"submit\" class=\"form1 btn btn-success btn-block\" value=\"Proceed\"/>
                </form>
                
                <form action=\"edit_profile.php\" method=\"post\">
                    <button class=\"form1 btn btn-warning btn-block\">Back</button>
                </form>
                
                </body>
                </html>";
    }

?>