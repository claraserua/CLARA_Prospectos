


var arrayLineas = new Array();

var arrayobjetivos = new Array();


$(function(){
	  
	 IdPlan = gup('IDPlan');	  
		  
	$.ajax({ 
	 
    type: "POST",  
    url: "index.php?execute=planestrategico/editplanelineas&method=Activo",  
    data: { IdPlan : IdPlan},  
    success: function(msg){  
	
	    
	
   //window.location.href='?execute=principal&method=default&Menu=F1&SubMenu=SF11#&p=1&s=25&sort=1&q=&alert=2';
   
  
  
    if(msg.trim()=="TRUE"){
	   
	  $('html, body').animate({scrollTop:0}, 10);
				$("#alerta").fadeIn();
				$("#alerta").removeClass();
                $("#alerta").addClass("alert alert-block");
				$("#headAlerta").html("¡Advertencia!");
				$("#bodyAlerta").html("El Plan Estrategico esta siendo usado por planes operativos, puede modificar y/o agregar pero NO Eliminar lineas y/o Objetivos");
      
	 // setTimeout("window.location.href = '?execute=principal&Menu=F1&SubMenu=SF4#&p=1&s=25&sort=1&q='",1000);
               }
   
	  
               } 
   
           });	  
		  
	
    
		  
		 
	$( "#finicio" ).datepicker({
      changeMonth: true,
      changeYear: true,
	  dateFormat: 'yy-mm-dd' 
    });
	
	
	$( "#ftermino" ).datepicker({
      changeMonth: true,
      changeYear: true,
	    dateFormat: 'yy-mm-dd' 
    });	
	
	 
	//POST FRAME ADD IMAGE USER
	$('#frmaddplanese').iframePostForm
	({
		json : false,
		post : function ()
		{
			var message;
			
				
			if ($('#titulo').val().length && $('#finicio').val().length && $('#ftermino').val().length)
			{
				//GUARDANDO ARCHIVOS
					
				$('html, body').animate({scrollTop:0}, 'slow');
               $.blockUI({ css: { backgroundColor: 'transparent', color: '#336B86', border:"null" },
	            overlayCSS: {backgroundColor: '#FFF'},
                 message: '<img src="skins/default/images/spinner-md.gif" /><br><h3> Espere un momento..</h3>'
                 });
				
			}else{
				
				$('html, body').animate({scrollTop:0}, 10);
				$("#alerta").fadeIn();
				$("#alerta").removeClass();
                $("#alerta").addClass("alert alert-block");
				$("#headAlerta").html("¡Advertencia!");
				$("#bodyAlerta").html("Debes de ingresar todos los campos obligatorios");
				
				return false;
			}
			
			
			
			
		},
		complete : function (response)
		{
			
			$.unblockUI();
			if (response.trim()=="false")
			{
			
				$('html, body').animate({scrollTop:0}, 10);
				$.unblockUI();
				$("#alerta").fadeIn();
				$("#alerta").removeClass();
                $("#alerta").addClass("alert alert-error");
				$("#headAlerta").html("!Upps Error!");
				$("#bodyAlerta").html("Se ha producido un error al guardar los datos, intentelo nuevamente.");
				
				return false;
			}
			
			else
			{
				
				
     // window.location.href='?execute=principal&method=default&Menu=F1&SubMenu=SF11#&p=1&s=25&sort=1&q=&alert=2';
	 
	  $('html, body').animate({scrollTop:0}, 10);
				$("#alerta").fadeIn();
				$("#alerta").removeClass();
                $("#alerta").addClass("alert alert-success");
				$("#headAlerta").html("¡Correcto!");
				$("#bodyAlerta").html("Se ha guardado con exito el plan"); 
	 
			 		 
				return false;	
				
			}
		}
	});
	
		//END POST FRAME ADD IMAGE USER
	
	
	
$('#btnenviaform1').click(function() {
	
$('#frmaddplanese').submit();
});

$('#btnenviaform2').click(function() {

$('#frmaddplanese').submit();
});
	  
	  
	 	  

});//End function jquery


function EliminarLinea(){
	
	
     if(arrayLineas.length==2){
	 	$('#btndeleteline').attr('disabled','disabled');
	 }
	id = arrayLineas.length;
	
	$("#linea"+id).remove();
	arrayLineas.pop();
	
	
	arrayobjetivos.pop();
	//nexilinea--;
}



