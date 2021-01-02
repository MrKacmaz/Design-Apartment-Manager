<?php
include '../database/adminDB.php';
include '../database/logDB.php';
session_start();



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
}

if (isset($_GET['userOKupdate'])) {
    if ($_GET['userOKupdate'] = "ok") {
        echo"asdadsa";




    }
}
