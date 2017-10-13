<?php 
session_start();
require'web/connexion.php'; 
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" ent="IE=edge">
    <meta name="viewport" ent="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Omar El Farouk</title>

    <!-- Bootstrap Core CSS -->

    <link href="bower_components/bootstrap/dist/css/bootstrap.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/modern-business.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="css/style.css" type="text/css">
    <link href="css/hover-min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/flickity.min.css" media="screen">
    <link href="css/lightbox.css" rel="stylesheet">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>
        
    

    <!-- Navigation -->
    <nav class="navbar navbar-default bgnav" role="navigation">
        <div class="container">
             <div>
                <form class="navbar-form navbar-right respo_form_login">
            <div class="form-group">
              <strong class="text_lable">login :  </strong><input type="text" placeholder="Email" class="form-control width_input">
            </div>
            <div class="form-group">
                <strong class="text_lable">Mot passe :  </strong><input type="password" placeholder="Password" class="form-control width_input">
            </div>
            <button type="submit" class="btn btn-info hvr-bounce-to-bottom btn_sign_in">SE CONNECTER</button>
          </form>
            </div>
            <!-- Brand and toggle get grouped for better mobile display -->
            <a class="navbar-brand logo" href="index.html"><img class="logo_marge" src="images/logo.png" alt="Logo"></a>
            <div class="navbar-header espace_mobile_header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" id="hide_bar">
                    
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                
          
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="col-md-12">
               <div class="collapse navbar-collapse espace_bottom_nav" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right menu text_weight_nav">
                    <li>
                        <a href="#"  class="hvr-sweep-to-bottom hvr-grow-shadow accueil">Accueil</a>
                    </li>
                    <li>
                        <a href="#" class="hvr-sweep-to-bottom hvr-grow-shadow hover_nav_2 galerie">Galerie</a>
                    </li>
                    <li>
                        <a href="#l" class="hvr-sweep-to-bottom hvr-grow-shadow hover_nav_3 viescolaire">Vie scolaire</a>
                    </li>
                    <li>
                        <a href="#" class="hvr-sweep-to-bottom hvr-grow-shadow hover_nav_4 orientation">Orientation</a>
                    </li>
                    <li>
                        <a href="#" class="hvr-sweep-to-bottom hvr-grow-shadow hover_nav_5 preinscription">Preinscription</a>
                    </li>
                    <li>
                        <a href="#" class="hvr-sweep-to-bottom hvr-grow-shadow hover_nav_6 contact">Contact</a>
                    </li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        </div>
        <!-- /.container -->
    </nav>

    <!-- Header Carousel -->
    
    
 <!--slider-->
    
    <header id="myCarousel" class="carousel slide">
        <!-- Indicators -->
        <ol class="carousel-indicators">
    <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
    <li data-target="#carousel-example-generic" data-slide-to="1"></li>
    <li data-target="#carousel-example-generic" data-slide-to="3"></li>
    <li data-target="#carousel-example-generic" data-slide-to="4"></li>
    <li data-target="#carousel-example-generic" data-slide-to="5"></li>
    <li data-target="#carousel-example-generic" data-slide-to="6"></li>
    <li data-target="#carousel-example-generic" data-slide-to="7"></li>
    <li data-target="#carousel-example-generic" data-slide-to="8"></li>
  </ol>

        <!-- Wrapper for slides -->
        <div class="carousel-inner">
    <?php


    $requete=$bdd->query("SELECT * FROM `slider` WHERE `categorie` = 'grand_slider' ORDER BY `id_slider` LIMIT 1");
            while ($data=$requete->fetch()) {
                ?>
                <div class="item active">
      <img src="img/<?php echo $data['image']; ?>" alt="..." class="sliderwidth">
      <div class="carousel-caption">
          <h1 class="slider_h1"></h1>
        <p class="width_para_slider_1">
          </p>
      </div>
    </div>
            <?php
            }
    $requete=$bdd->query("SELECT * FROM `slider` WHERE `categorie` = 'grand_slider' ORDER BY `id_slider` LIMIT 1,8");
            while ($data=$requete->fetch()) {
       ?>

           
            <div class="item">
      <img src="img/<?php echo $data['image']; ?>" alt="..." class="sliderwidth">
      <div class="carousel-caption">
        
      </div>
    </div>
        
         
         
        

        <!-- Controls -->
       
            
                                    <?php
                                    }
                                    ?>
            </div>
         <a class="left carousel-control" href="#myCarousel" data-slide="prev">
            <span class="icon-prev"></span>
        </a>
        <a class="right carousel-control" href="#myCarousel" data-slide="next">
            <span class="icon-next"></span>
        </a>
    </header>
    <!--fin slider-->

    <!-- Page Content -->
   <div class="container">

        <!-- Marketing Icons Section -->
        <div class="row contenumargin">
            
            <!--aside left-->
            <div class="col-md-3">
                <?php
               
   $req = $bdd->query("SELECT * FROM `articles` WHERE `id.article` = 1");
                $data = $req->fetch();
                
       ?>

                    
                    <div class="panel panel-default">
                    <div class="panel-body text-center">
                        <div class="icon_plus">
                              <i class="fa fa-cogs"></i>
                        </div>
                        <h4 class="aside_left_2_h4"><?php echo $data['titre']?></h4>
                        <p class="font_color_p"><?php echo $data['contenu']?>
                        </p>
                    </div>
                </div>
                <?php
    $requete=$bdd->query("SELECT * FROM `articles` WHERE `page` = 'bar_left' LIMIT 1,696969696");
                $aside=true;
              
                
            while ($data=$requete->fetch()) {
                if($aside)
            
           {
            $aside=!$aside;
                    
       ?>
      
               
                   
                
                  
                <div class="panel panel-default">
                    <div class="titresidebar">
                        <img src="images/titrejaune.png" alt="widget" class="img-responsive titlewidget">
                        <h4 class="text_bar_left2"><?php echo $data['titre']?></h4>
                    </div>
                    <div class="panel-body text-center">
                        <img src="img/<?php echo $data ['Image']?>" class="img-circle etudiant" alt="Cinque Terre">
                        <h4 class="aside_left_2_h4"></h4>
                        <p class="font_color_p"><?php echo $data['contenu']?>
                        </p>
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
                        <img src="images/titrejaune.png" alt="widget" class="img-responsive titlewidget">
                        <h4 class="text_bar_left2"><?php echo $data['titre']?></h4>
                    </div>
                    <div class="panel-body text-center">
                        <img src="img/<?php echo $data ['Image']?>" class="img-thumbnail" alt="Cinque Terre">
                        <h4 class="aside_left_2_h4"></h4>
                        <p class="font_color_p"><?php echo $data['contenu']?>
                        </p>
                    </div>
                </div>
              
                <?php
                   }
                }
                ?>

                <div class="panel panel-default">
                    <div class="titresidebar">
                        <img src="images/titrebleumarine.png" alt="widget" class="img-responsive titlewidget">
                        <h4 class="text_bar_left2">Application mobile</h4>
                    </div>
                    <div class="panel-body text-center">
                        <div class="marge_app">
                            <a href="#"><img src="img/aside_left/appstore.png" class="espace_app"></a>
                            <a href="#"><img src="img/aside_left/playstore.png" class="espace_app"></a>
                            <a href="#"><img src="img/aside_left/windowsphone.png" class="espace_app"></a>
                        </div>
                    </div>
                </div>
              
            </div>
            <!--FIN aside left-->
            
    
            <div class="col-md-6 madiv">
             <!-- contenu-->
            </div>
            
            
            <div class="col-md-3">
                 <?php
               
   
    $requete=$bdd->query("SELECT * FROM `articles` WHERE `page` = 'bar_right'");
                $aside=true;
                
            while ($data=$requete->fetch()) {
           
       ?>
     
                       
                        
                         <div class="panel panel-default">
                    <div class="titre-sidebar-right">
                        <h4 class="text_bar_right2"><?php echo $data['titre']?></h4>
                    </div>
                    <div class="panel-body">
                       <img src="img/<?php echo $data['Image']?>" class="img-thumbnail respo_img_right" alt="Cinque Terre" width="304" height="236">
                        <p class="marge_para_s"><?php echo $data['contenu']?>
                        </p>
                    </div>
                </div>
                <?php
              
            }
                
               ?>
                <div class="panel panel-default">
                    <div class="titre-sidebar-right violet">
                        <h4 class="text_bar_right2">Partenaires</h4>
                    </div>
                    <div class="panel-body">
                        <div class="gallery js-flickity" data-flickity-options='{ "autoPlay": true }'>
                
                
                <?php
             
                

                  
          
            $requete=$bdd->query("SELECT * FROM `slider` WHERE `categorie` = 'partenaire'");
            while ($data=$requete->fetch()) {
       ?>   
               
               
                        
  <div class="gallery-cell"> <img src="img/<?php echo $data['image']?>"></div>
                        
                        
                    
                
                <?php
                   }
               
                ?>
                    </div>
                        </div>
                                </div>
                
                        <div class="panel panel-default">
                    <div class="titre-sidebar-right vert">
                        <h4 class="text_bar_right2">Facebook widget</h4>
                    </div>
                    <div class="panel-body">
                        <img src="img/aside_right/facebook.jpg" class="img-thumbnail" alt="Cinque Terre" width="304" height="236">
                    </div>
                </div>

            </div>
            
        <!-- /.row -->

        <!-- Footer -->
    </div>
    </div>
    <!-- container -->
    <!--Footer-->

       <footer id="bg_footer">
          <div class="container">
              <div class="row">
                  <div class="col-md-4 col-sm-6">
                  <div class="col-md-6">
                      <div class="navigation_text">
                      <h4>Navigation Rapide</h4>
                      <ul>
                              <a href="#" class="accueil"><li>Accueil</li></a>
                              <a href="#" class="galerie"><li>Gallerie</li></a>
                              <a href="#"><li>Vie scolaire</li></a>
                              <a href="#" class="oriantation"><li>Oriantation</li></a>
                              <a href="#" class="preinscription"><li>Inscription</li></a>
                              <a href="#" class="contact"><li>Contact</li></a>
                      
                      </ul>
                  
                  </div>
                  </div>
                      
                  <div class="col-md-6 col-sm-6 col-md-push-1">
                      
                  
                  
                  </div>
                      </div>
                  <div class="col-md-4 col-sm-3 col-md-pull-1">
                      <div class="coordonn">
                      <h4>Coordonnée</h4>
                      <ul>
                           <li><span class="fa fa-phone">  &nbsp;&nbsp;<span>+212 675202754</li>
                               <li><span class="fa fa-phone">&nbsp;&nbsp;</span>+212 522245897</li>
                               <li><span class="fa fa-map-marker">&nbsp;&nbsp;&nbsp;</span>Route Taddarte, Polo - C. Maarif</li>
                               <li><span class="fa fa-envelope-o">&nbsp;&nbsp;&nbsp;</span>Contact@OmarFarouk.ma</li>
                      </ul>
                      </div>
                  
                  </div>
                  <div class="col-md-4 col-sm-6 ">
                    <!--map-->
                    <h4 class="h4_map">Ou nous trouver :</h4> 
                      <div id="marge_map">

                      <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3324.9202180024868!2d-7.626196884517685!3d33.55544915119274!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0000000000000000%3A0x67176953f4ba89ae!2sOmar+Al+Farouk!5e0!3m2!1sfr!2sfr!4v1462877697627" width="350" height="180" frameborder="0" style="border:0" allowfullscreen></iframe>
                          </div>
                      <!--FIN map-->
                  
                  
                  </div>
              
              
              </div>
             
          
          
          </div>
      
      
      </footer>
       <footer id="bg_footer_bas">
           <div class="container">
              <div class="row">
                  <div class="col-md-12 text-center">
                      <strong class="text_footer_bas">® Omarfarouk.com</strong>
                  
                  
                  </div>
              
              
              </div>
                  </div>
           </footer>


       <!--FIN footer-->

    <!-- jQuery -->
     <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="js/script.js"></script>
    <!-- Bootstrap Core JavaScript -->
    <script src="bower_components/bootstrap/dist/js/bootstrap.min.js"></script>

    <!-- Script to Activate the Carousel -->
    <script>
    $('.carousel').carousel({
        interval: 5000 //changes the speed
    })
    </script>
  
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    
    <script src="js/jssor.slider.min.js"></script>
    <script src="js/flickity.pkgd.min.js"></script>
    <script src="js/script.js"></script>
    <script src="js/lightbox.js"></script>
    <script src="fblogin/fb.js"></script>

    <script>jssor_1_slider_init();</script>
</body>

</html>
