 <script src="skins/default/js/proyectos/addproyecto.js"></script>


<div id="alerta" class="alert alert-block " style="display:none;">
							<button type="button" class="close" data-dismiss="alert">×</button>
							<h4 id="headAlerta" class="alert-heading">!CORRECTO!</h4>
							<p><div id="bodyAlerta">El proyecto se ha guardado correctamente.</div></p>
</div>


				<div class="box">
					<!-- Box Head -->
					<div class="box-head">
						<h1 class="left"><!--#PLANESTRATEGICO#--> Crear Propuesta del Proyecto</h1><br>
						
						
					</div>
					<!-- End Box Head -->	
             
                    
                    <!-- Pagging -->
						
                     
                      
                        <div class="pagging">
                         <div class="left">
						 <i class="icon-asterisk"></i> Indica un campo obligatorio.</div>
                        <div class="right">
                        <a href="?execute=principal&method=default&Menu=F1&SubMenu=SF11#&p=1&s=25&sort=1&q=" class="btn btn-large">Cancelar</a>
						<input type="button" id="btnenviaform1" onclick="GuardarProyecto();" class="btn-warning btn-large" value="Guardar">
                        </div>
                        
						</div>
              
						<!-- End Pagging -->
						
                    
                    
					<!-- Table -->
					<div class="box-content">
						<div class="form-horizontal">
						<!--  <form enctype="multipart/form-data" name="frmaddplaneso" method="post" id="frmaddplaneso" action="?execute=planesoperativo/addplano&Menu=F1&SubMenu=SF4&method=GuardarPlan" target="iframe-post-form">  -->
                          <fieldset>
							<legend>1.   Informaci&oacute;n general</legend>
									
								
							<input type="hidden" value="#IDPROYECTO#" id="idProyecto" name="idProyecto" />
							<input type="hidden" value="#ESTADO#" id="estado" name="estado" />
							
							<div class="control-group">
                            
								<label for="focusedInput" class="control-label"><i class="icon-asterisk"></i>Nombre del Proyecto:</label>
								<div class="controls">
								  <input type="text" value="#PROYECTO#" style="width:500px;" name="nomProyecto" id="nomProyecto" class="input-xlarge focused">
								</div>
							  </div>
							
							
							<div class="control-group">
								<label for="focusedInput" class="control-label">Descripci&oacute;n :</label>
								<div class="controls">
				<textarea id="descripcion" name="descripcion" class="cleditor" rows="3" style="width: 500px; height: 140x;">#DESCRIPCION#</textarea>
								</div>
							  </div>
							 
							 <legend>2.   Disponibilidad</legend>
							 
							 
							  <div class="control-group">
								<label for="focusedInput" class="control-label"></i>Disponible:</label>
								<div class="controls">
								  
                                  Si&nbsp;<input type="radio" #DISPONIBLE# value="1" name="disponible" class="input-xlarge focused">
                                  	  No&nbsp;<input type="radio" #NODISPONIBLE# value="0" name="disponible" class="input-xlarge focused">
                                  
								</div>
							 </div>
                             
                             
                             	 <legend>3.   Duraci&oacute;n</legend>
							 
							 
							 <div class="control-group">
							<label for="focusedInput" class="control-label">Fecha Inicio:</label>
								<div class="controls">  
                                <input type="text" value="#FECHAINICIO#" readonly="readonly" style="width:130px;" name="finicio" id="finicio" class="input-xlarge focused">
								</div>
							 </div>
                             
                             
                             <div class="control-group">
							<label for="focusedInput" class="control-label">Fecha Termino:</label>
								<div class="controls">  
                                <input type="text" value="#FECHATERMINO#" readonly="readonly" style="width:130px;" name="ftermino" id="ftermino" class="input-xlarge focused">
								</div>
							 </div>
							 
                             
                             
                             
                             
	    
		
		 <legend>3.   Nodo principal de jerarqu&iacute;a institucional</legend>
							  <p>Seleccione el nivel principal al que pertenece el proyecto dentro de la jerarquia institucional.</p>
                              <div class="control-group">
                              <div class="controls">
                              #NODOSPRINCIPAL#
                              </div>
                              </div>
							  
							  
							  
				 <legend>4. Asignación del Rol</legend>							  		  
							  
							 <div class="control-group">
				<label for="focusedInput" class="control-label"><i class="icon-asterisk"></i>Rol</label>
								<div class="controls">
						
						<select name="roles" id="roles">
		                        #ROLES#
                         </select>
								  
								</div>
							  </div> 
		
		           
                             
 
						  </fieldset>
                          <!--</form>-->
						</div>   

					</div>
					<!-- Table -->
					
					
					 <!-- Pagging -->
						
                        <div class="pagging" style="border-top:1px solid #BBBBBB;">
              		
                        <div class="right">
                        <a href="?execute=principal&method=default&Menu=F1&SubMenu=SF11#&p=1&s=25&sort=1&q=" class="btn btn-large">Cancelar</a>
						<input type="button" id="btnenviaform2" onclick="GuardarProyecto();" class="btn-warning btn-large" value="Guardar"/>
                        </div>
                        
						</div>
              
						<!-- End Pagging -->
					
					
				</div>
				<!-- End Box -->           
                  