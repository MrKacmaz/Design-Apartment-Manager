<?php
include '../database/adminDB.php';
include '../database/logDB.php';
session_start();
ob_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
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
            background-image: linear-gradient(to left, rgb(237, 66, 100), rgb(255, 237, 189));
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
            padding: .75rem;
        }

        .nav-ul-li:hover {
            background-color: #777;
        }

        .nav-ul-li a {
            text-decoration: none;
            color: inherit;
        }

        .btn-class {
            margin-left: 65%;
            cursor: pointer;
        }

        .btn {
            padding: .5em;
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
            position: fixed;
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
            padding: .5rem;
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

    </header>


    <nav class="nav">
        <span>MANAGEMENT SYSTEM</span>
    </nav>


    <?php
    if (isset($_POST['userComplain-btn'])) {
        $kaydet = $db->prepare("INSERT INTO complains set
            userName=:userName,
            userSurname=:userSurname,
            userUsername=:userUsername,
            userFlatno=:userFlatno,
            about=:about,
            userComplain=:userComplain
            ");

        $insert = $kaydet->execute(array(
            'userName' => $_SESSION['userName'],
            'userSurname' => $_SESSION['userSurname'],
            'userUsername' => $_SESSION['userUsername'],
            'userFlatno' => $_SESSION['userFlatno'],
            'about' => $_POST['about'],
            'userComplain' => $_POST['userComplain']
        ));

        if ($insert) {
            //echo "kayıt başarılı";
            Header("Location:../complaint.php?complaint=success");
            exit;
        } else {
            //echo "kayıt başarısız";
            Header("Location:../complaint.php?complaint=failed");
            exit;
        }

        if (isset($_GET['userOKupdate'])) {
            if ($_GET['userOKupdate'] = "ok") {
                echo "asdadsa";
            }
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