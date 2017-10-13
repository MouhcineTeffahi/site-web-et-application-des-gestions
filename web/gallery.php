<?php require'connexion.php'; ?>
<div class="section_div_1  section_div_2">
        <div class="panel panel-default">
                    <div class="titresidebar ">
                        <img src="images/titrebleumarine.png" alt="widget" class="img-responsive titlewidget">
                        <h4 class="text_bar_left2">Gallery</h4>
                    </div>
                    <div class="panel-body text-center">
                                              <!-- Start Gallery -->
                                            
                                               <div class="btn-group gall-separ" role="group" aria-label="...">
                                                  <button type="button" class="btn btn-warning filter active all" data-filter="all" onclick="contenu_all()">Tout</button>
                                                  <button type="button" class="btn btn-primary filter primaire" data-filter=".primaire" onclick="contenu_primaire()">Primaire</button>
                                                  <button type="button" class="btn btn-success filter college" data-filter=".college" onclick="contenu_college()">Collège</button>
                                                  <button type="button" class="btn btn-info filter lycee" data-filter=".lycee" onclick="contenu_lycee()">Lycée</button>
                                                </div>
<?php
if(isset($_GET['primaire']))
   {
    $requete=$bdd->query("SELECT * FROM `galerie` WHERE `categorie` = 'Primaire' ORDER BY `id.galerie` DESC");
            while ($data=$requete->fetch()) {
       ?>
     
                       
                        
                            <div class="primaire" data-myorder="1">
                                
                                <a href="img/<?php echo $data['image']; ?>" data-lightbox="roadtrip"><img src="img/<?php echo $data['image_miniature']; ?>" alt="xxxxx" class="img-thumbnail img-gallery1 img-responsive"></a>
                            </div>
                            
                       
<?php
   }
}
else if(isset($_GET['lycee']))
{
    $requete=$bdd->query("SELECT * FROM `galerie` WHERE `categorie` = 'Lycee' ORDER BY `id.galerie` DESC");
            while ($data=$requete->fetch()) {
               
     ?>
                              <div class="lycee" data-myorder="7">
                                <a href="img/<?php echo $data['image']; ?>" data-lightbox="roadtrip"><img src="img/<?php echo $data['image_miniature']; ?>" alt="" class="img-thumbnail img-gallery1 img-responsive"></a>
                            </div>
                            
               
       <?php  
       }        
}
else if(isset($_GET['college']))
{
    $requete=$bdd->query("SELECT * FROM `galerie` WHERE `categorie` = 'College' ORDER BY `id.galerie` DESC");
            while ($data=$requete->fetch()) {
       ?>
                         <div class="college" data-myorder="10">
                                <a href="img/<?php echo $data['image']; ?>" data-lightbox="roadtrip"><img src="img/<?php echo $data['image_miniature']; ?>" alt="" class="img-thumbnail img-gallery1"></a>
                            </div>
                      
        <?php        
               }
}
else
        {
            $requete=$bdd->query("SELECT * FROM `galerie` ORDER BY `id.galerie` DESC");
            while ($data=$requete->fetch()) {
              
            
            ?>
          
                        
                            <div class="primaire" data-myorder="1">
                                
                                <a href="img/<?php echo $data['image']; ?>" data-lightbox="roadtrip"><img src="img/<?php echo $data['image_miniature']; ?>" alt="" class="img-thumbnail img-gallery1"></a>
                            </div>            
            <?php
            }
        }
           
?>
                                           
           </div>
           </div>
                    </div>
                    </div>
