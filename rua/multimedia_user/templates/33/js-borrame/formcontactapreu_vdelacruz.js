
      // Get the modal
      var modalrua = null;
      // Get the <span> element that closes the modal
      var span = null;
      var $scopeform = null;
      var opcban=[0,0,0,0,0,0,0];



	/*
  var __webservice_php = 'https://redanahuac.mx/app/prospectos/formapreu.php';
	var __dominio =        'https://redanahuac.mx';
	var __url_aviso_prepa = 'http://anahuac.mx/prepa/gracias';
  */


    //var __webservice_php = 'https://redanahuac.mx/app/prospectos/formapreu_vdelacruz.php';
    var __webservice_php = 'https://prospectos.redanahuac.mx/testformapreu_crm_vdelacruz.php';
	var __dominio =        'https://prospectos.redanahuac.mx';
	var __url_aviso_prepa = 'http://anahuac.mx/prepa/gracias';


window.onload = new function ()
{

	if(typeof jQuery=='undefined') {
		var headTag = document.getElementsByTagName("head")[0];
		var jqTag = document.createElement('script');
		jqTag.type = 'text/javascript';
		jqTag.src = __dominio + '/app/prospectos/views/apreu/js/jquery-2.1.1.min.js';
		//jqTag.onload = InitForm;
		jqTag.onload = loadScriptsForForm_1;
		headTag.appendChild(jqTag);

	} else {

		//InitForm();
		loadScriptsForForm_1();
	}
}





function menucontacto(){
  if (opcban[6]==1) {


	var uni = $scopeform("#menucontacto").data("uni");

	if(uni=='PREPA_NONE'){
		$scopeform('#imgmenucontacto').css({'right':'240px'});
        $scopeform('#menucontactox').css({'display':'block'});
	}else{
		 $scopeform('#imgmenucontacto').css({'right':'0px'});
    $scopeform('#menucontactox').css({'display':'none'},200);

	}

    //$scopeform('#imgmenucontacto').animate({ right: 240},200);
    //$scopeform('#menucontactox').animate({ right:1},200);
    opcban[6]=0;
	//resetTimer();
  }else{


    //$scopeform('#imgmenucontacto').animate({ right: 0},200);


	var uni = $scopeform("#menucontacto").data("uni");

	if(uni=='PREPA_NONE'){
		 $scopeform('#imgmenucontacto').css({'right':'0px'});
        $scopeform('#menucontactox').css({'display':'none'},200);

	}else{
	$scopeform('#imgmenucontacto').css({'right':'310px'});
       $scopeform('#menucontactox').css({'display':'block'});


	}


    opcban[6]=1;
	//closeTimer();
  }
}



function loadScriptsForForm_1()
{
	var headTag = document.getElementsByTagName("head")[0];
	var jqTag = document.createElement('script');
	jqTag.type = 'text/javascript';
	//jqTag.src = 'multimedia_user/templates/33/js/jquery.mask.min.js';
	jqTag.src = __dominio + '/app/prospectos/views/apreu/js/jquery.mask.min.js';
	jqTag.onload = InitForm;
	headTag.appendChild(jqTag);
}
function InitForm(){
      $scopeform = jQuery.noConflict();

	  var uni = $scopeform("#menucontacto").data("uni");


      $scopeform('head').append('<link rel="stylesheet" href="' + __dominio + '/app/prospectos/views/apreu/css/formcontactapreu_vdelacruz.css" type="text/css" />');

	  if(uni == "UAMN"){ $scopeform('#menucontacto').data('uni','UAN'); }
	  else if(uni == "IEST"){ $scopeform('#menucontacto').data('uni','UAT'); }
	  else if(uni == "IJPII"){ $scopeform('#menucontacto').data('uni','ISF'); }


      $scopeform('#menucontacto').css({ top: 258 });
      insertForm();
	  opcban[6]=1;
      menucontacto();//
      resetTimer();
	  getNiveles();
	  getEstados();
	  $scopeform("#programarua6854").prop('disabled', true);
      $scopeform("#campusrua854").prop('disabled', true);
	  $scopeform('#div_delmun_2').hide();
      $scopeform('#nombre_asterisco').hide();
	  $scopeform('#apellidos_asterisco').hide();
	  $scopeform('#email_asterisco').hide();
	  $scopeform('#telefono_asterisco').hide();
    $scopeform('#periodorua6855').hide();



	  // Get the modal
      modalrua = document.getElementById('myModalrua');
      // Get the <span> element that closes the modal
      span = document.getElementsByClassName("close")[0];

	  // When the user clicks on <span> (x), close the modal
      span.onclick = function() {
      modalrua.style.display = 'none';
      }

	   // When the user clicks anywhere outside of the modal, close it
    window.onclick = function(event) {
    if (event.target == modalrua) {
        modalrua.style.display = "none";
        }
     }


	$scopeform(function(){


    $scopeform('#menucontacto').focusout(function() {
    //alert("unfocus");
    });
    });


}



