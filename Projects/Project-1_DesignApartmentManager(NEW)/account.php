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
  <title>Account</title>
  <link rel="stylesheet" href="css/account.css">
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
      align-items: center;
      justify-content: center;
    }

    .main-item {
      margin: 5rem 20rem;
      padding: 0.25em;
      line-height: 1em;
      text-align: center;
      flex: 1;
      flex-grow: 1;
      flex-basis: 0;
      text-align: left;
    }

    .label {
      text-align: right;
    }

    .main-item-2 {
      text-align: right;
    }

    .main-item h2 {
      color: #da4167;
    }

    .main-item p {
      margin-top: 0.5rem;
    }

    .main-item-2 {
      margin: -12em 70% 0 70%;
      line-height: 1.5em;
    }

    .input {
      align-items: flex-end;
      justify-content: end;
      padding: 0.5em 1.5em;
    }

    .input-3 {
      line-height: 2em;
      border: #999 solid;
      border-top: none;
      border-left: none;
      border-right: none;
      margin: 0 10em 0 0;
    }

    .btn {
      padding: 0.5em;
      cursor: pointer;
      font-size: 0.9em;
      border-radius: 0.75em;
    }

    .btn:hover {
      background-color: #999;
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
  </style>
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
      <p class="input-3">Name: <br> <?php echo $_SESSION['userName'] ?></p><br>
      <p class="input-3">Surname: <?php echo $_SESSION['userSurname'] ?></p><br>
      <p class="input-3">Phone: <?php echo $_SESSION['userGSM'] ?></p><br>
      <p class="input-3">Email: <?php echo $_SESSION['userEmail'] ?></p><br>
      <p class="input-3">Flat: <?php echo $_SESSION['userFlatno'] ?></p><br>
    </div>

    <div class="main-item">
      <div class="label">
        <form action="account.php" method="POST">

          <label for="username">User Name</label>
          <input type="text" name="userUsername" id="username" class="input" required placeholder="<?php echo $_SESSION['userUsername'] ?>"><br><br>

          <label for="name">Name</label>
          <input type="text" name="userName" id="name" class="input" required placeholder="<?php echo $_SESSION['userName'] ?>"><br><br>

          <label for="surname">Surname</label>
          <input type="text" name="userSurname" id="surname" class="input" required placeholder="<?php echo $_SESSION['userSurname'] ?>"><br><br>
          <label for="phone">Phone Number</label>
          <input type="tel" name="userGSM" id="phone" class="input" required placeholder="<?php echo $_SESSION['userGSM'] ?>"><br><br>
          <label for="mail">E-mail</label>
          <input type="email" name="userEmail" id="mail" class="input" required placeholder="<?php echo $_SESSION['userEmail'] ?>"><br><br>
          <label for="password">Old Password</label>
          <input type="password" name="userPassword" id="passwordOld" class="input" required><br><br>
          <label for="password">New Password</label>
          <input type="password" name="userPasswordNEW" id="passwordNew" class="input" required><br><br>
          <label for="userFlatno">Flat</label>
          <input type="int" name="userFlatno" id="userFlatno" class="input" required placeholder="<?php echo $_SESSION['userFlatno'] ?>"><br><br>

          <label for="submit"></label>
          <input type="submit" name="submit" id="submit" class="btn" required>
          <label for="reset"></label>
          <input type="reset" name="reset" id="reset" class="btn" required>
        </form>
      </div>

    </div>

    <?php
    if (isset($_POST['submit'])) {

      $bilgilerim_id = $_SESSION['userID'];
      if ($_POST['userPassword'] == $_SESSION['userPassword']) {

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
          'userPassword' => md5($_POST['userPasswordNEW']),
          'userGSM' => $_POST['userGSM']

        ));
        if ($insert) {
          //echo "kayıt başarılı";
          Header("location:account.php?update=ok&bilgilerim_id=$bilgilerim_id");
          exit;
        } else {
          //echo "kayıt başarısız";
          Header("Location:account.php?update=no&bilgilerim_id=$bilgilerim_id");
          exit;
        }
      } else {
        echo "<p style='color: red; font-size: larger;'><b>Old Password is WRONG</b></p>";
      }
    }
    ?>
    <?php

    if (isset($_GET['update'])) {
      if ($_GET['update'] == "ok") {
        echo "<p style='color: green; font-size: larger;'><b>Update is Successful</b></p>";
      } elseif ($_GET['update'] == "no") {
        echo "<p style='color: red; font-size: larger;'><b>Update is Failed</b></p>";
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