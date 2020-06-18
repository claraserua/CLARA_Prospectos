

var arraylineas_objetivos = new Array();
var lineas_objetivos_medios = new Array();
var lineas_objetivos_evidencias = new Array();

var array_areas = new Array();
var array_fortalezas = new Array();


$(function(){
	
	
	//tooltip
	$('[rel="tooltip"],[data-rel="tooltip"]').tooltip({"placement":"bottom",delay: { show: 400, hide: 200 }});
	
	$('[rel="popover"],[data-rel="popover"]').popover();
	
	$('#myTablab a:first').tab('show');
	$('#myTablab a').click(function (e) {
	  e.preventDefault();
	  $(this).tab('show');
	});
	
	
	$('#myTab a:first').tab('show');
	$('#myTab a').click(function (e) {
	  e.preventDefault();
	  $(this).tab('show');
	});
	
	$('#inputField-resumen').bind("blur focus keydown keypress keyup", function(){recountr();});
	$('update_button-resumen').attr('disabled','disabled');
	$("#inputField-resumen").Watermark("Agrega tu comentario ...");
 	
});//End function jquery




function EliminarObjetivo(id){
	
	var explode = id.split('-'); 
	var linea = explode[1];
	var lineaid = parseInt(linea.substring(1,linea.length));
	var numobjlinea = arraylineas_objetivos[lineaid-1].length; //obtenemos el numero de objetivos en la linea
	
   //alert(numobjlinea);

	if(numobjlinea==2){
	 	$('#BEO-L'+lineaid).attr('disabled','disabled');
	 }
	 
	 $("#L"+lineaid+"-C"+numobjlinea).remove(); 
	 
	 arraylineas_objetivos[lineaid-1].pop();
	 lineas_objetivos_medios[lineaid-1].pop();
	 lineas_objetivos_evidencias[lineaid-1].pop();
	
	 
	
}

function AgregarObjetivo(id){
	
	
	 var explode = id.split('-'); 
	 var linea = explode[1];
	 var lineaid = parseInt(linea.substring(1,linea.length));
	 var numobjlinea = arraylineas_objetivos[lineaid-1].length; //obtenemos el numero de objetivos en la linea
	 

	 
	 arraylineas_objetivos[lineaid-1].push(numobjlinea);
	 
	 lineas_objetivos_medios[lineaid-1][numobjlinea]=new Array();
	 lineas_objetivos_medios[lineaid-1][numobjlinea][0]="1";
	 
	 
	 lineas_objetivos_evidencias[lineaid-1][numobjlinea]=new Array();
	 lineas_objetivos_evidencias[lineaid-1][numobjlinea][0]="1";
	 
	 	 	
	 $("#L0-C0").css("display","block");
		
	 var clon = $("#L0-C0").clone(false).insertAfter("#"+linea+"-C"+numobjlinea);
	     clon.attr('id','L'+lineaid+'-C'+parseInt(numobjlinea+1));
		//clon.find('#L0C0').attr('id','L'+lineaid+'C'+numobjlinea);
		clon.find('#TOG-L0-C0').attr('id','TOG-L'+lineaid+'-C'+parseInt(numobjlinea+1));
		clon.find('#BOX-L0-C0').attr('id','BOX-L'+lineaid+'-C'+parseInt(numobjlinea+1));
		
		clon.find('#LABEL-L0-O0').html(lineaid+"."+parseInt(numobjlinea+1));	
		clon.find('#L0-O0').attr('id','L'+lineaid+'-O'+parseInt(numobjlinea+1));
		
		var clonobjetivos = $("#L"+lineaid+"-OE1").clone(false).html();
		clon.find('#L0-OE0').html(clonobjetivos);
		clon.find('#L0-OE0').attr('id','L'+lineaid+'-OE'+parseInt(numobjlinea+1));//Objetivos Estrategicos
		
	    
	       
		
		clon.find('#L0-OR0').attr('id','L'+lineaid+'-OR'+parseInt(numobjlinea+1));
		
				
		clon.find('#L0-O0-M0-C0').attr('id','L'+lineaid+'-O'+parseInt(numobjlinea+1)+'-M1-C'+parseInt(numobjlinea+1));
		clon.find('#L0-O0-M0').attr('id','L'+lineaid+'-O'+parseInt(numobjlinea+1)+'-M1');
		
		
		$('#L'+lineaid+'-O'+parseInt(numobjlinea+1)+'-M1').Watermark("Agregar un medio...");
		
		clon.find('#LABEL-L0-O0-M0').html(lineaid+"."+parseInt(numobjlinea+1)+".1");
		clon.find('#LABEL-L0-O0-M0').attr('id','LABEL-L'+lineaid+'-O'+parseInt(numobjlinea+1)+'-M1');
		
		
		clon.find('#L0-O0-M0-R0').attr('id','L'+lineaid+'-O'+parseInt(numobjlinea+1)+'-M1-R1');
		
		
		
		clon.find('#BEM-L0-O0').attr('id','BEM-L'+lineaid+'-O'+parseInt(numobjlinea+1));
		clon.find('#BAM-L0-O0').attr('id','BAM-L'+lineaid+'-O'+parseInt(numobjlinea+1));
		
		
		
		clon.find('#L0-O0-E0-C0').attr('id','L'+lineaid+'-O'+parseInt(numobjlinea+1)+'-E1-C'+parseInt(numobjlinea+1));
		clon.find('#L0-O0-E0').attr('id','L'+lineaid+'-O'+parseInt(numobjlinea+1)+'-E1');
		
		$('#L'+lineaid+'-O'+parseInt(numobjlinea+1)+'-E1').Watermark("Agregar una evidencia...");
		
		clon.find('#LABEL-L0-O0-E0').html(lineaid+"."+parseInt(numobjlinea+1)+".1");
		clon.find('#LABEL-L0-O0-E0').attr('id','LABEL-L'+lineaid+'-O'+parseInt(numobjlinea+1)+'-E1');
		
		clon.find('#BEE-L0-O0').attr('id','BEE-L'+lineaid+'-O'+parseInt(numobjlinea+1));
		clon.find('#BAE-L0-O0').attr('id','BAE-L'+lineaid+'-O'+parseInt(numobjlinea+1));
		
		
		
		$('#BEO-L'+lineaid).removeAttr("disabled");
	    $("#L0-C0").css("display","none"); 
		
		 $('#L'+lineaid+'-O'+parseInt(numobjlinea+1)).Watermark("Agregar un resultado...");
	 
}

