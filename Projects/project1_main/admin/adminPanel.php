<?php
include '../database/adminDB.php';
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Main</title>
    <link rel="stylesheet" href="../css/admin/adminPanelMain.css">
</head>

<body>

    <header class="header">
        <div class="welcome">
            <p id="welcome"> ADMIN <?php echo $_SESSION['adminNAME'] . " " . $_SESSION['adminSURNAME'] ?></p>
        </div>
    </header>


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
        <?php
        $checkUserInDB = $db->prepare("SELECT * FROM maintopics");
        $checkUserInDB->execute();
        while ($pullinfo = $checkUserInDB->fetch(PDO::FETCH_ASSOC)) {
        ?>
            <div class="main-item">

                <h2><?php echo $pullinfo['mainTopicsTitle'] ?></h2>
                <p> <?php echo $pullinfo['mainTopicsContent'] ?> </p>
                <a href="../index/mainTopics.php?mainTopicsID=<?php echo $pullinfo['mainTopicsID'] ?>"><button type="button">UPDATE</button></a>
            </div>
        <?php
        }
        ?>
    </main>
    <?php
    if (isset($_GET['mainTopicsUpdated'])) {
        if ($_GET['mainTopicsUpdated'] == "ok") {
            echo "Succesfully updated id " . $_GET['mainTopicsID'];
        } elseif ($_GET['mainTopicsUpdated'] == "no") {
            echo "Failed updated id " . $_GET['mainTopicsID'];
        } else {
            echo "SIKINTI BÜYÜK";
        }
    }
    ?>

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