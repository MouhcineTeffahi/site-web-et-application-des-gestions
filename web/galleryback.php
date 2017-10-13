<div class="section_div_1  section_div_2">
        <div class="panel panel-default">
                    <div class="titresidebar ">
                        <img src="images/titrebleumarine.png" alt="widget" class="img-responsive titlewidget">
                        <h4 class="text_bar_left2">Gallery</h4>
                    </div>
                    <div class="panel-body text-center">
                                              <!-- Start Gallery -->
                                            
                                               <div class="btn-group gall-separ" role="group" aria-label="...">
                                                  <button type="button" class="btn btn-default filter active all" data-filter="all" onclick="contenu_all()">Tout</button>
                                                  <button type="button" class="btn btn-default filter primaire" data-filter=".primaire" onclick="contenu_primaire()">Primaire</button>
                                                  <button type="button" class="btn btn-default filter college" data-filter=".college" onclick="contenu_college()">Collège</button>
                                                  <button type="button" class="btn btn-default filter lycee" data-filter=".lycee" onclick="contenu_lycee()">Lycée</button>
                                                </div>
<?php
if(isset($_GET['primaire']))
   {
       ?>
     
                       
                        
                            <div class="primaire" data-myorder="1">
                                
                                <a href="img/gall1.jpg" data-lightbox="roadtrip"><img src="img/gall1t.jpg" alt="" class="img-thumbnail img-gallery img-responsive"></a>
                            </div>
                            <div class="primaire" data-myorder="2">
                                <a href="img/gall2.jpg" data-lightbox="roadtrip"><img src="img/gall2t.jpg" alt="" class="img-thumbnail img-gallery img-responsive"></a>
                            </div>
                            <div class="primaire" data-myorder="3">
                                <a href="img/gall3.jpg" data-lightbox="roadtrip"><img src="img/gall3t.jpg" alt="" class="img-thumbnail img-gallery img-responsive"></a>
                            </div>
                            <div class="primaire" data-myorder="4">
                                <a href="img/gall4.jpg" data-lightbox="roadtrip"><img src="img/gall4t.jpg" alt="" class="img-thumbnail img-gallery img-responsive"></a>
                            </div>
                            <div class="primaire" data-myorder="5">
                                <a href="img/gall5.jpg" data-lightbox="roadtrip"><img src="img/gall5t.jpg" alt="" class="img-thumbnail img-gallery img-responsive"></a>
                            </div>
                            <div class="primere" data-myorder="6">
                                <a href="img/gall6.jpg" data-lightbox="roadtrip"><img src="img/gall6t.jpg" alt="" class="img-thumbnail img-gallery img-responsive"></a>
                            </div>
                            
                            <!-- End Gallery -->
                       
<?php
   }
