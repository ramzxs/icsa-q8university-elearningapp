<?php
function printHeader($title) {
    ?>
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Q8 University - eLearning - <?= $title ?></title>
        <link rel="stylesheet" href="assets/main.css">
    </head>
    <body>
    <header>
        <div style="padding: 10px; background-color: darkgreen; font-size: 32pt">
            Q8 University - eLearning Platform
        </div>
        <br>
        <nav>
            <a href=".">Home</a>
            <a href="courses.php">Courses</a>
            <?php
            if (isset($_SESSION['USER'])) {
                ?>
                <a href="login.php?OP=LOGOUT" onclick="return confirmLogout()">Logout</a>
                <?php
            } else {
                ?>
                <a href="login.php">Login</a>
                <?php
            }
            ?>
            
        </nav>
    </header>
    <script>
        function confirmLogout() {
            if (confirm("Are you sure you want to logout?")) {
                return true
            }
            return false;
        }
    </script>
    <?php
}


function printFooter() {
    ?>
        <footer>
            &copy; 2023 Q8 University. All rights reserved.
        </footer>
        </body>
    </html>
    <?php
}


function connectDatabase() {
    $dbConnectionString = 'mysql:host=localhost;dbname=q8univ_elearning_db';
    return new PDO($dbConnectionString, 'root', '');
}

session_start();