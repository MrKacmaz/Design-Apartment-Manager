<?php
include '../database/adminDB.php';
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Account</title>
    <link rel="stylesheet" href="../css/admin/adminAccount.css">
</head>

<body>
    <header class="header">
        <div class="welcome">
            <p id="welcome"> Account Page</p>
        </div>
    </header>



    <nav class="nav">
        <span>MANAGEMENT SYSTEM</span>
        <ul class="nav-ul">
            <li class="nav-ul-li"><a href="adminPanel.php">MAIN</a></li>
            <li class="nav-ul-li"><a href="adminInfo.php">USERS</a></li>
            <li class="nav-ul-li"><a href="adminTODO.php">TO/DO</a></li>
            <li class="nav-ul-li"><a href="adminComplaint.php">COMPLAINTS</a></li>
            <li class="nav-ul-li"><a href="adminAccount.php">USER ADD</a></li>
            <li class="nav-ul-li"><a href="adminLogOut.php">LOG-OUT</a></li>
        </ul>
    </nav>


    <main class="main-content">
        <div class="main-item">
            <h2>Account Transactions</h2>
            <p>You can add new user and new admin here</p>
        </div>
    </main>


    <section class="main-content">
        <div class="main-item">
            <form action="../index/new_user_sign.php" method="POST">

                <label for="userName">User Name</label>
                <input type="text" name="userName" id="userName" class="input" required><br><br>

                <label for="userSurname">User Surname</label>
                <input type="text" name="userSurname" id="userSurname" class="input" required><br><br>

                <label for="userUsername">User Username</label>
                <input type="text" name="userUsername" id="userUsername" class="input" required><br><br>

                <label for="userFlatno">User userFlatno</label>
                <input type="number" name="userFlatno" id="userFlatno" class="input" required><br><br>

                <label for="userGSM">User Phone Number</label>
                <input type="tel" name="userGSM" id="userGSM" class="input" placeholder="555-555-55-55" required><br><br>

                <label for="userEmail">User E-mail</label>
                <input type="email" name="userEmail" id="userEmail" class="input" placeholder="asd@asd.com" required><br><br>

                <label for="userPassword">User Password</label>
                <input type="password" name="userPassword" id="userPassword" class="input" required><br><br>

                <label for="submit"></label>
                <input type="submit" name="adminSignUser-btn" id="submit" class="btn" required>
                <label for="reset"></label>
                <input type="reset" name="reset" id="reset" class="btn" required>
            </form>

            <?php
            if (isset($_GET['adminUserSign'])) {
                if ($_GET['adminUserSign'] == "success") {
                    echo "kayıt başarılı";
                } elseif ($_GET['adminUserSign'] == "failed") {
                    echo "kayıt başarısız";
                }
            }
            ?>
        </div>

        <div class="main-item">
            <form action="../index/new_user_sign.php" method="POST">

                <label for="adminUSERNAME">Admin Username</label>
                <input type="text" name="adminUSERNAME" id="adminUSERNAME" class="input" required><br><br>

                <label for="adminNAME">Admin Name</label>
                <input type="text" name="adminNAME" id="adminNAME" class="input" required><br><br>

                <label for="adminSURNAME">Admin Surname</label>
                <input type="text" name="adminSURNAME" id="adminSURNAME" class="input" required><br><br>

                <label for="adminGSM">Admin Phone Number</label>
                <input type="tel" name="adminGSM" id="adminGSM" class="input" placeholder="555-555-55-55" required><br><br>

                <label for="adminGSM_2">Admin Phone Number 2</label>
                <input type="tel" name="adminGSM_2" id="adminGSM_2" class="input" placeholder="555-555-55-55" required><br><br>

                <label for="adminPASSWORD">Admin Password</label>
                <input type="password" name="adminPASSWORD" id="adminPASSWORD" class="input" required><br><br>

                <label for="adminEMAIL">Admin E-mail</label>
                <input type="email" name="adminEMAIL" id="adminEMAIL" class="input" placeholder="asd@asd.com" required><br><br>


                <label for="submit"></label>
                <input type="submit" name="adminSignAdmin-btn" id="submit-2" class="btn" required>
                <label for="reset"></label>
                <input type="reset" name="reset2" id="reset2" class="btn" required>
            </form>

            <?php
            if (isset($_GET['adminNewAdmin'])) {
                if ($_GET['adminNewAdmin'] == "success") {
                    echo "kayıt başarılı";
                } elseif ($_GET['adminNewAdmin'] == "failed") {
                    echo "kayıt başarısız";
                }
            }
            ?>

        </div>
    </section>


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