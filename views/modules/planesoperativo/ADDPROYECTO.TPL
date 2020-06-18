 <script src="skins/default/js/proyectos/addproyecto.js"></script>
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
							<p><div id="bodyAlerta">El plan estrategico se ha guardado correctamente.</div></p>
</div>



				<div class="box">
					<!-- Box Head -->
					<div class="box-head">
						<h1 class="left">Crear Propuesta de Proyecto</h1>
						<span class="right">#LABELESTADO#</span>						
						<br>
						<p>Formato de presentaci&oacute;n de proyectos RUA. 
						</p>
						
					</div>
					<!-- End Box Head -->	
             
                    
                    <!-- Pagging -->
						
                     
                      
                        <div class="pagging">
                        
                        <div class="left">
                    <i class="icon-asterisk"></i>
                   Indica un campo obligatorio.
				   </div>
                         
                        <div class="right">
                        
                           <a href="?execute=principal&method=default&Menu=F1&SubMenu=SF11#&p=1&s=25&sort=1&q=" class="btn btn-large"><i class="icon-thumbs-down"></i> Salir</a>
						  <!--#BTNGUARDAR#-->
						  <!--#BTNENVIARPROP#-->
                                                
                        </div>
                        
						</div>
              
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
							<legend>&nbsp;1.   Resumen Ejecutivo</legend></br>					   
				 
				           <input type="hidden" value="#IDPROYECTO#" id="idProyecto" name="idProyecto" />
							 <input type="hidden" value="#ESTADO#" id="estado" name="estado" />
							  <input type="hidden" value="#EDITARCHIVO#" id="editArchivo" name="editArchivo" />
							
							
							<div class="control-group">
                            
								<label for="focusedInput" class="control-label"><i class="icon-asterisk"></i>1.1  Nombre del Proyecto:</label>
								<div class="controls">
								  <input type="text" value="#PROYECTO#" style="width:500px;" name="nomProyecto" id="nomProyecto" class="input-xlarge focused">
								</div>
							  </div>
							  
							  <div class="control-group">
                            
								<label for="focusedInput" class="control-label"><i class="icon-asterisk"></i>Folio:</label>
								<div class="controls">
								  <input type="text" value="" style="width:60px;" name="" id="" class="input-xlarge focused">
								</div>
							  </div>
							  							
							
							<div class="control-group">
								<label for="focusedInput" class="control-label">1.2  Descripci&oacute;n:</label>
								<div class="controls">
				<textarea id="descripcion" name="descripcion" class="cleditor" rows="3" style="width: 800px; height: 140px;">#DESCRIPCION#</textarea>
								</div>
							  </div>
							  </br>
							  
							  <div class="control-group">
								<label for="focusedInput" class="control-label">1.3  Contribuye a los Objetivos del Plan Estratégico:</label>
								<div class="controls">								  
                        S&iacute;&nbsp;<input type="radio" #CONTRIBUYE#  value="1"  name="contPE" class="input-xlarge focused">		
                                  	  No&nbsp;<input type="radio" #NOCONTRIBUYE# value="0"   name="contPE" class="input-xlarge focused">	
		                                  
								</div>
							 </div>
							 
							 
							 <div class="control-group">
								<label for="focusedInput" class="control-label">1.4  Está en el plan Operativo del año:</label>
								<div class="controls">
								  
                                  S&iacute;&nbsp;<input type="radio"  value="1" #ESTAENPO#  name="estaEnPO" class="input-xlarge focused">	  No&nbsp;<input type="radio"  value="0" #NOESTAENPO# name="estaEnPO"  class="input-xlarge focused">
								</div>
							 </div></br>
							 
							  <div class="control-group">
								<label for="focusedInput" class="control-label">1.5  Está incluido en el presupuesto del año:</label>
								<div class="controls">
								  
                                  S&iacute;&nbsp;<input type="radio" #INC_PRESUPUESTO# value="S" name="estaPpto" class="input-xlarge focused">
                                  	  No&nbsp;<input type="radio" #NOINC_PRESUPUESTO# value="N" name="estaPpto" class="input-xlarge focused">                
									   Una parte&nbsp;<input type="radio" #PINC_PRESUPUESTO# value="P" name="estaPpto" class="input-xlarge focused">
                                  
								</div>
								
							 </div>
							 
							 <div class="control-group">
								<label class="control-label" for="appendedPrependedInput"><i class="icon-asterisk"></i>1.6  Total de Inversi&oacute;n:</label>
								<div class="controls">
								  <div class="input-prepend input-append">
									<span class="add-on">$</span><input id="totalInv" name="totalInv" size="16" type="text" class="comboNum" value="#TOTALINV#" style="width:100px;"><span class="add-on">.00</span>
								  </div>
								</div>
							  </div>
							 		
									<div class="control-group">
								<label for="focusedInput" class="control-label ">1.7 Fuentes de financiamiento:</label>
						</div>				  
							  <!--<div><h2>  Fuentes de financiamiento:</h2></div><br/><br/>-->
							  
							  
							 							  
							   <div class="control-group">
								<label for="focusedInput" class="control-label ">Interna:</label>
								<div class="controls">
								 
                                  S&iacute;&nbsp;<input type="radio" id="interna" value="1" #FINVERSION_INTERNA# name="interna" class="input-xlarge focused">
                                  	  No&nbsp;<input type="radio" id="interna2" #NOFINVERSION_INTERNA# value="0" name="interna" class="input-xlarge focused">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
												
								  <div class="input-prepend input-append" id="ftes" #STYLEFTESMONTO#>
									<span class="add-on">$</span><input id="ftesInvIntMonto" value="#MONTOINVI#" name="ftesInvIntMonto" size="11" type="text" class="comboNum" style="width:100px;"><span class="add-on">.00</span>									
									
								  </div>	</br>
								  <div id="ftesIntCheck" #STYLEFTES#">
								  <label class="checkbox">
                                      <input type="checkbox" id="CHK-I1"  #PRESUPUESTO#  onclick="ver_ocultarCheckInvInterna(this.id);" name="ftesInvInt_array[]" value="Presupuesto">
                                          Presupuesto
                                   </label>	
								   <label class="checkbox">
                                      <input type="checkbox" id="CHK-I2" #AHORRO# onclick="ver_ocultarCheckInvInterna(this.id);" name="ftesInvInt_array[]" value="ahorro">
                                          Ahorro
                                   </label>
								   <label class="checkbox">
                                      <input type="checkbox" id="CHK-I3" #SUBEJERCICIO# onclick="ver_ocultarCheckInvInterna(this.id);" name="ftesInvInt_array[]" value="Subejercicio">
                                          Subejercicio
                                   </label>	
								   <label class="checkbox">
                                      <input type="checkbox" id="CHK-I4" #TRASPASO# onclick="ver_ocultarCheckInvInterna(this.id);" name="ftesInvInt_array[]" value="Traspaso">
                                          Traspaso
                                   </label>	
								   <label class="checkbox">
                                      <input type="checkbox" id="CHK-I5" #AMPLIACION# onclick="ver_ocultarCheckInvInterna(this.id);" name="ftesInvInt_array[]" value="ampliacion">
                                          Ampliación
                                   </label>	
								   
								 </div> 		                                 
                                  
								</div>
								
							
								
						 </div></br></br>				 
							 
							 <div class="control-group">
								<label for="focusedInput" class="control-label">Externa:</label>
								<div class="controls">
								  
                                  S&iacute;&nbsp;<input type="radio" id="externa" value="1" #FINVERSION_EXTERNA# name="externa" class="input-xlarge focused">
                                  	  No&nbsp;<input type="radio" id="externa2"  value="0" #NOFINVERSION_EXTERNA# name="externa" class="input-xlarge focused"> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;	
								  <div class="input-prepend input-append" id="ftes2" #STYLEFTESE#>
									<span class="add-on">$</span><input id="ftesInvExtMonto" name="ftesInvExtMonto" size="11" type="text" class="comboNum" value="#MONTOINVE#" style="width:100px;"><span class="add-on">.00</span>
								  </div>
								  </br>
								  <div id="ftesExtCheck" #STYLEFTESMONTOE#>
								     
                               <label class="">
                                      <input type="checkbox"  name="ftesInvExt_array[]" #DONATIVOPRES# value="Donativopres" id="CHK-E1" onclick="ver_ocultarCheckInvExterna(this.id);">
                                          Donativo presupuestado
                                   		</label></br></br>	
								   		<label class="checkbox ">
                                      <input type="checkbox" name="ftesInvExt_array[]" #DONATIVONOPRES# value="" id="CHK-E2" onclick="ver_ocultarCheckInvExterna(this.id);">
                                   	      Donativo no presupuestado
                                 		  </label></br></br></br>
								  	 <label class="checkbox">
                                      <input type="checkbox" name="ftesInvExt_array[]" #CREDITO# value="credito" id="CHK-E3" onclick="ver_ocultarCheckInvExterna(this.id);">
                                  	        Crédito
                                 	  </label>	</br>
									   <label class="checkbox">
                                      <input type="checkbox" name="ftesInvExt_array[]" #OTROS# value="" id="CHK-E4" onclick="ver_ocultarCheckInvExterna(this.id);">
                                  	        Otros
                                 	  </label>	
								   </div>
								


								
							  								  
								</div>
							 </div><br/>
							 
							  <div class="control-group">
                            
								<label for="focusedInput" class="control-label">1.8  Tiempo estimado de Ejecuci&oacute;n:</label>
								<div class="controls">
								  <input type="text" value="#TIEMPO_EJECUCION#" style="width:800px;" name="tEjecucion" id="tEjecucion" class="input-xlarge focused">
								</div>
								
							  </div>
							  <p>1.9 Seleccione el nivel principal al que pertenece el proyecto dentro de la jerarquia institucional.</p></br>
							<div class="control-group">
                              <div class="controls">
                              #NODOSPRINCIPAL#
                              </div>
                              </div>
					   </br></br>
							  
			  <!--COMENTARIOS DE LA PESTAÑA  DEL RESUMEN -->
			  
		             	 <!--#COMENTARIOSTABRESUMEN#-->
					
                 <!--FIN COMENTARIOS --> 	
					   				 
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
							<legend>&nbsp;2.   Identificación del Proyecto</legend>
							<p style="padding:10px; background:#F5F5F5; border: 1px solid rgba(0, 0, 0, 0.05);">Este apartado tiene por objetivo identificar los datos más relevantes del proyecto y está compuesto por 4 puntos.</p></br></br>
							
							<div class="control-group">
								<label for="focusedInput" class="control-label">2.1 Antecedentes:&nbsp;<i class="icon-question-sign" title="En este apartado se debe recoger de forma sintética información sobre los antecedentes, todos los aspectos internos y externos que dieron origen al proyecto." data-rel="tooltip"></i></label>
								  <div class="controls">
				<textarea id="antecedentes" name="antecedentes" class="cleditor" rows="3" style="width: 800px; height: 140px;">#ANTECEDENTES#</textarea>
								  </div>
							     </div>	
							<br/>						
						<div>	<div class="control-group"><label for="focusedInput" class="control-label">2.2 Justificación</label></div>
											
			<br/>
			
			 <div class="control-group">
								<label for="focusedInput" class="control-label">2.2.1 Identidad y Misión Institucional:&nbsp;<i class="icon-question-sign" title="Este punto describe la justificación de la propuesta desde la Identidad y Misión institucional y expresa en síntesis la conveniencia estratégica para llevar acabo el proyecto. Brevemente se resuman pros y contras del mismo." data-rel="tooltip"></i></label>
								  <div class="controls">
				<textarea id="iMI" name="iMI" class="cleditor" rows="3" style="width: 800px; height: 140px;">#IMI#</textarea>
								  </div>
							     </div>	
							<br/>
			
				<div>	<div class="control-group"><label for="focusedInput" class="control-label">2.2.2 Alineaci&oacute;n al plan Estratégico, Plan Operativo Anual y Presupuesto:&nbsp;<i class="icon-question-sign" title="Se describe de qué manera el proyecto está vinculado con el plan estratégico de la universidad, su plan operativo u el presupuesto anual." data-rel="tooltip"></i></label></div>	</br>		
			<!--<div><h2>2.2.2 Alineaci&oacute;n al plan Estratégico, Plan Operativo Anual y Presupuesto:</h2></div><br/><br/>-->
			                       
								  <!--inicio plan e y o-->
						<div class="control-group"><label for="focusedInput" class="control-label">2.2.2.1:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label></div>			 
								  <div class="control-group">
								<label for="focusedInput" class="control-label">  ¿Qué Plan Estratégico?:</label>
								<div class="controls">								  
                        S&iacute;&nbsp;<input type="radio" #RDOPLANE# onclick="AsignarPlanEstrategico(false);" value="1" name="contPlanE" class="input-xlarge focused">			
						
                                  	  No&nbsp;<input type="radio" value="0" #NORDOPLANE# id="contPlanE" name="contPlanE" class="input-xlarge focused">	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="hidden" value="#HIDDENPE#" id="idPlanE" name="idPlanE" >
									  
		  <div class="input-prepend input-append" #STYLEDISPLAYPE# id="plan">
			<input type="text"  readonly="readonly" value="#PLANE#" style="width:400px;" name="planE" id="planE" class="input-xlarge focused" >&nbsp;&nbsp;<button  class="btn btn-small" onclick="AsignarPlanEstrategico(false);return false;"><i class="icon-book"></i>Cambiar</button>			
					
		  </div>                                 
								</div>
							 </div>
							 
							  <div class="control-group">
								<label for="focusedInput" class="control-label">  ¿Qué plan Operativo?:</label>
								<div class="controls">
								  
                                  S&iacute;&nbsp;<input type="radio" #RDOPLANO#  value="1" onclick="AsignarPlanOperativo(false);" name="estaEnplanO" class="input-xlarge focused">
                                  	  No&nbsp;<input type="radio" value="0" #NORDOPLANO# id="estaEnplanO"  name="estaEnplanO" class="input-xlarge focused">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="hidden" value="#HIDDENPO#" id="idPlanO" name="idPlanO" >
			 <div class="input-prepend input-append" id="plan2" #STYLEDISPLAYPO# >
			 
			<input type="text"  readonly="readonly" value="#PLANO#" style="width:400px;" name="planO" id="planO" class="input-xlarge focused" >&nbsp;&nbsp;<button  class="btn btn-small" onclick="AsignarPlanOperativo(false);return false;"><i class="icon-book"></i>Cambiar</button>			
					
			</div>
								</div>
							 </div> <!--fin plan e y o-->
							 	
							 </br>
							 <!---->
							
					 <!--====================Lineas Estrategicas, objetivos y resultado=====================-->
                    
              
                      
  <div id="tablaEstrategica" class="wellstrong" >
                         
   <table width="100%">
       <tbody>
	    <tr id="lineaEstrategica">
	   	<td colspan="2"><b><font size="2">¿Qué línea Estratégica?</font></b>
		
		<select style="width:100%;" id="idLineaE" #DISLINEAE# name="lineaE" value="" onChange="buscarObjetivosE_Res();return false;" >
			#LINEAE#
		</select>
		</td>
		
	   </tr>
	   <tr id="ObjetivosE">
	   	<td colspan="2"><b><font size="2">¿Qué Objetivo Estratégico?</font></b>
		
		<select style="width:100%;" #DISOBJE#  id="idObjE" onChange="obtenerResultados();return false" > 
		    #OBJE#
		
		</select>
		</td>
		
	   </tr>
	   
	   <tr>
       <td><b><font size="2">¿Qué Resultado?</font></b></td>      
       </tr>
                    
       <tr>
       <td width="70%">  
	   <select style="width:100%;" id="idResultado" #DISRESULTADO# name="resultado"> 
		   #RESULTADO#
		
		</select> 
		
       </td>   
      
       </tr>
       </tbody></table> 
	   
	   
	   </div>				 
							 <!---->
							 </br>
							 
							  <div class="control-group">
								<label for="focusedInput" class="control-label">¿De qué manera contribuye el proyecto a la línea y objetivo estratégicos?:</label>
								  <div class="controls">
				<textarea id="contLineaObj" name="contLineaObj" class="cleditor" rows="3" style="width: 800px; height: 140px;">#CONT_PROYECTO#</textarea>
								  </div>
							     </div>	
							<br/></br>			 							  
							<!--<div class="control-group"><label for="focusedInput" class="control-label">2.2.2.2:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label></div>	  
								<div>2.2.2.2 </div><br/><br/>  
								
								 <div class="control-group">
								<label for="focusedInput" class="control-label">  ¿El Proyecto está considerado dentro del presupuesto anual?:</label>
								<div class="controls">
								  
                                  S&iacute;&nbsp;<input type="radio" #SICONS_PRESUPUESTO# value="S"  id="estaPresAnual" name="estaPresAnual" class="input-xlarge focused">
                                  	  No&nbsp;<input type="radio" value="N" #NOCONS_PRESUPUESTO# checked="checked" id="estaPresAnual2"  name="estaPresAnual" class="input-xlarge focused">&nbsp;&nbsp;&nbsp;
									  Una parte&nbsp;<input type="radio" value="P" #PCONS_PRESUPUESTO# id="estaPresAnual3"  name="estaPresAnual" class="input-xlarge focused" value="P"></br>		
								</div>
								
							 </div></br>
							 
							 <div class="control-group" id="ver2" style="display: none">
								<label class="control-label" for="appendedPrependedInput">Monto presupuestado</label>
								<div class="controls">
								  <div class="input-prepend input-append">
									<span class="add-on">$</span><input id="mtoPres" value="#MONTO_PRESUPUESTADO#" class="comboNum" name="mtoPres" size="16" type="text" style="width:100px;display: "><span class="add-on">.00</span>
								  </div>
								</div>
							  </div>
							   <div class="control-group"  id="ver3" style="display:none ">
							 <label for="focusedInput" class="control-label">partida:</label>
								<div class="controls">
					 <input type="text" id="partida" name="partida" value="#PARTIDA#" class="cleditor" rows="3" style="width: 800px; height: 140px;"/>
								</div>
						 </div>			    
							 
							 <div class="control-group"  id="ver4" style="display: ">
							 <label for="focusedInput" class="control-label">Implicaciones en el presupuesto anual:</label>
								<div class="controls">
					 <textarea id="iPA" name="" class="cleditor" rows="3" style="width: 800px; height: 140px;">#IMPLICACIONES#</textarea>
								</div>
						 </div><legend></legend>	-->				
						 
						 </br>
							 
							 
							 </br></br>
							  <div class="control-group">
							 <label for="focusedInput" class="control-label">2.2.3 Protocolos, normas, estatutos institucionales:&nbsp;<i class="icon-question-sign" title="Descripción de cómo el proyecto se apega a los protocolos, normas y estatutos institucionales vigentes y definir a cuál de ellos de manera específica. Para obtener información sobre las normas vigentes, se pueden consultar con las instancias superiores de la universidad o con la Secretaría Ejecutiva de la RUA" data-rel="tooltip"></i></label>
								<div class="controls">
					 <textarea id="pNEstatutos" name="pNEstatutos" class="cleditor" rows="3" style="width: 800px; height: 140px;">#PROTOCOLOS#</textarea>
								</div>
						 </div>	</br></br>	
							<div class="control-group">
							 <label for="focusedInput" class="control-label">2.3  Objetivo General y Objetivos específicos:&nbsp;<i class="icon-question-sign" title="El objetivo del un proyecto es lo que se pretende obtener con la realización de un proyecto. El objetivo general, por su propio carácter, es general y por lo tanto de difícil evaluación. Su principal ventaja es que nos permite tener una idea de lo que el proyecto pretende conseguir y de su orientación. Por lo anterior resulta necesario establecer objetivos con un mayor grado de concreción, llamados objetivos específicos, que pueden ejecutarse, medirse y evaluarse con mayor facilidad." data-rel="tooltip"></i></label>
							 </div>
							 
							<div class="control-group">
							 <label for="focusedInput" class="control-label">Objetivo General</label>
								<div class="controls">
					 <textarea id="objGral" name="objGral" class="cleditor" rows="3" style="width: 800px; height: 140px;">#OBJETIVO_GENERAL#</textarea>
								</div>
						 </div></br></br>
						 
						 <!--inicio Objetivos Especificos-->
						 
						 <div class="well">
       <table width="100%">
        <tbody><tr>
        <td width="30">&nbsp;&nbsp;&nbsp;	</td>
        <td>Objetivos Específicos:</td>        
        </tr> 
		 #OBJETIVOSESPECIFICOS#     
        </tr>
                    
        <tr>	
        <td colspan="2">
        <div style="margin-left:30px;" class="left">           
        <button style="float:left; margin-right:10px;" onclick="EliminarObjetivo();return false;" id="BEP" disabled="disabled" class="btn btn-small"><i class="icon-remove"></i> Eliminar Objetivo</button>
                    
		
         <button onclick="AgregarObjetivo();return false;" id="BAP" class="btn btn-small"><i class="icon-plus"></i>Agregar Objetivo</button>				
		</div>            
        </td>
        </tr>
        </tbody></table>
        </div>
		#SCRIPT# 
		</br></br></br>						 
						 <!--Fin de Objetivos Especificos-->
						 <div class="control-group">
							 <label for="focusedInput" class="control-label">2.4  Descripción y características del proyecto&nbsp;<i class="icon-question-sign" title="Aquí se describe detalladamente el proyecto, las etapas que seguirá, los servicios y/o productos que se proporcionarán  y todo aquello que sea necesario para la mejor comprensión del proyecto." data-rel="tooltip"></i></label></div>
						 <div class="control-group">
							 <label for="focusedInput" class="control-label"></label>
								<div class="controls">
					 <textarea id="dCProyecto" name="dCProyecto" class="cleditor" rows="3" style="width: 800px; height: 140px;">#CARACTERISTICAS#</textarea>
								</div>
						 </div></br></br>
						 <div class="control-group">	
						  <label for="focusedInput" class="control-label">2.5  Participantes en el proyecto (Socios/Aliados):&nbsp;<i class="icon-question-sign" title="Describir otras instituciones, personas instancias que realizan aportes técnicos intelectuales, de relaciones o contactos, financieros al proyecto, detallando las caracteristicas d elos mismos." data-rel="tooltip"></i></label>						
						</div>
						 
						  <div class="control-group">	
						  <label for="focusedInput" class="control-label"></label>						
								<div class="controls">
								
								 <textarea id="participantes" name="participantes" class="cleditor" rows="3" style="width: 800px; height: 140px;">#PARTICIPANTES#</textarea>
								</div>
						 </div><br/><br/>
						 
				 <!--COMENTARIOS DE LA PESTAÑA IDENTIFICACION DEL PROYECTO-->
				 
		             	 <!--#COMENTARIOSTABIDENT#-->
					
                 <!--FIN COMENTARIOS --> 				
					 
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
						  <form enctype="multipart/form-data" name="frmadjunto1" class="frmadjuntos" method="post" id="frmadjunto1" action="?execute=proyectos/addproyecto&method=UploadFile&numFrm=1" target="iframe-post-form">  
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
									   <legend>&nbsp;3.   Análisis de Mercado<!--&nbsp;<i class="icon-question-sign" title="El objetivo de este apartado es proporcionar un panorama general del mercado, que permita identificar aquellos aspectos que pueden influir en el proyecto." data-rel="tooltip"></i>--></legend>
 <p style="padding:10px; background:#F5F5F5; border: 1px solid rgba(0, 0, 0, 0.05);">El objetivo de este apartado es proporcionar un panorama general del mercado, que permita identificar aquellos aspectos que pueden influir en el proyecto.</p> 
 
 						   
									   <div id="left">              
                                <!-- Box -->
				                  <div class="box">
					                <!-- Box Head -->
					                 <div class="box-head" style="height:60px;">
									 <p>Anexar documentos que puedan apoyar el Análisis de Mercado
				&nbsp; <button type="button" onClick="uploadEditFiles('1',false);return false;" class="btn btn-small btn-warning"><i class="icon-upload icon-white"></i>&nbsp;Adjuntar Archivo</button>
									 </p>
									 
									 
					                  </div>
				                   </div>	
								
							           </div>	
									   <!-- Table -->
					<div id="results-panel" style="position: relative;min-height:100px !important;">
					</div>
					<!-- Table -->	
									   
						<div class="control-group">
							 <label for="focusedInput" class="control-label">3.1 Aspectos Generales del Mercado:</label>
						</div>			   
									   
									   <!--<div><h2>Aspectos Generales del Mercado:</h2></div></br></br>-->
								<div class="control-group">
							 <label for="focusedInput" class="control-label">3.1.1  Proveedores:&nbsp;<i class="icon-question-sign" title="Estudio de calidad, cantidad, oportunidad de la recepción insimos, etc.." data-rel="tooltip"></i></label>
								    <div class="controls">
								 <textarea id="proveedores" name="proveedores" class="cleditor" rows="3" style="width: 800px; height: 140px;">#PROVEEDORES#</textarea>
								    </div>
						         </div></br>
								 
								 <div class="control-group">
							 <label for="focusedInput" class="control-label">3.1.2 Oferta:&nbsp;<i class="icon-question-sign" title="Diagnóstico detallado de la oferta y na descripción de las variables que afectan, incluyendo el análisis de los bienes o servicios relacionados, entre otros. Competidores, dimensión de las empresas que ofrecen servicios o productos similares, número de empresas existentes, tipos de productos ofrecidos." data-rel="tooltip"></i></label>
								    <div class="controls">
								 <textarea id="oferta" name="oferta" class="cleditor" rows="3" style="width: 800px; height: 140px;">#OFERTA#</textarea>
								    </div>
						         </div></br>
								 
							 <div class="control-group">
							   <label for="focusedInput" class="control-label">3.1.3  Demanda&nbsp;<i class="icon-question-sign" title="Diagnóstico detallado de la oferta y na descripción de las variables que afectan, incluyendo el análisis de los bienes o servicios relacionados, entre otros. Evolución de la demanda, estacionalidad de la demanda, información sobre las caracteristicasde los poteciales consumidores de los servicios del proyecto, perfil del prospecto al que se pretende llegar." data-rel="tooltip"></i></label>
								    <div class="controls">
								 <textarea id="demanda" name="demanda" class="cleditor" rows="3" style="width: 800px; height: 140px;">#DEMANDA#</textarea>
							       </div>	<br/><br/>							   
						      </div><legend></legend><br/><br/>
							  
							   <div class="control-group">
							   <label for="focusedInput" class="control-label">3.2 Balance Oferta-Demanda&nbsp;<i class="icon-question-sign" title="Balance final entre oferta y demanda, en qué medida la nueva oferta promovida por el proyecto va a ser absorbida por la demanda existente o que se pueda crear y en qué periodo de tiempo." data-rel="tooltip"></i></label>
								    <div class="controls">
								 <textarea id="balOfertaDeman" name="balOfertaDeman" class="cleditor" rows="3" style="width: 800px; height: 140px;">#BOFERTA#</textarea>
							       </div>								   
						      </div><br/>
							  
							   <div class="control-group">
							   <label for="focusedInput" class="control-label">3.3 Sistema de precios&nbsp;<i class="icon-question-sign" title="Precios o tarifas de los servicios que propone el proyecto en función de sus costos, calidad, precios de competidores, productos sustitutos, etc. tanto a nivel regional, nacional y en el área de influencia del proyecto." data-rel="tooltip"></i></label>&nbsp;
								    <div class="controls">
								 <textarea id="sPrecios" name="sPrecios" class="cleditor" rows="3" style="width: 800px; height: 140px;">#SPRECIOS#</textarea>
							       </div>								   
						      </div><br/><br/>
							 <div class="control-group">
							   <label for="focusedInput" class="control-label">3.4 Promoción. Estrategias de promoción del proyecto:</label>
								    </div>  
							  <!--<div><span><h2>3.4 Promoción. Estrategias de promoción del proyecto:</h2></span></div></br></br>-->
							  
							   <div class="control-group">
							   <label for="focusedInput" class="control-label">3.4.1Canales de Distribución&nbsp;<i class="icon-question-sign" title="Medios por los que hará la entregade los servicios del proyecto." data-rel="tooltip"></i></label>
								    <div class="controls">
								 <textarea id="canalDist" name="canalDist" class="cleditor" rows="3" style="width: 800px; height: 140px;">#CDISTRIBUCION#</textarea>
							       </div>								   
						      </div><br/>
							  
							   <div class="control-group">
							   <label for="focusedInput" class="control-label">3.4.2Promoción&nbsp;<i class="icon-question-sign" title="Medios por los que se hará la promoción de los servicios y/o productos del proyecto: mailing dirigido, folletos, revistas, anuncios en prensa, radio y Tv, páginas web.." data-rel="tooltip"></i></label>
								    <div class="controls">
								 <textarea id="promocion" name="promocion" class="cleditor" rows="3" style="width: 800px; height: 140px;">#PROMOCION#</textarea>
							       </div>								   
						      </div><br/></br></br></br>
							  
							   <div class="control-group">
							   <label for="focusedInput" class="control-label">3.5 Descripción de las fuentes de Información y metodología utilizada</label>
								    <div class="controls">
								 <textarea id="ftesInf" name="ftesInf" class="cleditor" rows="3" style="width: 800px; height: 140px;">#FINFORMACION#</textarea>
							       </div>								   
						      </div><br/></br></br>
							  
			  <!--COMENTARIOS DE LA PESTAÑA  ANÁLISIS DE MERCADO-->
			  
		             	<!--#COMENTARIOSTABANALISISM#-->
					
                 <!--FIN COMENTARIOS --> 						  
							  
							  									
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
										<legend>&nbsp;4.   Aspectos Técnicos</legend>
										    <div class="control-group">
							 <label for="focusedInput" class="control-label">4.1 Localización y área de influencia del proyecto&nbsp;<i class="icon-question-sign" title="Describir si el proyecto se localiza dentro del campus y en qué lugar específico. Si se localiza fuera del campus, describir dónde, si el lugar es prestado, rentado, donado, etc." data-rel="tooltip"></i></label>
							 <div class="controls">
								 <textarea id="localizacion" name="localizacion" class="cleditor" rows="3" style="width: 800px; height: 140px;">#LOCALIZACION#</textarea>
							 </div>
					     </div>	<br/>						 
						 
						  <div class="control-group">
							 <label for="focusedInput" class="control-label">4.2 Disponibilidad de Recursos:<i class="icon-question-sign" title="En este apartado se describen los recursos que se disponen para la realización del proyecto, tanto desde el punto de vista de los recursos humanos disponibles como de las tecnología. ¿Cuántas personas están involucradas en el proyecto? ¿Cuál es su nivel de calificación profesional? ¿Se necesitan personas externas? ¿Se cuenta con tecnología necesaria?" data-rel="tooltip"></i></label>
							 <div class="controls">
								 <textarea id="dispRecursos" name="dispRecHumanos" class="cleditor" rows="3" style="width: 800px; height: 140px;">#DRECURSOS#</textarea>
							 </div>
					     
					     </div><br/></br>
							  
			  <!--COMENTARIOS DE LA PESTAÑA  ASPECTOS TÉCNICOS-->
		             	 
						 <!--#COMENTARIOSTABASPECTOST#-->
					
                 <!--FIN COMENTARIOS --> 			
										
									</fieldset>									
								 </div>		 
							 <!--FIN ASPECTOS TÉCNICOS-->					
					</div>
                    </div>
                    <!--FIN CONTENT 4-->
					
					 <!--INICIO CONTENT 5-->
                    <div class="tab-pane" id="tab5">
                     <div class="box-content">
						  <!--INICIO ASPECTOS LEGALES-->
						    <div class="form-horizontal">
								<fieldset>
									<legend>&nbsp;5.   Aspectos Legales</legend></br>
									     
										 <div class="control-group">
					 <label for="focusedInput" class="control-label">5.1  Consideraciones Legales:&nbsp;<i class="icon-question-sign" title="cualquier aspecto notarial, descripción de los convenios o licencias que se firmarán, etc." data-rel="tooltip"></i></label>
							 
			<div class="controls">	
			<textarea id="consLegales" name="consLegales" class="cleditor" rows="3" style="width: 800px; height: 140px;">#CLEGALES#</textarea>
			 </div>
					   </div></br></br>
					   
			          <div class="control-group">
							 <label for="focusedInput" class="control-label">5.2  
							 Consideraciones Jurídicas&nbsp;<i class="icon-question-sign" title="Análisis de riesgos o cualquier otra eventualidad de tipo jurídico para la universidad y sus funcionarios; compromisos derechos y obligaciones de la universidad." data-rel="tooltip"></i></label>
							 <div class="controls">
								 <textarea id="consJuridicas" name="consJuridicas" class="cleditor" rows="3" style="width: 800px; height: 140px;">#CJURIDICAS#</textarea>
							 </div>
					     </div><br/></br>
						  <div class="control-group">
							 <label for="focusedInput" class="control-label">5.3  Consideraciones patrimoniales&nbsp;<i class="icon-question-sign" title="Descripción de la forma societaria, integración accionaria, etc. afectación de terrenos, edificios o propiedades de la universidad." data-rel="tooltip"></i></label>
							 <div class="controls">
								 <textarea id="consPatrimoniales" name="consPatrimoniales" class="cleditor" rows="3" style="width: 800px; height: 140px;">#CPATRIMONIALES#</textarea>
							 </div>
					     </div><br/></br>
				 <!--COMENTARIOS DE LA PESTAÑA ASPECTOS LEGALES -->
		             	 
						<!--#COMENTARIOSTABASPECTOSL#-->
					
                 <!--FIN COMENTARIOS --> 			
								
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
								  <legend>&nbsp; 6.  Análisis Financiero (Presupuesto de Inversiones) </legend></br>
								  
								   <div class="control-group">