function EliminarMedio(id){
	
	 var explode = id.split('-'); 
	 var linea = explode[1];
	 var lineaid = parseInt(linea.substring(1,linea.length));
	 var objetivo = explode[2];
	 var objetivoid = parseInt(objetivo.substring(1,objetivo.length));
	 var numobjlinea = lineas_objetivos_medios[lineaid-1].length; //obtenemos el numero de objetivos en la linea
	 var nummedios = lineas_objetivos_medios[lineaid-1][objetivoid-1].length; //obtenemos el numero de objetivos en la linea


	if(nummedios==2){
	 	$('#BEM-L'+lineaid+'-O'+objetivoid).attr('disabled','disabled');
	 }
	 
	 $("#L"+lineaid+"-O"+objetivoid+'-M'+nummedios+'-C'+objetivoid).remove(); 
	 lineas_objetivos_medios[lineaid-1][objetivoid-1].pop();
	 
}


function AgregarMedio(id){
	
	
	 var explode = id.split('-'); 
	 var linea = explode[1];
	 var lineaid = parseInt(linea.substring(1,linea.length));
	 var objetivo = explode[2];
	 var objetivoid = parseInt(objetivo.substring(1,objetivo.length));
	 var numobjlinea = lineas_objetivos_medios[lineaid-1].length; //obtenemos el numero de objetivos en la linea
	 var nummedios = lineas_objetivos_medios[lineaid-1][objetivoid-1].length; //obtenemos el numero de objetivos en la linea
	 
	 lineas_objetivos_medios[lineaid-1][objetivoid-1][nummedios]= nummedios;
	 
	
	var clon = $("#L0-O0-M0-C0").clone(false).insertAfter("#L"+lineaid+"-O"+objetivoid+"-M"+nummedios+"-C"+objetivoid);
	    clon.attr('id','L'+lineaid+'-O'+objetivoid+'-M'+parseInt(nummedios+1)+'-C'+objetivoid);
		
	clon.find('#LABEL-L0-O0-M0').html(lineaid+"."+objetivoid+"."+parseInt(nummedios+1));
	clon.find('#LABEL-L0-O0-M0').attr('id','LABEL-L'+lineaid+'-O'+objetivoid+'-M'+parseInt(nummedios+1));
	
	clon.find('#L0-O0-M0').attr('id','L'+lineaid+'-O'+objetivoid+'-M'+parseInt(nummedios+1));
	
	$('#L'+lineaid+'-O'+objetivoid+'-M'+parseInt(nummedios+1)).Watermark("Agregar un medio...");
	
	clon.find('#L0-O0-M0-R0').attr('id','L'+lineaid+'-O'+objetivoid+'-M'+parseInt(nummedios+1)+'-R'+parseInt(nummedios+1));
	
	
	$('#BEM-L'+lineaid+'-O'+objetivoid).removeAttr("disabled");
}





