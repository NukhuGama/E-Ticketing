<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<title>Employee Role</title>
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<link rel="stylesheet" href="<?= base_url('assets/bootstrap/css/bootstrap.css') ?>">

	<link rel="stylesheet" type="text/css" href="<?php echo base_url() . 'assets11/css/bootstrap.css' ?>">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url() . 'assets11/css/jquery.dataTables.css' ?>">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url() . 'assets11/css/dataTables.bootstrap4.css' ?>">

	<link rel="stylesheet" href="assets/css/main_req_tools.css">

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

		.req_title {
			margin-left: 300px;
		}
	</style>
</head>

<body>
	<div class="tbl_container">
		<div class="mb-4 req_title">

			<h3>EMPLOYEE ADD</h3> </br>
			<div class="float-left"><a href="javascript:void(0);" class="btn btn-success" data-toggle="modal" data-target="#addEmpModal"><span class="fa fa-plus"></span> Add Employee</a></div></br>
		</div>
		<div class="container" style="margin: 10px 20px;">

			<table class="table table-bordered table-striped table-responsive" id="idRequest">
				<thead>
					<tr>
						<th>NIK</th>
						<th>Name</th>
						<th>Position</th>
						<th>Address</th>
						<th>Email</th>
						<th>Status</th>
						<th>Date Created</th>
						<th style="text-align: right;">Actions</th>
					</tr>
				</thead>
				<tbody id="listRecords">
				</tbody>
			</table>

		</div>

	</div>




	<!-- fORM -->
	<form id="saveEmpForm" method="post">
		<div class="modal fade" id="addEmpModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
			<div class="modal-dialog modal-lg" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title" id="exampleModalLabel">Add Employee </h5>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<div class="modal-body">

						<div class="form-group row">
							<label class="col-md-2 col-form-label">NIK</label>
							<div class="col-md-10">
								<input type="text" name="nik" id="nik" class="form-control" placeholder="" value="64647" readonly>
							</div>
						</div>

						<div class="form-group row">
							<label class="col-md-2 col-form-label">Name</label>
							<div class="col-md-10">
								<input type="text" name="name" id="name" class="form-control" placeholder="" value="Antonio" readonly>
							</div>
						</div>

						<div class="form-group row">
							<label class="col-md-2 col-form-label">Position</label>
							<div class="col-md-10">
								<input type="text" name="position" id="position" class="form-control" placeholder="" value="IT Manager" readonly>
							</div>
						</div>

						<div class="form-group row">
							<label class="col-md-2 col-form-label">Department</label>
							<div class="col-md-10">
								<input type="text" name="department" id="department" class="form-control" placeholder="" value="IT Application and Network" readonly>
							</div>
						</div>

						<div class="form-group row">
							<label class="col-md-2 col-form-label">Address</label>
							<div class="col-md-10">
								<input type="text" name="address" id="address" class="form-control" placeholder="" value="Comoro" readonly>
							</div>
						</div>

						<div class="form-group row">
							<label class="col-md-2 col-form-label">Email</label>
							<div class="col-md-10">
								<input type="email" name="email" id="email" class="form-control" placeholder="" value="itadmin@gmail.com" readonly>
							</div>
						</div>

						<div class="form-group row">
							<label class="col-md-2 col-form-label">Phone Number</label>
							<div class="col-md-10">
								<input type="text" name="phone" id="phone" class="form-control" placeholder="" value="+670 7868 7890" readonly>
							</div>
						</div>



						<div class="form-group row">
							<label class="col-md-2 col-form-label">Date Created</label>
							<div class="col-md-10">
								<input type="text" onfocusin="(this.type='date')" onfocusout="(this.type='text')" class="form-control" placeholder="Date" id="req_date" name="req_date" requireD>
							</div>
						</div>

					</div>



					<div class="modal-footer">
						<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
						<button type="submit" class="btn btn-primary">Save</button>
					</div>
				</div>
			</div>
		</div>
	</form>

	<!-- Edit Form -->
	<form id="editEmpForm" method="post">
		<div class="modal fade" id="editEmpModal" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
			<div class="modal-dialog modal-lg" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title" id="editModalLabel">Edit Employee</h5>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<div class="modal-body">
						<div class="form-group row">
							<label class="col-md-2 col-form-label">Name*</label>
							<div class="col-md-10">
								<input type="text" name="empName" id="empName" class="form-control" placeholder="Name" required>
							</div>
						</div>
						<div class="form-group row">
							<label class="col-md-2 col-form-label">Age*</label>
							<div class="col-md-10">
								<input type="text" name="empAge" id="empAge" class="form-control" placeholder="Age" required>
							</div>
						</div>
						<div class="form-group row">
							<label class="col-md-2 col-form-label">Skills*</label>
							<div class="col-md-10">
								<input type="text" name="empSkills" id="empSkills" class="form-control" placeholder="Skils" required>
							</div>
						</div>
						<div class="form-group row">
							<label class="col-md-2 col-form-label">Designation*</label>
							<div class="col-md-10">
								<input type="text" name="empDesignation" id="empDesignation" class="form-control" placeholder="Skils" required>
							</div>
						</div>
						<div class="form-group row">
							<label class="col-md-2 col-form-label">Address*</label>
							<div class="col-md-10">
								<textarea name="empAddress" id="empAddress" class="form-control" rows="5" required></textarea>
							</div>
						</div>
					</div>
					<div class="modal-footer">
						<input type="hidden" name="empId" id="empId" class="form-control">
						<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
						<button type="submit" class="btn btn-primary">Update</button>
					</div>
				</div>
			</div>
		</div>
	</form>

	<!-- Delete Form -->
	<form id="deleteEmpForm" method="post">
		<div class="modal fade" id="deleteEmpModal" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel" aria-hidden="true">
			<div class="modal-dialog" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title" id="deleteModalLabel">Delete Employee</h5>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<div class="modal-body">
						<strong>Are you sure to delete this record?</strong>
					</div>
					<div class="modal-footer">
						<input type="hidden" name="deleteEmpId" id="deleteEmpId" class="form-control">
						<button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
						<button type="submit" class="btn btn-primary">Yes</button>
					</div>
				</div>
			</div>
		</div>
	</form>

	<script>
		$(document).ready(function() {
			// Setup - add a text input to each footer cell
			$('#example tfoot th').each(function() {
				var title = $(this).text();
				$(this).html('<input type="text" placeholder="Search ' + title + '" />');
			});

			// DataTable
			var table = $('#idRequest').DataTable({
				initComplete: function() {
					// Apply the search
					this.api().columns().every(function() {
						var that = this;

						$('input', this.footer()).on('keyup change clear', function() {
							if (that.search() !== this.value) {
								that
									.search(this.value)
									.draw();
							}
						});
					});
				}
			});

		});
	</script>

	<script>
		$(document).ready(function() {
			$('#mydata').DataTable();
		});
	</script>

	<script type="text/javascript" src="<?php echo base_url() . 'assets11/js/jquery-3.2.1.js' ?>"></script>
	<script type="text/javascript" src="<?php echo base_url() . 'assets11/js/bootstrap.js' ?>"></script>
	<script type="text/javascript" src="<?php echo base_url() . 'assets11/js/jquery.dataTables.js' ?>"></script>
	<script type="text/javascript" src="<?php echo base_url() . 'assets11/js/dataTables.bootstrap4.js' ?>"></script>
	<script type="text/javascript" src="<?php echo base_url() . 'assets11/js/crud_operation.js' ?>"></script>
</body>

</html>