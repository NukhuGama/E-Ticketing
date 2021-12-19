<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>
<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<title>REQUEST TOOLS HISTORY</title>
	<!-- <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"> -->
	<!-- <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"> -->
	<meta content='maximum-scale=1.0, initial-scale=1.0, width=device-width' name='viewport'>
	<!-- Icons css -->


	<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets11/css/bootstrap.css')  ?>">

	<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets11/css/jquery.dataTables.css') ?>">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets11/css/dataTables.bootstrap4.css') ?>">

	<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/datatables/css/jquery.dataTables.min.css') ?>">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/datatables/css/buttons.dataTables.min.css') ?>">

	<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/style.css') ?>">

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

		.btn_addTools {
			margin-left: 150px;
			margin-right: 20px;
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
		<div class=" main-content app-content ">

			<div class=" mb-4 req_title">

				<h3>REQUEST TOOLS </h3>

			</div>
			<div class="btn_addTools ">
				<div class="float-left"><button class="btn btn-primary" data-toggle="modal" data-target="#addReqTool"><span class="fa fa-plus"></span> Add Request Tools</button></div> </br>
			</div></br>

			<div class="div_table  container">

				<table class="table table-striped table-bordered table-responsive" id="idRequest">
					<thead>
						<tr>
							<th scope="col" class="border-0">NIK</th>
							<th scope="col" class="border-0">Name</th>
							<th scope="col" class="border-0">Position</th>
							<th scope="col" class="border-0">Department</th>
							<th scope="col" class="border-0">Email</th>
							<th scope="col" class="border-0">Phone Number</th>
							<th scope="col" class="border-0">Project Name</th>
							<th scope="col" class="border-0">Description</th>
							<th scope="col" class="border-0">Remark</th>
							<th scope="col" class="border-0">Status</th>
							<th scope="col" class="border-0 ">Date</th>
							<!-- <th>Status</th> -->
							<th class="border-0">Actions</th>
						</tr>
					</thead>
					<tbody id="listRecords">
						<?php foreach ($query as $data) : ?>
							<?php if ($data->iby == $this->session->userdata('nik')) { ?>
								<tr>

									<td><?= $data->iby ?></td>
									<td><?= $data->fullname ?></td>
									<td><?= $data->positionname ?></td>
									<td><?= $data->personalarea ?></td>
									<td><?= $data->email ?></td>
									<td><?= $data->hpnumber ?></td>
									<td><?= $data->requestform_name ?></td>
									<td><?= $data->descrip ?></td>
									<td><?= $data->remark ?></td>
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
									<td><?php if (($data->status_req == 0) || ($data->status_req == 1)) {
											echo (date("d-m-Y", strtotime($data->idt)));
										} else {
											echo (date("d-m-Y", strtotime($data->udt)));
										} ?>
									</td>

									<td>
										<?php if ($data->status_req == 0) { ?>
											<a type="button" title="Edit Form" data-toggle="modal" data-target="#editReqTool<?php echo $data->id; ?>">
												&nbsp;<i class="fa fa-edit" style="font-size:14px; color:blue;">&nbsp;</i>
											</a>

											<a type="button" title="Delete Form" data-toggle="modal" data-target="#deleteReqTool<?php echo $data->id; ?>">
												<i class='fas fa-trash' style='font-size:14px;color:red;'>&nbsp;</i>
											</a>

											<a type="button" title="Upload Form" data-toggle="modal" data-target="#submitReqTool<?php echo $data->id; ?>">
												<i class="fa fa-upload" aria-hidden="true" style='font-size:14px;'>&nbsp;</i>
											</a>
										<?php } elseif ($data->status_req == 4) { ?>
											<form action="<?= site_url('print_approval') ?>" method="post">
												<input type="hidden" name="idR" value="<?= $data->id ?>">
												<button class="btn btn-success">

													<i class="fas fa-print" style="font-size: 20px;"></i>
													Print
												</button>
											</form>


										<?php } ?>

									</td>


								</tr>
							<?php } ?>
						<?php endforeach ?>

					</tbody>
				</table>

			</div>

		</div>


		<!-- ADD FORM-->
		<form action="<?= site_url('add_request_tools') ?>" method="post">
			<div class="modal fade" id="addReqTool" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
				<div class="modal-dialog modal-lg" role="document">
					<div class="modal-content">
						<div class="modal-header">
							<h5 class="modal-title" id="exampleModalLabel">Add Request Tools</h5>
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>
						<div class="modal-body">

							<input type="hidden" name="iby" id="iby" class="form-control" placeholder="" value="<?= $this->session->userdata('nik') ?>" readonly>
							<div class="form-group row">
								<label class="col-md-2 col-form-label">NIK</label>
								<div class="col-md-10">
									<input type="text" name="nik" id="nik" class="form-control" placeholder="" value="<?= $this->session->userdata('nik') ?>" readonly>
								</div>
							</div>
							<div class="form-group row">
								<label class="col-md-2 col-form-label">Name</label>
								<div class="col-md-10">
									<input type="text" name="name" id="name" class="form-control" placeholder="" value="<?= $this->session->userdata('fullname') ?>" readonly>
								</div>
							</div>

							<div class="form-group row">
								<label class="col-md-2 col-form-label">Position</label>
								<div class="col-md-10">
									<input type="text" name="position" id="position" class="form-control" placeholder="" value="<?= $this->session->userdata('positionname') ?>" readonly>
								</div>
							</div>

							<div class="form-group row">
								<label class="col-md-2 col-form-label">Department</label>
								<div class="col-md-10">
									<input type="text" name="department" id="department" class="form-control" placeholder="" value="<?= $this->session->userdata('personalarea') ?>" readonly>
								</div>
							</div>

							<div class="form-group row">
								<label class="col-md-2 col-form-label">Address</label>
								<div class="col-md-10">
									<input type="text" name="address" id="address" class="form-control" placeholder="" value="<?= $this->session->userdata('address') ?>" readonly>
								</div>
							</div>

							<div class="form-group row">
								<label class="col-md-2 col-form-label">Email</label>
								<div class="col-md-10">
									<input type="email" name="email" id="email" class="form-control" placeholder="" value="<?= $this->session->userdata('email') ?>" readonly>
								</div>
							</div>

							<div class="form-group row">
								<label class="col-md-2 col-form-label">Phone Number</label>
								<div class="col-md-10">
									<input type="text" name="phone" id="phone" class="form-control" placeholder="" value="<?= $this->session->userdata('phonenumber') ?>" readonly>
								</div>
							</div>

							<div class="form-group row">
								<label class="col-md-2 col-form-label">Project Name</label>
								<div class="col-md-10">
									<input type="text" name="projectName" id="projectName" class="form-control" placeholder="Project Name" required>
								</div>
							</div>

							<div class="form-group row">
								<label class="col-md-2 col-form-label">Description</label>
								<div class="col-md-10">
									<textarea name="description" id="description" class="form-control" rows="5" placeholder="Description" required></textarea>
								</div>
							</div>



							<div class="form-group row">
								<label class="col-md-2 col-form-label">IT Notes</label>
								<div class="col-md-10">
									<textarea name="itNotes" id="itNotes" class="form-control" rows="5" placeholder="IT Notes" required></textarea>
								</div>
							</div>

							<!-- <div class="form-group row">
					<label class="col-md-2 col-form-label">Insert By</label>
					<div class="col-md-10">
					  <input type="text" name="iby" id="iby" class="form-control" placeholder="Insert by" required>
					</div>
				</div> -->

							<!-- <div class="form-group row">
								<label class="col-md-2 col-form-label">Date</label>
								<div class="col-md-10">
									<input type="text" onfocusin="(this.type='date')" onfocusout="(this.type='text')" class="form-control" placeholder="Date" id="reqDate" name="reqDate" required>
								</div>
							</div> -->

						</div>



						<div class="modal-footer">
							<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
							<button type="submit" class="btn btn-primary">ADD</button>
						</div>

					</div>
				</div>
			</div>
		</form>

		<!-- Edit Form -->

		<?php
		foreach ($query as $data) :

		?>
			<form action="<?= site_url('request_tools/updateRequest_tools') ?>" method="post">
				<div class="modal fade" id="editReqTool<?php echo $data->id; ?>" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
					<div class="modal-dialog modal-lg" role="document">
						<div class="modal-content">
							<div class="modal-header">
								<h5 class="modal-title" id="editModalLabel">Edit Request Form Tools</h5>
								<button type="button" class="close" data-dismiss="modal" aria-label="Close">
									<span aria-hidden="true">&times;</span>
								</button>
							</div>
							<div class="modal-body">

								<input type="hidden" name="id" id="id" class="form-control" placeholder="" value="<?php echo $data->id; ?>" readonly>

								<div class="form-group row">
									<label class="col-md-2 col-form-label">Name</label>
									<div class="col-md-10">
										<input type="text" name="name" id="name" class="form-control" placeholder="" value="<?= $this->session->userdata('fullname') ?>" readonly>
									</div>
								</div>

								<div class="form-group row">
									<label class="col-md-2 col-form-label">Position</label>
									<div class="col-md-10">
										<input type="text" name="position" id="position" class="form-control" placeholder="" value="<?= $this->session->userdata('positionname') ?>" readonly>
									</div>
								</div>

								<div class="form-group row">
									<label class="col-md-2 col-form-label">Department</label>
									<div class="col-md-10">
										<input type="text" name="department" id="department" class="form-control" placeholder="" value="<?= $this->session->userdata('personalarea') ?>" readonly>
									</div>
								</div>

								<div class="form-group row">
									<label class="col-md-2 col-form-label">Address</label>
									<div class="col-md-10">
										<input type="text" name="address" id="address" class="form-control" placeholder="" value="<?= $this->session->userdata('address') ?>" readonly>
									</div>
								</div>

								<div class="form-group row">
									<label class="col-md-2 col-form-label">Email</label>
									<div class="col-md-10">
										<input type="email" name="email" id="email" class="form-control" placeholder="" value="<?= $this->session->userdata('email') ?>" readonly>
									</div>
								</div>

								<div class="form-group row">
									<label class="col-md-2 col-form-label">Phone Number</label>
									<div class="col-md-10">
										<input type="text" name="phone" id="phone" class="form-control" placeholder="" value="<?= $this->session->userdata('phonenumber') ?>" readonly>
									</div>
								</div>

								<div class="form-group row">
									<label class="col-md-2 col-form-label">Project Name</label>
									<div class="col-md-10">
										<input type="text" name="projectName" id="projectName" value="<?= $data->requestform_name ?>" class="form-control" placeholder="" required>
									</div>
								</div>

								<div class="form-group row">
									<label class="col-md-2 col-form-label">Description</label>
									<div class="col-md-10">
										<textarea name="description" id="description" class="form-control" rows="5" placeholder="" required><?= $data->descrip ?></textarea>
									</div>
								</div>

								<!-- <div class="form-group row">
								<label class="col-md-2 col-form-label">Request Type</label>
								<div class="col-md-10">
									<input type="text" name="requestType" id="requestType" value="" class="form-control" placeholder="" required>
								</div>
							</div> -->


								<div class="form-group row">
									<label class="col-md-2 col-form-label">IT Notes</label>
									<div class="col-md-10">
										<textarea name="itNotes" id="itNotes" class="form-control" rows="5" placeholder="" required><?= $data->remark ?></textarea>
									</div>
								</div>

								<!-- <div class="form-group row">
									<label class="col-md-2 col-form-label">Date</label>
									<div class="col-md-10">
										<input type="text" value="<?= $data->idt ?>" onfocusin="(this.type='date')" onfocusout="(this.type='text')" class="form-control" placeholder="" id="reqDate" name="reqDate" required>
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
		<?php endforeach; ?>

		<!-- Delete Form -->
		<?php
		foreach ($query as $data) :

		?>
			<form action="<?= site_url('request_tools/deleteRequest_tools/') ?>" method="post">
				<div class="modal fade" id="deleteReqTool<?php echo $data->id; ?>" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel" aria-hidden="true">
					<input type="hidden" name="id" id="id" class="form-control" placeholder="" value="<?php echo $data->id; ?>" readonly>
					<div class="modal-dialog" role="document">
						<div class="modal-content">
							<div class="modal-header">
								<h5 class="modal-title" id="deleteModalLabel">Delete Form</h5>
								<button type="button" class="close" data-dismiss="modal" aria-label="Close">
									<span aria-hidden="true">&times;</span>
								</button>
							</div>
							<div class="modal-body">
								<strong>Are you sure to delete this form?</strong>
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
		<?php endforeach; ?>

		<!-- Submit Form -->
		<?php
		foreach ($query as $data) :

		?>
			<form action="<?= site_url('request_tools/submitRequest_tools/') ?>" method="post">
				<div class="modal fade" id="submitReqTool<?php echo $data->id; ?>" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel" aria-hidden="true">
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
		<?php endforeach; ?>

		<!-- <script>
    	
    $(document).ready(function() {
        // Setup - add a text input to each footer cell
        $('#example tfoot th').each( function () {
            var title = $(this).text();
            $(this).html( '<input type="text" placeholder="Search '+title+'" />' );
        } );
    
        // DataTable
        var table = $('#idRequest').DataTable({
            initComplete: function () {
                // Apply the search
                this.api().columns().every( function () {
                    var that = this;
    
                    $( 'input', this.footer() ).on( 'keyup change clear', function () {
                        if ( that.search() !== this.value ) {
                            that
                                .search( this.value )
                                .draw();
                        }
                    } );
                } );
            }
        });
    
    } );
</script> -->

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