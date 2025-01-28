<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
<title>Varázslat</title>	
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
<div class="pixelgame">
<div class="pixels">
<?php 
if(isset($_POST["id"])){
include ("adat.php");
$kep = $kapcs -> query("SELECT * FROM spells WHERE spellid = '".$_POST['id']."'");
$kep = $kep->fetch_assoc();
echo "<h1>".$kep["Name"]."</h1>";
$eredmeny = $kapcs -> query("SELECT * FROM colors WHERE spell_id = '".$kep["spellid"]."'");
$s = 1;
while($szinek[$s] = $eredmeny->fetch_assoc()) $s++;
for($i=0;$i<$kep["Size"];$i++){
 for($j=0;$j<$kep["Size"];$j++){
	 echo "<div id='r".$i."c".$j."' onmouseenter='coloring(\"".$kep["coloring"][$i*$kep["Size"]+$j]."\", \"r".$i."c".$j."\", \"".$kep["Size"]."\")'>".$kep["coloring"][$i*$kep["Size"]+$j]."</div>";
 }
 echo "<br>";
}
echo "</div><div class='colors'><ul>";
for($i=1;$i<$s;$i++)
	echo "<div id='c".$i."' onclick='activ(\"c".$i."\", \"".$szinek[$i]["color_name"]."\", \"".$szinek[$i]["c_nr"]."\")'>".$szinek[$i]["c_nr"]."<div style='background-color:".$szinek[$i]["color_name"]."'><pre>       </pre></div></div>";
}
echo "</div>";
echo '<div id="success" class="startmgame">
	<h1>Sikerült!</h1>
	<h3> + '.$kep['Size'].' xp</h3>
	<h3> + '.$kep['Size'].' pontosság</h3><br>
	<form action="accuracy.php" method="post" id="save">
	<input type="hidden" value="'.$kep['Size'].'" name="nr">
	<input type="hidden" value="'.$kep['spellid'].'" name="spell">
	<input type="submit" value="Mentés és visszalépés">
	</form>
	</form>
	</div>';
?>
</div>
</div>
<div id="footer">
<p>Varázslóképző, Fekete Tamara, 2023</p>
<p>E-mail: tamarafekete0410@gmail.com</p>
</div>
<script>
var el=0, color, c_nr=0, n=0;
	function activ(sr, cl, cnr){
		if(el!=0){
		document.getElementById(el).style.backgroundColor = "#36292e";
		document.getElementById(el).style.color = "#A9A9A9";
		}
		document.getElementById(sr).style.backgroundColor = "#513740";
		document.getElementById(sr).style.color = "LightSteelBlue";
		el=sr;
		color=cl;
		c_nr=cnr;
	}
	function coloring(cid, sr, nr){
		if(cid==c_nr){
		var a=document.getElementById(sr);
		if(getComputedStyle(a).getPropertyValue("color") != getComputedStyle(a).getPropertyValue("background-color")) n++;
		a.style.backgroundColor = color;
		a.style.color = color;
		a.style.borderColor = color;
		
		if(n==nr*nr){
			document.getElementById("success").style.display = "block";
		}
		}
	}
</script>
</div>
</body>
</html>