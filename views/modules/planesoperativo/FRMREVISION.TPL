 <script src="skins/default/js/planesoperativo/revisionobjetivos.js"></script>
 <script type="text/javascript" src="skins/default/js/comentarios/jquery.oembed.js"></script>
 <script type="text/javascript" src="skins/default/js/comentarios/jquery.watermarkinput.js"></script>

<div id="alerta" class="alert alert-block " style="display:none;">
							<button type="button" class="close" data-dismiss="alert">×</button>
							<h4 id="headAlerta" class="alert-heading">!CORRECTO!</h4>
							<p><div id="bodyAlerta">El plan estrategico se ha guardado correctamente.</div></p>
</div>


				<div class="box">
					<!-- Box Head -->
					<div class="box-head">
						<h1 class="left">#TITULOPLAN#</h1>
						<span class="right">#ESTADO#</span>
						<br>
						<p>Revisión de las lineas estratégicas y objetivos estratégicos correspondientes al plan. 
						</p>
						
					</div>
					<!-- End Box Head -->	
             
                    
                    <!-- Pagging -->
						
                     
                      
                        <div class="pagging">
                         <div class="left" id="menucontent">
                        
                       <ul class="subMenu" style="margin-top:15px;" id="myTablab">
                       <li class=""><a href="#lineasyobjetivos">Líneas y Resultados</a></li>
					   <!--#FRESUMENEJECUTIVO#-->
                       </ul>
                         
                         </div>
                        <div class="right">
                        <a href="?execute=operativo&method=default&Menu=F2&SubMenu=SF21#&p=1&s=25&sort=1&q=" class="btn btn-large"><i class="icon-chevron-left"></i> Regresar</a>
						
						<!--BUTTONEDITAR-->
						
						<!--BUTTONENVIAR-->
                        
                       
                        </div>
                        
						</div>
              
						<!-- End Pagging -->
						
                    
                    
					<!-- CONTENT LINEA -->
                    <div id="TabContent" class="tab-content">
					 
                     <div class="tab-pane" id="lineasyobjetivos">
                     <div class="box-content">
              
                     <!--====================OBJETIVO=====================--> 
  <div id="L0-C0" class="wellstrong" style="display:none;">
                         <div class="box-icon">
