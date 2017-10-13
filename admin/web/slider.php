<?php
session_start();

if(!(isset($_SESSION['admin'])))
{
  header("location:index.php");
}
require'../../web/connexion.php';
//supprimer
	if (isset($_GET['delete'])) {
		$delete = $_GET['delete'];
	    $bdd->exec("DELETE FROM `slider` WHERE `id_slider` = $delete");
	    header('location:slider.php');
	}

 ?>

<?php


function chercherid($bdd)
{
	$requete=$bdd->query("SELECT * FROM `slider` ORDER BY `id_slider` DESC LIMIT 1");
	$data=$requete->fetch();
	$id_next= $data['id_slider'] + 1;
	return $id_next;
}
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Administration omar farouk - slider</title>
	<link href="../../bower_components/bootstrap/dist/css/bootstrap.css" rel="stylesheet">
    <link href="../../font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="../../css/style.css" type="text/css">
    <link rel="stylesheet" href="../../css/hover-min.css">
    <link href="../../css/lightbox.css" rel="stylesheet">
    <link href="../../font-awesome/css/font-awesome.css" rel="stylesheet" type="text/css">
</head>

<body>
<?php

//ajouter
	if (isset($_POST['submitedit'])) {
			$categorie = $_POST['categorie'];
			$dossier = '../../img/';
			$fichier = basename($_FILES['file']['name']);
			$taille_maxi = 1000000;
			$taille = filesize($_FILES['file']['tmp_name']);
			$extensions = array('.png', '.gif', '.jpg', '.jpeg');
			$extension = strrchr($_FILES['file']['name'], '.');
		//Début des vérifications de sécurité...
		if(!in_array($extension, $extensions)) //Si l'extension n'est pas dans le tableau
		{
		     $erreur = 'Vous devez uploader un fichier de type png, gif, jpg, jpeg, txt ou doc...';
		}
		if($taille>$taille_maxi)
		{
		     $erreur = 'Le fichier est trop gros...';
		}
		if(!isset($erreur)) //S'il n'y a pas d'erreur, on upload
		{
     //On formate le nom du fichier ici...
     $fichier = strtr($fichier, 
          'ÀÁÂÃÄÅÇÈÉÊËÌÍÎÏÒÓÔÕÖÙÚÛÜÝàáâãäåçèéêëìíîïðòóôõöùúûüýÿ', 
          'AAAAAACEEEEIIIIOOOOOUUUUYaaaaaaceeeeiiiioooooouuuuyy');
     $fichier = preg_replace('/([^.a-z0-9]+)/i', '-', $fichier);
     
     $id_next=chercherid($bdd);

     if(move_uploaded_file($_FILES['file']['tmp_name'], $dossier . $id_next . $fichier))  //Si la fonction renvoie TRUE, c'est que ça a fonctionné...
     {

     	$bdd->exec("INSERT INTO `slider`(`categorie`, `image`) VALUES ('$categorie','$id_next$fichier') ");

      	?>

      	<div class="alert alert-success" role="alert">Upload effectué avec succès !</div>

      	<?php
      	;
			
     }
     else //Sinon (la fonction renvoie FALSE).
     {
     	?>
          <div class="alert alert-danger" role="alert"><?php echo 'Echec de l\'upload !'; ?></div>
        <?php
     }
	   
	}
	else
	{
		?>
	    <div class="alert alert-danger" role="alert"><?php echo $erreur; ?></div>
	     <?php
	}
	// fin condition 1
	}

	//edit modifier
	elseif (isset($_GET['edit'])) {

		$edit=$_GET['edit'];
		//Upload systeme
		$requete2=$bdd->query("SELECT * FROM `slider` WHERE `id_slider` = $edit");
		$donnee=$requete2->fetch();
?>
<div class="container">
        <div class="row">
		<div class="col-md-12">
			<div class="panel panel-info">
			<div class="pull-right">
                 <a href="../menu.php"><i class="fa fa-arrow-circle-left espace_icon_modifier" aria-hidden="true"></i></a>
            </div>
			<div class="panel-heading">Uploader votre photo:</div>
			
			<div class="marg_panel">

<!--			 <img src="../../img/<?php //echo $donnee['image_miniature']; ?>" alt="" class="img-thumbnail img-gallery img-responsive preview" style="width:169px">-->
			<div class="form-group">
			<form method="post" action="slider.php" enctype="multipart/form-data">
                <img src="../../img/<?php echo $donnee['image']; ?>" class="img-thumbnail" alt="Cinque Terre" width="149" height="149">
				<hr>
				<div class="form-group">
				<label for="file">Entrer votre photo:</label><input type="file" name="file" class="form-control" id="file" placeholder="Entrer votre photo">
				</div>
				<hr>
				<div class="form-group">
				  <label for="sel1">Selectionner une catégorie:</label>
				  <select class="form-control" id="sel1" name="categorie">
				  <option><?php echo $donnee['categorie']; ?></option>
				    <option>grand_slider</option>
				    <option>petit_slider</option>
				    <option>partenaire</option>
				  </select>
				</div>
				<hr>
				<div class="form-group text-center">
				<input type="hidden" value="<?php echo $donnee['id_slider']; ?>" name="edit">
				
				<input type="submit" name="submit" class="btn btn-info  hvr-bounce-to-bottom marge_width_btn submitform text-right">
				
				</div>
				<div class="form-group">
					<input type="hidden" name="MAX_FILE_SIZE" value="100000">
				</div>

				</div>
			</form>
			</div>
			</div>
			</div>
			</div>
    </div>
        </div>
        <?php
       }
    //valider modifier
    elseif(isset($_POST['edit']))
    {
            $edit = $_POST['edit'];
			$dossier = '../../img/';
			$fichier = basename($_FILES['file']['name']);
			$taille_maxi = 1000000;
			$taille = filesize($_FILES['file']['tmp_name']);
			$extensions = array('.png', '.gif', '.jpg', '.jpeg');
			$extension = strrchr($_FILES['file']['name'], '.');
      		$categorie = $_POST['categorie'];
		//Début des vérifications de sécurité...
		if(!in_array($extension, $extensions)) //Si l'extension n'est pas dans le tableau
		{
		     $erreur = 'Vous devez uploader un fichier de type png, gif, jpg, jpeg, txt ou doc...';
		}
		if($taille>$taille_maxi)
		{
		     $erreur = 'Le fichier est trop gros...';
		}
		if(!isset($erreur)) //S'il n'y a pas d'erreur, on upload
		{
     //On formate le nom du fichier ici...
     $fichier = strtr($fichier, 
          'ÀÁÂÃÄÅÇÈÉÊËÌÍÎÏÒÓÔÕÖÙÚÛÜÝàáâãäåçèéêëìíîïðòóôõöùúûüýÿ', 
          'AAAAAACEEEEIIIIOOOOOUUUUYaaaaaaceeeeiiiioooooouuuuyy');
     $fichier = preg_replace('/([^.a-z0-9]+)/i', '-', $fichier);

         $req="UPDATE `slider` SET  `image`= '$fichier' WHERE `id_slider`= $edit";   
            
   
        if(isset($_FILES['file']))  //Si la fonction renvoie TRUE, c'est que ça a fonctionné...
        {
            	
    	move_uploaded_file($_FILES['file']['tmp_name'], $dossier .$fichier );
        $req.="";
           
            
			
     }
     
    
					
            
           // echo $req."<hr>";
	$bdd->exec($req);
            
     
	   
	}
        
    }
		


