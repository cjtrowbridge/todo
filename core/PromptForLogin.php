<?php 

function PromptForLogin(){
	SimplePage('Login To '.APPNAME,'PromptForLoginBodyCallback();');
}

function PromptForLoginBodyCallback(){
	?>
	
	<div class="container">
		<div class="row">
			<div class="col-xs-12">
				<h1>Login</h1>
				<?php 
					Event('Auth Login Options');
				?>
			</div>
		</div>
	</div>
	
	<?php
}
