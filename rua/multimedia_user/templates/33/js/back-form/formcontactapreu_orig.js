
      // Get the modal
      var modalrua = null;
      // Get the <span> element that closes the modal
      var span = null;


window.onload = function ()
{
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
	resetTimer();
  }else{
    $('#imgmenucontacto').animate({ right: 0},200);
    $('#menucontactox').css({'display':'none'},200);
    opcban[6]=0;
	closeTimer();
  }
}


function InitForm(){

      $('head').append('<link rel="stylesheet" href="http://redanahuac.mx/rua/multimedia_user/templates/33/css/formcontactapreu.css" type="text/css" />');
      
	  
      $('#menucontacto').css({ top: 258 });
      insertForm();
	  getNiveles();
	  getEstados();
	  $("#programarua6854").prop('disabled', true);
      $("#campusrua854").prop('disabled', true);
	  $('#div_ciudad_2').hide();
	  
	  
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
          htmlfrmcontactmodal += '<div id="myModalrua" style="display:none;" class="modalrua">';
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
          // NIVEL
          htmlfrmcontact += '<div class="col s12">';
          htmlfrmcontact += '<div class="dropdowns">';
          htmlfrmcontact += '<select class="browser-default dropdown-select" id="nivelrua4653" onchange="getPrograms()" onclick="resetTimer()" onkeydown="resetTimer()">';
          htmlfrmcontact += '<option value="NONE" >Selecciona Nivel...</option>';
          htmlfrmcontact += '</select>';
          htmlfrmcontact += '</div>';
          htmlfrmcontact += '</div>';
          // PROGRAMA
          htmlfrmcontact += '<div class="input-field col s12">';
          htmlfrmcontact += '<div class="dropdowns">';
          htmlfrmcontact += '<select class="browser-default dropdown-select" id="programarua6854" onchange="getUniversidades()" onclick="resetTimer()" onkeydown="resetTimer()">';
          htmlfrmcontact += '<option value="NONE" >Programa...</option>';
          htmlfrmcontact += '</select>';
          htmlfrmcontact += '</div>';
          htmlfrmcontact += '</div>';
          // CAMPUS
          htmlfrmcontact += '<div class="input-field col s12">';
          htmlfrmcontact += '<div class="dropdowns">';
          htmlfrmcontact += '<select class="browser-default dropdown-select" id="campusrua854" onchange="" onclick="resetTimer()" onkeydown="resetTimer()">';
          htmlfrmcontact += '<option value="NONE" >Campus de Interés...</option>';
          htmlfrmcontact += '</select>';
          htmlfrmcontact += '</div>';
		  // NOMBRE
          htmlfrmcontact += '<div class="input-field col s12">';
          htmlfrmcontact += '<img src="http://redanahuac.mx/rua/multimedia_user/5421366234/user.png" class="imgapreu" />';
          htmlfrmcontact += '<input id="nombre457" class="inputformapreu" type="text" placeholder="Nombre" onclick="resetTimer()" onkeydown="resetTimer()" onchange="resetTimer()"><i style="font-size:13pt;color:red">*</i></input>';
          htmlfrmcontact += '</div>';
		  // APELLIDOS
          htmlfrmcontact += '<div class="input-field col s12">';
          htmlfrmcontact += '<input id="apellidos754" class="inputformapreu" type="text"  placeholder="Apellidos" onclick="resetTimer()" onkeydown="resetTimer()" onchange="resetTimer()"><i style="font-size:13pt;color:red">*</i></input>';
          htmlfrmcontact += '</div>';
		  // CORREO
          htmlfrmcontact += '<div class="input-field col s12">';
          htmlfrmcontact += '<img src="http://redanahuac.mx/rua/multimedia_user/5421366234/correo.png" class="imgapreu" />';
          htmlfrmcontact += '<input id="correo451" class="inputformapreu" onblur="validarEmail(this.value,true,true)" type="text" placeholder="Correo" onclick="resetTimer()" onkeydown="resetTimer()" onchange="resetTimer()"><i style="font-size:13pt;color:red">*</i></input>';
          htmlfrmcontact += '</div>';
          // TELEFONO
          htmlfrmcontact += '<div class="input-field col s12">';
          htmlfrmcontact += '<img src="http://redanahuac.mx/rua/multimedia_user/5421366234/phone.png" class="imgapreu" />';
          htmlfrmcontact += '<input id="telefono454" class="inputformapreu" onblur="validarTelefono(this.value,true,true)" type="text" placeholder="Telefono" onclick="resetTimer()" onkeydown="resetTimer()" onchange="resetTimer()"><i style="font-size:13pt;color:red">*</i></input>'; 
          htmlfrmcontact += '</div>';
          // ESTADO
          htmlfrmcontact += '<div class="input-field col s12" style="margin-top:3px;">';
          htmlfrmcontact += '<div class="dropdowns">';
          htmlfrmcontact += '<select class="browser-default dropdown-select" id="select_estado" onchange="changeEstado()" onclick="resetTimer()">';
          htmlfrmcontact += '<option value="NONE" >Estado</option>';
          htmlfrmcontact += '</select>';
          htmlfrmcontact += '</div>';
          // CIUDAD - COMBOBOX
          htmlfrmcontact += '<div class="input-field col s12">';
          htmlfrmcontact += '<div class="dropdowns" id="div_ciudad_1">';
          htmlfrmcontact += '<select class="browser-default dropdown-select" id="select_ciudad" onchange="" onclick="resetTimer()">';
          htmlfrmcontact += '<option value="NONE" >Ciudad</option>';
          htmlfrmcontact += '</select>';
          htmlfrmcontact += '</div>';
          // CIUDAD - TEXT BOX
          htmlfrmcontact += '<div class="input-field col s12" id="div_ciudad_2">';
          htmlfrmcontact += '<i class="mdi-navigation-unfold-more   prefix"></i>';
          htmlfrmcontact += '<input id="input_ciudad" class="inputformapreu" onblur="" type="text" placeholder="Ciudad y Estado" onclick="resetTimer()" onkeydown="resetTimer()" onchange="resetTimer()"></input>'; 
          htmlfrmcontact += '</div>';
		  
          
          htmlfrmcontact += '<div class="input-field col s12" align="center">';
          htmlfrmcontact += '<input type="checkbox" name="aviso458" id="aviso458" value="" onchange="resetTimer()">';
          htmlfrmcontact += '<a href="javascript:poponloadAviso()" class="aviso">Aviso de privacidad</a>';
          htmlfrmcontact += '<br/>';
          htmlfrmcontact += '</div>';
          
          htmlfrmcontact += '<div class="input-field col s12" align="center">';
          htmlfrmcontact += '<a class="waves-effect waves-light btn orange" onclick="sendMessage457();" style="font-size: 1rem;">Enviar <img src="http://redanahuac.mx/rua/multimedia_user/5421366234/send.png"></a>';
          htmlfrmcontact += '</div>';
          htmlfrmcontact += '</div>';
          htmlfrmcontact += '</form>';
          htmlfrmcontact += '</div>';
          htmlfrmcontact += '</div>';
          htmlfrmcontact += '</div>';
          htmlfrmcontact += '</div>';
          
          //htmlfrmcontact += '<input id="universidad_id" type="hidden" value="UAM" />';
    
          
         
           $("#menucontacto").html(htmlfrmcontact);
           
           $("#menucontacto").after(htmlfrmcontactmodal);
           
           
    
	  
}
	  
	
	  
