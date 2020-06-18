
      var modalrua = null;
     
      var span = null;
      var $scopeform = null;
      var opcban=[0,0,0,0,0,0,0];
	  //console.log(window.location.host);
var myArrProd = null;
var response = null;
var response2 = null;
var es_pruebas = null;
var es_produccion = null;
var __webservice_php = null;
		var __dominio =     null;
		var __url_home =        null;
		var __url_aviso_prepa = null;
		var __webservice_php_leads = null;

var xhrUNO = new XMLHttpRequest();
var xhrDOS = new XMLHttpRequest();
 
cargaAmbientes();
 
function processRequestUNO(e) {

if (xhrUNO.readyState == 4 && xhrUNO.status == 200) {
        response = JSON.parse(xhrUNO.responseText);
        //console.log('processRequestUNO '+ response[0]);
		es_produccion = inArray(window.location.host,response); 
		 //console.log('es_produccion '+ es_produccion);
		 if (es_pruebas)
			{
			/*__webservice_php = 'https://test.redanahuac.mx/app/prospectos/testformapreu_crm_vdelacruz.php';
			__dominio =        'https://test.redanahuac.mx';
			__url_home =        'https://test.anahuac.mx';
			__url_aviso_prepa = 'https://prepap.anahuac.mx/gracias';
		__webservice_php_leads = 'https://leads-p.azurewebsites.net/api/leads';*/
		
		
		__webservice_php = 'https://testprospectos.redanahuac.mx/testformapreu_crm_vdelacruz.php';
			__dominio =        'https://testprospectos.redanahuac.mx';
			__url_home =        'https://test.anahuac.mx';//*REVISAR
			__url_aviso_prepa = 'https://prepap.anahuac.mx/gracias';
		__webservice_php_leads = 'https://leads-p.azurewebsites.net/api/leads';
		
		
		
		
		cargaventana();
		
		
			}
		if(es_produccion)

			{
				
		/*__webservice_php = 'https://redanahuac.mx/app/prospectos/testformapreu_crm_vdelacruz.php';
		__dominio =        'https://redanahuac.mx';
		__url_home =        'https://anahuac.mx';
		__url_aviso_prepa = 'https://prepa.anahuac.mx/gracias';
		__webservice_php_leads = 'https://leads.redanahuac.mx/api/leads';*/
		
		
		__webservice_php = 'https://prospectos.redanahuac.mx/testformapreu_crm_vdelacruz.php';
		__dominio =        'https://prospectos.redanahuac.mx';
		__url_home =        'https://anahuac.mx';
		__url_aviso_prepa = 'https://prepa.anahuac.mx/gracias';
		__webservice_php_leads = 'https://leads.redanahuac.mx/api/leads';
		
		
			cargaventana();
		
		}
		//cargaventana();

    }
 
}

function processRequestDOS(e) {

if (xhrDOS.readyState == 4 && xhrDOS.status == 200) {
        response2 = JSON.parse(xhrDOS.responseText);
        //console.log('processRequestDOS '+ response2[0]);
		es_pruebas = inArray(window.location.host,response2); 
		//console.log('es_pruebas '+ es_pruebas);
		 if (es_pruebas)
			{
			//__webservice_php = 'https://test.redanahuac.mx/app/prospectos/testformapreu_crm_vdelacruz.php';
			//__dominio =        'https://test.redanahuac.mx';
			__webservice_php = 'https://testprospectos.redanahuac.mx/testformapreu_crm_vdelacruz.php';
			__dominio =        'https://testprospectos.redanahuac.mx';
			__url_home =        'https://testprospectos.anahuac.mx';
			__url_aviso_prepa = 'https://prepap.anahuac.mx/gracias';
			__webservice_php_leads = 'http://leads-test.redanahuac.mx/api/leads';
			
			cargaventana();
			
			}
		if(es_produccion)

			{
		//__webservice_php = 'https://redanahuac.mx/app/prospectos/testformapreu_crm_vdelacruz.php';
		//__dominio =        'https://redanahuac.mx';
		__webservice_php = 'https://prospectos.redanahuac.mx/testformapreu_crm_vdelacruz.php';
		__dominio =        'https://prospectos.redanahuac.mx';
		__url_home =        'https://prospectos.mx';
		__url_aviso_prepa = 'https://prepa.anahuac.mx/gracias';
		__webservice_php_leads = 'https://leads.redanahuac.mx/api/leads';
		
		
		cargaventana();
		
		}
      // cargaventana();
		
    }
 
}



function inArray(target, array)
{

/* Caching array.length doesn't increase the performance of the for loop on V8 (and probably on most of other major engines) */

  for(var i = 0; i < array.length; i++) 
  {
    if(array[i] === target)
    {
      return true;
    }
  }

  return false; 
}




function cargaventana()
{
	
	if(typeof jQuery=='undefined') {
		var headTag = document.getElementsByTagName("head")[0];
		var jqTag = document.createElement('script');
		jqTag.type = 'text/javascript';
		jqTag.src = __dominio + '/views/apreu/js/jquery-2.1.1.min.js';
		//jqTag.onload = InitForm;
		jqTag.onload = loadScriptsForForm_1;
		headTag.appendChild(jqTag);

	} else {

		//InitForm();
		loadScriptsForForm_1();
	}
	

	
}	
	  



function cargaAmbientes()
{
	
	
		
			
// xhrUNO.open('GET', "https://prospectos.redanahuac.mx/checadominioproduccion.php", true);
xhrUNO.open('GET', "https://prospectos.redanahuac.mx/checadominioproduccion.php", true);
xhrUNO.send();

xhrUNO.onreadystatechange = processRequestUNO;

xhrDOS.open('GET', "https://testprospectos.redanahuac.mx/checadominiopruebas.php", true);
xhrDOS.send();

xhrDOS.onreadystatechange = processRequestDOS;
	
}

