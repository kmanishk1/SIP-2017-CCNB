<?php
if (!isset($_SESSION)) session_start();

    if (($_SESSION['userlevel'] === NULL) OR ($_SESSION['userlevel'] == 0)) {
        die ("<h3 style='text-align: center; color: coral; margin-bottom: 10px'><span style='color: red'>Haha</span>! C'mon you can do better!</h3><form style='text-align: center' action=\"logout.php\" method=\"post\"><button style='font-size: larger' class=\"form1 btn btn-info btn-block\">Back</button><br/><br/></form>");
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Add New Account (Admin) : CCNB</title>
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

    <form action="loggedin.php" method="post">
        <button class="form1 btn btn-warning btn-block">Back</button><br/><br/>
    </form>
    <div class="form">
        <h2 class="heading" id="head">Add New Account </h2>
    </div>

    <form action="add_save.php" class="form2" method="post">
        <input name="username" type="text" class="form-control" placeholder="1. Username" required/><br/>
        <input name="password" type="password" class="form-control" placeholder="2. Password" required/><br/>
        <input name="department" type="text" class="form-control" placeholder="3. Department's Name" required/><br/>
        <textarea name="description" rows="3" class="form-control" placeholder="4. About Department..." required></textarea><br/>
        <input name="link" type="url" class="form-control" placeholder="5. Department's link"/><br/>
        <input name="name" type="text" class="form-control" placeholder="6. Profile Name" required/><br/>
        <select name="userlevel" class="form-control" required><option value="NULL">User</option><option value="1">Admin</option></select><br/>
        <input name="designation" type="text" class="form-control" placeholder="8. Designation" required/><br/>
        <input name="website" type="url" class="form-control" placeholder="9. Profile Holder's Website"/><br/>
        <input name="phone" type="tel" class="form-control" placeholder="10. Phone Number" required/><br/>
        <input name="email" type="email" class="form-control" placeholder="11. E-Mail Id" required/><br/>
        <br/><input name="password1" type="password" class="form-control" placeholder="*Your Own Password" required/><br/>
        <input type="submit" class="form1 btn btn-success btn-sm" value="Proceed"/>
    </form>

    <form action="loggedin.php" method="post">
        <button class="form1 btn btn-warning btn-block">Back</button><br/><br/>
    </form>

</body>
</html>