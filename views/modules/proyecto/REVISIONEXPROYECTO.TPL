 <script src="skins/default/js/proyectos/revisionexproyecto.js"></script>
  <script type="text/javascript" src="skins/default/js/comentarios/jquery.oembed.js"></script>
 <script type="text/javascript" src="skins/default/js/comentarios/jquery.watermarkinput.js"></script>

 
 <script>
function enviarForm(num){
	
	$('#num').val(num);		
	$('#frmadjunto'+num).submit();
}

	
</script>

<div id="alerta" class="alert alert-block " style="display:none;">
							<button type="button" class="close" data-dismiss="alert">×</button>
							<h4 id="headAlerta" class="alert-heading">!CORRECTO!</h4>
							<p><div id="bodyAlerta">El proyecto se ha guardado correctamente.</div></p>
</div>



				<div class="box">
					<!-- Box Head -->
					<div class="box-head">
						<h1 class="left">#TITULOPROYECTO#</h1>
						<span class="right">#LABELESTADO#</span>						
						<br>
						<p>Revisión del proyecto . 
						</p>
						
						
						
						
						
						
					</div>
					<!-- End Box Head -->	
             
                    
                    <!-- Pagging -->
						
                     
                      
                        <div class="pagging">
                        
                       <div class="left">
                        </div> 
                        <div class="right">
                        
                          <!--#BTNSALIR#-->   
						  <!--#BTNENVIARPROP#-->
						  <!--#BTNENVIAREVISION#-->
                                                
                        </div>
                        
						</div></br>
              
						<!-- End Pagging -->
											
						
						
						<div class="pagging">
						<div class="left" id="menucontent">
                        
                       <ul class="subMenu" style="margin-top:15px;" id="myTablab">
                                  <!--#TABRESUMEN#-->
								  <!--#TABIPROYECTO#-->
								  <!--#TABAMERCADO#-->
								  <!--#TABASPECTOST#-->                     
                                  <!--#TABASPECTOSL#--> 
                                  <!--#TABANALISISF#-->
                                  <!--#TABPROGRAMAE#--> 
                          		  <!--#TABEQUIPODR#-->
								  <!--#TABCONCLUSIONES#-->			  
                                  <!--#TABANEXOS#-->  
								  <!--#TABCOMENTARIOSGENERALES#-->				 
                      
                       </ul>
                         
                         </div>
						</div>
                    
                    
					<!--CONTENT 
					<form enctype="multipart/form-data" name="frmaddproyecto" method="post" id="frmaddproyecto"  target="iframe-post-form">-->
										
                    <div id="TabContent" class="tab-content" style="overflow:hidden !important;">
					 
		
                     <div class="tab-pane" id="tab1">
                     <div class="box-content">
						<!-- RESUMEN EJECUTIVO--> 
						
						<div class="form-horizontal">
						<fieldset>
						
			<div class="box" id="L1">
					<div class="box-head" >
					     <h2 class="left">&nbsp;1.   Resumen Ejecutivo</h2>	
					 
					     <input type="hidden" value="#IDPROYECTO#" id="idProyecto" name="idProyecto" />
					     <input type="hidden" value="#ESTADO#" id="estado" name="estado" />
					     <input type="hidden" value="#EDITARCHIVO#" id="editArchivo" name="editArchivo" />
			         		 
					 </div></br>
					
				  <div class="wellwhite" id="L1">	
					
					 <div> <a href="javascript:void(0)" onclick="Toogle1(this.id);" class="btn btn-minimize btn-round" id="Resumen-L1"><i class="icon-chevron-up"></i> Ocultar</a>	</div></br>					
                      
											   
				  
				           <div class="box-proyecto" style="display:" id="BOX-L1">
  		
	<table width="100%">
	  <tr>
	   <td align="right"><strong>1.1 Proyecto:</strong></td>
	   <td align="left">&nbsp;#TITULOPROYECTO#</td>
	  </tr>
	  
	   <tr>
	   <td align="right"><strong>1.2 Folio:</strong></td>
	   <td align="left">&nbsp;#FOLIO#</td>
	  </tr>
      
	  <tr>
	   <td align="right"><strong>1.3 Descripción:</strong></td>
	   <td align="left">&nbsp;#DESCRIPCION#</td>
	  </tr>
	  
	   <tr>
       <td align="right" width="170" ><strong>1.4 Contribuye a los Objetivos del Plan Estratégico:</strong></td>
       <td align="left">&nbsp;#CONTRIBUYE#<td>
       </tr>
	   
	   
       <tr>
       <td align="right"><strong>1.5  Está en el plan Operativo del año:</strong></td>
	   <td align="left">&nbsp;#ESTAENPO#</td>
       </tr>
	   
	   <tr>
       <td align="right"><strong>1.6  Está incluido en el presupuesto del año:</strong></td>
	   <td align="left">&nbsp;#INC_PRESUPUESTO#</td>
       </tr>
	   
	    <tr>
       <td align="right"><strong>1.7  Total de Inversi&oacute;n:</strong></td>
       <td align="left">&nbsp;#TOTALINV#<td>
       </tr>
	   
	    <tr>
	   <td align="" ><strong>&nbsp;1.8 Fuentes de financiamiento</strong></td>       
       </tr>
	   
	   <tr>
	   <td align="right" ><strong>&nbsp;Interna</strong></td>
	   <td align="left">&nbsp;#FINVERSION_INTERNA#<td>
	   </tr>
	   <tr>       
	   <td align="right" ><strong>&nbsp;Monto:</strong></td>
	   <td align="left">&nbsp;#MONTOINVI#<td>	   
	   </tr>
	   <tr>
	  <td align="right" ></td>
	   <td align="left" #PRESUPUESTO#>&nbsp;#LABELPRESUPUESTO#</td>
	  </tr>
	   <tr>
	   <td align="right" ></td>
	   <td align="left" #AHORRO#>&nbsp;#LABELAHORRO#</td>
	  </tr>
       <tr>
	   <td align="right" </td>
	   <td align="left" #SUBEJERCICIO#>&nbsp;#LABELSUBEJERCICIO#</td>	   	
	   </tr>
	   <tr>
	   <td align="right" ></td>
	   <td align="left" #TRASPASO#>&nbsp;#LABELTRASPASO#</td>
	   </tr>
	   <tr>
	   <td align="right" ></td>
	   <td align="left" #AMPLIACION#>&nbsp;#LABELAMPLIACION#</td>	   	
	   </tr>  
	   <tr></tr>  <tr></tr>   <tr></tr>   
	   
	   <tr>
	   <td align="right" ><strong>&nbsp;Externa</strong></td>
	   <td align="left">&nbsp;#FINVERSION_EXTERNA#<td>
	   </tr>
	   <tr>       
	   <td align="right" ><strong>&nbsp;Monto:</strong></td>
	   <td align="left">&nbsp;#MONTOINVE#<td>	   
	   </tr>	   
	 
	   <tr >
	   <td align="right"></td>
	   <td align="left" #DONATIVOPRES#>&nbsp;#LABELDONATIVOPRES#</td>
	  </tr>	  
	  
	   <tr >
	   <td align="right"></td>
	   <td align="left" #DONATIVONOPRES#>&nbsp;#LABELDONATIVONOPRES#</td>
	  </tr>	  
	   
       <tr >
	   <td align="right" ></td>
	   <td align="left" #CREDITO#>&nbsp;#LABELCREDITO#</td>	   	
	   </tr>
	   
	   <tr >
	   <td align="right"></td> 
	   <td align="left" #OTROS#>&nbsp;#LABELOTROS#</td>
	   </tr>
	  
	   <tr >
	   <td align="right"><strong>1.9  Tiempo estimado de Ejecuci&oacute;n:</strong></td> 
	   <td align="left">&nbsp;#TIEMPO_EJECUCION#</td>
	   </tr>
	  
	   <tr >
	   <td align="right"><strong><p>1.10 Nivel principal al que pertenece el proyecto dentro de la jerarquía institucional:</p></strong></td> 
	   <td align="left">&nbsp;#JERARQUIAPROY#</td>
	   </tr>
      
       
	   
       </table>
	   
	           </div>
	   
	   
	   <!--COMENTARIOS DE LA PESTAÑA  DEL RESUMEN -->
			  
		     <!--#COMENTARIOSTABRESUMEN#-->
					
                 <!--FIN COMENTARIOS --> 
	   
	   </div><!--fin wellwhite-->
	   
	                    <!-- Pagging -->
                        <div class="pagging" style="border-top:1px solid #BBBBBB;">
                        <div class="right">
        
                        </div>
						</div>
						<!-- End Pagging -->    
	   
	 </div> <!--fin box-->							  
			  	
					   				 
					   </fieldset>
					   </div>
					   <!--END RESUMEN EJECUTIVO-->
					</div>
                    </div>
					
					
					
                    <!--CONTENT 2-->
                     <div class="tab-pane" id="tab2">
                        <div class="box-content">                          
					<!--IDENTIFICACION DEL PROYECTO-->
					 <div class="form-horizontal">
						<fieldset>
						
						<div class="box" id="L2">
					<div class="box-head" >
					     <h2 class="left">&nbsp;2. Identificación del Proyecto</h2>			         		 
					 </div></br>
					
				  <div class="wellwhite" id="L2">	
					
					 <div> <a href="javascript:void(0)" onclick="Toogle1(this.id);" class="btn btn-minimize btn-round" id="Identificación-L2"><i class="icon-chevron-up"></i> Ocultar</a>	</div></br>					
                      
											   
				  
				           <div class="box-proyecto" style="display:" id="BOX-L2">
  		
	 <table width="100%">
	  <tr>
	   <td align="right"><strong>2.1 Antecedentes:</strong></td>
	   <td align="left">&nbsp;#ANTECEDENTES#</td>	  
	  </tr>
	   <tr>
	   <td align="" ><strong>&nbsp;2.2 Justificación</strong></td>       
       </tr>
      
	  <tr>
	   <td align="right"><strong>2.2.1 Identidad y Misión Institucional:</strong></td>
	   <td align="left">&nbsp;#IMI#</td>
	  </tr>
	   <tr>
	   <td align="center" ><strong>&nbsp;2.2.2 Alineaci&oacute;n al plan Estratégico, Plan Operativo Anual y Presupuesto</strong></td>       
       </tr>
	   
	    <tr>
	   <td align="right" ><strong>&nbsp;2.2.2.1</strong></td>       
       </tr>  
	  
	  
	   <tr>
       <td align="right" width="170" ><strong>Plan Estratégico:</strong></td>
       <td align="left">&nbsp;#PLANE#</td>
       </tr>
	   
	   
       <tr>
       <td align="right"><strong>Plan Operativo:</strong></td>
	   <td align="left">&nbsp;#PLANO#</td>
       </tr>
	   
	   <tr>
       <td align="right"><strong>línea Estratégica:</strong></td>
	   <td align="left">&nbsp;#LINEAE#</td>
       </tr>
	   
	    <tr>
       <td align="right"><strong>Objetivo Estratégico:</strong></td>
       <td align="left">&nbsp;#OBJE#<td>
       </tr>
	   
	   
	   <tr>
	   <td align="right" ><strong>Resultado:</strong></td>
	   <td align="left">&nbsp;#RESULTADO#<td>
	   </tr>
	   <tr>       
	   <td align="right" ><strong>¿De qué manera contribuye el proyecto a la línea y objetivo estratégicos?:</strong></td>
	   <td align="left">&nbsp;#CONT_PROYECTO#<td>	   
	   </tr>
	   <tr>
	  <td align="right" ><strong>2.2.3 Protocolos, normas, estatutos institucionales:</strong></td>
	   <td align="left">&nbsp;#PROTOCOLOS#</td>
	  </tr>
	  
	  
	   <tr >
	   <td align="center"><strong>2.3 Objetivo General y Objetivos específicos</strong></td> 	  
	   </tr>
	  
	   <tr >
	   <td align="right"><strong>Objetivo General</strong></td> 
	   <td align="left">&nbsp;#OBJETIVO_GENERAL#</td>
	   </tr>	        	   
       </table>
	   
	   <div> <a href="javascript:void(0)" onclick="Toogle2(this.id);" class="btn btn-minimize btn-round" id="Objetivos-L2"><i class="icon-chevron-down"></i> Ver</a>	</div>			   
				  
				           <div class="box-objetivose" style="display: none" id="BOXOBJ-L2">
	   <!--inicio Objetivos Especificos-->
	   <div class="well">
       <table width="">
        <tbody><tr>
        <td width="30">&nbsp;&nbsp;&nbsp;	</td>
        <td><strong>Objetivos Específicos:</strong></td>        
        </tr> 
		<tr></tr>
		<tr>
		 #OBJETIVOSESPECIFICOS#     
        </tr>
       
        </tbody></table>
        </div>
		<!--Fin de Objetivos Especificos-->
		             </div></br>
					 
		<table width="">
		
       <tr>
	   <td align="right"><strong>2.4 Descripción y características del proyecto</strong></td> 
	   <td align="left">&nbsp;#CARACTERISTICAS#</td>
	   </tr>
	   
	   <tr>
	   <td align="right"><strong>2.5  Participantes en el proyecto (Socios/Aliados):</strong></td> 
	   <td align="left">&nbsp;#PARTICIPANTES#</td>
	   </tr>
	   
	   </table>						 					 
	   
	           </div>
			   
	    
		
		
	    <!--COMENTARIOS DE LA PESTAÑA IDENTIFICACION DEL PROYECTO-->
				 
		             	 <!--#COMENTARIOSTABIDENT#-->
					
                 <!--FIN COMENTARIOS --> 
	   
	   </div><!--fin wellwhite-->
	   
	                    <!-- Pagging -->
                        <div class="pagging" style="border-top:1px solid #BBBBBB;">
                        <div class="right">
        
                        </div>
						</div>
						<!-- End Pagging -->    
	   
	 </div> <!--fin box-->										
					 
					    </fieldset>
					 </div>
					        <!--FIN IDENTIFICACION DEL PROYECTO-->					 
                        </div>
                     </div>
                     <!--FIN CONTENT 2-->
					 
					 <!--INICIO CONTENT 3-->
                    
                    <div class="tab-pane" id="tab3">
                     <div class="box-content">
						    <!--INICIO ANÁLISIS DE MERCADO-->
							
							<div class="modal hide fade" id="myModalupload1" >
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">x</button>
				<span id="titlemodal"></span>
			</div>
			<div class="modal-body">
				<div id="bodymodal" >
					<!--BODY MODAL-->
					 
					

					<!-- Table -->
						<div class="form-horizontal" style="width: 400px;" >
						  <form enctype="multipart/form-data" name="frmadjunto1" class="frmadjuntos" method="post" id="frmadjunto1" action="?execute=proyectos/revisionexproyecto&method=UploadFile&numFrm=1" target="iframe-post-form">  
                          <fieldset>
							<legend>Anexar Archivo</legend>
							   <input type="hidden" value="" id="num" name="num" />
								<input  type="hidden" id="idProyecto1" name="idProyecto1" value=""/>								
								<input  type="hidden" id="editar1" name="editar1" value="FALSE"/>						
								<input  type="hidden" id="idArchivo1" name="idArchivo1" value=""/>							
							    
							<div class="control-group">
								<label for="focusedInput" class="control-label"><i class="icon-asterisk"></i>Titulo:</label>
								<div class="controls">
								  <input type="text" value="" name="titulo1" id="titulo1" class="input-xlarge focused">
								</div>
							  </div>
							
							
							<div class="control-group">
								<label for="focusedInput" class="control-label">Descripcion:</label>
								<div class="controls">
						<textarea id="descripcionModal1" name="descripcionModal1" class="cleditor" rows="3" style="width: 350px; height: 140x;"></textarea>
								</div>
							  </div>							  
												 
							 
							  <div class="control-group">
								<label for="focusedInput" class="control-label"><i class="icon-asterisk"></i>Archivo:</label>
								<div class="controls">
								<input type="file"  id="imagearticulo1" name="imagearticulo1" />
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
				
				<input type="submit" data-dismiss="modal" class="btn btn-warning" onclick="enviarForm('1');" value="Adjuntar Archivo"/>
				
			</div>
		</div>
                           <!--END MODAL-->							
							
							     <div class="form-horizontal">
						            <fieldset>
									<div class="box" id="L3">
					<div class="box-head" >
					     <h2 class="left">&nbsp;3.   Análisis de Mercado</h2>			         		 
					 </div>						   
									 
					
					 <div class="wellwhite" id="L3">	
					
					 <div> <a href="javascript:void(0)" onclick="Toogle1(this.id);" class="btn btn-minimize btn-round" id="Análisis-L3"><i class="icon-chevron-up"></i> Ocultar</a>	</div></br>					
                      
											   
				  
				           <div class="box-proyecto" style="display:" id="BOX-L3">
						   
						     <div id="left">              
                                <!-- Box -->
				                 <!--#BTNADJUNTARANALISIS#-->
								
							           </div>	
									   <!-- Table -->
					<div id="results-panel" style="position: relative;min-height:100px !important;">
					</div>
					<!-- Table -->	</br></br>
  		
	 <table width="100%">
	  <tr>
	   <td align="center"><strong>3.1 Aspectos Generales del Mercado</strong></td>	   
	  </tr>
      
	  <tr>
	   <td align="right"><strong>3.1.1  Proveedores:</strong></td>
	   <td align="left">&nbsp;#PROVEEDORES#</td>
	  </tr>
	  
	   <tr>
       <td align="right" width="170" ><strong>3.1.2 Oferta:</strong></td>
       <td align="left">&nbsp;#OFERTA#<td>
       </tr>
	   
	   
       <tr>
       <td align="right"><strong>3.1.3  Demanda:</strong></td>
	   <td align="left">&nbsp;#DEMANDA#</td>
       </tr>
	   
	   <tr>
       <td align="right"><strong>3.2 Balance Oferta-Demanda:</strong></td>
	   <td align="left">&nbsp;#BOFERTA#</td>
       </tr>
	   
	    <tr>
       <td align="right"><strong>3.3 Sistema de precios:</strong></td>
       <td align="left">&nbsp;#SPRECIOS#<td>
       </tr>
	   
	    <tr>
	   <td align="" ><strong>3.4 Promoción. Estrategias de promoción del proyecto</strong></td>
	      
       </tr>
	   
	   <tr>
	   <td align="right" ><strong>3.4.1Canales de Distribución:</strong></td>
	   <td align="left">&nbsp;#CDISTRIBUCION#<td>
	   </tr>
	   <tr>       
	   <td align="right" ><strong>3.4.2Promoción:</strong></td>
	   <td align="left">&nbsp;#PROMOCION#<td>	   
	   </tr>
	   <tr>
	  
	   <tr>
	   <td align="right" ><strong>3.5 Descripción de las fuentes de Información y metodología utilizada:</strong></td>
	   <td align="left">&nbsp;#FINFORMACION#<td>
	   </tr>
	         
	   
       </table>
	   
	           </div>
	   
	   
	   <!--COMENTARIOS DE LA PESTAÑA  ANÁLISIS DE MERCADO-->
			  
		            <!--#COMENTARIOSTABANALISISM#-->
					
                 <!--FIN COMENTARIOS --> 	
	   
	   </div><!--fin wellwhite-->
	   
	                    <!-- Pagging -->
                        <div class="pagging" style="border-top:1px solid #BBBBBB;">
                        <div class="right">        
                        </div>
						</div>
						<!-- End Pagging -->    
	   
	 </div> <!--fin box-->			  					  
							  
							  									
									</fieldset>
							     </div>					
						    <!--FIN ANÁLISIS DE MERCADO-->
						
					</div>
                    </div>
                     <!--fin CONTENT 3-->
					 
					  <!--INICIO CONTENT 4-->
                    
                    <div class="tab-pane" id="tab4">
                     <div class="box-content">
					         <!--INICIO ASPECTOS TÉCNICOS-->
							     <div class="form-horizontal">
								 	<fieldset>
									
									
									<div class="box" id="L4">
					<div class="box-head" >
					     <h2 class="left">&nbsp;4.  Aspectos Técnicos</h2>			         		 
					 </div></br>
					 
					 <div class="wellwhite" id="L4">	
					
					 <div> <a href="javascript:void(0)" onclick="Toogle1(this.id);" class="btn btn-minimize btn-round" id="AspectosT-L4"><i class="icon-chevron-up"></i> Ocultar</a>	</div></br>					
                      
											   
				  
				<div class="box-proyecto" style="display:" id="BOX-L4">
  		
	 <table width="">
	  <tr>
	   <td align="right"><strong>4.1 Localización y área de influencia del proyecto:</strong></td>
	   <td align="left">&nbsp;#LOCALIZACION#</td>	   
	  </tr>
      
	  <tr>
	   <td align="right"><strong>4.2 Disponibilidad de Recursos:</strong></td>
	   <td align="left">&nbsp;#DRECURSOS#</td>
	  </tr>   
	   
	         
	   
       </table>
	   
	           </div>
	   
	   
	    <!--COMENTARIOS DE LA PESTAÑA  ASPECTOS TÉCNICOS-->
		             	 
						 <!--#COMENTARIOSTABASPECTOST#-->
					
                 <!--FIN COMENTARIOS --> 			
	   
	   </div><!--fin wellwhite-->
	   
	                    <!-- Pagging -->
                        <div class="pagging" style="border-top:1px solid #BBBBBB;">
                        <div class="right">        
                        </div>
						</div>
						<!-- End Pagging -->    
	   
	 </div> <!--fin box-->	
				
										
									</fieldset>									
								 </div>		 
							 <!--FIN ASPECTOS TÉCNICOS-->					
					</div>
                    </div>
                    <!--FIN CONTENT 4-->
					
					 <!--INICIO CONTENT 5-->
                    <div class="tab-pane" id="tab5">
                     <div class="box-content">
					 
					 <!--INICIO ANEXOS -->
						
						<div class="modal hide fade" id="myModalupload5" >
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">x</button>
				<span id="titlemodal"></span>
			</div>
			<div class="modal-body">
				<div id="bodymodal" >
					<!--BODY MODAL-->
					 				<!-- Table -->
						<div class="form-horizontal" style="width: 400px;" >
						  <form enctype="multipart/form-data" name="frmadjunto5" method="post" class="frmadjuntos" id="frmadjunto5" action="?execute=proyectos/editproyecto&method=UploadFile&numFrm=5" target="iframe-post-form">  
                          <fieldset>
							<legend>Agregar Documento</legend>
							     <input type="hidden" value="" id="num" name="num" />
								<input  type="hidden" id="idProyecto5" name="idProyecto5" value=""/>
								<input  type="hidden" id="editar5" name="editar5" value="FALSE"/>						
								<input  type="hidden" id="idArchivo5" name="idArchivo5" value=""/>							
							    
							<div class="control-group">
								<label for="focusedInput" class="control-label"><i class="icon-asterisk"></i>Titulo:</label>
								<div class="controls">
								  <input type="text" value="" name="titulo5" id="titulo5" class="input-xlarge focused">
								</div>
							  </div>
							
							
							<div class="control-group">
								<label for="focusedInput" class="control-label">Descripcion:</label>
								<div class="controls">
						<textarea id="descripcionModal5" name="descripcionModal5" class="cleditor" rows="3" style="width: 350px; height: 140x;"></textarea>
								</div>
							  </div>
							  					 
							  <div class="control-group">
								<label for="focusedInput" class="control-label"><i class="icon-asterisk"></i>Archivo:</label>
								<div class="controls">
								<input type="file"  id="imagearticulo5" name="imagearticulo5" />
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
				
				<input type="submit" data-dismiss="modal" class="btn btn-warning" onclick="enviarForm('5');" value="Adjuntar Archivo"/><div id="results_text"></div>
				
			</div>
		</div>
                           <!--END MODAL-->	
					 
						  <!--INICIO ASPECTOS LEGALES-->
						    <div class="form-horizontal">
								<fieldset>
								
								<div class="box" id="L5">
					<div class="box-head" >
					     <h2 class="left">&nbsp;5. Aspectos Legales</h2>			         		 
					 </div>	</br>
					 <div class="wellwhite" id="L5">	
					
					 <div> <a href="javascript:void(0)" onclick="Toogle1(this.id);" class="btn btn-minimize btn-round" id="AspectosL-L5"><i class="icon-chevron-up"></i> Ocultar</a>	</div></br>					
                      
											   
				  
				<div class="box-proyecto" style="display:" id="BOX-L5">
  		
	 <table width="">
	  <tr>
	   <td align="right"><strong>5.1 Consideraciones Legales:</strong></td>
	   <td align="left">&nbsp;#CLEGALES#</td>	   
	  </tr>
      
	  <tr>
	   <td align="right"><strong>5.2  
							 Consideraciones Jurídicas</strong></td>
	   <td align="left">&nbsp;#CJURIDICAS#</td>
	  </tr>   
	  
	  <tr>
	   <td align="right"><strong>5.3  Consideraciones patrimoniales</strong></td>
	   <td align="left">&nbsp;#CPATRIMONIALES#</td>
	  </tr>  
	   
	   </table></br></br>
	   
	   
	    
					      <div id="left">              
                                <!-- Box -->
				                  <div class="box">
					                <!-- Box Head -->
					                 <div class="box-head" style="height:60px;">
									 <p>Documentos pertinentes (Actas constitutivas, poderes, escrituras, convenios, contratos, etc.) 
							
									 </p>
									 
									 
					                 </div>
				                  </div>	
								
							</div>	
							
							<!-- Table -->
							<div id="results-panel5" style="position: relative;min-height:200px !important;">
					</div>
					<!-- Table -->	
					
	           </div>   <br>
	   						   
			         
				 <!--COMENTARIOS DE LA PESTAÑA ASPECTOS LEGALES -->
		             	 
						<!--#COMENTARIOSTABASPECTOSL#-->
					
                 <!--FIN COMENTARIOS --> 				
	   
	   </div><!--fin wellwhite-->
	   
	                    <!-- Pagging -->
                        <div class="pagging" style="border-top:1px solid #BBBBBB;">
                        <div class="right">        
                        </div>
						</div>
						<!-- End Pagging -->    
	   
	 </div> <!--fin box-->		
								
						
								
							</fieldset>
							
						</div>				
						    <!--FIN ASPECTOS LEGALES-->
					     </div>
                    </div>
                    <!--FIN CONTENT 6-->
					
					 <!--INICIO CONTENT 6-->
                    <div class="tab-pane" id="tab6">
                        <div class="box-content">
						
						   <!--INICIO ANÁNILIS FINANCIERO-->  						   
						   
						   <div class="form-horizontal">
						    <fieldset>
							   
							 <div class="box" id="L6">  
					<div class="box-head" >
					     <h2 class="left">&nbsp;6. Análisis Financiero (Presupuesto de Inversiones)</h2>			         		 
					 </div>	</br>				 
					 
					 <div class="wellwhite" id="L6">
					 
					 <div> <a href="javascript:void(0)" onclick="Toogle1(this.id);" class="btn btn-minimize btn-round" id="AnálisisF-L6"><i class="icon-chevron-up"></i> Ocultar</a>	</div></br>					
                      
											   
				  
				           <div class="box-proyecto" style="display:" id="BOX-L6">
  		
	 <table width="">
	  
	   <tr>
	   <td align="" ><strong>6.1 Presupuesto</strong></td>       
       </tr>
      
	  <tr>
	   <td align="right"><strong>Fuentes de Financiamiento</strong></td>
	   
	  </tr>
	   <tr>
	   <td align="right" ><strong>&nbsp;Interna</strong></td>
	   <td align="left">&nbsp;#FINVERSION_INTERNA#<td>
	   </tr>
	   <tr>       
	   <td align="right" ><strong>&nbsp;Monto:</strong></td>
	   <td align="left">&nbsp;#MONTOINVI#<td>	   
	   </tr>
	   <tr>
	  <td align="right" ></td>
	   <td align="left" #PRESUPUESTO#>&nbsp;#LABELPRESUPUESTO#</td>
	  </tr>
	   <tr>
	   <td align="right" ></td>
	   <td align="left" #AHORRO#>&nbsp;#LABELAHORRO#</td>
	  </tr>
       <tr>
	   <td align="right" </td>
	   <td align="left" #SUBEJERCICIO#>&nbsp;#LABELSUBEJERCICIO#</td>	   	
	   </tr>
	   <tr>
	   <td align="right" ></td>
	   <td align="left" #TRASPASO#>&nbsp;#LABELTRASPASO#</td>
	   </tr>
	   <tr>
	   <td align="right" ></td>
	   <td align="left" #AMPLIACION#>&nbsp;#LABELAMPLIACION#</td>	   	
	   </tr>  
	   <tr>       
	   <td align="right" ><strong>&nbsp;Implicaciones de la partida:</strong></td>
	   <td align="left">&nbsp;#DESC_INTERNA#<td>	   
	   </tr>
	   <tr></tr><tr></tr><tr></tr>		
   
	   
	   <tr>
	   <td align="right" ><strong>&nbsp;Externa</strong></td>
	   <td align="left">&nbsp;#FINVERSION_EXTERNA#<td>
	   </tr>
	   <tr>       
	   <td align="right" ><strong>&nbsp;Monto:</strong></td>
	   <td align="left">&nbsp;#MONTOINVE#<td>	   
	   </tr>	   
	 
	   <tr >
	   <td align="right"></td>
	   <td align="left" #DONATIVOPRES#>&nbsp;#LABELDONATIVOPRES#</td>
	  </tr>	  
	  
	   <tr >
	   <td align="right"></td>
	   <td align="left" #DONATIVONOPRES#>&nbsp;#LABELDONATIVONOPRES#</td>
	  </tr>	  
	   
       <tr >
	   <td align="right" ></td>
	   <td align="left" #CREDITO#>&nbsp;#LABELCREDITO#</td>	   	
	   </tr>
	   
	   <tr >
	   <td align="right"></td> 
	   <td align="left" #OTROS#>&nbsp;#LABELOTROS#</td>
	   </tr>
	   
	    <tr>       
	   <td align="right" ><strong>&nbsp;Implicaciones de la partida:</strong></td>
	   <td align="left">&nbsp;#DESC_EXTERNA#<td>	   
	   </tr>   
	   	        	   
	   
       </table>
	   
	   <div> <a href="javascript:void(0)" onclick="Toogle2(this.id);" class="btn btn-minimize btn-round" id="Distribución-L6"><i class="icon-chevron-down"></i> Ver</a>	</div>			   
				  
				           <div class="box-distribución" style="display: none" id="BOXOBJ-L6">
	   <div class="well">
       <table width="">
        <tbody><tr>
		 <tr>       
	   <td align="right" ><strong>&nbsp;6.2 Distribución de Inversión:</strong></td>	   	   
	   </tr>
        <td width="">&nbsp;	</td>
        <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Concepto:</td>
        <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Monto:</td>
       </tr>
	   #DISTRIBUCION_INVERSION#      
                    
       
        </tbody></table>
        </div>		
		
		</div></br>
					 
		<table width="">
		
       <tr>
	   <td align="center"><strong>6.3  Evaluación Financiera</strong></td>	   
	   </tr>
	   
	   <tr>
	   <td align="right"><strong>6.3.1 Valor Presente Neto (VPN):</strong></td> 
	    <td align="left">&nbsp;$ #DINVPN#</td>&nbsp;&nbsp;	  
	   </tr>
	    <tr> 
	    <td align="left">&nbsp;</td>
	   <td align="left">&nbsp;#VPN#</td>
	   </tr>
	   
	    <tr>
	   <td align="right"><strong>6.3.2 Tasa Interna de Retorno (TIR):</strong></td> 
	   <td align="left">&nbsp;#PORCTIR# %</td>
	   </tr>
	   
	    <tr> 
	    <td align="left">&nbsp;</td>
	  <td align="left">&nbsp;#TIR#</td>
	   </tr>
	   
	   
	   <tr>
	   <td align="right"><strong>6.3.3 Relación Beneficio – Costo:</strong></td> 
	   <td align="left">&nbsp;#RBC#</td>
	   </tr>	   
	   <tr>	    
	   <td align="left">&nbsp;</td>
	   </tr>
	   
	   <tr>
	   <td align="right"><strong>6.3.4 Punto de Equilibrio:</strong></td> 
	   <td align="left">&nbsp;$ #DINPUNTOE#</td>
	   </tr>
	   	
	    <tr> 
	    <td align="left">&nbsp;</td>
	   <td align="left">&nbsp;#PUNTOE#</td>
	   </tr>  
	   
	    <tr>
	   <td align="right"><strong>6.3.5 Retorno de Inversión (ROI):</strong></td> 
	   <td align="left">&nbsp;#PORCROI# %</td>
	   </tr>
	   	
	    <tr> 
	    <td align="left">&nbsp;</td>
	   <td align="left">&nbsp;#ROI#</td>
	   </tr>   
	   
	   
	   </table>	</br>
	   
	   	  					 
							 
							  <div id="left">              
                                <!-- Box -->
				                  <!--#BTNADJUNTARAM#-->	
								
							</div>
							
							<!-- Table -->
					<div id="results-panel2" style="position: relative;min-height:250px !important;">
					</div>
					<!-- Table --> 
	   					 					 
	   
	           </div></br><!--boton ver/ocultar-->  
			   
			   
			   <!--COMENTARIOS DE LA PESTAÑA ANÁNILIS FINANCIERO -->
		             	 
						 <!--#COMENTARIOSTABANALISISF#-->
					
                 <!--FIN COMENTARIOS -->
			   
	   
	   </div><!--fin wellwhite-->
	   
	                    <!-- Pagging -->
                        <div class="pagging" style="border-top:1px solid #BBBBBB;">
                        <div class="right">
        
                        </div>
						</div>
						<!-- End Pagging -->    
	   
	 </div> <!--fin box-->					 
					 
					 						 
							 
						
						<!-- -->
										
								
			  
			  		   <div class="modal hide fade" id="myModalupload2" >
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">x</button>
				<span id="titlemodal"></span>
			</div>
			<div class="modal-body">
				<div id="bodymodal" >
					<!--BODY MODAL-->
					 
					

					<!-- Table -->
						<div class="form-horizontal" style="width: 400px;" >
						  <form enctype="multipart/form-data" name="frmadjunto2" method="post" class="frmadjuntos" id="frmadjunto2" action="?execute=proyectos/revisionexproyecto&method=UploadFile&numFrm=2" target="iframe-post-form">  
                          <fieldset>
							<legend>Incluir Archivo</legend>
							    <input type="hidden" value="" id="num" name="num" />
								<input  type="hidden" id="idProyecto2" name="idProyecto2" value=""/>
								<input  type="hidden" id="editar2" name="editar2" value="FALSE"/>						
								<input  type="hidden" id="idArchivo2" name="idArchivo2" value=""/>							
							    
							<div class="control-group">
								<label for="focusedInput" class="control-label"><i class="icon-asterisk"></i>Titulo:</label>
								<div class="controls">
								  <input type="text" value="" name="titulo2" id="titulo2" class="input-xlarge focused">
								</div>
							  </div>
							
							
							<div class="control-group">
								<label for="focusedInput" class="control-label">Descripcion:</label>
								<div class="controls">
						<textarea id="descripcionModal2" name="descripcionModal2" class="cleditor" rows="3" style="width: 350px; height: 140x;"></textarea>
								</div>
							  </div>
							  												 
							 
							  <div class="control-group">
								<label for="focusedInput" class="control-label"><i class="icon-asterisk"></i>Archivo:</label>
								<div class="controls">
								<input type="file"  id="imagearticulo2" name="imagearticulo2" />
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
				
				<input type="submit" data-dismiss="modal" class="btn btn-warning" onclick="enviarForm('2');" value="Adjuntar Archivo"/>
				
			</div>
		</div>
                            <!--END MODAL-->	</br>								
								
							   </fieldset>
						    </div>	
							 <!--FIN ANÁNILIS FINANCIERO-->					
					      </div>
                        </div>
                    <!--FIN CONTENT 6-->
									
					
					<!--INICIO CONTENT 7-->
                    <div class="tab-pane" id="tab7">
                        <div class="box-content">
						   <!--INICIO PROGRAMA DE EJECUCIÓN -->
						     <div class="form-horizontal">
							 	<fieldset>
									<div class="box-head" >
					     <h2 class="left">&nbsp;7.  Programa de Ejecución </h2>			         		 
					 </div><p style="padding:10px; background:#F5F5F5; border: 1px solid rgba(0, 0, 0, 0.05);">Descripción de etapas, pasos y tiempos del proyecto.</p>
									</br>
									
											 <div> <a href="javascript:void(0)" onclick="Toogle1(this.id);" class="btn btn-minimize btn-round" id="Programa-L7"><i class="icon-chevron-up"></i> Ocultar</a>	</div></br>		
                      
											   
				  
				<div class="box-proyecto" style="display:" id="BOX-L7"></br>
				
				
		<table>
										
										<tr>
											<td style="padding-right: 10px;">
											Fecha de Inicio:
											<input type="text" value="#FINICIO#"  readonly  style="width:130px;" name="finicio" id="finicio" class="input-xlarge focused">
										<img src="skins/default/images/calendario.gif" width="20" height="18" alt="Calendario">
								</td>
											<td style="padding-right: 10px;">
												Fecha de Termino:
											<input type="text" value="#FTERMINO#"   readonly style="width:130px;" name="ftermino" id="ftermino" class="input-xlarge focused">
											<img src="skins/default/images/calendario.gif" width="20" height="18" alt="Calendario">
												
											</td>
									
											
										</tr>
									</table>
									
								<br />
									
									
									<div class="control-group" >
									
									
									<div id="ganttChart"></div>
	<br/><br/>
	<div id="eventMessage"></div>
	
	#GANTT#
								    </div>
									
				
			   
	           </div>   <br/><br/>
				 <!--COMENTARIOS DE LA PESTAÑA PROGRAMA DE EJECUCIÓN -->
		             	
						<!--#COMENTARIOSTABPROGRAMA#-->
					
                 <!--FIN COMENTARIOS --> 
									
								</fieldset>								
							 </div>				   
						   <!--FIN PROGRAMA DE EJECUCIÓN -->					
					    </div>
                    </div>
                    <!--FIN CONTENT 7-->
					
					 <!--INICIO CONTENT 8-->
                    <div class="tab-pane" id="tab8">
                       <div class="box-content">
					    <!--INICIO EQUIPO DIRECTIVO Y RESPONSABLE -->
						   <div class="form-horizontal">
						   	  <fieldset>
							  
							  <div class="box" id="L8">  
					<div class="box-head" >
					     <h2 class="left">&nbsp;8.  Equipo directivo y responsable</h2>			         		 
					 </div></br>
					 
					 <div class="wellwhite" id="L8">	
					
					 <div> <a href="javascript:void(0)" onclick="Toogle1(this.id);" class="btn btn-minimize btn-round" id="EquipoD-L8"><i class="icon-chevron-up"></i> Ocultar</a>	</div></br>					
                      
											   
				  
				<div class="box-proyecto" style="display:" id="BOX-L8">
  		
	 <table width="">
	  <tr>
	   <td align="right"><strong>Descripción de persona responsable y equipo de colaboradores involucrados en el proyecto:</strong></td>
	   <td align="left">&nbsp;#EDIRECTIVO#</td>	   
	  </tr>    
	   
	         
	   
       </table>
	   
	           </div>   
	   						   
			         
				 <!--COMENTARIOS DE LA PESTAÑA DIRECTIVO Y RESPONSABLE -->
		             	
						<!--#COMENTARIOSTABEQUIPODR#-->
					
                 <!--FIN COMENTARIOS --> 				
	   
	   </div><!--fin wellwhite-->
	   
	                    <!-- Pagging -->
                        <div class="pagging" style="border-top:1px solid #BBBBBB;">
                        <div class="right">        
                        </div>
						</div>
						<!-- End Pagging -->    
	   
	 </div> <!--fin box-->	 		
								
						
							  </fieldset>					
						   </div>				
						<!--FIN EQUIPO DIRECTIVO Y RESPONSABLE -->					
					   </div>
                    </div>
                      <!--FIN CONTENT 8-->
					  
					  
					  <!--INICIO CONTENT 9-->
                    <div class="tab-pane" id="tab9">
                       <div class="box-content">
					   
					   <!--INICIO ANEXOS -->
						
						<div class="modal hide fade" id="myModalupload4" >
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">x</button>
				<span id="titlemodal"></span>
			</div>
			<div class="modal-body">
				<div id="bodymodal" >
					<!--BODY MODAL-->
					 				<!-- Table -->
						<div class="form-horizontal" style="width: 400px;" >
						  <form enctype="multipart/form-data" name="frmadjunto4" method="post" class="frmadjuntos" id="frmadjunto4" action="?execute=proyectos/editproyecto&method=UploadFile&numFrm=4" target="iframe-post-form">  
                          <fieldset>
							<legend>Agregar Documento</legend>
							     <input type="hidden" value="" id="num" name="num" />
								<input  type="hidden" id="idProyecto4" name="idProyecto4" value=""/>
								<input  type="hidden" id="editar4" name="editar4" value="FALSE"/>						
								<input  type="hidden" id="idArchivo4" name="idArchivo4" value=""/>							
							    
							<div class="control-group">
								<label for="focusedInput" class="control-label"><i class="icon-asterisk"></i>Titulo:</label>
								<div class="controls">
								  <input type="text" value="" name="titulo4" id="titulo4" class="input-xlarge focused">
								</div>
							  </div>
							
							
							<div class="control-group">
								<label for="focusedInput" class="control-label">Descripcion:</label>
								<div class="controls">
						<textarea id="descripcionModal4" name="descripcionModal4" class="cleditor" rows="3" style="width: 350px; height: 140x;"></textarea>
								</div>
							  </div>
							  					 
							  <div class="control-group">
								<label for="focusedInput" class="control-label"><i class="icon-asterisk"></i>Archivo:</label>
								<div class="controls">
								<input type="file"  id="imagearticulo4" name="imagearticulo4" />
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
				
				<input type="submit" data-dismiss="modal" class="btn btn-warning" onclick="enviarForm('4');" value="Adjuntar Archivo"/><div id="results_text"></div>
				
			</div>
		</div>
                           <!--END MODAL-->	
					   
					   
					    <!--INICIO CONCLUSIONES Y RECOMEDACIONES -->
						   <div class="form-horizontal">
						   	  <fieldset>
							  	
								<div class="box" id="L9">  
					<div class="box-head" >
					     <h2 class="left">&nbsp;9. Conclusiones</h2>			         		 
					 </div></br>
					 
					 <div class="wellwhite" id="L9">	
					
					 <div> <a href="javascript:void(0)" onclick="Toogle1(this.id);" class="btn btn-minimize btn-round" id="Conclusiones-L9"><i class="icon-chevron-up"></i> Ocultar</a>	</div></br>					
                      
											   
				  
				<div class="box-proyecto" style="display:" id="BOX-L9">
  		
	 <table width="">
	  <tr>
	   <td align="right"><strong>Conclusiones y recomendaciones del rector:</strong></td>
	   <td align="left">&nbsp;#CONCLUSIONES#</td>	   
	  </tr>    
	   
	   <tr>
	   <td align="right"><strong>Consideraciones o comentarios de los órganos colegiados</strong></td>
	   <td align="left">&nbsp;#CONSIDERACIONES#</td>	   
	  </tr>
	         
	   
       </table> </br></br>
					      
							 <div id="left">              
                                <!-- Box -->
				                  <div class="box">
					                <!-- Box Head -->
					                 <div class="box-head" style="height:60px;">
									 <p>Documentos. 				 
									 
					                 </div>
				                  </div>	
								
							</div>	
							
							<!-- Table -->
					<div id="results-panel4" style="position: relative;min-height:200px !important;">
					</div>
					<!-- Table -->	 					     
					     
					   
	   
	           </div>   <br/>
	   						   
			         
			<!--INICIO DE COMENTARIOS CONCLUSIONES Y RECOMEDACIONES -->	
		             	
						<!--#COMENTARIOSTABCONCLUSIONES#-->
					
                 <!--FIN COMENTARIOS --> 				
	   
	   </div><!--fin wellwhite-->
	   
	                    <!-- Pagging -->
                        <div class="pagging" style="border-top:1px solid #BBBBBB;">
                        <div class="right">        
                        </div>
						</div>
						<!-- End Pagging -->    
	   
	 </div> <!--fin box-->	 	
										
				 
								
							  </fieldset>					
						   </div>				
						<!--FIN CONCLUSIONES Y RECOMEDACIONES -->					
					   </div>
                    </div>
                      <!--FIN CONTENT 9-->
					  
					  <!--INICIO CONTENT 10-->
                    <div class="tab-pane" id="tab10">
                       <div class="box-content">
					    <!--INICIO ANEXOS -->
						
						<div class="modal hide fade" id="myModalupload3" >
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">x</button>
				<span id="titlemodal"></span>
			</div>
			<div class="modal-body">
				<div id="bodymodal" >
					<!--BODY MODAL-->
					 
					

					<!-- Table -->
						<div class="form-horizontal" style="width: 400px;" >
						  <form enctype="multipart/form-data" name="frmadjunto3" method="post" class="frmadjuntos" id="frmadjunto3" action="?execute=proyectos/revisionexproyecto&method=UploadFile&numFrm=3" target="iframe-post-form">  
                          <fieldset>
							<legend>Agregar Documento</legend>
							     <input type="hidden" value="" id="num" name="num" />
								<input  type="hidden" id="idProyecto3" name="idProyecto3" value=""/>
								<input  type="hidden" id="editar3" name="editar3" value="FALSE"/>						
								<input  type="hidden" id="idArchivo3" name="idArchivo3" value=""/>							
							    
							<div class="control-group">
								<label for="focusedInput" class="control-label"><i class="icon-asterisk"></i>Titulo:</label>
								<div class="controls">
								  <input type="text" value="" name="titulo3" id="titulo3" class="input-xlarge focused">
								</div>
							  </div>
							
							
							<div class="control-group">
								<label for="focusedInput" class="control-label">Descripcion:</label>
								<div class="controls">
						<textarea id="descripcionModal3" name="descripcionModal3" class="cleditor" rows="3" style="width: 350px; height: 140x;"></textarea>
								</div>
							  </div>
							  					 
							  <div class="control-group">
								<label for="focusedInput" class="control-label"><i class="icon-asterisk"></i>Archivo:</label>
								<div class="controls">
								<input type="file"  id="imagearticulo3" name="imagearticulo3" />
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
				
				<input type="submit" data-dismiss="modal" class="btn btn-warning" onclick="enviarForm('3');" value="Adjuntar Archivo"/><div id="results_text"></div>
				
			</div>
		</div>
                           <!--END MODAL-->							
						
						   <div class="form-horizontal">
						   	  <fieldset>
							  
							  
							  <div class="box" id="10">  
					<div class="box-head" >
					     <h2 class="left">&nbsp;10. Anexos</h2>			         		 
					 </div></br>
					 
					 <div class="wellwhite" id="L10">	
					
					 <div> <a href="javascript:void(0)" onclick="Toogle1(this.id);" class="btn btn-minimize btn-round" id="Anexos-L10"><i class="icon-chevron-up"></i> Ocultar</a>	</div></br>					
                      
											   
				  
				<div class="box-proyecto" style="display:" id="BOX-L10">
  		
	                       <div id="left">              
                                <!-- Box -->
				                 <!--#BTNADJUNTARANEXOS#-->	
								
							</div>	
							
							<!-- Table -->
					<div id="results-panel3" style="position: relative;min-height:250px !important;">
					</div>
					<!-- Table -->		
								
	           </div>  </br>
	   						   
			         
				 <!--COMENTARIOS DE ANEXOS -->
		             	 
						 <!--#COMENTARIOSTABANEXOS#-->
					
                 <!--FIN COMENTARIOS -->  				
	   
	   </div><!--fin wellwhite-->
	   
	                    <!-- Pagging -->
                        <div class="pagging" style="border-top:1px solid #BBBBBB;">
                        <div class="right">        
                        </div>
						</div>
						<!-- End Pagging -->    
	   
	 </div> <!--fin box-->	 
														
															  
								
							  </fieldset>					
						   </div>				
						<!--FIN ANEXOS -->					
					   </div>
                    </div>
                      <!--FIN CONTENT 10-->
					  
					  <!--INICIO CONTENT 11-->
                    <div class="tab-pane" id="tab11">
                       <div class="box-content">
					    <!--INICIO COMENTARIOS GENERALES -->
						   <div class="form-horizontal">
					 								
								<div class="box" id="L11">  
					<div class="box-head" >
					     <h2 class="left">&nbsp;Comentarios Generales</h2>			         		 
					 </div>
					 
					 <div class="wellwhite" id="L11">	
					
					   <div class="box-icon" align="right">
						  <span style="float: right; position:relative; left:-10px;" class="notification">#NR#</span>
						  
