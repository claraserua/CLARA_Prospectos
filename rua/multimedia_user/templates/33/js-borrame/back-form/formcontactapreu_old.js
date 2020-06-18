
      // Get the modal
      var modalrua = null;
      // Get the <span> element that closes the modal
      var span = null;


window.onload = function () {


if(typeof jQuery=='undefined') {
    var headTag = document.getElementsByTagName("head")[0];
    var jqTag = document.createElement('script');
    jqTag.type = 'text/javascript';
    jqTag.src = 'http://redanahuac.mx/rua/multimedia_user/templates/33/js/jquery-2.1.1.min.js';
    jqTag.onload = InitForm;
    headTag.appendChild(jqTag);
} else {
     InitForm();
}

}


var opcban=[0,0,0,0,0,0,0];

function menucontacto(){
  if (opcban[6]==0) {
    $('#menucontactox').css({'display':'block'});
    $('#imgmenucontacto').animate({ right: 240},200);
    $('#menucontactox').animate({ right:1},200);
    opcban[6]=1; 
  }else{
    $('#imgmenucontacto').animate({ right: 0},200);
    $('#menucontactox').css({'display':'none'},200);
    opcban[6]=0;    
  }
}





function InitForm(){

      $('head').append('<link rel="stylesheet" href="http://redanahuac.mx/rua/multimedia_user/templates/33/css/formcontactapreu.css" type="text/css" />');
      $('head').append('<link rel="stylesheet" href="http://redanahuac.mx/rua/multimedia_user/templates/33/css/materialize.css" type="text/css" />');
	  $('head').append('<link rel="stylesheet" href="http://fonts.googleapis.com/icon?family=Material+Icons" type="text/css" />');
	  
      $('#menucontacto').css({ top: 258 });
      insertForm();
	  getNiveles();
	  $("#programarua6854").prop('disabled', true);
      $("#campusrua854").prop('disabled', true);
	  
	  
	  
	  // Get the modal
      modalrua = document.getElementById('myModalrua');
      // Get the <span> element that closes the modal
      span = document.getElementsByClassName("close")[0];
	  
	  // When the user clicks on <span> (x), close the modal
      span.onclick = function() {
      modalrua.style.display = "none";
      }
	  
	   // When the user clicks anywhere outside of the modal, close it
    window.onclick = function(event) {
    if (event.target == modalrua) {
        modalrua.style.display = "none";
        }
     }
	 
	 
	$(function(){
    

    $('#menucontacto').focusout(function() {
    //alert("unfocus");
    });
    });
	  
	 
}

     

	  function insertForm(){
	  
      var htmlfrmcontactmodal = '<!-- The Modal -->';
          htmlfrmcontactmodal += '<div id="myModalrua" class="modalrua">';
          htmlfrmcontactmodal += '<!-- Modal content -->';
          htmlfrmcontactmodal += '<div class="modal-contentrua">';
          htmlfrmcontactmodal += '<div class="modal-headerrua">';
          htmlfrmcontactmodal += '<span class="close">×</span>';
          htmlfrmcontactmodal += '<h2>¡Muchas gracias por tu interés!</h2>';
          htmlfrmcontactmodal += '</div>';
          htmlfrmcontactmodal += '<div class="modal-bodyrua">';
          htmlfrmcontactmodal += '<p>Has dado el primer paso para completar tu solicitud de inscripción en uno de nuestros programas.</p>';
          htmlfrmcontactmodal += '<p>Un Especialista en Admisiones se pondrá en contacto contigo para darte más información sobre nuestros programas y contestar cualquier pregunta que tengas.</p>';
          htmlfrmcontactmodal += '</div>';
        /*htmlfrmcontactmodal += '<div class="modal-footer">';
          htmlfrmcontactmodal += '<h3>Modal Footer</h3>';
          htmlfrmcontactmodal += '</div>';*/
          htmlfrmcontactmodal += '</div>';
          htmlfrmcontactmodal += '</div>';
          
          
          
          
      var htmlfrmcontact = '<div class="row">';
          htmlfrmcontact += '<div class="col l1" >';
          htmlfrmcontact += '<img src="http://redanahuac.mx/rua/multimedia_user/templates/33/media/base/menucontacto.png" class="responsive-img" id="imgmenucontacto"    onclick="menucontacto()">';
          htmlfrmcontact += '</div>';
     
          htmlfrmcontact += '<div class="col l11" id="menucontactox" style="display: none;">';
          htmlfrmcontact += '<div class="row card-panel" id="menucontactop" style="padding: 5px;">';      
          htmlfrmcontact += '<form class="col s12">';
          htmlfrmcontact += '<div class="row">';
          htmlfrmcontact += '<div class="col s12">';
          htmlfrmcontact += '<div class="dropdowns">';
          htmlfrmcontact += '<select class="browser-default dropdown-select" id="nivelrua4653" onchange="getPrograms()">';
          htmlfrmcontact += '<option value="NONE" >Selecciona Nivel...</option>';
                 
          htmlfrmcontact += '</select>';
          htmlfrmcontact += '</div>';
          htmlfrmcontact += '</div>';
          htmlfrmcontact += '<div class="input-field col s12">';
          htmlfrmcontact += '<div class="dropdowns">';
          htmlfrmcontact += '<select class="browser-default dropdown-select" id="programarua6854" onchange="getUniversidades()">';
          htmlfrmcontact += '<option value="NONE" >Programa...</option>';
          htmlfrmcontact += '</select>';
          htmlfrmcontact += '</div>';
          htmlfrmcontact += '</div>';
          htmlfrmcontact += '<div class="input-field col s12">';
          htmlfrmcontact += '<div class="dropdowns">';
          htmlfrmcontact += '<select class="browser-default dropdown-select" id="campusrua854">';
          htmlfrmcontact += '<option value="NONE" >Campus de Interés...</option>';

          htmlfrmcontact += '</select>';
          htmlfrmcontact += '</div>';
 
          htmlfrmcontact += '<div class="input-field col s12">';
          htmlfrmcontact += '<i class="mdi-action-account-circle prefix"></i>';
          htmlfrmcontact += '<input id="nombre457" type="text" placeholder="Nombre">';
          htmlfrmcontact += '</div>';
          htmlfrmcontact += '<div class="input-field col s12">';
          htmlfrmcontact += '<input id="apellidos754" type="text" style="margin-left: 2.2rem;width:186px" placeholder="Apellidos">'; 
          htmlfrmcontact += '</div>';
      
          htmlfrmcontact += '<div class="input-field col s12">';
          htmlfrmcontact += '<i class="mdi-communication-email prefix"></i>';
          htmlfrmcontact += '<input id="correo451" onblur="validarEmail7845(this.value)" type="text" placeholder="Correo">'; 
          htmlfrmcontact += '</div>';
      
          htmlfrmcontact += '<div class="input-field col s12">';
          htmlfrmcontact += '<i class="mdi-maps-local-phone  prefix"></i>';
          htmlfrmcontact += '<input id="telefono454" type="text" placeholder="Telefono">';
          htmlfrmcontact += '</div>';
      
          htmlfrmcontact += '<div class="input-field col s12">';
          htmlfrmcontact += '<i class="mdi-navigation-unfold-more   prefix"></i>';
          htmlfrmcontact += '<input id="ciudad457" type="text" placeholder="Ciudad y Estado">';
          htmlfrmcontact += '</div>';
          htmlfrmcontact += '<div class="input-field col s12"><br />';
          htmlfrmcontact += '<a class="waves-effect waves-light btn orange" onclick="sendMessage457();" style="font-size: 1rem;">Enviar <i class="mdi-content-send "></i></a>';
          htmlfrmcontact += '</div>';
          htmlfrmcontact += '</div>';
          htmlfrmcontact += '</form>';
          htmlfrmcontact += '</div>';
          htmlfrmcontact += '</div>';
          htmlfrmcontact += '</div>';
          htmlfrmcontact += '</div>';
    
          
         
           $("#menucontacto").html(htmlfrmcontact);
           
           $("#menucontacto").after(htmlfrmcontactmodal);
           
           
    
	  
	  }
	  
	  
	  function validarEmail7845( email ) {
      expr = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
      if ( !expr.test(email) )
        alert("Error: La dirección de correo " + email + " es incorrecta.");
       }
	  
	  
	  function getNiveles(){
	  
	  
	   $("#programarua6854").html('<option value="NONE">Programa...</option>');
	   $("#campusrua854").html('<option value="NONE">Campus de Inter&eacute;s...</option>');
	  
		$.ajax({ 	 	 
        url: "http://redanahuac.mx/app/prospectos/formapreu.php?method=getNiveles",
        dataType: 'jsonp',
		jsonp: 'callback',
        contentType: "application/json; charset=utf-8",	
        data: {},
        complete:function(data){
           
		 // console.dir(data.responseText);
        
        },		
        success: function(msg){
               
			   $('#nivelrua4653').html(msg);
			   
          
         } 
           });
		
	   }
	  
	  
	  
       function getPrograms(){
       	
       	  $("#programarua6854").html('<option value="NONE">Programa...</option>');
		  $("#campusrua854").html('<option value="NONE">Campus de Inter&eacute;s...</option>');
	   
	       var nivel = $('#nivelrua4653').val();

		   if((nivel=='NONE') || (nivel != 2 && nivel !=3)){
		   
		     // $("#programarua6854").html('<option value="NONE">Programa...</option>');
			//  $("#campusrua854").html('<option value="NONE">Campus de Inter&eacute;s...</option>');
		      $("#programarua6854").prop('disabled', true);
			  $("#campusrua854").prop('disabled', true);
			  $("#ciudad").prop('disabled', true);
			  
		   }else{
		     
		
		   
		$.ajax({ 	 	 
        url: "http://redanahuac.mx/app/prospectos/formapreu.php?method=getPrograms",
        dataType: 'jsonp',
		jsonp: 'callback',
        contentType: "application/json; charset=utf-8",	
        data: { nivel:nivel},  
        complete:function(data){
           
		 // console.dir(data.responseText);
        
        },		
        success: function(msg){
        	
        	
               $("#programarua6854").prop('disabled', false);
			   $("#ciudad").prop('disabled', false);
			   
			  if(nivel == 3){
				
				
			    $("#campusrua854").html('<option value="NONE">Campus de Inter&eacute;s...</option>');   			      
			    $("#ciudad457").prop('disabled', true);	
			    $("#campusrua854").prop('disabled', true);
			
			  } 
			   
			   $('#programarua6854').html(msg);
			   
          
         } 
           });
		   
		   }
	   }
	   
	   
	   function getUniversidades(){
	   	
	          var programa = $('#programarua6854').val();
	          var nivel = $('#nivelrua4653').val();

			  if(programa=='NONE' || (nivel != 2)){
				
				
			    $("#campusrua854").html('<option value="NONE">Campus de Inter&eacute;s...</option>');   			      
			    $("#ciudad457").prop('disabled', true);	
			    $("#campusrua854").prop('disabled', true);
			

			}else{
			
			$("#ciudad457").prop('disabled', false);	
		    
		$.ajax({ 	 	 
        url: "http://redanahuac.mx/app/prospectos/formapreu.php?method=getUniversidades",
        dataType: 'jsonp',
		jsonp: 'callback',
        contentType: "application/json; charset=utf-8",	
        data: { programa:programa},  
        complete:function(data){
           
		 // console.dir(data.responseText);
        
        },		
        success: function(msg){
               $("#campusrua854").prop('disabled', false);
			   $('#campusrua854').html(msg);
			   
          
         } 
           });
	   
	        }
	   }
	   
	   
	   function sendMessage457(){
	   
	   var nivel =   $('#nivelrua4653').val();
	   var programa = $('#programarua6854').val();
	   var campus = $('#campusrua854').val();
	   var nombre =  $('#nombre457').val();
	   var apellidos = $('#apellidos754').val();
	   var correo = $('#correo451').val();
	   var telefono = $('#telefono454').val();
	   var ciudad = $('#ciudad457').val();
	   
	   var url_webservice = 'http://redanahuac.mx/app/prospectos/formapreu.php?method=Guardar';
	   
	   modalrua.style.display = "block";
	   
	    $.ajax({ 	 	 
        url: url_webservice,  
		dataType: 'jsonp',
		jsonp: 'callback',
        contentType: "application/json; charset=utf-8",
        data: { nivel:nivel,programa:programa,campus:campus,nombre:nombre,apellidos:apellidos,correo:correo,telefono:telefono,ciudad:ciudad},  
        success: function(msg){
		
		$('#nombre457').val(''); $('#apellidos754').val(''); $('#correo451').val(''); $('#telefono454').val(''); $('#ciudad457').val('');
		  // openSuccessMessage();
			  
        } 
           });
	   
	   
	 }
	 
	 
	 
	 function openSuccessMessage(){
	  
	      /*var win = window.open("", "Title", "toolbar=no, location=no, directories=no, status=no, menubar=no, scrollbars=yes, resizable=yes, width=780, height=200, top="+(screen.height-400)+", left="+(screen.width-840));
	      
		  var html = '<h1><span style="font-family:Verdana, Geneva, sans-serif">¡Muchas gracias por tu interés!</span></h1>';
              html += '<p><span style="font-family:Verdana, Geneva, sans-serif">Has dado el primer paso para completar tu solicitud de inscripción en uno de nuestros programas.</span></p>';
              html += '<p><span style="font-family:Verdana, Geneva, sans-serif">Un Especialista en Admisiones se pondrá en contacto contigo para darte más información sobre nuestros programas y contestar cualquier pregunta que tengas.</span></p>';
		  
		  win.document.body.innerHTML = html;*/
		  
	
	 
	 }
	 
	 
	
	 
	 
	 
	
      
