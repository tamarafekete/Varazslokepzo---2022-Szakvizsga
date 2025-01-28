<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
<title>Belépés</title>	
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
	if(isset($_POST["username"])) {
		include("adat.php");
	$sql="SELECT username, house FROM profil WHERE username = '".$_POST["username"]."'  and password = md5('".$_POST["pw1"]."')";
	$eredmeny = mysqli_query($kapcs,$sql);
	$sor=$eredmeny->fetch_assoc();
	$n=mysqli_num_rows($eredmeny);
	if ($n==0){
	echo "<h3>Hibás jelszó vagy felhasználónév! <br></h3>"; 
	header("Refresh:1");}
	else {$_SESSION['user']=$_POST['username']; 
			$_SESSION['house']=$sor['house'];
		  
		  header("Refresh:0");
		  }
	
	}
	else echo "<h3>Hello ".$_SESSION["user"]."!</h3>";
}
else 
	echo '<p>Amennyiben még nem hozott létre felhasználót, megteheti itt: <a href="reg.php">Regisztráció</a></p>
<div class="reg">
<form action="login.php" method="post">
<label>Felhasználónév: <br><input type="text" name="username" required><br></label>
<label>Jelszó: <br><input type="password" name="pw1" required><br></label>
</div>
<input type="reset" value="Töröl">
<input type="submit" value="Belép">';
?>

</div>
<div id="footer">
<p>Varázslóképző, Fekete Tamara, 2023</p>
<p>E-mail: tamarafekete0410@gmail.com</p>
</div>
</div>
</body>
</html>