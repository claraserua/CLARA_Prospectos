<?xml version="1.0" encoding="UTF-8"?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">

<title>Prospectos</title>
<link rel="shortcut icon" type="image/x-icon" href="favicon.ico">
<link rel="stylesheet" href="skins/default/css/header.css" type="text/css" media="all" />
<link rel="stylesheet" href="skins/default/css/style.css" type="text/css" media="all" />
<link  href="skins/default/css/bootstrap-cerulean.css" rel="stylesheet">
<link  href="skins/default/css/opa-icons.css" rel="stylesheet">
<link href="skins/default/css/dropdownmenu.css" rel="stylesheet">
<link rel="stylesheet" href="skins/default/js/jquery/themes/base/jquery.ui.all.css" />

<!-- jQuery-->
	<script src="skins/default/js/jquery-1.7.2.min.js"></script>
	
	<!-- jQuery UI -->
	<script src="skins/default/js/jquery-ui-1.8.21.custom.min.js"></script>
    
    
    <script src="skins/default/js/jquery/ui/i18n/jquery.ui.datepicker-es.js"></script>
    
    
    <script type="text/javascript" src="libs/ckeditor/ckeditor.js"></script>
   
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
        
               
        
              	
			<!-- Content -->
			<div id="content">
				
               #CONTENT#
				

			</div>
			<!-- End Content -->
			

			
			<div class="cl">&nbsp;</div>			
		</div>
		<!-- Main -->
	</div>
</div>
<!-- End Container -->

<!--MODAL-->
<div class="modal hide fade" id="myModal">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">x</button>
				<span id="titlemodal">Eliminar Usuario</span>
			</div>
			<div class="modal-body">
				<p><span id="bodymodal">¿Esta seguro de eliminar el Usuario?</span></p>
			</div>
			<div class="modal-footer">
				<a href="#" id="cancelarmodal" class="btn" data-dismiss="modal">Cancelar</a>
				<a href="#" id="aceptarmodal"  class="btn btn-warning">Aceptar</a>
			</div>
		</div>

<!--END MODAL-->


