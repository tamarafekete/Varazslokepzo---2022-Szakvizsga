<!DOCTYPE html>
<html>
<div id="topnav">
<ul class="topnav">
<li id="kezd"><a href="index.php">Kezdőlap</a></li>
<?php 
if(isset($_SESSION['user'])){
echo '<li class="dropdown" id="fejl">
	<a class="dropbtn">Fejlesztések</a>
	<div class="dropcont">
	<a href="memory.php">Memória</a>
	<a href="accuracy.php">Pontosság</a>
	</div>
	
</li>
<li id="kuld"><a href="missions.php" >Küldetések</a></li>';
}
?>
<li class="invis" id="space"><a>a</a></li>
<?php 
if(isset($_SESSION['user']))
 echo '<li  id="profil" class="dropdownright">
			<a href="profil.php" class="dropbtn">Profil</a>
			<div class="dropcont">
			<a href="settings.php">Beállítások</a>
			</div>
		</li>
		<li class="right"><a href="logout.php">Kilépés</a></li>';
 else echo '<li class="right"><a href="login.php">Belépés</a></li><li class="right"><a href="reg.php">Regisztrálás</a></li>';
?>

</ul>
</div>
</html>