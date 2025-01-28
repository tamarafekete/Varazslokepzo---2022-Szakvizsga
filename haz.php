<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
<title>Ház</title>	
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
	include ("adat.php");
	$eredmeny = $kapcs->query("SELECT answers.*, Q_id, question FROM answers, test WHERE Q_id=question_id;");
	$gp=0;$hp=0;$rp=0;$sp=0;
	while($sor = $eredmeny->fetch_assoc()){
		$rnev="val".$sor["answerid"];
		if(isset($_POST[$rnev])){
			$gp+=$sor["pgryff"];
			$hp+=$sor["phuff"];
			$rp+=$sor["praven"];
			$sp+=$sor["pslyth"];
		}
	}
	//echo "Griffendél: ".$gp."<br>Hugrabug: ".$hp."<br>Hollóhát: ".$rp."<br>Mardekár: ".$sp;
	if($gp>$hp){
		if($gp>$rp){
			if($gp>$sp){ include ("gryffindor.html");$_SESSION['house']='gryff';}
			else {include ("slytherin.html"); $_SESSION['house']='slyth';}
		}
		else{
			if($rp>$sp){ include ("ravenclaw.html"); $_SESSION['house']='raven';}
			else{ include ("slytherin.html"); $_SESSION['house']='slyth';}
		}
	}
	else{
		if($hp>$rp){
			if($hp>$sp){ include ("hufflepuff.html"); $_SESSION['house']='huff';}
			else{ include ("slytherin.html"); $_SESSION['house']='slyth';}
		}
		else{
			if($rp>$sp){ include ("ravenclaw.html"); $_SESSION['house']='raven';}
			else{ include ("slytherin.html"); $_SESSION['house']='slyth';}
		}
	}
	$sql="UPDATE profil SET house='".$_SESSION['house']."' WHERE username like '".$_SESSION['user']."'";
	mysqli_query($kapcs, $sql);
	mysqli_close($kapcs);
?>
</div>
<div id="footer">
<p>Varázslóképző, Fekete Tamara, 2023</p>
<p>E-mail: tamarafekete0410@gmail.com</p>
</div>
</div>
</body>
</html>