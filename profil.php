<?php 
session_start();
?>
<!DOCTYPE html>
<html>
<head>
<title>
<?php
echo $_SESSION['user'];
?>
</title>	
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
<div class="profil">

<?php
	include('adat.php');
	$eredmeny = $kapcs->query('SELECT level, house, xp, image, memory, accuracy, description, required_xp FROM profil, level WHERE username LIKE "'.$_SESSION['user'].'" AND level LIKE level_n');
	$sor = $eredmeny->fetch_assoc();
	echo '<img src="'.$sor['image'].'">';
	echo '<h1>'.$_SESSION['user'].'<img src="images/'.$sor['house'].'.png" class="housecrest"></h1>';
	$maxlev = $kapcs->query('SELECT MAX(level_n) AS maxi FROM level');
	$maxlev = $maxlev->fetch_assoc();
	if($sor['level']<$maxlev['maxi']){
	if($sor['xp']>$sor['required_xp']) {
		$sor['level']++;
		$sql='UPDATE profil SET level = level + 1 WHERE username LIKE "'.$_SESSION['user'].'"';
		$sor['required_xp']+=100;
		mysqli_query($kapcs, $sql);
	}
	}
	echo '<h2> '.$sor['level'].'. szint </h2>
	<svg>' ;
	if($sor['level']<$maxlev['maxi'])
	echo
	'<line x1=20 y1=25 x2='. 480*($sor['xp']%100)/100 .' y2=25 style="stroke: ';
	else echo '<line x1=20 y1=25 x2=480 y2=25 style="stroke: ';
	if($_SESSION['house']=='gryff') echo '#990010';
	if($_SESSION['house']=='huff') echo '#ffcc00';
	if($_SESSION['house']=='raven') echo '#0077bb';
	if($_SESSION['house']=='slyth') echo '#26734d';
	echo'">
	</svg>';
	if($sor['level']<$maxlev['maxi'])
	echo 
	' <p>'.$sor['required_xp']-$sor['xp'].' pont a következő szintig</p>';
	else echo '<p>Maximális szint elérve</p>';
	echo '
	<h3>Képességek</h3>
	<h4>Memória: '.$sor['memory'].'</h4>
	<h4>Pontosság: '.$sor['accuracy'].'</h4>
	<p class="desc">'.$sor['description'].'</p>';
	
?>






</div>
</div>
<div id="footer">
<p>Varázslóképző, Fekete Tamara, 2023</p>
<p>E-mail: tamarafekete0410@gmail.com</p>
</div>
</div>
</body>
</html>