function insertForm(){
	    var uni = $scopeform("#menucontacto").data("uni");

      var htmlfrmcontactmodal = '<!-- The Modal -->';
          htmlfrmcontactmodal += '<div id="myModalrua" style="display:none;" class="modalrua">';

          htmlfrmcontactmodal += '<!-- Modal content -->';
          htmlfrmcontactmodal += '<div class="modal-contentrua">';

          htmlfrmcontactmodal += '<div class="modal-headerrua">';
          htmlfrmcontactmodal += '<span class="close">×</span>';
          htmlfrmcontactmodal += '<h2>¡Muchas gracias por tu interés!</h2>';
          htmlfrmcontactmodal += '</div>';

          htmlfrmcontactmodal += '<div  id="mensaje_general" class="modal-bodyrua">';
          htmlfrmcontactmodal += '<p>Has dado el primer paso para completar tu solicitud de inscripción en uno de nuestros programas.</p>';
          htmlfrmcontactmodal += '<p>Un Especialista en Admisiones se pondrá en contacto contigo para darte más información sobre nuestros programas y contestar cualquier pregunta que tengas.</p>';
          htmlfrmcontactmodal += '<div id="div_posgrados_id"><p>Conoce más en:</p>';
          htmlfrmcontactmodal += '<a href="http://www.posgradosanahuac.mx/" target="_blank"> <img style="width:100px; height:50px; margin: 5px 10px 0 10px;" src="http://www.anahuac.mx/mexico/posgrados/images/PosgradosAnahuac_SaberQueHayMas.png">';
          htmlfrmcontactmodal += '</a></div>';
          htmlfrmcontactmodal += '</div>';

		  htmlfrmcontactmodal += '<!-- inicio aviso prepa Anahuac -->';
		  htmlfrmcontactmodal += '<div id="div_prepa_id" class="modal-bodyrua">';
          htmlfrmcontactmodal += '<p>Has dado el primer paso para completar tu solicitud de inscripción a nuestra Prepa.</p>';
          htmlfrmcontactmodal += '<p>Un Asesor se pondrá en contacto contigo para atender de manera personalizada cualquier consulta o información que requieras.</p>';
          htmlfrmcontactmodal += '<div id="div_url_prepa">';
		  htmlfrmcontactmodal += '<a href="http://anahuac.mx/prepa/" target="_blank" style="font-size:12px !important" >Sitio de Prepa Anáhuac​';
		 // htmlfrmcontactmodal += '<a href="' + __url_aviso_prepa + '" target="_blank">Sitio de Prepa Anáhuac​';
          htmlfrmcontactmodal += '</a></div>';
		  htmlfrmcontactmodal += '<!-- fin aviso prepa Anahuac -->';

          htmlfrmcontactmodal += '</div>';
          htmlfrmcontactmodal += '</div>';




      var htmlfrmcontact = '<div class="rowk4">';
          htmlfrmcontact += '<div class="colk4 l1" >';
            //LIBRERIA

          htmlfrmcontact += '<img src="' + __dominio + '/app/prospectos/views/apreu/imagenes/menucontacto.png" class="responsive-img" id="imgmenucontacto"    onclick="menucontacto()">';
          htmlfrmcontact += '</div>';



          htmlfrmcontact += '<div class="colk4 l11" id="menucontactox" style="display: none;">';
          htmlfrmcontact += '<div class="rowk4 card-panel" id="menucontactop" style="padding: 5px;">';
          htmlfrmcontact += '<form class="colk4 s12" autocomplete="off">';
          htmlfrmcontact += '<div class="rowk4">';

          // NIVEL
          htmlfrmcontact += '<div class="colk4 s12">';
          htmlfrmcontact += '<div class="">';
          htmlfrmcontact += '<select class="browser-default dropdown-select" id="nivelrua4653" onchange="getOrden()" onclick="resetTimer()" onkeydown="resetTimer()">';
          htmlfrmcontact += '<option value="NONE" >Selecciona Nivel ...</option>';
          htmlfrmcontact += '</select>';
          htmlfrmcontact += '</div>';
          htmlfrmcontact += '</div>';

          // PROGRAMA
          htmlfrmcontact += '<div class="input-field colk4 s12">';
          htmlfrmcontact += '<div class="" id="idPC">';
          htmlfrmcontact += '<select class="browser-default dropdown-select" id="programarua6854" onchange="getUniversidades()" onclick="resetTimer()" onkeydown="resetTimer()">';
          htmlfrmcontact += '<option value="NONE" >Programa ...</option>';
          htmlfrmcontact += '</select>';
          htmlfrmcontact += '</div>';
          htmlfrmcontact += '</div>';

          // CAMPUS
          htmlfrmcontact += '<div class="input-field col s12">';

          htmlfrmcontact += '<div class="" id="idCP">';
          htmlfrmcontact += '<select class="browser-default dropdown-select" id="campusrua854" onchange="tooltipmens();" onclick="resetTimer()" onkeydown="resetTimer()">';
          htmlfrmcontact += '<option value="NONE" >Campus de Inter&eacute;s ...</option>';
          htmlfrmcontact += '</select>';
          htmlfrmcontact += '</div><div class="input-field col s12"><div id="campusruaTol" style="display: none; background:#000; color:#fff; padding:10px; width:360px; position:fixed !important; right:350px;" ><span style="font-size: 10px "  >Programa parcial: Estas licenciaturas se ofrecen parcialmente en el campus seleccionado en una licenciatura afín, para posteriormente transferirse a otro campus que ofrezca el programa completo.</span></div></div>';

         //periodo de interes
         htmlfrmcontact += '<div class="input-field colk4 s12">';
         htmlfrmcontact += '<div class="" id="idPC">';
           htmlfrmcontact += '<select class="browser-default dropdown-select" id="periodorua6855"  onclick="resetTimer()" onkeydown="resetTimer()">';
       htmlfrmcontact += '<option value="NONE" >Período de interés</option>';

       var dateObj = new Date();
var month = dateObj.getUTCMonth() + 1; //months from 1-12
var day = dateObj.getUTCDate();
var year = dateObj.getUTCFullYear();

newdate = year + "/" + month + "/" + day;
htmlfrmcontact += newdate;
if(month>=7)
{
         htmlfrmcontact +='<option value="'+ (year + 1) +'10">Enero - ' + (year + 1) +'</option>';
         htmlfrmcontact +='<option value="'+ (year + 1) +'60">Agosto - ' + (year + 1) +'</option>';
         htmlfrmcontact +='<option value="'+ (year + 2) +'10">Enero - ' + (year + 2) +'</option>';
        //  htmlfrmcontact +='<option value="'+ (year + 2) +'60">Agosto - ' + (year + 2) +'</option>';
      //    htmlfrmcontact +='<option value="'+ (year + 3) +'10">Enero - ' + (year + 3) +'</option>';

}
else {
  htmlfrmcontact +='<option value="'+ (year) +'60">Agosto - ' + (year) +'</option>';
  htmlfrmcontact +='<option value="'+ (year + 1) +'10">Enero - ' + (year + 1) +'</option>';
   htmlfrmcontact +='<option value="'+ (year + 1) +'60">Agosto - ' + (year + 1) +'</option>';
   //htmlfrmcontact +='<option value="'+ (year + 2) +'10">Enero - ' + (year + 2) +'</option>';
// htmlfrmcontact +='<option value="'+ (year + 2) +'60">Agosto - ' + (year + 2) +'</option>';

}
         htmlfrmcontact += '</select>';
         htmlfrmcontact += '</div>';
         htmlfrmcontact += '</div>';
		  // NOMBRE
          htmlfrmcontact += '<div class="input-field colk4 s12">';
          htmlfrmcontact += '<img src="' + __dominio + '/app/prospectos/views/apreu/imagenes/Icono-persona.png" class="imgapreu" />';
          htmlfrmcontact += '<input id="nombre457" class="inputformapreu" type="text" placeholder="Nombre" onclick="resetTimer()" onkeydown="resetTimer()" onchange="resetTimer()"><i id="nombre_asterisco" style="font-size:13pt;color:red">*</i></input>';
          htmlfrmcontact += '</div>';

// APELLIDO PATERNO, MATERNO
          htmlfrmcontact += '<div class="input-field colk4 s12">';
          htmlfrmcontact += '<input id="apellidos754" class="inputformapreu" type="text" style="width: 84px; margin-left: 30px; margin-right: 0px;"  placeholder="Apellido paterno" onclick="resetTimer()" onkeydown="resetTimer()" onchange="resetTimer()"><i id="apellidos_asterisco" style="font-size:13pt;color:red; visibility:hidden;">*</i></input>';
          htmlfrmcontact += '<span style="position:relative; top:3px;"> <strong>/</strong></span> <input id="apellidos755" class="inputformapreu" type="text" style="float: right; width: 89px; margin-right: 84px; margin-left: 0px;" placeholder="Apellido materno" onclick="resetTimer()" onkeydown="resetTimer()" onchange="resetTimer()"><i id="amaterno_asterisco" style="font-size:13pt;color:red; visibility:hidden;">*</i></input>';
	      htmlfrmcontact += '</div>';

		  // APELLIDOS
         /* htmlfrmcontact += '<div class="input-field colk4 s12">';
          htmlfrmcontact += '<input id="apellidos754" class="inputformapreu" type="text"  placeholder="Apellidos" onclick="resetTimer()" onkeydown="resetTimer()" onchange="resetTimer()"><i id="apellidos_asterisco" style="font-size:13pt;color:red">*</i></input>';
          htmlfrmcontact += '</div>';*/
		  // CORREO
          htmlfrmcontact += '<div class="input-field colk4 s12">';
          htmlfrmcontact += '<img src="' + __dominio + '/app/prospectos/views/apreu/imagenes/Icono-correo.png" class="imgapreu" />';
          htmlfrmcontact += '<input id="correo451" class="inputformapreu" type="text" placeholder="Correo" onclick="resetTimer()" onkeydown="resetTimer()" onchange="resetTimer()"><i id="email_asterisco" style="font-size:13pt;color:red">*</i></input>';
          htmlfrmcontact += '</div>';

          // TELEFONO
          htmlfrmcontact += '<div class="input-field colk4 s12">';
          htmlfrmcontact += '<img src="' + __dominio + '/app/prospectos/views/apreu/imagenes/Icono-telefono.png" class="imgapreu" />';
          //htmlfrmcontact += '<input id="telefono454" class="inputformapreu" type="text" placeholder="Telefono" onclick="resetTimer()" onkeydown="resetTimer()" onchange="resetTimer()"><i id="telefono_asterisco" style="font-size:13pt;color:red">*</i></input>';
		  htmlfrmcontact += '<input id="telefono454" type="text" class="phone_with_ddd inputformapreu" placeholder="Teléfono" onclick="resetTimer()" onkeydown="resetTimer()" onchange="resetTimer()"><i id="telefono_asterisco" style="font-size:13pt;color:red">*</i></input>';
          htmlfrmcontact += '</div>';

          // ESTADO

          htmlfrmcontact += '<div class="input-field colk4 s12" style="margin-top:3px;">';
          htmlfrmcontact += '<div class="">';
          htmlfrmcontact += '<select class="browser-default dropdown-select" id="select_estado" onchange="changeEstado()" onclick="resetTimer()">';
          htmlfrmcontact += '<option value="NONE" >Estado ...</option>';
          htmlfrmcontact += '</select>';
          htmlfrmcontact += '</div>';
          // DELEGACION/MUNICIPIO - COMBOBOX

          htmlfrmcontact += '<div class="input-field colk4 s12">';
          htmlfrmcontact += '<div class="" id="div_delmun_1">';
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
          htmlfrmcontact += '<a href="javascript:poponloadAviso()" class="aviso"> Aviso de privacidad</a>';
          htmlfrmcontact += '</div>';
  htmlfrmcontact += '<div style="height: 20px;"></div>';
          htmlfrmcontact += '<div class="input-field colk4 s12" align="center">';
          htmlfrmcontact += '<a id="buttonSend" class="waves-effect98 waves-light5645 btn9796 orange0976" onclick="sendMessage457();" style="font-size: 1rem;">Enviar</a>';
          htmlfrmcontact += '</div>';

          htmlfrmcontact += '</div>';
          htmlfrmcontact += '</form>';
          htmlfrmcontact += '</div>';
          htmlfrmcontact += '</div>';
          htmlfrmcontact += '</div>';
          htmlfrmcontact += '</div>';

          $scopeform("#menucontacto").html(htmlfrmcontact);

          $scopeform("#menucontacto").after(htmlfrmcontactmodal);

		  $scopeform('#telefono454').mask('(00) 0000-0000');


		  buttonSend_finish();
}



