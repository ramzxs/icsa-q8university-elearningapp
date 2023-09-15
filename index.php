<?php

require_once 'libs/main.php';
?>
<?php printHeader('Home'); ?>
<main>
    <h1>HOME</h1>

    <p>Welcome!</p>

    <h2>UNIVERSITY'S LIST OF COURSES</h2>

    <?php
    $DB = connectDatabase();

    $sql = "SELECT * FROM `course`";
    $stmt = $DB->query($sql);
    for ($i = 1; $row = $stmt->fetch(); $i++) {
        ?>
        <div title="Course ID <?= $row['crsID'] ?>"
                style="border: 1px solid #333; padding: 10px">
            <h3><?= $row['crsTitle'] ?></h3>
            <p><?= str_replace("\r", '<br>', $row['crsDescription']) ?></p>
            <p><strong><?= number_format($row['crsUnits'], 2) ?></strong></p>
        </div>
        <?php
    }
    ?>

    <hr>

    <?php
    if ( isset($_SESSION['USER']) ) {
        echo "Welcome!";
    } else {
        echo "Login in first.";
    } ?>
</main>
<?php printFooter(); ?>