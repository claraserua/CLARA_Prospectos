

var nexilinea=1;
var arrayLineas = new Array();
arrayLineas.push(nexilinea);


var nexitem=1;
var arrayobjetivos = new Array();
arrayobjetivos.push(nexitem);





$(function(){
	  	  
		 
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
			
			
	//alert(response);
			if (response.trim()=="false")
			{
			
				$('html, body').animate({scrollTop:0}, 10);
				$.unblockUI();
				$("#alerta").fadeIn();
				$("#alerta").removeClass();
                $("#alerta").addClass("alert alert-error");
				$("#headAlerta").html("!Error!");
				$("#bodyAlerta").html("Se ha producido un error al guardar los datos, intentelo nuevamente.");
				
				return false;
			}
			
			else
			{
				
				$.unblockUI();
				/*$('html, body').animate({scrollTop:0}, 10);
				$("#alerta").fadeIn();
				$("#alerta").removeClass();
                $("#alerta").addClass("alert alert-success");
				$("#headAlerta").html("¡Correcto!");
				$("#bodyAlerta").html("Se ha guardado el Plan Estratégico");*/
				
				
				//$("#frmaddusuarios")[0].reset();
				
				//$('#sel2').empty();
				
				//window.setTimeout("window.location.href='?execute=usuarios&Menu=F3&SubMenu=SF8#&p=1&s=25&sort=1&q='",1000)
	  var id = $('#idplan').val();
	  $('#titlemodal').html('El Plan Estratégico se ha guardado con exito');
	  $('#bodymodal').html('<strong>¿Desea agregar las lineas estratégicas y los objetivos a este plan?</strong>');
	  $("#aceptarmodal").attr("onClick", "javascript:AgregarLineas('"+id+"',true);return false;")
	  $("#cancelarmodal").attr("onClick", "javascript:AgregarLineas('"+id+"',false);return false;")
      $('#myModal').modal('show');
			 
			 
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




	


function EliminarObjetivo(id){

	idlinea = id.substring(1,id.length).toString();
	id = id.substring(2,id.length);
	id = parseInt(id);
	
	 if(arrayobjetivos[id].length==1){
	 	$('#OL'+id).attr('disabled','disabled');
		
	 }
	
	  objetivo = arrayobjetivos[id].length+1;
	  
	 
	  $("#"+idlinea+"-controlobjetivo"+objetivo).remove();
		
		
		arrayobjetivos[id].pop();
	}




function EliminarLinea(){
	
     if(arrayLineas.length==2){
	 	$('#btndeleteline').attr('disabled','disabled');
	 }
	id = arrayLineas.length;
	$("#linea"+id).remove();
	arrayLineas.pop();
	nexilinea--;
}



function agregarLinea(){
 var itemlinea = arrayLineas.length;
		
		alert(arrayLineas.length)
		
		 $("#linea0").css("display","block");
		
		  var clon = $("#linea0").clone(false).insertAfter("#linea"+itemlinea);
		 
		  nexilinea++;
		  
		  arrayLineas.push(nexilinea);
		  arrayobjetivos[nexilinea]= new Array();
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
	
	 r = id.substring(1,id.length);
	 arrayobjetivos[r].push(nexitem);
	 var itemobj = arrayobjetivos[r].length;  
	 nextitem= parseInt(itemobj)+parseInt(1);
 
     var clon = $("#L0-controlobjetivo1").clone(true).insertAfter("#"+id+"-controlobjetivo"+itemobj);

     clon.attr('id',id+"-controlobjetivo"+nextitem); 
	 clon.find('#textobjetivo').html(nextitem);	  
	 clon.find('#L0-objetivo1').attr('id',id+'-objetivo'+nextitem);
	 
	  $('#OL'+r).removeAttr("disabled");
	  
	 
     
	// $('#btndeleteline').removeAttr("disabled");

}







function AgregarLineas(id,confirm){
	
	if(confirm){
	window.location.href='?execute=planestrategico/addlineaspe&method=default&Menu=F1&SubMenu=SF11&IdPlan='+id;	
	}else{
	window.location.href='?execute=principal&method=default&Menu=F1&SubMenu=SF11#&p=1&s=25&sort=1&q=';	
	}
	
}


$(window).load(function(){
 ////////////////////////CLONE LINEA/////////////////////
	 
	     var itemlinea = arrayLineas.length;
		 itemlinea = itemlinea-1;
		 
		  var clon = $("#linea0").clone(false).insertAfter("#linea"+itemlinea);
		  arrayLineas.splice(0,1);
		 
		  arrayLineas.push(nexilinea);
		  arrayobjetivos[nexilinea]= new Array();
		  
		  clon.attr('id','linea'+nexilinea);
		  clon.find('#legenda0').html(nexilinea+'. Línea Estratégica');
		  clon.find('#legenda0').attr('id','legenda'+nexilinea);
		  clon.find('#titulo0').attr('id','titulo'+nexilinea);
		  clon.find('#controlobjetivo0').attr('id','controlobjetivo'+nexilinea);
		  clon.find('#L0').attr('id','L'+nexilinea);
		  clon.find('#L0-controlobjetivo1').attr('id','L'+nexilinea+'-controlobjetivo1');
		  clon.find('#L0-objetivo1').attr('id','L'+nexilinea+'-objetivo1');
		  clon.find('#OL0').attr('id','OL'+nexilinea);
		  
		 
   	      $("#linea0").css("display","none");
	 //////////////END CLONE LINEA//////////////
});


function Salvar(){
	
	var objetivos = "";
	var lineas = "";
	
	for(i=0;i<arrayLineas.length;i++){
		
		value = $('#titulo'+arrayLineas[i]).val();
		lineas += value+"^";
		

		
		      for(j=1;j<=(arrayobjetivos[i+1].length)+1;j++){
				  
				  id = parseInt(i+1);
				  
				  val = $('#L'+id+'-objetivo'+j).val(); 
				  objetivos +=  val+"|";
				  
			  }
              objetivos += "^";
	}
	          
	 
	 GuardarLineas(lineas,objetivos);
		
	 }
	
	
function GuardarLineas(lineas,objetivos){
	
	
	  $.blockUI({ css: { backgroundColor: 'transparent', color: '#336B86', border:"null" },
	            overlayCSS: {backgroundColor: '#FFF'},
                 message: '<img src="skins/default/images/spinner-md.gif" /><br><h3> Espere un momento..</h3>'
                 });
	
	
    var IdPlan = gup('IdPlan');
	
	$.ajax({ 
	 
	 // type: "POST",
     //data: { name: "John", location: "Boston" }
	 
    type: "POST",  
    url: "index.php?execute=planestrategico/addlineaspe&method=GuardarLinea",  
    data: { lineas: lineas, objetivos: objetivos, IdPlan : IdPlan},  
    success: function(msg){  
	
  
	  $.unblockUI();
	  
	  window.location.href='?execute=principal&method=default&Menu=F1&SubMenu=SF11#&p=1&s=25&sort=1&q=&alert=1';
               
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
	