function getNiveles()
{
	 var uni = $scopeform("#menucontacto").data("uni");

	$scopeform("#campusruaTol").hide();
	$scopeform("#programarua6854").html('<option value="NONE">Programa...</option>');
	$scopeform("#campusrua854").html('<option value="NONE">Campus de Inter&eacute;s...</option>');

	$scopeform.ajax({
		url: __webservice_php + "?method=getNiveles",
		dataType: 'jsonp',
		jsonp: 'callback',
		contentType: "application/json; charset=utf-8",
		data: {},
		complete:function(data){
			// console.dir(data.responseText);
		},
		success: function(msg){
			$scopeform('#nivelrua4653').html(msg);
	  if(uni == "PREPA"){

			  $scopeform('#nivelrua4653').val(8);
			  $scopeform("#nivelrua4653").prop('disabled', true);
			 // $scopeform("#programarua6854").prop('disabled', true);
			//  $scopeform("#campusrua854").prop('disabled', true);

			  getOrden();
		}


		}

	});

}


function getOrden()
{

	      $scopeform("#campusruaTol").hide();
       	  $scopeform("#programarua6854").html('<option value="NONE">Programa...</option>');
		  $scopeform("#campusrua854").html('<option value="NONE">Campus de Inter&eacute;s...</option>');

	      var nivel = $scopeform('#nivelrua4653').val();

		   if((nivel=='NONE')  ){

		   	  $scopeform("#programarua6854").prop('disabled', true);
			  $scopeform("#campusrua854").prop('disabled', true);
			  $scopeform("#ciudad").prop('disabled', true);

		   }else if( nivel == 2 || nivel == 3 || nivel == 8){//Preparatoria,licenciaturas y Maestrias en linea

		    $scopeform('#idPC').html('<select class="browser-default dropdown-select" id="programarua6854" onchange="getUniversidades()" onclick="resetTimer()" onkeydown="resetTimer()"><option value="NONE" >Programa ...</option></select>');

		    $scopeform('#idCP').html('<select class="browser-default dropdown-select" id="campusrua854" onchange="tooltipmens();" onclick="resetTimer()" onkeydown="resetTimer()"><option value="NONE" >Campus de Inter&eacute;s ...</option></select></div>');

		   	   getPrograms();

		   }else{//Posgrados: MP,Doct,Esp


		   $scopeform('#idPC').html('<select class="browser-default dropdown-select" id="campusrua854" onchange="getProgramsPos()" onclick="resetTimer()" onkeydown="resetTimer()"><option value="NONE" >Campus de Inter&eacute;s ...</option></select></div>');

		   $scopeform('#idCP').html('<select class="browser-default dropdown-select" id="programarua6854" onchange="" onclick="resetTimer()" onkeydown="resetTimer()"><option value="NONE" >Programa ...</option></select>');

		   	  getUniversidadesPos();

		   }

}




