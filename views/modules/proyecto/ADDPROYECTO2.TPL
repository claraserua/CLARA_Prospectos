 <script src="skins/default/js/proyectos/addproyecto2.js"></script>


<div id="alerta" class="alert alert-block " style="display:none;">
							<button type="button" class="close" data-dismiss="alert">×</button>
							<h4 id="headAlerta" class="alert-heading">!CORRECTO!</h4>
							<p><div id="bodyAlerta">El proyecto se ha guardado correctamente.</div></p>
</div>


				<div class="box">
					<!-- Box Head -->
					<div class="box-head">
						<h1 class="left">Crear Propuesta de Proyecto</h1><br>
						<p>Formato de presentaci&oacute;n de proyectos RUA. 
						</p>
						
					</div>
					<!-- End Box Head -->	
             
                    
                    <!-- Pagging -->
						
                     
                      
                      <div class="pagging">
						
                         <div class="left" id="menucontent">
				<!-- tabs --> 
				
				   		 <ul class="subMenu" style="margin-top:15px;">
                     		  <li ><a href="#MENUURL#">Formato de llenado 1</a></li>
                     		  <li class="active"> <a href="#">Formato de llenado 2</a></li>
                     
                   	     </ul>					 
						 
					<!-- End tabs -->			
						 
						 </div>
						 
						   
                        <div class="right">
                        <a href="?execute=principal&method=default&Menu=F1&SubMenu=SF11#&p=1&s=25&sort=1&q=" class="btn btn-large">Cancelar</a>
						<input type="button" id="btnGuardar1" onclick="GuardarProyecto();" class="btn-warning btn-large" value="Guardar">
                        </div>
                        
						</div>
              
						<!-- End Pagging -->
						
                    
                    
					<!-- Table -->
					<div class="box-content">
					
						<div class="form-horizontal">
						
						  <i class="icon-asterisk"></i> Indica un campo obligatorio.
						  
						  <form enctype="multipart/form-data" name="frmaddproyecto" method="post" id="frmaddproyecto" action="#" target="iframe-post-form">  
                          <fieldset>
							<legend>1.   Aspectos T&eacute;cnicos</legend></br>
									
								
							<input type="hidden" value="#IDPROYECTO#" id="idProyecto" name="idProyecto" />
							
							
							<div class="control-group">
                            
								<label for="focusedInput" class="control-label"><i class="icon-asterisk"></i>Nombre del Proyecto:</label>
								<div class="controls">
								  <input type="text" value="" style="width:500px;" name="nomProyecto" id="nomProyecto" class="input-xlarge focused">
								</div>
							  </div>
							  							
							
							<div class="control-group">
								<label for="focusedInput" class="control-label">Descripci&oacute;n:</label>
								<div class="controls">
				<textarea id="descripcion" name="descripcion" class="cleditor" rows="3" style="width: 500px; height: 140x;"></textarea>
								</div>
							  </div>
							  </br>
							  
							  <div class="control-group">
								<label for="focusedInput" class="control-label">Contribuye a los Objetivos del Plan Estratégico:</label>
								<div class="controls">
								  
                                  S&iacute;&nbsp;<input type="radio" checked="checked" value="1" name="contPlanE" class="input-xlarge focused">
                                  	  No&nbsp;<input type="radio" value="0" name="contPlanE" class="input-xlarge focused">
                                  
								</div>
							 </div>
							 
							 
							 <div class="control-group">
								<label for="focusedInput" class="control-label">Está en los planes Operativos del año:</label>
								<div class="controls">
								  
                                  S&iacute;&nbsp;<input type="radio" checked="checked" value="1" name="estaEnplanO" class="input-xlarge focused">
                                  	  No&nbsp;<input type="radio" value="0" name="estaEnplanO" class="input-xlarge focused">
                                  
								</div>
							 </div></br>
							 
							  <div class="control-group">
								<label for="focusedInput" class="control-label">Está incluido en el presupuesto del año:</label>
								<div class="controls">
								  
                                  S&iacute;&nbsp;<input type="radio" checked="checked" value="1" name="estaPpto" class="input-xlarge focused">
                                  	  No&nbsp;<input type="radio" value="0" name="estaPpto" class="input-xlarge focused">
                                  
								</div>
								
							 </div>
							 
							 <div class="control-group">
                            
								<label for="focusedInput" class="control-label"><i class="icon-asterisk"></i>Total de Inversi&oacute;n:</label>
								<div class="controls">
								  <input type="text" value="" style="width:80px;" name="nomProyecto" id="nomProyecto" class="input-xlarge focused">
								</div>
							  </div>
							  
							 							  
							   <div class="control-group">
								<label for="focusedInput" class="control-label">Interna:</label>
								<div class="controls">
								  
                                  S&iacute;&nbsp;<input type="radio" checked="checked" value="1" name="interna" class="input-xlarge focused">
                                  	  No&nbsp;<input type="radio" value="0" name="interna" class="input-xlarge focused">
                                  
								</div>
							 </div>
							 
							 <div class="control-group">
								<label for="focusedInput" class="control-label">Externa:</label>
								<div class="controls">
								  
                                  S&iacute;&nbsp;<input type="radio" checked="checked" value="1" name="externa" class="input-xlarge focused">
                                  	  No&nbsp;<input type="radio" value="0" name="externa" class="input-xlarge focused">
                                  
								</div>
							 </div>
							 
							 
							  
							  
							 
						
							 
							 
							 <legend>2.   Aspectos Legales</legend>
							 
							 <div class="control-group">
								<label for="focusedInput" class="control-label">Antecedentes:</label>
								<div class="controls">
				<textarea id="descripcion" name="descripcion" class="cleditor" rows="3" style="width: 500px; height: 140x;"></textarea>
								</div>
							<br />
								
							 
							  <div class="control-group">
								<label for="focusedInput" class="control-label"></i>Disponible:</label>
								<div class="controls">
								  
                                  Si&nbsp;<input type="radio" checked="checked" value="1" name="disponible" class="input-xlarge focused">
                                  	  No&nbsp;<input type="radio" value="0" name="disponible" class="input-xlarge focused">
                                  
								</div>
							 </div>
                             
                             
                             	 <legend>3.   Duraci&oacute;n</legend>
							 
							 
							 <div class="control-group">
							<label for="focusedInput" class="control-label"><i class="icon-asterisk"></i>Fecha Inicio:</label>
								<div class="controls">  
                                <input type="text" value="" readonly="readonly" style="width:130px;" name="finicio" id="finicio" class="input-xlarge focused">
								</div>
							 </div>
                             
                             
                             <div class="control-group">
							<label for="focusedInput" class="control-label"><i class="icon-asterisk"></i>Fecha Termino:</label>
								<div class="controls">  
                                <input type="text" value="" readonly="readonly" style="width:130px;" name="ftermino" id="ftermino" class="input-xlarge focused">
								</div>
							 </div>
							 
							  <legend>4.   Nodos de jerarqu&iacute;a institucional</legend>
							  <p>Seleccione el nivel que desea agregar al plan dentro de la jerarquia institucional.</p>
                              <div class="control-group">
                              <div class="controls">
                              #NODOS#
                              </div>
                              </div>
							 
						
						     
							  
						  </fieldset>
                          </form>
						</div>   

					</div>
					<!-- Table -->
					
					
					 <!-- Pagging -->
						
                        <div class="pagging" style="border-top:1px solid #BBBBBB;">
              		
                        <div class="right">
                        <a href="?execute=principal&method=default&Menu=F1&SubMenu=SF11#&p=1&s=25&sort=1&q=" class="btn btn-large">Cancelar</a>
						<input type="button" id="btnGuardar2" onclick="GuardarProyecto();"s class="btn-warning btn-large" value="Guardar"/>
                        </div>
                        
						</div>
              
						<!-- End Pagging -->
					
					
				</div>
				<!-- End Box -->           
                  