
$(function(){
		
	$( ".finicio" ).datepicker({
      changeMonth: true,
      changeYear: true,
	  dateFormat: 'yy-mm-dd' 
    });

   $( ".ftermino" ).datepicker({
      changeMonth: true,
      changeYear: true,
	  dateFormat: 'yy-mm-dd' 
    });
	 
	 
	 var dates = $( "#finicio, #ftermino" ).datepicker({
			defaultDate: "+1w",
			changeMonth: true,
			changeYear: true,
			dateFormat: 'yy-mm-dd' ,
			//numberOfMonths: 3,
			onSelect: function( selectedDate ) {
				var option = this.id == "finicio" ? "minDate" : "maxDate",
					instance = $( this ).data( "datepicker" ),
					date = $.datepicker.parseDate(
						instance.settings.dateFormat ||
						$.datepicker._defaults.dateFormat,
						selectedDate, instance.settings );
				dates.not( this ).datepicker( "option", option, date );
			}
		});
	 
	
	  	  

});//End function jquery


function validarFormulario(){
	
	var valido = true;
	
	if($('#nomProyecto').val()==""){ valido = false;}
	//if($('#finicio').val()==""){ valido = false;}
	//if($('#ftermino').val()==""){ valido = false;}
	
	
	return valido;
	
}



function GuardarProyecto(){
	
   
	
	if(validarFormulario()){
		
    var idProyecto = $('#idProyecto').val();	
	var nomProyecto = $('#nomProyecto').val();
	var descripcion = $('#descripcion').val();
	var disponible = $('input[name=disponible]:checked').val();
	var finicio = $('#finicio').val();	
	
	/*if(finicio==""){
		finicio=null;
	}
	alert(finicio);	*/		
	var ftermino = $("#ftermino").val();	
	var estado = $("#estado").val();
	/*if(ftermino==""){
		ftermino=null;
	   }
	   alert(ftermino);	*/
	var jerarquia = $('input[name=jerarquia]:checked').val();
	
	var rol = $('#roles').val();		
		
		
		 $.blockUI({ css: { backgroundColor: 'transparent', color: '#336B86', border:"null" },
	            overlayCSS: {backgroundColor: '#FFF'},
                 message: '<img src="skins/default/images/spinner-md.gif" /><br><h3> Espere un momento..</h3>'
                 });	 
				 
				 
		
	$.ajax({ 
	 
	 // type: "POST",
     //data: { name: "John", location: "Boston" }
	 
    type: "POST",  
    url: "index.php?execute=proyectos/addproyecto&Menu=F1&SubMenu=SF11&method=GuardarProyecto",  
    data: { nomProyecto: nomProyecto, descripcion: descripcion, disponible : disponible, finicio:finicio, ftermino:ftermino, idProyecto:idProyecto,jerarquia:jerarquia, rol: rol,estado:estado},  
    success: function(msg){  
	

   
    $.unblockUI();
	 if(msg.trim()==""){
	 
			 	
	 setTimeout("window.location.href = '?execute=principal&method=default&Menu=F1&SubMenu=SF11#&p=1&s=25&sort=1&q=&alert=1'",100);      
	
               }else{
			   	
						// alert(msg);	
				$('html, body').animate({scrollTop:0}, 10);
				$("#alerta").fadeIn();
				$("#alerta").removeClass();
                $("#alerta").addClass("alert alert-error");
				$("#headAlerta").html("<font size=\"3\">¡Ups! ha ocurrido un Error</font>");
				$("#bodyAlerta").html("<strong>No te alarmes</strong>!! al parecer no se guardo la propuesta del Proyecto correctamente, por favor intentalo guardar nuevamente."); 
	 
				
				 }  	
	  
               } 
   
           });

     }else{
	 	
		$('html, body').animate({scrollTop:0}, 10);
				$("#alerta").fadeIn();
				$("#alerta").removeClass();
                $("#alerta").addClass("alert alert-block");
				$("#headAlerta").html("¡Advertencia!");
				$("#bodyAlerta").html("Debes de ingresar todos los campos obligatorios");
	 	
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
	