function getUniversidadesPos(){


	    $scopeform("#campusruaTol").hide();
		var nivel = $scopeform('#nivelrua4653').val();


		$scopeform("#ciudad457").prop('disabled', false);
		$scopeform("#campusrua854").html('<option value="NONE">Campus de Inter&eacute;s...</option>');


		$scopeform.ajax({
			url: __webservice_php + "?method=getUniversidadesPos",
			dataType: 'jsonp',
			jsonp: 'callback',
			contentType: "application/json; charset=utf-8",
			data: { nivel:nivel},
			complete:function(data){
             // console.dir(data.responseText);
			},
			success: function(msg)
			{

				//alert(msg);
				$scopeform("#campusrua854").prop('disabled', false);
				$scopeform('#campusrua854').html(msg);


				var programa_length = $scopeform('#campusrua854').find("option").length;

				if (programa_length == 2)
				{
					$scopeform('#campusrua854 :nth-child(2)').prop('selected', true);
				}else{

				    var uni = $scopeform("#menucontacto").data("uni");
					var find =$scopeform("#campusrua854 option[value='"+uni+"']").length;

					if(find>0){
					 $scopeform("#campusrua854").val(uni);
					}

				}

			getProgramsPos();

			}
		});
}

function getProgramsPos()
{

	      $scopeform("#campusruaTol").hide();
       	  $scopeform("#programarua6854").html('<option value="NONE">Programa...</option>');
		//  $scopeform("#campusrua854").html('<option value="NONE">Campus de Inter&eacute;s...</option>');

	       var nivel = $scopeform('#nivelrua4653').val();
         console.log('nivel pos='+nivel);
         if(nivel==2)
         {
           $scopeform('#periodorua6855').show();
         }
         else {
           $scopeform('#periodorua6855').hide();
         }
	       var campus = $scopeform('#campusrua854').val();

		   if((campus=='NONE')){

		      $scopeform("#programarua6854").html('<option value="NONE">Programa...</option>');
		      $scopeform("#programarua6854").prop('disabled', true);
			//  $scopeform("#campusrua854").html('<option value="NONE">Campus de Inter&eacute;s...</option>');

			  //$scopeform("#campusrua854").prop('disabled', true);
			  $scopeform("#ciudad").prop('disabled', true);

		   }else{


		  // alert('programu');
		$scopeform.ajax({
        url: __webservice_php + "?method=getProgramsPos",
        dataType: 'jsonp',
		jsonp: 'callback',
        contentType: "application/json; charset=utf-8",
        data: { nivel:nivel,campus:campus},
        complete:function(data){

		 // console.dir(data.responseText);

        },
        success: function(msg){

               $scopeform("#programarua6854").prop('disabled', false);
			   $scopeform("#ciudad").prop('disabled', false);

			   $scopeform('#programarua6854').html(msg);

         }
           });

		   }
}


