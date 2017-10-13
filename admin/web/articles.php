<?php
session_start();

if(!(isset($_SESSION['admin'])))
{
  header("location:index.php");
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
    function chercherid($bdd)
{
	$requete=$bdd->query("SELECT * FROM `galerie` ORDER BY `id.galerie` DESC LIMIT 1");
	$data=$requete->fetch();
	$id_next= $data['id.galerie'] + 1;
	return $id_next;
}
   
   
      require'../../web/connexion.php';
      if (isset($_POST['submit']))
      {
          $titre=$_POST['titre'];
          $contenu=$_POST['contenu'];
          $page=$_POST['page'];
          
            if(empty($titre) or empty($contenu)) {
              $erreur='Empty titre or contenu';
            
 
          
        ?>
      <p class="bg-danger btn-lg"><?php echo $erreur; ?></p>
      <?php
                
            }
        
       else {
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
            $id_next=chercherid($bdd);
            $bdd->exec("INSERT INTO `articles`( `titre`, `contenu`,`image`,`page`) VALUES ('$titre','$contenu','$id_next$fichier','$page')");
           
           }
            
          
      
  }  

     // uplode photo
      

	
      ?>

      
    <div class="container">
        <div class="row">
             <div class="col-md-12">
                 <h1 class="text-center">Administration Omar Alfarouk</h1>
             <div class="panel panel-info ">
                 <div class="pull-right">
                 <a href="../menu.php"><i class="fa fa-arrow-circle-left espace_icon_modifier" aria-hidden="true"></i></a>
                     </div>
                      <div class="panel-heading">Articles</div>
                      <div class="panel-body">
    <div class="col-md-12 text-center">
                
                </div>
                    <div class="panel-body">
                       <div class="col-md-12">
                    <form name="sentMessage" id="contactForm" method="post" action="articles.php" class="espace_right_form" enctype="multipart/form-data" novalidate>
                        <div class="row">
                            <div class="col-md-12   escpace_input_contact">
                                <div class="form-group espace_form_group">
                                    
                                  <input type="text" class="form-control" class="fa fa-product-hunt" class="font_awd" name="titre" placeholder="Titre *" id="name" required data-validation-required-message="Please enter your name.">
                                    
                                    <p class="help-block text-danger"></p>
                                </div>
                                <div class="form-group espace_form_group">
                                    <input type="file" class="form-control" name="file" id="file">
                                    <p class="help-block text-danger"></p>
                                </div>
                                <div class="form-group">
          <label for="sel1">Selectionner une page:</label>
          <select class="form-control" id="sel1" name="page">
              <option>section</option>
              <option>bar_right</option>
              <option>bar_left</option>
            <option>accueil</option>
            <option>vie scolaire</option>
            <option>orientation</option>
          </select>
        </div>
                            </div>
                            <div class="col-md-12 escpace_input_contact">
                                <div class="form-group">
                                    <textarea class="form-control height_message_contact height_message_con" name="contenu" placeholder="Votre Texte *" id="message" required data-validation-required-message="Please enter a message."></textarea>
                                    <p class="help-block text-danger"></p>
                                </div>
                            </div>
                            <div class="clearfix"></div>
                            <div class="col-lg-12 text-center">
                                <div id="success"></div>
                                <div class="pull-right">
                                <button type="submit" class="btn btn-info  hvr-bounce-to-bottom marge_width_btn" name="submit" class="text-pull">Envoyer</button>
                                    </div>
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
        if(isset($_GET['supprimer'])){
            $supprimer=$_GET['supprimer'];
            $bdd->exec("DELETE FROM `articles` WHERE `id.article`=$supprimer");
           
        }
        ?>
        <div class="container">

        <!-- Marketing Icons Section -->
        <div class="row contenumargin">
            
            <!--aside left-->
            <div class="col-md-3">
                <?php
               
                $req = $bdd->query("SELECT * FROM `articles` WHERE `id.article` = 1");
                $data = $req->fetch();
                
       ?>
     
                       
                        
                            <!--<div class="panel panel-default">
                    <div class="panel-body centertext">
                        <div class="icon_plus">
                              <i class="fa fa-cogs"></i>
                        </div>
                        <h4 class="aside_left_2_h4"><?php echo $data['titre']?></h4>
                        <p class="aside_plus_para"><?php echo $data['contenu']?>
                               </p>
                        <button type="button" class="btn btn-danger color_supprimer"><a href="articles.php?supprimer=<?php
                                      echo $data['id.article'];?>" onclick="return(confirm('Etes-vous sûr de vouloir supprimer cette article ?'))">supprimer</a></button>
                        <button type="button" class="btn btn-success color_supprimer"><a href="modifier.php?modifier=<?php
                                      echo $data['id.article'];?>">modifier</a></button>
                    </div>
                </div>
                -->

                    <div class="panel panel-default">
                    <div class="panel-body text-center">
                        <div class="icon_plus">
                              <i class="fa fa-cogs"></i>
                        </div>
                        <h4 class="aside_left_2_h4"><?php echo $data['titre']?></h4>
                        <p class="font_color_p"><?php echo $data['contenu']?>
                        </p>
                        <button type="button" class="btn btn-success color_supprimer"><a href="modifier.php?modifier=<?php
                                      echo $data['id.article'];?>">modifier</a></button>
                    </div>
                </div>
                <?php
    $requete=$bdd->query("SELECT * FROM `articles` WHERE `page` = 'bar_left' LIMIT 1, 9999");
                $aside=true;
                
            while ($data=$requete->fetch()) {
                if($aside)
            
           {
            $aside=!$aside;
       ?>
     
                       
                        
                            <!--<div class="panel panel-default">
                    <div class="panel-body centertext">
                        <div class="icon_plus">
                              <i class="fa fa-cogs"></i>
                        </div>
                        <h4 class="aside_left_2_h4"><?php echo $data['titre']?></h4>
                        <p class="aside_plus_para"><?php echo $data['contenu']?>
                               </p>
                        <button type="button" class="btn btn-danger color_supprimer"><a href="articles.php?supprimer=<?php
                                      echo $data['id.article'];?>" onclick="return(confirm('Etes-vous sûr de vouloir supprimer cette article ?'))">supprimer</a></button>
                        <button type="button" class="btn btn-success color_supprimer"><a href="modifier.php?modifier=<?php
                                      echo $data['id.article'];?>">modifier</a></button>
                    </div>
                </div>
                -->

                
                <div class="panel panel-default">
                    <div class="titresidebar">
                        <img src="../../images/titrejaune.png" alt="widget" class="img-responsive titlewidget">
                        <h4 class="text_bar_left2"><?php echo $data['titre']?></h4>
                    </div>
                    <div class="panel-body text-center">
                        <img src="../../img/<?php echo $data['Image']; ?>" class="img-circle etudiant" alt="Cinque Terre">
                        <h4 class="aside_left_2_h4"></h4>
                        <p class="font_color_p"><?php echo $data['contenu']?>
                        </p>
                        <button type="button" class="btn btn-danger color_supprimer"><a href="articles.php?supprimer=<?php
                                      echo $data['id.article'];?>" onclick="return(confirm('Etes-vous sûr de vouloir supprimer cette article ?'))">supprimer</a></button>
                        <button type="button" class="btn btn-success color_supprimer"><a href="modifier.php?modifier=<?php
                                      echo $data['id.article'];?>">modifier</a></button>
                    </div>
                </div>
                <?php
            }
           
                

                  else 
                    {
            $aside=!$aside;
       ?>   
               
                  <div class="panel panel-default">
                    <div class="titresidebar">
                        <img src="../../images/titrejaune.png" alt="widget" class="img-responsive titlewidget">
                        <h4 class="text_bar_left2"><?php echo $data['titre']?></h4>
                    </div>
                    <div class="panel-body text-center">
                        <img src="../../img/<?php echo $data ['Image']?>" class="img-thumbnail" alt="Cinque Terre">
                        <h4 class="aside_left_2_h4"></h4>
                        <p class="font_color_p"><?php echo $data['contenu']?>
                        </p>
                        <button type="button" class="btn btn-danger color_supprimer"><a href="articles.php?supprimer=<?php
                                      echo $data['id.article'];?>" onclick="return(confirm('Etes-vous sûr de vouloir supprimer cette article ?'))">supprimer</a></button>
                        <button type="button" class="btn btn-success color_supprimer"><a href="modifier.php?modifier=<?php
                                      echo $data['id.article'];?>">modifier</a></button>
                    </div>
                </div>
                <?php
                   }
                }
                ?>

                
              
            </div>
            <!--FIN aside left-->
            
    
            <div class="col-md-6">
                <?php
        
        
               
         //section
    $reponse = $bdd->query("SELECT * FROM `articles` WHERE `page` = 'section'");
        
    $art=true;
     while ($data=$reponse->fetch()) 
     {
         
        if($art)
            
        {
            $art=!$art;

    ?>            
                <div class="panel panel-default">
                    <div class="titresidebar">
                        <img src="../../images/titrebleumarine.png" alt="widget" class="img-responsive titlewidget">
                        <h4 class="text_bar_left2"><?php echo $data['titre']; ?></h4>
                    </div>
                    <div class="panel-body">
                       <img src="../../img/<?php echo $data['Image']; ?>" class="img-thumbnail img-left" alt="Cinque Terre" width="199" height="208">
                        <p class="para_section">
                            <?php echo $data['contenu']; ?>

                        </p>
                        <button type="button" class="btn btn-danger color_supprimer"><a href="articles.php?supprimer=<?php
                                      echo $data['id.article'];?>" onclick="return(confirm('Etes-vous sûr de vouloir supprimer cette article ?'))">supprimer</a></button>
                        <button type="button" class="btn btn-success color_supprimer"><a href="modifier.php?modifier=<?php
                                      echo $data['id.article'];?>">modifier</a></button>
                    </div>
    
                            </div>
         
 
    
    <?php  
        }
         else
        {
            $art=!$art;
          ?>
                <div class="panel panel-default">
                    <div class="titresidebar">
                        <img src="../../images/titrebleumarine.png" alt="widget" class="img-responsive titlewidget">
                        <h4 class="text_bar_left2"><?php echo $data['titre']; ?></h4>
                    </div>
                    <div class="float_right_photo">
                              <img src="../../img/<?php echo $data['Image']; ?>" class="img-thumbnail img-right" alt="Cinque Terre" width="199" height="208">
                    </div>
                    <div class="panel-body">
<p class="para_sections"><?php echo $data['contenu']; ?>
                              

                               </p>
                         <button type="button" class="btn btn-danger color_supprimer"><a href="articles.php?supprimer=<?php
                                      echo $data['id.article'];?>">supprimer</a></button>
                        <button type="button" class="btn btn-success color_supprimer"><a href="modifier.php?modifier=<?php
                                      echo $data['id.article'];?>">modifier</a></button>
                    </div>
                 </div>
            
                       
                  
        
    <?php  
        }
   
}
        
?> 
              
             <!-- contenu-->
            </div>
            
            
            <div class="col-md-3">
                 <?php
               
   
    $requete=$bdd->query("SELECT * FROM `articles` WHERE `page` = 'bar_right'");
              
                
            while ($data=$requete->fetch()) {
                
       ?>
     
                       
                        
                         <div class="panel panel-default">
                    <div class="titre-sidebar-right">
                        <h4 class="text_bar_right2"><?php echo $data['titre']?></h4>
                    </div>
                    <div class="panel-body">
                       <img src="../../img/<?php echo $data['Image']?>" class="img-thumbnail" alt="Cinque Terre" width="304" height="236">
                        <p class="marge_para_s"><?php echo $data['contenu']?>
                        </p>
                        <button type="button" class="btn btn-danger color_supprimer"><a href="articles.php?supprimer=<?php
                                      echo $data['id.article'];?>" onclick="return(confirm('Etes-vous sûr de vouloir supprimer cette article ?'))">supprimer</a></button>
                        <button type="button" class="btn btn-success color_supprimer"><a href="modifier.php?modifier=<?php
                                      echo $data['id.article'];?>">modifier</a></button>
                    </div>
                </div>
                <?php
           
                }
                ?>
                      

            </div>
            
        <!-- /.row -->

        <!-- Footer -->
    </div>
    </div>
    <!-- container -->
                    
        
      

        
     <script src="http://code.jquery.com/jquery-1.11.0.min.js"></script>
    <script src="../../bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
    </body>
</html>