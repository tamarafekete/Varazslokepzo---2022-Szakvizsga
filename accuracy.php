<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
<title>Pontosság</title>	
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
<h1>Válassz elsajátítható varázslatot!</h1>
<?php
include ("adat.php");
$eredmeny = $kapcs -> query("SELECT * FROM spells");

while($sor = $eredmeny->fetch_assoc()){
	if(isset($_SESSION['user'])){
	$search = $kapcs -> query("SELECT * FROM finished_spell WHERE spell_id = '".$sor['spellid']."' AND user = '".$_SESSION['user']."'");
	$n=mysqli_num_rows($search);
	}
	else $n=0;
	echo '<div class="pgame">';
	if($n==0)
		echo '<img src="'.$sor['image_gray'].'">';
	else
		echo '<img src="'.$sor['image'].'">';
	echo '<h2>'.$sor['Name'].'</h2>
	<p><i>'.$sor['Description'].'</i></p>
	<form action="pixelpaint.php" method="post">
	<input type="hidden" name="id" value="'.$sor["spellid"].'">
	<input type="submit" value="Játék">
	</form>
	</div>';
}
if(isset($_SESSION['user']) && isset($_POST['nr'])){
	$sql = "UPDATE profil SET xp = xp + ".$_POST['nr'].", accuracy = accuracy + ".$_POST['nr']." WHERE username = '".$_SESSION['user']."'";
	mysqli_query($kapcs, $sql);
	if($n==0){
		$sql="INSERT INTO finished_spell (spell_id, user) VALUES ('".$_POST['spell']."', '".$_SESSION['user']."')";
		mysqli_query($kapcs, $sql);
	}
	header("Refresh:0");
}
?>
</div>
<div id="footer">
<p>Varázslóképző, Fekete Tamara, 2023</p>
<p>E-mail: tamarafekete0410@gmail.com</p>
</div>
</div>
</body>
</html>