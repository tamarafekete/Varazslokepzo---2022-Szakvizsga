<?php
$kapcs = new mysqli("localhost","root","","varazslokepzo");
if ($kapcs->connect_error)
die("A kapcsolat nem sikerült: " . $kapcs->connect_error);
$kapcs->query("SET character_set_results=utf8");
?>