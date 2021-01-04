<?php
include 'database/logDB.php';
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>To/Do</title>
    <link rel="stylesheet" href="css/to-do.css">
</head>

<body>
    <!--HEADER BAR-->
    <header class="header">
        <div class="welcome">
            <p id="welcome">to-do page</p>
        </div>
    </header>


    <!--NAV BAR-->
    <nav class="nav">
        <span>MANAGEMENT SYSTEM</span>
        <ul class="nav-ul">
            <li class="nav-ul-li"><a href="main.php">MAIN</a></li>
            <li class="nav-ul-li"><a href="information.php">INFORMATION</a></li>
            <li class="nav-ul-li"><a href="to-do.php">TO/DO</a></li>
            <li class="nav-ul-li"><a href="complaint.php">COMPLAINT</a></li>
            <li class="nav-ul-li"><a href="account.php">ACCOUNT</a></li>
            <li class="nav-ul-li"><a onclick="logoutFun()">LOG-OUT</a></li>
            <script>
                function logoutFun() {
                    var bol = confirm("ARE YOU SURE TO LOG-OUT?");
                    if (bol) {
                        location = "logout.php";
                    }
                }
            </script>
        </ul>
    </nav>





    <main class="main-content">
        <div class="main-content-1">
            <span>garden arrangements</span>
            <ul>
                <?php
                $checkUserInDB = $db->prepare("SELECT * FROM gardenarrangements");
                $checkUserInDB->execute();
                while ($pullinfo = $checkUserInDB->fetch(PDO::FETCH_ASSOC)) {
                ?>
                    <li class="mainl-list"> <?php echo $pullinfo['toDo'] ?></li>
                <?php
                }
                ?>
            </ul>
        </div>

        <div class="main-content-2">
            <span>apartment expenses</span><br>

            <ul>
                <?php
                $checkUserInDB = $db->prepare("SELECT * FROM apartmentexpenses WHERE isOK = 0");
                $checkUserInDB->execute();
                while ($pullinfo = $checkUserInDB->fetch(PDO::FETCH_ASSOC)) {
                ?>
                    <li class="mainl-list">Lights: ₺<?php echo $pullinfo['corridorLight'] ?></li>
                    <li class="mainl-list">Pool Maintenance: ₺<?php echo $pullinfo['corridorWater'] ?></li>
                    <li class="mainl-list">Extra: ₺<?php echo $pullinfo['corridorExtra'] ?></li>
                <?php
                }
                ?>
            </ul>

        </div>
    </main>



    <main class="section">
        <table id="payment">

            <tr>
                <th class="text-table">Bill ID</th>
                <th class="text-table">Bill Date</th>
                <th class="text-table">Rent</th>
                <th class="text-table">Corridor Electric Bill</th>
                <th class="text-table">Maintenance Bill</th>
                <th class="text-table">Corridor Cleaning Bill</th>
                <th class="text-table">Fuel Bill</th>
                <th class="text-table">SUM</th>
            </tr>
            <?php
            $checkUserInDB = $db->prepare("SELECT * FROM bills WHERE isOK = 0");
            $checkUserInDB->execute();
            while ($pullinfo = $checkUserInDB->fetch(PDO::FETCH_ASSOC)) {
            ?>
                <?php
                $sum = $pullinfo['rent'] + ($pullinfo['corridorLight'] / 10) + ($pullinfo['corridorWater'] / 10) + ($pullinfo['corridorCleaning'] / 10) + ($pullinfo['fuel'] / 10);
                ?>
                <tr>
                    <td><?php echo $pullinfo['billID'] ?></td>
                    <td><?php echo $pullinfo['billDate'] ?></td>
                    <td><?php echo $pullinfo['rent'] ?></td>
                    <td><?php echo $pullinfo['corridorLight'] ?></td>
                    <td><?php echo $pullinfo['corridorWater'] ?></td>
                    <td><?php echo $pullinfo['corridorCleaning'] ?></td>
                    <td><?php echo $pullinfo['fuel'] ?></td>
                    <td><?php echo $sum ?></td>
                </tr>
            <?php
            }
            ?>
        </table>
        <div class="btn-class">
            <?php
            if (isset($sum)) {
                $userID = $_SESSION['userID'];
                echo "<button type='button' class='btn' id='btn-todo' onclick='alertFun()'>PAY THE RECENT BILL</button>";
            } else {
                echo "<p><b>no invoices to be paid</b></p>";
            }
            ?>
            <script>
                function alertFun() {
                    var bol = confirm("YOU WILL BE DIRECTED TO THE PAYMENT PAGE");
                    if (bol) {
                        location = "index/payBill.php?userPayBill&userID=$userID&sumOfBill=<?php echo $sum ?>";
                    }
                }
            </script>
            <br>
            <a href="index/showBills.php?payerID=<?php echo $_SESSION['userID'] ?>"><button type='button' class='btn' id='btn-todo'>SHOW ALL BILLS</button></a>
        </div>

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