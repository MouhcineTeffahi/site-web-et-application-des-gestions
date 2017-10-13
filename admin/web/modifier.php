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
	$requete=$bdd->query("SELECT * FROM `articles` ORDER BY `id.article` DESC LIMIT 1");
	$data=$requete->fetch();
	$id_next= $data['id.article'] + 1;
	return $id_next;
}
   
   
      require'../../web/connexion.php';
       if(isset($_GET['modifier'])){
           
            $modifier=$_GET['modifier'];
            
            $reponse = $bdd->query("SELECT * FROM `articles` WHERE `id.article`= $modifier");
           if($data=$reponse->fetch())
           {
               
               
      ?>

      
    <div class="container">
        <div class="row">
             <div class="col-md-12">
                 <h1 class="text-center">Administration Omar Alfarouk</h1>
             <div class="panel panel-info ">
                      <div class="panel-heading">Modifier</div>
                      <div class="panel-body">
    <div class="col-md-12 text-center">
                
                </div>
                    <div class="panel-body">
                       <div class="col-md-12">
                    <form name="sentMessage" id="contactForm" method="post" action="modifier.php" class="espace_right_form" novalidate enctype="multipart/form-data">
                        <div class="row">
                            <div class="col-md-12   escpace_input_contact">
                                <div class="form-group espace_form_group">
                                    <input type="hidden" value="<?php echo $data['id.article']?>" name="ref_article" id="ref_article">
                                  <input type="text" class="form-control" class="fa fa-product-hunt" class="font_awd" name="titre" placeholder="Titre *" id="name" required data-validation-required-message="Please enter your name."
                                         value="<?php echo $data['titre']?>">
                                    
                                    <p class="help-block text-danger"></p>
                                </div>
                                <div class="form-group espace_form_group">
                                    <input type="file" class="form-control" name="file" placeholder="Votre Email *" id="email" required data-validation-required-message="Please enter your email address.">
                                    <p class="help-block text-danger"></p>
                                </div>
                                <div class="form-group">
          <label for="sel1">Selectionner une page:</label>
          <select class="form-control" id="sel1" name="page">
            <option>accueil</option>
            <option>vie scolaire</option>
            <option>orientation</option>
          </select>
        </div>
                            </div>
                            <div class="col-md-12 escpace_input_contact">
                                <div class="form-group">
                                    <textarea class="form-control height_message_contact height_message_con" name="contenu" placeholder="Votre Texte *" id="message" required data-validation-required-message="Please enter a message." ><?php echo $data['contenu']?></textarea>
                                    <p class="help-block text-danger"></p>
                                </div>
                            </div>
                            <div class="clearfix"></div>
                            <div class="col-lg-12 text-center">
                                <div id="success"></div>
                                <div class="pull-right">
                                <button type="submit" class="btn btn-success  hvr-bounce-to-bottom marge_width_btn" name="submit" class="text-pull">enregistrer</button>
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
               
               
           }
          
   }
    
     // $reponse = $bdd->query("SELECT * FROM `articles`");
             

           if (isset($_POST['submit']))
      {
            $ref_article=$_POST['ref_article'];
            $titre=$_POST['titre'];
            $contenu=$_POST['contenu'];


            $bdd->exec("UPDATE `articles` SET `titre`='$titre',`contenu`='$contenu' WHERE `id.article`=$ref_article");
            
            
            $edit = $_POST['ref_article'];
			$dossier = '../../img/';
			$fichier = basename($_FILES['file']['name']);
			$taille_maxi = 1000000;
			$taille = filesize($_FILES['file']['tmp_name']);
			$extensions = array('.png', '.gif', '.jpg', '.jpeg');
			$extension = strrchr($_FILES['file']['name'], '.');
      		$categorie = $_POST['page'];
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
         $req="UPDATE `articles` SET  `Image`= '$id_next$fichier' WHERE `id.article`= $edit";   
            
            
        if(isset($_FILES['file']))  //Si la fonction renvoie TRUE, c'est que ça a fonctionné...
        {
            	
    	move_uploaded_file($_FILES['file']['tmp_name'], $dossier . $id_next . $fichier );
        $req.="";
           

			
     }
     
    
					
            //pour les tests
           // echo $req."<hr>";
	$bdd->exec($req);
            
        
    
	}
     header("location:articles.php");       
    }  
        
        
        ?>

    
    
     <script src="http://code.jquery.com/jquery-1.11.0.min.js"></script>
    <script src="../../bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
        
    </body>
</html>