if(!(isset($_GET['edit'])))
{
    ?>
<!-- Affichage -->
	<div class="container">
        <div class="row">
		<div class="col-md-12">
			<div class="panel panel-info">
			<div class="pull-right">
                 <a href="../menu.php"><i class="fa fa-arrow-circle-left espace_icon_modifier" aria-hidden="true"></i></a>
                     </div>
			<div class="panel-heading">Uploader votre photo:</div>
			<div class="marg_panel">
			
			<div class="form-group">
			<form method="post" action="slider.php" enctype="multipart/form-data">

				<hr>
				<div class="form-group">
				<label for="file">Entrer votre photo:</label><input type="file" name="file" class="form-control" id="file" placeholder="Entrer votre photo">
				</div>
				<hr>
				<div class="form-group">
				  <label for="sel1">Selectionner une catégorie:</label>
				  <select class="form-control" id="sel1" name="categorie">
				    <option>grand_slider</option>
				    <option>petit_slider</option>
				    <option>partenaire</option>
				  </select>
				</div>
				<hr>
				<div class="form-group text-center">
				<input type="submit" name="submitedit" class="btn btn-info  hvr-bounce-to-bottom marge_width_btn submitform text-right">
				
				</div>
				<div class="form-group">
					<input type="hidden" name="MAX_FILE_SIZE" value="100000">
				</div>

				</div>
			</form>
			</div>
			</div>
			</div>
        </div>
  
         <?php
        if(isset($_GET['supprimer'])){
            $supprimer=$_GET['supprimer'];
            $bdd->exec("DELETE FROM `slider` WHERE `id_slider`=$supprimer");
            header('location:slider.php');
           
        }
    
}
        
        ?>
         <!--slider-->
        <div class="container">
        <div class="row">
    <div class="col-md-3">
        <div class="titre-sidebar-right violet">
                        <h4 class="text_bar_right2">Grand slider</h4>
                    </div>
    <?php


    $requete=$bdd->query("SELECT * FROM `slider` WHERE `categorie` = 'grand_slider' ORDER BY `id_slider` LIMIT 1");
            while ($data=$requete->fetch()) {
                ?>
               
      <img src="../../img/<?php echo $data['image']; ?>" alt="..." class="sliderwidth">
        <button type="button" class="btn btn-danger color_supprimer"><a href="slider.php?supprimer=<?php
                                      echo $data['id_slider'];?>" onclick="return(confirm('Etes-vous sûr de vouloir supprimer cette image ?'))">supprimer</a></button>
                        <button type="button" class="btn btn-success color_supprimer"><a href="slider.php?edit=<?php
                        echo $data['id_slider'];?>">modifier</a></button>
      
  
        <p class="width_para_slider_1">
          </p>
      
    
            <?php
            }
    $requete=$bdd->query("SELECT * FROM `slider` WHERE `categorie` = 'grand_slider' ORDER BY `id_slider` LIMIT 1,8");
            while ($data=$requete->fetch()) {
       ?>

           
       
      <img src="../../img/<?php echo $data['image']; ?>" alt="..." class="sliderwidth">
        <button type="button" class="btn btn-danger color_supprimer"><a href="slider.php?supprimer=<?php
                                      echo $data['id_slider'];?>" onclick="return(confirm('Etes-vous sûr de vouloir supprimer cette image ?'))">supprimer</a></button>
                        <button type="button" class="btn btn-success color_supprimer"><a href="slider.php?edit=<?php
                                      echo $data['id_slider'];?>">modifier</a></button>
   
       <?php
                                    }
                                    ?>
    </div>
