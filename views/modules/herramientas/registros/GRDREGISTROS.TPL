 <script src="skins/default/js/herramientas/registros.js"></script>

<!-- Alerta -->
<div id="alerta" class="alert alert-block " style="display:none;">
							<button type="button" class="close" data-dismiss="alert">×</button>
							<h4 id="headAlerta" class="alert-heading">!CORRECTO!</h4>
							<p><div id="bodyAlerta">El plan estrategico se ha guardado correctamente.</div></p>
</div>

<!--End Alerta -->


<!-- Box -->
				<div class="box">
					<!-- Box Head -->
					<div class="box-head">
						<h2 class="left">Registros del Sistema</h2><br>
					<div class="right">
						<input type="text" name="searchbar" id="searchbar"   />
							<button class="btn btn-small" onclick="buscar();" id="search_go-button-fichas"><i class="icon-search"></i> Buscar</button>
						</div>
						<p>Muestra la actividad que tienen los usuarios en el sistema. 
						
						</p>
					</div>
					<!-- End Box Head -->	
                    
                    
                    <!-- Pagging -->
                        <div class="pagging" id="pagginghead">         
                        <div class="left">  
                          <div id="sort-panel">  
	                  <select onchange="Ordenar(this.value)" name="sort" id="sort-menu">
                      <option value="1" selected="selected">Ordenar por: Reciente adición</option>
		              <option value="2">Ordenar por: Nombre</option>
		              <option value="3">Ordenar por: Apellidos</option>
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
                <button class="btn btn-small" style="float:left; margin-right:10px;"><i class="icon-refresh"></i> Actualizar</button>
                <div class="page_button left button_disable"></div> 
                <div class="page_overview_display">
                <input type="text" class="page_number-box"  value="1">&nbsp;de&nbsp;1
                </div>
               <div class="page_button right button_disable"></div>
	            </div>    
                        
                        
                        </div>
						<!-- End Pagging -->
						
                    
                    
					<!-- Table -->
					<div class="table" style="min-height: 300px;">
						<table width="100%"  border="0" cellspacing="0" cellpadding="0">
							<thead>
							<tr>
								
								<th width="15%">Aplicación</th>
								<th width="15%">Modulo</th>
								<th width="40%">Mensaje <i class="icon-comment"></th>
								<th width="10%">Usuario <i class="icon-user"></i></th>
								<th width="20%">Fecha / Hora <i class="icon-time"></i></th>
							</tr>
							</thead>
							 <tbody id="results-panel">
							
							
							</tbody>
							
						</table>
						</div>
					<!-- Table -->
						
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
                
 