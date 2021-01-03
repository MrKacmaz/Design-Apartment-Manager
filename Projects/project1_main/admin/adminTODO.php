<?php
include '../database/adminDB.php';
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>To/Do</title>
    <link rel="stylesheet" href="../css/admin/adminTODO.css">
</head>

<body>
    <!--welcome header bar-->
    <header class="header">
        <div class="welcome">
            <p id="welcome">to-do page</p>
        </div>
    </header>


    <!--MENU BAR-->
    <nav class="nav">
        <span>MANAGEMENT SYSTEM</span>
        <ul class="nav-ul">
            <li class="nav-ul-li"><a href="adminPanel.php">MAIN</a></li>
            <li class="nav-ul-li"><a href="adminInfo.php">USERS</a></li>
            <li class="nav-ul-li"><a href="adminTODO.php">TO/DO</a></li>
            <li class="nav-ul-li"><a href="adminBills.php">BILLS</a></li>
            <li class="nav-ul-li"><a href="adminComplaint.php">COMPLAINTS</a></li>
            <li class="nav-ul-li"><a href="adminAccount.php">USER ADD</a></li>
            <li class="nav-ul-li"><a href="adminLogOut.php">LOG-OUT</a></li>
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
                    <br>
                    <li class="mainl-list">ID: <?php echo $pullinfo['toDoID'] ?></li>
                    <li class="mainl-list"> <?php echo $pullinfo['toDo'] ?></li>
                    <a href="../index/updateArrangements.php?arrangement=0&toDoID=<?php echo $pullinfo['toDoID'] ?>"><button>Update</button></a><br>
                <?php
                }
                ?>
            </ul><br>
            <?php
            if (isset($_GET['UPDATE'])) {
                if ($_GET['UPDATE'] == "ok") {
                    echo "The arrangement with id number " . $_GET['toDoID'] . " has been updated";
                } elseif ($_GET['UPDATE'] == "no") {
                    echo "An error occurred with the problem with id number " . $_GET['toDoID'];
                }
            }
            ?>
        </div>

        <div class="main-content-2">
            <span>apartment expenses</span><br>

            <ul>
                <?php
                $checkUserInDB = $db->prepare("SELECT * FROM apartmentexpenses");
                $checkUserInDB->execute();
                while ($pullinfo = $checkUserInDB->fetch(PDO::FETCH_ASSOC)) {
                ?>
                    <br>
                    <li class="mainl-list">ID:<?php echo $pullinfo['expensesID'] ?></li>
                    <li class="mainl-list">Date:<?php echo $pullinfo['expensesTime'] ?></li>
                    <li class="mainl-list">Lights: ₺<?php echo $pullinfo['corridorLight'] ?></li>
                    <li class="mainl-list">Pool Maintenance: ₺<?php echo $pullinfo['corridorWater'] ?></li>
                    <li class="mainl-list">Extra: ₺<?php echo $pullinfo['corridorExtra'] ?></li>
                    <li class="mainl-list">IS OK:<?php echo $pullinfo['isOK'] ?></li>
                    <a href="../index/updateExpenses.php?expensesID=<?php echo $pullinfo['expensesID'] ?>"><button>Update</button></a><br>
                <?php
                }
                ?>
            </ul><br>
            <?php
            if (isset($_GET['expensesUpdated'])) {
                if ($_GET['expensesUpdated'] == "ok") {
                    echo "The expenses with id number " . $_GET['expensesID'] . " has been updated";
                } elseif ($_GET['expensesUpdated'] == "no") {
                    echo "An error occurred with the problem with id number " . $_GET['expensesID'];
                }
            }
            ?>
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