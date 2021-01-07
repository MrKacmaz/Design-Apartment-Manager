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

    <main class="main-content">
        <div class="main-item">
            <h2>Update Arrangements</h2>
        </div>
    </main>

    <?php
    if (isset($_GET['arrangement'])) {
        $arrangement = $_GET['arrangement'];
        if ($arrangement  == 0) {

            $bilgilerimsor = $db->prepare("SELECT * from gardenarrangements where toDoID=:toDoID");
            $bilgilerimsor->execute(array(
                'toDoID' => $_GET['toDoID']
            ));
            $bilgilerimcek = $bilgilerimsor->fetch(PDO::FETCH_ASSOC);
        } elseif ($arrangement == 1) {
            echo "arrangement == 1 ERROR !!!!!";
        }
    }

    ?>
    <div>
        <form action="updateArrangements.php" method="POST">
            ToDo ID:<input type="int" value="<?php echo $bilgilerimcek['toDoID'] ?>" name="toDoID"><br><br>
            Old To/Do: <input type="text" name="" id="" value="<?php echo $bilgilerimcek['toDo'] ?>"><br><br>
            Is OK:<input type="text" required="" name="isOK" value="<?php echo $bilgilerimcek['isOK'] ?>"><br><br>
            Arragment Time:<input type="text" required="" name="ArragmentTime" value="<?php echo $bilgilerimcek['ArragmentTime'] ?>"><br><br>
            New Arrangements:<textarea required="" name="newToDo" id="" cols="30" rows="10"><?php echo $bilgilerimcek['toDo'] ?></textarea><br><br>
            <button type="submit" name="updateArragment">Formu Düzenle</button>
        </form>
    </div>

    <?php

    if (isset($_POST['updateArragment'])) {
        $toDoID = $_POST['toDoID'];
        $toDo = $_POST['newToDo'];
        $isOK = $_POST['isOK'];

        $update = $db->prepare("UPDATE gardenarrangements set
		toDo=:toDo,
		isOK=:isOK
		where toDoID={$_POST['toDoID']}
        ");

        $insert = $update->execute(array(

            'toDo' => $_POST['newToDo'],
            'isOK' => $_POST['isOK']
        ));
		if ($insert) {
			//echo "kayıt başarılı";
			Header("Location:../admin/adminTODO.php?UPDATE=ok&toDoID=$toDoID");
			exit;
		} else {
			//echo "kayıt başarısız";
			Header("Location:../admin/adminTODO.php?UPDATE=no&toDoID=$toDoID");
			exit;
		}
    }
    ?>

</body>

</html>