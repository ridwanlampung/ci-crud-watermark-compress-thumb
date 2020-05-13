<!doctype html>
<html lang="en">
	<head>
		<!-- Required meta tags -->
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<!-- Bootstrap CSS -->
		<link rel="stylesheet" href="<?php echo base_url(); ?>dist/css/bootstrap.min.css">
		<link rel="icon" href="<?php echo base_url('uploads/ico.png'); ?>">
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
			<div class="card row">
				<div class="card-body">
					<?= $this->session->flashdata('message'); ?>
					<?php echo form_open_multipart(); ?>
						<div class="form-group row">
							<label for="inputFoto" class="col-sm-2 col-form-label">Foto</label>
							<div class="col-sm-10">
								<input type="file" name="foto" class="form-control form-control-file" id="inputFoto">
							</div>
						</div>
						<div class="form-group row">
							<div class="col-sm-2"></div>
							<div class="col-sm-10">
								<div class="form-group custom-control custom-switch">
								  <input type="checkbox" name="watermark" class="custom-control-input" id="watermark" value="1" checked>
								  <label class="custom-control-label" for="watermark">Watermark this ?</label>
								</div>
							</div>
						</div>
						<div class="form-group row">
							<div class="col-sm-2"></div>
							<div class="col-sm-10">
								<input type="submit" name="submit" class="btn btn-info" value="Upload">
							</div>
						</div>

					<?php echo form_close(); ?>
				</div>
			</div>
			<div class="row row-cols-1 row-cols-md-2">
				<?php foreach ($foto as $f): ?>
				<div class="col-lg-2 p-2">
					<div class="card">
						<img src="<?php echo base_url('uploads/'). $f->foto; ?>" class="card-img-top" style="width: 100%; height: 155px; object-fit: cover;">
						<div class="card-body">
							<div class="row justify-content-center">
								<a href="<?php echo base_url('welcome/detail/'). $f->id; ?>" class="badge badge-pill badge-info">Detail</a>
								<a href="<?php echo base_url('welcome/delete/'). $f->id; ?>" class="badge badge-pill badge-danger" onclick="return confirm('Are you sure you want to delete this item?');">Delete</a>
							</div>
						</div>
					</div>
				</div>
				<?php endforeach; ?>
			</div>

			<div class="card row mt-5 mb-3">
				<div class="card-body">
					<a href="<?php echo base_url('welcome/delete_all/'); ?>" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this item?');">Delete All</a>
					<a href="https://www.instagram.com/riri_ridwan/" target="_blank" class="btn btn-info">IG : @riri_ridwan</a>

				</div>
			</div>

		</div>
		<!-- Optional JavaScript -->
		<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
		<script src="<?php echo base_url(); ?>dist/js/bootstrap.min.js"></script>
	</body>
</html>