<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
<title>Regisztráció</title>	
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
<?php
if(isset($_POST["username"]) or isset($_SESSION['user'])){
	if(isset($_POST["username"])){
		if($_POST["pw1"]==$_POST["pw2"]){
	include ("adat.php");
	$sql="INSERT INTO profil(username, password, email) VALUES ('".$_POST["username"]."', md5('".$_POST["pw1"]."'), '".$_POST["email"]."')";
	try{
		mysqli_query($kapcs, $sql);
	}catch (mysqli_sql_exception $e){
		echo "Foglalt felhasználónév";
		echo $_POST["username"], $_POST["pw1"], $_POST["email"];
	}
		$_SESSION['house']='house';
		$_SESSION['user']=$_POST['username'];
		mysqli_close($kapcs);
		header("Refresh:0");
	}
	else echo "Kérjük mindkétszer ugyanazt a jelszót írja be!";
		
	}
	else{	
		echo "<h1>Sikeres regisztráció!</h1>
		<div class='reg' style='height: 150px;'>
			<h2>Első teendők: </h2>
			<ol>
			<li>Derítsd ki melyik házba tartozol a <a href='hazteszt.php'>Házteszt</a> segítségével!</li>
			<li>Állíthatsz magadnak profilképet, és jellemezheted a karaktered a <a href='profil.php'>Profil</a> menüpontban!</li>
			<li>Ki is próbálhatod az első <a href='mission.php'>küldetésed!</a></li>
			</ol>
		</div>";
		
	}
}

else 
	echo '<p>Amennyiben már hozott létre felhasználót, lépjen be itt: <a href="login.php">Belépés</a></p>
<div class="reg">
<form action="reg.php" method="post">
<label>Felhasználónév: <br><input type="text" name="username" maxlength="20" required><br></label>
<label>Email: <br><input type="text" name="email" required maxlength="50"><br></label>
<label>Jelszó: <br><input type="password" name="pw1" required maxlength="15"><br></label>
<label>Jelszó újra: <br><input type="password" name="pw2" maxlength="15" required><br></label></div>
<input type="reset" value="Töröl">
<input type="submit" value="Regisztrál"></form>';

?>


</div>
<div id="footer">
<p>Varázslóképző, Fekete Tamara, 2023</p>
<p>E-mail: tamarafekete0410@gmail.com</p>
</div>
</div>
</body>
</html>