<a href="javascript:void(0)" onclick="ToogleGral(this.id);" class="btn btn-minimize btn-round" id="BTNTOGRAL"><i class="icon-chevron-up"></i> Comentarios</a>						
                           </div> 
						   
				   <div  id="BOXCOMENTGRALES" style="display: block">
					<!-- COMENTARIOS GENERALES DEL PROYECTO-->
                     
                                <!--#COMENTARIOSGENERALESTABCOMENTRALES#-->
					<!-- FIN COMENTARIOS GENERALES DEL PROYECTO-->			
								
                      </br> </br>
					   
                   </div>  				
	   
	   </div><!--fin wellwhite-->
	   
	                    <!-- Pagging -->
                        <div class="pagging" style="border-top:1px solid #BBBBBB;">
                        <div class="right">        
                        </div>
						</div>
						<!-- End Pagging -->    
	   
	 </div> <!--fin box-->	 							
								
								
					 
					 	
								
			      </fieldset>					
						   </div>				
						<!--FIN COMENTARIOS GENERALES -->					
					   </div>
                    </div>
                      <!--FIN CONTENT 11-->				  
					  
                    
                    </div><!--  </form>-->
					<!--END CONTENT-->
                    
					
					 <!-- Pagging -->
						
                        <div class="pagging" style="border-top:1px solid #BBBBBB;">
              		
                        <div class="right">
						
                        <!--#BTNSALIR#-->	 
						<!--#BTNENVIARPROP#-->
						<!--#BTNENVIAREVISION#-->
						  
                        </div>
                        
						</div>
              
						<!-- End Pagging -->
					
					
				</div>
				<!-- End Box -->           
                          