<?php
include '../database/logDB.php';
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php
    if (isset($_GET['payerID'])) {
        echo "
        <main id='section'>
        <table id='payment'>
            <tr>
                <th class='text-table'>uniquePayerID</th>
                <th class='text-table'>payerDate</th>
                <th class='text-table'>payerID</th>
                <th class='text-table'>payerName</th>
                <th class='text-table'>payerFlat</th>
                <th class='text-table'>payerMuch</th>
            </tr>";

        $payerID = $_GET['payerID'];
        $checkUserInDB = $db->prepare("SELECT * FROM billpayers WHERE payerID = $payerID");
        $checkUserInDB->execute();
        while ($pullinfo = $checkUserInDB->fetch(PDO::FETCH_ASSOC)) {
    ?>
            <tr>
                <td><?php echo $pullinfo['uniquePayerID'] ?></td>
                <td><?php echo $pullinfo['payerDate'] ?></td>
                <td><?php echo $pullinfo['payerID'] ?></td>
                <td><?php echo $pullinfo['payerName'] ?></td>
                <td><?php echo $pullinfo['payerFlat'] ?></td>
                <td><?php echo $pullinfo['payerMuch'] ?></td>
            </tr>
    <?php
        }
    }
    ?>
    </table>
    </main>




    <?php
    if (isset($_GET['admin'])) {
        echo "
        <main id='section'>
        <table id='payment'>
            <tr>
                <th class='text-table'>uniquePayerID</th>
                <th class='text-table'>payerDate</th>
                <th class='text-table'>payerID</th>
                <th class='text-table'>payerName</th>
                <th class='text-table'>payerFlat</th>
                <th class='text-table'>payerMuch</th>
            </tr>";
        $checkUserInDB = $db->prepare('SELECT * FROM billpayers');
        $checkUserInDB->execute();
        while ($pullinfo = $checkUserInDB->fetch(PDO::FETCH_ASSOC)) {
    ?>
            <tr>
                <td><?php echo $pullinfo['uniquePayerID'] ?></td>
                <td><?php echo $pullinfo['payerDate'] ?></td>
                <td><?php echo $pullinfo['payerID'] ?></td>
                <td><?php echo $pullinfo['payerName'] ?></td>
                <td><?php echo $pullinfo['payerFlat'] ?></td>
                <td><?php echo $pullinfo['payerMuch'] ?></td>
            </tr>
    <?php
        }
    }
    ?>
    </table>
    </main>

</body>

</html>