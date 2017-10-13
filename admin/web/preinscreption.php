<?php
session_start();

if(!(isset($_SESSION['admin'])))
{
  header("location:index.php");
}

require '../../web/connexion.php'; 

if(isset($_GET['delete'])){
    $delete=$_GET['delete'];
    $bdd->exec("DELETE FROM `preinscription` WHERE `id.preinscription` = $delete");
    header('location:preinscreption.php');
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
       <link href="../../bower_components/bootstrap/dist/css/bootstrap.css" rel="stylesheet">
        <link href="../../font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
       <link rel="stylesheet" href="../../css/style.css" type="text/css">
       <link rel="stylesheet" href="../../css/hover-min.css">


  </head>
  <body>


  <?php
      $reponse = $bdd->query("SELECT * FROM `preinscription` ");
         
      ?>
  <div class="container">
        <div class="row">
             <div class="col-md-12 text-center">
             <h1>Administration Omar Alfarouk</h1>
             </div>
        </div>
         <div class="row">
             <div class="col-md-12">
             <div class="panel panel-info ">
                     <div class="pull-right">
                 <a href="../menu.php"><i class="fa fa-arrow-circle-left espace_icon_modifier" aria-hidden="true"></i></a>
                     </div>
                      <div class="panel-heading">Preinscription</div>
                      <div class="panel-body">
                          <div class="row">
                          

                                
                             <?php
                              // On affiche chaque entrée une à une
                        while ($donnees = $reponse->fetch())
                        {
                              ?>
                               
                                 <table class="table table-hover"> 
                               <thead> 
                                       <tr> 
                                       <th>ID</th> 
                                       <th>Nom</th> 
                                       <th>Prenom</th> 
                                       <th>Téléphone</th>
                                       <th>Date de naissance</th>
                                       <th>Dernier etablissement frequenter</th> 
                                       </tr>
                                </thead>
                                 <tbody>
                                
                               
                                
                                      <tr data-toggle="modal" data-target="#myModal_<?php echo $donnees['id.preinscription'];?>">
                                      <td><?php echo $donnees['id.preinscription'];?></td>
                                       <td><?php echo $donnees['nom'];?></td>
                                      <td><?php echo $donnees['prenom'];?></td>
                                      <td><?php echo $donnees['telephone'];?></td>
                                      <td><?php echo $donnees['date_naissance'];?></td>
                                      <td><?php echo $donnees['dernier_etablissement_freq'];?></td>
                                      </tr> 
                                 </tbody>
                            </table>
                               <!-- Modalxxxxxxxxx -->
<div class="modal fade" id="myModal_<?php echo $donnees['id.preinscription'];?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Details <?php echo $donnees['nom'].' '.$donnees['prenom'];?></h4>
      </div>
      <div class="modal-body">
    <table class="table table-hover">    
        
         <tr> 
         <td>Nom:</td> 
          <td><?php echo $donnees['nom'];?></td>
       </tr>
        <tr> 
           <td>Prenom:</td> 
          <td><?php echo $donnees['prenom'];?></td>
           
           </tr>
        <tr> 
          
           <td>Téléphone:</td> 
            <td><?php echo $donnees['telephone'];?></td>
            
        </tr>
           
           <tr> 
          
           <td>Date de naissance:</td> 
            <td><?php echo $donnees['date_naissance'];?></td>
            
        </tr>
        <tr> 
          
           <td>Nom:</td> 
            <td><?php echo $donnees['lieu_naissance'];?></td>
            
        </tr>
         <tr> 
          
           <td>Nom de père :</td> 
            <td><?php echo $donnees['nom_pere'];?></td>
            
        </tr>
         <tr> 
          
           <td>Nom de mère:</td> 
            <td><?php echo $donnees['nom_mere'];?></td>
            
        </tr>
         <tr> 
          
           <td>Nom de gérant:</td> 
            <td><?php echo $donnees['nom_gerant'];?></td>
            
        </tr>
         <tr> 
          
           <td>CIN père:</td> 
            <td><?php echo $donnees['CIN_pere'];?></td>
            
        </tr>
         <tr> 
          
           <td>CIN mère:</td> 
            <td><?php echo $donnees['CIN_mere'];?></td>
            
        </tr>
         <tr> 
          
           <td>CIN gérant:</td> 
            <td><?php echo $donnees['CIN_gerant'];?></td>
            
        </tr>
         <tr> 
          
           <td>Téléphone père:</td> 
            <td><?php echo $donnees['telephone_pere'];?></td>
            
        </tr>
         <tr> 
          
           <td>Téléphone mère:</td> 
            <td><?php echo $donnees['telephone_mere'];?></td>
            
        </tr>
         <tr> 
          
           <td>Téléphone gérant:</td> 
            <td><?php echo $donnees['telephone_gerant'];?></td>
            
        </tr>
         <tr> 
          
           <td>profession père:</td> 
            <td><?php echo $donnees['profession_pere'];?></td>
            
        </tr>
        <tr> 
          
           <td>profession mère:</td> 
            <td><?php echo $donnees['profession_mere'];?></td>
            
        </tr>
        <tr> 
          
           <td>profession gérant:</td> 
            <td><?php echo $donnees['profession_gerant'];?></td>
            
        </tr>
        <tr> 
          
           <td>lieu de travail père:</td> 
            <td><?php echo $donnees['lieu_travail_pere'];?></td>
            
        </tr>
        <tr> 
          
           <td>lieu de travail mère:</td> 
            <td><?php echo $donnees['lieu_travail_mere'];?></td>
            
        </tr>
        <tr> 
          
           <td>lieu de travail gérant:</td> 
            <td><?php echo $donnees['lieu_travail_gerant'];?></td>
            
        </tr>
        <tr> 
          
           <td>Domicile actuel:</td> 
            <td><?php echo $donnees['domicile_actuel'];?></td>
            
        </tr>
        <tr> 
          
           <td>dernier établissement fréquenté:</td> 
            <td><?php echo $donnees['dernier_etablissement_freq'];?></td>
            
        </tr>
         
     </table>
      </div>
      <div class="modal-footer">
        <a href="preinscreption.php?delete=<?php echo $donnees['id.preinscription'];?>" onclick="return(confirm('Etes-vous sûr de vouloir le supprimer ?'))"><button type="button" class="btn btn-danger">Suprimmer la pre-inscription</button></a>
        
        <button type="button" class="btn btn-default" data-dismiss="modal">Fermer</button>
      </div>
    </div>
  </div>
</div>

                               
                               
                               
                               
                               
                               
                               
                                
                        <?php
                        }
                        ?>    
                         
                                        
                     </div>
                          

                      </div>
                    </div>
             </div>
         </div>
      </div>


    <script src="http://code.jquery.com/jquery-1.11.0.min.js"></script>
    <script src="../../bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
    </body>
</html>