<?php
include '../database/adminDB.php';
include '../database/logDB.php';
session_start();
ob_start();

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../css/admin/updatepanel.css">

</head>

<body>
    <header class="header">
        <div class="welcome">
            <p id="welcome"> ADMIN <?php echo $_SESSION['adminNAME'] . " " . $_SESSION['adminSURNAME'] ?></p>
        </div>
    </header>


    <nav class="nav">
        <span>MANAGEMENT SYSTEM</span>
    </nav>

    <main class="main-content">
        <div class="main-item">
            <h2>Update Expenses</h2>
        </div>
    </main>

    <?php
    if (isset($_GET['expensesID'])) {
        $expensesID = $_GET['expensesID'];
        $bilgilerimsor = $db->prepare("SELECT * from apartmentexpenses where expensesID=:expensesID");
        $bilgilerimsor->execute(array(
            'expensesID' => $_GET['expensesID']
        ));
        $bilgilerimcek = $bilgilerimsor->fetch(PDO::FETCH_ASSOC);
    }
    ?>
    <div>
        <form action="updateExpenses.php" method="POST">
            expensesID:<input type="int" value="<?php echo $bilgilerimcek['expensesID'] ?>" name="expensesID"><br><br>
            Expenses Time:<input type="text" required="" name="expensesTime" value="<?php echo $bilgilerimcek['expensesTime'] ?>"><br><br>
            corridorLight: <input type="text" required="" name="corridorLight" id="corridorLight" value="<?php echo $bilgilerimcek['corridorLight'] ?>"><br><br>
            corridorWater: <input type="text" required="" name="corridorWater" id="corridorWater" value="<?php echo $bilgilerimcek['corridorWater'] ?>"><br><br>
            corridorExtra: <input type="text" required="" name="corridorExtra" id="corridorExtra" value="<?php echo $bilgilerimcek['corridorExtra'] ?>"><br><br>
            isOK: <input type="text" required="" name="isOK" id="isOK" value="<?php echo $bilgilerimcek['isOK'] ?>"><br><br>
            <button type="submit" name="updateExpenses">Formu Düzenle</button>
        </form>
    </div>
    <?php
        if(isset($_POST['updateExpenses'])){
            $expensesID = $_POST['expensesID'];
            $corridorLight = $_POST['corridorLight'];
            $corridorWater = $_POST['corridorWater'];
            $corridorExtra = $_POST['corridorExtra'];
            $isOK = $_POST['isOK'];

            $update = $db->prepare("UPDATE apartmentexpenses set
            corridorLight=:corridorLight,
            corridorWater=:corridorWater,
            corridorExtra=:corridorExtra,
            isOK=:isOK
            where expensesID={$_POST['expensesID']}
            ");
    
            $insert = $update->execute(array(
    
                'corridorLight' => $_POST['corridorLight'],
                'corridorWater' => $_POST['corridorWater'],
                'corridorExtra' => $_POST['corridorExtra'],
                'isOK' => $_POST['isOK']
            ));
            if ($insert) {
                //echo "kayıt başarılı";
                Header("Location:../admin/adminTODO.php?expensesUpdated=ok&expensesID=$expensesID");
                exit;
            } else {
                //echo "kayıt başarısız";
                Header("Location:../admin/adminTODO.php?expensesUpdated=no&expensesID=$expensesID");
                exit;
            }

        }
    ?>

</body>

</html>