<?php
include '../database/adminDB.php';
include '../database/logDB.php';
session_start();
echo"doğru yer";

if ($_GET['userIDdelete']=="delete") {
	$sil=$db->prepare("DELETE from usersinfo where userID=:userID");
	$kontrol=$sil->execute(array(
		'userID' => $_GET['userID']
	));
	if ($kontrol) {
		
		Header("Location:../admin/adminInfo.php?delete=ok");
		exit;

	} else {
		Header("Location:../admin/adminInfo.php?durum=no");
		exit;
	}
}
if ($_GET['userComplaintdelete']=="delete") {
	$sil=$db->prepare("DELETE from complains where complainID=:complainID");
	$kontrol=$sil->execute(array(
		'complainID' => $_GET['complainID']
	));
	if ($kontrol) {
		
		Header("Location:../admin/adminComplaint.php?delete=ok");
		exit;

	} else {
		Header("Location:../admin/adminComplaint.php?durum=no");
		exit;
	}
}