function getNiveles()
{
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
	  
	  
	  
function getPrograms()
{
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
			success: function(msg)
			{
				$("#campusrua854").prop('disabled', false);
				$('#campusrua854').html(msg);
				
				var programa_length = $('#campusrua854').find("option").length;
				if (programa_length == 2)
				{
					$('#campusrua854 :nth-child(2)').prop('selected', true);
				}
			}
		});
	}
}

function getEstados()
{
	$.ajax({
		url: 'http://redanahuac.mx/app/prospectos/formapreu.php?method=getEstados',
		dataType: 'jsonp',
		jsonp: 'callback',
		contentType: 'application/json; charset=utf-8',
		data: {},
		complete:function(data){
			// console.dir(data.responseText);
		},
		success: function(msg)
		{
			$('#select_estado').html(msg+'<option value="OTRO">Otro</option>');
		} 
	});
		
}

function getCiudades()
{
	var estado = ''+$('#select_estado').val();
	$.ajax({
		url: 'http://redanahuac.mx/app/prospectos/formapreu.php?method=getCiudades&estado=' + estado,
		dataType: 'jsonp',
		jsonp: 'callback',
		contentType: "application/json; charset=utf-8",
		data: {},
		complete:function(data){
			// console.dir(data.responseText);
		},		
		success: function(msg){
			$('#select_ciudad').html(msg);
		}
	});
}

