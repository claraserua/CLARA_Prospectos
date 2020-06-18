

function GuardarProyecto1(){
	
    var idProyecto = $('#idProyecto').val();
	var estado = $('input[name=estado]:checked').val();
	//alert(idProyecto);
  //	alert(estado);
	
    $.blockUI({ css: { backgroundColor: 'transparent', color: '#336B86', border:"null" },
	            overlayCSS: {backgroundColor: '#FFF'},
                 message: '<img src="skins/default/images/spinner-md.gif" /><br><h3> Espere un momento..</h3>'
                 });
		
	$.ajax({ 	 
    type: "POST",  
    url: "index.php?execute=proyectos/editestado&method=GuardarEstadoProyecto&Menu=F1&SubMenu=SF11",  
    data: {idProyecto: idProyecto, estado: estado}, 	
    success: function(msg){  
	//alert(msg);
	
	setTimeout("window.location.href = '?execute=principal&method=default&Menu=F1&SubMenu=SF11#&p=1&s=25&sort=1&q=&alert=2'",100);
	  
    } 
   
           });  

    
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
	