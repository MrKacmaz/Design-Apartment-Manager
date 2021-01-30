<?php
require_once '../database/logDB.php';
require_once '../database/adminDB.php';
session_start();
ob_start();




// user log-in slider 
if (isset($_POST['login-btn'])) {
    $userUsername = $_POST['userUsername'];
    $userPassword = md5($_POST['userPassword']);
    $checkUserInDB = $db->prepare("SELECT * FROM usersinfo WHERE
    userUsername=:userUsername AND userPassword=:userPassword");
    $checkUserInDB->execute(array(
        'userUsername' => $userUsername,
        'userPassword' => $userPassword
    ));
    $int = $checkUserInDB->rowCount();

    if ($int == 1) {
        $pullinfo = $checkUserInDB->fetch(PDO::FETCH_ASSOC);
        //CREATE SESSIONS
        $_SESSION['userID'] = $pullinfo['userID'];
        $_SESSION['userUsername'] = $userUsername;
        $_SESSION['userName'] = $pullinfo['userName'];
        $_SESSION['userPassword'] = $_POST['userPassword'];
        $_SESSION['userSurname'] = $pullinfo['userSurname'];
        $_SESSION['userFlatno'] = $pullinfo['userFlatno'];
        $_SESSION['userGSM'] = $pullinfo['userGSM'];
        $_SESSION['userEmail'] = $pullinfo['userEmail'];

        //REMEMBER ME CHECKBOX
        if (isset($_POST['rememberMe'])) {
            if ($_POST['rememberMe'] == "on") {
                // if checkboxed selected
                setcookie("userUsername", $userUsername, strtotime("+1 day"));
                setcookie("userPassword", $userPassword, strtotime("+1 day"));
            }
        } else {
            //checkboxed not selected
            setcookie("userUsername", $userUsername, strtotime("-1 day"));
            setcookie("userPassword", $userPassword, strtotime("-1 day"));
        }
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
        'userName' => htmlspecialchars(strtolower($_POST['userName'])),
        'userSurname' => htmlspecialchars(strtoupper($_POST['userSurname'])),
        'userUsername' => htmlspecialchars($_POST['userUsername']),
        'userFlatno' => htmlspecialchars($_POST['userFlatno']),
        'userGSM' => htmlspecialchars($_POST['userGSM']),
        'userEmail' => htmlspecialchars($_POST['userEmail']),
        'userPassword' => md5(htmlspecialchars($_POST['userPassword']))
    ));
    if ($insert) {
        //echo "kayıt başarılı";
        Header("Location:../log.php?sign=success");
        exit;
    } else {
        //echo "kayıt başarısız";
        $userUsername = $_POST['userUsername'];
        $userFlatno = $_POST['userFlatno'];
        $checkUserInDB = $db->prepare("SELECT * FROM usersinfo WHERE
        userUsername=:userUsername AND userFlatno=:userFlatno");
        $checkUserInDB->execute(array(
            'userUsername' => $userUsername,
            'userFlatno' => $userFlatno
        ));
        $int = $checkUserInDB->rowCount();
        if ($int == 0) {
            Header("Location:../log.php?sign=failedDBsame");
            exit;
        } else {
            Header("Location:../log.php?sign=failed");
            exit;
        }
    }
}



// ADMIN LOG IN SLIDE
if (isset($_POST['admin-btn'])) {
    $adminUSERNAME = $_POST['adminUSERNAME'];
    $adminPASSWORD = md5($_POST['adminPASSWORD']);
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

        if ($adminPASSWORD != $pullinfo2['adminPASSWORD']) {
            header("Location:../log.php?fail=ADMINpassword");
            exit;
        } elseif ($adminUSERNAME != $pullinfo2['adminUSERNAME']) {
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
        'userName' => htmlspecialchars(strtolower($_POST['userName'])),
        'userSurname' => htmlspecialchars(strtoupper($_POST['userSurname'])),
        'userUsername' => htmlspecialchars($_POST['userUsername']),
        'userFlatno' => htmlspecialchars($_POST['userFlatno']),
        'userGSM' => htmlspecialchars($_POST['userGSM']),
        'userEmail' => htmlspecialchars($_POST['userEmail']),
        'userPassword' => md5(htmlspecialchars($_POST['userPassword']))
    ));
    if ($insert) {
        //echo "kayıt başarılı";
        Header("Location:../admin/adminAddNewUser.php?adminUserSign=success");
        exit;
    } else {
        //echo "kayıt başarısız";
        Header("Location:../admin/adminAddNewUser.php?adminUserSign=failed");
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
        'adminUSERNAME' => htmlspecialchars($_POST['adminUSERNAME']),
        'adminNAME' => htmlspecialchars(strtolower($_POST['adminNAME'])),
        'adminSURNAME' => htmlspecialchars(strtoupper($_POST['adminSURNAME'])),
        'adminGSM' => htmlspecialchars($_POST['adminGSM']),
        'adminGSM_2' => htmlspecialchars($_POST['adminGSM_2']),
        'adminPASSWORD' => md5(htmlspecialchars($_POST['adminPASSWORD'])),
        'adminEMAIL' => htmlspecialchars($_POST['adminEMAIL'])
    ));

    if ($insert) {
        //echo "kayıt başarılı";
        Header("Location:../admin/adminAddNewAdmin.php?adminNewAdmin=success");
        exit;
    } else {
        //echo "kayıt başarısız";
        Header("Location:../admin/adminAddNewAdmin.php?adminNewAdmin=failed");
        exit;
    }
}
