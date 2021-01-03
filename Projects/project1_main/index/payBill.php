<?php
require_once '../database/logDB.php';
require_once '../database/adminDB.php';
session_start(); ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>

    <!-- START ADD NEW BILL IN DATABASE-->
    <?php
    //NEW FORM
    if (isset($_GET['addNewBill'])) {
        if ($_GET['addNewBill'] == 1) {
            echo "
        <form action='payBill.php' method='POST'>
        rent:<input type='text' name='rent' id='rent'><br><br>
        corridorLight:<input type='text' name='corridorLight' id='corridorLight'><br><br>
        corridorWater:<input type='text' name='corridorWater' id='corridorWater'><br><br>
        corridorCleaning:<input type='text' name='corridorCleaning' id='corridorCleaning'><br><br>
        fuel:<input type='text' name='fuel' id='fuel'><br><br>
        isOK:<input type='text' name='isOK' id='isOK'><br><br>
        <input type='submit' name='submitBill' id='submitBill'>
    </form>";
        }
    }
    //INSERTION
    if (isset($_POST['submitBill'])) {
        $kaydet = $db->prepare("INSERT into bills set
		    rent=:rent,
		    corridorLight=:corridorLight,
		    corridorWater=:corridorWater,
		    corridorCleaning=:corridorCleaning,
            fuel =:fuel,
            isOK =:isOK
            ");

        $insert = $kaydet->execute(array(
            'rent' => $_POST['rent'],
            'corridorLight' => $_POST['corridorLight'],
            'corridorWater' => $_POST['corridorWater'],
            'corridorCleaning' => $_POST['corridorCleaning'],
            'fuel' => $_POST['fuel'],
            'isOK' => $_POST['isOK']
        ));
        if ($insert) {
            header("Location:../admin/adminBills.php?addNewBill=ok");
            exit;
        } else {
            header("Location:../admin/adminBills.php?addNewBill=no");
            exit;
        }
    }
    ?>
    <!-- END ADD NEW BILL IN DATABASE-->






    <!-- START UPDATE BILL-->
    <?php
    if (isset($_GET['billID'])) {
        $bilgilerimsor = $db->prepare("SELECT * from bills where billID=:billID");
        $bilgilerimsor->execute(array(
            'billID' => $_GET['billID']
        ));

        $bilgilerimcek = $bilgilerimsor->fetch(PDO::FETCH_ASSOC);
        $billID = $bilgilerimcek['billID'];
        $billDate = $bilgilerimcek['billDate'];
        $rent = $bilgilerimcek['rent'];
        $corridorLight = $bilgilerimcek['corridorLight'];
        $corridorWater = $bilgilerimcek['corridorWater'];
        $corridorCleaning = $bilgilerimcek['corridorCleaning'];
        $fuel = $bilgilerimcek['fuel'];
        $isOK = $bilgilerimcek['isOK'];

        echo "
        <form action='payBill.php?billID=$billID' method='POST'>
        bill ID:<input type='text' name='rent' id='rent' value='$billID'><br><br>
        bill Date:<input type='text' name='rent' id='rent' value='$billDate'><br><br>
        rent:<input type='text' name='rent' id='rent' value='$rent'><br><br>
        corridorLight:<input type='text' name='corridorLight' id='corridorLight' value='$corridorLight'><br><br>
        corridorWater:<input type='text' name='corridorWater' id='corridorWater' value='$corridorWater'><br><br>
        corridorCleaning:<input type='text' name='corridorCleaning' id='corridorCleaning' value='$corridorCleaning'><br><br>
        fuel:<input type='text' name='fuel' id='fuel' value='$fuel'><br><br>
        isOK:<input type='text' name='isOK' id='isOK' value='$isOK'><br><br>
        <input type='submit' name='updateBill' id='updateBill'>
    </form>";
    }

    if (isset($_POST['updateBill'])) {
		$kaydet = $db->prepare("UPDATE bills set
		    rent=:rent,
		    corridorLight=:corridorLight,
		    corridorWater=:corridorWater,
		    corridorCleaning=:corridorCleaning,
            fuel =:fuel,
            isOK =:isOK

		where billID={$billID}
		");

		$insert = $kaydet->execute(array(
            'rent' => $_POST['rent'],
            'corridorLight' => $_POST['corridorLight'],
            'corridorWater' => $_POST['corridorWater'],
            'corridorCleaning' => $_POST['corridorCleaning'],
            'fuel' => $_POST['fuel'],
            'isOK' => $_POST['isOK']
        ));
        
        if ($insert) {
			//echo "kayıt başarılı";
			Header("Location:../admin/adminBills.php?update=ok&billID=$billID");
			exit;
		} else {
			//echo "kayıt başarısız";
			Header("Location:../admin/adminBills.php?update=no&billID=$billID");
			exit;
		}
    }
    ?>
    <!-- END UPDATE BILL-->

</body>

</html>