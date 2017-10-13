<?php
session_start();

if(!(isset($_SESSION['admin'])))
{
  header("location:index.php");
}



require '../../web/connexion.php'; 

if(isset($_GET['delete'])){
    $delete=$_GET['delete'];
    $bdd->exec("DELETE FROM `contact` WHERE `id_contact` = $delete");
    header('location:contact.php');
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
  $reponse = $bdd->query("SELECT * FROM `contact` ");
  ?>
  	<div class="container">
   	<div class="row">
             <div class="col-md-12">
                 <h1 class="text-center">Administration Omar Alfarouk</h1>
             <div class="panel panel-info ">
                 <div class="pull-right">
                 <a href="../menu.php"><i class="fa fa-arrow-circle-left espace_icon_modifier" aria-hidden="true"></i></a>
                     </div>
                      <div class="panel-heading">contact</div>
                      <div class="panel-body">
                          <div class="row">
  
  	<?php
   while ($donnees = $reponse->fetch()){
   	?>
   				<table class="table"> 
   			
                               <thead> 
                                       <tr> 
                                       <th>id</th> 
                                       <th>Nom</th> 
                                       <th>email</th> 
                                       <th>Téléphone</th>
                                       
                                       
                                       </tr>
                                </thead>
                                 <tbody>
                                
                                      <tr class=" color_table_con">
                                      	<td><?php echo $donnees['id_contact'];?></td>
                                       <td><?php echo $donnees['name'];?></td>
                                      <td><?php echo $donnees['email'];?></td>
                                      <td><?php echo $donnees['tel'];?></td>
                                      
                                      <td class="taille_div_con">
                                      	<button type="button" class="btn btn-success pull-right botton_espace_con" data-toggle="modal" data-target="#myModal_<?php echo $donnees['id_contact'];?>">
										  Affiche le message
										</button>
                                      </td>
                                      
                                      <td class="taille_div_con">
                                      	 <button type="button" class="btn btn-danger color_supprimer"><a href="contact.php?delete=<?php
                                      echo $donnees['id_contact'];?>" onclick="return(confirm('Etes-vous sûr de vouloir le supprimer ?'))">supprimer</a></button>
                                     
                                      </td>
                                      </tr> 
                                 </tbody>
  
 
                      </table>

<!-- Modal -->
<div class="modal fade" id="myModal_<?php echo $donnees['id_contact'];?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content modal_contact_hidden">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel"><?php echo $donnees['name'];?></h4>
      </div>
      <div class="modal-body">
         <table class="table table-hover">   
         <tr> 
          
           <td><strong>Message:</strong></td> 
            <td class="taille_message"><?php echo $donnees['message'];?></td>
        </td>
     </table>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
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