function AgregarEvidencia(id){
	
	 var explode = id.split('-'); 
	 var linea = explode[1];
	 var lineaid = parseInt(linea.substring(1,linea.length));
	 var objetivo = explode[2];
	 var objetivoid = parseInt(objetivo.substring(1,objetivo.length));
	 var numobjlinea = lineas_objetivos_evidencias[lineaid-1].length; //obtenemos el numero de objetivos en la linea
	 var numevidencia= lineas_objetivos_evidencias[lineaid-1][objetivoid-1].length; //obtenemos el numero de objetivos en la linea
	 
	 lineas_objetivos_evidencias[lineaid-1][objetivoid-1][numevidencia]= numevidencia;
	 
	
	var clon = $("#L0-O0-E0-C0").clone(false).insertAfter("#L"+lineaid+"-O"+objetivoid+"-E"+numevidencia+"-C"+objetivoid);
	    clon.attr('id','L'+lineaid+'-O'+objetivoid+'-E'+parseInt(numevidencia+1)+'-C'+objetivoid);
		
	clon.find('#LABEL-L0-O0-E0').html(lineaid+"."+objetivoid+"."+parseInt(numevidencia+1));
	clon.find('#LABEL-L0-O0-E0').attr('id','LABEL-L'+lineaid+'-O'+objetivoid+'-E'+parseInt(numevidencia+1));
	
	clon.find('#L0-O0-E0').attr('id','L'+lineaid+'-O'+objetivoid+'-E'+parseInt(numevidencia+1));
	
	$('#L'+lineaid+'-O'+objetivoid+'-E'+parseInt(numevidencia+1)).Watermark("Agregar una evidencia...");
	
	$('#BEE-L'+lineaid+'-O'+objetivoid).removeAttr("disabled");
}



function EliminarEvidencia(id){
	
	 var explode = id.split('-'); 
	 var linea = explode[1];
	 var lineaid = parseInt(linea.substring(1,linea.length));
	 var objetivo = explode[2];
	 var objetivoid = parseInt(objetivo.substring(1,objetivo.length));
	 var numobjlinea = lineas_objetivos_evidencias[lineaid-1].length; //obtenemos el numero de objetivos en la linea
	 var numevidencia = lineas_objetivos_evidencias[lineaid-1][objetivoid-1].length; //obtenemos el numero de objetivos en la linea


	if(numevidencia==2){
	 	$('#BEE-L'+lineaid+'-O'+objetivoid).attr('disabled','disabled');
	 }
	 
	 $("#L"+lineaid+"-O"+objetivoid+'-E'+numevidencia+'-C'+objetivoid).remove(); 
	 lineas_objetivos_evidencias[lineaid-1][objetivoid-1].pop();
	 
}


function AgregarArea(){
	
	var numareas = array_areas.length;
	var clon = $("#AREA-1").clone(false).insertAfter("#AREA-"+numareas);
	
	clon.attr('id','AREA-'+parseInt(numareas+1));
	
	clon.find('#LABEL-AREA-1').attr('id','LABEL-AREA-'+parseInt(numareas+1));
	clon.find('#LABEL-AREA-'+parseInt(numareas+1)).html(parseInt(numareas+1)+".");
	
	clon.find('#INPUT-AREA-1').attr('id','INPUT-AREA-'+parseInt(numareas+1));
	$('#INPUT-AREA-'+parseInt(numareas+1)).val("");
	$('#INPUT-AREA-'+parseInt(numareas+1)).Watermark("Agregar area de oportunidad...");
	
	$('#BEAREA').removeAttr("disabled");
	array_areas.push("1");
	
}



function EliminarArea(){
	
	var numareas = array_areas.length;

	if(numareas==2){
	 	$('#BEAREA').attr('disabled','disabled');
	 }
	 
	 $("#AREA-"+numareas).remove(); 
	 array_areas.pop();
	 
}




function AgregarFortaleza(){
	
	var numareas = array_fortalezas.length;
	var clon = $("#FORTALEZA-1").clone(false).insertAfter("#FORTALEZA-"+numareas);
	
	clon.attr('id','FORTALEZA-'+parseInt(numareas+1));
	
	clon.find('#LABEL-FORTALEZA-1').attr('id','LABEL-FORTALEZA-'+parseInt(numareas+1));
	clon.find('#LABEL-FORTALEZA-'+parseInt(numareas+1)).html(parseInt(numareas+1)+".");
	
	clon.find('#INPUT-FORTALEZA-1').attr('id','INPUT-FORTALEZA-'+parseInt(numareas+1));
	$('#INPUT-FORTALEZA-'+parseInt(numareas+1)).val("");
	$('#INPUT-FORTALEZA-'+parseInt(numareas+1)).Watermark("Agregar fortaleza...");
	
	$('#BEFORTALEZA').removeAttr("disabled");
	array_fortalezas.push("1");
	
}



