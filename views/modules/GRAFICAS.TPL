<link rel="stylesheet" href="skins/default/css/style.css" type="text/css" media="all">

<script src="libs/highstock/js/highstock.js"></script>
<!--
<script src="https://code.highcharts.com/modules/drilldown.js"></script>
-->
<script src="libs/highstock/js/modules/exporting.js"></script>
<script src="skins/default/js/jquery/ui/i18n/jquery.ui.datepicker-es.js"></script>
<script src="skins/default/js/jquery-ui-1.8.21.custom.min.js"></script>

<script src="views/modules/graficas.js"></script>

<link rel="stylesheet" href="http://code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
<script src="http://code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
  
 



				<!-- Box -->
				<div class="box">
					<!-- Box Head -->
					<div class="box-head">
						<h1 class="left"> Gráficas
<p> 
						</p>
						
						
					</div>
					<!-- End Box Head -->	
                    
                    
                    <!-- Pagging -->
						
						<!--
                        <div class="pagging">
                         <div class="left">
						 <i class="icon-asterisk"></i> Indica un campo obligatorio.</div>
                        <div class="right">
                        <a href="?execute=principal&method=default&Menu=F1&SubMenu=SF11#&p=1&s=25&sort=-1&q=" class="btn btn-large">Salir</a>
						
                        </div>
                        
						</div>
						-->
              
						<!-- End Pagging -->
						
                    
                    
					<!-- Table -->
					<div class="box-content">
						
						
						
						<fieldset>
							<legend>1. </legend>
									
								
							<div class="panel-body">
							
							
								<!-- Grafica (1) -->
								<div class="left">
									<div class="left" style="font-size:11pt; margin: 6pt 4pt 0 0;">Universidad:</div>
									<select id="select_universidades" class="left" name="select_universidades" style="width:400px;" onchange="javascript:cargaGraficaProspectosXUniversidad(this);">
										<option value="0" selected>Todas</option>
									</select>
									<div class="left" style="font-size:11pt; margin: 6pt 4pt 0 15pt;">Fechas:</div>
									<input type="text" class="left" style="width:150px;" id="fec_inicio" value=""  >
									<input type="text" class="left" style="width:150px;" id="fec_fin" value="" >
									&nbsp;
								</div>
								<div class="left">
									<div class="btn btn-small" onclick="bBuscar_Click(this);"><i class="icon-search"></i> Buscar</div>
								</div>
								
								<br/><br/>
								<div id="div_grafica_x_universidad" style="height: 400px; min-width: 310px;   border-style:Solid; border-width:2pt; border-color:#DDDDDD;"></div>
								<br/><br/><br/>
								
								
								<!-- Grafica (2) -->
								
								<div class="left">
									<div class="left" style="font-size:11pt; margin: 6pt 4pt 0 0;">Fechas:</div>
									<input type="text" class="left" style="width:150px;" id="fec_inicio_2" value=""  >
									<input type="text" class="left" style="width:150px;" id="fec_fin_2" value="" >
									&nbsp;
								</div>
								<div class="left">
									<div class="btn btn-small" onclick="bBuscar_2_Click(this);"><i class="icon-search"></i> Buscar</div>
								</div>
								
								<br/><br/>
								<div id="div_grafica_universidades" style="margin: 20,0,20,0; height: 400px; min-width: 310px;   border-style:Solid; border-width:2pt; border-color:#DDDDDD;"></div>
								
							</div>
						
						
							<!--
							<div class="panel-body">
								
								<div id="div_pie_id" style="min-width: 100px; height: 400px; max-width: 600px; margin: 0 auto"></div>
							</div>
							-->
							  
							  
						</fieldset>
						

					</div>
					<!-- Table -->
					
					
					 <!-- Pagging -->
						
                        <div class="pagging" style="border-top:1px solid #BBBBBB;">
              		
                        <div class="right">
							
                          <a href="?execute=principal&method=default&Menu=F1&SubMenu=SF11#&p=1&s=25&sort=-1&q=" class="btn btn-large">Salir</a>
						
                        </div>
                        
						</div>
              
						<!-- End Pagging -->
					
					
				</div>
				<!-- End Box -->
                  