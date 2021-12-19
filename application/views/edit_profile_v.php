<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<title>Employee Role</title>
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<link rel="stylesheet" type="text/css" href="<?php echo base_url() . 'assets11/css/bootstrap.css' ?>">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url() . 'assets11/css/jquery.dataTables.css' ?>">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url() . 'assets11/css/dataTables.bootstrap4.css' ?>">

	<link rel="stylesheet" href="<?= base_url('assets/css/style.css') ?>">

	<style>
		.dataTables_wrapper .dataTables_paginate .paginate_button {
			box-sizing: border-box;
			display: inline-block;
			min-width: 1.5em;
			padding: 1px;
			margin-left: 2px;
			text-align: center;
			text-decoration: none !important;
			cursor: pointer;
			color: #333 !important;
			border: 1px solid transparent;
			border-radius: 2px;
		}
	</style>
</head>

<body>
	<div class="page">

		<div class="main-content app-content">
			<div class="container-fluid">

				<form action="<?= site_url('edit_profile'); ?>" enctype="multipart/form-data" method="post" accept-charset="utf-8">

					<div class="modal-dialog modal-lg " role="document" style="margin-bottom: 250px; ">
						<div class="modal-content">
							<div class="modal-header">
								<h5 class="modal-title" id="editModalLabel">Edit Profile</h5>

							</div>
							<div class="modal-body">

								<div class="modal-body">
									<input type="hidden" name="nik" id="nik" class="form-control" placeholder="" value="<?= $query['nik'] ?>" readonly>



									<div class="form-group row">
										<label class="col-md-2 col-form-label">Name</label>
										<div class="col-md-10">
											<input type="text" name="name" id="name" class="form-control" placeholder="" value="<?= $query['fullname'] ?>">
										</div>
									</div>

									<div class="form-group row">
										<label class="col-md-2 col-form-label">Address</label>
										<div class="col-md-10">
											<input type="text" name="address" id="address" class="form-control" placeholder="" value=" <?= $query['address'] ?>">
										</div>
									</div>

									<div class="form-group row">
										<label class="col-md-2 col-form-label">Email</label>
										<div class="col-md-10">
											<input type="email" name="email" id="email" class="form-control" placeholder="" value="<?= $query['email'] ?>">
										</div>
									</div>

									<div class="form-group row">
										<label class="col-md-2 col-form-label">Phone Number</label>
										<div class="col-md-10">
											<input type="text" name="phone" id="phone" class="form-control" placeholder="" value="<?= $query['phonenumber'] ?>">
										</div>
									</div>

								</div>

								<div class="form-group row">
									<label class="col-md-2 col-form-label">Your Image</label>
									<div class="col-md-10">
										<input type="file" name="myImg" id="myImg" value="<?php echo "uploads/" . $query['imgemp'] ?>">
									</div>
								</div>
							</div>
							<div class="modal-footer">
								<input type="hidden" name="userId" id="userId" class="form-control">

								<button type="submit" class="btn btn-primary">Submit</button>
							</div>
						</div>
					</div>

				</form>

			</div>
		</div>
	</div>


	<script type="text/javascript" src="<?php echo base_url() . 'assets11/js/jquery-3.2.1.js' ?>"></script>
	<script type="text/javascript" src="<?php echo base_url() . 'assets11/js/bootstrap.js' ?>"></script>
	<script type="text/javascript" src="<?php echo base_url() . 'assets11/js/jquery.dataTables.js' ?>"></script>
	<script type="text/javascript" src="<?php echo base_url() . 'assets11/js/dataTables.bootstrap4.js' ?>"></script>
	<script type="text/javascript" src="<?php echo base_url() . 'assets11/js/crud_operation.js' ?>"></script>
</body>

</html>