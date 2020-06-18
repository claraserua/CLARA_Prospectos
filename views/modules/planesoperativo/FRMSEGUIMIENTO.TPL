
<script src="skins/default/js/planesoperativo/seguimientoobjetivos.js"></script>
<script type="text/javascript" src="skins/default/js/comentarios/jquery.oembed.js"></script>
<script type="text/javascript" src="skins/default/js/comentarios/jquery.watermarkinput.js"></script>


<script>
function eviarform(){

$('#frmaddusuarios').submit();	
}
	
</script>
 

<div id="alerta" class="alert alert-block" style="display: none;"> <button type="button" class="close" data-dismiss="alert">x</button>
<h4 id="headAlerta" class="alert-heading">!CORRECTO!</h4>
<p></p>
<div id="bodyAlerta">El plan estrategico se ha guardado
correctamente.</div>
<p></p>
</div>
<div class="box"><!-- Box Head -->
<div class="box-head">
<h1 class="left">#TITULOPLAN#</h1>
<span class="right">#ESTADO#</span>
<br>
<p>Seguimiento de objetivos t&aacute;cticos correspondientes al plan. </p>
</div>
<!-- End Box Head --><!-- Pagging -->
<div class="pagging">
<div class="left" id="menucontent">
<ul class="subMenu" style="margin-top: 15px;" id="myTablab">
<li class=""><a href="#lineasyobjetivos">Líneas
y Resultados</a></li>

#TABRESUMENEJECUTIVO#

<li class=""> <a href="#evidencias">Evidencias</a></li>
</ul>
</div>

<div class="right"> 

<!--id="btninfr-'.$idinforme.'" onClick="EnviarInforme(false,\''.$rowobj['PK1'].'\',\''.$rowperiodos['PK1'].'\',\''.$rowperiodos['PERIODO'].'\',\''.$contmedio.'\',\''.$idinforme.'\');"-->

<a href="?execute=operativo&amp;method=default&amp;Menu=F2&amp;SubMenu=SF21#&amp;p=1&amp;s=25&amp;sort=1&amp;q=" class="btn btn-large"><i class="icon-chevron-left"></i> Salir del Plan</a> 

#BOTONENVIOINFORME#


 
</div>

</div>
<!-- End Pagging --><!-- CONTENT LINEA -->
<div id="TabContent" class="tab-content">
<div class="tab-pane" id="lineasyobjetivos">
<div class="box-content"><!--====================OBJETIVO=====================-->
<div id="L0-C0" class="wellstrong" style="display: none;">
<div class="box-icon"> </div>
<table width="100%">
<tbody>
<tr>
<td>Resultado</td>
<td> Objetivo estratégico</td>
<td> Responsable</td>
</tr>
<tr>
<td>
<div class="input-prepend"> <span class="add-on" id="LABEL-L0-O0">1.1</span> <input style="width: 400px;" id="L0-O0" type="text"> </div>
</td>
<td>
<select style="width: 300px;" id="L0-OE0"><option>L1 Objetivo estrategico 1</option></select>
</td>
<td><input id="L0-OR0" type="text"></td>
</tr>
</tbody>
</table>
<div class="box-objectivos" id="BOX-L0-C0">
<div class="well">
<table width="100%">
<tbody>
<tr>
<td width="30">&nbsp; </td>
<td>Medios</td>
<td>Responsable</td>
</tr>
<tr id="L0-O0-M0-C0">
<td>&nbsp; </td>
<td width="520">
<div class="input-prepend"> <span class="add-on" id="LABEL-L0-O0-M0">1.1.1</span> <input style="width: 470px;" id="L0-O0-M0" type="text">
</div>
</td>
<td><input id="L0-O0-M0-R0" type="text"></td>
</tr>
<tr>
<td colspan="2">
<div style="margin-left: 30px;" class="left">

 </div>
</td>
</tr>
</tbody>
</table>
</div>
<div class="well">
<table width="100%">
<tbody>
<tr>
<td width="30">&nbsp; </td>
<td>Evidencias </td>
</tr>
<tr id="L0-O0-E0-C0">
<td>&nbsp; </td>
<td>
<div class="input-prepend"> <span class="add-on" id="LABEL-L0-O0-E0">1.1.1</span> <input style="width: 470px;" id="L0-O0-E0" type="text">
</div>
</td>
</tr>
<tr>
<td colspan="2">
<div style="margin-left: 30px;" class="left">


</div>
</td>
</tr>
</tbody>
</table>
</div>
</div>
</div>
<!--====================END OBJETIVO=====================-->
#CONTENIDO# </div>
<!-- END CONTENT LINEA --> </div>
<div class="tab-pane" id="resumen">
<div class="box-content">
<p style="padding: 10px; background: rgb(245, 245, 245) none repeat scroll 0% 50%; -moz-background-clip: initial; -moz-background-origin: initial; -moz-background-inline-policy: initial;">En este apartado  se expone un resumen general de los logros o dificultades que tuvo la universidad en el periodo.</p>
<br>

#BTNDIAGNOSTICOI#

<br>

<div  id="BOXRESUMENANUAL" style="display: none">
 <!--#VALUEDESCRIPCION#-->
					 
					 
					 <br />
<!-- COMENTARIOS RESUMEN EJECUTIVO-->

#COMENTARIOSDIAGNOSTICOINICIAL#


<div  id="BOXRESUMEN" style="display: none">
#COMENTARIOSRESUMENEJECUTIVO# 
</div>
</div>
<br>
#COMENTARIOSRESUMENEJECUTIVOPERIODOS#
<br>
</div>
</div>

<div class="tab-pane" id="evidencias">
<div class="box-content">


#EVIDENCIAS#

</div>
</div>

</div>
<!-- Pagging -->
<div class="pagging" style="border-top: 1px solid rgb(187, 187, 187);">
<div class="right"> 

<a href="?execute=operativo&amp;method=default&amp;Menu=F2&amp;SubMenu=SF21#&amp;p=1&amp;s=25&amp;sort=1&amp;q=" class="btn btn-large"><i class="icon-chevron-left"></i> Salir del Plan</a>

#BOTONENVIOINFORME#

 </div>
</div>
<!-- End Pagging --> </div>
<!-- End Box -->
