<!doctype html>
<html lang="en">
  <head>
  	<title>Login</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<link href="https://fonts.googleapis.com/css?family=Lato:300,400,700&display=swap" rel="stylesheet">

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	
	<link rel="stylesheet" href="<?php echo asset_url();?>login_assets/css/style.css">

	</head>
	<body>
	<section class="ftco-section">
		<div class="container">
			<!-- <div class="row justify-content-center">
				<div class="col-md-6 text-center mb-5">
					<h2 class="heading-section">Login</h2>
				</div>
			</div> -->
            <div style="margin-top:-60px"></div>
			<div class="row justify-content-center">
				<div class="col-md-7 col-lg-5">
					<div class="login-wrapxx p-4 p-md-5">
                        <div class="icon d-flex align-items-center justify-content-center">
                            
    						<!-- <img src="<?php echo asset_url();?>/login_assets/images/logo.png" alt="" width="350px"> -->

                        </div>
						<hr>
                        <h3 class="text-center mb-4">Sign In</h3>
                        <?php include($content.".php"); ?>
                    </div>
                </div>
            </div>
        </div>
    </section>

	<script src="<?php echo asset_url();?>login_assets/js/jquery.min.js"></script>
    <script src="<?php echo asset_url();?>login_assets/js/popper.js"></script>
    <script src="<?php echo asset_url();?>login_assets/js/bootstrap.min.js"></script>
    <script src="<?php echo asset_url();?>login_assets/js/main.js"></script>

	</body>
</html>

