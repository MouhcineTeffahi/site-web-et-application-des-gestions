<?php
require'../../web/connexion.php';
if (isset($_POST['submit'])) {
	$file = $_FILES['file']['name'];
	$file_tmp = $_FILES['file']['tmp_name'];
	$errors = array();
		if(!empty($file_tmp)){
			$image = explode('.',$file);
			$image_ext = end($image);
			if(in_array(strtolower($image_ext),array('jpg','png','jpeg','gif')) === false){
				$errors[]="Veuillez saisir une image";
			}
		}
		if(empty($errors)){
			//la fonction
			$categorie = $_POST['categorie'];
			move_uploaded_file($file_tmp, "../../img/".$file);
			$image_stat=1;
		}
		else{
			foreach ($errors as $error) {
				echo $error;
			}
		}
}

if (isset($_POST['submit'])) {
	$thumb = $_FILES['thumb']['name'];
	$thumb_tmp = $_FILES['thumb']['tmp_name'];
	$errors_thumb = array();
		if(!empty($thumb_tmp)){
			$image_thumb = explode('.',$thumb);
			$image_ext_thumb = end($image_thumb);
			if(in_array(strtolower($image_ext_thumb),array('jpg','png','jpeg','gif')) === false){
				$errors_thumb[]="Veuillez saisir une image";
			}
		}
		if(empty($errors_thumb)){
			//la fonction
			$categorie = $_POST['categorie'];
			move_uploaded_file($thumb_tmp, "../../img/".$file);
			$thumb_stat=1;
			?><script>alert('hna');</script><?php
		}
		else{
			foreach ($errors_thumb as $error_thumb) {
				echo $error_thumb;
			}
		}
}
if ($thumb_stat = 1 AND $image_stat = 1) {
	$reponse=$bdd->exec('INSERT INTO `galerie`(`categorie`, `image`, `image_miniature`) VALUES ($categorie,$image,$thumb)');
	echo"Votre image a bien été Uploader";
}
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Administration gallery</title>
	<link href="../../bower_components/bootstrap/dist/css/bootstrap.css" rel="stylesheet">
    <link href="../../font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="../../css/style.css" type="text/css">
    <link rel="stylesheet" href="../../css/hover-min.css">
</head>
<body>
<div class="container">
	<div class="row">
		<div class="col-md-12">
			<h4 class="text-center">Uploader votre photo:</h4>
			<div class="form-group">
			<form method="post" action="gallery.php" enctype="multipart/form-data">
				<div class="form-group">
				<label for="thumb">Entrer votre photo Miniature: (taille 170px x 117)</label><input type="file" name="thumb" class="form-control" id="thumb" placeholder="Entrer votre photo">
				</div>
				<div class="form-group">
				<label for="file">Entrer votre photo:</label><input type="file" name="file" class="form-control" id="file" placeholder="Entrer votre photo">
				</div>
				<div class="form-group">
				  <label for="sel1">Selectionner une catégorie:</label>
				  <select class="form-control" id="sel1" name="categorie">
				    <option>Primaire</option>
				    <option>collège</option>
				    <option>lycée</option>
				  </select>
				</div>
				<div class="form-group">
				<input type="submit" name="submit" class="btn btn-info  hvr-bounce-to-bottom marge_width_btn pull-right submitform">
				</div>
			</form>
		</div>	
	</div>
</div>
</body>
</html>