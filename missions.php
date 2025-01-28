<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
<title>Küldetések</title>	
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
if(isset($_POST['questid'])){
	$q = "SELECT quest_id FROM finished_quest WHERE user = '".$_SESSION['user']."' AND quest_id = '".$_POST['questid']."'";
	$q = mysqli_query($kapcs, $q);
	$q = mysqli_num_rows($q);
	if($q==0){
	$sql = "INSERT INTO finished_quest (quest_id, user) VALUES ('".$_POST['questid']."', '".$_SESSION['user']."')";
	mysqli_query($kapcs, $sql);
	}
}
$eredmeny = $kapcs -> query("SELECT * FROM quests ");
$d = mysqli_num_rows($eredmeny);
$mem = $kapcs ->query("SELECT memory FROM profil WHERE username = '".$_SESSION['user']."'");
$mem = $mem->fetch_assoc();
while($sor = $eredmeny->fetch_assoc()){
	if($sor['questreq']!=NULL){
	$q = "SELECT quest_id FROM finished_quest WHERE user = '".$_SESSION['user']."' AND quest_id = '".$sor['questreq']."'";
	$q = mysqli_query($kapcs, $q);
	$q = mysqli_num_rows($q);
	}
	else $q=1;
	if(str_contains($sor['housereq'], $_SESSION['house']) && $q){
		$search = $kapcs -> query("SELECT * FROM finished_quest WHERE user = '".$_SESSION['user']."' AND quest_id = '".$sor['id']."'");
		$m = mysqli_num_rows($search);
		if($m>0) echo '<div class="queststart_finished">';
		else echo '<div class="queststart">';
	echo '<fieldset><legend><b>';
	if($m>0) echo '✓';
	echo $sor['name'].'</b></legend><b>';
	if($sor['memoryreq']>0 or $sor['spellreq']!=NULL) echo '<h3>Követelmények:</h3>';
	if($sor['memoryreq']>$mem['memory'])
		echo '<p>Memória: '.$mem['memory'].'/'.$sor['memoryreq'].'</p>';
	else {
		if($sor['memoryreq']>0) echo '<p>✓Memória</p>';
	}
	if($sor['spellreq']!=NULL){
		$search = $kapcs -> query("SELECT finished_spell.*, Name FROM finished_spell, spells WHERE spellid = spell_id AND spell_id = '".$sor['spellreq']."' AND user = '".$_SESSION['user']."';");
		$n=mysqli_num_rows($search);
		if($n==0) {
			$search = $kapcs->query("SELECT Name FROM spells WHERE spellid = '".$sor['spellreq']."'");
			$search = $search->fetch_assoc();
			echo '<p>'.$search['Name'].'</p>';
		}
		else {
			$search = $search->fetch_assoc();
			echo'<p>✓'.$search['Name'].'</p>';
		}
	}
	else $n=1;
	if($n>0 && $sor['memoryreq']<=$mem['memory'])
	echo '<form action="'.$sor['file'].'" method="post">
	<input type="submit" value="Indítás">
	</b></form></fieldset>' ;
	echo '</div>';
	}
	else $d--;
}
if($d==0) echo "<h2>Még nincs elérhető küldetés</h2>";

?>

</div>
<div id="footer">
<p>Varázslóképző, Fekete Tamara, 2023</p>
<p>E-mail: tamarafekete0410@gmail.com</p>
</div>
</div>
</body>
</html>