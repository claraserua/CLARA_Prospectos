<div class="loginpanel">
    <div class="loginpanelinner">
       
       <div style="font-size: 20px;line-height: 1.3em;padding:10px;" id="progressCustomMessage">
       PROSPECTOS Ver. 1.0  <br><small><span class="icon-info-sign"></span> Cloud Application Red Anáhuac</small></div>
      
       
        <form id="login" action="web.php" method="post" autocomplete="off">
            
            <div ajxp_message_id="180" style="margin-bottom: 3px;margin-top: 4px;" class="dialogLegend">
            <img src="skins/default/images/login/ierror.png" style="margin-top: 10px;"/>
            Usuario y/o Password <span style="color:#B22619; font-weight: bold;">INCORRECTOS</span></div>
            
            <div style="width:100%;">
					<div class="SF_element">
						<div class="SF_label"><ajxp:message ajxp_message_id="181">Login</ajxp:message></div>
						<div class="SF_input"><input type="text" placeholder="Login" class="dialogFocus" style="width: 100px; padding:0px;" name="usuario" id="usuario"></div>
					</div>
					<div class="SF_element">
						<div class="SF_label"><ajxp:message ajxp_message_id="182">Password</ajxp:message></div>
						<div class="SF_input"><input type="password" placeholder="Password" style="width: 100px; padding:0px;" name="password" id="password"></div>
					</div>
					<div class="SF_element">
						<input type="hidden" name="token" id="token_" value="#TOKEN#">
					</div>
					<div class="SF_element">
						<input type="checkbox" style="border: none; width:20px !important;" name="remember_me" class="radio"><ajxp:message ajxp_message_id="261">Recordar</ajxp:message>
					</div>
				</div>
				
				
				<div class="dialogButtons"><input width="22" type="image" height="22" name="ok" src="skins/default/img/ok.png" title="OK" class="dialogButton dialogFocus"></div>
            
        </form>
    </div><!--loginpanelinner-->
</div><!--loginpanel-->