function EliminarFortaleza(){
	
	var numareas = array_fortalezas.length;

	if(numareas==2){
	 	$('#BEFORTALEZA').attr('disabled','disabled');
	 }
	 
	 $("#FORTALEZA-"+numareas).remove(); 
	 array_fortalezas.pop();
	 
}

function ValidarLLenado(){
	
			
	var contlinea = 1;
	var contobjetivo = 1;
	var contmedio = 1;
	var contevidencia = 1; 
	
	var correcto = true;
	
	$("#alerta").hide();
	
	for(i=0;i<arraylineas_objetivos.length;i++){//OBTENEMOS LAS LINEAS
		
				
	    for(j=0;j<lineas_objetivos_medios[contlinea-1].length;j++){//OBTENEMOS LOS OBJETIVOS TACTICOS
				
	               if($('#L'+contlinea+'-O'+contobjetivo).val()==""){correcto = false; }
				   if($('#L'+contlinea+'-OR'+contobjetivo).val()==""){correcto = false; } 
			     
				 
				        for(k=0;k<lineas_objetivos_medios[contlinea-1][contobjetivo-1].length;k++){//OBTENEMOS LOS MEDIOS
							
							
							 if($('#L'+contlinea+'-O'+contobjetivo+'-M'+contmedio).val()==""){correcto = false; }
							 if($('#L'+contlinea+'-O'+contobjetivo+'-M'+contmedio+'-R'+contmedio).val()==""){correcto = false; }
							 
							 contmedio++;
							}
							
							contmedio = 1;
				  
				        for(k=0;k<lineas_objetivos_evidencias[contlinea-1][contobjetivo-1].length;k++){//OBTENEMOS LAS EVIDENCIAS
							 
							  if($('#L'+contlinea+'-O'+contobjetivo+'-E'+contevidencia).val()==""){correcto = false; }
							 
							  contevidencia++;
							}
							contevidencia = 1;
				  
				  contobjetivo++;
			}
			

			contobjetivo  = 1;
		    contlinea++;
			
		}//END OBTENEMOS LINEAS
	
       return correcto;
		
	 }




function Salvar(){
	
	
	var objetivos = "";
	var lineas = "";
	var medios = "";
	var evidencias = "";
		
	var contlinea = 1;
	var contobjetivo = 1;
	var contmedio = 1;
	var contevidencia = 1; 
	
	if(ValidarLLenado()){//SI EL FORMULARIO ESTA COMPLETAMENTE LLENO
		
	
	for(i=0;i<arraylineas_objetivos.length;i++){//OBTENEMOS LAS LINEAS
		
		value = $('#PK_LINEA_'+contlinea).val();
		lineas += value+"^";
		
	    for(j=0;j<lineas_objetivos_medios[contlinea-1].length;j++){//OBTENEMOS LOS OBJETIVOS TACTICOS
				
	
			      value = $('#L'+contlinea+'-O'+contobjetivo).val();
				   value = value.replace("|","");
				  value += "¬"+ $('#L'+contlinea+'-OE'+contobjetivo).val();
				  value += "¬"+ $('#L'+contlinea+'-OR'+contobjetivo).val();
		          objetivos += value+"^";
			     
				// alert(lineas_objetivos_medios[contlinea-1][contobjetivo-1].length); 
				 
				        for(k=0;k<lineas_objetivos_medios[contlinea-1][contobjetivo-1].length;k++){//OBTENEMOS LOS MEDIOS
							    value = $('#L'+contlinea+'-O'+contobjetivo+'-M'+contmedio).val();
								 value = value.replace("|","");
								value += "¬"+ $('#L'+contlinea+'-O'+contobjetivo+'-M'+contmedio+'-R'+contmedio).val();
								medios += value+"^";
								contmedio++;
							}
							medios += "~";
							contmedio = 1;
				  
				        for(k=0;k<lineas_objetivos_evidencias[contlinea-1][contobjetivo-1].length;k++){//OBTENEMOS LAS EVIDENCIAS
							    value = $('#L'+contlinea+'-O'+contobjetivo+'-E'+contevidencia).val();
								 value = value.replace("|","");
								evidencias += value+"^";
								contevidencia++;
							}
							evidencias += "~";
							contevidencia = 1;
				  
				  contobjetivo++;
				 
			}
			evidencias += "|";
			medios += "|";
			objetivos += "|";
			contobjetivo  =1;
		    
		
		    contlinea++;
		
		
		}//END OBTENEMOS LINEAS
	
	
	
	 GuardarObjetivos(lineas,objetivos,medios,evidencias);
	 
	 }else{
	 	
		 $('html, body').animate({scrollTop:0}, 10);
				$("#alerta").fadeIn();
				$("#alerta").removeClass();
                $("#alerta").addClass("alert alert-block");
				$("#headAlerta").html("¡Advertencia!");
				$("#bodyAlerta").html("Debe de llenar todos los campos, puede eliminar objetivos, medios y/o evidencias"); 
	 	
	 }
		
	 }
	
	