function getPrograms()
{

	      $scopeform("#campusruaTol").hide();
       	  $scopeform("#programarua6854").html('<option value="NONE">Programa...</option>');
		  $scopeform("#campusrua854").html('<option value="NONE">Campus de Inter&eacute;s...</option>');

	       var nivel = $scopeform('#nivelrua4653').val();
        console.log('nivel='+nivel);
        if(nivel==2)
        {
          $scopeform('#periodorua6855').show();
        }
        else {
          $scopeform('#periodorua6855').hide();
        }
		   var uni = $scopeform("#menucontacto").data("uni"); /********CAMBIO IEST****************/


		   if( nivel=='NONE' ){


		     // $scopeform("#programarua6854").prop('disabled', true);
			  $scopeform("#campusrua854").prop('disabled', true);
			  $scopeform("#ciudad").prop('disabled', true);

		   }

		   else if ( nivel== 8 && uni=='UAT'){ /********CAMBIO IEST****************/


			  $scopeform("#ciudad").prop('disabled', true);
              $scopeform("#programarua6854").prop('disabled', true);
			  $scopeform("#campusrua854").html('<option value="UAT">IEST Anáhuac</option>');

		   }

		   else{


		  // alert('programu');
		$scopeform.ajax({
        url: __webservice_php + "?method=getPrograms",
        dataType: 'jsonp',
		jsonp: 'callback',
        contentType: "application/json; charset=utf-8",
        data: { nivel:nivel},
        complete:function(data){

		 // console.dir(data.responseText);

        },
        success: function(msg){


               $scopeform("#programarua6854").prop('disabled', false);
			   $scopeform("#ciudad").prop('disabled', false);

			  if(nivel == 3){


			    $scopeform("#campusrua854").html('<option value="NONE">Campus de Inter&eacute;s...</option>');
			    $scopeform("#ciudad457").prop('disabled', true);
			    $scopeform("#campusrua854").prop('disabled', true);

			  }

			   $scopeform('#programarua6854').html(msg);

			   if(nivel == 8){
			   //$scopeform('#programarua6854 :nth-child(2)').prop('selected', true);
						$scopeform("#programarua6854").val($scopeform("#programarua6854 option:eq(1)").val());
                         getUniversidades();
			   }
         }
           });

		   }
}


function tooltipmens(){

	//$scopeform("#campusruaTol").hide();
	closeTimer2();
		//var id = id.trim();
		var opcion = $scopeform("#campusrua854 option:selected").text();
	    var findme = "*";

		if ( opcion.indexOf(findme) > -1 ) {

	//	$scopeform("#campusruaTol").html('<span style="font-size: 10px !important;"  >"Programa parcial: Estas licenciaturas se ofrecen parcialmente en el campus seleccionado en una licenciatura afín, para posteriormente transferirse a otro campus que ofrezca el programa completo."</span>');
		 $scopeform("#campusruaTol").show();


		//terminarTooltipYa();


		} else {
		//	$scopeform("#campusruaTol").html('');
		    $scopeform("#campusruaTol").hide();
		}



}

