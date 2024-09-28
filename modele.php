<?php 
   session_start();
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style/style.css">

    <title>Register</title>
    
		<style>
		html {
			font-family: Arial;
			display: inline-block;
			margin: 0px auto;
			text-align: center;
		}

		ul.topnav {
			list-style-type: none;
			margin: auto;
			padding: 0;
			overflow: hidden;
			background-color: #4CAF50;
			width: 70%;
		}

		ul.topnav li {float: left;}

		ul.topnav li a {
			display: block;
			color: white;
			text-align: center;
			padding: 14px 16px;
			text-decoration: none;
		}

		ul.topnav li a:hover:not(.active) {background-color: #3e8e41;}

		ul.topnav li a.active {background-color: #333;}

		ul.topnav li.right {float: right;}

		@media screen and (max-width: 600px) {
			ul.topnav li.right, 
			ul.topnav li {float: none;}
		}
		
		img {
			display: block;
			margin-left: auto;
			margin-right: auto;
		}
		</style>
		
		<title>Home : Sartex</title>
	</head>
	
	


<body>
<h2>Bienvenue chez Sartex </h2>
		<ul class="topnav">
        <li><a href="registration.php">connexion</a></li>
			
            <li><a class="active" href="modele.php">modele</a></li>
			
			<li><a href="rendement.php">rendement</a></li>
			<li><a href="read tag.php">Read Tag ID</a></li>
		</ul>
		<br>
<?php
// Informations de connexion à la base de données
$servername = "localhost";
$username = "root"; // Remplacez par votre nom d'utilisateur MySQL
$password = ""; // Remplacez par votre mot de passe MySQL
$dbname = "rendement"; // Remplacez par le nom de votre base de données

// Création de la connexion
$conn = new mysqli($servername, $username, $password, $dbname);

// Vérifier la connexion
if ($conn->connect_error) {
    die("Échec de la connexion : " . $conn->connect_error);
}

// Requête SQL pour récupérer les options
$sql = "SELECT id, nom FROM modele";
$result = $conn->query($sql);

// Générer le menu déroulant
?>
    

    
    
        
    

    
   
<?php


echo '<form method="post" action="modele_action.php">';
echo '<select name="modele">';
if ($result->num_rows > 0) {
    // Afficher chaque option dans le menu déroulant
    while($row = $result->fetch_assoc()) {
        echo '<option value="'.$row['id'].'">' . $row["nom"] . '</option>';
    }   
} else {
    echo '<modele value="">Aucune option disponible</option>';
}
echo '</select>';
echo '<input type="submit" name="valider" value="valider">';
echo "</form>";


// Fermer la connexion
$conn->close();

?>
