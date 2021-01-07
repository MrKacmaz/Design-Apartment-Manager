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
    <title>Main</title>
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
        <div class="welcome">
            <p id="welcome"> ADMIN <?php echo $_SESSION['adminNAME'] . " " . $_SESSION['adminSURNAME'] ?></p>
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
        <?php
        $checkUserInDB = $db->prepare("SELECT * FROM maintopics");
        $checkUserInDB->execute();
        while ($pullinfo = $checkUserInDB->fetch(PDO::FETCH_ASSOC)) {
        ?>
            <div class="main-item">

                <h2><?php echo $pullinfo['mainTopicsTitle'] ?></h2>
                <p> <?php echo $pullinfo['mainTopicsContent'] ?> </p>
                <a href="../index/mainTopics.php?mainTopicsID=<?php echo $pullinfo['mainTopicsID'] ?>"><button class="btn" type="button">UPDATE</button></a>
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