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
	
	
	
</html>
</head>
<body>
<h2>Bienvenue chez Sartex </h2>
		<ul class="topnav">
			<li><a class="active" href="registration.php">connexion</a></li>

			<li><a href="modele.php">modele</a></li>
			<li><a href="rendement.php">Rrendement</a></li>
			<li><a href="read tag.php">Read Tag ID</a></li>
		</ul>
		<br>
		
      <div class="container">
        <div class="box form-box">

        <?php 
         
         include("php/config.php");
         if(isset($_POST['submit'])){
            $nom = $_POST['nom'];
            $prenom = $_POST['prenom'];
            $matricule = $_POST['matricule'];
            $adresse = $_POST['adresse'];
            $numero_de_telephone = $_POST['numero_de_telephone'];
            $mot_de_passe= $_POST['mot_de_passe'];


         $verify_query = mysqli_query($con,"SELECT matricule FROM employe WHERE matricule='$matricule'");

         if(mysqli_num_rows($verify_query) !=0 ){
            echo "<div class='message'>
                      <p>This matricule is used, Try another One Please!</p>
                  </div> <br>";
            echo "<a href='javascript:self.history.back()'><button class='btn'>Go Back</button>";
         }
         else{

            mysqli_query($con,"INSERT INTO employe(nom,prenom,matricule,adresse,numero_de_telephone,mot_de_passe) VALUES('$nom','$prenom','$matricule','$adresse','$numero_de_telephone','$mot_de_passe')") or die("Erroe Occured");

            echo "<div class='message'>
                      <p>Inscription réussie!</p>
                  </div> <br>";
            echo "<a href='index.php'><button class='btn'>connecter</button>";
         

         }

         }else
         
        ?>

            <header>s'inscrire</header>
            <form action="" method="post">
                <div class="field input">
                    <label for="nom">nom</label>
                    <input type="text" name="nom" id="nom" autocomplete="off" required>
                </div>
                <div class="field input">
                    <label for="prenom">prenom</label>
                    <input type="text" name="prenom" id="prenom" autocomplete="off" required>
                </div>


                <div class="field input">
                    <label for="matricule">matricule</label>
                    <input type="number" name="matricule" id="matricule" autocomplete="off" required>
                </div>
                <div class="field input">
                    <label for="adresse">adresse</label>
                    <input type="text" name="adresse" id="adresse" autocomplete="off" required>
                </div>
                <div class="field input">
                    <label for="numero_de_telephone">numero_de_telephone</label>
                    <input type="number" name="numero_de_telephone" id="mumero_de_telephone" autocomplete="off" required>
                </div>
                <div class="field input">
                    <label for="password">Password</label>
                    <input type="password" name="mot_de_passe" id="mot_de_passe" autocomplete="off" required>
                </div>

                <div class="field">
                    
                    <input type="submit" class="btn" name="submit" value="Register" required >
                </div>
                <div class="links">
                Déjà membre? <a href="index.php">Se connecter</a>
                </div>
            </form>
        </div>
        
      </div>
</body>
</html>