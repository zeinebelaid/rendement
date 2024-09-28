<?php 
   session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style/style.css">
    <title>connexion</title>
</head>
<body>
      <div class="container">
        <div class="box form-box">
            <?php 
             
              include("php/config.php");
              if(isset($_POST['submit'])){
                $matricule = mysqli_real_escape_string($con,$_POST['matricule']);
                $mot_de_passe = mysqli_real_escape_string($con,$_POST['mot_de_passe']);

                $result = mysqli_query($con,"SELECT * FROM employe WHERE matricule='$matricule' AND mot_de_passe='$mot_de_passe' ") or die("Select Error");
                $row = mysqli_fetch_assoc($result);

                if(is_array($row) && !empty($row)){
                    $_SESSION['valid'] = $row['matricule'];
                    $_SESSION['nom'] = $row['nom'];
					$_SESSION['prenom'] = $row['prenom'];
					$_SESSION['adresse'] = $row['adresse'];
                    $_SESSION['numero_de_telephone'] = $row['numero_de_telephone'];
                    $_SESSION['id'] = $row['Id'];
                }else{
                    echo "<div class='message'>
                      <p>Wrong nom or prenom or  mot_de_passe </p>
                       </div> <br>";
                   echo "<a href='index.php'><button class='btn'>Go Back</button>";
         
                }
                if(isset($_SESSION['valid'])){
                    header("Location: modele.php");
                }
              }else{

            
            ?>
            <header>Login</header>
            <form action="" method="post">
                <div class="field input">
                    <label for="matricule">matricule</label>
                    <input type="text" name="matricule" id="matricule" autocomplete="off" required>
                </div>

                <div class="field input">
                    <label for="mot_de_passe">mot_de_passe</label>
                    <input type="password" name="mot_de_passe" id="mot_de_passe" autocomplete="off" required>
                </div>

                <div class="field">
                    
                    <input type="submit" class="btn" name="submit" value="Login" required>
                </div>
                <div class="links">
                    Don't have account? <a href="registration.php">Sign Up Now</a>
                </div>
            </form>
        </div>
        <?php } ?>
      </div>
</body>
</html>