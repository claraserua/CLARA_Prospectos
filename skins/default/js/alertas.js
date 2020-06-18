$(function() {
   /* $('.content-area').jScrollPane();*/
});



function goAlerta(ID){
	
	//alert(ID);
	
	$.ajax({ 
	 
    type: "POST",  
    url: "index.php?execute=notificaciones&method=goAlerta",  
	data: { ID:ID},  
    success: function(msg){  
	
	  //alert(msg);
	 
	 var randomnumber=Math.floor(Math.random()*11);
	 
	 if(msg.trim()!=""){
	 	
		 url = msg.replace("#","&parametro="+ randomnumber +"#"); 
		
		
		setTimeout("window.location.href='" + url + "'", 0) 
	 }else{
	 	alert("La notificación ya vencio");
	 }
	 
               
			   } 
   
           });
	
	
	
}