else if(isset($_GET['lycee']))
{
               
     ?>
                              <div class="lycee" data-myorder="7">
                                <a href="img/gall7.jpg" data-lightbox="roadtrip"><img src="img/gall7t.jpg" alt="" class="img-thumbnail img-gallery img-responsive"></a>
                            </div>
                            <div class="lycee" data-myorder="8">
                                <a href="img/gall8.jpg" data-lightbox="roadtrip"><img src="img/gall8t.jpg" alt="" class="img-thumbnail img-gallery img-responsive"></a>
                            </div>
                            <div class="lycee" data-myorder="9">
                                <a href="img/gall9.jpg" data-lightbox="roadtrip"><img src="img/gall9t.jpg" alt="" class="img-thumbnail img-gallery img-responsive"></a>
                            </div>
                            
                             <div class="lycee" data-myorder="11">
                                <a href="img/gall11.jpg" data-lightbox="roadtrip"><img src="img/gall11t.jpg" alt="" class="img-thumbnail img-gallery img-responsive"></a>
                            </div>
                            <div class="lycee" data-myorder="12">
                                <a href="img/gall12.jpg" data-lightbox="roadtrip"><img src="img/gall12t.jpg" alt="" class="img-thumbnail img-gallery img-responsive"></a>
                            </div>
               
       <?php          
}
else if(isset($_GET['college']))
{
       ?>
                         <div class="college" data-myorder="10">
                                <a href="img/gall10.jpg" data-lightbox="roadtrip"><img src="img/gall10t.jpg" alt="" class="img-thumbnail img-gallery"></a>
                            </div>
                           
                            <div class="college" data-myorder="13">
                                <a href="img/gall13.jpg" data-lightbox="roadtrip"><img src="img/gall13t.jpg" alt="" class="img-thumbnail img-gallery"></a>
                            </div>
                            <div class="college" data-myorder="14">
                                <a href="img/gall14.jpg" data-lightbox="roadtrip"><img src="img/gall14t.jpg" alt="" class="img-thumbnail img-gallery"></a>
                            </div>
                            <div class="college" data-myorder="15">
                                <a href="img/gall15.jpg" data-lightbox="roadtrip"><img src="img/gall15t.jpg" alt="" class="img-thumbnail img-gallery"></a>
                            </div>
                            <div class="college" data-myorder="16">
                                <a href="img/gall16.jpg" data-lightbox="roadtrip"><img src="img/gall16t.jpg" alt="" class="img-thumbnail img-gallery"></a>
                            </div>
                            <div class="college" data-myorder="17">
                                <a href="img/gall17.jpg" data-lightbox="roadtrip"><img src="img/gall17t.jpg" alt="" class="img-thumbnail img-gallery"></a>
                            </div> 
                      
        <?php        
               
}
else
        {
            ?>
          
                        
                            <div class="primaire" data-myorder="1">
                                
                                <a href="img/gall1.jpg" data-lightbox="roadtrip"><img src="img/gall1t.jpg" alt="" class="img-thumbnail img-gallery"></a>
                            </div>
                            <div class="primaire" data-myorder="2">
                                <a href="img/gall2.jpg" data-lightbox="roadtrip"><img src="img/gall2t.jpg" alt="" class="img-thumbnail img-gallery"></a>
                            </div>
                            <div class="primaire" data-myorder="3">
                                <a href="img/gall3.jpg" data-lightbox="roadtrip"><img src="img/gall3t.jpg" alt="" class="img-thumbnail img-gallery"></a>
                            </div>
                            <div class="primaire" data-myorder="4">
                                <a href="img/gall4.jpg" data-lightbox="roadtrip"><img src="img/gall4t.jpg" alt="" class="img-thumbnail img-gallery"></a>
                            </div>
                            <div class="primaire" data-myorder="5">
                                <a href="img/gall5.jpg" data-lightbox="roadtrip"><img src="img/gall5t.jpg" alt="" class="img-thumbnail img-gallery"></a>
                            </div>
                            <div class="primere" data-myorder="6">
                                <a href="img/gall6.jpg" data-lightbox="roadtrip"><img src="img/gall6t.jpg" alt="" class="img-thumbnail img-gallery"></a>
                            </div>
                            <div class="lycee" data-myorder="7">
                                <a href="img/gall7.jpg" data-lightbox="roadtrip"><img src="img/gall7t.jpg" alt="" class="img-thumbnail img-gallery"></a>
                            </div>
                            <div class="lycee" data-myorder="8">
                                <a href="img/gall8.jpg" data-lightbox="roadtrip"><img src="img/gall8t.jpg" alt="" class="img-thumbnail img-gallery"></a>
                            </div>
                            <div class="lycee" data-myorder="9">
                                <a href="img/gall9.jpg" data-lightbox="roadtrip"><img src="img/gall9t.jpg" alt="" class="img-thumbnail img-gallery"></a>
                            </div>
                            <div class="college" data-myorder="10">
                                <a href="img/gall10.jpg" data-lightbox="roadtrip"><img src="img/gall10t.jpg" alt="" class="img-thumbnail img-gallery"></a>
                            </div>
                            <div class="lycee" data-myorder="11">
                                <a href="img/gall11.jpg" data-lightbox="roadtrip"><img src="img/gall11t.jpg" alt="" class="img-thumbnail img-gallery"></a>
                            </div>
                            <div class="lycee" data-myorder="12">
                                <a href="img/gall12.jpg" data-lightbox="roadtrip"><img src="img/gall12t.jpg" alt="" class="img-thumbnail img-gallery"></a>
                            </div>
                            <div class="college" data-myorder="13">
                                <a href="img/gall13.jpg" data-lightbox="roadtrip"><img src="img/gall13t.jpg" alt="" class="img-thumbnail img-gallery"></a>
                            </div>
                            <div class="college" data-myorder="14">
                                <a href="img/gall14.jpg" data-lightbox="roadtrip"><img src="img/gall14t.jpg" alt="" class="img-thumbnail img-gallery"></a>
                            </div>
                            <div class="college" data-myorder="15">
                                <a href="img/gall15.jpg" data-lightbox="roadtrip"><img src="img/gall15t.jpg" alt="" class="img-thumbnail img-gallery"></a>
                            </div>
                            <div class="college" data-myorder="16">
                                <a href="img/gall16.jpg" data-lightbox="roadtrip"><img src="img/gall16t.jpg" alt="" class="img-thumbnail img-gallery"></a>
                            </div>
                            <div class="college" data-myorder="17">
                                <a href="img/gall17.jpg" data-lightbox="roadtrip"><img src="img/gall17t.jpg" alt="" class="img-thumbnail img-gallery"></a>
                            </div>
                            <!-- End Gallery -->
                      
            
            <?php
        }
           
?>
                                           
           </div>
           </div>
                    </div> 
                    </div>                                  

                                            
                                            