function GuardarObjetivos(lineas,objetivos,medios,evidencias){
	
	
	var idPlanOperativo = gup('IDPlan');
	var resumen = resumenEditor.getData();
	var estado = "R";
	
	//var resumen = encodeURIComponent(resumenEditor.getData());
	 $.blockUI({ css: { backgroundColor: 'transparent', color: '#336B86', border:"null" },
	            overlayCSS: {backgroundColor: '#FFF'},
                 message: '<img src="skins/default/images/spinner-md.gif" /><br><h3> Espere un momento..</h3>'
                 });
	
	$.ajax({ 
	 
 
    type: "POST",  
    url: "index.php?execute=planesoperativo/revisionobjetivosfinal&method=GuardarObjetivos",  
    data: { lineas: lineas, objetivos: objetivos, medios : medios, evidencias:evidencias, idPlanOperativo:idPlanOperativo,resumen:resumen,estado:estado},  
    success: function(msg){  
	

	  
	  $.unblockUI();
	  
	  $('html, body').animate({scrollTop:0}, 10);
				$("#alerta").fadeIn();
				$("#alerta").removeClass();
                $("#alerta").addClass("alert alert-success");
				$("#headAlerta").html("¡Correcto!");
				$("#bodyAlerta").html("Se ha guardado con exito el plan"); 
      
	 // setTimeout("window.location.href = '?execute=principal&Menu=F1&SubMenu=SF4#&p=1&s=25&sort=1&q='",1000);
               } 
   
           });
}
	
	
	/////////////////////////////GUARDAR PLAN OPERATIVO//////////////////////////
	
	function Salvar2(){
	
	
	var objetivos = "";
	var lineas = "";
	var medios = "";
	var evidencias = "";
		
	var contlinea = 1;
	var contobjetivo = 1;
	var contmedio = 1;
	var contevidencia = 1; 
    var areas = "";
    var fortalezas = "";
	
	if(ValidarLLenado()){//SI EL FORMULARIO ESTA COMPLETAMENTE LLENO
		
	
	for(i=0;i<arraylineas_objetivos.length;i++){//OBTENEMOS LAS LINEAS
		
		value = $('#PK_LINEA_'+contlinea).val();
		lineas += value+"^";
		
	    for(j=0;j<lineas_objetivos_medios[contlinea-1].length;j++){//OBTENEMOS LOS OBJETIVOS TACTICOS
				
	
			      value = $('#L'+contlinea+'-O'+contobjetivo).val();
				   value = value.replace("|","");
				  value += "¬"+ $('#L'+contlinea+'-OE'+contobjetivo).val();
				  value += "¬"+ $('#L'+contlinea+'-OR'+contobjetivo).val();
		          objetivos += value+"^";
			     
				// alert(lineas_objetivos_medios[contlinea-1][contobjetivo-1].length); 
				 
				        for(k=0;k<lineas_objetivos_medios[contlinea-1][contobjetivo-1].length;k++){//OBTENEMOS LOS MEDIOS
							    value = $('#L'+contlinea+'-O'+contobjetivo+'-M'+contmedio).val();
								 value = value.replace("|","");
								value += "¬"+ $('#L'+contlinea+'-O'+contobjetivo+'-M'+contmedio+'-R'+contmedio).val();
								medios += value+"^";
								contmedio++;
							}
							medios += "~";
							contmedio = 1;
				  
				        for(k=0;k<lineas_objetivos_evidencias[contlinea-1][contobjetivo-1].length;k++){//OBTENEMOS LAS EVIDENCIAS
							    value = $('#L'+contlinea+'-O'+contobjetivo+'-E'+contevidencia).val();
								 value = value.replace("|","");
								evidencias += value+"^";
								contevidencia++;
							}
							evidencias += "~";
							contevidencia = 1;
				  
				  contobjetivo++;
				 
			}
			evidencias += "|";
			medios += "|";
			objetivos += "|";
			contobjetivo  =1;
		    
		
		    contlinea++;
		
		
		}//END OBTENEMOS LINEAS
	
	  for(k=1;k<=array_areas.length;k++){//OBTENEMOS LAS AREAS DE OPORTUNIDAD
							    value = $('#INPUT-AREA-'+k).val();
								areas += value+"¬";
							}
	
	for(k=1;k<=array_fortalezas.length;k++){//OBTENEMOS LAS FORTALEZAS
							    value = $('#INPUT-FORTALEZA-'+k).val();
								fortalezas += value+"¬";
							}
	
	 GuardarObjetivos2(lineas,objetivos,medios,evidencias,areas,fortalezas);
	 
	 }else{
	 	
		 $('html, body').animate({scrollTop:0}, 10);
				$("#alerta").fadeIn();
				$("#alerta").removeClass();
                $("#alerta").addClass("alert alert-block");
				$("#headAlerta").html("¡Advertencia!");
				$("#bodyAlerta").html("Debe de llenar todos los campos, puede eliminar resultados, medios y/o evidencias"); 
	 	
	 }
		
	 }
	
	
