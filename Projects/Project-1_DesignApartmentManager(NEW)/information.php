<?php
include 'database/logDB.php';
session_start();
ob_start();

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Information</title>
    <link rel="stylesheet" href="css/information.css">
 
</head>

<body>

    <header class="header">
        <div class="welcome">
            <p id="welcome">information page</p>
        </div>
    </header>


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
        <div class="main-item">
            <h2>List of All Tenant </h2>
            <div>
                <table style="width: 60%" border="1">

                    <tr>
                        <th>ROW NO</th>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Surname</th>
                        <th>User Name</th>
                        <th>Flat No</th>
                        <th>E-Mail</th>
                        <th>GSM</th>
                    </tr>
                    <?php
                    $checkUserInDB = $db->prepare("SELECT * FROM usersinfo");
                    $checkUserInDB->execute();
                    $say = 0;
                    while ($pullinfo = $checkUserInDB->fetch(PDO::FETCH_ASSOC)) {
                        $say++
                    ?>
                        <tr>
                            <td>
                                <?php echo $say; ?>
                            </td>
                            <td>
                                <?php echo $pullinfo['userID']; ?>
                            </td>
                            <td>
                                <?php echo $pullinfo['userName']; ?>
                            </td>
                            <td>
                                <?php echo $pullinfo['userSurname']; ?>
                            </td>
                            <td>
                                <?php echo $pullinfo['userUsername']; ?>
                            </td>
                            <td>
                                <?php echo $pullinfo['userFlatno']; ?>
                            </td>
                            <td>
                                <?php echo $pullinfo['userEmail']; ?>
                            </td>
                            <td>
                                <?php echo $pullinfo['userGSM']; ?>
                            </td>
                        </tr>
                    <?php } ?>
                </table>
            </div>
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