<?php

function SimplePage($PageTitle=APPNAME,$BodyCallback = '', $HeadCallback = ''){

	?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<meta content="IE=edge" http-equiv="X-UA-Compatible">
	<meta content="initial-scale=1.0, width=device-width" name="viewport">
	
	<title><?php echo $PageTitle; ?></title>
	
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
	
	<?php
		eval($HeadCallback);
	?>
</head>
<body>
  <div class="container-fluid">
    <div class="row">
      <div class="col-xs-12">
        
        <nav class="navbar navbar-default">
          <div class="container-fluid">
            <div class="navbar-header">
              <a class="navbar-brand" href="./"><?php echo ucwords(APPNAME); ?></a>
            </div>
            <?php
            if(isset($_SESSION['Lists'])){
            ?>
            <div id="navbar" class="navbar-collapse collapse">
              <ul class="nav navbar-nav navbar-right">
                <li class="dropdown">
                  <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><span class="glyphicon glyphicon-option-vertical"></span></a>
                  <ul class="dropdown-menu">
                    <?php  
                      if(isset($_SESSION['Lists'])){
                        foreach($_SESSION['Lists'] as $List){
                         echo "          <li><a href=\"/".$List['Slug']."\">".$List['Name']."</a></li>\n"; 
                        }
                    ?>
                    <li role="separator" class="divider"></li>
                    <li><a href="#">New List</a></li>
                    <li class="divider"></li>
                    
                    <li><a href="./?logout"><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>
                  </ul>
                </li>
              </ul>
            </div><!--/.nav-collapse -->
            <?php
            }
            ?>
          </div><!--/.container-fluid -->
        </nav>
        
      </div>
    </div>
  </div>
	  
	<?php
		eval($BodyCallback);
	?>
</body>
</html>
	<?php
	exit;
}