var timertooltip= null;
function terminarTooltipYa(){

	closeTimer2();

    timertooltip = setInterval(function(){
   // $scopeform("#campusruaTol").html('');
    $scopeform("#campusruaTol").hide();
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



	  //	$scopeform("#campusruaTol").html('');
	     $scopeform("#campusruaTol").hide();
	    var programa = $scopeform('#programarua6854').val();
		var nivel = $scopeform('#nivelrua4653').val();


	if(programa=='NONE' /*|| (nivel != 2 && nivel !=4 && nivel !=5 && nivel !=6 )*/){//cambio

        //  alert('entro');
		$scopeform("#campusrua854").html('<option value="NONE">Campus de Inter&eacute;s...</option>');
		$scopeform("#ciudad457").prop('disabled', true);
		$scopeform("#campusrua854").prop('disabled', true);

	}else{

		// alert('entroajax');

		$scopeform("#ciudad457").prop('disabled', false);

		$scopeform("#campusrua854").html('<option value="NONE">Campus de Inter&eacute;s...</option>');

		$scopeform.ajax({
			url: __webservice_php + "?method=getUniversidades",
			dataType: 'jsonp',
			jsonp: 'callback',
			contentType: "application/json; charset=utf-8",
			data: { programa:programa,nivel:nivel},
			complete:function(data){

				// console.dir(data.responseText);

			},
			success: function(msg)
			{

				//alert(msg);
				$scopeform("#campusrua854").prop('disabled', false);
				$scopeform('#campusrua854').html(msg);



				var programa_length = $scopeform('#campusrua854').find("option").length;

				console.log(programa_length);

				if (programa_length == 2)
				{
					$scopeform('#campusrua854 :nth-child(2)').prop('selected', true);
				}else{

				    var uni = $scopeform("#menucontacto").data("uni");
					var find =$scopeform("#campusrua854 option[value='"+uni+"']").length;


					console.log(uni);

				console.log(find);



					if(find>0){
					 $scopeform("#campusrua854").val(uni);
					}

				}

				tooltipmens();


			}
		});
	}
}

function getEstados()
{
	$scopeform.ajax({
		url: __webservice_php + '?method=getEstados',
		dataType: 'jsonp',
		jsonp: 'callback',
		contentType: 'application/json; charset=utf-8',
		data: {},
		complete:function(data){
			// console.dir(data.responseText);
		},
		success: function(msg)
		{
			$scopeform('#select_estado').html(msg+'<option value="OTRO">Otro</option>');
		}
	});

}

function getMunicipios()
{
	var estado = ''+$scopeform('#select_estado').val();
	$scopeform.ajax({
		url: __webservice_php + '?method=getMunicipios&estado=' + estado,
		dataType: 'jsonp',
		jsonp: 'callback',
		contentType: "application/json; charset=utf-8",
		data: {},
		complete:function(data){
			// console.dir(data.responseText);
		},
		success: function(msg){
			$scopeform('#select_delmun').html(msg);
		}
	});
}


function changeEstado()
{
	var estado = ''+$scopeform('#select_estado').val();
	if(estado=="OTRO")
	{
		$scopeform('#div_delmun_1').hide();
		$scopeform('#div_delmun_2').show();
	}
	else{

		$scopeform('#input_delmun').val('');

		$scopeform('#div_delmun_1').show();
		$scopeform('#div_delmun_2').hide();
		getMunicipios();
	}
}



function extractDomain() {
    var url = window.location.href;
    var domain;
    //find & remove protocol (http, ftp, etc.) and get domain
    if (url.indexOf("://") > -1) {
        domain = url.split('/')[2];
    }
    else {
        domain = url.split('/')[0];
    }

    //find & remove port number
    domain = domain.split(':')[0];

    return domain;
}


function sendMessage457(){

	$scopeform("#campusruaTol").hide();
	closeTimer2();

	if(validarFormulario() == false)
		return;

	var uni = $scopeform("#menucontacto").data("uni");
	var nivel =   $scopeform('#nivelrua4653').val();
	var codigo = $scopeform('#nivelrua4653').find(':selected').data('codigo');
  /* vdelacruz */
  var periodo = $scopeform('#periodorua6855').val();
  /* vdelacruz */
	var programa = $scopeform('#programarua6854').val();
	var descripcion = $scopeform('#programarua6854').find(':selected').text();
	var campus = $scopeform('#campusrua854').val();
	var nombre =  $scopeform('#nombre457').val();
	var apellidoPaterno = $scopeform('#apellidos754').val();
	var apellidoMaterno = $scopeform('#apellidos755').val();
	//var apellidos = $scopeform('#apellidos754').val();
	var correo = $scopeform('#correo451').val();
	var telefono = $scopeform('#telefono454').val().replace('(','').replace(')','').replace('-','').replace(' ','');
	var code = $scopeform("#programarua6854").find(':selected').data('code');
	var verticalcode =  $scopeform("#programarua6854").find(':selected').data('verticalcode');
	var url = window.location.href;


	var ciudad = obtenerCiudad();
	var claveEstado = obtenerClaveEstado();
	var claveMunicipio = obtenerClaveMunicipio();
	var otroEstado = $scopeform('#input_delmun').val();


	var municipio = obtenerMunicipios();

	var url_webservice = __webservice_php + '?method=Guardar';
	buttonSend_Sending();
	if(uni == 'PREPA'){


	//

		location.href = __url_aviso_prepa;



	}else{

			modalrua.style.display = "block";

			if ( nivel== 8&& uni != 'UAT'){

				$scopeform("#mensaje_general").hide();//
				$scopeform("#div_prepa_id").show();
                //$scopeform("#div_url_prepa").show();


			}	else{

					$scopeform("#mensaje_general").show();//
					$scopeform("#div_prepa_id").hide();

				}






		}


	var universidadPagina = $scopeform("#menucontacto").data("uni");//cambio


	var data = {
			 nivel:nivel
			,codigo:codigo
			,programa:programa
			,descripcion:descripcion
			,code:code
			,verticalcode:verticalcode
			,campus:campus
			,nombre:nombre
			,apellidos:apellidoPaterno+' ' + apellidoMaterno
			,apellidoPaterno:apellidoPaterno
			,apellidoMaterno:apellidoMaterno
			,correo:correo
			,telefono:telefono
			,ciudad:ciudad
			,claveEstado:claveEstado
			,claveMunicipio:claveMunicipio
			,otroEstado:otroEstado
			,url:url
			,universidadPagina:universidadPagina
      /* vdelacruz */
      ,periodo:periodo
	};



	$scopeform.ajax({
        url: url_webservice,
		dataType: 'jsonp',
		jsonp: 'callback',
        contentType: "application/json; charset=utf-8",
        data: data,
        success: function(msg){

		if(console)
				console.log('idprospecto=msg => \''+msg+'\'');
        	//*
			$scopeform('#nivelrua4653').val("NONE");
			$scopeform("#programarua6854").html('<option value="NONE">Programa ...</option>');
			$scopeform("#programarua6854").prop('disabled', true);
			$scopeform("#campusrua854").html('<option value="NONE" >Campus de Inter&eacute;s ...</option>');
			$scopeform("#campusrua854").prop('disabled', true);

			$scopeform('#nombre457').val('');
			$scopeform('#apellidos754').val('');
			$scopeform('#apellidos755').val('');
			$scopeform('#correo451').val('');
			$scopeform('#telefono454').val('');
			$scopeform('#input_delmun').val('');

			$scopeform('#select_estado').val('NONE');
			$scopeform('#select_delmun').html('<option value="NONE" >Delegaci&oacute;n o municipio ...</option>');
			$scopeform('#input_delmun').val('');
			$scopeform("#aviso458").attr('checked', false);
			//*/
			buttonSend_finish();

			var idprospecto = parseInt(msg);
			if (!isNaN(idprospecto) && idprospecto > 0){
				data.idprospecto=idprospecto;
				sendToCRM(data);
			}
        },
		error: function(msg){
			if(console)
				console.log('error,msg:'+msg);

			buttonSend_finish();
		}
	});
}

function sendToCRM(data)
{
	$scopeform.ajax({
        url: __webservice_php + '?method=EnviarCRM',
		dataType: 'jsonp',
		jsonp: 'callback',
        contentType: "application/json; charset=utf-8",
        data: data,
        success: function(msg){
			if(console)
				console.log('msg:'+msg);
        	validaErrorCRM(msg, false);
        },
		error: function(msg){
			if(console)
				console.log('error,msg:'+msg);
			validaErrorCRM(msg, true);
		}
	});
}

function validaErrorCRM(msg)
{
	if( typeof msg === 'string' ) {
		if(0<=msg.indexOf('"Message"'))
			alert('Ha ocurrido un error en el envío al crm.\n'+subMessage(msg));
		if (console)
			console.log('msg:'+msg);
		return;
	}
	else if( typeof msg === 'object' ){
		try{
			if(0<=msg.responseText.indexOf('"Message"')){
				alert('Ha ocurrido un error en el envío al crm.\n'+subMessage(msg.responseText));
				if (console)
					console.log('responseText:'+msg.responseText);
			}
			return;
		}
		catch(Exception){}
		alert('Ocurrio un error en el envío.\n'+msg);
		if (console)
			console.log('msg:'+msg);
		return;
	}
}

function subMessage(msg)
{
	var index_1 = msg.indexOf('"Message"');
	if(0<=index_1){
		index_1 += 9;
		index_1 = msg.indexOf('"',index_1);
		if (0<=index_1){
			index_1++;
			var index_2 = msg.indexOf('"',index_1);
			if(0<=index_2){
				return msg.substring(index_1, index_2);
			}
		}
	}
	return '';
}

function buttonSend_Sending()
{
	$scopeform('#buttonSend').html('Enviar <img src="' + __dominio + '/app/prospectos/views/apreu/imagenes/loading.gif">');
}
function buttonSend_finish()
{
	$scopeform('#buttonSend').html('Enviar <img src="' + __dominio + '/app/prospectos/views/apreu/imagenes/send.png">');
}




// ___________________________________________________________________________
function validarNombre()
{
	var texto = $scopeform('#nombre457').val();
	if(texto.trim()==''){
		alert('Especifica el nombre.');
		$scopeform('#nombre457').css( "border-bottom", "1px solid red" );
		$scopeform('#nombre457').html('');
		$scopeform('#nombre_asterisco').show();
		return false;
	}
	/*else{
		var expr = /^([a-zA-Z0-9_\.\-])+$scopeform/;
		if ( !expr.test(texto) ){ alert('El nombre "' + texto + '" no es valido.'); return false; }
	}*/

	$scopeform('#nombre457').css( "border-bottom", "1px solid #9e9e9e" );
	$scopeform('#nombre_asterisco').hide();
	return true;
}
function validarApellidos()
{
	var texto = $scopeform('#apellidos754').val();
	if(texto.trim()==''){
	alert('Especifica el apellido paterno.');
	$scopeform('#apellidos754').css( "border-bottom", "1px solid red" );
	$scopeform('#apellidos_asterisco').show(); return false;
	}
	/*else{
		var expr = /^([a-zA-Z0-9_\.\-])+$scopeform/;
		if ( !expr.test(texto) ){ alert('Los apellidos "' + texto + '" no son validos.'); return false; }
	}*/
	$scopeform('#apellidos754').css( "border-bottom", "1px solid #9e9e9e" );
	$scopeform('#apellidos_asterisco').hide();
	return true;
}
function validarEmail(email, muestraMensaje, checarTelefono)
{
	$scopeform('#correo451').css( "border-bottom", "1px solid red" );
	$scopeform('#email_asterisco').show();
	var val = __validarEmail(email, checarTelefono);
	switch(val){
		case 1: if(muestraMensaje) alert('Por favor especifica el correo electrónico.'); return 1;
		case 2: if(muestraMensaje) alert('La dirección de correo no es válida'); return 2;
		case -1: return -1;
	}
	$scopeform('#correo451').css( "border-bottom", "1px solid #9e9e9e" );
	$scopeform('#email_asterisco').hide();
	return 0;
}
function __validarEmail(email, checarTelefono)
{
	email = email.trim();

	//var expr = /^([a-zA-Z0-9_\.\-@])+$/;
	var expr = /^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/;



	if(email=='')
	{
		if (checarTelefono)
		{
			var telefono = $scopeform('#telefono454').val().replace('(','').replace(')','').replace('-','').replace(' ','');
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
	$scopeform('#telefono454').css( "border-bottom", "1px solid red" );
	$scopeform('#telefono_asterisco').show();
	var val = __validarTelefono(telefono, checarEmail);
	switch(val){
		case 1: if(muestraMensaje) alert('Por favor especifica el teléfono.'); return 1;
		case 2: if(muestraMensaje) alert('El teléfono no es válido.'); return 2;
	}
	$scopeform('#telefono454').css( "border-bottom", "1px solid #9e9e9e" );
	$scopeform('#telefono_asterisco').hide();
	return 0;
}
function __validarTelefono(telefono, checarEmail)
{
	//telefono = telefono.replace('(','').replace(')','').replace('-','').replace(' ','');
	//console.log('telefono:"'+telefono+'", len='+telefono.length);

	var expr = /^([0-9]{10,20})$/;
	if(telefono==''){
		/*
		if (checarEmail)
		{
			var email = $scopeform('#correo451').val();
			var val = validarEmail(email, false, false);
			if (val != 0)
				return 1;
		}
		else
			return 1;
		//*/
	}
	else if(!expr.test(telefono))
		return 2;
	return 0;
}
function validarEstado(){

	var estado = $scopeform('#select_estado').val();
	var delmun = $scopeform('#select_delmun').val();
	if(estado=='NONE'){
		alert('Por favor especifica el estado.');
		return false;
	}
	else if(estado=='OTRO'){
		var delmun = $scopeform('#input_delmun').val().trim();
		if(delmun.length<3){
			alert('Por favor especifica un dato válido. ');
			return false;
		}
	}
	else{
		if (delmun == "NONE"){
			alert('Por favor especifica la delegación o municipio. ');
			return false;
		}
	}
	return true;
}
function validarCombos(muestraMensaje)
{
	var nivel = $scopeform('#nivelrua4653').val();
	if (nivel==2 || nivel==3) // Si es licenciatura o maestria ...
	{
		var programa = $scopeform('#programarua6854').val();
		if (programa != "NONE")
		{
			/*if (nivel==3)
				return true;
			else
			{*/ // Solo para licenciatura
				var campus = $scopeform('#campusrua854').val();
				if (campus != "NONE")
					return true;
				else
					if(muestraMensaje) alert('Selecciona un campus.');
			//}
		}
		else
			if(muestraMensaje) alert('Selecciona un programa.');
	}
	else if(nivel==4){


		var programa = $scopeform('#programarua6854').val();
		if (programa != "NONE")
		{
				var campus = $scopeform('#campusrua854').val();
				if (campus != "NONE")
					return true;
				else
					if(muestraMensaje) alert('Selecciona un campus.');

		}
		else
			if(muestraMensaje) alert('Selecciona un programa.');




	}else if( nivel==5){

	        //cambio

	        var programa = $scopeform('#programarua6854').val();
		if (programa != "NONE")
		{
				var campus = $scopeform('#campusrua854').val();
				if (campus != "NONE")
					return true;
				else
					if(muestraMensaje) alert('Selecciona un campus.');

		}
		else
			if(muestraMensaje) alert('Selecciona un programa.');


	}else if( nivel==6){



	        var programa = $scopeform('#programarua6854').val();
		if (programa != "NONE")
		{
				var campus = $scopeform('#campusrua854').val();
				if (campus != "NONE")
					return true;
				else
					if(muestraMensaje) alert('Selecciona un campus.');

		}
		else
			if(muestraMensaje) alert('Selecciona un programa.');


	}
	//cambio 3 prepa
	else if( nivel==8){
	       return true;
	}
	else
		if(muestraMensaje) alert('Selecciona un nivel de estudios.');
	return false;
}
function obtenerCiudad()
{
	var id_estado = $scopeform('#select_estado').val();
	if (id_estado != "OTRO")
	{
		var estado = $scopeform('#select_estado').find(':selected').text();
		var municipio = $scopeform('#select_delmun').find(':selected').text();

		var arr=[municipio, estado];
		return arr.join();
	}
	else{

		var municipio = $scopeform('#input_delmun').val();
		var expr = /^([a-zA-Z0-9 _\.\-])+$scopeform/;
		if ( !expr.test(municipio) ){ municipio=''; }

		return municipio;
	}
}
function obtenerClaveEstado(){
	var id_estado = $scopeform('#select_estado').val();
	if (id_estado == "OTRO")
		return 'FR';
	else
		return $scopeform("#select_estado").find(':selected').data('clave');
}

function obtenerClaveMunicipio(){
	var id_estado = $scopeform('#select_estado').val();
	if (id_estado == "OTRO")
		return '20000';
	else
		return $scopeform('#select_delmun').find(':selected').data('clave');
}


function obtenerMunicipios()
{
	var id_estado = $scopeform('#select_estado').val();
	if (id_estado != "OTRO")
	{
		var estado = $scopeform("#select_estado option[value='"+id_estado+"']").text()
		var municipio = $scopeform('#select_delmun').val();

		var arr=[municipio,estado];
		return arr.join();
	}
	else{

		var municipio = $scopeform('#input_delmun').val();
		var expr = /^([a-zA-Z0-9 _\.\-])+$scopeform/;
		if ( !expr.test(municipio) ){ municipio=''; }

		return municipio;
	}
}
function validarFormulario(){
	resetTimer();
	var email = $scopeform('#correo451').val();
	var telefono = $scopeform('#telefono454').val().replace('(','').replace(')','').replace('-','').replace(' ','');
	if(telefono=='')
		$scopeform('#telefono454').val('');
	var aceptar = $scopeform('#aviso458').is(':checked');

	if (validarCombos(true) == false){
		return false;
	}
	if (validarNombre() == false)
		return false;
	if (validarApellidos() == false)
		return false;
	if (validarEmail(email,true,false) != 0)
		return false;
	if (validarTelefono(telefono,true,false) != 0)
		return false;
	if (validarEstado() == false)
		return false;

	if (aceptar==false){
		alert('Atención\n Debes de aceptar los términos y condiciones.');
		return false;
	}

	// Si se ha seleccionado un doctorado o una maestria presencial de la Norte.
	var nivel  = $scopeform('#nivelrua4653').val();
	var campus = $scopeform('#campusrua854').val();
	if ((nivel==4 || nivel==5) && campus=='UAN')
		$scopeform('#div_posgrados_id').show();
	else
		$scopeform('#div_posgrados_id').hide();


	return true;
}

// ___________________________________________________________________________
var timerHiddenForm=null;
function resetTimer(){
	closeTimer();
	//console.log('resetTimer');
	timerHiddenForm = setInterval(timerHiddenForm_Tick, 40000); // 20,000 ms
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
    avisowindow = window.open(__dominio + "/mobile/aviso.html", "Aviso de Privacidad", "location=1,status=1,scrollbars=1,width=700,height=500");
    avisowindow.moveTo(0, 0);
}


/*function IniciarSesion(){
	var usuario = '00125238';
	var password = '280487';

	var websevicename = 'security/getUserInfo';
	var url = 'http://redanahuac.mx/mobile/webservice/curl.php';

}*/
