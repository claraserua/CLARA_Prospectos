
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
     
     

  
    //  $('head').append('<link rel="stylesheet" href="http://redanahuac.mx/rua/multimedia_user/templates/33/css/formcontactapreu.css" type="text/css" /><link  href="http://redanahuac.mx/app/prospectos/skins/default/css/bootstrap-cerulean.css" rel="stylesheet"><script src="http://redanahuac.mx/app/prospectos/skins/default/js/bootstrap-tooltip.js"></script><script>$(".icon-question-sign").tooltip();</script>');
     
     
      
      
	  
      $('#menucontacto').css({ top: 258 });
      insertForm();
	  getNiveles();
	  getEstados();
	  $("#programarua6854").prop('disabled', true);
      $("#campusrua854").prop('disabled', true);
	  $('#div_delmun_2').hide();
      $('#nombre_asterisco').hide();
	  $('#apellidos_asterisco').hide();
	  $('#email_asterisco').hide();
	  $('#telefono_asterisco').hide();
	  
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
          
          
          
          
      var htmlfrmcontact = '<div class="rowk4">';
          htmlfrmcontact += '<div class="colk4 l1" >';
            //LIBRERIA
	     
          htmlfrmcontact += '<img src="http://redanahuac.mx/rua/multimedia_user/templates/33/media/base/menucontacto.png" class="responsive-img" id="imgmenucontacto"    onclick="menucontacto()">';
          htmlfrmcontact += '</div>';
        
          
          htmlfrmcontact += '<div class="colk4 l11" id="menucontactox" style="display: none;">';
          htmlfrmcontact += '<div class="rowk4 card-panel" id="menucontactop" style="padding: 5px;">';      
          htmlfrmcontact += '<form class="colk4 s12">';
          htmlfrmcontact += '<div class="rowk4">';
          // NIVEL
          htmlfrmcontact += '<div class="colk4 s12">';
          htmlfrmcontact += '<div class="dropdowns">';
          htmlfrmcontact += '<select class="browser-default dropdown-select" id="nivelrua4653" onchange="getPrograms()" onclick="resetTimer()" onkeydown="resetTimer()">';
          htmlfrmcontact += '<option value="NONE" >Selecciona Nivel ...</option>';
          htmlfrmcontact += '</select>';
          htmlfrmcontact += '</div>';
          htmlfrmcontact += '</div>';
          // PROGRAMA
          htmlfrmcontact += '<div class="input-field colk4 s12">';
          htmlfrmcontact += '<div class="dropdowns">';
          htmlfrmcontact += '<select class="browser-default dropdown-select" id="programarua6854" onchange="getUniversidades()" onclick="resetTimer()" onkeydown="resetTimer()">';
          htmlfrmcontact += '<option value="NONE" >Programa ...</option>';
          htmlfrmcontact += '</select>';
          htmlfrmcontact += '</div>';
          htmlfrmcontact += '</div>';
          // CAMPUS
          htmlfrmcontact += '<div class="input-field col s12">';
          htmlfrmcontact += '<div class="dropdowns">';
          htmlfrmcontact += '<select class="browser-default dropdown-select" id="campusrua854" onchange="tooltipmens();" onclick="resetTimer()" onkeydown="resetTimer()">';
          htmlfrmcontact += '<option value="NONE" >Campus de Inter&eacute;s ...</option>';
          htmlfrmcontact += '</select>';
          htmlfrmcontact += '</div><div class="input-field col s12"><div id="campusruaTol" style="display: none; background:#000; color:#fff; padding:10px; width:360px; position:fixed !important; right:250px;" ><span style="font-size: 10px "  >Programa parcial: Estas licenciaturas se ofrecen parcialmente en el campus seleccionado en una licenciatura afín, para posteriormente transferirse a otro campus que ofrezca el programa completo.</span></div></div>';
		  // NOMBRE
          htmlfrmcontact += '<div class="input-field colk4 s12">';
          htmlfrmcontact += '<img src="http://redanahuac.mx/rua/multimedia_user/5421366234/user.png" class="imgapreu" />';
          htmlfrmcontact += '<input id="nombre457" class="inputformapreu" type="text" placeholder="Nombre" onclick="resetTimer()" onkeydown="resetTimer()" onchange="resetTimer()"><i id="nombre_asterisco" style="font-size:13pt;color:red">*</i></input>';
          htmlfrmcontact += '</div>';
		  // APELLIDOS
          htmlfrmcontact += '<div class="input-field colk4 s12">';
          htmlfrmcontact += '<input id="apellidos754" class="inputformapreu" type="text"  placeholder="Apellidos" onclick="resetTimer()" onkeydown="resetTimer()" onchange="resetTimer()"><i id="apellidos_asterisco" style="font-size:13pt;color:red">*</i></input>';
          htmlfrmcontact += '</div>';
		  // CORREO
          htmlfrmcontact += '<div class="input-field colk4 s12">';
          htmlfrmcontact += '<img src="http://redanahuac.mx/rua/multimedia_user/5421366234/correo.png" class="imgapreu" />';
          htmlfrmcontact += '<input id="correo451" class="inputformapreu" type="text" placeholder="Correo" onclick="resetTimer()" onkeydown="resetTimer()" onchange="resetTimer()"><i id="email_asterisco" style="font-size:13pt;color:red">*</i></input>';
          htmlfrmcontact += '</div>';
          // TELEFONO
          htmlfrmcontact += '<div class="input-field colk4 s12">';
          htmlfrmcontact += '<img src="http://redanahuac.mx/rua/multimedia_user/5421366234/phone.png" class="imgapreu" />';
          htmlfrmcontact += '<input id="telefono454" class="inputformapreu" type="text" placeholder="Telefono" onclick="resetTimer()" onkeydown="resetTimer()" onchange="resetTimer()"><i id="telefono_asterisco" style="font-size:13pt;color:red">*</i></input>'; 
          htmlfrmcontact += '</div>';
          // ESTADO
          htmlfrmcontact += '<div class="input-field colk4 s12" style="margin-top:3px;">';
          htmlfrmcontact += '<div class="dropdowns">';
          htmlfrmcontact += '<select class="browser-default dropdown-select" id="select_estado" onchange="changeEstado()" onclick="resetTimer()">';
          htmlfrmcontact += '<option value="NONE" >Estado ...</option>';
          htmlfrmcontact += '</select>';
          htmlfrmcontact += '</div>';
          // DELEGACION/MUNICIPIO - COMBOBOX
          htmlfrmcontact += '<div class="input-field colk4 s12">';
          htmlfrmcontact += '<div class="dropdowns" id="div_delmun_1">';
          htmlfrmcontact += '<select class="browser-default dropdown-select" id="select_delmun" onchange="" onclick="resetTimer()">';
          htmlfrmcontact += '<option value="NONE" >Delegaci&oacute;n o municipio ...</option>';
          htmlfrmcontact += '</select>';
          htmlfrmcontact += '</div>';
          // DELEGACION/MUNICIPIO - TEXT BOX
          htmlfrmcontact += '<div class="input-field colk4 s12" id="div_delmun_2">';
          htmlfrmcontact += '<i class="mdi-navigation-unfold-more   prefix"></i>';
          htmlfrmcontact += '<input id="input_delmun" class="inputformapreu" type="text" placeholder="Delegacion o municipio" onclick="resetTimer()" onkeydown="resetTimer()" onchange="resetTimer()"></input>'; 
          htmlfrmcontact += '</div>';
		  
          
          htmlfrmcontact += '<div class="input-field colk4 s12" align="center">';
          htmlfrmcontact += '<input type="checkbox" name="aviso458" id="aviso458" value="" onchange="resetTimer()">';
          htmlfrmcontact += '<a href="javascript:poponloadAviso()" class="aviso">Aviso de privacidad</a>';
          htmlfrmcontact += '</div>';
          
          htmlfrmcontact += '<div class="input-field colk4 s12" align="center">';
          htmlfrmcontact += '<a id="buttonSend" class="waves-effect waves-light btn orange" onclick="sendMessage457();" style="font-size: 1rem;">Enviar</a>';
          htmlfrmcontact += '</div>';
		  
          htmlfrmcontact += '</div>';
          htmlfrmcontact += '</form>';
          htmlfrmcontact += '</div>';
          htmlfrmcontact += '</div>';
          htmlfrmcontact += '</div>';
          htmlfrmcontact += '</div>';
          
          $("#menucontacto").html(htmlfrmcontact);
           
          $("#menucontacto").after(htmlfrmcontactmodal);
		  
		  buttonSend_finish();
}
	  
	
	  