function menucontacto(){
  if (opcban[6]==1) {


	var uni = $scopeform("#menucontacto").data("uni");

	if(uni=='PREPA_NONE')
	{
		$scopeform('#imgmenucontacto').css({'right':'240px'});
        $scopeform('#menucontactox').css({'display':'block'});
	}
	else
	{
		   $scopeform('#imgmenucontacto').css({'right':'0px'});
		   $scopeform('#imgmenucontacto').css({'right':'0px !important'});
		   $scopeform('#imgmenucontacto').attr('style', 'right: 0px !important');
           $scopeform('#menucontactox').css({'display':'none'},200);

	}

    //$scopeform('#imgmenucontacto').animate({ right: 240},200);
    //$scopeform('#menucontactox').animate({ right:1},200);
    opcban[6]=0;
	//resetTimer();
  }
  else
  {


    //$scopeform('#imgmenucontacto').animate({ right: 0},200);


	var uni = $scopeform("#menucontacto").data("uni");

	if(uni=='PREPA_NONE'){
	 $scopeform('#imgmenucontacto').css({'right':'0px'});
		   $scopeform('#imgmenucontacto').css({'right':'0px !important'});
		   $scopeform('#imgmenucontacto').attr('style', 'right: 0px !important');
          
        $scopeform('#menucontactox').css({'display':'none'},200);

	}
	else{


if (window.matchMedia('(max-device-width: 320px)').matches) {
	//$scopeform('#imgmenucontacto').css({'right':'210px'});
  $scopeform('#imgmenucontacto').attr('style', 'right: 210px !important');
}
else if (window.matchMedia('(max-device-width: 375px)').matches) {
	//$scopeform('#imgmenucontacto').css({'right':'210px'});
  $scopeform('#imgmenucontacto').attr('style', 'right: 210px !important');
}

else if (window.matchMedia('(max-device-width: 384px)').matches) {
	//$scopeform('#imgmenucontacto').css({'right':'210px'});
  $scopeform('#imgmenucontacto').attr('style', 'right: 210px !important');
}
else if (window.matchMedia('(max-device-width: 412px)').matches) {
	//$scopeform('#imgmenucontacto').css({'right':'210px'});
  $scopeform('#imgmenucontacto').attr('style', 'right: 210px !important');
}
else if (window.matchMedia('(max-device-width: 414px)').matches) {
	//$scopeform('#imgmenucontacto').css({'right':'210px'});
  $scopeform('#imgmenucontacto').attr('style', 'right: 210px !important');
}
else
{
	//$scopeform('#imgmenucontacto').css({'right':'310px'});
  $scopeform('#imgmenucontacto').attr('style', 'right: 310px !important');
}
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
	jqTag.src = __dominio + '/views/apreu/js/jquery.mask.min.js';
	jqTag.onload = InitForm;
	headTag.appendChild(jqTag);
	/*
	var headTag = document.getElementsByTagName("head")[0];
	var jqTag = document.createElement('script');
	jqTag.type = 'text/javascript';
	//jqTag.src = 'multimedia_user/templates/33/js/jquery.mask.min.js';
	jqTag.src = 'https://code.jquery.com/ui/1.12.1/jquery-ui.js';
	jqTag.onload = InitForm;
	headTag.appendChild(jqTag);
	*/
}
function InitForm(){
      $scopeform = jQuery.noConflict();

	  var uni = $scopeform("#menucontacto").data("uni");


      $scopeform('head').append('<link rel="stylesheet" href="' + __dominio + '/views/apreu/css/formcontactapreu_vdelacruz.css" type="text/css" />');
	  $scopeform('head').append('<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css" type="text/css" />');

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
      $scopeform('#periodo_asterisco').hide();
	  $scopeform('#sexo_asterisco').hide();
      $scopeform('#periodorua6855').hide();



	  // Get the modal
      modalrua = document.getElementById('myModalrua');
      // Get the <span> element that closes the modal
      //span = document.getElementsByClassName("close")[0];

	  // When the user clicks on <span> (x), close the modal
	  /*
      span.onclick = function() {
      modalrua.style.display = 'none';
      }
	  */

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

	
	//$scopeform( "#buttonSend" ).one( "dblclick", function() {
$scopeform( "#buttonSend" ).click( function() {
    
	if(validarFormulario() == true)
		
		{
	        $scopeform( "#buttonSend" ).hide();
			$scopeform( "#imgmenucontacto" ).hide();
			$scopeform( "#menucontactop" ).hide();
			sendMessage457();
		}
	});
	
	//$scopeform( "#buttonSend" ).one( "click", function() {
		/*
		$scopeform( "#buttonSend" ).dblclick( function() {
 if(validarFormulario() == true)
		
		{
			$scopeform( "#buttonSend" ).hide();
			$scopeform( "#imgmenucontacto" ).hide();
			$scopeform( "#menucontactop" ).hide();
			sendMessage457();
		}
    });
	*/
	

}

function limpia()
{
	
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
			$scopeform( "#buttonSend" ).prop( "disabled", false );
			$scopeform("#campusruaTol").hide();
}



function getPeriodos()
        {
         //   var culture = new CultureInfo("en-US");
		 
			var dateObj = new Date();
			var month = dateObj.getUTCMonth() + 1; //months from 1-12
			var day = dateObj.getUTCDate();
			var year = dateObj.getUTCFullYear();

            var periodo = "";
            //var fecha_actual = DateTime.Now.ToString("yyyy-MM-dd");
			var fecha_actual = dateObj;
            var anio =  year;

            var periodo_enero = "";
            var periodo_agosto = "";

            var fecha_10 = "";
            var fecha_60 = "";

            var anio_int;          

           // DateTime FECHA_ACTUAL = Convert.ToDateTime(fecha_actual, culture);
             var FECHA_ACTUAL = dateObj;
            var count = 0;
            do
            { 
                periodo_enero = anio + "10";
                periodo_agosto = anio + "60";

                //fecha_10 = anio + "-01-31";
                //fecha_60 = anio + "-08-31";
				var fecha_10 = new Date(anio +'-01-31');
                var fecha_60 = new Date(anio +'-08-31');

               // DateTime FECHA_10 = Convert.ToDateTime(fecha_10, culture);
                //DateTime FECHA_60 = Convert.ToDateTime(fecha_60, culture);
				var FECHA_10 = fecha_10;
				var FECHA_60 = fecha_60;
				
                if (FECHA_ACTUAL <= FECHA_10 && count < 6)
                {
                    periodo += "<option value=\"" + periodo_enero + "\" >Enero - " + anio + "</option>";
                    count++;                   
                }

                if (FECHA_ACTUAL <= FECHA_60 && count < 6)
                {
                    periodo += "<option value=\"" + periodo_agosto + "\" >Agosto - " + anio + "</option>";
                    count++;                   
                }

                anio_int = anio;
                anio_int++;
                anio = anio_int;            

            } while (count < 6);

            return periodo;

        }


function insertForm(){
	    var uni = $scopeform("#menucontacto").data("uni");

      var htmlfrmcontactmodal = '<!-- The Modal -->';
          htmlfrmcontactmodal += '<div id="myModalrua" style="display:none;" class="modalrua">';

          htmlfrmcontactmodal += '<!-- Modal content -->';
          htmlfrmcontactmodal += '<div class="modal-contentrua">';

          htmlfrmcontactmodal += '<div class="modal-headerrua">';
         // htmlfrmcontactmodal += '<span class="close" >×</span>';
		// htmlfrmcontactmodal += '<span class="close" onclick="window.history.go(-1); return false;">×</span>';
		htmlfrmcontactmodal += '<span class="close" onclick="window.location.reload(history.back()); return false;">×</span>';
		 
		 //htmlfrmcontactmodal += '<span class="close" onclick="limpia(); modalrua.style.display = "none";  return false;">×</span>';
		 //htmlfrmcontactmodal += '<span class="close" onclick="modalrua.style.display = "none"; return false;">×</span>';
          htmlfrmcontactmodal += '<h2>¡Muchas gracias por tu interés!</h2>';
          htmlfrmcontactmodal += '</div>';

          htmlfrmcontactmodal += '<div  id="mensaje_general" class="modal-bodyrua">';
          htmlfrmcontactmodal += '<p>Has dado el primer paso para completar tu solicitud de inscripción en uno de nuestros programas.</p>';
          htmlfrmcontactmodal += '<p>Un Especialista en Admisiones se pondrá en contacto contigo para darte más información sobre nuestros programas y contestar cualquier pregunta que tengas.</p>';
         // htmlfrmcontactmodal += '<div id="div_posgrados_id"><p>Conoce más en:</p>';
         // htmlfrmcontactmodal += '<a href="http://www.posgradosanahuac.mx/" target="_blank"> <img style="width:100px; height:50px; margin: 5px 10px 0 10px;" src="https://www.anahuac.mx/mexico/posgrados/images/PosgradosAnahuac_SaberQueHayMas.png">';
          //htmlfrmcontactmodal += '</a></div>';
		  
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

          htmlfrmcontact += '<img src="' + __dominio + '/views/apreu/imagenes/menucontacto.png" class="responsive-img" id="imgmenucontacto"    onclick="menucontacto()">';
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
           htmlfrmcontact += '<select class="browser-default dropdown-select" id="periodorua6855"  onclick="resetTimer()" onkeydown="resetTimer()"><i id="periodo_asterisco" style="font-size:13pt;color:red">*</i>';
       htmlfrmcontact += '<option value="NONE" >Período de interés</option>';
       htmlfrmcontact += getPeriodos();
	   
	   /* 
 var dateObj = new Date();
var month = dateObj.getUTCMonth() + 1; //months from 1-12
var day = dateObj.getUTCDate();
var year = dateObj.getUTCFullYear();

newdate = year + "/" + month + "/" + day;
htmlfrmcontact += newdate;
if(month>=7)
{
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
          htmlfrmcontact +='<option value="'+ (year + 2) +'60">Agosto - ' + (year + 2) +'</option>';
          htmlfrmcontact +='<option value="'+ (year + 3) +'10">Enero - ' + (year + 3) +'</option>';
	     htmlfrmcontact +='<option value="'+ (year + 3) +'60">Agosto - ' + (year + 3) +'</option>';

}
else {
 
   htmlfrmcontact +='<option value="'+ (year) +'60">Agosto - ' + (year) +'</option>';
  htmlfrmcontact +='<option value="'+ (year + 1) +'10">Enero - ' + (year + 1) +'</option>';
   htmlfrmcontact +='<option value="'+ (year + 1) +'60">Agosto - ' + (year + 1) +'</option>';
   htmlfrmcontact +='<option value="'+ (year + 2) +'10">Enero - ' + (year + 2) +'</option>';
 htmlfrmcontact +='<option value="'+ (year + 2) +'60">Agosto - ' + (year + 2) +'</option>';
	htmlfrmcontact +='<option value="'+ (year + 3) +'10">Enero - ' + (year + 3) +'</option>';

}

}
else {
  htmlfrmcontact +='<option value="'+ (year) +'60">Agosto - ' + (year) +'</option>';
  htmlfrmcontact +='<option value="'+ (year + 1) +'10">Enero - ' + (year + 1) +'</option>';
   htmlfrmcontact +='<option value="'+ (year + 1) +'60">Agosto - ' + (year + 1) +'</option>';
   htmlfrmcontact +='<option value="'+ (year + 2) +'10">Enero - ' + (year + 2) +'</option>';
 htmlfrmcontact +='<option value="'+ (year + 2) +'60">Agosto - ' + (year + 2) +'</option>';
	htmlfrmcontact +='<option value="'+ (year + 3) +'10">Enero - ' + (year + 3) +'</option>';
}
*/
         htmlfrmcontact += '</select>';
         htmlfrmcontact += '</div>';
         htmlfrmcontact += '</div>';
		  // NOMBRE
          htmlfrmcontact += '<div class="input-field colk4 s12">';
          htmlfrmcontact += '<img src="' + __dominio + '/views/apreu/imagenes/Icono-persona.png" class="imgapreu" />';
        
		if (es_pruebas)
		{
		  htmlfrmcontact += '<input id="nombre457" class="inputformapreu" type="text" placeholder="Nombre_P_7.3" onclick="resetTimer()" onkeydown="resetTimer()" onchange="resetTimer()"><i id="nombre_asterisco" style="font-size:13pt;color:red">*</i></input>';
		}
		if(es_produccion)
		{
		htmlfrmcontact += '<input id="nombre457" class="inputformapreu" type="text" placeholder="Nombre_P_7.3" onclick="resetTimer()" onkeydown="resetTimer()" onchange="resetTimer()"><i id="nombre_asterisco" style="font-size:13pt;color:red">*</i></input>';
		}
          
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
          htmlfrmcontact += '<img src="' + __dominio + '/views/apreu/imagenes/Icono-correo.png" class="imgapreu" />';
          htmlfrmcontact += '<input id="correo451" class="inputformapreu" type="text" placeholder="Correo" onclick="resetTimer()" onkeydown="resetTimer()" onchange="resetTimer()"><i id="email_asterisco" style="font-size:13pt;color:red">*</i></input>';
          htmlfrmcontact += '</div>';

          // TELEFONO
          htmlfrmcontact += '<div class="input-field colk4 s12">';
          htmlfrmcontact += '<img src="' + __dominio + '/views/apreu/imagenes/Icono-telefono.png" class="imgapreu" />';
          //htmlfrmcontact += '<input id="telefono454" class="inputformapreu" type="text" placeholder="Telefono" onclick="resetTimer()" onkeydown="resetTimer()" onchange="resetTimer()"><i id="telefono_asterisco" style="font-size:13pt;color:red">*</i></input>';
		  htmlfrmcontact += '<input id="telefono454" type="text" class="phone_with_ddd inputformapreu" placeholder="Teléfono" onclick="resetTimer()" onkeydown="resetTimer()" onchange="resetTimer()"><i id="telefono_asterisco" style="font-size:13pt;color:red">*</i></input>';
          htmlfrmcontact += '</div>';

		  // SEXO
		   //htmlfrmcontact += '<div class="" id="idS">';
          htmlfrmcontact += '<div class="input-field colk4 s12">';
          htmlfrmcontact += '<img src="' + __dominio + '/views/apreu/imagenes/Icono-persona.png" class="imgapreu" />';
          //htmlfrmcontact += '<input id="telefono454" class="inputformapreu" type="text" placeholder="Telefono" onclick="resetTimer()" onkeydown="resetTimer()" onchange="resetTimer()"><i id="telefono_asterisco" style="font-size:13pt;color:red">*</i></input>';
		  //htmlfrmcontact += '<select style="height: 28px !important; color: #232323 !important; border-radius: 9px !important; border-width: 1px!important; border-style: solid!important; margin-left: 3.3em!important; margin-top: 10px !important;" class="inputformapreu" id="select_sexo" onchange="" onclick="resetTimer()">';
		  htmlfrmcontact += '<select class="browser-default dropdown-select" style="margin-left: 3.3em!important; width: 60% !important" id="select_sexo" onchange="" onclick="resetTimer()">';
		  htmlfrmcontact += '<i id="sexo_asterisco" style="font-size:13pt;color:red">*</i>';
          htmlfrmcontact += '<option value="NONE" >Sexo</option>';
		  htmlfrmcontact += '<option value="M" >Masculino</option>';
		  htmlfrmcontact += '<option value="F" >Femenino</option>';
          htmlfrmcontact += '</select>';
		     htmlfrmcontact += '</div>';
		 // FECHA DE NACIMIENTO
          htmlfrmcontact += '<div class="input-field colk4 s12">';
          htmlfrmcontact += '<img src="' + __dominio + '/views/apreu/imagenes/Icono-persona.png" class="imgapreu" />';
          //htmlfrmcontact += '<input id="telefono454" class="inputformapreu" type="text" placeholder="Telefono" onclick="resetTimer()" onkeydown="resetTimer()" onchange="resetTimer()"><i id="telefono_asterisco" style="font-size:13pt;color:red">*</i></input>';
		  //htmlfrmcontact += '<input id="fechanac454" class="inputformapreu" type="date" value="Fecha Nacimiento" placeholder="Fecha Nacimiento" onclick="resetTimer()" onkeydown="resetTimer()" onchange="resetTimer()">'
		  htmlfrmcontact += '<div style="margin-left: 3.3em!important; margin-top: 15px!important;" >Fecha de Nacimiento</div>';
		  htmlfrmcontact += '<select class="browser-default dropdown-select" style="margin-left: 3.3em!important; width: 25% !important" id="select_dia" onchange="" onclick="resetTimer()">';
          htmlfrmcontact += '<option value="NONE" >Dia</option>';
		  htmlfrmcontact += '<option value="1" >1</option>';
		  htmlfrmcontact += '<option value="2" >2</option>';
		  htmlfrmcontact += '<option value="3" >3</option>';
		  htmlfrmcontact += '<option value="4" >4</option>';
		  htmlfrmcontact += '<option value="5" >5</option>';
		  htmlfrmcontact += '<option value="6" >6</option>';
		  htmlfrmcontact += '<option value="7" >7</option>';
		  htmlfrmcontact += '<option value="8" >8</option>';
		  htmlfrmcontact += '<option value="9" >9</option>';
		  htmlfrmcontact += '<option value="10" >10</option>';
		  htmlfrmcontact += '<option value="11" >11</option>';
		  htmlfrmcontact += '<option value="12" >12</option>';
		  htmlfrmcontact += '<option value="13" >13</option>';
		  htmlfrmcontact += '<option value="14" >14</option>';
		  htmlfrmcontact += '<option value="15" >15</option>';
		  htmlfrmcontact += '<option value="16" >16</option>';
		  htmlfrmcontact += '<option value="17" >17</option>';
		  htmlfrmcontact += '<option value="18" >18</option>';
		  htmlfrmcontact += '<option value="19" >19</option>';
		  htmlfrmcontact += '<option value="20" >20</option>';
          htmlfrmcontact += '<option value="21" >21</option>';
		  htmlfrmcontact += '<option value="22" >22</option>';
		  htmlfrmcontact += '<option value="23" >23</option>';
		  htmlfrmcontact += '<option value="24" >24</option>';
		  htmlfrmcontact += '<option value="25" >25</option>';
		  htmlfrmcontact += '<option value="26" >26</option>';
		  htmlfrmcontact += '<option value="27" >27</option>';
		  htmlfrmcontact += '<option value="28" >28</option>';
		  htmlfrmcontact += '<option value="29" >29</option>';
		  htmlfrmcontact += '<option value="30" >30</option>';
          htmlfrmcontact += '<option value="31" >31</option>';
          htmlfrmcontact += '</select>';
		  htmlfrmcontact += '<select class="browser-default dropdown-select" style="margin-left: 0.3em!important; width: 25% !important" id="select_mes" onchange="" onclick="resetTimer()">';
          htmlfrmcontact += '<option value="NONE" >Mes</option>';
		  htmlfrmcontact += '<option value="1" >Enero</option>';
		  htmlfrmcontact += '<option value="2" >Febrero</option>';
          htmlfrmcontact += '<option value="3" >Marzo</option>';
		  htmlfrmcontact += '<option value="4" >Abril</option>';
          htmlfrmcontact += '<option value="5" >Mayo</option>';
		  htmlfrmcontact += '<option value="6" >Junio</option>';
          htmlfrmcontact += '<option value="7" >Julio</option>';
		  htmlfrmcontact += '<option value="8" >Agosto</option>';
          htmlfrmcontact += '<option value="9" >Septiembre</option>';
		  htmlfrmcontact += '<option value="10" >Octubre</option>';
		  htmlfrmcontact += '<option value="11" >Noviembre</option>';
		  htmlfrmcontact += '<option value="12" >Diciembre</option>';
          
		  htmlfrmcontact += '</select>';
		  htmlfrmcontact += '<select class="browser-default dropdown-select" style="margin-left: 0.3em!important; width: 25% !important" id="select_anio" onchange="" onclick="resetTimer()">';
          htmlfrmcontact += '<option value="NONE" >Año</option>';
		  
		   var dateObj_dos = new Date();
		   var month_dos = dateObj_dos.getUTCMonth() + 1; //months from 1-12
		  var day_dos = dateObj_dos.getUTCDate();
			var year_dos = dateObj_dos.getUTCFullYear();
		  
		  var i = 0;
		  for(i = year_dos - 1;i>=(year_dos - 120);i--) 
		  {
			htmlfrmcontact += '<option value="' + i +'" >'+i+'</option>';
			
          }
		  
		  htmlfrmcontact += '</select>';
		  
		  //htmlfrmcontact += '<i id="sexo_asterisco" style="font-size:13pt;color:red">*</i></input>';
          htmlfrmcontact += '</div>';
		  
          // ESTADO

         // htmlfrmcontact += '<div class="input-field colk4 s12" style="margin-top:0px;">';
		 // htmlfrmcontact += '<div class="">';
          htmlfrmcontact += '<div class="">';
          htmlfrmcontact += '<select class="browser-default dropdown-select" id="select_estado" onchange="changeEstado()" onclick="resetTimer()">';
          htmlfrmcontact += '<option value="NONE" >Estado ...</option>';
          htmlfrmcontact += '</select>';
          htmlfrmcontact += '</div>';
          // DELEGACION/MUNICIPIO - COMBOBOX

          //htmlfrmcontact += '<div class="">';
          htmlfrmcontact += '<div class="" id="div_delmun_1">';
          htmlfrmcontact += '<select class="browser-default dropdown-select" id="select_delmun" onchange="" onclick="resetTimer()">';
          htmlfrmcontact += '<option value="NONE" >Delegaci&oacute;n o municipio ...</option>';
          htmlfrmcontact += '</select>';
          htmlfrmcontact += '</div>';
          // DELEGACION/MUNICIPIO - TEXT BOX
/*
          htmlfrmcontact += '<div class="input-field colk4 s12" id="div_delmun_2">';
          htmlfrmcontact += '<i class="mdi-navigation-unfold-more   prefix"></i>';
          htmlfrmcontact += '<input id="input_delmun" class="inputformapreu" type="text" placeholder="Delegacion o municipio" onclick="resetTimer()" onkeydown="resetTimer()" onchange="resetTimer()"></input>';
          htmlfrmcontact += '</div>';
		  */
          htmlfrmcontact += '<div class="input-field colk4 s12" align="center">';
          htmlfrmcontact += '<input type="checkbox" name="aviso458" id="aviso458" value="" onchange="resetTimer()">';
          htmlfrmcontact += '<a href="javascript:poponloadAviso()" class="aviso"> Aviso de privacidad</a>';
          htmlfrmcontact += '</div>';
  htmlfrmcontact += '<div style="height: 20px;"></div>';
          htmlfrmcontact += '<div class="input-field colk4 s12" align="center">';
         // htmlfrmcontact += '<a id="buttonSend" class="waves-effect98 waves-light5645 btn9796 orange0976" onclick="sendMessage457();" style="font-size: 1rem;">Enviar</a>';
		  htmlfrmcontact += '<a id="buttonSend" class="waves-effect98 waves-light5645 btn9796 orange0976" style="font-size: 1rem;">Enviar</a>';
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


		  //buttonSend_finish();
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

		   }else if( nivel == 2 || nivel == 3 || nivel == 8 || nivel == 9){//Preparatoria,licenciaturas y Maestrias en linea

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
       // console.log('nivel='+nivel);
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
			   
			   if(nivel == 9){


			    $scopeform("#campusrua854").html('<option value="NONE">Campus de Inter&eacute;s...</option>');
			    $scopeform("#ciudad457").prop('disabled', true);
			    $scopeform("#campusrua854").prop('disabled', true);

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
	  
	  
	  	var universidadPagina = $scopeform("#menucontacto").data("uni");//cambio nuevo
	  
	     $scopeform("#campusruaTol").hide();
	    var programa = $scopeform('#programarua6854').val();
		var nivel = $scopeform('#nivelrua4653').val();


	if(programa=='NONE' /*|| (nivel != 2 && nivel !=4 && nivel !=5 && nivel !=6 )*/){

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
			data: { programa:programa,nivel:nivel,universidadPagina:universidadPagina},
			complete:function(data){

				// console.dir(data.responseText);

			},
			success: function(msg)
			{

				//alert(msg);
				$scopeform("#campusrua854").prop('disabled', false);
				$scopeform('#campusrua854').html(msg);



				var programa_length = $scopeform('#campusrua854').find("option").length;

				//console.log(programa_length);

				if (programa_length == 2)
				{
					$scopeform('#campusrua854 :nth-child(2)').prop('selected', true);
				}else{

				    var uni = $scopeform("#menucontacto").data("uni");
					var find =$scopeform("#campusrua854 option[value='"+uni+"']").length;


					//console.log(uni);

				//console.log(find);



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


function sendToLeads(data)
{
	
	var dataleads= [];
	dataleads['LProgramCode']= data['programa'];
	dataleads['FirstName']= data['nombre'];
	dataleads['LastName']= data['apellidoPaterno'];	
	dataleads['SecondaryLastName']= data['apellidoMaterno'];
	dataleads['Email']= data['correo'];
	dataleads['PhoneNumber']= data['telefono'];	
	dataleads['CellNumber']= data['telefono'];
	dataleads['WebUrl']= data['url'];
	dataleads['IP']= '127.0.0.1';
    $scopeform.ajax({
		timeout: 3000,	
        url: __webservice_php_leads,	
		method:  'POST', //método de envio
		crossDomain: true,		
        data: dataleads,
        success: function(msg)
		{
			//if(console)
				console.log('salida leads:'+msg);
        	//validaErrorCRM(msg, false);
        },
		//error: function(msg){
			error:function (xhr, ajaxOptions, thrownError)
			{        
				console.log('Error sendleads Status = ' + xhr.status);
				console.log('Error sendleads = ' + thrownError);
				console.log('Responsetext Error sendleads = ' + xhr.responseText);
				
				switch (xhr.status) 
				{
                case 200:
                    console.log(xhr.status + ":- " + thrownError);
                    break;
                case 404:
                    console.log('File not found');
                    break;
                case 500:
                    console.log('Server error');
                    break;
                case 0:
                    console.log('Request aborted: ' + !xhr.getAllResponseHeaders());
                    break;
                default:
                    console.log('Unknown error ' + xhr.status + ":- " + thrownError);
                }
				
				
				
				
			
		}
	});
	
	
	
	
	
}


function sendMessage457()
{

	$scopeform("#campusruaTol").hide();
	closeTimer2();

	//if(validarFormulario() == false)
	//	return;

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
/* vdelacruz */
   var sexo = $scopeform('#select_sexo').val();
var fechanac = {
	Year: $scopeform('#select_anio').val(),
    Month: $scopeform('#select_mes').val(),
    Day: $scopeform('#select_dia').val()
};	

	var ciudad = obtenerCiudad();
	var claveEstado = obtenerClaveEstado();
	var claveMunicipio = obtenerClaveMunicipio();
	var otroEstado = $scopeform('#input_delmun').val();
	
	

	
var year_temp = $scopeform('#select_anio').val();
 var mes_temp = $scopeform('#select_mes').val();
 var day_temp = $scopeform('#select_dia').val();

 if (year_temp =='NONE' && mes_temp =='NONE' && day_temp =='NONE')
 {
	 var fechanac = null;
 }
 
 else
 {
	 var fechanac = {
		Year: year_temp,
		Month: mes_temp,
		Day: day_temp 
		};	
 }

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
var ip = obtieneip();


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
			,ip:'111'
			,sexo:sexo
			,FechaNacimiento:fechanac
			
	};

if (data.nivel == 3)
{
 //sendToLeads(data);
}
	
	
	
if(!esProgramaParcial())
{
	$scopeform.ajax({
        url: url_webservice,
		dataType: 'jsonp',
		jsonp: 'callback',
        contentType: "application/json; charset=utf-8",
        data: data,
        success: function(msg){

		/*if(console)
				console.log('idprospecto=msg => \''+msg+'\'');*/
        	//*
			$scopeform('#nivelrua4653').val("NONE");
			$scopeform("#programarua6854").html('<option value="NONE">Programa ...</option>');
			$scopeform("#programarua6854").prop('disabled', true);
			$scopeform("#campusrua854").html('<option value="NONE" >Campus de Inter&eacute;s ...</option>');
			$scopeform("#campusrua854").prop('disabled', true);
            $scopeform('#periodorua6855').html('<option value="NONE">Período de interés...</option>');
			$scopeform('#periodorua6855').hide();
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
			if (!isNaN(idprospecto) && idprospecto > 0)
			{
				
				
				
                       /*if (!esProgramaParcial())*/
						if (data.nivel == 2)		   
					    {
				        data.idprospecto=idprospecto;
				        sendToCRM(data);
                        
						}
						
						if (data.nivel == 3)
					     {
						  //sendToLeads(data);
					      }
												
			}
        },
		error: function(msg){
			if(console)
				console.log('error,msg:'+msg);

			buttonSend_finish();
		}
	});
}

else if(esProgramaParcial())
{
	
	console.log('No enviado a CRM por que es Programa parcial');
			/*$scopeform('#nivelrua4653').val("NONE");
			$scopeform("#programarua6854").html('<option value="NONE">Programa ...</option>');
			$scopeform("#programarua6854").prop('disabled', true);
			$scopeform("#campusrua854").html('<option value="NONE" >Campus de Inter&eacute;s ...</option>');
			$scopeform("#campusrua854").prop('disabled', true);
            $scopeform('#periodorua6855').html('<option value="NONE">Período de interés...</option>');
			$scopeform('#periodorua6855').hide();
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
	
    buttonSend_finish();*/
	
	
		$scopeform.ajax({
        url: url_webservice,
		dataType: 'jsonp',
		jsonp: 'callback',
        contentType: "application/json; charset=utf-8",
        data: data,
        success: function(msg){

		//if(console)
				//console.log('idprospecto=msg => \''+msg+'\'');
        	//*
			$scopeform('#nivelrua4653').val("NONE");
			$scopeform("#programarua6854").html('<option value="NONE">Programa ...</option>');
			$scopeform("#programarua6854").prop('disabled', true);
			$scopeform("#campusrua854").html('<option value="NONE" >Campus de Inter&eacute;s ...</option>');
			$scopeform("#campusrua854").prop('disabled', true);
            $scopeform('#periodorua6855').html('<option value="NONE">Período de interés...</option>');
			$scopeform('#periodorua6855').hide();
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

			/*var idprospecto = parseInt(msg);
			if (!isNaN(idprospecto) && idprospecto > 0)
			{
                       if (!esProgramaParcial())
					    {
				        data.idprospecto=idprospecto;
				        sendToCRM(data);
                        
						}
						
						if (data.nivel == 3)
					     {
						  //sendToLeads(data);
					      }
												
			}*/
        },
		error: function(msg){
			if(console)
				console.log('error,msg:'+msg);

			buttonSend_finish();
		}
	});
	
	
	
	
	
	
	
	
	
	
	
}


}

function obtieneip()
{
	
	$scopeform.ajax({
			url: "https://api.ipify.org",
			dataType: 'json',
			async: false,
			success: function(data)
				{
					return data;
				}
				});
	
	
	/*
	$scopeform.getJSON("https://api.ipify.org?format=jsonp&callback=?",
					function(json) {
					console.log("My public IP address is: ", json.ip);
					return json.ip;
					}
    );
	*/

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
			//alert('Ha ocurrido un error en el envío al crm.\n'+subMessage(msg));
		if (console)
			console.log('msg:'+msg);
		return;
	}
	else if( typeof msg === 'object' ){
		try{
			if(0<=msg.responseText.indexOf('"Message"')){
				//alert('Ha ocurrido un error en el envío al crm.\n'+subMessage(msg.responseText));
				if (console)
					console.log('responseText:'+msg.responseText);
			}
			return;
		}
		catch(Exception){}
		//alert('Ocurrio un error en el envío.\n'+msg);
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
	$scopeform('#buttonSend').html('Enviar <img src="' + __dominio + '/views/apreu/imagenes/loading.gif">');
}
function buttonSend_finish()
{
	$scopeform('#buttonSend').html('Enviar <img src="' + __dominio + '/views/apreu/imagenes/send.png">');
}




// ___________________________________________________________________________


function esProgramaParcial()
{
	
	
	

var opcion = $scopeform("#campusrua854 option:selected").text();

//alert(opcion);

var findme = "*";

if ( opcion.indexOf(findme) > -1 ) {
	
	
	//alert('true');
return true;


}
else
{
	
//	alert('false');
return false;
}
}
function validarSexo()
{
	var sexo = $scopeform('#select_sexo').val();
	if(sexo.trim()=='NONE')
	{
	  alert('Especifica el sexo.');
	  $scopeform('#select_sexo').css( "border-bottom", "1px solid red" );
	  	$scopeform('#sexo_asterisco').show();
		return false;
	}
	$scopeform('#sexo_asterisco').css( "border-bottom", "1px solid #9e9e9e" );
	$scopeform('#sexo_asterisco').hide();
	return true;
	  
	
	
}

function validarPeriodo()
{
	var periodo = $scopeform('#periodorua6855').val();
  var nivel =   $scopeform('#nivelrua4653').val();
	if(periodo.trim()=='NONE' && nivel ==2)
  {
		alert('Especifica el periodo.');
		$scopeform('#periodorua6855').css( "border-bottom", "1px solid red" );

		$scopeform('#periodo_asterisco').show();
		return false;
	}
	$scopeform('#periodo_asterisco').css( "border-bottom", "1px solid #9e9e9e" );
	$scopeform('#periodo_asterisco').hide();
	return true;
}

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

	else{
    var nameReg = /^[a-zA-Z ñáéíóú]+$/i;
    if( !nameReg.test( texto ) ) {
      alert('Nombre inválido');
  		$scopeform('#nombre457').css( "border-bottom", "1px solid red" );
  		$scopeform('#nombre457').html('');
  		$scopeform('#nombre_asterisco').show();
      return false;
    }
    else {
return true;
    }
	}

	$scopeform('#nombre457').css( "border-bottom", "1px solid #9e9e9e" );
	$scopeform('#nombre_asterisco').hide();
	return true;
}
function validarApellidos()
{
	var texto = $scopeform('#apellidos754').val();
  var texto2 = $scopeform('#apellidos755').val();
	if(texto.trim()==''){
	alert('Especifica el apellido paterno.');
	$scopeform('#apellidos754').css( "border-bottom", "1px solid red" );
	$scopeform('#apellidos_asterisco').show(); return false;
	}
  else{
    var nameReg = /^[a-zA-Z ñáéíóú]+$/i;
	if(texto2.trim()!='')
	{
		if( !nameReg.test( texto ) || !nameReg.test( texto2 ) ) {
			alert('Apellido paterno y/o materno inválido');
			$scopeform('#nombre457').css( "border-bottom", "1px solid red" );
			$scopeform('#nombre457').html('');
			$scopeform('#nombre_asterisco').show();
			return false;
    }
	}
    else {
  return true;
    }
  }

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

	else{
		if (delmun == "NONE" && estado!='OTRO'){
			alert('Por favor especifica la delegación o municipio. ');
			return false;
		}
	}
	return true;
}
function validarCombos(muestraMensaje)
{
	var nivel = $scopeform('#nivelrua4653').val();
	if (nivel==2 || nivel==3 ||nivel ==9) // Si es licenciatura o maestria ...
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
	       //return true;
		      if (programa != "NONE")
		{
				var campus = $scopeform('#campusrua854').val();
				if (campus != "NONE")
					return true;
				else
					if(muestraMensaje) alert('Selecciona un campus.');

		}
		   
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
		//return 'FR';
	     return '';
	else
		return $scopeform("#select_estado").find(':selected').data('clave');
}

function obtenerClaveMunicipio(){
	var id_estado = $scopeform('#select_estado').val();
	if (id_estado == "OTRO")
		//return '20000';
	    return '';
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

function validaFechaNacimiento()
{
	var year_temp = $scopeform('#select_anio').val();
	var mes_temp = $scopeform('#select_mes').val();
	var day_temp = $scopeform('#select_dia').val();
	if (year_temp=='NONE' && mes_temp!='NONE' && day_temp!='NONE')
	{
		alert('Especifica el año de nacimiento.');
		return false;
	}
	
	else if (year_temp!='NONE' && mes_temp=='NONE' && day_temp!='NONE')
	{
		alert('Especifica el mes de nacimiento.');
		return false;
	}
    else if (year_temp!='NONE' && mes_temp!='NONE' && day_temp=='NONE')
	{
		alert('Especifica el dia de nacimiento.');
		return false;
	}
  else if (year_temp!='NONE' && mes_temp=='NONE' && day_temp=='NONE')
	{
		alert('Especifica el dia y mes de nacimiento.');
		return false;
	}
	else if (year_temp=='NONE' && mes_temp!='NONE' && day_temp=='NONE')
	{
		alert('Especifica el dia y año de nacimiento.');
		return false;

	}
	
	else if (year_temp=='NONE' && mes_temp=='NONE' && day_temp!='NONE')
	{
		alert('Especifica el mes y año de nacimiento.');
		return false;
	}

	return true;

	
	
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
	if (validarSexo() == false)
		return false;
	
  if (validarPeriodo() == false)
		return false;
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
if (validaFechaNacimiento() == false)
	{
		//$scopeform( "#buttonSend" ).show();
	//	$scopeform( "#buttonSend" ).prop('disabled', false);
		return false;
	}
	if (aceptar==false){
		alert('Atención\n Debes de aceptar nuestro aviso de privacidad');
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
    avisowindow = window.open(__dominio + "/aviso.html", "Aviso de Privacidad", "location=1,status=1,scrollbars=1,width=700,height=500");
    avisowindow.moveTo(0, 0);
}


/*function IniciarSesion(){
	var usuario = '00125238';
	var password = '280487';

	var websevicename = 'security/getUserInfo';
	var url = 'http://redanahuac.mx/mobile/webservice/curl.php';

}*/
