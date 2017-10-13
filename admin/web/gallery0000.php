
<?php
require'../../web/connexion.php';
	$requete=$bdd->query("SELECT * FROM `galerie` ORDER BY `id.galerie` DESC LIMIT 1");
	$data=$requete->fetch();
	$id_next= $data['id.galerie'] + 1;

?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Administration omar farouk - Galerie</title>
	<link href="../../bower_components/bootstrap/dist/css/bootstrap.css" rel="stylesheet">
    <link href="../../font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="../../css/style.css" type="text/css">
    <link rel="stylesheet" href="../../css/hover-min.css">
    <link href="../../css/lightbox.css" rel="stylesheet">
    <link href="../../font-awesome/css/font-awesome.css" rel="stylesheet" type="text/css">
</head>

<body>
<?php
	if (isset($_GET['delete'])) {
		$delete = $_GET['delete'];
	    $bdd->exec("DELETE FROM `galerie` WHERE `id.galerie` = $delete");
	    header('location:gallery.php');
	}
	elseif (!isset($_GET['edit'])) .{
		if (isset($_POST['submitedit'])) {
			$categorie = $_POST['categorie'];

			

			$dossier = '../../img/';
			$fichier = basename($_FILES['file']['name']);
			$fichier2 = basename($_FILES['thumb']['name']);
			$taille_maxi = 1000000;
			$taille = filesize($_FILES['file']['tmp_name']);
			$taille2 = filesize($_FILES['thumb']['tmp_name']);
			$extensions = array('.png', '.gif', '.jpg', '.jpeg');
			$extension = strrchr($_FILES['file']['name'], '.');
			$extension2 = strrchr($_FILES['thumb']['name'], '.');
		//Début des vérifications de sécurité...
		if(!in_array($extension, $extensions)&&!in_array($extension2, $extensions)) //Si l'extension n'est pas dans le tableau
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

     $fichier2 = strtr($fichier2, 
          'ÀÁÂÃÄÅÇÈÉÊËÌÍÎÏÒÓÔÕÖÙÚÛÜÝàáâãäåçèéêëìíîïðòóôõöùúûüýÿ', 
          'AAAAAACEEEEIIIIOOOOOUUUUYaaaaaaceeeeiiiioooooouuuuyy');
     $fichier2 = preg_replace('/([^.a-z0-9]+)/i', '-', $fichier2);
     
     if(move_uploaded_file($_FILES['file']['tmp_name'], $dossier . $id_next . $fichier) && move_uploaded_file($_FILES['thumb']['tmp_name'], $dossier . $id_next . $fichier2))  //Si la fonction renvoie TRUE, c'est que ça a fonctionné...
     {
     	$bdd->exec("INSERT INTO `galerie`(`categorie`, `image`, `image_miniature`) VALUES ('$categorie','$id_next$fichier','$id_next$fichier2') ");

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
?>

<!-- Affichage -->
	<div class="container">
        <div class="row">
		<div class="col-md-12">
			<div class="panel panel-primary">
			<div class="panel-heading">Uploader votre photo:</div>
			<div class="marg_panel">
			
			<div class="form-group">
			<form method="post" action="gallery.php" enctype="multipart/form-data">

				<hr>
				<div class="form-group">
				<label for="thumb">Entrer votre photo Miniature: (taille 170px x 117)</label><input type="file" name="thumb" class="form-control" id="thumb" placeholder="Entrer votre photo">
				</div>
				<hr>
				<div class="form-group">
				<label for="file">Entrer votre photo:</label><input type="file" name="file" class="form-control" id="file" placeholder="Entrer votre photo">
				</div>
				<hr>
				<div class="form-group">
				  <label for="sel1">Selectionner une catégorie:</label>
				  <select class="form-control" id="sel1" name="categorie">
				    <option>Primaire</option>
				    <option>College</option>
				    <option>Lycee</option>
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

			<div class="col-md-12">
			
					
					<?php
						$requete=$bdd->query("SELECT * FROM `galerie` WHERE `categorie`= 'Primaire'  ORDER BY `id.galerie` DESC");
						?>
						<div class="col-md-4">
						<div class="panel panel-primary">
				    <div class="panel-heading">Primaire</div>
				        <div class="panel-body" style="padding:5px">
						<?php
						while($data=$requete->fetch()){
							?>
							<div class="primaire" data-myorder="1">
                                
                                <img src="../../img/<?php echo $data['image_miniature']; ?>" alt="" class="img-thumbnail img-gallery img-responsive" style="width:169px">
                                <a href="gallery.php?edit=<?php echo $data['id.galerie']; ?>" class="item">
                                <i class="fa fa-pencil" aria-hidden="true"></i>
                               </a>
                                <a href="gallery.php?delete=<?php echo $data['id.galerie']; ?>" class="item" onclick="return(confirm('Etes-vous sûr de vouloir supprimer cette photo ?'))">
                                <i class="fa fa-minus-circle" aria-hidden="true"></i>
                               </a>
                            </div>
							<?php
						}
                            ?>            
                            </div>
                         </div>
					</div>
					<?php
						$requete=$bdd->query("SELECT * FROM `galerie` WHERE `categorie`= 'College'  ORDER BY `id.galerie` DESC");
						?>
						<div class="col-md-4">
						<div class="panel panel-primary">
				            <div class="panel-heading">Collège</div>
				            <div class="panel-body" style="padding:5px">
						<?php
						while($data=$requete->fetch()){
							?>
							<div class="primaire" data-myorder="1">
                                
                                <img src="../../img/<?php echo $data['image_miniature']; ?>" alt="" class="img-thumbnail img-gallery img-responsive" style="width:169px">
                                <a href="gallery.php?edit=<?php echo $data['id.galerie']; ?>" class="item">
                                <i class="fa fa-pencil" aria-hidden="true"></i>
                               </a>
                                <a href="gallery.php?delete=<?php echo $data['id.galerie']; ?>" class="item" onclick="return(confirm('Etes-vous sûr de vouloir supprimer cette photo ?'))">
                                <i class="fa fa-minus-circle" aria-hidden="true"></i>
                               </a>
                            </div>
							<?php
						}
                                ?>            
                                </div>
                            </div>
					</div>
					<?php
						$requete=$bdd->query("SELECT * FROM `galerie` WHERE `categorie`= 'Lycee'  ORDER BY `id.galerie` DESC");
						?>
						<div class="col-md-4">
						<div class="panel panel-primary">
				            <div class="panel-heading">Lycée</div>
				            <div class="panel-body" style="padding:5px">
						<?php
						while($data=$requete->fetch()){
							?>
							<div class="primaire" data-myorder="1">
                                <div>
                                
                                <a href="#" data-lightbox="roadtrip" class="hover-image"><img src="../../img/<?php echo $data['image_miniature']; ?>" alt="" class="img-thumbnail img-gallery img-responsive opacity-img" style="width:169px"></a >
                                <a href="gallery.php?delete=<?php echo $data['id.galerie']; ?>" class="item" onclick="return(confirm('Etes-vous sûr de vouloir supprimer cette photo ?'))">
                                <i class="fa fa-minus-circle" aria-hidden="true"></i>
                               </a>
                               <a href="gallery.php?edit=<?php echo $data['id.galerie']; ?>" class="item">
                                <i class="fa fa-pencil" aria-hidden="true"></i>
                               </a>
                                </div>
                            </div>
							<?php
						}
                                ?>            
                                </div>
                            </div>
					</div>


					
			
		</div>
		<?php
			}
			else{
		$edit=$_GET['edit'];
		//Upload systeme
		$requete2=$bdd->query("SELECT * FROM `galerie` WHERE `id.galerie` = $edit");
		$donnee=$requete2->fetch();
			
		if(isset($_GET['sumbit'])){
		$edit = $_POST['edit'];
			$dossier = '../../img/';
			$fichier = basename($_FILES['file']['name']);
			$fichier2 = basename($_FILES['thumb']['name']);
			$taille_maxi = 1000000;
			$taille = filesize($_FILES['file']['tmp_name']);
			$taille2 = filesize($_FILES['thumb']['tmp_name']);
			$extensions = array('.png', '.gif', '.jpg', '.jpeg');
			$extension = strrchr($_FILES['file']['name'], '.');
			$extension2 = strrchr($_FILES['thumb']['name'], '.');
		//Début des vérifications de sécurité...
		if(!in_array($extension, $extensions)&&!in_array($extension2, $extensions)) //Si l'extension n'est pas dans le tableau
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

     $fichier2 = strtr($fichier2, 
          'ÀÁÂÃÄÅÇÈÉÊËÌÍÎÏÒÓÔÕÖÙÚÛÜÝàáâãäåçèéêëìíîïðòóôõöùúûüýÿ', 
          'AAAAAACEEEEIIIIOOOOOUUUUYaaaaaaceeeeiiiioooooouuuuyy');
     $fichier2 = preg_replace('/([^.a-z0-9]+)/i', '-', $fichier2);
     
     if(isset($_FILES['thumb'])){
     	move_uploaded_file($_FILES['file']['tmp_name'], $dossier . $id_next . $fichier);
		$image_miniature= $donnee['image_miniature'];
		$requete=$bdd->exec("UPDATE `galerie` SET `image_miniature`= '$image_miniature' WHERE `id.galerie`= $edit");
		echo 'Votre miniature a été mise a jour';
     }
     elseif(isset($_FILES['file']))  //Si la fonction renvoie TRUE, c'est que ça a fonctionné...
    {
    	move_uploaded_file($_FILES['thumb']['tmp_name'], $dossier . $id_next . $fichier2);
     	$image= $donnee['image'];
		$requete=$bdd->exec("UPDATE `galerie` SET `image`= '$image' WHERE `id.galerie`= $edit");
		echo 'Votre image a été mise a jour';
			
    }
     elseif (isset($_POST['categorie'])) {
						$categorie= $donnee['categorie'];
						$requete=$bdd->exec("UPDATE `galerie` SET `categorie`= '$categorie' WHERE `id.galerie`= $edit");
						echo 'Votre categorie a été mise a jour';
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

				

				?>
					<div class="container">
        <div class="row">
		<div class="col-md-12">
			<div class="panel panel-primary">
			<div class="panel-heading">Uploader votre photo:</div>
			
			<div class="marg_panel">

			 <img src="../../img/<?php echo $donnee['image_miniature']; ?>" alt="" class="img-thumbnail img-gallery img-responsive preview" style="width:169px">
			<div class="form-group">
			<form method="post" action="gallery.php" enctype="multipart/form-data">
				<hr>
				<div class="form-group">
				<label for="thumb">Entrer votre photo Miniature: (taille 170px x 117)</label><input type="file" name="thumb" class="form-control" id="thumb" placeholder="Entrer votre photo">
				</div>
				<hr>
				<div class="form-group">
				<label for="file">Entrer votre photo:</label><input type="file" name="file" class="form-control" id="file" placeholder="Entrer votre photo">
				</div>
				<hr>
				<div class="form-group">
				  <label for="sel1">Selectionner une catégorie:</label>
				  <select class="form-control" id="sel1" name="categorie">
				  <option><?php echo $donnee['categorie']; ?></option>
				    <option>Primaire</option>
				    <option>College</option>
				    <option>Lycee</option>
				  </select>
				</div>
				<hr>
				<div class="form-group text-center">
				<input type="hidden" value="<?php echo $donnee['id.galerie']; ?>" name="edit">
				
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
				<?php
			}
		?>
		
		

	
    <!-- Bootstrap Core JavaScript -->
    <script src="../../bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
	<script src="../../js/lightbox.js"></script>
	<script type="text/javascript" src="../../js/script.js"></script>
        </div>
    </div>
</body>
</html>