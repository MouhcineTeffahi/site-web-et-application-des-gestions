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
       <link href="../bower_components/bootstrap/dist/css/bootstrap.css" rel="stylesheet">
        <link href="../font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
       <link rel="stylesheet" href="../css/style.css" type="text/css">
       <link rel="stylesheet" href="../css/hover-min.css">


  </head>
  <body>
  
  <div class="container">
        <div class="row">
            <div class="col-md-2">
             </div>
             <div class="col-md-8">
             <h1>Administration Omar Alfarouk</h1>
             </div>
             <div class="col-md-2">
             </div>
        </div>
         <div class="row">
             <div class="col-md-2">
             </div>
             <div class="col-md-8">
             <div class="panel panel-info">
                      <div class="panel-heading">Menu d'administration</div>
                      <div class="panel-body">
                          <div class="row">
                              <div class="col-md-4 cl_menu">
                              <a href="web/articles.php">
                                  <button type="button" class="btn btn-info btn_admin hvr-grow-shadow hvr-bounce-to-top">Accueil</button></a>
                              </div>
                              <div class="col-md-4  cl_menu"><a href="web/gallery.php">
                              <button type="button" class="btn btn-info btn_admin hvr-grow-shadow hvr-grow-shadow hvr-bounce-to-top">Galerie</button></a>
                              </div>
                            
                              <div class="col-md-4  cl_menu"><a href="web/preinscreption.php">
                                  <button type="button" class="btn btn-info btn_admin hvr-grow-shadow hvr-grow-shadow hvr-bounce-to-top">Préinscription</button></a>
                              
                              </div>
                          </div>
                          <div class="row">
                              <div class="col-md-4 cl_menu"><a href="web/contact.php">
                                  <button type="button" class="btn btn-info btn_admin hvr-grow-shadow hvr-bounce-to-top">Contact</button></a>
                              </div>
                              <div class="col-md-4  cl_menu">
                              <button type="button" class="btn btn-info btn_admin hvr-grow-shadow hvr-bounce-to-top">Vie Scolaire</button>
                              </div>
                              <div class="col-md-4 cl_menu"><a href="web/slider.php">
                                  <button type="button" class="btn btn-info btn_admin hvr-grow-shadow hvr-bounce-to-top">Slider</button></a>
                              </div>
                              <div class="col-md-4 cl_menu"><a href="web/facebook.php">
                                  <button type="button" class="btn btn-info btn_admin hvr-grow-shadow hvr-bounce-to-top">Facebook</button></a>
                              </div>
                            
                              <div class="col-md-4  cl_menu">
                              <a href="index.php?logout"><button type="button" class="btn btn-danger btn_admin ">Déconnexion</button></a>
                              
                              </div>
                          </div>
                          
                              

                      </div>
                    </div>
             </div>
             <div class="col-md-2">
             </div>
         </div>
      </div>
    </body>
</html>