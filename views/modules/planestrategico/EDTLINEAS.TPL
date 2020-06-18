 <script src="skins/default/js/planestrategico/editplanestrategico.js"></script>


<div id="alerta" class="alert alert-block " style="display:none;">
							<button type="button" class="close" data-dismiss="alert">×</button>
							<h4 id="headAlerta" class="alert-heading">!CORRECTO!</h4>
							<p><span id="bodyAlerta"> Indica un campo obligatorio.</span></p>
</div>


				<div class="box">
					<!-- Box Head -->
					<div class="box-head">
						<h1 class="left">Editar: #TITULO#</h1><br>
						<p> <i class="icon-asterisk"></i> Indica un campo obligatorio.
						</p>
						
					</div>
					<!-- End Box Head -->	
             
                    
                    <!-- Pagging -->
						
                     
                      
                        <div class="pagging">
                         <div class="left">
                         
                         <ul class="Menu" style="margin-top:15px;">
                       <li><a href="#MENUURL#">Propiedades</a></li>
                       <li id="active"> L&iacute;neas y Objetivos</li>
                     
                       </ul>
                         
						 </div>
                        <div class="right">
                        <a href="?execute=principal&method=default&Menu=F1&SubMenu=SF11#&p=1&s=25&sort=1&q=" class="btn btn-large">Salir</a>
						<input type="button" onclick="Salvar()" class="btn-warning btn-large" value="Guardar">
                        </div>
                        
						</div>
              
						<!-- End Pagging -->
						
                    
					
					
                    
					<!-- Table -->
					<div class="box-content">
						<div class="form-horizontal">
                          <fieldset>
                            <div class="box" id="linea0" style="display: none" >
                            <legend id="legenda0">1.   Línea Estrategica 
                            
                            
                             </legend>
									
                             <div class="well"> 
							<div class="control-group">
                            
								<label for="focusedInput" class="control-label"><i class="icon-asterisk"></i>Título:</label>
								<div class="controls">
								 
				<textarea id="titulo0" class="input-xlarge focused" name="titulo" style="width:700px;" ></textarea>
								  
								</div>
							  </div>
                              </div>
							
							 
							 <legend>Objetivos estratégicos:</legend>
							 
							<div class="well"> 
                             
							<div class="control-group" id="L0-controlobjetivo1">
							<div class="controls">
<div class="input-prepend">
<span class="add-on" id="textobjetivo">1</span>

<textarea id="L0-objetivo1" name="L0-objetivo" style="width:700px;" ></textarea>
</div>
                                
							</div>
							</div>
                            
                           
                            
                            
                            <div class="controls">
                            
                               
           <button class="btn btn-small" disabled="disabled" id="OL0"  onclick="EliminarObjetivo(this.id);" style="float:left; margin-right:10px;"><i class="icon-remove"></i> Eliminar Objetivo</button>
                                        
                                        
                             <a href="javascript:void(0)" id="L0" onclick="agregarObjetivo(this.id);" class="btn btn-small"><i class="icon-plus"></i> Agregar Objetivo</a>
                            </div>
                            </div>
                             
                             
                             
                             
                             
                             </div>
                            <!--END BOX--> 	
							  
							  
							  #CONTENIDO#
							  
                               
                              
                              
						  </fieldset>
    
						</div>   

                      
                     
					</div>
					<!-- Table -->
					
					
					 <!-- Pagging -->
						
                        <div class="pagging" style="border-top:1px solid #BBBBBB;">
              		
                        <div class="right">
                        <a href="?execute=principal&method=default&Menu=F1&SubMenu=SF11#&p=1&s=25&sort=1&q=" class="btn btn-large">Salir</a>
						<input type="button" onclick="Salvar()" class="btn-warning btn-large" value="Guardar"/>
                        </div>
                        
						</div>
              
						<!-- End Pagging -->
					
					
				</div>
				<!-- End Box -->           
                  