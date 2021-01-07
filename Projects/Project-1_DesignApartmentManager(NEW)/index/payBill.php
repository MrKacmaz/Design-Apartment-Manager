<?php
require_once '../database/logDB.php';
require_once '../database/adminDB.php';
session_start(); 
ob_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: Arial, Helvetica, sans-serif;
        }

        body {
            margin: 0;
            padding: 0;
        }

        .welcome {
            background-image: linear-gradient(to left, rgb(237, 66, 100), rgb(255, 237, 189));
            padding: 3.5%;
            text-align: center;
            font-size: 2rem;
            text-transform: uppercase;
            color: #333;
        }

        #welcome {
            text-shadow: 2px 1.5px #ffedbc;
        }

        .nav {
            background-color: #333;
            color: white;
            padding: 1rem;
            display: flex;
            align-items: center;
            justify-content: space-between;

        }

        .nav-ul {
            margin: 0;
            list-style: none;
            display: flex;
        }

        .nav-ul-li {
            padding: .75rem;
        }

        .nav-ul-li:hover {
            background-color: #777;
        }

        .nav-ul-li a {
            text-decoration: none;
            color: inherit;
        }

        .btn-class {
            margin-left: 65%;
            cursor: pointer;
        }

        .btn {
            padding: .5em;
            margin: 0.5em 1em;
            outline: none;
            font-size: 1em;
            border-radius: 0.6em;
            cursor: pointer;

        }

        .btn :hover {
            background-color: #ddd;
            box-shadow: 0 0 5px #ccc;
        }



        .main-content {

            display: flex;
            padding: 2%;
            flex-wrap: wrap;
            flex-direction: row;
        }

        .main-item {
            padding: 2%;
            line-height: 1.5;
            text-align: center;
            flex: 1;
            flex-grow: 1;
            flex-basis: 0;
        }

        .main-item h2 {
            color: #da4167;
        }

        .main-item p {
            margin-top: 0.5rem;
        }

        table,
        th,
        td {
            align-items: center;
            padding: 0.75%;
            margin: auto;
            border: .25em solid #333;
            border-collapse: collapse;
            justify-content: center;

        }

        .links {
            position: fixed;
            width: 100%;
            height: 10%;
            bottom: 0;
            background-color: #333;
            padding: 1rem;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .links ul {
            margin: 0;
            list-style: none;
            display: flex;

        }

        .links ul li {
            padding: .5rem;
        }

        .links ul li:hover {
            background-color: #777;
        }

        .links ul li a {
            text-decoration: none;
            color: inherit;
        }
    </style>

</head>


<body>
    <header class="header">

    </header>


    <nav class="nav">
        <span>MANAGEMENT SYSTEM</span>
    </nav>

    <div class="main-content">
        <!-- START ADMIN ADD NEW BILL IN DATABASE-->
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
        <!-- END ADMIN ADD NEW BILL IN DATABASE-->






        <!-- START ADMIN UPDATE BILL-->
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
        <!-- END ADMIN UPDATE BILL-->




        <!-- START USER PAYS BILL-->
        <?php
        if (isset($_GET['userPayBill'])) {

            $kaydet = $db->prepare("INSERT into billpayers set
		payerID=:payerID,
		payerName=:payerName,
		payerFlat=:payerFlat,
		payerMuch=:payerMuch

        ");

            $insert = $kaydet->execute(array(
                'payerID' => $_SESSION['userID'],
                'payerName' => $_SESSION['userName'],
                'payerFlat' => $_SESSION['userFlatno'],
                'payerMuch' => $_GET['sumOfBill']

            ));
            if ($insert) {
                //echo "kayıt başarılı";
                Header("Location:../to-do.php?payment=success");
                exit;
            } else {
                //echo "kayıt başarısız";
                Header("Location:../to-do.php?payment=failed");
                exit;
            }
        }
        ?>
        <!-- END USER PAYS BILL-->

    </div>
    <footer class="footer">
        <div class="links">
            <ul>
                <li class="link"><a href="https://www.linkedin.com/in/alperen-ka%C3%A7maz-2202/" title="LinkedIn" target="_blanced"><img src="https://encrypted-tbn0.gstatic.com/images?q=tbn%3AANd9GcTMdFqfhP3dTNKjtRennSsHXGUmiF9yJ2AfVQ&usqp=CAU" height="50" width="50" alt="LinkedIn"></a></li>
                <li class="link"><a href="https://www.instagram.com/mr.kacmaz" title="Instagram" target="_blanced"><img src="https://pazarlamasyon.com/wp-content/uploads/2018/01/new-instagram-logo-clipart-16.jpg" height="50" width="50" alt="Instagram"></a></li>
                <li class="link"><a href="https://github.com/MrKacmaz" title="GitHub" target="_blanced"> <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn%3AANd9GcSUP7RN0hZaqZpljtz9c0nz5eSc2DFY-XSRQA&usqp=CAU" width="50" height="50" alt="GitHub"> </a></li>
            </ul>
        </div>

    </footer>


</body>

</html>