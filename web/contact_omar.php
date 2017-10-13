<?php
/*if (empty($_POST['name'])) 
    empty($_POST['email'])
    empty($_POST['tel'])
    empty($_POST['message']) {
   	require 'connexion.php'; 
   	echo "Aucun argument";
   	return false;
   }*/
   if (isset($_POST['submit'])) {
   	require"connexion.php";

   
$name = $_POST['name'];
$email = $_POST['email'];
$tel = $_POST['tel'];
$message = $_POST['message'];


$bdd->exec("INSERT INTO `contact`(`name`, `email`, `tel`, `message`) VALUES ('$name','$email','$tel','$message')");
  header('Location: ../index.php');
}
else {
	echo "Aucun argument";
}
?>