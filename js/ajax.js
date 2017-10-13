 $(document).ready(function(){
   



        $('.contact').click(function(){

       $.ajax({
       url : 'contact.html',
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
        });

    $(document).ready(function(){
        
        
         $('.preinscription').click(function(){

       $.ajax({
       url : 'preinscription.html',
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
    });
    
        $(document).ready(function(){
        
        
         $('.galerie').click(function(){

       $.ajax({
       url : 'gallery.html',
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
    });