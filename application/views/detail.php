<!doctype html>
<html lang="en">
	<head>
		<!-- Required meta tags -->
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<!-- Bootstrap CSS -->
		<link rel="stylesheet" href="<?php echo base_url(); ?>dist/css/bootstrap.min.css">
		<link rel="icon" href="<?php echo base_url('uploads/ico.png'); ?>"/>
		<style>
			body{
				background: #FC466B;
				background: -webkit-linear-gradient(to right, #3F5EFB, #FC466B);
				background: linear-gradient(to right, #3F5EFB, #FC466B);
			}
		</style>
		<title>Watermark!</title>
	</head>
	<body>
		<div class="container mt-5">
			<div class="row justify-content-center">
				<div class="col-xs-8 col-sm-8 col-md-8 col-lg-8">
				<div class="card">
					<div class="card-body">
							<p>
								<a href="<?php echo base_url(); ?>" type="button" class="btn btn-warning"><= Back</a>
							</p>
							<img src="<?php echo base_url('uploads/'). $foto->foto; ?>" class="img-thumbnail">
					</div>
				</div>
			</div>
			</div>
		</div>
		<!-- Optional JavaScript -->
		<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
		<script src="<?php echo base_url(); ?>dist/js/bootstrap.min.js"></script>
	</body>
</html>