<!--MODAL PLANES ESTRATEGICOS-->
<div class="modal hide fade" id="myModalplanese" style="width:700px; ">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">×</button>
				<span id="titlemodalplane">Elige el Plan Estrategico:</span>
			</div>
			<div class="modal-body">
				
                <!-- BUSQUEDA DE PLANES ESTRATEGICOS-->
                
              
                    
                    
                    <!-- Pagging -->
                        <div class="pagging" id="paggingheadModal">         
                        <div class="left">  
            <input type="text" name="searchbar" id="searchbar"    />
							<button class="btn btn-small" onclick="buscarPE();"  id="search_go-button-pe"><i class="icon-search"></i> Buscar</button>
                        </div>
                        
                        <div class="bar_seperator"></div>
                        
       <div id="search_page_size-panel">
        <div id="page_size_25-panel2" onClick="showLimitPage2(25,this);" class="page_size_25 page_size_25-selected"></div>
		<div id="page_size_50-panel2" onClick="showLimitPage2(50,this);" class="page_size_50"></div>
        <div id="page_size_100-panel2" onClick="showLimitPage2(100,this);" class="page_size_100"></div>
        <div id="page_size_200-panel2" onClick="showLimitPage2(200,this);" class="page_size_200"></div>
	 </div>
                        
             
             
             
             
  
               <div class="search_pagination">
               <!-- <button class="btn btn-small" style="float:left; margin-right:10px;"><i class="icon-list-alt"></i> Mostrar Todos</button>-->
                <div class="page_button left button_disable"></div> 
                <div class="page_overview_display">
                <input type="text" class="page_number-box"  value="1">&nbsp;de&nbsp;1
                </div>
               <div class="page_button right button_disable"></div>
	            </div>    
                        
                        
                        </div>
						<!-- End Pagging -->
						
                    
                    
					<!-- Table -->
					<div class="tableModal" style="height: 250px; width:100%; overflow-y: auto;">
						<table width="100%"  border="0" cellspacing="0" cellpadding="0">
							<thead>
							<tr>
							   <th width="20">&nbsp;</th>
								<th align="left">Titulo</th>
                                <th width="100">Centro</th>
                                
							</tr>
							</thead>
							 <tbody id="results-panel-Modal">
							
							
							</tbody>
							
						</table>
						</div>
					<!-- Table -->
						
						  <!-- Pagging -->
						
                        <div class="pagging" id="barfilterfooterModal">
                       
                     
                       <div class="search_pagination">
                       
                     
                       
                       <div class="page_button left button_disable">
                       </div> <div class="page_overview_display">
          <input type="text" class="page_number-box"  value="1">
          &nbsp;de&nbsp;1</div><div class="page_button right button_disable"></div> 
	                  </div>                       
                        
                          <div class="left"> 
                        <div id="results_textModal">
               0 resultados
               </div>
               </div>
                        
                        </div>
						<!-- End Pagging -->
						
					
					
				
                <!-- END BUSQUEDA DE PLANES ESTRATEGICOS-->
				 
                
                
			</div>
			<div class="modal-footer">
				<a href="#" class="btn" id="cancel" data-dismiss="modal" >Cancelar</a>
				<a href="#" id="aceptarmodalpe" class="btn btn-warning">Aceptar</a>
			</div>
		</div>

                <!--END MODAL PLANES ESTRATEGICOS-->
				

                 <!-- INICIO MODAL DE PLANES OPERATIVOS-->
				 
				 <div class="modal hide fade" id="myModalplaneso" style="width:700px; ">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">×</button>
				<span id="titlemodalplano">Plan Operativo:</span>
			</div>
			<div class="modal-body">
				
                <!-- BUSQUEDA DE PLANES OPERATIVOS-->
                
              
                    
                    
                    <!-- Pagging -->
                        <div class="pagging" id="paggingheadModal2">         
                        <div class="left">  
            <input type="text" name="searchbarpo" id="searchbarpo"    />
							<button class="btn btn-small" onclick="buscarPO();"  id="search_go-button-pe"><i class="icon-search"></i> Buscar</button>
                        </div>
                        
                        <div class="bar_seperator"></div>
                        
       <div id="search_page_size-panel">
        <div id="page_size_25-panel" onClick="showLimitPage(25,this);" class="page_size_25 page_size_25-selected"></div>
		<div id="page_size_50-panel" onClick="showLimitPage(50,this);" class="page_size_50"></div>
        <div id="page_size_100-panel" onClick="showLimitPage(100,this);" class="page_size_100"></div>
        <div id="page_size_200-panel" onClick="showLimitPage(200,this);" class="page_size_200"></div>
	 </div>
                        
             
             
             
             
  
               <div class="search_pagination">
               <!-- <button class="btn btn-small" style="float:left; margin-right:10px;"><i class="icon-list-alt"></i> Mostrar Todos</button>-->
                <div class="page_button left button_disable"></div> 
                <div class="page_overview_display">
                <input type="text" class="page_number-box"  value="1">&nbsp;de&nbsp;1
                </div>
               <div class="page_button right button_disable"></div>
	            </div>    
                        
                        
                        </div>
						<!-- End Pagging -->
						
                    
                    
					<!-- Table -->
					<div class="tableModal" style="height: 250px; width:100%; overflow-y: auto;">
						<table width="100%"  border="0" cellspacing="0" cellpadding="0">
							<thead>
							<tr>
							   <th width="20">&nbsp;</th>
								<th align="left">Titulo</th>
                                <th width="100">Centro</th>
                                
							</tr>
							</thead>
							 <tbody id="results-panel-Modal2">
							
							
							</tbody>
							
						</table>
						</div>
					<!-- Table -->
						
						  <!-- Pagging -->
						
                        <div class="pagging" id="barfilterfooterModal2">
                       
                     
                       <div class="search_pagination">
                       
                     
                       
                       <div class="page_button left button_disable">
                       </div> <div class="page_overview_display">
          <input type="text" class="page_number-box"  value="1">
          &nbsp;de&nbsp;1</div><div class="page_button right button_disable"></div> 
	                  </div>                       
                        
                          <div class="left"> 
                        <div id="results_textModal">
               0 resultados
               </div>
               </div>
                        
                        </div>
						<!-- End Pagging -->
						
					
					
				
                <!-- END BUSQUEDA DE PLANES OPERATIVOS -->
				 
                
                
			</div>
			<div class="modal-footer">
				<a href="#" class="btn" id="cancel2" data-dismiss="modal" >Cancelar</a>
				<a href="#" id="aceptarmodalpo" class="btn btn-warning">Aceptar</a>
			</div>
		</div>
				 
				 
				 
                 <!-- END MODAL DE PLANES OPERATIVOS-->
				 
				 
				 
				 <!--MODAL-->
