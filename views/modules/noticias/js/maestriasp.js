var iAmGlobal = "some val";
var userGlobal = "user val";

$(document).ready(function(){
	
	
	
	
	if(gup("alert")){
		 //$.growlUI('Plan Operativo Enviado', 'Se ha enviado para su Revisión');
		 
		$("#alerta").fadeIn();
		$("#alerta").removeClass();
        $("#alerta").addClass("alert alert-success");
	    $("#headAlerta").html("¡Correcto!");
			
				
	switch(gup("alert"))
    {
    case '1':
    $("#bodyAlerta").html("Se ha guardado el plan operativo"); 
    break;
    case '2':
    $("#bodyAlerta").html("Se ha enviado el plan operativo para su revisión"); 
    break;
    
	//default:
    
    }
				
				
	}
  
  
   if(gup("p")){}else{
   urltag = "&p=1&s=25&sort=-1&q=";
   window.location.hash = urltag;
   }


  });
  
  
  $(window).load(function() {
   		 
      buscar();
      

	 
	});
  
  
  function buscarPE(){
  		
	q = $('#searchbar').val();
	urltag = "&p="+gup('p')+"&s="+gup('s')+"&sort="+gup('sort')+"&q="+q;
	window.location.hash = urltag;
    buscarPlanesE();
	
  }
 
 
  function buscarPlanes(){
  		
	q = $('#searchbarpo').val();
	urltag = "&p="+gup('p')+"&s="+gup('s')+"&sort="+gup('sort')+"&q="+q;
	
    if(gup('filter')){
	urltag += "&filter="+gup('filter');	
	}
	window.location.hash = urltag;
    buscar();
	
  }
 
     
  function filtrar(cat){
  

    var q = $('#searchbarpo').val();
    
	var categorias = new Array();
    
	  $("input[@name='niveles[]']:checked").each(function() {
            categorias.push($(this).val());
        }); 
	
  			
	urltag = "&p=1&s="+gup('s')+"&sort="+gup('sort')+"&q="+q;
  
    if(categorias.length>0){
  	fil = categorias.join(";");
	
	urltag += "&filter="+fil;
        }

     window.location.hash = urltag;
	
	
	// alert('entro');
     buscar();
  
  }
  
  
  function showPage(p){

  urltag = "&p="+p+"&s="+gup('s')+"&sort="+gup('sort')+"&q="+gup('q');
  if(gup('filter')!=" "){

	urltag += "&filter="+gup('filter');
        }
 
   window.location.hash = urltag;
   buscar();	
  }
  
  
  
  function showLimitPage(s,id){

  urltag = "&p="+gup('p')+"&s="+s+"&sort="+gup('sort')+"&q="+gup('q');
  if(gup('filter')!=" "){

	urltag += "&filter="+gup('filter');
        }
  
   window.location.hash = urltag;	
   buscar();	
  }
  
  
  
  function showLimitPage2(s,id){

  urltag = "&p="+gup('p')+"&s="+s+"&sort="+gup('sort')+"&q="+gup('q');
  if(gup('filter')!=" "){

	urltag += "&filter="+gup('filter');
        }
  
   window.location.hash = urltag;	
   buscarPlanesE();
  }
  
  
  
 function Ordenar(value){
  	
  	
  	urltag = "&p="+gup('p')+"&s="+gup('s')+"&sort="+value+"&q="+gup('q');
  if(gup('filter')!=" "){

	urltag += "&filter="+gup('filter');
    }
 
   window.location.hash = urltag;
   buscar();
  	
  	
  	
  }
  
  
 
 function buscar(){
    
  /* $('div.table').block({ css: { backgroundColor: 'transparent', color: '#EC5C00', border:"null" },
                 message: '<img src="skins/default/images/spinner-md.gif" /><br><h3> Buscando...</h3>' });*/
  
  var fil="";
  var q="";
  
    q = gup('q');
	$('#searchbar').val(q);
	

var s= parseInt(gup('s'));
  
  urltag = "&p="+gup('p')+"&s="+gup('s')+"&sort="+gup('sort')+"&q="+encodeURI(q);
  
   if(gup('filter')){
		urltag += "&filter="+gup('filter');
	}
   	
   window.location.hash = urltag;
   
  // alert(urltag);
	
	$.ajax({ 
    type: "GET",  
    url: "index.php",  
    data: "execute=maestriasp&method=Buscar"+urltag,  
    success: function(msg){  
    
  // alert(msg);
	
	var contenido = msg.split('#%#');

    	// alert(msg);
   $('#pagginghead').html(contenido[0]);
   $('#results-panel').html(contenido[1]);
   $('#barfilterfooter').html(contenido[2]);
   $('#results_text').html(contenido[3]+" Resultados");
   
      
  /* if(gup('q')==""){
   	strresul = "resultados";
   }else{
   	strresul = 'resultados para <span class="bold_terms">'+gup('q')+'</span>';
   }
  
   $('#results_for').html(strresul);*/
   
   
	switch(s)
{
 case 25:
 $("#page_size_25-panel").addClass("page_size_25-selected");
  break;
 
 case 50:
 $("#page_size_50-panel").addClass("page_size_50-selected");
 break;
 
 case 100:
 $("#page_size_100-panel").addClass("page_size_100-selected");
  break;
 
 case 200:
 $("#page_size_200-panel").addClass("page_size_200-selected");
  break;

 
 
}
	 
     // $('div.table').unblock();	  
 // $.unblockUI();
               } 
   
           });
	
  }
 
 
 function AsignarPlanEstrategico(confirm){
      
	 if(!confirm){
	// $('#titlemodal').html('Eliminar Plan Estrategico');
	 //$('#bodymodal').html('¿Esta seguro de eliminar el plan');
	
	 $('#campus').val('');
	 $('#programa').val('');  
	 $("programa").prop('selected', false); 
	 $("#titlemodalplane").html("Agregar Prospecto");
       $("#aceptarmodalpe").html("Guardar");
    
     $('#nombre').val('');
     $('#apellidos').val('');   
     $('#telefono').val('');
     $('#correo').val('');
     $('#ciudad').val('');
  	

  	 //getCategorias();
	 $("#aceptarmodalpe").attr("onClick", "javascript:AgregarNoticia();return false;");
	 
	  
     $('#myModalplanese').modal('show');
	      //setTimeout("buscarPlanesE()",900);
	 }else{
	 $('#myModalplanese').modal('hide');
	 
	 
	 }
}

 
  
  
  function AgregarNoticia(){
  	
  	  // $("programa").prop('selected', false);  
  	
  	var campus =  $('#campus').val(); 
    var programa =  $('#programa').val();   
    var grado =  $('#grado').val();  
   
    var nombre =  $('#nombre').val();
    var apellidos =  $('#apellidos').val();  
    var telefono =  $('#telefono').val();
    var correo =  $('#correo').val();
    var ciudad =  $('#ciudad').val();   
  	
  	
  	
  	if(nombre =="" /*|| finicio == "" || ftermino=="" || detalle==""*/ ){
  		
  		alert("Por favor llene todos los campos marcados con *");
		
	}else{
		  	
		  	
		  	
		   $.blockUI({ css: { backgroundColor: 'transparent', color: '#fff', border:"null" },
	            overlayCSS: {backgroundColor: '#000'},
                 message: '<img src="skins/default/images/ajax-loader2.gif" /><br><h3> Espere un momento..</h3>'
                 });
                 
         
                 
	$.ajax({ 	 
	
	 
    type: "POST",  
    url: "index.php?execute=maestriasp&method=Guardar",  
    data: { campus: campus,programa: programa, grado: grado,nombre: nombre, apellidos: apellidos, telefono: telefono, correo: correo, ciudad: ciudad},
    success: function(msg){  
	//alert(msg);
	
	  $('#myModalplanese').modal('hide'); 
      buscar();
	  $.unblockUI();	
	      
     
      
	  
               } 
   
       });	
		  	
		  	
		  
  	
  	}
  	
  	
  }
  
  
  function BuscarProspecto(idprospecto){  	
  		
  	
		    //$('#campus').val(); 
		  	
		  $.blockUI({ css: { backgroundColor: 'transparent', color: '#fff', border:"null" },
	            overlayCSS: {backgroundColor: '#000'},
                 message: '<img src="skins/default/images/ajax-loader2.gif" /><br><h3> Espere un momento..</h3>'
                 });
                 
         
                 
	$.ajax({ 	 
	
	 
    type: "POST",  
    url: "index.php?execute=maestriasp&method=BuscarProspecto",  
    data: { idprospecto: idprospecto},
    success: function(msg){  
	//alert(msg);
	
	   var contenido = msg.split('#%#');
	 
	 
	   $('#myModalplanese').modal('show');
  	   $("#aceptarmodalpe").attr("onClick", "javascript:EditarProspecto('"+idprospecto+"');return false;");
  	   $("#aceptarmodalpe").html("Actualizar");
  	    
  	   $("#titlemodalplane").html("Editar Prospecto");	 
	 
	  
	  $('#campus option[value="'+contenido[0]+'"]').attr('selected', 'selected');
	  $('#programa option[value="'+contenido[1]+'"]').attr('selected', 'selected');
	  $('#nombre').val(contenido[2]);
	  
	  $('#apellidos').val(contenido[3]);  
	  $('#telefono').val(contenido[4]);
	  $('#correo').val(contenido[5]);
	  $('#ciudad').val(contenido[6]);
		  
	  
	 
	  $.unblockUI();	
	      
     
      
	  
               } 
   
       });	
		  	
		  
  	
  	
  }
  
  
  function EditarProspecto(idprospecto){
  	
  	
  
  	  // $("programa").prop('selected', false);  
  	
  	var campus =  $('#campus').val(); 
    var programa =  $('#programa').val();   
    var grado =  $('#grado').val();  
   
    var nombre =  $('#nombre').val();
    var apellidos =  $('#apellidos').val();  
    var telefono =  $('#telefono').val();
    var correo =  $('#correo').val();
    var ciudad =  $('#ciudad').val();   
  	
  	
  	
  	if(nombre =="" /*|| finicio == "" || ftermino=="" || detalle==""*/ ){
  		
  		alert("Por favor llene todos los campos marcados con *");
		
	}else{
		  	
		  	
		  	
		  $.blockUI({ css: { backgroundColor: 'transparent', color: '#fff', border:"null" },
	            overlayCSS: {backgroundColor: '#000'},
                 message: '<img src="skins/default/images/ajax-loader2.gif" /><br><h3> Espere un momento..</h3>'
                 });
                 
         
                 
	$.ajax({ 	 
	
	 
    type: "POST",  
    url: "index.php?execute=maestriasp&method=Editar",  
    data: { idprospecto:idprospecto, campus: campus,programa: programa, grado: grado,nombre: nombre, apellidos: apellidos, telefono: telefono, correo: correo, ciudad: ciudad},
    success: function(msg){  
	//alert(msg);
	
	  $('#myModalplanese').modal('hide'); 
      buscar();
	  $.unblockUI();	
	      
         
	  
               } 
   
       });	
		  	
		  	
		  
  	
  	}
  	
  	
  }
  
  // Extender jQuery con un método personalizado:
