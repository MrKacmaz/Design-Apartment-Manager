<?php
include '../database/adminDB.php';
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bills</title>
    <link rel="stylesheet" href="../css/admin/adminTODO.css">

</head>

<body>

    <!--welcome header bar-->
    <header class="header">
        <div class="welcome">
            <p id="welcome">to-do page</p>
        </div>
    </header>


    <!--NAV BAR-->
    <nav class="nav">
        <span>MANAGEMENT SYSTEM</span>
        <ul class="nav-ul">
            <li class="nav-ul-li"><a href="adminPanel.php">MAIN</a></li>
            <li class="nav-ul-li"><a href="adminInfo.php">USERS</a></li>
            <li class="nav-ul-li"><a href="adminTODO.php">TO/DO</a></li>
            <li class="nav-ul-li"><a href="adminBills.php">BILLS</a></li>
            <li class="nav-ul-li"><a href="adminComplaint.php">COMPLAINTS</a></li>
            <li class="nav-ul-li"><a href="adminAccount.php">USER ADD</a></li>
            <li class="nav-ul-li"><a onclick="logoutFun()">LOG-OUT</a></li>
        </ul>
        <script>
        function logoutFun(){
            var bol = confirm("ARE YOU SURE TO LOG-OUT ?");
            if(bol){
                location = "adminLogOut.php";
            }
        }
        </script>
    </nav>

    <main class="section">
        <table id="payment">

            <tr>
                <th class="text-table">Bill ID</th>
                <th class="text-table">Bill Date</th>
                <th class="text-table">is ok</th>
                <th class="text-table">Rent</th>
                <th class="text-table">Corridor Electric Bill</th>
                <th class="text-table">Maintenance Bill</th>
                <th class="text-table">Corridor Cleaning Bill</th>
                <th class="text-table">Fuel Bill</th>
                <th class="text-table">SUM</th>
                <th class="text-table">UPDATE</th>

            </tr>
            <?php
            $checkUserInDB = $db->prepare("SELECT * FROM bills");
            $checkUserInDB->execute();
            while ($pullinfo = $checkUserInDB->fetch(PDO::FETCH_ASSOC)) {
            ?>

                <?php
                $sum = $pullinfo['rent'] + ($pullinfo['corridorLight'] / 10) + ($pullinfo['corridorWater'] / 10) + ($pullinfo['corridorCleaning'] / 10) + ($pullinfo['fuel'] / 10);
                ?>
                <tr>
                    <td><?php echo $pullinfo['billID'] ?></td>
                    <td><?php echo $pullinfo['billDate'] ?></td>
                    <td><?php echo $pullinfo['isOK'] ?></td>
                    <td><?php echo $pullinfo['rent'] ?></td>
                    <td><?php echo $pullinfo['corridorLight'] ?></td>
                    <td><?php echo $pullinfo['corridorWater'] ?></td>
                    <td><?php echo $pullinfo['corridorCleaning'] ?></td>
                    <td><?php echo $pullinfo['fuel'] ?></td>
                    <td><?php echo $sum ?></td>
                    <td><a href="../index/payBill.php?billID=<?php echo $pullinfo['billID'] ?>"><button>UPDATE</button></a></td>
                </tr>
            <?php
            }
            ?>
        </table><br><br>

        <!--UPDATE VEYA ADD İŞLEMİNİN SONUCUNU YAZDIRIR-->
        <?php
        if (isset($_GET['addNewBill'])) {
            if ($_GET['addNewBill'] == "ok") {
                echo "kayıt başarılı";
            } elseif ($_GET['addNewBill'] == "no") {
                echo "kayıt başarısız";
            }
        }

        if (isset($_GET['update'])) {
            if ($_GET['update'] == "ok") {
                echo  $_GET['billID'] . " nolu güncelleme başarılı";
            } elseif ($_GET['update'] == "no") {
                echo $_GET['billID'] . " nolu güncelleme başarısız";
            }
        }
        ?>
        <br><br><button onclick="addNewBillAlert()">ADD NEW BILL</button>
        <br><br><a href="../index/showBills.php?admin"><button>SHOW PAYING EVERYBODY</button></a>
        <script>
        function addNewBillAlert(){
            var bol = confirm("DO YOU WANT TO ADD NEW BILL ?");
            if(bol){
                location = "../index/payBill.php?addNewBill=1";
            }
        }
        </script>
    </main>

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