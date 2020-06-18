 <script src="skins/default/js/herramientas/InformesDeError.js"></script>
<!-- Alerta -->
<div id="alerta" class="alert alert-block " style="display:none;">
		<button type="button" class="close" data-dismiss="alert">×</button>
		<h4 id="headAlerta" class="alert-heading">!CORRECTO!</h4>
		<p><div id="bodyAlerta">mensaje.</div></p>
</div>
<!--End Alerta -->


<!-- Box -->
<div class="box">
	<!-- Box Head -->
	<div class="box-head">
		<h2 class="left">Informes de error</h2>
		<br>
		<div class="right">
			<input type="text" name="searchbar" id="searchbar" />
			<button class="btn btn-small" onclick="bBuscar_Click();" id="search_go-button-fichas"><i class="icon-search"></i> Buscar</button>
		</div>
		<p>Muestra los mensajes de error al enviar los prospectos.
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
				<input type="text" class="page_number-box" value="1">&nbsp;de&nbsp;1
			</div>
			<div class="page_button right button_disable"></div>
		</div>
	</div>
	<!-- End Pagging -->
	<!-- Table -->
	<div class="table" style="min-height: 300px;">
		<table width="100%" border="0" cellspacing="0" cellpadding="0">
			<thead>
				<tr>
					<th width="12%"><i class="icon-user"></i> Prospecto</th>
					<th width="40%"><i class="icon-comment"></i> Error</th>
					<th width="20%">Datos</th>
					<th width="14%"><i class="icon-time"></i> Fecha Registro </i>
					</th>
					<th width="14%"><i class="icon-time"></i> Fecha Reenvío </i>
					</th>
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
			</div>
			<div class="page_overview_display">
				<input type="text" class="page_number-box" value="1"> &nbsp;de&nbsp;1
			</div>
			<div class="page_button right button_disable"></div>
		</div>
	</div>
	<!-- End Pagging -->
</div>
<!-- End Box -->






<!--MODAL MOSTRAR JSON-->
<div class="modal hide fade" id="modalMostrarDatos" style="width:500px; ">
	<div class="modal-header">
		<button type="button" class="close" data-dismiss="modal">×</button>
		<span id="titlemodalplane">Json</span>
	</div>
	<div class="modal-body">
		<div class="form-horizontal">
			
				<fieldset>
					<blockquote>
						<textarea id="code_json" style="width:455px; height:400px; font-family: Courier New;" readonly>
						</textarea>
					</blockquote>
					
				</fieldset>
			
		</div>
	</div>
	<div class="modal-footer">
		<a href="#" class="btn" data-dismiss="modal">Cerrar</a>
	</div>
</div>
<!--END MODAL MOSTRAR JSON-->