jQuery.fn.getCheckboxValues = function(){
    var values = [];
    var i = 0;
    this.each(function(){
        // guarda los valores en un array
        values[i++] = this.id;
    });
    // devuelve un array con los checkboxes seleccionados
    return values;
}
 
 
 function enviar(){
 	
var arr = $("input:checked.usrcheck").getCheckboxValues();

 if(arr.length==0){
	alert("Debe elegir un prospecto");
 }else{
	//alert(arr); // esto muestra un pop-up con los checkboxes seleccionados	
	 $('#usuarios').val(arr);	 
	 EliminarProspecto(false);
	 
	 
 }
 }
 
 
  
 
  
  function EliminarProspecto(confirm){
      
	 if(!confirm){
	 $('#titlemodal').html('Eliminar prospecto');
	 $('#bodymodal').html('¿Esta seguro de eliminar el prospecto?');
	  $("#aceptarmodal").attr("onClick", "javascript:EliminarProspecto(true);return false;")
	 
     $('#myModal').modal('show');
	 }else{
	 $('#myModal').modal('hide');
	 
	 var usuarios = $('#usuarios').val();	
	 
	
	 
	 $.blockUI({ css: { backgroundColor: 'transparent', color: '#fff', border:"null" },
	            overlayCSS: {backgroundColor: '#000'},
                 message: '<img src="skins/admin/images/ajax-loader2.gif" /><br><h3> Espere un momento..</h3>'
                 });
	
	 
	 
	$.ajax({	 
    type: "POST",  
    url: "index.php?execute=maestriasp&method=Eliminar",  
    data: { usuarios:usuarios},
    success: function(msg){  
    
    
	  buscar();
      $.unblockUI();		
	  
	  $('html, body').animate({scrollTop:0}, 10);
				$("#alerta").fadeIn();
				$("#alerta").removeClass();
                $("#alerta").addClass("alert alert-success");
				$("#headAlerta").html("¡Correcto!");
				$("#bodyAlerta").html("Se ha eliminado el prospecto"); 
      
	  
               } 
   
           });
		
	 }
}

  
  function seleccionarTodo(id){
    
	 if(document.getElementById('checkboxall'+id).checked==1)
	   {
	   
	   for (i=0;i<document.forms.namedItem("formulario"+id).elements.length;i++){ 
	      if(document.forms.namedItem("formulario"+id).elements[i].type == "checkbox"){ 
	         document.forms.namedItem("formulario"+id).elements[i].checked=1 
			 }
			 }
	   }
	    else{
		
		for (i=0;i<document.forms.namedItem("formulario"+id).elements.length;i++) 
	      if(document.forms.namedItem("formulario"+id).elements[i].type == "checkbox") 
	         document.forms.namedItem("formulario"+id).elements[i].checked=0 
		}
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




function deseleccionar_todo(){
   for (i=0;i<document.f1.elements.length;i++)
      if(document.f1.elements[i].type == "checkbox")
         document.f1.elements[i].checked=0
} 



function Exportar(){
 	
var arr = $("input:checked.usrcheck").getCheckboxValues();

 if(arr.length==0){
	alert("Debe elegir un prospecto");
 }else{
	//alert(arr); // esto muestra un pop-up con los checkboxes seleccionados	
	
	
		
	 $('#usuarios').val(arr);	 
	 var usuarios = $('#usuarios').val();	
	 
	 	 
	 
	 // $("#idexportar").attr("href", "?execute=descargar_prospecto&usuarios="+usuarios);
      
	 setTimeout("window.location.href = '?execute=descargar_prospecto&usuarios="+usuarios+"'",0);
	 
 }
 }



/*function EnviarExportar(confirm)
{
	
		if(!confirm)
		{
			
			$('#titlemodal1').html('Exportar');
			$('#bodymodal1').html('¿Desea Exportar?');
			$("#aceptarmodal1").attr("onClick", "javascript:EnviarExportar(true);return false;");
			$('#myModal1').modal('show');
		}
		else
		{
			$('#myModal1').modal('hide');

			
		
		  			
			
			
		}
	
}*/





 function Enviar(){
 	
var arr = $("input:checked.usrcheck").getCheckboxValues();

 if(arr.length==0){
	alert("Debe elegir un prospecto");
 }else{
	//alert(arr); // esto muestra un pop-up con los checkboxes seleccionados	
	 $('#usuarios').val(arr);	 
	 EnviarCorreo(false);
	 
	 
 }
 }

function EnviarCorreo(confirm)
{
	/*if(validarFormularioEnviar())
	{*/
		if(!confirm)
		{
			
			$('#titlemodal1').html('Enviar Correo');
			$('#bodymodal1').html('¿Desea enviar correo?');
			$("#aceptarmodal1").attr("onClick", "javascript:EnviarCorreo(true);return false;");
			$('#myModal1').modal('show');
		}
		else
		{
			$('#myModal1').modal('hide');

			$.blockUI({ css: { backgroundColor: 'transparent', color: '#336B86', border:"null" },
				overlayCSS: {backgroundColor: '#FFF'},
				message: '<img src="skins/default/images/spinner-md.gif" /><br><h3> Espere un momento..</h3>'
			});

		  var usuarios = $('#usuarios').val();	
		  
		 // alert(usuarios);
		  			
			
			$.ajax({	 
		    type: "POST",  
		    url: "index.php?execute=maestriasp&method=EnviarCorreoProsp",  
		    data: { usuarios:usuarios},
		    success: function(msg){				
				
				$.unblockUI();	
				
				//alert(msg);
				
					
				//	setTimeout("window.location.href = '?execute=principal&Menu=F1&SubMenu=SF11&alert=1#&p=1&s=25&sort=1&q=&alert=3'",1000);
					
					
					
					
				}
			});
		}
	/*}
	else
	{
		$('html, body').animate({scrollTop:0}, 10);
		$("#alerta").fadeIn();
		$("#alerta").removeClass();
		$("#alerta").addClass("alert alert-block");
		$("#headAlerta").html("¡Advertencia!");
		$("#bodyAlerta").html("Debes de ingresar todos los campos. ¡Gracias!" );
	}*/
}














function omitirAcentos(text) {
	    
	     text = text.replace(/á/gi, "%a");
	     text = text.replace(/é/g, "/e");
	     text = text.replace(/í/gi, "%i");
	     text = text.replace(/ó/gi, "%o");
	     text = text.replace(/ú/gi, "%u");
	     text = text.replace(/ñ/gi, "%n");
	     
	     text = text.replace(/Á/gi, "%A");
	     text = text.replace(/É/gi, "%E");
	     text = text.replace(/Í/gi, "%I");
	     text = text.replace(/Ó/gi, "%O");
	     text = text.replace(/Ú/gi, "%U");
	     text = text.replace(/Ñ/gi, "%N");
	     
	     text = text.replace(/'/gi, '"');
	     text = text.replace(/“/gi, '"');
	     text = text.replace(/”/gi, '"');
	     
	     
	     
	     text = text.replace(/ä/gi, "a");
	     text = text.replace(/ë/gi, "e");
	     text = text.replace(/ï/gi, "i");
	     text = text.replace(/ö/gi, "o");
	     text = text.replace(/ü/gi, "u");
	     
	     
	     text = text.replace(/Ä/gi, "A");
	     text = text.replace(/Ë/gi, "E");
	     text = text.replace(/Ï/gi, "I");
	     text = text.replace(/Ö/gi, "O");
	     text = text.replace(/Ü/gi, "U");
	     
	     
	     text = replaceSpecialChars(text);
	     
	     return text;
	}
	
	
	var specialChars = [
	{val:"a",let:"àãâä"},
	{val:"e",let:"èêë"},
	{val:"i",let:"ìîï"},
	{val:"o",let:"òõôö"},
	{val:"u",let:"ùûü"},
	{val:"c",let:"ç"},
	{val:"A",let:"ÁÀÃÂÄ"},
	{val:"E",let:"ÉÈÊË"},
	{val:"I",let:"ÍÌÎÏ"},
	{val:"O",let:"ÓÒÕÔÖ"},
	{val:"U",let:"ÚÙÛÜ"},
	{val:"C",let:"Ç"},
	{val:"",let:"~^¬“”#¡°"}
];

function replaceSpecialChars(str) {
	var $spaceSymbol = ' ';
	var regex;
	var returnString = str;
	for (var i = 0; i < specialChars.length; i++) {
		regex = new RegExp("["+specialChars[i].let+"]", "g");
		returnString = returnString.replace(regex, specialChars[i].val);
		regex = null;
	}
	return returnString.replace(/\s/g,$spaceSymbol);
};
	
