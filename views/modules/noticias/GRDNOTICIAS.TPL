<script src="views/modules/noticias/js/noticias.js"></script>

<!-- Alerta -->
<div id="alerta" class="alert alert-block " style="display:none;">
							<button type="button" class="close" data-dismiss="alert">X</button>
							<h4 id="headAlerta" class="alert-heading">!CORRECTO!</h4>
							<p><div id="bodyAlerta">El plan estrategico se ha guardado correctamente.</div></p>
</div>

<!--End Alerta -->


<!-- Box -->
				<div class="box">
					<!-- Box Head -->
					<div class="box-head">
						<h2 class="left">Lista de Prospectos de Licenciatura</h2><br>
						<div class="right">
						<input type="text" name="searchbarpo" id="searchbarpo"   />
							<button class="btn btn-small" id="search_go-button" onclick="buscarPlanes();"><i class="icon-search"></i> Buscar</button>
						</div>
						<p>Se muestra un listado con los prospectos disponibles. 
						#BTNAGREGARPLANE#
						
						</p>
						
					</div>
					<!-- End Box Head -->	
                    
                    
                    <!-- Pagging -->
                        <div class="pagging" id="pagginghead">         
                        <div class="left">  
                          <div id="sort-panel">  
	                  <select onchange="Ordenar(this.value)" name="sort" id="sort-menu">
                      <option value="1" selected="selected">Ordenar por: Reciente adición</option>
		              <option value="2">Ordenar por: Titulo	</option>
		              <option value="3">Estado</option>
                      </select>
                     
	                    </div>  
                        </div>
                        
                        <div class="bar_seperator"></div>
                        
       <div id="search_page_size-panel">
        <div id="page_size_25-panel" onclick="showLimitPage(25,this);" class="page_size_25 page_size_25-selected"></div>
		<div id="page_size_50-panel" onclick="showLimitPage(50,this);" class="page_size_50"></div>
        <div id="page_size_100-panel" onclick="showLimitPage(100,this);" class="page_size_100"></div>
        <div id="page_size_200-panel" onclick="showLimitPage(200,this);" class="page_size_200"></div>
	 </div>
                        
               <div class="bar_seperator"></div>
                        
               <div id="results_text">
               0 resultados
               </div>
                        
               
               <div class="search_pagination">
               #BTNES#
                <div class="page_button left button_disable"></div> 
                <div class="page_overview_display">
                <input type="text" class="page_number-box"  value="1">&nbsp;de&nbsp;1
                </div>
               <div class="page_button right button_disable"></div>
	            </div>    
                        
                        
                        </div>
						<!-- End Pagging -->
						
						
						<!-- Table -->
					<!--<div class="table" style="min-height: 300px;">
					
					<form id="formulario1c"><input type="hidden" id="usuarios" name="usuarios" value=""/>			
					
						<table width="100%"  border="0" cellspacing="0" cellpadding="0">
							<thead>
							<tr>
							    <th><input type="checkbox" id="checkboxall1c" onClick="seleccionarTodo('1c')" name="checkboxall"/></th>
							    <th>Campus</th>
								<th>Programa</th>
								<th>Nombre</th>
								<th>Apellidos</th>
								<th>Correo</th>
								<th>Telefono</th>
								<th>Ciudad</th>
								<th>Fecha registro</th>
								
								
							</tr>
							</thead>
							 <tbody id="results-panel">
							
							
							</tbody>
							
						</table>
						
						</form>	
						</div>-->
						
					
					<!-- Table -->
						
						
						  <div class="widgetcontent nopadding" id="resultados">
						  	<form id="formulario1c"><input type="hidden" id="usuarios" name="usuarios" value=""/>	
						  
                            <ul class="commentlist" id="results-panel">
                               
                                
                            </ul>
                            
                            </form>
                        </div>
						
						
						
                   <!-- <div class="widgetcontent nopadding" id="resultados">
                            <ul class="commentlist" id="noticias">
                               
                                
                            </ul>
                        </div>-->
						
						  <!-- Pagging -->
						
                        <div class="pagging" id="barfilterfooter">
                       
                     
                       <div class="search_pagination">
                       
                       <div class="page_button left button_disable">
                       </div> <div class="page_overview_display">
          <input type="text" class="page_number-box"  value="1">
          &nbsp;de&nbsp;1</div><div class="page_button right button_disable"></div> 
	                  </div>                       
                        
                        
                        </div>
						<!-- End Pagging -->
						
					
					
				</div>
				<!-- End Box -->