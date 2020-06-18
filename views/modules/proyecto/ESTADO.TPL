 <script src="skins/default/js/proyectos/estado.js"></script>



				<div class="box">
					<!-- Box Head -->
					<div class="box-head">
						<h1 class="left">Editar el estado del Proyecto</h1><br>
						<p>Seleccionar el nuevo estado del proyecto.</p>
						
					</div>
					<!-- End Box Head -->	
             
                    
                    <!-- Pagging -->
						
                     
                      
                        <div class="pagging">
                         <div class="left">
						 <i class="icon-asterisk"></i> Indica un campo obligatorio.</div>
                        <div class="right">
                        <a href="?execute=principal&method=default&Menu=F1&SubMenu=SF11#&p=1&s=25&sort=1&q=" class="btn btn-large">Cancelar</a>
						<input type="button" id="btnenviaform1" onclick="GuardarProyecto1();" class="btn-warning btn-large" value="Guardar">
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
							
							<div class="control-group">
                            
								<label for="focusedInput" class="control-label"><i class="icon-asterisk"></i>Titulo:</label>
								<div class="controls">
								  <input type="text" value="#TITULO#" disabled="disabled" style="width:500px;" name="titulo" id="titulo" class="input-xlarge focused">
								</div>
							  </div>
							
							
							 
							 <legend>2.   Estado</legend>
							 
							 
							  <div class="control-group">
								
								<div class="controls">
								  
                               <input type="radio" #ELABORANDO# value="E" name="estado" class="input-xlarge focused">							   &nbsp;<span class="label label-warning">Elaborando</span> <span class="label label-info">Elaborando</span><br/><br/>
							   
                               <input type="radio" #REVISIONP# value="RP" name="estado" class="input-xlarge focused">							   &nbsp;<span class="label label-warning">Revisión</span> <span class="label label-info">Preliminar</span><br/><br/>
							   
                               <input type="radio" #REVISION# value="R" name="estado" class="input-xlarge focused">							   &nbsp;<span class="label label-revision">Revisión</span><br/><br/>
							   
							   <input type="radio" #REVISIONE# value="RE" name="estado" class="input-xlarge focused">							   &nbsp;<span class="label label-revision">Revisión expertos</span><br/><br/>
							   							   
							   <input type="radio" #REVISADOE# value="EX" name="estado" class="input-xlarge focused">							   &nbsp;<span class="label label-success">Revisado expertos</span><br/><br/>
							   
							   <input type="radio" #PROPAJUSTES# value="PA" name="estado" class="input-xlarge focused">							&nbsp;<span class="label label-warning">Propuesta en ajustes</span><br/><br/>
							   
							   <input type="radio" #REVISIONA# value="RA" name="estado" class="input-xlarge focused">							   &nbsp;<span class="label label-warning">Revisión ajustes</span><br/><br/>
							   <input type="radio" #INTEGRARPROPUESTA# value="IN" name="estado" class="input-xlarge focused">							   &nbsp;<span class="label label-warning">Integrar Propuesta</span><br/><br/>
							   
							   
							    <input type="radio" #AGENDARPRES# value="AP" name="estado" class="input-xlarge focused">							   &nbsp;<span class="label label-success">Agendar presentación</span><br/><br/>
							   
							    <input type="radio" #PRESENTACION# value="PP" name="estado" class="input-xlarge focused">							&nbsp;<span class="label label-important">Presentación de propuesta</span><br/><br/>
								
								 <input type="radio" #NOAPROBADO# value="NA" name="estado" class="input-xlarge focused">							   &nbsp;<span class="label label-success">Propuesta no aprobada</span><br/><br/>
							   
							    <input type="radio" #INICIOPROP# value="IP" name="estado" class="input-xlarge focused">							&nbsp;<span class="label label-important">Inicio de proyecto</span><br/><br/>
							   
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
						<input type="button" id="btnenviaform2" onclick="GuardarProyecto1();" class="btn-warning btn-large" value="Guardar"/>
                        </div>
                        
						</div>
              
						<!-- End Pagging -->
					
					
				</div>
				<!-- End Box -->           
                  