<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-type" content="text/html; charset=utf-8" />
<title>Prospectos</title>
<link rel="shortcut icon" type="image/x-icon" href="favicon.ico">
<link rel="stylesheet" href="skins/default/css/header.css" type="text/css" media="all" />
<link rel="stylesheet" href="skins/default/css/style.css" type="text/css" media="all" />
<link  href="skins/default/css/bootstrap-cerulean.css" rel="stylesheet">
<link href="skins/default/css/dropdownmenu.css" rel="stylesheet">
<link rel="stylesheet" href="//code.jquery.com/ui/1.10.4/themes/smoothness/jquery-ui.css">
<!-- jQuery -->
	<script src="skins/default/js/jquery-1.7.2.min.js"></script>
	<!-- jQuery UI -->
	<script src="skins/default/js/jquery-ui-1.8.21.custom.min.js"></script>
	
	<script src="skins/default/js/jquery/ui/i18n/jquery.ui.datepicker-es.js"></script>
   <script src="skins/admin/js/jquery.blockUI.js" type="text/javascript"></script>
<!-- TREE MENU-->
<script src="libs/tree/TreeMenu.js" language="JavaScript" type="text/javascript"></script>
<link href="libs/tree/TreeMenu.css" rel="stylesheet" type="text/css">
<script language="JavaScript" type="text/JavaScript">
<!--
function MM_callJS(jsStr) { //v2.0
  return eval(jsStr)
}
//-->
</script>
<!--End Tree Menu-->

</head>
<body>
	
<!--Header -->
#HEADER#
<!-- End Header -->

<!-- Container -->
<div id="container">

	<div class="shell">

		<!-- Main -->
		<div id="main">
        
        
        	<!-- Main Nav -->
	<div id="navMenu">
              #MENU#
    </div>
     		<!-- End Main Nav -->
        
              
              <!-- Nav ToolBar -->
            
            <!--  <div id="toolbar">
              
              <a href="addpe.html">
                <button type="submit" data-rel="popover" data-content="Agregar planes Estrategicos correspondientes..." title="Plan Estrategico" class="btn btn-small btn-warning">Añadir un nuevo Plan Estrategico</button></a>
              
              </div> 
              
               <!-- End Nav ToolBar -->
       
              	
			<!-- Content -->
			<div id="contentright">
				
               #CONTENT#
				

			</div>
			<!-- End Content -->
			
             <div id="sidebar">
        <!-- Box -->
				<div class="box">
					
					<!-- Box Head -->
					<div class="box-head">
						<h2><i class="icon-search"></i>&nbsp;Acotar Búsqueda</h2>
					</div>
					<!-- End Box Head-->
					
					<div class="box-content" style="overflow: auto;">
						
						<div class="cl">&nbsp;</div>
						<p>#NODOS#</p>
						
						<!-- Sort -->
						<div class="sort">
							
						</div>
						<!-- End Sort -->
						
					</div>
				</div>
				<!-- End Box -->
        </div>

			
			<div class="cl">&nbsp;</div>			
		</div>
		<!-- Main -->
	</div>
</div>
<!-- End Container -->

<!--MODAL 2-->
<div class="modal hide fade" id="myModal1">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">x</button>
				<span id="titlemodal1"></span>
			</div>
			<div class="modal-body">
				<p><span id="bodymodal1"></span></p>
			</div>
			<div class="modal-footer">
				<a href="#" id="cancelarmodal1" class="btn" data-dismiss="modal">Cancelar</a>
				<a href="#" id="aceptarmodal1"  class="btn btn-warning">Aceptar</a>
			</div>
		</div>

<!--END MODAL 2-->

<!--MODAL-->
<div class="modal hide fade" id="myModal">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">×</button>
				<span id="titlemodal">Eliminar Usuario</span>
			</div>
			<div class="modal-body">
				<p><span id="bodymodal">¿Esta seguro de eliminar el Usuario?</span></p>
			</div>
			<div class="modal-footer">
				<a href="#" class="btn" data-dismiss="modal">Cancelar</a>
				<a href="javascript:void(0)" id="aceptarmodal"  class="btn btn-warning">Aceptar</a>
			</div>
		</div>

<!--END MODAL-->



