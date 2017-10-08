<?php
    if (!isset($_SESSION)) session_start();
?>

<footer id="footer" style="margin-top: 20px">
    <div class="container-fluid">
        <section>
            <div class="form1">
                <h4 id="head">Quick links :</h4>
            </div>
        </section>
        <section>
            <div class="row">
            <?php
                require 'connect.php';

                $query = "SELECT * FROM departments";
                $result = mysqli_query($mysql, $query) or die('<h3>Sorry! Couldn\'t connect. (0)</h3>');
                while ($row = mysqli_fetch_assoc($result)) {
                    $departmentID = $row['departmentId'];

                    $query1 = "SELECT * FROM departments WHERE departmentId='$departmentID'";
                    $result1 = mysqli_query($mysql, $query1) or die('<h3>Sorry! Couldn\'t connect. (1)</h3>');
                    while ($row1 = mysqli_fetch_assoc($result1)) {
                        $department = $row1['department'];

                        echo '<div class="col-lg-2"><form action="visit2.php" method="post"><button style="overflow: auto" class="form1 btn btn-block btn-primary" name="department" value="' . $department . '" type="submit">' . $department . '</button></form></div>';
                    }
                }
            ?>
            </div>
        </section>
        <section class="rights">
            <div class="col-md-12">
                <div class="col-md-8">
                    <ul class="copyright">
                        <p>&copy; Centralised College Notice Board | <a href="http://lnmiit.ac.in" target="_blank">The LNMIIT, Jaipur.</a></p>
                    </ul>
                </div>
                <div class="col-md-4">
                    <ul class="links">
                        <li><a href="#" target="_blank"><i class="fa fa-linkedin-square fa-3x"></i></a></li>
                        <li><a href="#" target="_blank"><i class="fa fa-facebook-square fa-3x"></i></a></li>
                        <li><a href="#" target="_blank"><i class="fa fa-youtube-square fa-3x"></i></a></li>
                        <li><a href="#" target="_blank"><i class="fa fa-twitter-square fa-3x"></i></a></li>
                    </ul>
                </div>
            </div>
        </section>
    </div>
</footer>