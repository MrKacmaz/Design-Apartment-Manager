<?php
include '../database/adminDB.php';
session_start();
ob_start();

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Account</title>
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
            background-image: linear-gradient(to left,
                    rgb(237, 66, 100),
                    rgb(255, 237, 189));
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
            padding: 0.75rem;
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

        .links {
            position: static;
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
            padding: 0.5rem;
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
            padding: .25em;
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
    </style>
</head>

<body>
    <header class="header">
        <div class="welcome">
            <p id="welcome"> Account Page</p>
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
                <input type="number" name="userFlatno" id="userFlatno" class="input" required max="10" min="1"><br><br>

                <label for="userGSM">User Phone Number</label>
                <input type="tel" name="userGSM" id="userGSM" class="input" placeholder="5551234567" required><br><br>

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
                    echo "<p style='color: green; font-size: larger;'><b>Registration Successful</b></p>";
                } elseif ($_GET['adminUserSign'] == "failed") {
                    echo "<p style='color: red; font-size: larger;'><b>Registration Failed</b></p>";
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
                <input type="tel" name="adminGSM" id="adminGSM" class="input" placeholder="5551234567" required><br><br>

                <label for="adminGSM_2">Admin Phone Number 2</label>
                <input type="tel" name="adminGSM_2" id="adminGSM_2" class="input" placeholder="5551234567" required><br><br>

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
                    echo "<p style='color: green; font-size: larger;'><b>Registration Successful</b></p>";
                } elseif ($_GET['adminNewAdmin'] == "failed") {
                    echo "<p style='color: red; font-size: larger;'><b>Registration Failed</b></p>";
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