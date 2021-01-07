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
    <title>Complaint</title>
    <link rel="stylesheet" href="css/complaint.css">
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

        .main {
            display: flex;
        }

        .cmp {
            display: flex;
            margin: 2rem;
            align-items: center;
            align-content: center;
            flex-direction: row;
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

        .btn,
        #sendPic {
            padding: 0.5em;
            cursor: pointer;
            font-size: 1em;
            border-radius: 0.75em;
        }

        .btn:hover {
            background-color: #999;
        }

        .ff {
            background-color: red;
            margin: 0%;
        }

        table,
        th,
        tr,
        td {
            margin: auto 0em auto 10em;
            border: .25em solid #333;
            border-collapse: collapse;
            justify-content: center;
            align-items: center;
        }


        .links {
            position: static;
            margin-top: 73px;
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


    <!--MENU BAR-->
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


    <main class="main">
        <div class="cmp">
            <form action="index/complains.php" method="POST">

                <b>What is the subject of your complaint?</b>

                <select id="select" name="about" required>
                    <option value="TENANT">TENANT</option>
                    <option value="FLAT">FLAT</option>
                    <option value="CORRIDOR">CORRIDOR</option>
                    <option value="GARDEN">GARDEN</option>
                    <option value="BILLS">BILLS</option>
                    <option selected value="OTHER">OTHER</option>
                </select>

                <p id="p-2"><b>Please describe your complaint in 250 words</b></p>
                <textarea name="userComplain" id="textarea" cols="50" rows="10" required></textarea><br><br>

                <label for="userComplain-btn"></label>
                <input type="submit" name="userComplain-btn" id="sub" class="btn">

                <label for="reset"></label>
                <input type="reset" name="reset" id="reset" class="btn">

            </form>
            <?php
            if (isset($_GET['complaint'])) {
                if ($_GET['complaint'] == "success") {
                    echo "<p style='color: green; font-size: larger;'><b>Your complaint has been sent</b></p>";
                } elseif ($_GET['complaint'] == 'failed') {
                    echo "<p style='color: red; font-size: larger;'><b>Your complaint could not be sent</b></p>";
                }
            }
            ?>
        </div>


        <div class="cmp">
            <table style="width: 60%" border="1">
                <tr>
                    <th>Row NO</th>
                    <th>Complain ID</th>
                    <th>Name</th>
                    <th>Surname</th>
                    <th>User Name</th>
                    <th>Flat No</th>
                    <th>About</th>
                    <th>Complain</th>
                </tr>

                <?php
                $checkUserInDB = $db->prepare("SELECT * FROM complains");
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
                            <?php echo $pullinfo['complainID']; ?>
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
                            <?php echo $pullinfo['about']; ?>
                        </td>
                        <td>
                            <?php echo $pullinfo['userComplain']; ?>
                        </td>
                    </tr>

                <?php } ?>
            </table>
        </div>
    </main>




    <footer class="footer">
        <div class="ff">

            <div class="links">
                <ul>
                    <li class="link"><a href="https://www.linkedin.com/in/alperen-ka%C3%A7maz-2202/" title="LinkedIn" target="_blanced"><img src="https://encrypted-tbn0.gstatic.com/images?q=tbn%3AANd9GcTMdFqfhP3dTNKjtRennSsHXGUmiF9yJ2AfVQ&usqp=CAU" height="50" width="50" alt="LinkedIn"></a></li>
                    <li class="link"><a href="https://www.instagram.com/mr.kacmaz" title="Instagram" target="_blanced"><img src="https://pazarlamasyon.com/wp-content/uploads/2018/01/new-instagram-logo-clipart-16.jpg" height="50" width="50" alt="Instagram"></a></li>
                    <li class="link"><a href="https://github.com/MrKacmaz" title="GitHub" target="_blanced"> <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn%3AANd9GcSUP7RN0hZaqZpljtz9c0nz5eSc2DFY-XSRQA&usqp=CAU" width="50" height="50" alt="GitHub"> </a></li>
                </ul>
            </div>
        </div>
    </footer>
</body>

</html>