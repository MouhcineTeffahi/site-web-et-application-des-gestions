
//slider des photo
jssor_1_slider_init = function() {
            var jssor_1_options = {
              $AutoPlay: true,
              $AutoPlaySteps: 4,
              $SlideDuration: 160,
              $SlideWidth: 200,
              $SlideSpacing: 3,
              $Cols: 4,
              $ArrowNavigatorOptions: {
                $Class: $JssorArrowNavigator$,
                $Steps: 4
              },
              $BulletNavigatorOptions: {
                $Class: $JssorBulletNavigator$,
                $SpacingX: 1,
                $SpacingY: 1
              }
            };

            var jssor_1_slider = new $JssorSlider$("jssor_1", jssor_1_options);
            
            //responsive code begin
            //you can remove responsive code if you don't want the slider scales while window resizing
            function ScaleSlider() {
                var refSize = jssor_1_slider.$Elmt.parentNode.clientWidth;
                if (refSize) {
                    refSize = Math.min(refSize, 809);
                    jssor_1_slider.$ScaleWidth(refSize);
                }
                else {
                    window.setTimeout(ScaleSlider, 30);
                }
            }
            ScaleSlider();
            $Jssor$.$AddEvent(window, "load", ScaleSlider);
            $Jssor$.$AddEvent(window, "resize", ScaleSlider);
            $Jssor$.$AddEvent(window, "orientationchange", ScaleSlider);
            //responsive code end
        };
//FIN slider
//partenaire
//fin paretainer

                  
       $(document).ready(function() {
	
	$("span.spoiler").hide();
	
	 $('<a class="reveal"><span id="show_text"><strong class="cursor_lasuite">Lire le suite...</strong></span></a>').insertBefore('.spoiler');

	$("a.reveal").click(function(){
		$(this).parents("p").children("span.spoiler").fadeIn(100);
		$(this).parents("p").children("a.reveal").fadeOut(100);
	});

 $.ajax({
       url : 'web/accueil.php',
       type : 'GET',
       dataType : 'html',
           
       success : function(code_html, statut){
           
        $('.madiv').html(code_html);
           jssor_1_slider_init();

       },

       error : function(resultat, statut, erreur){

         $('.madiv').html("xxxxxxxxxxx");
       },
       complete : function(resultat, statut){   
       }
        });
           
   
$('.main-carousel').flickity({
  // options
  cellAlign: 'left',
  contain: true
});         

           $('.accueil').click(function(){

        $.ajax({
       url : 'web/accueil.php',
       type : 'GET',
       dataType : 'html',
           
       success : function(code_html, statut){
           
        $('.madiv').html(code_html);

       },

       error : function(resultat, statut, erreur){

         $('.madiv').html("xxxxxxxxxxx");
       },
       complete : function(resultat, statut){   
       }
        });
            });
           
           

        $('.contact').click(function(){

       $.ajax({
       url : 'web/contact.html',
       type : 'GET',
       dataType : 'html',
           
       success : function(code_html, statut){
           
        $('.madiv').html(code_html);

       },

       error : function(resultat, statut, erreur){

         $('.madiv').html("xxxxxxxxxxx");
       },
       complete : function(resultat, statut){   
       }
        });
            });
           
       
        $('.orientation').click(function(){
       $.ajax({
       url : 'web/orientation.html',
       type : 'GET',
       dataType : 'html',
           
       success : function(code_html, statut){
           
        $('.madiv').html(code_html);

       },

       error : function(resultat, statut, erreur){

         $('.madiv').html("xxxxxxxxxxx");
       },
       complete : function(resultat, statut){   
       }
        });
            });
           

           
           
       
        
        
         $('.preinscription').click(function(){

       $.ajax({
       url : 'web/preinscription.php',
       type : 'GET',
       dataType : 'html',
           
       success : function(code_html, statut){
           
        $('.madiv').html(code_html);

       },

       error : function(resultat, statut, erreur){

         $('.madiv').html("xxxxxxxxxxx");
       },
       complete : function(resultat, statut){   
       }
        });
            

                });
           
           
            $('.viescolaire').click(function(){

       $.ajax({
       url : 'web/viescolaire.html',
       type : 'GET',
       dataType : 'html',
           
       success : function(code_html, statut){
           
        $('.madiv').html(code_html);

       },

       error : function(resultat, statut, erreur){

         $('.madiv').html("xxxxxxxxxxx");
       },
       complete : function(resultat, statut){   
       }
        });
            

                });
           
    
        /* $('.primere').click(function(){
              $('.primere').css('display','block');
             $('.lycee').css('display','none');
            
             
        }); */
        
     $('.galerie').click(function(){

       $.ajax({
       url : 'web/gallery.php',
       type : 'GET',
       dataType : 'html',
           
       success : function(code_html, statut){
           
           console.log(code_html)
        $('.madiv').html(code_html);

       },

       error : function(resultat, statut, erreur){

         $('.madiv').html("xxxxxxxxxxx");
       },
       complete : function(resultat, statut){   
       }
        });
            

                });
           
           
           $('.lycee').click(function(){
               alert('fgdfgdfg');
       $.ajax({
       url : 'web/gallery.php?lycee',
       type : 'GET',
       dataType : 'html',
           
       success : function(code_html, statut){
           
           console.log(code_html)
        $('.madiv').html(code_html);

       },

       error : function(resultat, statut, erreur){

         $('.madiv').html("xxxxxxxxxxx");
       },
       complete : function(resultat, statut){   
       }
        });
            

                });
           
           $('.primaire').click(function(){

       $.ajax({
       url : 'web/gallery.php?primaire',
       type : 'GET',
       dataType : 'html',
           
       success : function(code_html, statut){
           
           console.log(code_html)
        $('.madiv').html(code_html);

       },

       error : function(resultat, statut, erreur){

         $('.madiv').html("xxxxxxxxxxx");
       },
       complete : function(resultat, statut){   
       }
        });
            

                });
           
           $('.college').click(function(){

       $.ajax({
       url : 'web/gallery.php?college',
       type : 'GET',
       dataType : 'html',
           
       success : function(code_html, statut){
           
           console.log(code_html)
        $('.madiv').html(code_html);

       },

       error : function(resultat, statut, erreur){

         $('.madiv').html("xxxxxxxxxxx");
       },
       complete : function(resultat, statut){   
       }
        });
            

                });
           
           $('.all').click(function(){

       $.ajax({
       url : 'web/gallery.php',
       type : 'GET',
       dataType : 'html',
           
       success : function(code_html, statut){
           
           console.log(code_html)
        $('.madiv').html(code_html);

       },

       error : function(resultat, statut, erreur){

         $('.madiv').html("xxxxxxxxxxx");
       },
       complete : function(resultat, statut){   
       }
        });
            

                });

       
       
       
       
       
       });

