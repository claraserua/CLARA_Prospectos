


$(function(){
	
	$( "#fec_inicio" ).datepicker({
		dateFormat: 'yy-mm-dd'
	});
	$( "#fec_fin" ).datepicker({
		dateFormat: 'yy-mm-dd'
	});
	$( "#fec_inicio_2" ).datepicker({
		dateFormat: 'yy-mm-dd'
	});
	$( "#fec_fin_2" ).datepicker({
		dateFormat: 'yy-mm-dd'
	});

	$(window).load(function() {
		
		//consultaProspectos();
		//iniciaGraficaDePie();
		initUniversidades();
		cargaGraficaProspectosXUniversidad();
		cargaGraficaProspectosUniversidades();
		
	});
	
});//End function jquery

function initUniversidades(){
	$.ajax({
		type: "GET",
		url: "index.php?execute=graficas&method=ConsultaUniversidades",
		success: function(msg){
			$('#select_universidades').html(msg);
		}
	});
}

function graficaProspectosXUniversidad(universidad, fechas, valores){
	var subtitle = (fechas.length>0) ? ('Del "' + fechas[0] + '" al "' + fechas[fechas.length-1] + '"')  : '';
    $('#div_grafica_x_universidad').highcharts({
        chart: {
            type: 'line'
        },
        title: {
            text: 'Historico de prospectos por Universidad'
        },
        subtitle: {
            text: '' //subtitle
        },
        xAxis: {
            categories: fechas
        },
        yAxis: {
            title: {
                text: 'Total registrados'
            }
        },
        plotOptions: {
            line: {
                dataLabels: {
                    enabled: true
                },
                enableMouseTracking: false
            }
        },
        series: [{
            name: universidad,
            data: valores // [7.0, 6.9, 9.5, 14.5, 18.4, 21.5, 25.2, 26.5, 23.3, 18.3, 13.9, 9.6]
        }]
    });
}

function bBuscar_Click(sender){
	cargaGraficaProspectosXUniversidad();
}

function bBuscar_2_Click(sender){
	cargaGraficaProspectosUniversidades();
}

function cargaGraficaProspectosXUniversidad(){
	var idUniversidad = $('#select_universidades').val();
	var fech_1 = $('#fec_inicio').val();
	var fech_2 = $('#fec_fin').val();
	$.ajax({
		type: 'GET',
		url: 'index.php?execute=graficas&method=ConsultaProspectosPorUniversidad&idUniversidad=' + idUniversidad + '&fech_1=' + fech_1 + '&fech_2=' + fech_2,
		success: function(msg)
		{
			var info = jQuery.parseJSON(msg);
			
			var universidad=revertirAcentos(info[0]);
			var fechas=info[1];
			var contadores=info[2];
			
			graficaProspectosXUniversidad(universidad,fechas,contadores);
		}
	});
}

function revertirAcentos(value){
	return value
		.replace('&aacute;','á')
		.replace('&eacute;','é')
		.replace('&iacute;','í')
		.replace('&oacute;','ó')
		.replace('&uacute;','ú')
		.replace('&Aacute;','Á')
		.replace('&Eacute;','É')
		.replace('&Iacute;','Í')
		.replace('&Oacute;','Ó')
		.replace('&Uacute;','Ú')
		.replace('&ntilde;','ñ')
		.replace('&Ntilde;','Ñ')
		;
}

function cargaGraficaProspectosUniversidades()
{
	var fech_1 = $('#fec_inicio_2').val();
	var fech_2 = $('#fec_fin_2').val();
	$.ajax({
		type: 'GET',
		url: 'index.php?execute=graficas&method=ConsultaProspectos&fech_1=' + fech_1 + '&fech_2=' + fech_2,
		success: function(msg)
		{
			var info = jQuery.parseJSON(msg);
			
			var matriz = info[0];
			var data=[];
			for(var i=0; i<matriz.length; i++)
			{
				var item = {
					name: revertirAcentos(matriz[i][0]),
					y: matriz[i][1]
				};
				data[i] = item;
			}
			graficaProspectosUniversidades(data);
		}
	});
	//*/
}

function graficaProspectosUniversidades(data)
{
	$('#div_grafica_universidades').highcharts({
        chart: {
            type: 'column'
        },
        title: {
            text: 'Prospectos de cada Universidad'
        },
        subtitle: {
            text: ''//'Click the columns to view versions. Source: <a href="http://netmarketshare.com">netmarketshare.com</a>.'
        },
        xAxis: {
            type: 'category'
        },
        yAxis: {
            title: {
                text: 'Total registrados'
            }
        },
        legend: {
            enabled: false
        },
        plotOptions: {
            series: {
                borderWidth: 0,
                dataLabels: {
                    enabled: true,
                }
            }
        },
        series: [{
            name: 'Registrados',
            colorByPoint: true,
            data: data
        }],
    });
}








