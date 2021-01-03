<?php
include '../database/adminDB.php';
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Complaint</title>
    <link rel="stylesheet" href="../css/admin/adminComplain.css">
</head>

<body>
    <!--welcome header bar-->
    <header class="header">
        <div class="welcome">
            <p id="welcome">complaint page</p>
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


    <main class="main">
        <table style="width: 60%" border="1">
            <tr>
                <th>S.NO</th>
                <th>Complain ID</th>
                <th>Name</th>
                <th>Surname</th>
                <th>User Name</th>
                <th>Flat No</th>
                <th>About</th>
                <th>Complain</th>
                <th>Delete</th>
            </tr>
            <?php
            $checkUserInDB = $db->prepare("SELECT * FROM complains");
            $checkUserInDB->execute();
            $say = 0;
            while ($pullinfo = $checkUserInDB->fetch(PDO::FETCH_ASSOC)) {
                $say++
            ?>
                <tr>
                    <td><?php echo $say; ?></td>
                    <td><?php echo $pullinfo['complainID']; ?></td>
                    <td><?php echo $pullinfo['userName']; ?></td>
                    <td><?php echo $pullinfo['userSurname']; ?></td>
                    <td><?php echo $pullinfo['userUsername']; ?></td>
                    <td><?php echo $pullinfo['userFlatno']; ?></td>
                    <td><?php echo $pullinfo['about']; ?></td>
                    <td><?php echo $pullinfo['userComplain']; ?></td>
                    <td align="center"><a href="../index/delete.php?complainID=<?php echo $pullinfo['complainID'] ?>&userComplaintdelete=delete"><button>Delete</button></td></a>
                </tr>
            <?php } ?>
        </table>
        <?php
        if (isset($_GET['delete'])) {
            if ($_GET['delete'] == "ok") {
                echo "Successfully deleted";
            } elseif ($_GET['delete'] == "no") {
                echo "Failed deleted";
            }
        }

        ?>
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