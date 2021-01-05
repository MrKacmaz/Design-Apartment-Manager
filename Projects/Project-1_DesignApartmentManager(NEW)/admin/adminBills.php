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
            background-image: linear-gradient(to left, #ed4264, #ffedbc);
            padding: 3.5%;
            text-align: center;
            font-size: 2rem;
            text-transform: capitalize;
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

        .main-content {
            display: flex;
            padding: 2%;
            flex-wrap: wrap;
            flex-direction: row;
        }

        .main-content-1 {
            background-color: rgb(237, 66, 100, 0.5);
            padding: 4%;
            margin: auto;
            text-transform: capitalize;
            color: #333;
        }

        .main-content-1 li {
            font-size: 1.5rem;
        }

        .main-content-1 span {
            font-size: 2rem;

        }

        .main-content-2 {
            background-color: rgb(237, 66, 100, 0.5);
            padding: 4%;
            margin: auto;
            text-transform: capitalize;
            color: #333;
        }

        .main-content-2 li {
            font-size: 1.5rem;
        }

        .main-content-2 span {
            font-size: 2rem;
        }

        .section {
            background-image: linear-gradient(to right, rgb(237, 66, 100, 0.5), rgb(255, 237, 189, 0.5));
            padding: 1rem;
            margin: 1em 15%;

        }

        .text-table {
            color: white;
            text-shadow: 2px 1.5px blue;
            ;
            font-size: 1em;
        }

        table,
        th,
        td {
            border: 3px solid black;
            border-collapse: collapse;
            padding: 1rem;
            margin: auto;
        }

        .btn-class {
            margin-left: 65%;
        }

        .btn {
            padding: 1em;
            margin: 0.5em 1em;
            outline: none;
            font-size: 1em;
            border-radius: 0.6em;

        }

        .btn :hover {
            background-color: #ddd;
            box-shadow: 0 0 5px #ccc;
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

        .btn-class {
            margin-left: 65%;
            cursor: pointer;
        }

        .btn {
            padding: .15em;
            margin: 0.05em .05em;
            outline: none;
            font-size: 1em;
            border-radius: 0.6em;
            cursor: pointer;

        }

        .btn :hover {
            background-color: #ddd;
            box-shadow: 0 0 5px #ccc;
        }
    </style>
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
            function logoutFun() {
                var bol = confirm("ARE YOU SURE TO LOG-OUT ?");
                if (bol) {
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
                    <td><a href="../index/payBill.php?billID=<?php echo $pullinfo['billID'] ?>"><button class="btn">UPDATE</button></a></td>
                </tr>
            <?php
            }
            ?>
        </table><br><br>


        <!--UPDATE VEYA ADD İŞLEMİNİN SONUCUNU YAZDIRIR-->
        <?php
        if (isset($_GET['addNewBill'])) {
            if ($_GET['addNewBill'] == "ok") {
                echo "<p style='color: green; font-size: larger;'><b>Bill Registration Successful</b></p>";
            } elseif ($_GET['addNewBill'] == "no") {
                echo "<p style='color: red; font-size: larger;'><b>Bill Registration Failed</b></p>";
            }
        }

        if (isset($_GET['update'])) {
            if ($_GET['update'] == "ok") {
                echo "<p style='color: green; font-size: larger;'><b>Update # " . $_GET['billID'] . " successful</b></p>";
            } elseif ($_GET['update'] == "no") {
                echo "<p style='color: red; font-size: larger;'><b>Update # " . $_GET['billID'] . " failed</b></p>";
            }
        }
        ?>

        <br><br><button class="btn" onclick="addNewBillAlert()">ADD NEW BILL</button>
        <br><br><a href="../index/showBills.php?admin"><button class="btn">SHOW PAYING EVERYBODY</button></a>
        <script>
            function addNewBillAlert() {
                var bol = confirm("DO YOU WANT TO ADD NEW BILL ?");
                if (bol) {
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