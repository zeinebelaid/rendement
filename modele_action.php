<?php
//var_dump($_POST);
$modele = $_POST['modele'];
session_start();
$_SESSION['modele'] = $modele;
header('Location: count.php');

?>