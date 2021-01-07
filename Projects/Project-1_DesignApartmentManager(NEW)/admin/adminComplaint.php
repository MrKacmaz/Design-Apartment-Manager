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
    <title>Complaint</title>
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
            background-image: linear-gradient(to left, #ed4264, #ffedbc);
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

        .cmp {
            margin: 2rem;
        }

        #select {
            margin: 1em 2em;
        }

        #p-2 {
            margin: 2em 0;
        }

        #sub,
        #reset {
            margin: 1em 2em;
        }

        #textarea {
            margin: 1em 0;
            resize: none;
            font-size: 20px;
            border-radius: 0.5em;
        }

        table,
        th,
        td {
            border: 3px solid black;
            border-collapse: collapse;
            padding: 1rem;
            margin: 5rem auto;
            text-align: center;
            align-content: center;
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
    <!--welcome header bar-->
    <header class="header">
        <div class="welcome">
            <p id="welcome">complaint page</p>
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


    <main class="main">
        <table style="width: 60%" border="1">
            <tr>
                <th>S.NO</th>
                <th>Complain ID</th>
                <th>Name</th>
                <th>Surname</th>
                <th>User Name</th>
                <th>Flat No</th>
                <th>About</th>
                <th>Complain</th>
                <th>Delete</th>
            </tr>
            <?php
            $checkUserInDB = $db->prepare("SELECT * FROM complains");
            $checkUserInDB->execute();
            $say = 0;
            while ($pullinfo = $checkUserInDB->fetch(PDO::FETCH_ASSOC)) {
                $say++
            ?>
                <tr>
                    <td><?php echo $say; ?></td>
                    <td><?php echo $pullinfo['complainID']; ?></td>
                    <td><?php echo $pullinfo['userName']; ?></td>
                    <td><?php echo $pullinfo['userSurname']; ?></td>
                    <td><?php echo $pullinfo['userUsername']; ?></td>
                    <td><?php echo $pullinfo['userFlatno']; ?></td>
                    <td><?php echo $pullinfo['about']; ?></td>
                    <td><?php echo $pullinfo['userComplain']; ?></td>
                    <td align="center"><button class="btn" onclick="deleteFun()">Delete</button></td>
                </tr>
                <script>
                    function deleteFun() {
                        var bol = confirm("ARE YOU SURE TO DELETE ?");
                        if (bol) {
                            location = "../index/delete.php?complainID=<?php echo $pullinfo['complainID'] ?>&userComplaintdelete=delete";
                        }
                    }
                </script>
            <?php } ?>
        </table>
        <?php
        if (isset($_GET['delete'])) {
            if ($_GET['delete'] == "ok") {
                echo "Successfully deleted";
            } elseif ($_GET['delete'] == "no") {
                echo "Failed deleted";
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