 <script src="skins/default/js/planestrategico/editplanestrategico.js"></script>


<div id="alerta" class="alert alert-block " style="display:none;">
							<button type="button" class="close" data-dismiss="alert">×</button>
							<h4 id="headAlerta" class="alert-heading">!CORRECTO!</h4>
							<p><div id="bodyAlerta">El plan estrategico se ha guardado correctamente.</div></p>
</div>


				<div class="box">
					<!-- Box Head -->
					<div class="box-head">
						<h1 class="left">Editar: #TITULO#</h1><br>
						<p>
                        <i class="icon-asterisk"></i> Indica un campo obligatorio.
                        
						</p>
						
					</div>
					<!-- End Box Head -->	
             
                    
                    <!-- Pagging -->
						
                     
                      
                        <div class="pagging">
                         <div class="left">
                         
                         <ul class="Menu" style="margin-top:15px;">
                       <li id="active">Propiedades</li>
                       <li> <a href="#MENUURL#">L&iacute;neas y Objetivos</a></li>
                     
                       </ul>
                         
						 </div>
                        <div class="right">
                        <a href="?execute=principal&method=default&Menu=F1&SubMenu=SF11#&p=1&s=25&sort=1&q=" class="btn btn-large">Salir</a>
                        
                        
                        
                        
						<input type="button" id="btnenviaform1" class="btn-warning btn-large" value="Guardar">
                        </div>
                        
						</div>
              
						<!-- End Pagging -->
						
                    
                    
					<!-- Table -->
					<div class="box-content">
						<div class="form-horizontal">
						  <form enctype="multipart/form-data" name="frmaddplanese" method="post" id="frmaddplanese" action="?execute=planestrategico/editplane&Menu=F1&SubMenu=SF4&method=Actualizar" target="iframe-post-form">  
                          <fieldset>
							<legend>1.   Informaci&oacute;n general</legend>
									
								
							<input type="hidden" value="#IDPLAN#" id="idplan" name="idplan" />
							
							
							<div class="control-group">
                            
								<label for="focusedInput" class="control-label"><i class="icon-asterisk"></i>Titulo:</label>
								<div class="controls">
								  <input type="text" value="#TITULO#" style="width:500px;" name="titulo" id="titulo" class="input-xlarge focused">
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
							<label for="focusedInput" class="control-label"><i class="icon-asterisk"></i>Fecha Inicio:</label>
								<div class="controls">  
                                <input type="text" value="#FECHA_I#" readonly="readonly" style="width:130px;" name="finicio" id="finicio" class="input-xlarge focused">
								</div>
							 </div>
                             
                             
                             <div class="control-group">
							<label for="focusedInput" class="control-label"><i class="icon-asterisk"></i>Fecha Termino:</label>
								<div class="controls">  
                                <input type="text" value="#FECHA_T#" readonly="readonly" style="width:130px;" name="ftermino" id="ftermino" class="input-xlarge focused">
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
                        <a href="?execute=principal&method=default&Menu=F1&SubMenu=SF11#&p=1&s=25&sort=1&q=" class="btn btn-large">Salir</a>
                        
                      
  
						<input type="button" id="btnenviaform2" class="btn-warning btn-large" value="Guardar"/>
                        </div>
                        
						</div>
              
						<!-- End Pagging -->
					
					
				</div>
				<!-- End Box -->           
                  