<?php

require_once 'libs/main.php';

if (isset($_GET['OP']) && $_GET['OP'] == 'LOGOUT') {
    unset($_SESSION['USER']);
    session_destroy();
}


?>
<?php printHeader('Login'); ?>
<main>
    <h1>LOGIN</h1>

    <?php
    if (isset($_SESSION['USER'])) {
        echo "Go to your dashboard now.";
    } else {
        if (isset($_POST['user'])) {
            $DB = connectDatabase();
            $sql = "SELECT *
                FROM `student`
                WHERE `stdID` = '".$_POST['user']."'
                    AND `stdPassword` = PASSWORD('".$_POST['password']."')";
            // echo $sql;
            $stmt = $DB->query($sql);
            if ($row = $stmt->fetch()) {
                $_SESSION['USER'] = $_POST['user'];
                echo 'Go to your <a href="courses.php">dashboard</a>.';
            } else {
                echo "Invalid credential or user not found";
            }
        } else { ?>
            <form action="?" method="post" onsubmit="return formProcess()">
                <table>
                    <tr>
                        <td>Username:</td>
                        <td>
                            <input id="user" type="text" name="user" required>
                        </td>
                    </tr>
                    <tr>
                        <td>Password:</td>
                        <td>
                            <input id="pwd" type="password" name="password" required>
                        </td>
                    </tr>
                    <tr>
                        <td></td>
                        <td>
                            <button type="submit">Login</a>
                        </td>
                    </tr>
                </table>
            </form>
            <script>
                function formProcess() {
                    if (document.getElementById('user').value == '') {
                        alert('Enter Student ID');
                        document.getElementById('user').focus();
                        return false;
                    }

                    if (document.getElementById('pwd').value == '') {
                        alert('Enter password');
                        document.getElementById('pwd').focus();
                        return false;
                    }
                    
                    return true;
                }
            </script> <?php
        }
    } ?>
</main>
<?php printFooter(); ?>