<a href="javascript:void(0)" onclick="Toogle(this.id);"  id="TOG-L0-C0" class="btn btn-minimize btn-round"><i class="icon-chevron-up"></i></a>						
</div>
   <table width="100%">
       <tbody><tr>
       <td>Objetivo Táctico</td>
       <td> Objetivo estratégico</td>
       <td> Responsable</td>
       </tr>
                    
       <tr>
       <td>   
		<div class="input-prepend">
		   <span class="add-on" id="LABEL-L0-O0">1.1</span>
           <input type="text" style="width:400px;" id="L0-O0">
		</div>
       </td>
       <td> 
       <select style="width:300px;" id="L0-OE0"> <option>L1 Objetivo estrategico 1</option> <option>L1 Objetivo estrategico 2</option> <option>L1 Objetivo estrategico 3</option> <option>L1 Objetivo estrategico 4</option> <option>L1 Objetivo estrategico 5</option></select> 
       </td>
       <td><input type="text" id="L0-OR0"></td>
       </tr>
       </tbody></table>
                    
      
      <div class="box-objectivos" id="BOX-L0-C0">
      
       <div class="well">
       <table width="100%">
        <tbody><tr>
        <td width="60">&nbsp;	</td>
        <td>Medios</td>
        <td>Responsable</td>
        </tr>
         
        <tr id="L0-O0-M0-C0">
        <td>&nbsp; </td>
        <td width="520">  
        <div class="input-prepend">
		<span class="add-on" id="LABEL-L0-O0-M0">1.1.1</span>
        <input type="text" style="width:470px;" id="L0-O0-M0">
		</div> 
        </td>                          
        <td><input type="text" id="L0-O0-M0-R0"></td>
        </tr>
                    
        <tr>	
        <td colspan="2">
        <div style="margin-left:30px;" class="left">           
        <button style="float:left; margin-right:10px;" onclick="EliminarMedio(this.id);" id="BEM-L0-O0" disabled="disabled" class="btn btn-small"><i class="icon-remove"></i> Eliminar medio</button>
                    
		
         <button onclick="AgregarMedio(this.id);" id="BAM-L0-O0" class="btn btn-small"><i class="icon-plus"></i>Agregar Medio</button>				
		</div>            
        </td>
        </tr>
        </tbody></table>
        </div>
                      
                      
                      
         <div class="well">
         <table width="100%">
         <tbody><tr>
         <td width="30">&nbsp;	</td>
         <td>Evidencias	</td>            
         </tr>           
          
          <tr id="L0-O0-E0-C0">
          <td>&nbsp; </td>       
          <td>  
          <div class="input-prepend">
		  <span class="add-on" id="LABEL-L0-O0-E0">1.1.1</span>
          <input type="text" style="width:470px;"  id="L0-O0-E0">
		  </div> 
          </td>
          </tr>
                    
          <tr>
          <td colspan="2">
          <div style="margin-left:30px;" class="left">         
          <button style="float:left; margin-right:10px;" onclick="EliminarEvidencia(this.id);" id="BEE-L0-O0" disabled="disabled" class="btn btn-small"><i class="icon-remove"></i> Eliminar Evidencia</button>
	      <button onclick="AgregarEvidencia(this.id);" id="BAE-L0-O0"  class="btn btn-small"><i class="icon-plus"></i>Agregar Evidencia</button>			
		  </div>
          </td>
          </tr>     
          </tbody></table>
          </div> 
                     </div>
          
          
          </div>
<!--====================END OBJETIVO=====================-->
                     
                     
						#CONTENIDO#
                        
                        
					    </div>
					<!-- END CONTENT LINEA -->
                    </div>
                    
                    <div class="tab-pane" id="resumen">
                     <div class="box-content">
                     
                     
                     <p style="padding:10px; background:#F5F5F5; border: 1px solid rgba(0, 0, 0, 0.05);">En este apartado, se exponen las Áreas de oportunidad y Fortalezas de la universidad al inicio del año. El equipo directivo de la Oficina de la Red de Universidades Anáhuac retroalimentará el plan en general.</p>
                     
                      <!--#VALUEDESCRIPCION#-->
					 
					 <br />
					 
					 	  <div class="box-icon" align="right" #MOSTRARCOM#>
						  <span style="float:right; position:relative; left:-10px;" class="notification">#NR#</span>
						  
<a href="javascript:void(0)" onclick="Toogleresumen(this.id);" class="btn btn-minimize btn-round" id="BTNTOGRESUMEN"><i class="icon-chevron-down"></i> Comentarios</a>						
</div>
					 
					 
                      <div  id="BOXRESUMEN" style="display: none">
                      

                     <!-- COMENTARIOS RESUMEN EJECUTIVO-->
                     
                     #COMENTARIOSRESUMENEJECUTIVO#
                      
					   
                      </div>  
                     
                     </div>
                    </div>
                    
                    </div>
					
                    
                  
                    
					
					 <!-- Pagging -->
						
                        <div class="pagging" style="border-top:1px solid #BBBBBB;">
              		
                        <div class="right">
                        <a href="?execute=operativo&method=default&Menu=F2&SubMenu=SF21#&p=1&s=25&sort=1&q=" class="btn btn-large"><i class="icon-chevron-left"></i> Regresar</a>
						<!--BUTTONEDITAR-->
						<!--BUTTONENVIAR-->
                        
                         
                        </div>
                        
						</div>
              
						<!-- End Pagging -->
					
					
				</div>
				<!-- End Box -->           
                  