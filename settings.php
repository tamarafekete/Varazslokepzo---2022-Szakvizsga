<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
<title>Profilbeállítások</title>	
<meta charset="UTF-8">
<link rel="stylesheet" type="text/css" href="style.css"/>
<link rel="shortcut icon" href="images/favicon.ico"/>
</head>
<body>
<div id="header">
<h1>Varázslóképző</h1>
</div>
<?php 
include 'topnav.php';
?>
<div id="wrap">
<?php
include 'sidenav.php';
?>
<div id="tartalom">
<h1>Profilbeállítások</h1>
<div class="reg">
<?php
	include ("adat.php");
	$eredmeny = $kapcs->query("SELECT email, image, description FROM profil WHERE username = '".$_SESSION['user']."'");
	$sor = $eredmeny->fetch_assoc();
	if(isset($_POST['username'])){
		if($_POST['username']!=$_SESSION['user']){
			$sql='UPDATE profil SET username="'.$_POST['username'].'" WHERE username = "'.$_SESSION['user'].'"';
			mysqli_query($kapcs, $sql);
			$_SESSION['user']=$_POST['username'];
		}
		if($_POST['email']!=$sor['email']){
			$sql='UPDATE profil SET email="'.$_POST['email'].'" WHERE username = "'.$_SESSION['user'].'"';
			mysqli_query($kapcs, $sql);
		}
		if($_POST['description']!=$sor['description']){
			$sql='UPDATE profil SET description="'.$_POST['description'].'" WHERE username = "'.$_SESSION['user'].'"';
			mysqli_query($kapcs, $sql);
		}
		header("Refresh:0");
	}
	echo '
	<form action="settings.php" method="post">
		<label>Felhasználónév: <br><input type="text" name="username" value="'.$_SESSION['user'].'" maxlength="20"></label><br>
		<p>A felhasználónév megváltoztatása csak a küldetések és varázslatok használata előtt lehetséges, ha mégis meg szeretné változtatni, lépjen kapcsolatba az oldal üzemeltetőjével a megadott e-mail-címen.</p>
		<label>Email: <br><input type="text" name="email" value="'.$sor['email'].'" maxlength="50"></label><br>
		<label> Leírás: <br><textarea name="description" maxlength="1000">'.$sor['description'].'</textarea></label><br>
		<input type="submit" value="Mentés">
		<input type="reset" value="Visszaállítás">
	</form>
	';
	
?>
<br>
<form action="settings.php" method="post" enctype="multipart/form-data">
<label>Profilkép megváltoztatása:<br><input type="file" name="image"></label><br>
<input type="submit" value="Mentés">
</form>
<?php
if(isset($_FILES["image"])){
	if ($_FILES["image"]["error"] > 0) 
				echo "<p>Nem sikerült feltölteni!</p>";
		else 
			if (file_exists("images/profilkepek/".$_FILES["image"]["name"])) 
				echo "Már van ilyen nevű kép a mappában!";
		 else { include "adat.php";
		move_uploaded_file(
		$_FILES["image"]["tmp_name"],"images/profilkepek/" . $_FILES["image"]["name"]); 
		echo "Sikerült a ". $_FILES["image"]["name"] ." feltöltése!<br>";
		$sql = "UPDATE profil SET image='images/profilkepek/".$_FILES["image"]["name"]."' WHERE username='".$_SESSION['user']."'" ;
		$kapcs->query($sql); }

}
?>
</div class="reg">
</div>
<div id="footer">
<p>Varázslóképző, Fekete Tamara, 2023</p>
<p>E-mail: tamarafekete0410@gmail.com</p>
</div>
</div>
</body>
</html>