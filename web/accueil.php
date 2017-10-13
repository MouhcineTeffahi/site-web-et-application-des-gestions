<?php 
  session_start();
   require 'connexion.php';
   
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
                        <img src="images/titrebleumarine.png" alt="widget" class="img-responsive titlewidget">
                        <h4 class="text_bar_left2"><?php echo $data['titre']; ?></h4>
                    </div>
                    <div class="panel-body">
                       <img src="img/<?php echo $data['Image']; ?>" class="img-thumbnail img-left" alt="Cinque Terre" width="199" height="208">
                        <p class="para_section">
                            <?php echo $data['contenu']; ?>

                        </p>
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
                        <img src="images/titrebleumarine.png" alt="widget" class="img-responsive titlewidget">
                        <h4 class="text_bar_left2"><?php echo $data['titre']; ?></h4>
                    </div>
                    <div class="float_right_photo">
                              <img src="img/<?php echo $data['Image']; ?>" class="img-thumbnail img-right" alt="Cinque Terre" width="199" height="208">
                    </div>
                    <div class="panel-body">
<p class="para_sections"><?php echo $data['contenu']; ?>
                              

                               </p>
                    </div>
                </div>
    <?php  
        }
    ?>


   
<?php
}
?>          

<div class="panel panel-default" id="slider_photos">
                    
     <h4 class="text_slider_photos">NOS LAUREAT</h4>
        <div id="jssor_1" style="position: relative; margin: 0 auto; top: 0px; left: 0px; width: 809px; height: 150px; overflow: hidden; visibility: hidden;">
        <!-- Loading Screen -->
        <div data-u="loading" style="position: absolute; top: 0px; left: 0px;">
            <div style="filter: alpha(opacity=70); opacity: 0.7; position: absolute; display: block; top: 0px; left: 0px; width: 100%; height: 100%;"></div>
            <div style="position:absolute;display:block;background:url('img/loading.gif') no-repeat center center;top:0px;left:0px;width:100%;height:100%;"></div>
        </div>
        <div data-u="slides" style="cursor: default; position: relative; top: 0px; left: 0px; width: 809px; height: 149px; overflow: hidden;">
            
            
            <?php


  
    $requete=$bdd->query("SELECT * FROM `slider` WHERE `categorie` = 'petit_slider'");
            while ($data=$requete->fetch()) {
       ?>
     
                       
                        
                                
                    
            <div style="display: none;">
                <img src="img/<?php echo $data['image']; ?>" class="img-circle" alt="Cinque Terre" width="149" height="149">
            </div>
            
                                    <?php
                                    }
                                    ?>
           
            
            <a data-u="ad" href="http://www.jssor.com" style="display:none">jQuery Slider</a>
        
        </div>
        <!-- Bullet Navigator -->
        <div data-u="navigator" class="jssorb03" style="bottom:10px;right:10px;">
            <!-- bullet navigator item prototype -->
            <div data-u="prototype" style="width:21px;height:21px;">
                <div data-u="numbertemplate"></div>
            </div>
        </div>
        <!-- Arrow Navigator -->
        <span data-u="arrowleft" class="jssora03l fa fa-angle-left" style="top: 48.5px;
    left: 5px;
    width: 55px;
    font-size: 54px;
    color: #6b6b6b;
    height: 55px;" data-autocenter="2"></span>
        <span data-u="arrowright" class="jssora03r fa fa-angle-right" style=" top: 47.5px;right: 19px;width: 55px;height: 55px;font-size: 54px;" data-autocenter="2"></span>
    
                      <!--fin slider-->
                          </div>
</div>
                      <!--fin slider-- lauriat>


              
                