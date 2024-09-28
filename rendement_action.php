<?php
$modele = $_POST['nom'];
$modele = $_POST['prenom'];
session_start();
$_SESSION['nom'] = $nom;
$_SESSION['prenom'] = $prenom;
header('Location: rendement.php');
?>