function getNiveles()
{
	//$("#campusruaTol").html('');
	 $("#campusruaTol").hide(); 
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
	    //  $("#campusruaTol").html('');
	      $("#campusruaTol").hide();
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


function tooltipmens(){
	
	//$("#campusruaTol").hide();
	closeTimer2();
		//var id = id.trim();	
		var opcion = $("#campusrua854 option:selected").text();
	    var findme = "*";

		if ( opcion.indexOf(findme) > -1 ) {
			
	//	$("#campusruaTol").html('<span style="font-size: 10px !important;"  >"Programa parcial: Estas licenciaturas se ofrecen parcialmente en el campus seleccionado en una licenciatura afín, para posteriormente transferirse a otro campus que ofrezca el programa completo."</span>');
		 $("#campusruaTol").show();
		 
		 
		//terminarTooltipYa();
		
		
		} else {
		//	$("#campusruaTol").html('');		
		    $("#campusruaTol").hide();
		}
	
	
	
}

var timertooltip= null;
function terminarTooltipYa(){
	
	closeTimer2();
	
    timertooltip = setInterval(function(){
   // $("#campusruaTol").html('');	
    $("#campusruaTol").hide();
    },10000); // 3000ms = 3s

}
function closeTimer2(){
	//console.log('closeTimer');
	if(timertooltip!=null){
		clearTimeout(timertooltip);
		timertooltip=null;
	}
}




function getUniversidades(){
	   	
	   	
	
	  //	$("#campusruaTol").html('');		
	     $("#campusruaTol").hide();	   	
	var programa = $('#programarua6854').val();
		var nivel = $('#nivelrua4653').val();
		

		if(programa=='NONE' || (nivel != 2)){


		$("#campusrua854").html('<option value="NONE">Campus de Inter&eacute;s...</option>');   			      
		$("#ciudad457").prop('disabled', true);	
		$("#campusrua854").prop('disabled', true);
		
	}else{
			
		$("#ciudad457").prop('disabled', false);	
		
		$("#campusrua854").html('<option value="NONE">Campus de Inter&eacute;s...</option>');

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
				}else{
				    
				    var uni = $("#menucontacto").data("uni");
					var find =$("#campusrua854 option[value='"+uni+"']").length;

					if(find>0){
					 $("#campusrua854").val(uni);
					}
				
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

function getMunicipios()
{
	var estado = ''+$('#select_estado').val();
	$.ajax({
		url: 'http://redanahuac.mx/app/prospectos/formapreu.php?method=getMunicipios&estado=' + estado,
		dataType: 'jsonp',
		jsonp: 'callback',
		contentType: "application/json; charset=utf-8",
		data: {},
		complete:function(data){
			// console.dir(data.responseText);
		},		
		success: function(msg){
			$('#select_delmun').html(msg);
		}
	});
}

function changeEstado()
{
	var estado = ''+$('#select_estado').val();
	if(estado=="OTRO")
	{
		$('#div_delmun_1').hide();
		$('#div_delmun_2').show();
	}
	else{
		$('#div_delmun_1').show();
		$('#div_delmun_2').hide();
		getMunicipios();
	}
}


function sendMessage457(){
	
	$("#campusruaTol").hide();
	closeTimer2();
	
	if(validarFormulario() == false)
		return;
	
	var nivel =   $('#nivelrua4653').val();
	var programa = $('#programarua6854').val();
	var campus = $('#campusrua854').val();
	var nombre =  $('#nombre457').val();
	var apellidos = $('#apellidos754').val();
	var correo = $('#correo451').val();
	var telefono = $('#telefono454').val();
	var municipio = obtenerMunicipios();
	
	var url_webservice = 'http://redanahuac.mx/app/prospectos/formapreu.php?method=Guardar';
	buttonSend_Sending();
	modalrua.style.display = "block";
	$.ajax({
        url: url_webservice,
		dataType: 'jsonp',
		jsonp: 'callback',
        contentType: "application/json; charset=utf-8",
        data: { nivel:nivel,programa:programa,campus:campus,nombre:nombre,apellidos:apellidos,correo:correo,telefono:telefono,ciudad:municipio},
        success: function(msg){
			$('#nivelrua4653').val("NONE");
			$("#programarua6854").html('<option value="NONE">Programa ...</option>');
			$("#programarua6854").prop('disabled', true);
			$("#campusrua854").html('<option value="NONE" >Campus de Inter&eacute;s ...</option>');
			$("#campusrua854").prop('disabled', true);
			
			$('#nombre457').val('');
			$('#apellidos754').val('');
			$('#correo451').val('');
			$('#telefono454').val('');
			$('#input_delmun').val('');
			
			$('#select_estado').val('NONE');
			$('#select_delmun').html('<option value="NONE" >Delegaci&oacute;n o municipio ...</option>');
			$('#input_delmun').val('');
			$("#aviso458").attr('checked', false);
			buttonSend_finish();
        }
	});
}

function buttonSend_Sending()
{
	$('#buttonSend').html('Enviar <img src="http://redanahuac.mx/app/prospectos/media/imagenes/loading.gif">');
}
function buttonSend_finish()
{
	$('#buttonSend').html('Enviar <img src="http://redanahuac.mx/rua/multimedia_user/5421366234/send.png">');
}



	 
// ___________________________________________________________________________
function validarNombre()
{
	var texto = $('#nombre457').val();
	if(texto.trim()==''){
		alert('Especifica el nombre.');
		$('#nombre457').css( "border-bottom", "1px solid red" );
		$('#nombre457').html('');
		$('#nombre_asterisco').show();
		return false;
	}
	/*else{
		var expr = /^([a-zA-Z0-9_\.\-])+$/;
		if ( !expr.test(texto) ){ alert('El nombre "' + texto + '" no es valido.'); return false; }
	}*/
	
	$('#nombre457').css( "border-bottom", "1px solid #9e9e9e" );
	$('#nombre_asterisco').hide();
	return true;
}
function validarApellidos()
{
	var texto = $('#apellidos754').val();
	if(texto.trim()==''){ alert('Especifica los apellidos.'); $('#apellidos754').css( "border-bottom", "1px solid red" ); $('#apellidos_asterisco').show(); return false; }
	/*else{
		var expr = /^([a-zA-Z0-9_\.\-])+$/;
		if ( !expr.test(texto) ){ alert('Los apellidos "' + texto + '" no son validos.'); return false; }
	}*/
	$('#apellidos754').css( "border-bottom", "1px solid #9e9e9e" );
	$('#apellidos_asterisco').hide();
	return true;
}
function validarEmail(email, muestraMensaje, checarTelefono)
{
	$('#correo451').css( "border-bottom", "1px solid red" );
	$('#email_asterisco').show();
	var val = __validarEmail(email, checarTelefono);
	switch(val){
		case 1: if(muestraMensaje) alert('Especifica el correo o teléfono.'); return 1;
		case 2: if(muestraMensaje) alert('La dirección de correo no es válida'); return 2;
		case -1: return -1;
	}
	$('#correo451').css( "border-bottom", "1px solid #9e9e9e" );
	$('#email_asterisco').hide();
	return 0;
}
function __validarEmail(email, checarTelefono)
{
	email = email.trim();
	
	var expr = /^([a-zA-Z0-9_\.\-@])+$/;
	if(email=='')
	{
		if (checarTelefono)
		{
			var telefono = $('#telefono454').val();
			var val = validarTelefono(telefono, false, false);
			// no encontro telefono y tampoco email
			if(val == 1) return 1; 
			// Con el correo vacio no habrá error pero delegará el mensaje a la validacion del telefono en la funcion 'validarFormulario'
			if(val == 2) return 0; 
		}
		else
			return 1;
	}
	else if(!expr.test(email) || email.indexOf('@') == -1){
		return 2;
	}
	return 0;
}
function validarTelefono(telefono, muestraMensaje, checarEmail)
{
	$('#telefono454').css( "border-bottom", "1px solid red" );
	$('#telefono_asterisco').show();
	var val = __validarTelefono(telefono, checarEmail);
	switch(val){
		case 1: if(muestraMensaje) alert('Especifica el correo o teléfono. X'); return 1;
		case 2: if(muestraMensaje) alert('El teléfono no es válido.'); return 2;
	}
	$('#telefono454').css( "border-bottom", "1px solid #9e9e9e" );
	$('#telefono_asterisco').hide();
	return 0;
}
function __validarTelefono(telefono, checarEmail)
{
	telefono = telefono.trim();
	
	var expr = /^([0-9]{10,20})$/;
	if(telefono==''){
		if (checarEmail)
		{
			var email = $('#correo451').val();
			var val = validarEmail(email, false, false);
			if (val != 0)
				return 1;
		}
		else
			return 1;
	}
	else if(!expr.test(telefono))
		return 2;
	return 0;
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
function obtenerMunicipios()
{
	var id_estado = $('#select_estado').val();
	if (id_estado != "OTRO")
	{
		var estado = $("#select_estado option[value='"+id_estado+"']").text()
		var municipio = $('#select_delmun').val();
		
		var arr=[municipio,estado];
		return arr.join();
	}
	else{
		
		var municipio = $('#input_delmun').val();
		var expr = /^([a-zA-Z0-9 _\.\-])+$/;
		if ( !expr.test(municipio) ){ municipio=''; }
		
		return municipio;
	}
}
function validarFormulario(){
	resetTimer();
	var email = $('#correo451').val();
	var telefono = $('#telefono454').val();
	var aceptar = $('#aviso458').is(':checked');
	
	
	if (validarCombos(true) == false){
		return false;
	}
	if (validarNombre() == false)
		return false;
	if (validarApellidos() == false)
		return false;
	if (validarEmail(email,true,true) != 0)
		return false;
	if (validarTelefono(telefono,true,true) != 0){
		return false;
	}
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
	timerHiddenForm = setInterval(timerHiddenForm_Tick, 40000);
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

