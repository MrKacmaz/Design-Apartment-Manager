<?php
include 'database/logDB.php';
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Complaint</title>
    <link rel="stylesheet" href="css/complaint.css">
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
            <li class="nav-ul-li"><a href="logout.php">LOG-OUT</a></li>
        </ul>
    </nav>


    <main class="main">
        <form action="index/complains.php" method="POST">
            <div class="cmp">
                <b>What is the subject of your complaint?</b>
                
                <select id="select" name="about" required>
                    <option  value="TENANT">TENANT</option>
                    <option  value="FLAT">FLAT</option>
                    <option  value="CORRIDOR">CORRIDOR</option>
                    <option  value="GARDEN">GARDEN</option>
                    <option  value="BILLS">BILLS</option>
                    <option  value="OTHER">OTHER</option>
                </select>

                <p id="p-2"><b>Please describe your complaint in 250 words</b></p>
                <textarea name="userComplain" id="textarea" cols="50" rows="10" required></textarea><br><br>
                
                <label for="userComplain-btn"></label>
                <input type="submit" name="userComplain-btn" id="sub" class="btn">
              
                <label for="reset"></label>
                <input type="reset" name="reset" id="reset" class="btn">
            </div>
        </form>
        <?php
        if(isset($_GET['complaint'])){
            if ($_GET['complaint'] == "success") {
                echo "şikayetiniz gönderildi";
            }elseif ($_GET['complaint'] == 'failed') {
                echo "şikayetiniz gönderilemedi";
            }
        }
        ?>
    </main>


    <footer class="footer">
        <div class="links">
            <ul>
                <li class="link"><a href="https://www.linkedin.com/in/alperen-ka%C3%A7maz-2202/" title="LinkedIn"
                        target="_blanced"><img
                            src="https://encrypted-tbn0.gstatic.com/images?q=tbn%3AANd9GcTMdFqfhP3dTNKjtRennSsHXGUmiF9yJ2AfVQ&usqp=CAU"
                            height="50" width="50" alt="LinkedIn"></a></li>
                <li class="link"><a href="https://www.instagram.com/mr.kacmaz" title="Instagram" target="_blanced"><img
                            src="https://pazarlamasyon.com/wp-content/uploads/2018/01/new-instagram-logo-clipart-16.jpg"
                            height="50" width="50" alt="Instagram"></a></li>
                <li class="link"><a href="https://github.com/MrKacmaz" title="GitHub" target="_blanced"> <img
                            src="https://encrypted-tbn0.gstatic.com/images?q=tbn%3AANd9GcSUP7RN0hZaqZpljtz9c0nz5eSc2DFY-XSRQA&usqp=CAU"
                            width="50" height="50" alt="GitHub"> </a></li>
            </ul>
        </div>

    </footer>
</body>

</html>