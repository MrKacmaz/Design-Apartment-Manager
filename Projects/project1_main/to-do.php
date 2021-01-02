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
            <li class="nav-ul-li"><a href="main.php">MAIN</a></li>
            <li class="nav-ul-li"><a href="information.php">INFORMATION</a></li>
            <li class="nav-ul-li"><a href="to-do.php">TO/DO</a></li>
            <li class="nav-ul-li"><a href="complaint.php">COMPLAINT</a></li>
            <li class="nav-ul-li"><a href="account.php">ACCOUNT</a></li>
            <li class="nav-ul-li"><a href="logout.php">LOG-OUT</a></li>
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
                    <li class="mainl-list">Light: ₺<?php echo $pullinfo['corridorLight'] ?></li>
                    <li class="mainl-list">Water: ₺<?php echo $pullinfo['corridorWater'] ?></li>
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
                <th class="text-table">RENT</th>
                <th class="text-table">CORRIDOR ELECTRIC BILL</th>
                <th class="text-table">CORRIDOR WATER BILL</th>
                <th class="text-table">CORRIDOR CLEANING BILL</th>
                <th class="text-table">FUEL BILL</th>
                <th class="text-table">SUM</th>
            </tr>
            <tr>
                <td>10</td>
                <td>20</td>
                <td>100</td>
                <td>50</td>
                <td>50</td>
                <td>230</td>
            </tr>
        </table>
        <div class="btn-class">
            <button type="button" class="btn" id="btn-todo">PAY THE RECENT BILL</button>
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