function agregarLinea(){
 var itemlinea = arrayLineas.length;
 
 var nexilinea = itemlinea;
		


		 $("#linea0").css("display","block");
		
		  var clon = $("#linea0").clone(false).insertAfter("#linea"+itemlinea);
		 
		  nexilinea++;
		  
		 
		  arrayLineas.push(nexilinea);
		  arrayobjetivos[arrayobjetivos.length]= new Array();
		  arrayobjetivos[arrayobjetivos.length-1][0]= '1';
		  clon.attr('id','linea'+nexilinea);
		  clon.find('#linea0').attr('id','linea'+itemlinea);
		  clon.find('#legenda0').html(nexilinea+'. Línea Estratégica');
		  clon.find('#legenda0').attr('id','legenda'+nexilinea);
		  clon.find('#titulo0').attr('id','titulo'+nexilinea);
		  clon.find('#controlobjetivo0').attr('id','controlobjetivo'+nexilinea);
		  clon.find('#L0').attr('id','L'+nexilinea);
		  clon.find('#L0-controlobjetivo1').attr('id','L'+nexilinea+'-controlobjetivo1');
		  clon.find('#L0-objetivo1').attr('id','L'+nexilinea+'-objetivo1');
		  clon.find('#OL0').attr('id','OL'+nexilinea);
		  
		  
		  
		  
		  //clon.find('#btneliminarcosto0').attr('id','btneliminarcosto'+nexcosto);		  		

        //  $('#monto'+nexcosto).numeric();
   	      $("#linea0").css("display","none");
		  
		  $('#btndeleteline').removeAttr("disabled");
		  
		  
		 	  
}


function agregarObjetivo(id){
	
	
	r = id.substring(1,id.length)-1;
	idlinea = id.substring(1,id.length);
	
	
	 var itemobj = arrayobjetivos[r].length;  
	 nextitem= parseInt(itemobj)+parseInt(1);
 
 
   
     arrayobjetivos[r].push('1');
 
     var clon = $("#L0-controlobjetivo1").clone(true).insertAfter("#"+id+"-controlobjetivo"+itemobj);

     clon.attr('id',id+"-controlobjetivo"+nextitem); 
	 clon.find('#textobjetivo').html(nextitem);	  
	 clon.find('#L0-objetivo1').attr('id',id+'-objetivo'+nextitem);
	 
	  $('#OL'+idlinea).removeAttr("disabled");
	  
	     

}


function EliminarObjetivo(id){

    

	idlinea = id.substring(1,id.length).toString();
	idl = id.substring(2,id.length);
	id = parseInt(idl)-1;
	
	arrayobjetivos[id].pop();
	
	 if(arrayobjetivos[id].length==1){
	 	$('#OL'+idl).attr('disabled','disabled');
		
	 }
	
	  objetivo = arrayobjetivos[id].length+1;
	  
	 
	  $("#"+idlinea+"-controlobjetivo"+objetivo).remove();
		
		
		
	}


function AgregarLineas(id,confirm){
	
	if(confirm){
	window.location.href='?execute=planestrategico/addlineaspe&method=default&Menu=F1&SubMenu=SF11&IdPlan='+id;	
	}else{
	window.location.href='?execute=principal&method=default&Menu=F1&SubMenu=SF11#&p=1&s=25&sort=1&q=';	
	}
	
}




function Salvar(){
	
	var objetivos = "";
	var lineas = "";
	
	
	for(i=0;i<arrayLineas.length;i++){
		
		value = $('#titulo'+arrayLineas[i]).val();
		lineas += value+"^";
		
		
		      for(j=1;j<(arrayobjetivos[i].length)+1;j++){
				  
				  id = parseInt(i+1);
				  
				  val = $('#L'+id+'-objetivo'+j).val(); 
				  objetivos +=  val+"|";
				  
			  }
              objetivos += "^";
	}
	          
	 
	 GuardarLineas(lineas,objetivos);
		
	 }
	
	
	
	
function GuardarLineas(lineas,objetivos){
	
    var IdPlan = gup('IDPlan');
	

  $.blockUI({ css: { backgroundColor: 'transparent', color: '#336B86', border:"null" },
	            overlayCSS: {backgroundColor: '#FFF'},
                 message: '<img src="skins/default/images/spinner-md.gif" /><br><h3> Espere un momento..</h3>'
                 });
 

	$.ajax({ 
	 
    type: "POST",  
    url: "index.php?execute=planestrategico/editplanelineas&method=GuardarLinea",  
    data: { lineas: lineas, objetivos: objetivos, IdPlan : IdPlan},  
    success: function(msg){  
	
	    
	
   //window.location.href='?execute=principal&method=default&Menu=F1&SubMenu=SF11#&p=1&s=25&sort=1&q=&alert=2';
   
    $.unblockUI();
  
    if(msg.trim()==""){
	   
	  $('html, body').animate({scrollTop:0}, 10);
				$("#alerta").fadeIn();
				$("#alerta").removeClass();
                $("#alerta").addClass("alert alert-success");
				$("#headAlerta").html("¡Correcto!");
				$("#bodyAlerta").html("Se ha guardado con exito el plan"); 
      
	 // setTimeout("window.location.href = '?execute=principal&Menu=F1&SubMenu=SF4#&p=1&s=25&sort=1&q='",1000);
               }else{
			   	
				
				$('html, body').animate({scrollTop:0}, 10);
				$("#alerta").fadeIn();
				$("#alerta").removeClass();
                $("#alerta").addClass("alert alert-error");
				$("#headAlerta").html("<font size=\"3\">¡Ups! ha ocurrido un Error</font>");
				$("#bodyAlerta").html("<strong>No te alarmes</strong>!! al parecer no se ha guardado tu plan operativo correctamente, por favor intentalo guardar nuevamente."); 
	 
				
				}
   
	  
               } 
   
           });
}
	
	
	
	function GuardarObjetivos(){
		
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
	