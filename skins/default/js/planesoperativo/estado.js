

function GuardarPlanOperativo(){
	
    var idplan = $('#idplan').val();
	var estado = $('input[name=estado]:checked').val();
	
  	
    $.blockUI({ css: { backgroundColor: 'transparent', color: '#336B86', border:"null" },
	            overlayCSS: {backgroundColor: '#FFF'},
                 message: '<img src="skins/default/images/spinner-md.gif" /><br><h3> Espere un momento..</h3>'
                 });
		
	$.ajax({ 
	 
	 
    type: "POST",  
    url: "index.php?execute=planesoperativo/editestado&Menu=F2&SubMenu=SF21&method=GuardarPlan",  
    data: {idplan:idplan,estado:estado},  
    success: function(msg){  
	
	setTimeout("window.location.href = '?execute=operativo&method=default&Menu=F2&SubMenu=SF21#&p=1&s=25&sort=1&q=&alert=1'",100);
	  
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
	