<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<title>REQUEST ROLE ACCESSIBILITY HISTORY</title>
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<link rel="stylesheet" type="text/css" href="<?php echo base_url() . 'assets11/css/bootstrap.css'; ?>">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url() . 'assets11/css/jquery.dataTables.css'; ?>">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url() . 'assets11/css/dataTables.bootstrap4.css'; ?>">

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

		.req_title {
			margin-left: 150px;
			margin-top: 40px;
		}

		.btn_addRole {
			margin-left: 150px;
			margin-right: 20px;
			margin-bottom: 10px;
			display: flex;

		}

		.div_table {
			/* margin-left: auto; */
			margin-right: auto;
			font-size: 14px;
			height: 100%;
			table-layout: fixed;
			display: flex;
			justify-content: center;

			/* margin-left: 350px; */

			/* margin-right: 50px; */


		}
	</style>
</head>

<body>
	<div class="page">
		<!-- <div class="main-content app-content"> -->

		<div class="main-content app-content">
			<div class="mb-4 req_title">

				<h3>REQUEST ROLE ACCESSIBILITY </h3> </br>


			</div>
			<div class="btn_addRole">
				<div class="float-left"><button class="btn btn-success" data-toggle="modal" data-target="#addReqRole"><span class="fa fa-plus"></span> Add Request Role</button></div> </br>
			</div></br>
			<div class="div_table  container">

				<table class="table  table-striped table-bordered table-responsive" id="idRequest">
					<thead>
						<tr>
							<th>NIK</th>
							<th>Name</th>
							<th>Position</th>
							<th>Address</th>
							<th>Email</th>
							<th>Phone Number</th>
							<th>Application Name</th>
							<th>Role Accessibility</th>
							<th>Remark</th>
							<th>Status</th>
							<th> Request Date</th>
							<th style="text-align: right;">Actions</th>
						</tr>
					</thead>

					<tbody id="listRecords">
						<?php foreach ($query as $data) { ?>

							<?php if ($data->iby == $this->session->userdata('nik')) { ?>

								<tr>
									<td><?php echo $data->iby; ?></td>
									<td><?php echo $data->fullname; ?></td>
									<td><?php echo $data->positionname; ?></td>
									<td><?php echo $data->address; ?></td>
									<td><?php echo $data->email; ?></td>
									<td><?php echo $data->hpnumber; ?></td>
									<td><?php echo $data->requestform_name; ?></td>
									<td>
										<?php echo $data->role_access; ?>
									</td>
									<td><?php echo $data->remark; ?></td>
									<td>
										<?php
										if ($data->status_req == 0) {
											echo ('Draft');
										} elseif ($data->status_req == 1) {
											echo ('Submitted From Requestor');
										} elseif ($data->status_req == 2) {
											echo ('Approved by Manager User');
										} elseif ($data->status_req == 3) {
											echo ('Approved by Manager IT');
										} elseif ($data->status_req == 4) {
											echo ('Approved by VP NIT');
										} elseif ($data->status_req == -1) {
											echo ('Rejected by Manager User');
										} elseif ($data->status_req == -2) {
											echo ('Rejected by Manager IT');
										} elseif ($data->status_req == -3) {
											echo ('Rejected by VP NIT');
										}
										?></td>
									<td><?php echo date("d-m-Y", strtotime($data->idt)); ?></td>

									<td>
										<?php if ($data->status_req == 0) { ?>
											<a type="button" title="Edit Form" data-toggle="modal" data-target="#editReqRole<?php echo $data->id; ?>">
												&nbsp;<i class="fa fa-edit" style="font-size:14px; color:blue;">&NonBreakingSpace;</i>
											</a>

											<a type="button" title="Delete Form" data-toggle="modal" data-target="#deleteReqRole<?php echo $data->id; ?>">
												<i class='fas fa-trash' style='font-size:14px;color:red;'>&nbsp;</i>
											</a>

											<a type="button" title="Upload Form" data-toggle="modal" data-target="#submitReqRole<?php echo $data->id; ?>">
												<i class="fa fa-upload" aria-hidden="true" style='font-size:14px;'>&nbsp;</i>
											</a>
										<?php } elseif ($data->status_req == 4) { ?>
											<form action="<?php echo site_url('print_approval/print_reqRole') ?>" method="post">
												<input type="hidden" name="idR" value="<?php echo $data->id; ?>">
												<button class="btn btn-success">

													<i class="fas fa-print" style="font-size: 20ypx;"></i>
													Print
												</button>
											</form>


										<?php } ?>

									</td>


								</tr>

							<?php } ?>
						<?php } ?>

					</tbody>

				</table>

			</div>

		</div>





		<!-- ADD REQUEST ROLE -->
		<form action="<?php echo site_url('add_request_role') ?>" method="post">
			<div class="modal fade" id="addReqRole" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
				<div class="modal-dialog modal-lg" role="document">
					<div class="modal-content">
						<div class="modal-header">
							<h5 class="modal-title" id="exampleModalLabel">Add Role Accessibilty </h5>
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>
						<div class="modal-body">

							<input type="hidden" name="id" id="id" class="form-control" placeholder="" value="<?php echo $data->id; ?>" readonly>

							<input type="hidden" name="iby" id="iby" class="form-control" placeholder="" value="<?php echo $this->session->userdata('nik') ?>" readonly>
							<div class="form-group row">
								<label class="col-md-2 col-form-label">NIK</label>
								<div class="col-md-10">
									<input type="text" name="nik" id="nik" class="form-control" placeholder="" value="<?php echo $this->session->userdata('nik') ?>" readonly>
								</div>
							</div>

							<div class="form-group row">
								<label class="col-md-2 col-form-label">Name</label>
								<div class="col-md-10">
									<input type="text" name="name" id="name" class="form-control" placeholder="" value="<?php echo $this->session->userdata('fullname') ?>" readonly>
								</div>
							</div>

							<div class="form-group row">
								<label class="col-md-2 col-form-label">Position</label>
								<div class="col-md-10">
									<input type="text" name="position" id="position" class="form-control" placeholder="" value="<?php echo $this->session->userdata('positionname') ?>" readonly>
								</div>
							</div>

							<!-- <div class="form-group row">
							<label class="col-md-2 col-form-label">Department</label>
							<div class="col-md-10">
								<input type="text" name="department" id="department" class="form-control" placeholder="" value="IT Application and Network" readonly>
							</div>
						</div> -->

							<div class="form-group row">
								<label class="col-md-2 col-form-label">Address</label>
								<div class="col-md-10">
									<input type="text" name="address" id="address" class="form-control" placeholder="" value="<?php echo $this->session->userdata('address') ?>" readonly>
								</div>
							</div>

							<div class="form-group row">
								<label class="col-md-2 col-form-label">Email</label>
								<div class="col-md-10">
									<input type="email" name="email" id="email" class="form-control" placeholder="" value="<?php echo $this->session->userdata('email') ?>" readonly>
								</div>
							</div>

							<div class="form-group row">
								<label class="col-md-2 col-form-label">Phone Number</label>
								<div class="col-md-10">
									<input type="text" name="phone" id="phone" class="form-control" placeholder="" value="<?php echo $this->session->userdata('phonenumber') ?>" readonly>
								</div>
							</div>

							<div class="form-group row">
								<label class="col-md-2 col-form-label">Application Name</label>
								<div class="col-md-10">
									<input type="text" name="nameApp" id="nameApp" class="form-control" placeholder="Application Name" required>
								</div>
							</div>

							<!-- <div class="form-group row">
							<label class="col-md-2 col-form-label">Request Type</label>
							<div class="col-md-10">
							
								<select name="requestType" id="requestType" class="form-control" placeholder="Request Type" required>
									<option value="Request Role Accessibility">Request Role Accessibility</option>
									<option value="Request Tools">Request Tools</option>
								</select>
							</div>
						</div> -->


							<div class="form-group row">
								<label class="col-md-2 col-form-label">Role Accessibility</label>
								<div class="col-md-10">
									<textarea name="role_access" id="role_access" class="form-control" rows="5" placeholder="Role Accessibility" required></textarea>
									<!-- <select name="role_access" id="role_access" required>
									<option value="1">Access Role Request Tools(Project)</option>
									<option value="2">Access Role Approval</option>

								</select> -->
								</div>
							</div>

							<div class="form-group row">
								<label class="col-md-2 col-form-label">IT Notes</label>
								<div class="col-md-10">
									<textarea name="itNotes" id="itNotes" class="form-control" rows="5" placeholder="IT Notes" required></textarea>
								</div>
							</div>
							<!-- 
							<div class="form-group row">
								<label class="col-md-2 col-form-label">Request date</label>
								<div class="col-md-10">
									<input type="text" onfocusin="(this.type='date')" onfocusout="(this.type='text')" class="form-control" placeholder="Date" id="req_date" name="req_date" requireD>
								</div>
							</div> -->

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
		<?php foreach ($query as $data) { ?>
			<form action="<?php echo site_url('edit_role_access') ?>" method="post">
				<div class="modal fade" id="editReqRole<?php echo $data->id; ?>" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
					<div class="modal-dialog modal-lg" role="document">
						<div class="modal-content">

							<div class="modal-header">
								<h5 class="modal-title" id="editModalLabel">Edit Request Role</h5>
								<button type="button" class="close" data-dismiss="modal" aria-label="Close">
									<span aria-hidden="true">&times;</span>
								</button>
							</div>

							<div class="modal-body">
								<input type="hidden" name="id" id="id" class="form-control" placeholder="" value="<?php echo $data->id; ?>" readonly>

								<div class="form-group row">
									<label class="col-md-2 col-form-label">NIK</label>
									<div class="col-md-10">
										<input type="text" name="nik" id="nik" class="form-control" placeholder="" value="<?php echo $this->session->userdata('nik') ?>" readonly>
									</div>
								</div>

								<div class="form-group row">
									<label class="col-md-2 col-form-label">Name</label>
									<div class="col-md-10">
										<input type="text" name="name" id="name" class="form-control" placeholder="" value="<?php echo $this->session->userdata('fullname') ?>" readonly>
									</div>
								</div>

								<div class="form-group row">
									<label class="col-md-2 col-form-label">Position</label>
									<div class="col-md-10">
										<input type="text" name="position" id="position" class="form-control" placeholder="" value="<?php echo $this->session->userdata('positionname') ?>" readonly>
									</div>
								</div>



								<div class="form-group row">
									<label class="col-md-2 col-form-label">Address</label>
									<div class="col-md-10">
										<input type="text" name="address" id="address" class="form-control" placeholder="" value="<?php echo $this->session->userdata('address') ?>" readonly>
									</div>
								</div>

								<div class="form-group row">
									<label class="col-md-2 col-form-label">Email</label>
									<div class="col-md-10">
										<input type="email" name="email" id="email" class="form-control" placeholder="" value="<?php echo $this->session->userdata('email') ?>" readonly>
									</div>
								</div>

								<div class="form-group row">
									<label class="col-md-2 col-form-label">Phone Number</label>
									<div class="col-md-10">
										<input type="text" name="phone" id="phone" class="form-control" placeholder="" value="<?php echo $this->session->userdata('phonenumber') ?>" readonly>
									</div>
								</div>

								<div class="form-group row">
									<label class="col-md-2 col-form-label">Application Name</label>
									<div class="col-md-10">
										<input type="text" name="nameApp" id="nameApp" class="form-control" placeholder="" value="<?php echo $data->requestform_name ?>" required>
									</div>
								</div>




								<div class="form-group row">
									<label class="col-md-2 col-form-label">Role Accessibility</label>
									<div class="col-md-10">
										<textarea name="role_access" id="role_access" class="form-control" rows="5" placeholder="Role Accessibility" required><?php echo $data->role_access ?></textarea>

									</div>
								</div>

								<div class="form-group row">
									<label class="col-md-2 col-form-label">IT Notes</label>
									<div class="col-md-10">
										<textarea name="itNotes" id="itNotes" class="form-control" rows="5" placeholder="" required> <?php echo $data->remark ?> </textarea>
									</div>
								</div>
								<!-- 
								<div class="form-group row">
									<label class="col-md-2 col-form-label">Request date</label>
									<div class="col-md-10">
										<input type="text" value="<?php echo $data->idt ?>" onfocusin="(this.type='date')" onfocusout="(this.type='text')" class="form-control" placeholder="" id="req_date" name="req_date" required>
									</div>
								</div> -->

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

		<?php } ?>

		<!-- Delete Form -->
		<?php foreach ($query as $data) { ?>
			<form action="<?php echo site_url('delete_request_role') ?>" method="post">
				<div class="modal fade" id="deleteReqRole<?php echo $data->id ?>" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel" aria-hidden="true">

					<input type="hidden" id="id" name="id" class="form-control" placeholder="" value="<?php echo $data->id; ?>" readonly>
					<div class="modal-dialog" role="document">
						<div class="modal-content">
							<div class="modal-header">
								<h5 class="modal-title" id="deleteModalLabel">Delete Request Role</h5>
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
		<?php  } ?>


		<!-- Submit Form -->
		<?php foreach ($query as $data) { ?>
			<form action="<?php echo site_url('submit_request_role'); ?>" method="post">
				<div class="modal fade" id="submitReqRole<?php echo $data->id; ?>" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel" aria-hidden="true">
					<input type="hidden" name="id" id="id" class="form-control" placeholder="" value="<?php echo $data->id; ?>" readonly>
					<div class="modal-dialog" role="document">
						<div class="modal-content">
							<div class="modal-body">
								<strong>Are you sure to upload this form?</strong>
							</div>
							<div class="modal-footer">
								<input type="hidden" name="submitReqId" id="submitReqpId" class="form-control">
								<button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
								<button type="submit" class="btn btn-primary">Yes</button>
							</div>
						</div>
					</div>
				</div>
			</form>
		<?php } ?>

	</div>


	<script>
		$(document).ready(function() {
			$('#idRequest').DataTable();
		});
	</script>


	<script type="text/javascript" src="<?php echo base_url() . 'assets11/js/jquery-3.2.1.js'; ?>"> </script>
	<script type="text/javascript" src="<?php echo base_url() . 'assets11/js/bootstrap.js'; ?>"> </script>
	<script type="text/javascript" src="<?php echo base_url() . 'assets11/js/jquery.dataTables.js'; ?>"> </script>
	<script type="text/javascript" src="<?php echo base_url() . 'assets11/js/dataTables.bootstrap4.js'; ?>"> </script>
	<script type="text/javascript" src="<?php echo base_url() . 'assets11/js/crud_operation.js'; ?>"> </script>
</body>

</html>