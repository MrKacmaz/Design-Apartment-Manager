<?php
require_once '../database/logDB.php';
require_once '../database/adminDB.php';
session_start();



// user log-in slider 
if (isset($_POST['login-btn'])) {
    $userUsername = $_POST['userUsername'];
    $userPassword = $_POST['userPassword'];
    $checkUserInDB = $db->prepare("SELECT * FROM usersinfo WHERE
    userUsername=:userUsername AND userPassword=:userPassword");
    $checkUserInDB->execute(array(
        'userUsername' => $userUsername,
        'userPassword' => $userPassword
    ));
    $int = $checkUserInDB->rowCount();

    if ($int == 1) {
        $pullinfo = $checkUserInDB->fetch(PDO::FETCH_ASSOC);
        $_SESSION['userID'] = $pullinfo['userID'];
        $_SESSION['userUsername'] = $userUsername;
        $_SESSION['userName'] = $pullinfo['userName'];
        $_SESSION['userSurname'] = $pullinfo['userSurname'];
        $_SESSION['userFlatno'] = $pullinfo['userFlatno'];
        $_SESSION['userGSM'] = $pullinfo['userGSM'];
        $_SESSION['userEmail'] = $pullinfo['userEmail'];
        header("Location:../main.php");
        exit;
    } elseif ($int == 0) {
        $pullinfo2 = $checkUserInDB->fetch(PDO::FETCH_ASSOC);
        $username = $pullinfo2['userUsername'];
        $password = $pullinfo2['userPassword'];
        if ($password != $userPassword) {
            header("Location:../log.php?fail=password");
            exit;
        } elseif ($username != $userUsername) {
            header("Location:../log.php?fail=username");
            exit;
        } else {
            header("Location:../log.php?fail=fail");
            exit;
        }
    }
}



// new user sign-in slide
if (isset($_POST['register-btn'])) {

    $kaydet = $db->prepare("INSERT into usersinfo set
		userName=:userName,
		userSurname=:userSurname,
		userUsername=:userUsername,
		userFlatno=:userFlatno,
        userGSM =:userGSM,
        userEmail =:userEmail,
        userPassword =:userPassword
        ");

    $insert = $kaydet->execute(array(
        'userName' => $_POST['userName'],
        'userSurname' => $_POST['userSurname'],
        'userUsername' => $_POST['userUsername'],
        'userFlatno' => $_POST['userFlatno'],
        'userGSM' => $_POST['userGSM'],
        'userEmail' => $_POST['userEmail'],
        'userPassword' => $_POST['userPassword']
    ));
    if ($insert) {
        //echo "kayıt başarılı";
        Header("Location:../log.php?sign=success");
        exit;
    } else {
        //echo "kayıt başarısız";
        Header("Location:../log.php?sign=failed");
        exit;
    }
}

// ADMIN LOG IN SLIDE
if (isset($_POST['admin-btn'])) {
    $adminUSERNAME = $_POST['adminUSERNAME'];
    $adminPASSWORD = $_POST['adminPASSWORD'];
    $checkUserInDB = $db->prepare("SELECT * FROM adminpanel WHERE
    adminUSERNAME=:adminUSERNAME AND adminPASSWORD=:adminPASSWORD");
    $checkUserInDB->execute(array(
        'adminUSERNAME' => $adminUSERNAME,
        'adminPASSWORD' => $adminPASSWORD
    ));
    $int = $checkUserInDB->rowCount();

    if ($int == 1) {
        $pullinfo = $checkUserInDB->fetch(PDO::FETCH_ASSOC);
        $_SESSION['adminUSERNAME'] = $adminUSERNAME;
        $_SESSION['adminNAME'] = $pullinfo['adminNAME'];
        $_SESSION['adminSURNAME'] = $pullinfo['adminSURNAME'];
        header("Location:../admin/adminPanel.php");
        exit;
    } elseif ($int == 0) {
        $pullinfo2 = $checkUserInDB->fetch(PDO::FETCH_ASSOC);
        $adminUSERNAME = $pullinfo2['adminUSERNAME'];
        $adminPASSWORD = $pullinfo2['adminPASSWORD'];
        if ($adminPASSWORD != $adminPASSWORD) {
            header("Location:../log.php?fail=ADMINpassword");
            exit;
        } elseif ($adminUSERNAME != $adminUSERNAME) {
            header("Location:../log.php?fail=ADMINusername");
            exit;
        } else {
            header("Location:../log.php?fail=ADMINfail");
            exit;
        }
    }
}


//ADMIN PAGE
//NEW USER ADD
if (isset($_POST['adminSignUser-btn'])) {

    $kaydet = $db->prepare("INSERT into usersinfo set
		userName=:userName,
		userSurname=:userSurname,
		userUsername=:userUsername,
		userFlatno=:userFlatno,
        userGSM =:userGSM,
        userEmail =:userEmail,
        userPassword =:userPassword
        ");

    $insert = $kaydet->execute(array(
        'userName' => $_POST['userName'],
        'userSurname' => $_POST['userSurname'],
        'userUsername' => $_POST['userUsername'],
        'userFlatno' => $_POST['userFlatno'],
        'userGSM' => $_POST['userGSM'],
        'userEmail' => $_POST['userEmail'],
        'userPassword' => $_POST['userPassword']
    ));
    if ($insert) {
        //echo "kayıt başarılı";
        Header("Location:../admin/adminAccount.php?adminUserSign=success");
        exit;
    } else {
        //echo "kayıt başarısız";
        Header("Location:../admin/adminAccount.php?adminUserSign=failed");
        exit;
    }
}


//ADMIN PAGE
//NEW ADMIN ADD 
if (isset($_POST['adminSignAdmin-btn'])) {
    $kaydet = $db->prepare("INSERT into adminpanel set
    adminUSERNAME=:adminUSERNAME,
    adminNAME=:adminNAME,
    adminSURNAME=:adminSURNAME,
    adminGSM=:adminGSM,
    adminGSM_2 =:adminGSM_2,
    adminPASSWORD =:adminPASSWORD,
    adminEMAIL =:adminEMAIL
    ");

    $insert = $kaydet->execute(array(
        'adminUSERNAME' => $_POST['adminUSERNAME'],
        'adminNAME' => $_POST['adminNAME'],
        'adminSURNAME' => $_POST['adminSURNAME'],
        'adminGSM' => $_POST['adminGSM'],
        'adminGSM_2' => $_POST['adminGSM_2'],
        'adminPASSWORD' => $_POST['adminPASSWORD'],
        'adminEMAIL' => $_POST['adminEMAIL']
    ));
    
    if ($insert) {
        //echo "kayıt başarılı";
        Header("Location:../admin/adminAccount.php?adminNewAdmin=success");
        exit;
    } else {
        //echo "kayıt başarısız";
        Header("Location:../admin/adminAccount.php?adminNewAdmin=failed");
        exit;
    }
}