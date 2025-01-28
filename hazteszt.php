<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
<title>Házteszt</title>	
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
<h1>Házteszt</h1>
<p><b>Válaszolj a kérdésekre, és derítsd ki, melyik házba tartozol!</b></p>
<form action="haz.php" method="post">
<?php
	include ("adat.php");
	$eredmeny = $kapcs->query("SELECT answers.*, Q_id, question FROM answers, test WHERE Q_id=question_id;");
	$a=0;
	while($sor = $eredmeny->fetch_assoc()){
		if($sor["question_id"]!=$a){
			if($sor["question_id"]!=$a) echo "</fieldset>";
			echo "<fieldset>";
			echo "<legend><b>".$sor["question"]."</b></legend>";
			$a=$sor["question_id"];
		}
		echo "<label class='check'><input type='checkbox' name='val".$sor["answerid"]."' value=1 onclick='countChecks()'>";
		echo $sor["answer"]."</label><br>";
	}
	echo "</fieldset>"
?>
<br>
<input type="submit" value="Kész" id="sub">
<p id="sub2">Legalább 5 választ kijelölése szükséges</p>
</form>
</div>
<div id="footer">
<p>Varázslóképző, Fekete Tamara, 2023</p>
<p>E-mail: tamarafekete0410@gmail.com</p>
</div>
<script>
var db=0;
function countChecks(){
	db++;
	if(db>=5) subShow();
}
function subShow(){
	document.getElementById('sub').style.display = "block";
	document.getElementById('sub2').style.display = "none";
}
</script>
</div>
</body>
</html>