function changeEstado()
{
	var estado = ''+$('#select_estado').val();
	if(estado=="OTRO")
	{
		$('#div_ciudad_1').hide();
		$('#div_ciudad_2').show();
	}
	else{
		$('#div_ciudad_1').show();
		$('#div_ciudad_2').hide();
		getCiudades();
	}
}


function sendMessage457(){
	
	if(validarFormulario() == false)
		return;
	
	var nivel =   $('#nivelrua4653').val();
	var programa = $('#programarua6854').val();
	var campus = $('#campusrua854').val();
	var nombre =  $('#nombre457').val();
	var apellidos = $('#apellidos754').val();
	var correo = $('#correo451').val();
	var telefono = $('#telefono454').val();
	//var ciudad = $('#ciudad457').val();
	var ciudad = obtenerCiudadYEstado();
	
	 modalrua.style.display = "block";
	return;

	var url_webservice = 'http://redanahuac.mx/app/prospectos/formapreu.php?method=Guardar';

	modalrua.style.display = "block";
	$.ajax({ 	 	 
        url: url_webservice,  
		dataType: 'jsonp',
		jsonp: 'callback',
        contentType: "application/json; charset=utf-8",
        data: { nivel:nivel,programa:programa,campus:campus,nombre:nombre,apellidos:apellidos,correo:correo,telefono:telefono,ciudad:ciudad},  
        success: function(msg){
		
			$('#nombre457').val(''); $('#apellidos754').val(''); $('#correo451').val(''); $('#telefono454').val('');
			$('#input_ciudad').val('');
			  // openSuccessMessage();
			  
        }
	});
}




	 
// ___________________________________________________________________________
function validarNombre()
{
	var texto = $('#nombre457').val();
	if(texto.trim()==''){ alert('Especifica el nombre.'); $('#nombre457').css( "border-bottom", "1px solid red" ); return false; }
	/*else{
		var expr = /^([a-zA-Z0-9_\.\-])+$/;
		if ( !expr.test(texto) ){ alert('El nombre "' + texto + '" no es valido.'); return false; }
	}*/
	
	$('#nombre457').css( "border-bottom", "1px solid #9e9e9e" );
	return true;
}
function validarApellidos()
{
	var texto = $('#apellidos754').val();
	if(texto.trim()==''){ alert('Especifica los apellidos.'); $('#apellidos754').css( "border-bottom", "1px solid red" ); return false; }
	else{
		var expr = /^([a-zA-Z0-9_\.\-])+$/;
		if ( !expr.test(texto) ){ alert('Los apellidos "' + texto + '" no son validos.'); return false; }
	}
	$('#apellidos754').css( "border-bottom", "1px solid #9e9e9e" );
	return true;
}
function validarEmail(email, muestraMensaje, checarTelefono)
{
	if(email.trim()==''){
		var telefono = $('#telefono454').val();
		if (checarTelefono)
		{
			if(validarTelefono(telefono, false, false) == false)
			{
				if(muestraMensaje) alert('Hace falta especificar el correo o el telefono.');
				$('#telefono454').css( "border-bottom", "1px solid red" );
				$('#correo451').css( "border-bottom", "1px solid red" );
				return false;
			}
		}
		else return false; 
	}
	else{
		var expr = /^([a-zA-Z0-9_\.\-@])+$/;
		if ( !expr.test(email) || email.indexOf('@') == -1){
			var telefono = $('#telefono454').val();
			if (checarTelefono)
			{
				if(validarTelefono(telefono, false, false) == false){
					if(muestraMensaje) alert('La dirección de correo ' + email + ' no es valida.');
					$('#correo451').css( "border-bottom", "1px solid red" );
					return false;
				}
			}
			else return false;
		}
	}
	$('#telefono454').css( "border-bottom", "1px solid #9e9e9e" );
	$('#correo451').css( "border-bottom", "1px solid #9e9e9e" );
	return true;
}
function validarTelefono(telefono, muestraMensaje, checarEmail)
{
	if(telefono.trim()=='')
	{
		var email = $('#correo451').val();
		if (checarEmail)
		{
			if (validarEmail(email, false, false) == false){
				if(muestraMensaje) alert('Hace falta especificar el correo o el telefono.');
				$('#telefono454').css( "border-bottom", "1px solid red" );
				$('#correo451').css( "border-bottom", "1px solid red" );
				return false;
			}
		}
		else return false;
	}
	else{
		var expr = /^([0-9]{10,20})$/;
		if ( !expr.test(telefono) )
		{
			var email = $('#correo451').val();
			if (checarEmail)
			{
				if (validarEmail(email, false, false) == false)
				{
					if(muestraMensaje) alert('El numero telefonico debe contener minimo 10 digitos.');
					$('#telefono454').css( "border-bottom", "1px solid red" );
					return false;
				}
			}
			else return false;
		}
	}
	$('#telefono454').css( "border-bottom", "1px solid #9e9e9e" );
	$('#correo451').css( "border-bottom", "1px solid #9e9e9e" );
	return true;
}
function validarCombos(muestraMensaje)
{
	var nivel = $('#nivelrua4653').val();
	if (nivel==2 || nivel==3) // Si es licenciatura o maestria ...
	{
		var programa = $('#programarua6854').val();
		if (programa != "NONE")
		{
			if (nivel==3)
				return true;
			else
			{ // Solo para licenciatura
				var campus = $('#campusrua854').val();
				if (campus != "NONE")
					return true;
				else
					if(muestraMensaje) alert('Selecciona un campus.');
			}
		}
		else
			if(muestraMensaje) alert('Selecciona un programa.');
	}
	else if(nivel==4 || nivel==5){
		return true;
	}
	else
		if(muestraMensaje) alert('Selecciona un nivel de estudios.');
	return false;
}
function obtenerCiudadYEstado()
{
	var id_estado = $('#select_estado').val();
	if (id_estado != "OTRO")
	{
		var estado = $("#select_estado option[value='"+id_estado+"']").text()
		var ciudad = $('#select_ciudad').val();
		
		var arr=[ciudad,estado];
		return arr.join();
	}
	else{
		
		var ciudad = $('#input_ciudad').val();
		var expr = /^([a-zA-Z0-9 _\.\-])+$/;
		if ( !expr.test(ciudad) ){ ciudad=''; }
		
		return ciudad;
	}
}
function validarFormulario(){
	resetTimer();
	var email = $('#correo451').val();
	var telefono = $('#telefono454').val();
	var aceptar = $('#aviso458').is(':checked');
	
	if (validarCombos(true) == false)
		return false;
	if (validarNombre() == false)
		return false;
	if (validarApellidos() == false)
		return false;
	if (validarEmail(email,true,true) == false)
		return false;
	if (validarTelefono(telefono,true,true) == false)
		return false;
	
	if (aceptar==false){
		alert('Atención\n Debes de aceptar los términos y condiciones.');
		return false;
	}
	
	return true;
}
// ___________________________________________________________________________
var timerHiddenForm=null;
function resetTimer(){
	closeTimer();
	//console.log('resetTimer');
	timerHiddenForm = setInterval(timerHiddenForm_Tick, 10000);
}
function closeTimer(){
	//console.log('closeTimer');
	if(timerHiddenForm!=null){
		clearTimeout(timerHiddenForm);
		timerHiddenForm=null;
	}
}
function timerHiddenForm_Tick(){
	if (opcban[6]==1){
		menucontacto();
		//console.log('hidden ok');
	}
	else{
		//console.log('timerHiddenForm_Tick');
		closeTimer();
	}
}
// ___________________________________________________________________________

function poponloadAviso()
{
    avisowindow = window.open("http://redanahuac.mx/mobile/aviso.html", "Aviso de Privacidad", "location=1,status=1,scrollbars=1,width=700,height=500");
    avisowindow.moveTo(0, 0);
}
