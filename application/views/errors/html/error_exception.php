
<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>


<!--A Design by W3layouts
Author: W3layout
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<!DOCTYPE html>
<head>
<title>CRMINT | 404</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="CRMINT User Login" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<!-- bootstrap-css -->
<link rel="stylesheet" href="<?=  config_item('base_url'); ?>/assets/donate/css/bootstrap.css">
<!-- //bootstrap-css -->
<!-- Custom CSS -->
<link href="<?=  config_item('base_url'); ?>/assets/donate/css/style.css" rel='stylesheet' type='text/css' />
<!-- font CSS -->
<link href='//fonts.googleapis.com/css?family=Roboto:400,100,100italic,300,300italic,400italic,500,500italic,700,700italic,900,900italic' rel='stylesheet' type='text/css'>
<!-- font-awesome icons -->
<link rel="stylesheet" href="<?=  config_item('base_url'); ?>/assets/donate/css/font.css" type="text/css"/>
<link href="<?=  config_item('base_url'); ?>/assets/donate/css/font-awesome.css" rel="stylesheet"> 
<!-- //font-awesome icons -->
</head>
<body class="signup-body">
		<div class="agile-signup">	
			
			<div class="content2">
				<div class="grids-heading gallery-heading signup-heading">
					<h4>An uncaught Exception was encountered</h4>
					<p>Type: <?php echo get_class($exception); ?></p>
					<p>Message: <?php echo $message; ?></p>
					<p>Filename: <?php echo $exception->getFile(); ?></p>
					<p>Line Number: <?php echo $exception->getLine(); ?></p>
				</div>

				<div>
					<?php if (defined('SHOW_DEBUG_BACKTRACE') && SHOW_DEBUG_BACKTRACE === TRUE): ?>

					<p>Backtrace:</p>
					<?php foreach ($exception->getTrace() as $error): ?>

						<?php if (isset($error['file']) && strpos($error['file'], realpath(BASEPATH)) !== 0): ?>

							<p style="margin-left:10px">
							File: <?php echo $error['file']; ?><br />
							Line: <?php echo $error['line']; ?><br />
							Function: <?php echo $error['function']; ?>
							</p>
						<?php endif ?>

					<?php endforeach ?>

					<?php endif ?>
				</div>
				
				<a href="<?=  config_item('base_url'); ?>">Back To Home</a>
			</div>
			
			<!-- footer -->
			<div class="copyright">
                <p class="footer">Page rendered in <strong>{elapsed_time}</strong> seconds. <?php echo  (ENVIRONMENT === 'development') ?  'CodeIgniter Version <strong>' . CI_VERSION . '</strong>' : '' ?>. © <?= date('Y') ?>. All Rights Reserved</p>
			</div>
			<!-- //footer -->
			
		</div>
    
    <script src="<?=  config_item('base_url'); ?>/assets/donate/js/jquery.min.js"></script>
    <script src="<?=  config_item('base_url'); ?>/assets/donate/js/modernizr.js"></script>
    <script src="<?=  config_item('base_url'); ?>/assets/donate/js/bootstrap.js"></script>
	<script src="<?=  config_item('base_url'); ?>/assets/donate/js/proton.js"></script>
</body>
</html>