function contenu_all()
           {  
               
               $.ajax({
                 
       url : 'web/gallery.php',
       type : 'GET',
       dataType : 'html',
           
       success : function(code_html, statut){
           
          
        $('.madiv').html(code_html);

       },

       error : function(resultat, statut, erreur){

         $('.madiv').html("xxxxxxxxxxx");
       },
       complete : function(resultat, statut){   
       }
        });
           }


function contenu_primaire()
           {  
               
               $.ajax({
                 
       url : 'web/gallery.php?primaire',
       type : 'GET',
       dataType : 'html',
           
       success : function(code_html, statut){
           
          
        $('.madiv').html(code_html);

       },

       error : function(resultat, statut, erreur){

         $('.madiv').html("xxxxxxxxxxx");
       },
       complete : function(resultat, statut){   
       }
        });
           }

function contenu_college()
           {  
               
               $.ajax({
                 
       url : 'web/gallery.php?college',
       type : 'GET',
       dataType : 'html',
           
       success : function(code_html, statut){
           
          
        $('.madiv').html(code_html);

       },

       error : function(resultat, statut, erreur){

         $('.madiv').html("xxxxxxxxxxx");
       },
       complete : function(resultat, statut){   
       }
        });
           }

function contenu_lycee()
           {  
               
               $.ajax({
                 
       url : 'web/gallery.php?lycee',
       type : 'GET',
       dataType : 'html',
           
       success : function(code_html, statut){
           
          
        $('.madiv').html(code_html);

       },

       error : function(resultat, statut, erreur){

         $('.madiv').html("xxxxxxxxxxx");
       },
       complete : function(resultat, statut){   
       }
        });
           }

$(document).ready(function () {
			  $("#hide_bar").on("click", function () {
				    $(this).toggleClass("active");
			  });
		});