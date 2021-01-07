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
    <title>Document</title>
    <link rel="stylesheet" href="../css/admin/updatepanel.css">

</head>

<body>
    <header class="header">
        <div class="welcome">
            <p id="welcome"> ADMIN <?php echo $_SESSION['adminNAME'] . " " . $_SESSION['adminSURNAME'] ?></p>
        </div>
    </header>

    <nav class="nav">
        <span>MANAGEMENT SYSTEM</span>
    </nav>


    <?php
    if (isset($_GET['mainTopicsID'])) {
        $mainTopicsID = $_GET['mainTopicsID'];
        $bilgilerimsor = $db->prepare("SELECT * from maintopics where mainTopicsID=:mainTopicsID");
        $bilgilerimsor->execute(array(
            'mainTopicsID' => $_GET['mainTopicsID']
        ));
        $bilgilerimcek = $bilgilerimsor->fetch(PDO::FETCH_ASSOC);
    }
    ?>
    <form action="mainTopics.php" method="POST">
        mainTopicsID:<input type="int" value="<?php echo $bilgilerimcek['mainTopicsID'] ?>" name="mainTopicsID"><br><br>
        mainTopics Time:<input disabled type="text" required="" name="mainTopicsTime" id="mainTopicsTime" value="<?php echo $bilgilerimcek['mainTopicsTime'] ?>"><br><br>
        Old mainTopicsTitle: <input disabled type="text" required="" name="mainTopicsTitle" id="mainTopicsTitle" value="<?php echo $bilgilerimcek['mainTopicsTitle'] ?>"><br><br>
        Old mainTopicsContent: <input disabled type="text" required="" name="mainTopicsContent" id="mainTopicsContent" value="<?php echo $bilgilerimcek['mainTopicsContent'] ?>"><br><br>
        New mainTopicsTitle: <textarea name="NewMainTopicsTitle" id="NewMainTopicsTitle" cols="60" rows="7"><?php echo $bilgilerimcek['mainTopicsTitle'] ?></textarea><br><br>
        New mainTopicsContent: <textarea name="NewMainTopicsContent" id="NewMainTopicsContent" cols="60" rows="7"><?php echo $bilgilerimcek['mainTopicsContent'] ?></textarea><br><br>
        isOK: <input type="int" required="" name="isOK" id="isOK" value="<?php echo $bilgilerimcek['isOK'] ?>"><br><br>
        <button type="submit" name="updateMainTopics" onclick="alertFun()">Formu Düzenle</button>
    </form>

    <?php
    if (isset($_POST['updateMainTopics'])) {
        $mainTopicsID = $_POST['mainTopicsID'];
        $mainTopicsTitle = $_POST['NewMainTopicsTitle'];
        $mainTopicsContent = $_POST['NewMainTopicsContent'];
        $isOK = $_POST['isOK'];

        $update = $db->prepare("UPDATE maintopics set
            mainTopicsTitle=:mainTopicsTitle,
            mainTopicsContent=:mainTopicsContent,
            isOK=:isOK
            where mainTopicsID={$_POST['mainTopicsID']}
            ");

        $insert = $update->execute(array(
            'mainTopicsTitle' => $_POST['NewMainTopicsTitle'],
            'mainTopicsContent' => $_POST['NewMainTopicsContent'],
            'isOK' => $_POST['isOK']
        ));
        if ($insert) {
            //echo "kayıt başarılı";
            Header("Location:../admin/adminPanel.php?mainTopicsUpdated=ok&mainTopicsID=$mainTopicsID");
            exit;
        } else {
            //echo "kayıt başarısız";
            Header("Location:../admin/adminPanel.php?mainTopicsUpdated=no&mainTopicsID=$mainTopicsID");
            exit;
        }
    }
    ?>
    <script>
        function alertFun() {
            alert('UPDATED SUCCESSFULLY');
        }
    </script>
















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