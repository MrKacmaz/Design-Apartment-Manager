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
	<title>Update</title>
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
			background-image: linear-gradient(to left, rgb(237, 66, 100), rgb(255, 237, 189));
			padding: 3.5%;
			text-align: center;
			font-size: 2rem;
			text-transform: uppercase;
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
			padding: .75rem;
		}

		.nav-ul-li:hover {
			background-color: #777;
		}

		.nav-ul-li a {
			text-decoration: none;
			color: inherit;
		}

		.main-content {

			display: flex;
			padding: 2%;
			flex-wrap: wrap;
			flex-direction: row;
		}

		.main-item {
			padding: 2%;
			line-height: 1.5;
			text-align: center;
			flex: 1;
			flex-grow: 1;
			flex-basis: 0;
		}

		.main-item h2 {
			color: #da4167;
		}

		.main-item p {
			margin-top: 0.5rem;
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
			padding: .5rem;
		}

		.links ul li:hover {
			background-color: #777;
		}

		.links ul li a {
			text-decoration: none;
			color: inherit;
		}

		#updateDIV{
			display: flex;
			align-items: center;
			justify-content: center;
		}
		#updateDIV input{
			padding: .5rem;
			margin: 1rem;
		}
		#btn{
			padding: 0.5rem;
		}
	</style>

</head>

<body>

	<nav class="nav">
		<span>MANAGEMENT SYSTEM</span>
	</nav>

	<main class="main-content">
		<div class="main-item">
			<h2>Update User Data</h2>
		</div>
	</main>


	<?php
	if (isset($_GET['userIDupdate'])) {

		$bilgilerimsor = $db->prepare("SELECT * from usersinfo where userID=:userID");
		$bilgilerimsor->execute(array(
			'userID' => $_GET['userID']
		));

		$bilgilerimcek = $bilgilerimsor->fetch(PDO::FETCH_ASSOC);
	}
	?>
	<div id="updateDIV">
		<form action="update.php" method="POST">

			User name: <input type="text" required="" name="userName" value="<?php echo $bilgilerimcek['userName'] ?>"><br><br>
			User surname:<input type="text" required="" name="userSurname" value="<?php echo $bilgilerimcek['userSurname'] ?>"><br><br>
			User e-mail:<input type="email" required="" name="userEmail" value="<?php echo $bilgilerimcek['userEmail'] ?>"><br><br>
			User username:<input type="text" required="" name="userUsername" value="<?php echo $bilgilerimcek['userUsername'] ?>"><br><br>
			User flat no:<input type="text" required="" name="userFlatno" value="<?php echo $bilgilerimcek['userFlatno'] ?>"><br><br>
			User gsm:<input type="text" required="" name="userGSM" value="<?php echo $bilgilerimcek['userGSM'] ?>"><br><br>
			<input type="hidden" value="<?php echo $bilgilerimcek['userID'] ?>" name="userID"><br>
			<button type="submit" id="btn" name="updateislemi">Formu Düzenle</button>
		</form>
	</div>

	<?php

	if (isset($_POST['updateislemi'])) {

		$bilgilerim_id = $_POST['userID'];

		$kaydet = $db->prepare("UPDATE usersinfo set
		userName=:userName,
		userSurname=:userSurname,
		userEmail=:userEmail,
		userUsername=:userUsername,
		userFlatno=:userFlatno,
		userGSM=:userGSM

		where userID={$_POST['userID']}
		");

		$insert = $kaydet->execute(array(

			'userName' => $_POST['userName'],
			'userSurname' => $_POST['userSurname'],
			'userEmail' => $_POST['userEmail'],
			'userUsername' => $_POST['userUsername'],
			'userFlatno' => $_POST['userFlatno'],
			'userGSM' => $_POST['userGSM']
		));



		if ($insert) {
			//echo "kayıt başarılı";
			Header("Location:../admin/adminInfo.php?durum=ok&bilgilerim_id=$bilgilerim_id");
			exit;
		} else {
			//echo "kayıt başarısız";
			Header("Location:../admin/adminInfo.php?durum=no&bilgilerim_id=$bilgilerim_id");
			exit;
		}
	}
	?>




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