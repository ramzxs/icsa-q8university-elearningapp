<?php

require_once 'libs/main.php';
?>
<?php printHeader('My Courses'); ?>
<main>
    <h1>My Courses</h1>

    <?php
    // User Session
    if (!isset($_SESSION['USER'])) { ?>
        <p><a href="login.php">Login</a> first</p>
        <?php
    } else {
        ?>

        <h2>COURSES</h2>

        <p>Welcome, <b><?= $_SESSION['USER'] ?></b>! Here are your courses:</p>

        <table border="1" cellpadding="5" cellspacing="0" width="100%">
            <tr>
                <td>#</td>
                <td>COURSE TITLE</td>
                <td>COURSE DESCRIPTION</td>
            </tr>
            <?php
            $DB = connectDatabase();
            $sql = "SELECT *
                FROM `enrollment`, `course`
                WHERE
                    `enrCourse` = `crsID` AND
                    `enrStudent` = '".$_SESSION['USER']."'";
            $stmt = $DB->query($sql);
            for ($i = 1; $row = $stmt->fetch(); $i++) { ?>
                <tr>
                    <td><?= $i ?>.</td>
                    <td>
                        <a href="?course=<?= $row['crsID'] ?>"><?= $row['crsTitle'] ?></a>
                    </td>
                    <td>
                        <?= str_replace("\r", "<br>", $row['crsDescription']) ?>
                    </td>
                </tr>
                <?php
            }
            ?>
        </table>
        <br>


        <?php
        if ( isset($_GET['course']) ) {
            ?>
            <h3>COURSE MATERIALS</h3>

            <table border="1" cellpadding="5" cellspacing="0">
                <tr>
                    <td>#</td>
                    <td>CM ID</td>
                    <td>TITLE</td>
                    <td>DOWNLOAD</td>
                </tr> <?php
                $CONN = connectDatabase();
                $stmt = $CONN->query("SELECT * FROM `course_material`
                    WHERE `cmCourse` = '".$_GET['course']."'
                ");
                for ($i = 1; $row = $stmt->fetch(); $i++) { ?>
                    <tr>
                        <td><?= $i ?>.</td>
                        <td><?= $row['cmID'] ?></td>
                        <td><?= $row['cmTitle'] ?></td>
                        <td>
                            <?php
                            $cms = explode("|", trim($row['cmFiles']));
                            for ($j = 0; $j < count($cms); $j++) { ?>
                                <a href="materials/<?= $cms[$j] ?>"
                                    target="_blank"><?= $cms[$j] ?></a><br>
                                <?php
                            }
                            ?>
                        </td>
                    </tr>
                    <?php
                }
                ?>
            </table>
            
            <?php
           
        }
    } ?>
</main>
<?php printFooter(); ?>