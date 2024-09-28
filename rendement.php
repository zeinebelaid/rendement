<?php 
   session_start();
?>
<!DOCTYPE html>
<html lang="en">
<html>
	<head>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta charset="utf-8">
		<link href="css/bootstrap.min.css" rel="stylesheet">
		<script src="js/bootstrap.min.js"></script>
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
		
		.table {
			margin: auto;
			width: 90%; 
		}
		
		thead {
			color: #FFFFFF;
		}
		</style>
		
		
		
	</head>
	
	<body>
	<h2>Bienvenue chez Sartex </h2>
		<ul class="topnav">
			<li><a href="registration.php">connexion </a></li>
			<li><a href="modele.php">modele</a></li>
			<li><a class="active" href="rendement.php">rendement</a></li>
			<li><a href="read tag.php">Read Tag ID</a></li>
		</ul>
		<br>
		<div class="container">
            <div class="row">
                <h3>rendement</h3>
            </div>
            <div class="row">
                <table class="table table-striped table-bordered">
                  
                    <tr bgcolor="#10a0c5" color="#FFFFFF">
                      <th>qd</th>
					  <th>temps</th>
                      <th>Totale</th>
					  <th>Action</th>
                    </tr>
                  <tbody>
                  <?php
                  //a verifier
                  session_start();
                  echo 'Le modèle est: '. $_SESSION['modele'].'<br>';
				/* echo '<le prenom est:'.$SESSION ['nom'];
				  echo '<le modele est:'.$SESSION ['prenom'];*/
                   include 'base_de_donnee.php';
                   $pdo = Database::connect();
                   $sql = 'SELECT * FROM rendement ORDER BY  NAME ASC';
                  foreach ($pdo->query($sql) as $row) {
                            
                            echo '<td>'. $row['id'] . '</td>';
							echo '<td>'. $row['Temps'] . '</td>';
							echo '<td>'. $row['Totale'] . '</td>';
							echo '<td><a class="btn btn-success" href="user data edit page.php?id='.$row['id'].'">Edit</a>';
							echo ' ';
							echo '<a class="btn btn-danger" href="user data delete page.php?id='.$row['id'].'">Delete</a>';
							echo '</td>';
                            echo '</tr>';
				  }
                   
                   Database::disconnect();
                  ?>
                  </tbody>
				</table>
			</div>
		</div> <!-- /container -->
	</body>
</html>
				  
