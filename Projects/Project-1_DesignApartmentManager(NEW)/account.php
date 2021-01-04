<?php
include 'database/logDB.php';
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Account</title>
    <link rel="stylesheet" href="css/account.css">
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
            <h2>Your Information is ;</h2><br>
            <p class="input-3">User name: <?php echo $_SESSION['userUsername'] ?></p><br>
            <p class="input-3">Name: <?php echo $_SESSION['userName'] ?></p><br>
            <p class="input-3">Surname: <?php echo $_SESSION['userSurname'] ?></p><br>
            <p class="input-3">Phone: <?php echo $_SESSION['userGSM'] ?></p><br>
            <p class="input-3">Email: <?php echo $_SESSION['userEmail'] ?></p><br>
            <p class="input-3">Flat: <?php echo $_SESSION['userFlatno'] ?></p><br>
        </div>

        <div class="main-item">
            <div class="label">
                <form action="account.php" method="POST">
                    <label for="username">User name</label>
                    <input type="text" name="userUsername" id="username" class="input" placeholder="<?php echo $_SESSION['userUsername'] ?>" required><br><br>
                    <label for="name">Name</label>
                    <input type="text" name="userName" id="name" class="input" required placeholder="<?php echo $_SESSION['userName'] ?>"><br><br>
                    <label for="surname">Surname</label>
                    <input type="text" name="userSurname" id="surname" class="input" required placeholder="<?php echo $_SESSION['userSurname'] ?>"><br><br>
                    <label for="phone">Phone Number</label>
                    <input type="tel" name="userGSM" id="phone" class="input" placeholder="<?php echo $_SESSION['userGSM'] ?>" required><br><br>
                    <label for="mail">E-mail</label>
                    <input type="email" name="userEmail" id="mail" class="input" placeholder="<?php echo $_SESSION['userEmail'] ?>" required><br><br>
                    <label for="password">Old Password</label>
                    <input type="password" name="userPassword" id="passwordOld" class="input" required><br><br>
                    <label for="password">New Password</label>
                    <input type="password" name="userPasswordNEW" id="passwordNew" class="input" required><br><br>
                    <label for="userFlatno">Flat</label>
                    <input type="int" name="userFlatno" id="userFlatno" class="input" placeholder="<?php echo $_SESSION['userFlatno'] ?>" required><br><br>

                    <label for="submit"></label>
                    <input type="submit" name="submit" id="submit" class="btn" required>
                    <label for="reset"></label>
                    <input type="reset" name="reset" id="reset" class="btn" required>
                </form>
            </div>
            <?php

            if (isset($_GET['update'])) {
                if ($_GET['update'] == "ok") {
                    echo "güncelleme başırılı";
                } elseif ($_GET['update'] == "no") {
                    echo "güncelleme başarısız";
                }
            }
            ?>
        </div>


        <?php
        if (isset($_POST['submit'])) {

            $bilgilerim_id = $_SESSION['userID'];

            $kaydet = $db->prepare("UPDATE usersinfo set
		    userUsername=:userUsername,
		    userName=:userName,
		    userSurname=:userSurname,
		    userEmail=:userEmail,
		    userUsername=:userUsername,
		    userFlatno=:userFlatno,
		    userPassword=:userPassword,
		    userGSM=:userGSM

		    where userID={$_SESSION['userID']}
		    ");

            $insert = $kaydet->execute(array(

                'userName' => $_POST['userName'],
                'userSurname' => $_POST['userSurname'],
                'userEmail' => $_POST['userEmail'],
                'userUsername' => $_POST['userUsername'],
                'userFlatno' => $_POST['userFlatno'],
                'userPassword' => $_POST['userPasswordNEW'],
                'userGSM' => $_POST['userGSM']
            ));



            if ($insert) {
                //echo "kayıt başarılı";
                Header("Location:account.php?update=ok&bilgilerim_id=$bilgilerim_id");
                exit;
            } else {
                //echo "kayıt başarısız";
                Header("Location:account.php?update=no&bilgilerim_id=$bilgilerim_id");
                exit;
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