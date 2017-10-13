<?php
  if(isset($_POST['submit'])){
      require 'connexion.php'; 
      
            $nom=$_POST['nom'];
            $prenom= $_POST['prenom'];
            $telephone=$_POST['tel'];
            $email=$_POST['email'];
            $date_naissance=$_POST['ddn'];
            $lieu_naissance=$_POST['ldn'];
            $np_pere=$_POST['np-pere'];
            $np_mere=$_POST['np-mere'];
            $np_gerant=$_POST['np-gerant'];
            $cin_pere=$_POST['cin-pere'];
            $cin_mere=$_POST['cin-mere'];
            $cin_gerant=$_POST['cin-gerant'];
            $telephone_pere=$_POST['tel-pere'];
            $telephone_mere=$_POST['tel-mere'];
            $telephone_gerant=$_POST['tel-gerant'];
            $profession_pere=$_POST['pro-pere'];
            $profession_mere=$_POST['pro-mere'];
            $profession_gerant=$_POST['pro-gerant'];
            $lieu_travail_pere=$_POST['lieu-pere'];
            $lieu_travail_mere=$_POST['lieu-mere'];
            $lieu_travail_gerant=$_POST['lieu-gerant'];
            $domicile_actuel=$_POST['domicile'];
            $dernier_etablissement_freq=$_POST['etab'];
            
      $bdd->exec("INSERT INTO `preinscription`(`nom`, `prenom`, `telephone`, `email`, `date_naissance`, `lieu_naissance`, `nom_pere`, `nom_mere`, `nom_gerant`, `CIN_pere`, `CIN_mere`, `CIN_gerant`, `telephone_pere`, `telephone_mere`, `telephone_gerant`, `profession_pere`, `profession_mere`, `profession_gerant`, `lieu_travail_pere`, `lieu_travail_mere`, `lieu_travail_gerant`, `domicile_actuel`, `dernier_etablissement_freq`) VALUES('$nom', '$prenom', '$telephone', '$email', '$date_naissance', '$lieu_naissance', '$np_pere', '$np_mere', '$np_gerant', '$cin_pere', '$cin_mere', '$cin_gerant', '$telephone_pere', '$telephone_mere', '$telephone_gerant', '$profession_pere', '$profession_mere', '$profession_gerant', '$lieu_travail_pere', '$lieu_travail_mere', '$lieu_travail_gerant', '$domicile_actuel', '$dernier_etablissement_freq')");
      
        header('Location: ../index.php');
          }
else{
    echo"Makhdmtch";
}
?>
