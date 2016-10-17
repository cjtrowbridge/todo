<?php

function PromptForSignup(){
	SimplePage('Signup For '.APPNAME,'PromptForSignupBodyCallback();');
}

function PromptForSignupBodyCallback(){
	?>
	
	<div class="container">
		<div class="row">
			<div class="col-xs-12">
				<p><h1>Sign Up <a href="./?login">Or Login</a></h1></p>
				<?php 
					Event('Auth Signup Options');
				?>
			</div>
		</div>
	</div>
	
	<?php
}
