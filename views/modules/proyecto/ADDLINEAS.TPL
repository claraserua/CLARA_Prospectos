 <script src="skins/default/js/planestrategico/addplanestrategico.js"></script>


<div id="alerta" class="alert alert-block " style="display:none;">
							<button type="button" class="close" data-dismiss="alert">×</button>
							<h4 id="headAlerta" class="alert-heading">!CORRECTO!</h4>
							<p><div id="bodyAlerta">El plan estrategico se ha guardado correctamente.</div></p>
</div>


				<div class="box">
					<!-- Box Head -->
					<div class="box-head">
						<h1 class="left">#TITULOPLAN#</h1><br>
						<p>Agregue las lineas estrat&eacute;gicas y objetivos estrat&eacute;gicos correspondientes al plan. 
						</p>
						
					</div>
					<!-- End Box Head -->	
             
                    
                    <!-- Pagging -->
						
                     
                      
                        <div class="pagging">
                         <div class="left">
						 <i class="icon-asterisk"></i> Indica un campo obligatorio.</div>
                        <div class="right">
                        <a href="?execute=principal&Menu=F1&SubMenu=SF4#&p=1&s=25&sort=1&q=" class="btn btn-large">Cancelar</a>
						<input type="button" onclick="Salvar();" class="btn-warning btn-large" value="Guardar">
                        </div>
                        
						</div>
              
						<!-- End Pagging -->
						
                    
                    
					<!-- Table -->
					<div class="box-content">
						<div class="form-horizontal">
                          <fieldset>
                            <div class="box" id="linea0" >
                            
                             <div class="box-head" >
						<h2 class="left"> <span id="legenda0">Línea estratégica 1</span></h2>
						
					</div>
                            
                            
                        
									
                             <div class="well"> 
							<div class="control-group">
                            
								<label for="focusedInput" class="control-label"><i class="icon-asterisk"></i>Titulo:</label>
								<div class="controls">
	
			
			
			<textarea  style="width:700px;" name="titulo" id="titulo0" class="input-xlarge focused"></textarea>
								</div>
							  </div>
                              </div>
							
							 
							 <legend><small style="color:#000000;">Objetivos estrat&eacute;gicos:</small></legend>
							 
							<div class="well"> 
                             
							<div class="control-group" id="L0-controlobjetivo1">
							<div class="controls">
<div class="input-prepend">
<span class="add-on" id="textobjetivo">1</span>

<textarea  style="width:700px;" id="L0-objetivo1" name="L0-objetivo" class="input-xlarge focused"></textarea>

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
							  
                               <div class="right">
                               
 
  <button class="btn btn-large" disabled="disabled" id="btndeleteline" onclick="EliminarLinea();" style="float:left; margin-right:10px;"><i class="icon-remove"></i> Eliminar Linea</button>
                               
<a href="javascript:void(0)" onclick="agregarLinea();" class="btn btn-large"><i class="icon-plus"></i> Agregar Linea</a>
                          
                          </div>
                              
                              
						  </fieldset>
    
						</div>   

					</div>
					<!-- Table -->
					
					
					 <!-- Pagging -->
						
                        <div class="pagging" style="border-top:1px solid #BBBBBB;">
              		
                        <div class="right">
                        <a href="?execute=principal&Menu=F1&SubMenu=SF4#&p=1&s=25&sort=1&q=" class="btn btn-large">Cancelar</a>
						<input type="button" onclick="Salvar();" class="btn-warning btn-large" value="Guardar"/>
                        </div>
                        
						</div>
              
						<!-- End Pagging -->
					
					
				</div>
				<!-- End Box -->           
                  