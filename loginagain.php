<?php
if (!isset($_SESSION)) session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Login again : CCNB</title>
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
    <!-- header -->
    <?php
    include 'header.php';
    ?>
    <!-- background image -->
    <div class="container-fluid">
        <div class="row" style="max-height: 500px; min-height: 500px; overflow: hidden;">
            <div class="image">
                <img src="img/bg.png" alt="Centralised College Notice Board" />
                <h1 class="col-lg-12">Centralised College Notice Board</h1>
            </div>
        </div>
    </div>
    <!-- content -->
    <div>
        <h3 style='text-align: center; color: coral'>Make sure all your <span style="color: red">credentials</span> are correct!</h3>;
        <div class="form"><h2 id="head">Login again</h2></div>
        <form action="dashboard.php" class="form2" method="post">
            <input type="text" name="username" class="form-control" placeholder="Username" required/><br/>
            <input type="password" name="password" class="form-control" placeholder="Password" required/><br/>
            <select name="departmentId" class="form-control" required>
                <?php
                    require "connect.php";

                    $query = "SELECT * FROM departments";
                    $result = mysqli_query($mysql, $query) or die('<h3>Sorry! Couldn\'t connect. (0)</h3>');
                    while ($row = mysqli_fetch_assoc($result)) {
                        $departmentID = $row['departmentId'];

                        $query1 = "SELECT * FROM departments WHERE departmentId='$departmentID'";
                        $result1 = mysqli_query($mysql, $query1) or die('<h3>Sorry! Couldn\'t connect. (1)</h3>');
                        while ($row1 = mysqli_fetch_assoc($result1)) {
                            $department = $row1['department'];

                            echo '<option value="' . $departmentID . '">' . $department . '</option>';
                        }
                    }
                ?>
            </select><br/>
            <button class="form btn btn-lg btn-success btn-block" type="submit">Login</button>
        </form>
    </div>
    <!-- footer -->
    <?php
    include 'footer.php';
    ?>
</body>
</html>