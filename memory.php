<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
<title>Memóriajáték</title>	
<meta charset="UTF-8">
<link rel="stylesheet" type="text/css" href="style.css"/>
<link rel="shortcut icon" href="images/favicon.ico"/>
</head>
<body >
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
$eredmeny = $kapcs->query("SELECT * FROM cards;");
while ($sor = $eredmeny->fetch_assoc()){
	$card[$sor['Cardid']]=$sor['cardimage'];
}
if(isset($_POST['nr_cards'])){
	echo '<div id="mgame">
	<h3 id="point">0 pont</h3>';
	$n=$_POST['nr_cards'];

	for($i=1;$i<=$n;$i++) $db[$i]=0;
	for($i=0;$i<2*$n;$i++){
		$r=rand(1, $n);
		while($db[$r]>1) $r=rand(1, $n);
		$db[$r]++;
		echo '<img src="images/Cards/unknown.png" id="card'.$i.'" onclick="imgChange('.$i.', \''.$card[$r].'\', '.$n.')">';
	}
	echo '<div id="success" class="startmgame">
	<h1>Sikerült!</h1>
	<form action="memory.php" method="post" id="sform">
	<h2 id="sp"></h2>
	<select name="nr_cards">
	<option value="4"> 4 x 2 </option>
	<option value="6"> 6 x 2 </option>
	</select><br>
	<input type="hidden" value="'.$n.'" name="nr">
	<input type="hidden" value="" name="point" id="hid1">
	<input type="submit" value="Újrajátszás">
	</form>
	<form action="memory.php" method="post" id="save">
	<input type="hidden" value="" name="point" id="hid2">
	<input type="hidden" value="'.$n.'" name="nr">
	<input type="submit" value="Pontszám mentése újrajátszás nélkül">
	</form>
	</form>
	</div>
	</div>';
	
}
else{
	echo '<div class=startmgame> 
		<h1>Válassz nehézségi szintet!</h1>
		<form action="memory.php" method="post">
		<select name="nr_cards">
		<option value="4"> 4 x 2 </option>
		<option value="6"> 6 x 2 </option>
		</select><br>
		<input type="submit" value="Játék">
		</form>
	</div>';
}
	if(isset($_POST['point']) && isset($_SESSION['user'])){
		$sql="UPDATE profil SET memory = memory + ".$_POST['point'].", xp = xp + ".$_POST['nr']."*2 WHERE username = '".$_SESSION['user']."'";
		mysqli_query($kapcs, $sql);
	}
?>




</div>
<div id="footer">
<p>Varázslóképző, Fekete Tamara, 2023</p>
<p>E-mail: tamarafekete0410@gmail.com</p>
</div>
<script>
	var try_nr=0, points=0, last, b, maxPoint=10, c=0;
	function imgChange(i, sr, nr){
		var a = "card" + i;
		document.getElementById(a).src=sr;
		try_nr++;
		if(try_nr%2==0){
			if(sr == last){
				points+=maxPoint;
				maxPoint=10;
				pointCount();
				c++;
				if(nr==c) writeSuccess();
			}
			else{
				setTimeout(changeBack, 600, a);
				maxPoint--;
			}
		}
		else {
			last=sr;
			b = "card" + i;
		}
	}
	function changeBack(a){
		document.getElementById(a).src='images/Cards/unknown.png';
		document.getElementById(b).src='images/Cards/unknown.png';
	}
	function pointCount(){
		document.getElementById("point").innerHTML = points + " pont";
	}
	function pnt(){
		return points;
	}
	function writeSuccess(){
		document.getElementById("sp").innerHTML = points + " pont";
		document.getElementById("success").style.display= "block";
		document.getElementById("hid1").value = points;
		document.getElementById("hid2").value = points;
	}
	
	
</script>
</div>
</body>
</html>