function GuardarObjetivos2(lineas,objetivos,medios,evidencias,areas,fortalezas){
	
	
	var idPlanOperativo = gup('IDPlan');
	var estado = "R";

 $.blockUI({ css: { backgroundColor: 'transparent', color: '#336B86', border:"null" },
	            overlayCSS: {backgroundColor: '#FFF'},
                 message: '<img src="skins/default/images/spinner-md.gif" /><br><h3> Espere un momento..</h3>'
                 });
	
	$.ajax({ 
	 

	 
    type: "POST",  
    url: "index.php?execute=planesoperativo/revisionobjetivosfinal&method=GuardarObjetivos",  
    data: { lineas: lineas, objetivos: objetivos, medios : medios, evidencias:evidencias, idPlanOperativo:idPlanOperativo,areas:areas,fortalezas:fortalezas,estado:estado},  
    success: function(msg){  
	
	
	  
	  $.unblockUI();
	  
	  $('html, body').animate({scrollTop:0}, 10);
				$("#alerta").fadeIn();
				$("#alerta").removeClass();
                $("#alerta").addClass("alert alert-success");
				$("#headAlerta").html("¡Correcto!");
				$("#bodyAlerta").html("Se ha guardado con exito el plan"); 
      
	 // setTimeout("window.location.href = '?execute=principal&Menu=F1&SubMenu=SF4#&p=1&s=25&sort=1&q='",1000);
               } 
   
           });
}
	
	
	//////////////////////////////END GUARDAR PLAN OPERATIVO/////////////////////
	
	
	
	//////////////////////////////ENVIAR PLAN OPERATIVO/////////////////////
	function Enviar(confirm){
		 if(!confirm){
	 $('#titlemodal').html('Finalizar Plan Operativo para su seguimiento');
	 $('#bodymodal').html('¿Esta seguro de finalizar el plan? <br>Se guardaran todos los objetivos y no podran ser editados el Plan Operativo pasara a seguimiento');
	  $("#aceptarmodal").attr("onClick", "javascript:Enviar(true);return false;")
	 
     $('#myModal').modal('show');
	 }else{
	 $('#myModal').modal('hide');
	 
	  Salvar3();
		
	 }
		
	}
	
	
	//////////////////////GUARDAR Y ENVIAR PLAN OPERATIVO/////////
	
	function Salvar3(){
	
	
	var objetivos = "";
	var lineas = "";
	var medios = "";
	var evidencias = "";
		
	var contlinea = 1;
	var contobjetivo = 1;
	var contmedio = 1;
	var contevidencia = 1; 
	
	if(ValidarLLenado()){//SI EL FORMULARIO ESTA COMPLETAMENTE LLENO
		
	
	for(i=0;i<arraylineas_objetivos.length;i++){//OBTENEMOS LAS LINEAS
		
		value = $('#PK_LINEA_'+contlinea).val();
		lineas += value+"^";
		
	    for(j=0;j<lineas_objetivos_medios[contlinea-1].length;j++){//OBTENEMOS LOS OBJETIVOS TACTICOS
				
	
			      value = $('#L'+contlinea+'-O'+contobjetivo).val();
				   value = value.replace("|","");
				  value += "¬"+ $('#L'+contlinea+'-OE'+contobjetivo).val();
				  value += "¬"+ $('#L'+contlinea+'-OR'+contobjetivo).val();
		          objetivos += value+"^";
			     
				// alert(lineas_objetivos_medios[contlinea-1][contobjetivo-1].length); 
				 
				        for(k=0;k<lineas_objetivos_medios[contlinea-1][contobjetivo-1].length;k++){//OBTENEMOS LOS MEDIOS
							    value = $('#L'+contlinea+'-O'+contobjetivo+'-M'+contmedio).val();
								 value = value.replace("|","");
								value += "¬"+ $('#L'+contlinea+'-O'+contobjetivo+'-M'+contmedio+'-R'+contmedio).val();
								medios += value+"^";
								contmedio++;
							}
							medios += "~";
							contmedio = 1;
				  
				        for(k=0;k<lineas_objetivos_evidencias[contlinea-1][contobjetivo-1].length;k++){//OBTENEMOS LAS EVIDENCIAS
							    value = $('#L'+contlinea+'-O'+contobjetivo+'-E'+contevidencia).val();
								 value = value.replace("|","");
								evidencias += value+"^";
								contevidencia++;
							}
							evidencias += "~";
							contevidencia = 1;
				  
				  contobjetivo++;
				 
			}
			evidencias += "|";
			medios += "|";
			objetivos += "|";
			contobjetivo  =1;
		    
		
		    contlinea++;
		
		
		}//END OBTENEMOS LINEAS
	
	
	
	 GuardarObjetivos3(lineas,objetivos,medios,evidencias);
	 
	 }else{
	 	
		 $('html, body').animate({scrollTop:0}, 10);
				$("#alerta").fadeIn();
				$("#alerta").removeClass();
                $("#alerta").addClass("alert alert-block");
				$("#headAlerta").html("¡Advertencia!");
				$("#bodyAlerta").html("Debe de llenar todos los campos, puede eliminar objetivos, medios y/o evidencias"); 
	 	
	 }
		
	 }
	
	
