<?php 

function PromptForLogin(){
	SimplePage('Login To '.APPNAME,'PromptForLoginBodyCallback();');
}

function PromptForLoginBodyCallback(){
	?>
	
	<div class="container">
		<div class="row">
			<div class="col-xs-12">
				<p><h1>Login <a href="./?signup">Or Signup</a></h1></p>
				<?php 
					Event('Auth Login Options');
				?>
			</div>
		</div>
	</div>
	
	<?php
}
