<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
<title>Varázslóképző</title>	
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
<h1>Üdvözlünk a Varázslóképzőben</h1>
<div class="options" id='intro1' onclick="changeImg('intro1', 'intro2')"><h2>Hozd létre saját karaktered</h2>
<h3>Elképzelheted magad a Roxfortban, adhatsz leírást, és tagja lehetsz a roxforti házadnak!</h3>
<p>● ○ ○</p>
</div>
<div class="options" id='intro2' onclick="changeImg('intro2', 'intro3')"><h2>Fejleszd a karaktered képességeit</h2>
<h3>Növelheted a memóriád a kártyajátékunkkal, és tanulhatsz új varázslatokat a pontosságfejlesztő pixelart típusú színező játékkal!</h3>
<p>○ ● ○</p>
</div>
<div class="options" id='intro3' onclick="changeImg('intro3', 'intro1')"><h2>Vegyél részt küldetéseken</h2>
<h3>Feloldhatsz minél több küldetést, mely előrébb mozdítja karaktered történetét!</h3>
<p>○ ○ ●</p>
</div>
</div>
<div id="footer">
<p>Varázslóképző, Fekete Tamara, 2023</p>
<p>E-mail: tamarafekete0410@gmail.com</p>
</div>
<script>
function changeImg(bef, aft){
	document.getElementById(bef).style.display = 'none';
	document.getElementById(aft).style.display = 'block';
}
</script>
</div>
</body>
</html>