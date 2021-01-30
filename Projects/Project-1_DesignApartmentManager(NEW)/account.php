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
  <link href="bootstrap/css/bootstrap.css" rel="stylesheet">
  <link href="bootstrap/js/bootstrap.js" rel="stylesheet">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js" integrity="sha384-q2kxQ16AaE6UbzuKqyBE9/u/KzioAlnx2maXQHiDX9d4/zp8Ok3f+M7DPm+Ib6IU" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.min.js" integrity="sha384-pQQkAEnwaBkjpqZ8RU1fF1AKtTcHJwFl3pblpTlHXybJjHpMYo79HY3hIi4NKxyj" crossorigin="anonymous"></script>



</head>

<body>

  <header class="header">
    <div class="welcome">
      <p id="welcome"> Account</p>
    </div>
  </header>


  <nav class="navbar navbar-expand-lg navbar-dark bg-dark ">
    <div class="container-fluid">
      <a class="navbar-brand" href="#">MANAGEMENT SYSTEM</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse " id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link" aria-current="page" href="main.php">MAIN</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="information.php">INFORMATION</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="to-do.php">PAYMENT</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="complaint.php">COMPLAINT</a>
          </li>
          <li class="nav-item">
            <a class="nav-link active" href="account.php">ACCOUNT</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" onclick="logoutFun()">LOG-OUT</a>
          </li>
          <script>
            function logoutFun() {
              var bol = confirm("ARE YOU SURE TO LOG-OUT?");
              if (bol) {
                location = "logout.php";
              }
            }
          </script>
        </ul>
      </div>
    </div>
  </nav>


  <main class="main-content">

    <div class="card main-item" style="width: 20rem;">
      <div class="card-header">
        <b><i>PERSONAL INFORMATION</i></b>
      </div>
      <ul class="list-group list-group-flush">
        <li class="list-group-item"><p>User name: <?php echo $_SESSION['userUsername'] ?></p></li>
        <li class="list-group-item"><p>First: <?php echo $_SESSION['userName'] ?></p></li>
        <li class="list-group-item"><p>Last: <?php echo $_SESSION['userSurname'] ?></p></li>
        <li class="list-group-item"><p>GSM: <?php echo $_SESSION['userGSM'] ?></p></li>
        <li class="list-group-item"><p>E-Mail: <?php echo $_SESSION['userEmail'] ?></p></li>
        <li class="list-group-item"><p>#Flat: <?php echo $_SESSION['userFlatno'] ?></p></li>
      </ul>
    </div>


    <div class="main-item">
      <form class="was-validated" action="account.php" method="POST">
        <div class="label">
          <div class="input-group mb-3">
            <span class="input-group-text" id="basic-addon1">User Name</span>
            <input type="text" name="userUsername" id="username" class="form-control" required value="<?php echo $_SESSION['userUsername'] ?>">
          </div>
          <div class="input-group mb-3">
            <span class="input-group-text" id="basic-addon1">Name</span>
            <input type="text" name="userName" id="name" class="form-control" required value="<?php echo $_SESSION['userName'] ?>">
          </div>
          <div class="input-group mb-3">
            <span class="input-group-text" id="basic-addon1">Surname</span>
            <input type="text" name="userSurname" id="surname" class="form-control" required value="<?php echo $_SESSION['userSurname'] ?>">
          </div>
          <div class="input-group mb-3">
            <span class="input-group-text" id="basic-addon1">+90</span>
            <input type="tel" name="userGSM" id="phone" class="form-control" required value="<?php echo $_SESSION['userGSM'] ?>">
          </div>
          <div class="input-group mb-3">
            <span class="input-group-text" id="basic-addon1">E-mail</span>
            <input type="email" name="userEmail" id="mail" class="form-control" required value="<?php echo $_SESSION['userEmail'] ?>">
          </div>
          <div class="input-group mb-3">
            <span class="input-group-text" id="basic-addon1">Old Password</span>
            <input type="password" name="userPassword" id="passwordOld" class="form-control" required>
          </div>
          <div class="input-group mb-3">
            <span class="input-group-text" id="basic-addon1">New Password</span>
            <input type="password" name="userPasswordNEW" id="passwordNew" class="form-control" required>
          </div>
          <div class="input-group mb-3">
            <span class="input-group-text" id="basic-addon1">Flat</span>
            <input type="int" name="userFlatno" id="userFlatno" class="form-control" required value="<?php echo $_SESSION['userFlatno'] ?>">
          </div>
        </div>


        <label for="submit"></label>
        <input type="submit" name="submit" id="submit" class="btn btn btn-primary me-md-2 btn-lg" required>
        <label for="reset"></label>
        <input type="reset" name="reset" id="reset" class="btn btn btn-danger me-md-2 btn-lg" required>
      </form>
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
          echo "<br><div class='alert alert-warning' role='alert'>Old Password is WRONG</div>";
        }
      }
      ?>
      <?php
      if (isset($_GET['update'])) {
        if ($_GET['update'] == "ok") {
          echo "<br><div class='alert alert-success' role='alert'>Update is Successful</div>";
        } elseif ($_GET['update'] == "no") {
          echo "<br><div class='alert alert-warning' role='alert'>Update is Failed</div>";
        }
      }
      ?>
    </div>
  </main>


  <footer class="mt-auto text-white-50">
    <div class="links">
      <ul>
        <li><a href="https://www.linkedin.com/in/alperen-ka%C3%A7maz-2202/" title="LinkedIn" target="_blanced" class="link-info"><svg xmlns="http://www.w3.org/2000/svg" width="50" height="50" fill="currentColor" class="bi bi-linkedin" viewBox="0 0 16 16">
              <path d="M0 1.146C0 .513.526 0 1.175 0h13.65C15.474 0 16 .513 16 1.146v13.708c0 .633-.526 1.146-1.175 1.146H1.175C.526 16 0 15.487 0 14.854V1.146zm4.943 12.248V6.169H2.542v7.225h2.401zm-1.2-8.212c.837 0 1.358-.554 1.358-1.248-.015-.709-.52-1.248-1.342-1.248-.822 0-1.359.54-1.359 1.248 0 .694.521 1.248 1.327 1.248h.016zm4.908 8.212V9.359c0-.216.016-.432.08-.586.173-.431.568-.878 1.232-.878.869 0 1.216.662 1.216 1.634v3.865h2.401V9.25c0-2.22-1.184-3.252-2.764-3.252-1.274 0-1.845.7-2.165 1.193v.025h-.016a5.54 5.54 0 0 1 .016-.025V6.169h-2.4c.03.678 0 7.225 0 7.225h2.4z" />
            </svg></a></li>
        <li><a href="https://github.com/MrKacmaz" title="GitHub" target="_blanced" class="link-info"><svg xmlns="http://www.w3.org/2000/svg" width="50" height="50" fill="currentColor" class="bi bi-github" viewBox="0 0 16 16">
              <path d="M8 0C3.58 0 0 3.58 0 8c0 3.54 2.29 6.53 5.47 7.59.4.07.55-.17.55-.38 0-.19-.01-.82-.01-1.49-2.01.37-2.53-.49-2.69-.94-.09-.23-.48-.94-.82-1.13-.28-.15-.68-.52-.01-.53.63-.01 1.08.58 1.23.82.72 1.21 1.87.87 2.33.66.07-.52.28-.87.51-1.07-1.78-.2-3.64-.89-3.64-3.95 0-.87.31-1.59.82-2.15-.08-.2-.36-1.02.08-2.12 0 0 .67-.21 2.2.82.64-.18 1.32-.27 2-.27.68 0 1.36.09 2 .27 1.53-1.04 2.2-.82 2.2-.82.44 1.1.16 1.92.08 2.12.51.56.82 1.27.82 2.15 0 3.07-1.87 3.75-3.65 3.95.29.25.54.73.54 1.48 0 1.07-.01 1.93-.01 2.2 0 .21.15.46.55.38A8.012 8.012 0 0 0 16 8c0-4.42-3.58-8-8-8z" />
            </svg></a></li>
        <li><a href="https://www.instagram.com/mr.kacmaz/" title="LinkedIn" target="_blanced" class="link-info"><svg xmlns="http://www.w3.org/2000/svg" width="50" height="50" fill="currentColor" class="bi bi-instagram" viewBox="0 0 16 16">
              <path d="M8 0C5.829 0 5.556.01 4.703.048 3.85.088 3.269.222 2.76.42a3.917 3.917 0 0 0-1.417.923A3.927 3.927 0 0 0 .42 2.76C.222 3.268.087 3.85.048 4.7.01 5.555 0 5.827 0 8.001c0 2.172.01 2.444.048 3.297.04.852.174 1.433.372 1.942.205.526.478.972.923 1.417.444.445.89.719 1.416.923.51.198 1.09.333 1.942.372C5.555 15.99 5.827 16 8 16s2.444-.01 3.298-.048c.851-.04 1.434-.174 1.943-.372a3.916 3.916 0 0 0 1.416-.923c.445-.445.718-.891.923-1.417.197-.509.332-1.09.372-1.942C15.99 10.445 16 10.173 16 8s-.01-2.445-.048-3.299c-.04-.851-.175-1.433-.372-1.941a3.926 3.926 0 0 0-.923-1.417A3.911 3.911 0 0 0 13.24.42c-.51-.198-1.092-.333-1.943-.372C10.443.01 10.172 0 7.998 0h.003zm-.717 1.442h.718c2.136 0 2.389.007 3.232.046.78.035 1.204.166 1.486.275.373.145.64.319.92.599.28.28.453.546.598.92.11.281.24.705.275 1.485.039.843.047 1.096.047 3.231s-.008 2.389-.047 3.232c-.035.78-.166 1.203-.275 1.485a2.47 2.47 0 0 1-.599.919c-.28.28-.546.453-.92.598-.28.11-.704.24-1.485.276-.843.038-1.096.047-3.232.047s-2.39-.009-3.233-.047c-.78-.036-1.203-.166-1.485-.276a2.478 2.478 0 0 1-.92-.598 2.48 2.48 0 0 1-.6-.92c-.109-.281-.24-.705-.275-1.485-.038-.843-.046-1.096-.046-3.233 0-2.136.008-2.388.046-3.231.036-.78.166-1.204.276-1.486.145-.373.319-.64.599-.92.28-.28.546-.453.92-.598.282-.11.705-.24 1.485-.276.738-.034 1.024-.044 2.515-.045v.002zm4.988 1.328a.96.96 0 1 0 0 1.92.96.96 0 0 0 0-1.92zm-4.27 1.122a4.109 4.109 0 1 0 0 8.217 4.109 4.109 0 0 0 0-8.217zm0 1.441a2.667 2.667 0 1 1 0 5.334 2.667 2.667 0 0 1 0-5.334z" />
            </svg>
        </li>
      </ul>
    </div>
  </footer>


</body>

</html>