<!--MODAL PLANES ESTRATEGICOS-->
<div class="modal hide fade" id="myModalplanese" style="width:500px; ">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">×</button>
				<span id="titlemodalplane">Agregar Prospecto</span>
				
			</div>
			<div class="modal-body">
				<div class="form-horizontal">
						  <form enctype="multipart/form-data" name="frmaddusuarios" method="post" id="frmaddusuarios" action="?execute=usuarios/addusuarios&Menu=F3&SubMenu=SF8&method=GuardarUsuario" target="iframe-post-form">  
						  
						  <div class="box">
                          <fieldset>
								
						<blockquote>
						
						 <div class="control-group" style="margin-top: 15px;">
								<label for="focusedInput" class="control-label">Campus:</label>
								<div class="controls">
				           
				           <select name="campus" id="campus" style="width:280px;">
									#CAMPUS#
								</select>
				           
				           
								</div>
							 </div>
						
						
								
						<div class="control-group" style="margin-top: -15px;">
						<label for="focusedInput" class="control-label">Licenciatura:</label>
						<div class="controls">
						
						<select name="programa" id="programa" style="width: 200px;">
							<option value="Ingenieria">Ingeniería</option>
							<option value="Comunicacion">Comunicación</option>	
							<option value="Derecho">Derecho</option>			
						</select>
						
						</div>
					    </div>
						</blockquote>
							
							 <input type="hidden" value="L" name="grado" id="grado" />
							
							
						
							  
							                 
                             
                            <!-- <div class="control-group" style="margin-top: -15px;">
								<label for="focusedInput" class="control-label">Categoria:</label>
								<div class="controls">
				           
				           <select name="categoria" id="categoria" style="width:280px;">
							
								</select>		           
				           
								</div>
							 </div>-->
                           
							  
							  					  
							  
							   <div class="control-group" style="margin-top: -15px;">
								<label for="focusedInput" class="control-label"><i class="icon-asterisk"></i>Nombre:</label>
								<div class="controls">
								  <input type="text" value="" name="nombre" id="nombre" class="input-xlarge focused">
								</div>
							  </div>
							  
							  
							   <div class="control-group" style="margin-top: -15px;">
								<label for="focusedInput" class="control-label">Apellidos:</label>
								<div class="controls">
								  <input type="text" value="" name="apellidos" id="apellidos" class="input-xlarge focused">
								</div>
							  </div>
							  
							  
							   <div class="control-group" style="margin-top: -15px;">
								<label for="focusedInput" class="control-label">Telefono:</label>
								<div class="controls">
								  <input type="text" value="" name="telefono" id="telefono" class="input-xlarge focused">
								</div>
							  </div>
							  
							  
							   <div class="control-group" style="margin-top: -15px;">
								<label for="focusedInput" class="control-label">Correo:</label>
								<div class="controls">
								  <input type="text" value="" name="correo" id="correo" class="input-xlarge focused">
								</div>
							  </div>	
							  
							   <div class="control-group" style="margin-top: -15px;">
								<label for="focusedInput" class="control-label">Ciudad:</label>
								<div class="controls">
								  <input type="text" value="" name="ciudad" id="ciudad" class="input-xlarge focused">
								</div>
							  </div>						  
							  
							
							  
						  
						    </fieldset>
							</div>
                          </form>
						</div>  
               
                
                
			</div>
			<div class="modal-footer">
				<a href="#" class="btn" data-dismiss="modal">Cancelar</a>
				<a href="#" id="aceptarmodalpe"  class="btn btn-warning">Agregar</a>
			</div>
		</div>

<!--END MODAL PLANES ESTRATEGICOS-->



<!-- Footer -->
#FOOTER#
<!-- End Footer -->


<!--------------LIBRERIA DE JAVASCRIPT---------------->


	
    <!-- transition / effect library -->
	<script src="skins/default/js/bootstrap-transition.js"></script>
	<!-- alert enhancer library -->
	<script src="skins/default/js/bootstrap-alert.js"></script>
	<!-- modal / dialog library -->
	<script src="skins/default/js/bootstrap-modal.js"></script>
	<!-- custom dropdown library -->
	<script src="skins/default/js/bootstrap-dropdown.js"></script>
	<!-- scrolspy library -->
	<script src="skins/default/js/bootstrap-scrollspy.js"></script>
	<!-- library for creating tabs -->
	<script src="skins/default/js/bootstrap-tab.js"></script>
	<!-- library for advanced tooltip -->
	<script src="skins/default/js/bootstrap-tooltip.js"></script>
	<!-- popover effect library -->
	<script src="skins/default/js/bootstrap-popover.js"></script>
	<!-- button enhancer library -->
	<script src="skins/default/js/bootstrap-button.js"></script>
	<!-- accordion library (optional, not used in demo) -->
	<script src="skins/default/js/bootstrap-collapse.js"></script>
	<!-- carousel slideshow library (optional, not used in demo) -->
	<script src="skins/default/js/bootstrap-carousel.js"></script>
	<!-- autocomplete library -->
	<script src="skins/default/js/bootstrap-typeahead.js"></script>
	<!-- tour library -->
	<script src="skins/default/js/bootstrap-tour.js"></script>
	<!-- library for cookie management -->
	<script src="skins/default/js/jquery.cookie.js"></script>
	<!-- calander plugin -->
	<script src='skins/default/js/fullcalendar.min.js'></script>
	<!-- data table plugin -->
	<script src='skins/default/js/jquery.dataTables.min.js'></script>
	

<!-- select or dropdown enhancer -->
	<script src="skins/default/js/jquery.chosen.min.js"></script>
	<!-- checkbox, radio, and file input styler -->
	<script src="skins/default/js/jquery.uniform.min.js"></script>
	<!-- plugin for gallery image view -->
	<script src="skins/default/js/jquery.colorbox.min.js"></script>
	<!-- rich text editor library -->
	<script src="skins/default/js/jquery.cleditor.min.js"></script>
	<!-- notification plugin -->
	<script src="skins/default/js/jquery.noty.js"></script>
	<!-- file manager library -->
	<script src="skins/default/js/jquery.elfinder.min.js"></script>
	<!-- star rating plugin -->
	<script src="skins/default/js/jquery.raty.min.js"></script>
	<!-- for iOS style toggle switch -->
	<script src="skins/default/js/jquery.iphone.toggle.js"></script>
	<!-- autogrowing textarea plugin -->
	<script src="skins/default/js/jquery.autogrow-textarea.js"></script>
	<!-- multiple file upload plugin -->
	<script src="skins/default/js/jquery.uploadify-3.1.min.js"></script>
	<!-- history.js for cross-browser state change on ajax -->
	<script src="skins/default/js/jquery.history.js"></script>

    <script src="skins/default/js/alertas.js"></script>
    
  

    <script src="skins/admin/js/jquery.blockUI.js" type="text/javascript"></script>
    <script src="skins/admin/js/jquery.iframe-post-form.js" type="text/javascript"></script>
    


<!------------END LIBRERIA DE JAVASCRIPT-------------->


</body>
</html>