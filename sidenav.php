<!DOCTYPE html>
<html>
<div id="oldalmenu">

<?php
if(isset($_SESSION['user'])){
	echo '<ul>';
	if($_SESSION['house']=='house')
		echo '<li><a href="hazteszt.php">Derítsd ki, melyik Házba tartozol!</a></li>';
	echo '<li><a href="memory.php">Memóriajáték</a></li>
	<li><a href="accuracy.php">Pontosság:<br><i>Tanulj varázslatokat</i></a></li>
	</ul>
	<p><b>Elérhető küldetések:</b><br>';
	include ('adat.php');
	$eredmeny = $kapcs -> query("SELECT * FROM quests");
	while($sor = $eredmeny->fetch_assoc()){
		if($sor['questreq']!=NULL){
			$q = "SELECT quest_id FROM finished_quest WHERE user = '".$_SESSION['user']."' AND quest_id = '".$sor['questreq']."'";
			$q = mysqli_query($kapcs, $q);
			$q = mysqli_num_rows($q);
		}
		else $q=1;
		if(str_contains($sor['housereq'], $_SESSION['house']) AND $q==1){
			$search = $kapcs -> query("SELECT * FROM finished_quest WHERE user = '".$_SESSION['user']."' AND quest_id = '".$sor['id']."'");
			$m = mysqli_num_rows($search);
			if($m==0){
				echo '<span>'.$sor['name']."</span><br>";
			}
		}
	}
	echo '</p>';
}
else{
echo '<p><b>Regisztrálj vagy lépj be a játékok és további tartalmak eléréséért!</b></p>';
}
?>

</div>
</html>