<label class="control-label" for="focusedInput">6.1 Presupuesto:</label>&nbsp;<i class="icon-question-sign" title="Presentar de manera desglosada la fuente y el monto requerido para llevar a cabo el programa o proyecto." data-rel="tooltip"></i>
							<!--	<div class="controls">
								 <textarea id="planInversion" name="planInversion" class="cleditor" rows="3" style="width: 800px; height: 140px;">#PINVERSIONES#</textarea>
								</div></br>-->
							  </div>								  
								 
						<div class="control-group">
					<label for="focusedInput" class="control-label ">Fuentes de financiamiento:</label>
						</div>
						<!--<div><h2><p>Fuentes de financiamiento:</p></h2></div><br/><br/>	</div>-->
						
						 <div class="control-group">
								<label for="focusedInput" class="control-label ">Interna:</label>
								<div class="controls">
								 
                                 <span id="intSi" style="display: none"> S&iacute;&nbsp;<input type="radio" id="interna3" value="1" name="interna3" class="input-xlarge focused"></span>
                                   <span id="intNo" style="display: ">  No&nbsp;<input type="radio" id="interna4" value="0" name="interna3" class="input-xlarge focused" checked="checked"></span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
												
								  <div class="input-prepend input-append" id="ftes3" style="display: none">
									<span class="add-on">$</span><input readonly id="ftesInvIntMonto2" name="ftesInvIntMonto2" size="11" type="text" style="width:100px;"><span class="add-on">.00</span>									
									
								  </div></br></br><label id="etq"></label></br> 
								  
								  <div id="ftesIntText" style="display: none" >
								  
								<label id="LBL-I1" #LABELPRESUPUESTO#>
								   Presupuesto                                  
                                </label>	
								   <label id="LBL-I2" #LABELAHORRO#>
								   Ahorro                                    
                                   </label>
								   <label id="LBL-I3" #LABELSUBEJERCICIO#>
								    Subejercicio                                 
                                   </label>	
								    </label>
								   <label id="LBL-I4" #LABELTRASPASO#>
								    Traspaso                                 
                                   </label>
								   <label id="LBL-I5" #LABELAMPLIACION#>
								   Ampliación                                  
                                </label>	 </br>								 
								 </div>	                
                                  
											
						 </div>				 
					 </div> </br>
							 					
							 
						  <div class="control-group">	 
							  <label for="focusedInput" class="control-label" >Explicar brevemente las implicaciones de la partida </label>
							<div class="controls">
								  <textarea id="descInterna" name="descInterna"  class="cleditor" rows="3" style="width: 800px; height: 140px;">#DESC_INTERNA#</textarea>
								  </div>
							</div><br/><br/><br/>
						  
						  	 
							 
							 <div class="control-group">
								<label for="focusedInput" class="control-label">Externa:</label>
								<div class="controls">
								  
                                 <span id="extSi" style="display: none"> S&iacute;&nbsp;<input type="radio" id="externa3" value="1"  name="externa3" class="input-xlarge focused"></span>
                                  	  <span id="extNo" style="display: ">No&nbsp;<input type="radio" id="externa4" checked="checked" value="0" name="externa3" class="input-xlarge focused"></span> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;	
								  <div class="input-prepend input-append" id="ftes4" checked="checked" style="display: none">
									<span class="add-on">$</span><input id="ftesInvExtMonto2" readonly name="ftesInvExtMonto2" size="11" type="text" style="width:100px;"><span class="add-on">.00</span>
								  </div>
								  </br></br><label id="etq2"></label></br> 
								  
								    <div id="ftesExtText"   style="display: none">
								  
								 <label id="LBL-E1" #LABELDONATIVOPRES#>
								   Donativo presupuestado                                  
                                   </label>	
								   <label id="LBL-E2" #LABELDONATIVONOPRES#>
								   Donativo no presupuestado                                     
                                   </label>
								   <label id="LBL-E3" #LABELCREDITO#>
								    Credito                                 
                                   </label>	
								    </label>
								   <label id="LBL-E4" #LABELOTROS#>
								    Otros                                 
                                   </label>							   
								 </div> </br>
								 
								  <label id="" class="" >								  
                                                                               
                                   </label> 						
							  								  
								</div>
							 </div>	
							 	 
							        <div class="control-group">
					      <label for="focusedInput" class="control-label" >Explicar brevemente las implicaciones de la partida </label>				
							      <div class="controls">
								  <textarea id="descExterna" name="descExterna"  class="cleditor" rows="3" style="width: 800px; height: 140px;">#DESC_EXTERNA#</textarea>
								  </div>
							</div><br/>
							 
							 
							 
							 <div class="control-group">
								<label for="focusedInput" class="control-label ">6.2 Distribución de Inversión:&nbsp;<i class="icon-question-sign" title="Terrenos, construcción, equipamiento, vehículos, estudios, diseño, asesoría técnica, contratación de provedores, capacitación, promoción, etc." data-rel="tooltip"></i></label>
						</div>				  				
							 
							 <!--<div><h2><p>Distribución de Inversión:<i class="icon-question-sign" title="Terrenos, construcción, equipamiento, vehículos, estudios, diseño, asesoría técnica, contratación de provedores, capacitación, promoción, etc." data-rel="tooltip"></i></p></h2></div><br/><br/>-->
						
						<!-- -->
						 <div class="well">
       <table width="100%">
        <tbody><tr>
        <td width="50">&nbsp;	</td>
        <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Concepto:</td>
        <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Monto:</td>
       </tr>
	   #DISTRIBUCION_INVERSION#      
                    
        <tr>	
        <td colspan="2">
        <div style="margin-left:30px;" class="left">           
        <button style="float:left; margin-right:10px;" onclick="EliminarDistribucion();return false;" id="BED" disabled="disabled" class="btn btn-small"><i class="icon-remove"></i> Eliminar Concepto</button>
                    
		
         <button onclick="AgregarDistribucion();return false;" id="BAP" class="btn btn-small"><i class="icon-plus"></i>Agregar Concepto</button>				
		</div>            
        </td>
        </tr>
        </tbody></table>
        </div>
		#SCRIPT2#
		
		<br/><br/>					
								
			  
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
						  <form enctype="multipart/form-data" name="frmadjunto2" method="post" class="frmadjuntos" id="frmadjunto2" action="?execute=proyectos/addproyecto&method=UploadFile&numFrm=2" target="iframe-post-form">  
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
					 
					<!--  <div><h2><p>6.2  Flujo de efectivo:</p></h2></div><br/>-->
					<label class=""  for="">6.3  Evaluación Financiera:&nbsp;</label>
											<p style="padding:10px; background:#F5F5F5; border: 1px solid rgba(0, 0, 0, 0.05);">Solo si la iniversidad espera un retorno de inversión.</p></br></br></br>
							   <div class="control-group">
								<label for="focusedInput" class="control-label">Valor Presente Neto (VPN):</label>
								<div class="controls">								  
                       <!-- S&iacute; aplica&nbsp;<input type="radio" #RDOVPN# value="1" id="RDO-C1" onclick="disabledMonto(this.id);" name="vPNRadio" class="input-xlarge focused">&nbsp;		
                                  	  No aplica&nbsp;<input type="radio" value="0" #NORDOVPN# id="RDO2-C1" onclick="disabledMonto(this.id);"  name="vPNRadio" class="radio">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;	-->
									  
									  <div class="input-prepend input-append">
									<input id="TXT-C1" class="" #DISVPN# value="#VPN#" name="vPN" style="width: 630px" size="16" type="text">
								  </div>
		                                  
								</div>
							 </div>
							  <div class="control-group">
								<label for="focusedInput" class="control-label"> Relación Beneficio – Costo:</label>
								<div class="controls">								  
                       <!--  S&iacute; aplica&nbsp;<input type="radio"  #RDORBC# value="1" id="RDO-C2" onclick="disabledMonto(this.id);" name="relBenCostRadio" class="input-xlarge focused">&nbsp;		
                                  	  No aplica&nbsp;<input type="radio" value="0" #NORDORBC# id="RDO2-C2" onclick="disabledMonto(this.id);"  name="relBenCostRadio" class="radio">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;	-->
									  
									  <div class="input-prepend input-append">
									<input id="TXT-C2" #DISRBC# name="rBC" value="#RBC#" style="width: 630px" class="" size="11" type="text">
								  </div>		                                  
								</div>
							 </div>							
							  <div class="control-group">
								<label for="focusedInput" class="control-label"> Tasa Interna de Retorno (TIR):</label>
								<div class="controls">								  
                      <!--  S&iacute; aplica&nbsp;<input type="radio" #RDOTIR#  value="1" id="RDO-C3" onclick="disabledMonto(this.id);" name="tIRadio" class="input-xlarge focused">&nbsp;		
                                  	   No aplica&nbsp;<input type="radio" #NORDOTIR# value="0"  id="RDO2-C3" onclick="disabledMonto(this.id);"  name="tIRadio" class="radio">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;	-->
									  
									  <div class="input-prepend input-append">
									<input id="TXT-C3" name="tIR" class="" value="#TIR#" style="width: 630px" size="16" type="text" #DISTIR#>
								  </div>
		                                  
								</div>
							 </div>	
							 
							   <div class="control-group">
								<label for="focusedInput" class="control-label"> Punto de Equilibrio:</label>
								<div class="controls">								  
                    <!--   S&iacute; aplica&nbsp;<input type="radio" onclick="disabledMonto(this.id);" #RDOPUNTOE# value="1" id="RDO-C4" name="ptoEquiRadio" class="input-xlarge focused">&nbsp;		
                                  	   No aplica&nbsp;<input type="radio" value="0" onclick="disabledMonto(this.id);" id="RDO2-C4" #NORDOPUNTOE# name="ptoEquiRadio" class="radio">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;-->	
									  
									   <div class="input-prepend input-append">
									<input id="TXT-C4" name="ptoEqui" value="#PUNTOE#" style="width: 630Px" size="11" class="" type="text" #DISPUNTOE#>
								  </div>
		                                  
								</div>
							 </div><br/><br/><br/>
							 
							 
							 
	<label class=""  for="">6.4 Flujo de efectivo:</label></br>						 
							 
							  <div id="left">              
                                <!-- Box -->
				                  <div class="box">		
				                <!-- Box Head -->
					                 <div class="box-head" style="height:60px;">
									 <p> Adjuntar un archivo excel detallando entradas y salidas por mes.&nbsp; <button type="button" onClick="uploadEditFiles('2',false);return false;" class="btn btn-small btn-warning"><i class="icon-upload icon-white"></i>&nbsp;Adjuntar Archivo</button></p>	 
									 
					                 </div>
				                  </div>	
								
							</div>
							
							<!-- Table -->
					<div id="results-panel2" style="position: relative;">
					</div>
					<!-- Table -->
								 	<br/><br/>
				 <!--COMENTARIOS DE LA PESTAÑA ANÁNILIS FINANCIERO -->
		             	 
						 <!--#COMENTARIOSTABANALISISF#-->
					
                 <!--FIN COMENTARIOS --> 						 			
								
								
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
									<legend>&nbsp; 7.  Programa de Ejecución (etapas) (tabla de fechas, gráfica de gantt)</legend><p style="padding:10px; background:#F5F5F5; border: 1px solid rgba(0, 0, 0, 0.05);">Descripción de etapas, pasos y tiempos del proyecto.</p>
									</br>
									
									<div class="control-group" >
									#GANTT#
								    </div>
									<br/><br/>
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
							  	<legend>&nbsp;	8.  Equipo directivo y responsable</legend>
								<p style="padding:10px; background:#F5F5F5; border: 1px solid rgba(0, 0, 0, 0.05);">Descripción de persona responsable y equipo de colaboradores involucrados en el proyecto.</p></br></br>
								  <div class="control-group">
							 <label for="focusedInput" class="control-label"></label>
							 <div class="controls">
								 <textarea id="eResponsable" name="eResponsable" class="cleditor" rows="3" style="width: 850px; height: 150px;">#EDIRECTIVO#</textarea>
							 </div>
					     </div><br/><br/>
				 <!--COMENTARIOS DE LA PESTAÑA DIRECTIVO Y RESPONSABLE -->
		             	
						<!--#COMENTARIOSTABEQUIPODR#-->
					
                 <!--FIN COMENTARIOS --> 
						 
								
							  </fieldset>					
						   </div>				
						<!--FIN EQUIPO DIRECTIVO Y RESPONSABLE -->					
					   </div>
                    </div>
                      <!--FIN CONTENT 8-->
					  
					  
					  <!--INICIO CONTENT 9-->
                    <div class="tab-pane" id="tab9">
                       <div class="box-content">
					    <!--INICIO CONCLUSIONES Y RECOMEDACIONES -->
						   <div class="form-horizontal">
						   	  <fieldset>
							  	<legend>&nbsp;	 9.  Conclusiones</legend>
								   <div class="control-group">
							 <label for="focusedInput" class="control-label">Conclusiones y recomendaciones del rector</label>
							 <div class="controls">
								 <textarea id="conclusiones" name="conclusiones" class="cleditor" rows="3" style="width: 820px; height: 150px;">#CONCLUSIONES#</textarea>
							 </div>
					     </div>
						  <div class="control-group">
							 <label for="focusedInput" class="control-label">Consideraciones o comentarios de los órganos colegiados</label>
							 <div class="controls">
								 <textarea id="consideraciones" name="consideraciones" class="cleditor" rows="3" style="width: 820px; height: 150px;">#CONSIDERACIONES#</textarea>
							 </div>
					     </div><br/><br/>
				 <!--COMENTARIOS DE LA CONCLUSIONES Y RECOMEDACIONES -->
		             	 
						 <!--#COMENTARIOSTABCONCLUSIONES#-->
					
                 <!--FIN COMENTARIOS --> 
								
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
						  <form enctype="multipart/form-data" name="frmadjunto3" method="post" class="frmadjuntos" id="frmadjunto3" action="?execute=proyectos/addproyecto&method=UploadFile&numFrm=3" target="iframe-post-form">  
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
							  	<legend>&nbsp;10.  Anexos</legend>					
				
								
								
							<div id="left">              
                                <!-- Box -->
				                  <div class="box">
					                <!-- Box Head -->
					                 <div class="box-head" style="height:60px;">
									 <p>Anexar documentos que puedan apoyar la evaluación del proyecto
				&nbsp; <button type="button" onClick="uploadEditFiles('3',false);return false;" class="btn btn-small btn-warning"><i class="icon-upload icon-white"></i>&nbsp;Adjuntar Archivo</button>				
									 </p>
									 
									 
					                 </div>
				                  </div>	
								
							</div>	
							
							<!-- Table -->
					<div id="results-panel3" style="position: relative;">
					</div>
					<!-- Table -->		
								<br/><br/>
				 <!--COMENTARIOS DE ANEXOS -->
		             	 
						 <!--#COMENTARIOSTABANEXOS#-->
					
                 <!--FIN COMENTARIOS --> 
								  
								
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
					 <fieldset>
							  	<legend>Comentarios Generales</legend>	</br> 
					 
					 	  <div class="box-icon" align="right">
						  <span style="float: right; position:relative; left:-10px;" class="notification">#NR#</span>
						  
<a href="javascript:void(0)" onclick="ToogleGral(this.id);" class="btn btn-minimize btn-round" id="BTNTOGRAL"><i class="icon-chevron-up"></i> Comentarios</a>						
                           </div> 
						   
				   <div  id="BOXCOMENTGRALES" style="display: block">
					<!-- COMENTARIOS GENERALES DEL PROYECTO-->
                     
                                #COMENTARIOSGRALES#
								
								
                      </br> </br>
					   
                   </div>  
								
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
                        <a href="?execute=principal&method=default&Menu=F1&SubMenu=SF11#&p=1&s=25&sort=1&q=" class="btn btn-large"><i class="icon-thumbs-down"></i> Salir</a>
						<input type="button" id="btnGuardar1" onclick="GuardarProyecto();" class="btn-warning btn-large" value="Guardar">
                           <button class="btn btn-large btn-primary" onclick="Enviar();"><span class="icon icon-white icon-sent"></span> Enviar Propuesta</button>  
                        </div>
                        
						</div>
              
						<!-- End Pagging -->
					
					
				</div>
				<!-- End Box -->           
                  