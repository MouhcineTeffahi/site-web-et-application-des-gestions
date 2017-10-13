<?php
session_start();

if(isset($_GET['logout']))
{
unset($_SESSION['admin']);
session_destroy();

}

    require '../web/connexion.php'; 
      
      if(isset($_POST['submit']))
      {
          
          
        $login=$_POST['login'] ;
        $mp=$_POST['mp'] ;
        
          $reponse = $bdd->query("SELECT * FROM `administration` WHERE `login`='$login' and `mot_de_passe`='$mp'");
          // On affiche chaque entrée une à une
        if ($donnees = $reponse->fetch())
        {
            $_SESSION['admin']=$donnees['nom']." ".$donnees['prenom'];
            $reponse->closeCursor(); // Termine le traitement de la requête
           header('Location: menu.php');
        }
      }
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Administration</title>

    <!-- Bootstrap -->
       <link href="../bower_components/bootstrap/dist/css/bootstrap.css" rel="stylesheet">
        <link href="../font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="../css/style.css" type="text/css">


  </head>
  <body>
   <?php
         if(isset($_POST['submit']))
        {
           
          ?>
          <div class="alert alert-danger" role="alert">Erreur d'identification !!!</div>
            
              <?php
             
        }
        

      
    
     require "web/frm_identification.html";
      
      ?>
   
    
   
    
    
    
    
    

    <script src="http://code.jquery.com/jquery-1.11.0.min.js"></script>
      <!-- Bootstrap Core JavaScript -->
    <script src="../bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
  </body>
</html>