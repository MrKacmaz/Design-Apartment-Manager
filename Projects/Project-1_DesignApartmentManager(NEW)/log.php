<?php
include 'database/logDB.php';
include 'database/adminDB.php';
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Log-In</title>
    <link rel="stylesheet" href="css/log-in.css">
</head>

<body>
    <div class="hero">
        <div class="form-box">
            <div class="button-box">
                <div id="btn"></div>
                <button type="button" class="toggle-b" onclick="login()">Log-in</button>
                <button type="button" class="toggle-b" onclick="register()">Register</button>
                <button type="button" class="toggle-b" onclick="admin()">Admin</button>
            </div>


            <!--USER LOG-IN-->
            <form id="log-in" action="index/new_user_sign.php" method="POST" class="input-group">

                <input type="text" class="input-field" name="userUsername"
                <?php if(isset($_COOKIE['userUsername'])){?>
                    value="<?php echo $_COOKIE['userUsername']?>"
                <?php } else{?>
                    placeholder="User Name"
                <?php }
                ?> required>
                
                <input type="password" class="input-field" name="userPassword" placeholder="Password" required>
                <input type="checkbox" name="rememberMe" class="chechk-box"><span>Remember Me</span>
                <button type="submit" class="submit-b" name="login-btn">Log-in</button><br><br>

                <?php
                if (isset($_GET['fail'])) {
                    if ($_GET['fail'] == "username") {
                        echo "<b>user name yanlış Başarısız Giriş</b>";
                    } elseif ($_GET['fail'] == "password") {
                        echo "<b>user password yanlış Başarısız Giriş</b>";
                    } elseif ($_GET['fail'] == "fail") {
                        echo "<b>DİREK yanlış Başarısız Giriş</b>";
                    }
                }
                if (isset($_GET['sign'])) {
                    if ($_GET['sign'] == "success") {
                        echo "<b style='color: green;'>your account created Seccessfull</b>";
                    } elseif ($_GET['sign'] == "failed") {
                        echo "<b style='color: red;'>your account created Failed</b>";
                    }
                }
                ?>
            </form>

            <!--NEW USER SIGN-IN-->
            <form id="register" action="index/new_user_sign.php" method="POST" class="input-group">
                <input type="text" class="input-field" name="userName" placeholder="Name" required>
                <input type="text" class="input-field" name="userSurname" placeholder="Surname" required>
                <input type="text" class="input-field" name="userUsername" placeholder="Username" required>
                <input type="number" class="input-field" name="userFlatno" placeholder="Flat No (1-8)" max=12 min=1 required>
                <input type="text" class="input-field" name="userGSM" placeholder="P.Number (5555555555)">
                <input type="email" class="input-field" name="userEmail" placeholder="Email (asd@asd.com)" required>
                <input type="password" class="input-field" name="userPassword" placeholder="Password" required>
                <input type="checkbox" class="chechk-box">
                <p id="terms">I agree to the terms</p>
                <button type="submit" class="submit-b" name="register-btn">Register</button>
            </form>



            <!--ADMIN LOG-IN-->
            <form id="admin" method="POST" action="index/new_user_sign.php" class="input-group">

                <input name="adminUSERNAME" type="text" class="input-field" placeholder="Admin ID" required>
                <input name="adminPASSWORD" type="password" class="input-field" placeholder="Password" required>
                <br><br><button type="submit" class="submit-b" name="admin-btn">Log-in</button><br><br>
                <?php
                if (isset($_GET['fail'])) {
                    if ($_GET['fail'] == "ADMINpassword") {
                        echo "<b style='color: red;'>your sign Failed(password)</b>";
                    } elseif ($_GET['fail'] == "ADMINusername") {
                        echo "<b style='color: red;'>your sign Failed(user name)</b>";
                    } elseif ($_GET['fail'] == "ADMINfail") {
                        echo "<b style='color: red;'>your sign Failed(DATABASE ERROR !!)</b>";
                    }
                }
                ?>
            </form>
        </div>


    </div>

    <script>
        var x = document.getElementById("log-in");
        var y = document.getElementById("register");
        var a = document.getElementById("admin");
        var z = document.getElementById("btn");

        function login() {
            x.style.left = "50px";
            y.style.left = "450px";
            a.style.left = "850px";
            z.style.left = "0px";
        }

        function register() {
            x.style.left = "-480px";
            y.style.left = "50px";
            a.style.left = "450px"
            z.style.left = "110px";
        }

        function admin() {
            x.style.left = "-1210px";
            y.style.left = "-350px";
            a.style.left = "50px";
            z.style.left = "220px";
        }
    </script>

</body>

</html>