<div class="col-md-4 col-sm-12 col-md-push-1">
    <div class="titre-sidebar-right violet">
                        <h4 class="text_bar_right2">Petit slider</h4>
                    </div>
<?php


  
    $requete=$bdd->query("SELECT * FROM `slider` WHERE `categorie` = 'petit_slider'");
            while ($data=$requete->fetch()) {
       ?>
     
                       
                        
                                
                    
            
                <img src="../../img/<?php echo $data['image']; ?>" class="img-circle" alt="Cinque Terre" width="149" height="149">
    <button type="button" class="btn btn-danger color_supprimer"><a href="slider.php?supprimer=<?php
                                      echo $data['id_slider'];?>" onclick="return(confirm('Etes-vous sûr de vouloir supprimer cette image ?'))">supprimer</a></button>
                        <button type="button" class="btn btn-success color_supprimer"><a href="slider.php?edit=<?php
                                      echo $data['id_slider'];?>">modifier</a></button>
            
            
                                    <?php
                                    }
                                    ?>
            <a data-u="ad" href="http://www.jssor.com" style="display:none">jQuery Slider</a>
    </div>

    <!--fin slider-->
                    <div class="col-md-3 col-md-push-2 col-sm-12">
                    <div class="titre-sidebar-right violet">
                        <h4 class="text_bar_right2">Partenaires</h4>
                    </div>
                    
                
                
                <?php
             
                

                  
          
            $requete=$bdd->query("SELECT * FROM `slider` WHERE `categorie` = 'partenaire'");
            while ($data=$requete->fetch()) {
       ?>   
               
               
                        
  <div class="gallery-cell"> <img src="../../img/<?php echo $data['image']?>"></div>
                        <button type="button" class="btn btn-danger color_supprimer marge_button_slider"><a href="slider.php?supprimer=<?php
                                      echo $data['id_slider'];?>" onclick="return(confirm('Etes-vous sûr de vouloir supprimer cette image ?'))">supprimer</a></button>
                        <button type="button" class="btn btn-success color_supprimer marge_button_slider"><a href="slider.php?edit=<?php
                                      echo $data['id_slider'];?>">modifier</a></button>
                        
                        
                    
                
                <?php
                   }
               
                ?>
                  </div>
             </div>
            </div>
             </div>
                       
    
        
        
    
   
		
		

	
    <!-- Bootstrap Core JavaScript -->
    <script src="../../bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
	<script src="../../js/lightbox.js"></script>
	<script type="text/javascript" src="../../js/script.js"></script>
        
</body>
</html>