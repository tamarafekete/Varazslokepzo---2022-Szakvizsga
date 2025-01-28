<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
<title>Első nap a Roxfortban</title>	
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
<h1>Első nap a Roxfortban</h1>
<div class="quest" id="story1">
<?php
echo '<img src="images/questimages/'.$_SESSION['house'].'_commonroom.jpg">';
?>
<p>Diákok tömkelegétől volt hangos a klubhelység másnap reggel.<br><button onclick="showNext('story1', 'story2')">Tovább</button>
</p>
</div>
<div class="quest" id="story2">
<img src="images/questimages/sorting_ceremony.jpg">
<p>McGalagony: A Teszlek Süveg beoszt a Roxfort négy házának egyikébe a legfőbb tulajdonságaitok alapján, legyetek merészek vagy műveltek, elhivatottak vagy szelídek.<br><button onclick="showNext('story2', 'story3')">Tovább</button>
</p>
</div>
<div class="quest" id="story3">
<img src="images/questimages/sorting_ceremony.jpg">
<?php
echo '<p>McGalagony: '.$_SESSION['user'].', kérem fáradjon a süveghez.';
?> 
<br><button onclick="showNext('story3', 'story4')">Tovább</button>
</p>
</div>
<div class="quest" id="story4">
<img src="images/questimages/sorting.jpg">
<?php
if($_SESSION['house']=='gryff') echo '<p>Teszlek Süveg: Kalandvágyból nem szenvedsz hiányt, azt látom. Legyen hát a…<br>GRIFFENDÉL!';
if($_SESSION['house']=='slyth') echo '<p>Teszlek Süveg: Nem kevés az elvárás és a célkitűzés. A ház, amelyben sokra vinnéd, a…<br>MARDEKÁR';
if($_SESSION['house']=='raven') echo '<p>Teszlek Süveg: A kíváncsiság vezérel leginkább, nem igaz? Eszem azt súgja… <br>HOLLÓHÁT!';
if($_SESSION['house']=='huff') echo '<p>Teszlek Süveg: Nem tartod kevésre társaid, s nem hiányzik a kellő figyelem sem. Legyen a…<br>HUGRABUG';
?>
<br><button onclick="showNext('story4', 'story5')">Tovább</button>
</p>
</div>
<div class="quest" id="story5">
<img src="images/questimages/sorting.jpg">
<p>*Taps*<br><button onclick="showNext('story5', 'story6')">Tovább</button>
</p>
</div>
<div class="quest" id="story6">
<form action="missions.php" method="post">
<img src="images/questimages/welcoming_feast.jpg">
<p>Miután minden elsőéves elfoglalta helyét az újonnan kijelölt asztalaiknál, a lakoma zaját több száz tányérnyi különböző ínyencség megjelenése izzítja be.<br>
<input type="hidden" value="2" name="questid">
<input type="submit" value="Befejez">
</p>
</form>
</div>
</div>
<div id="footer">
<p>Varázslóképző, Fekete Tamara, 2023</p>
<p>E-mail: tamarafekete0410@gmail.com</p>
</div>
<script>
function showNext(bef, aft){
document.getElementById(bef).style.display = 'none';
document.getElementById(aft).style.display = 'block';
}
</script>
</div>
</body>
</html>