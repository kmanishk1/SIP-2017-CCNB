<?php

    $localhost = 'localhost';
    $username = 'csi';
    $password = '';
    $database = 'csi_project';

    $mysql = mysqli_connect($localhost, $username, $password, $database); // connecting to database

    if (!$mysql) {
        die('Failed to connect!'.mysqli_error($mysql)); // kill page if not connected
    }

?>