function GuardarObjetivos3(lineas,objetivos,medios,evidencias){
	
	
	var idPlanOperativo = gup('IDPlan');
	var estado = "S";
	
	
	 $.blockUI({ css: { backgroundColor: 'transparent', color: '#336B86', border:"null" },
	            overlayCSS: {backgroundColor: '#FFF'},
                 message: '<img src="skins/default/images/spinner-md.gif" /><br><h3> Espere un momento..</h3>'
                 });
	$.ajax({ 
	 
	 // type: "POST",
     //data: { name: "John", location: "Boston" }
	 
    type: "POST",  
    url: "index.php?execute=planesoperativo/revisionobjetivosfinal&method=GuardarObjetivos",  
    data: { lineas: lineas, objetivos: objetivos, medios : medios, evidencias:evidencias, idPlanOperativo:idPlanOperativo,resumen:resumen,estado:estado},  
    success: function(msg){  
	

	  setTimeout("window.location.href = '?execute=operativo&Menu=F2&SubMenu=SF6#&p=1&s=25&sort=1&q=&alert=petrue'",0);
       
			   } 
   
           });
}
	
	
	
	///////////////////END GUARDAR Y ENVIAR PLAN OPERATIVO////////////////
	
	
	function recount(id)
{  
    
	var maxlen=140;
	var current = maxlen-$('#inputField-L'+id).val().length;
	$('#counter-L'+id).html(current);
	
	if(current<0 || current==maxlen)
	{
		$('#counter-L'+id).css('color','#D40D12');
		$('#update_button-L'+id).attr('disabled','disabled').addClass('inact');
	}
	else
		$('#update_button-L'+id).removeAttr('disabled').removeClass('inact');
	
	if(current<10)
		$('#counter-L'+id).css('color','#D40D12');
	
	else if(current<20)
		$('#counter-L'+id).css('color','#5C0002');

	else
		$('#counter-L'+id).css('color','#3a3a3b');
	
}


function recountr()
{  

    
	var maxlen=140;
	var current = maxlen-$('#inputField-resumen').val().length;
	$('#counter-resumen').html(current);
	
	if(current<0 || current==maxlen)
	{
		$('#counter-resumen').css('color','#D40D12');
		$('#update_button-resumen').attr('disabled','disabled').addClass('inact');
	}
	else
		$('#update_button-resumen').removeAttr('disabled').removeClass('inact');
	
	if(current<10)
		$('#counter-resumen').css('color','#D40D12');
	
	else if(current<20)
		$('#counter-resumen').css('color','#5C0002');

	else
		$('#counter-resumen').css('color','#3a3a3b');
	
}


