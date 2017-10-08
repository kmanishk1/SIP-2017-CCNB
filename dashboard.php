<?php
    session_start();
        require 'connect.php';

        if (isset($_POST['username']) and isset($_POST['password']) and isset($_POST['departmentId'])) { // if form submitted
            $username = addslashes($_POST['username']);
            $password = $_POST['password'];
            $departmentID = $_POST['departmentId'];

            $password_hash = md5($password);

            $_SESSION['password'] = $password_hash;

            $query = "SELECT * FROM login_details WHERE username='$username' AND password='$password_hash' AND departmentId='$departmentID'";
            $result = mysqli_query($mysql, $query) or die('<h3>Sorry! Couldn\'t connect.</h3>');
            $count = mysqli_num_rows($result);

            if ($count >= 1) {
                while ($row_ori = mysqli_fetch_assoc($result)) {
                    $name = $row_ori['name'];
                    $userlevel = $row_ori['userlevel'];

                    $query_dep = "SELECT * FROM departments WHERE departmentId='$departmentID'";
                    $result_dep = mysqli_query($mysql, $query_dep) or die('<h3>Sorry!</h3>');
                    while ($row = mysqli_fetch_assoc($result_dep)) {
                        $department = $row['department'];
                        $_SESSION['username'] = $username;
                        $_SESSION['departmentId'] = $departmentID;
                        $_SESSION['department'] = $department;
                        $_SESSION['name'] = $name;
                        $_SESSION['userlevel'] = $userlevel;

                        include 'loggedin.php';
                    }
                }
            } else {
                include 'loginagain.php';
            }
        } else {
                include 'login.php';
        }
 ?>
