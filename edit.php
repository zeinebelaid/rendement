<?php 
   session_start();

   include("php/config.php");
   if(!isset($_SESSION['valid'])){
    header("Location: index.php");
   }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style/style.css">
    <title>Change Profile</title>
</head>
<body>
    <div class="nav">
        <div class="logo">
            <p><a href="home.php"> Logo</a></p>
        </div>

        <div class="right-links">
            <a href="#">Change Profile</a>
            <a href="php/logout.php"> <button class="btn">Log Out</button> </a>
        </div>
    </div>
    <div class="container">
        <div class="box form-box">
            <?php 
               if(isset($_POST['submit'])){
                $nom = $_POST['nom'];
                $prenom = $_POST['prenom'];
                $matricule = $_POST['matricule'];
                $adresse = $_POST['adresse'];
                $numero_de_telephone = $_POST['numero_de_telephone'];

                $id = $_SESSION['id'];

                $edit_query = mysqli_query($con,"UPDATE employe SET nom='$nom', prenom='$prenom', adresse='$adresse', numero_de_telephone='$numero_de_telephone' WHERE Id=$id ") or die("error occurred");

                if($edit_query){
                    echo "<div class='message'>
                    <p>mis à jour</p>
                </div> <br>";
              echo "<a href='home.php'><button class='btn'>Go Home</button>";
       
                }
               }else{

                $id = $_SESSION['id'];
                $query = mysqli_query($con,"SELECT*FROM employe WHERE Id=$id ");

                while($result = mysqli_fetch_assoc($query)){
                    $res_nom = $result['Username'];
                    $res_nom = $result['Username'];

                    $res_matricule = $result['matricule'];
                    $res_Age = $result['Age'];
                }

            ?>
            <header>Change Profile</header>
            <form action="" method="post">
                <div class="field input">
                    <label for="nom">nom</label>
                    <input type="text" name="nom" id="nom" value="<?php echo $res_nom; ?>" autocomplete="off" required>
                </div>
                <div class="field input">
                    <label for="prenom">prenom</label>
                    <input type="text" name="prenom" id="prenom" value="<?php echo $res_prenom; ?>" autocomplete="off" required>
                </div>

                <div class="field input">
                    <label for="adresse">adresse</label>
                    <input type="text" name="adresse" id="adresse" value="<?php echo $res_Email; ?>" autocomplete="off" required>
                </div>

                <div class="field input">
                    <label for="age">Age</label>
                    <input type="number" name="age" id="age" value="<?php echo $res_Age; ?>" autocomplete="off" required>
                </div>
                
                <div class="field">
                    
                    <input type="submit" class="btn" name="submit" value="Update" required>
                </div>
                
            </form>
        </div>
        <?php } ?>
      </div>
</body>
</html>