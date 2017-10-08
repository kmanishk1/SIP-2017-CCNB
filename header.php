<?php
    if (!isset($_SESSION)) session_start();
?>

<div style="margin-bottom: 60px">
    <nav class="navbar navbar-inverse navbar-fixed-top">
        <div class="container-fluid">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.php">Centralised College Notice Board</a>
            </div>
            <div class="collapse navbar-collapse" id="myNavbar">
                <ul class="nav navbar-nav navbar-right">
                    <li><a href="index.php"><span class="glyphicon glyphicon-th-large"></span> Home</a></li>
                    <li><a href="clubs.php"><span class="glyphicon glyphicon-tasks"></span> Clubs</a></li>
                    <li><a href="login.php"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
                    <li><a href="contact.php"><span class="glyphicon glyphicon-phone-alt"></span> Contact Us</a></li>
                    <li><form method="post" style="margin: 8px;" action="search.php"><input class="form-control" style="font-size: 14px" type="search" name="search" placeholder="Search posts, contacts, departments and clubs.." required/></form></li>
                </ul>
            </div>
        </div>
    </nav>
</div>
