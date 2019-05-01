<!--A Design by W3layouts
Author: W3layout
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<!DOCTYPE html>
<head>
<title>CRMINT | User Login</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="CRMINT User Login" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<!-- bootstrap-css -->
<link rel="stylesheet" href="<?= base_url() ?>assets/donate/css/bootstrap.css">
<!-- //bootstrap-css -->
<!-- Custom CSS -->
<link href="<?= base_url() ?>assets/donate/css/style.css" rel='stylesheet' type='text/css' />
<!-- font CSS -->
<link href='//fonts.googleapis.com/css?family=Roboto:400,100,100italic,300,300italic,400italic,500,500italic,700,700italic,900,900italic' rel='stylesheet' type='text/css'>
<!-- font-awesome icons -->
<link rel="stylesheet" href="<?= base_url() ?>assets/donate/css/font.css" type="text/css"/>
<link href="<?= base_url() ?>assets/donate/css/font-awesome.css" rel="stylesheet"> 
<!-- //font-awesome icons -->
</head>
<body class="signup-body">
		<div class="agile-signup">	
			
			<div class="content2">
				<div class="grids-heading gallery-heading signup-heading">
					<h2>CRMINT - User Login</h2>
				</div>
				<form action="<?= site_url() ?>/user/login" method="post">
					<?php if(isset($error_msg) && !empty($error_msg)) :?>
						<alert>
							<?= $error_msg; ?>
						</alert>
					<?php endif; ?>
					<input type="text" name="username" placeholder="Username" required>
					<input type="password" name="password" placeholder="Password" required>
					<input type="submit" class="register" value="Login">
				</form>
				
				<a href="<?= site_url() ?>">Back To Home</a>
			</div>
			
			<!-- footer -->
			<div class="copyright">
                <p class="footer">Page rendered in <strong>{elapsed_time}</strong> seconds. <?php echo  (ENVIRONMENT === 'development') ?  'CodeIgniter Version <strong>' . CI_VERSION . '</strong>' : '' ?>. © <?= date('Y') ?>. All Rights Reserved.</p>
			</div>
			<!-- //footer -->
			
		</div>
    
    <script src="<?= base_url() ?>assets/donate/js/modernizr.js"></script>
	<script src="<?= base_url() ?>assets/donate/js/proton.js"></script>
</body>
</html>