<div class="modal hide fade" id="myModalupload" >
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">x</button>
				<span id="titlemodal"></span>
			</div>
			<div class="modal-body">
				<div id="bodymodal" >
					<!--BODY MODAL-->
					 
					

					<!-- Table -->
						<div class="form-horizontal" style="width: 400px;" >
						  <form enctype="multipart/form-data" name="frmaddusuarios" method="post" id="frmaddusuarios" action="?execute=planesoperativo/seguimiento&Menu=F3&SubMenu=SF8&method=UploadFile" target="iframe-post-form">  
                          <fieldset>
							<legend>Agregar Evidencia</legend>
								<input  type="hidden" name="idplan" value="#IDPLAN#"/>
								<input  type="hidden" id="editar" name="editar" value="FALSE"/>						
															
							    
							<div class="control-group">
								<label for="focusedInput" class="control-label"><small><i class="icon-asterisk"></i>Titulo:</small></label>
								<div class="controls">
								  <input type="text" value="" name="titulo" id="titulo" class="input-xlarge focused">
								</div>
							  </div>
							
							
							<div class="control-group">
								<label for="focusedInput" class="control-label"><small>Descripcion:</small></label>
								<div class="controls">
						<textarea id="descripcion" name="descripcion" class="cleditor" rows="3" style="width: 350px; height: 140x;"></textarea>
								</div>
							  </div>
							  
							  
							 <div class="control-group">
								<label for="focusedInput" class="control-label"><small><i class="icon-asterisk"></i>Autor:</small></label>
								<div class="controls">
								  <input type="text" value="" name="autor" id="autor" class="input-xlarge focused">
								</div>
							 </div>
							 	 							 
							 
							  <div class="control-group">
								<label for="focusedInput" class="control-label"><i class="icon-asterisk"></i><small>Archivo:</small></label>
								<div class="controls">
								<input type="file"  id="imagearticulo" name="imagearticulo" />
								</div>
							 </div>
							 
							 
							
							  
						  </fieldset>
                          </form>
						</div>   

			
					<!-- Table -->				 
					
					<!--END BODYMODAL-->
				</div>
			</div>
			<div class="modal-footer">
				<a href="#" id="cancelarmodal" class="btn" data-dismiss="modal">Cerrar</a>
		<!--		<a href="#" id="adjuntarmodal" class="btn btn-warning" data-dismiss="modal">Adjuntar Archivo</a>-->
				
				<input type="submit" data-dismiss="modal" class="btn btn-warning" onclick="eviarform();" value="Adjuntar Archivo"/>
				
			</div>
		</div>

<!--END MODAL-->
				 
				 
				 
				 
				 
				 
				 
				 
				 
				 
				 
				 
				 
				 
				 


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
	<!-- library for advanced tooltip -->
	<script src="skins/default/js/bootstrap-tooltip.js"></script>
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
	
	

	<!-- application script for Charisma demo -->
	
    <script src="skins/default/js/alertas.js"></script>
    
    
    <script src="skins/admin/js/jquery.blockUI.js" type="text/javascript"></script>
    <script src="skins/admin/js/jquery.iframe-post-form.js" type="text/javascript"></script>


<!------------END LIBRERIA DE JAVASCRIPT-------------->


</body>
</html>