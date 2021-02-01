<?php
include '../database/adminDB.php';
include '../database/logDB.php';
session_start();
ob_start();


if ($_GET['userIDdelete'] == "delete") {

	if (isset($_GET['userID'])) {
		$userID = $_GET['userID'];
		$checkUserInDB = $db->prepare("SELECT * FROM billpayers WHERE payerDate IS NULL AND payerID = $userID");
		$checkUserInDB->execute(array(
			'userID' => $userID,
		));
		$int = $checkUserInDB->rowCount();
		if ($int > 0) {
			//CANT MOVED OUT
			Header("Location:../admin/adminInfo.php?unpaidbills=true");
			exit;
		} else {
			$sil = $db->prepare("UPDATE usersinfo SET 
			deregistrationTime=:deregistrationTime
			WHERE userID = {$_GET['userID']}
			");

			$kontrol = $sil->execute(array(
				'deregistrationTime' => date('Y-m-d')
			));
			if ($kontrol) {

				Header("Location:../admin/adminInfo.php?delete=ok");
				exit;
			} else {
				Header("Location:../admin/adminInfo.php?durum=no");
				exit;
			}
		}
	}
}



if ($_GET['userComplaintdelete'] == "delete") {
	$sil = $db->prepare("DELETE from complains where complainID=:complainID");
	$kontrol = $sil->execute(array(
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
if ($_GET['billDelete'] == "delete") {

	$sil = $db->prepare("DELETE from bills where billID=:billID");
	$kontrol = $sil->execute(array(
		'billID' => $_GET['billID']
	));
	if ($kontrol) {

		Header("Location:../admin/adminBills.php?delete=ok");
		exit;
	} else {
		Header("Location:../admin/adminBills.php?durum=no");
		exit;
	}
}