function guardarComentario(id,idobjetivo){
	
	
	id = id.substring(13)
	id = id.split("-");
	
	
    var comentario = $("#inputField-"+id[1]+"-"+id[2]).val();
	
	$("#counter-"+id[1]+"-"+id[2]).html('<img src="skins/default/img/spinner-mini.gif" />');
	
		$.ajax({
			type: "POST",
			url: "index.php?execute=planesoperativo/revisionobjetivosfinal&method=insertarComentario",  
			data: { comentario: comentario, idobjetivo: idobjetivo},  
			cache: false,
			success: function(html)
			{
				
				$("#comentarios-"+id[1]+"-"+id[2]).prepend($(html).fadeIn('slow'));
				$("#inputField-"+id[1]+"-"+id[2]).val('');	
				$("#inputField-"+id[1]+"-"+id[2]).focus();
				//$("#stexpand").oembed(updateval);
  			}
 		});
	return false;

}



$('.stdelete').live("click",function() 
{
var ID = $(this).attr("id");

if(confirm("¿Estás seguro que deseas  borrar el comentario?"))
{
	
	$("#stbody"+ID).prepend('<img src="skins/default/img/spinner-mini.gif" />');
	$.ajax({
		type: "POST",
		url: "index.php?execute=planesoperativo/revisionobjetivosfinal&method=eliminarComentario",  
		data: {idcomentario: ID},  
		cache: false,
		success: function(html){
			
		$("#stbody"+ID).slideUp();
		}
 	});
}
return false;
});



$('.stdeleter').live("click",function() 
{
var ID = $(this).attr("id");
var idcomentario =  ID.substring(1);
    

if(confirm("¿Estás seguro que deseas  borrar el comentario?"))
{
	
	$("#stbody"+ID).prepend('<img src="skins/default/img/spinner-mini.gif" />');
	$.ajax({
		type: "POST",
		url: "index.php?execute=planesoperativo/revisionobjetivosfinal&method=eliminarComentarioResumen",  
		data: {idcomentario: idcomentario},  
		cache: false,
		success: function(html){
			
			
			
		$("#stbody"+ID).slideUp();
		}
 	});
}
return false;
});




function guardarComentarioResumen(){

	var idplan = gup('IDPlan');
    var comentario = $("#inputField-resumen").val();
	
	$("#counter-resumen").html('<img src="skins/default/img/spinner-mini.gif" />');
	
		$.ajax({
			type: "POST",
			url: "index.php?execute=planesoperativo/revisionobjetivosfinal&method=insertarComentarioResumen",  
			data: { comentario: comentario, idplan: idplan},  
			cache: false,
			success: function(html)
			{
				
				
				$("#comentarios-resumen").prepend($(html).fadeIn('slow'));
				$("#inputField-resumen").val('');	
				$("#inputField-resumen").focus();
				//$("#stexpand").oembed(updateval);
  			}
 		});
	return false;

	
}
	
	function Toogleresumen(id){
		var local = id.split("-");
		if($('#BOXRESUMEN').is(':visible')) $('#'+id).html('<i class="icon-chevron-down"></i> Comentarios');
		else $('#'+id).html('<i class="icon-chevron-up"></i> Comentarios');

		if ($('#BOXRESUMEN').is (':visible')) $('#BOXRESUMEN').slideUp();
		if ($('#BOXRESUMEN').is (':hidden')) $('#BOXRESUMEN').slideDown();
	}
	
	
	function Tooglecomentarios(id){
		var local = id.split("-");
		if($('#BOXCOM-'+local[1]+"-"+local[2]).is(':visible')) $('#'+id).html('<i class="icon-chevron-down"></i> Comentarios');
		else $('#'+id).html('<i class="icon-chevron-up"></i> Comentarios');
		
		if ($('#BOXCOM-'+local[1]+"-"+local[2]).is (':visible')) $('#BOXCOM-'+local[1]+"-"+local[2]).slideUp();
		if ($('#BOXCOM-'+local[1]+"-"+local[2]).is (':hidden')) $('#BOXCOM-'+local[1]+"-"+local[2]).slideDown();
	}
	
	
	
	function Toogle(id){
	
		var local = id.split("-");
		if($('#BOX-'+local[1]+"-"+local[2]).is(':visible')) $('#'+id).html('<i class="icon-chevron-down"></i> Medios');
		else $('#'+id).html('<i class="icon-chevron-up"></i> Medios');
		
		if ($('#BOX-'+local[1]+"-"+local[2]).is (':visible')) $('#BOX-'+local[1]+"-"+local[2]).slideUp();
		if ($('#BOX-'+local[1]+"-"+local[2]).is (':hidden')) $('#BOX-'+local[1]+"-"+local[2]).slideDown();
	}
	
	
	function gup(name){
	
	var regexS = "[\\?&]"+name+"=([^&#]*)";
	var regex = new RegExp ( regexS );
	var tmpURL = window.location.href;
	var results = regex.exec( tmpURL );
	if( results == null )
		return"";
	else
		return results[1];
}
	