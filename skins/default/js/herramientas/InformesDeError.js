
$(document).ready(function(){

	$(window).load(function() {

      buscar();

	});



$('#search_go-button-fichas').click(function(){
	q = $('#searchbar').val();
	urltag = "&p="+gup('p')+"&s="+gup('s')+"&sort="+gup('sort')+"&q="+q;
	window.location.hash = urltag;
    buscar();
			});

  });

  var filter= Array();




  function filtrar(cat){


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


  function Ordenar(value){



  }




function bBuscar_Click(){
	var fil="";
	var q = $('#searchbar').val();
	var s= parseInt(gup('s'));

	urltag = "&p="+gup('p')+"&s="+gup('s')+"&sort="+gup('sort')+"&q="+q;

	if(filter.length>0){
		fil = filter.join(";");
		urltag += "&filter="+fil;
	}
	
	window.location.hash = urltag;
	
	buscar();
}
  
function buscar()
{
	$('div.table').block({
		css: { backgroundColor: 'transparent', color: '#EC5C00', border:"null" },
		message: '<img src="skins/default/images/spinner-md.gif" /><br><h3> Buscando...</h3>'
		});

	var fil="";
	var q="";

	q = gup('q');
	$('#searchbar').val(q);

	var s= parseInt(gup('s'));

	urltag = "&p="+gup('p')+"&s="+gup('s')+"&sort="+gup('sort')+"&q="+q;

	if(filter.length>0){
		fil = filter.join(";");
		urltag += "&filter="+fil;
	}
	
	window.location.hash = urltag;
	
	$.ajax({
		type: "GET",
		url: "index.php",
		data: "execute=herramientas/InformesDeError&method=Buscar"+urltag,
		success: function(msg){

			var contenido = msg.split('#%#');

				// alert(msg);
			$('#pagginghead').html(contenido[0]);
			$('#results-panel').html(contenido[1]);
			$('#barfilterfooter').html(contenido[2]);
			$('#results_text').html(contenido[3]+" Resultados");
			
			$("#page_size_"+s+"-panel").addClass("page_size_"+s+"-selected");
			
			$('div.table').unblock();
		}
	});

}

function MostrarJSON(pkError)
{
	$('#modalMostrarDatos').modal('show');
	var str_json = $('#'+pkError).val();
	
	str_json = str_json.replace(/",/g  , '",\r\n ');
	//str_json = str_json.replace('{'  , '{\r\n ');
	//str_json = str_json.replace('}'  , '\r\n}');
	
	$('#code_json').val(str_json);
}


function redireccionar()
{
	window.location.href = document.URL;
}


  function WindowOpen(id){
	    var href = "index.php?pag=popup&id="+id;
		var caracteristicas = "height=600,width=830,scrollTo,resizable=1,scrollbars=1,location=0";
      	nueva=window.open(href, 'Popup', caracteristicas);
      	return false;
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