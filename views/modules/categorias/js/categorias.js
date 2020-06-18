var userGlobal = "user val";

$(document).ready(function(){
	
	$.getJSON('https://prospectos.redanahuac.mx/app/mobile/web.app?callback=?','execute=principal&method=getUsuario',function(resul){
		
		//alert(resul.usuario);
		
		userGlobal = resul.usuario;
		
		});
	
 
		
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
   urltag = "&p=1&s=25&sort=1&q=";
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
  	

  	
  }
  
  
  
  
  
  function buscar(){
  	
  $('#eventos').empty();
  
  
 $('#resultados').block({ css: { backgroundColor: 'transparent', color: '#EC5C00', border:"null" },
                 message: '<img src="skins/default/images/spinner-md.gif" /><br><h3> Buscando...</h3>' });
  
  var fil="";
  var q="";
  
    q = gup('q');
	$('#searchbar').val(q);
	

  var s= parseInt(gup('s'));
  
  urltag = "&p="+gup('p')+"&s="+gup('s')+"&sort="+gup('sort')+"&q="+q;
  
  if(gup('filter')){
		urltag += "&filter="+gup('filter');
	}
   	
   window.location.hash = urltag;
	
	
	
	$.getJSON('http://144.202.248.171/servicetest.php?callback=?','evento=showcategorias',function(res){
    //alert('Asunto '+res.hinicio);
    //alert('Clave '+res.organiza);
    //alert('Total '+res.total);
    //alert('Total '+res.detalle);
    
    var total = res.total;
    
    var fregistro = res.fregistro.split("|"); fregistro.pop();
    var clave = res.clave.split("|"); clave.pop();
    var descripcion = res.descripcion.split("|"); descripcion.pop();
    
    

    var cadena ="";
    
    for(var i=0;i<total;i++){
	        
	        cadena = '<li id="evento'+clave[i]+'">';
	        cadena += '<div class="comment-info">';
	        cadena += '<h1>'+descripcion[i]+'</h1>';
	        
	        
	        
	        cadena += '<div style="float:right; margin-top:-35px;"><a class="btn btn-success btn-small" href="javascript:void(0)" onClick="BuscarCategoria(\''+clave[i]+'\')"><span class="icon-thumbs-up icon-white"></span> Editar</a>';
	        
	        cadena += '<a class="btn btn-small" href="javascript:void(0)" onClick="EliminarCategoria(\''+clave[i]+'\',false)"><span class="icon-thumbs-down"></span> Eliminar</a></div></div></li>';        
	        	
            $("#eventos").append(cadena);
		
	}
    $('#results_text').html(res.total+" resultados");
    $('#resultados').unblock();	
});
	
  }
  
  
  
  
  
  
  function AgregarCategoria(){
  	
    var categoria =  omitirAcentos($('#categoria').val());
    /* 
    
    $.ajax({
    type: "GET",
    url: "http://144.202.248.171/servicetest.php?evento=addcategoria&categoria="+encodeURI(categoria),
    jsonp: "callback",
    contentType: "application/json; charset=utf-8",
    dataType: "jsonp",
    data: "{categoria: " + encodeURI(categoria) + "}",
    success: function(json) {
       alert('insertado '+json.insertado);
        //$("#success").html("json.length=" + json.length);
        //itemAddCallback(json);
    },
    error: function (xhr, textStatus, errorThrown) {
        //$("#error").html(xhr.responseText);
        alert("error");
    }
});
    */
    
    if(categoria == ""  ){
  		
  		alert("Por favor llene todos los campos marcados con *");
  		
  		}else{
    
    
    
  	$.getJSON('http://144.202.248.171/servicetest.php?callback=?','evento=addcategoria&categoria='+categoria+'',function(res){
  			 
  			
  		 if(res.insertado==""){
		 	$('#myModalplanese').modal('hide');
		 	
		 	$("#alerta").fadeIn();
				$("#alerta").removeClass();
                $("#alerta").addClass("alert alert-success");
				$("#headAlerta").html("¡En hora buena!");
				$("#bodyAlerta").html("Has agregado una nueva categoría");
		 	buscar();
		 }else{
		 	
		 	alert("!Opps hubo un error intente guardar nuevamente");
		 	
		 }
  		 
  		});
  		}
  }
  
  
  function BuscarCategoria(id){
  	
  	
  	$.getJSON('http://144.202.248.171/servicetest.php?callback=?','evento=searchcategoria&id='+id+'',function(res){
  	     
  	    $('#myModalplanese').modal('show');
  	    $("#aceptarmodalpe").attr("onClick", "javascript:EditarCategoria('"+id+"');return false;")
  	    $("#aceptarmodalpe").html("Actualizar");
  	    $("#titlemodalplane").html("Editar Categoría");
  	   
  	    $('#categoria').val(res.categoria);
  	    
  	
  	});
  	
  	
  }
  
  
  
   function EditarCategoria(id){
   	
   	
   	var idevento = id;  	  	
    var categoria =  omitirAcentos($('#categoria').val());
    
    
    if(categoria == ""  ){
  		
  		alert("Por favor llene todos los campos marcados con *");
  		
  		}else{
    
  	$.getJSON('http://144.202.248.171/servicetest.php?callback=?','evento=updatecategoria&categoria='+categoria+'&id='+idevento+'',function(res){
  		
  		 
  		 if(res.insertado==""){
		 	
		 	$('#myModalplanese').modal('hide');
		 	
		 	$("#alerta").fadeIn();
				$("#alerta").removeClass();
                $("#alerta").addClass("alert alert-success");
				$("#headAlerta").html("¡Correcto!");
				$("#bodyAlerta").html("Has editado la categoría");
		 	
		 	
		 	buscar();
		 		
		 }else{
		 	
		 	alert("!Opps hubo un error intente guardar nuevamente");
		 	
		 }

  		});

  	}
  }
  
 
 
  function Eliminar(id){
  	
  	var eliminar = confirm("Confirma que desea eliminar el evento?");
  	var idevento = id; 
  	
  	if(eliminar){
		  	
  	$.getJSON('http://144.202.248.171/servicetest.php?callback=?','evento=deletecategoria&id='+idevento+'',function(res){
  		
  		 $('#evento'+idevento).slideUp(1000);
  		
  		});
  		}else{
			
			
			
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



function getURL(){
	url = window.location.toString();
    param = url.split('#');
    parametros = param[1].split('&');
  
    urltag = "&"+parametros[1]+"&"+parametros[2]+"&"+parametros[3]+"&q="+$('#searchbar').val();	
    window.location.hash = urltag;
}


function deseleccionar_todo(){
   for (i=0;i<document.f1.elements.length;i++)
      if(document.f1.elements[i].type == "checkbox")
         document.f1.elements[i].checked=0
} 


function EliminarCategoria(id,confirm){
      
	 $("#alerta").hide(); 
	 var idevento = id;
	  
	 if(!confirm){
	 $('#titlemodal').html('Eliminar Categoría');
	 $('#bodymodal').html('¿Esta seguro de eliminar la Categoría?');
	  $("#aceptarmodal").attr("onClick", "javascript:EliminarCategoria('"+id+"',true);return false;")
	 
     $('#myModal').modal('show');
	 }else{
	 $('#myModal').modal('hide');
	 			 
	 $.getJSON('http://144.202.248.171/servicetest.php?callback=?','evento=deletecategoria&id='+idevento+'',function(res){
	 	
	 	
	 	
  		if(res.eliminado.trim()=='0'){

  		 $('#evento'+idevento).slideUp(1000);
  		 
  		 $("#alerta").fadeIn();
				$("#alerta").removeClass();
                $("#alerta").addClass("alert alert-success");
				$("#headAlerta").html("¡Correcto!");
				$("#bodyAlerta").html("Has eliminado la categoría");
				
				}else{
			
			
			$("#alerta").fadeIn();
				$("#alerta").removeClass();
                $("#alerta").addClass("alert alert-error");
				$("#headAlerta").html("¡Ops! Error!");
				$("#bodyAlerta").html("La categoría está siendo usada por una noticia no es posible eliminarla");
			
		}
				
  		
  		});
  		
  		
		
	 }
}



function AsignarPlanEstrategico(confirm){
      
	 if(!confirm){
	// $('#titlemodal').html('Eliminar Plan Estrategico');
	 //$('#bodymodal').html('¿Esta seguro de eliminar el plan');
	 $("#aceptarmodalpe").attr("onClick", "javascript:AgregarCategoria();return false;")
	 $("#titlemodalplane").html("Agregar Categoría");
	  $('#categoria').val('');
	  
     $('#myModalplanese').modal('show');
	      //setTimeout("buscarPlanesE()",900);
	 }else{
	 $('#myModalplanese').modal('hide');
	 
	 
	 }
}

function validarString (cadenaAnalizar) {
   for (var i = 0; i< cadenaAnalizar.length; i++) {
         var caracter = cadenaAnalizar.charAt(i);
         if( caracter == "ñ" || caracter == "Ñ") {
            alert("Caracter no permitido");
             return false;
          }  else {
             return true;
          }
    }
}  




function omitirAcentos(text) {
	    
	     text = text.replace(/á/gi, "%a");
	     text = text.replace(/é/gi, "%e");
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