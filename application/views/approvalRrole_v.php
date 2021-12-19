<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>Approval Request Role</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="<?= base_url('assets/bootstrap/css/bootstrap.css') ?>">
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

        .btn_addRole {
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
        <div class="main-content app-content">

            <div class="mb-4 req_title">

                <h3>Approval Request Role </h3>

            </div>
            <!-- <div class="btn_addTools ">
            <div class="float-left"><button class="btn btn-primary" data-toggle="modal" data-target="#addReqTool"><span class="fa fa-plus"></span> Add Request Tools</button></div> </br>
        </div></br> -->

            <div class="div_table  container">

                <table class="table  table-striped table-bordered table-responsive" id="idRequest">
                    <thead>
                        <tr>
                            <th scope="col" class="border-0">NIK</th>
                            <th scope="col" class="border-0">Name</th>
                            <th scope="col" class="border-0">Position</th>
                            <th scope="col" class="border-0">Email</th>
                            <th scope="col" class="border-0">Phone Number</th>
                            <th scope="col" class="border-0">Application Name</th>
                            <th scope="col" class="border-0">Role Accessibilty</th>
                            <th scope="col" class="border-0">Remark</th>
                            <th scope="col" class="border-0">Status</th>
                            <th scope="col" class="border-0 ">Date</th>
                            <!-- <th>Status</th> -->
                            <th class="border-0">Actions</th>
                        </tr>
                    </thead>


                    <tbody id="listRecords">

                        <?php foreach ($query as $data) { ?>

                            <!-- Approved or Rejecting By Manager User -->
                            <?php if (($this->session->userdata('nik') == '20002') && ($data->status_req == 1)) { ?>
                                <tr>

                                    <td><?php echo $data->iby ?></td>
                                    <td><?php echo $data->fullname ?></td>
                                    <td><?php echo $data->positionname ?></td>
                                    <td><?php echo $data->email ?></td>
                                    <td><?php echo $data->hpnumber ?></td>
                                    <td><?php echo $data->requestform_name ?></td>
                                    <td><?php echo $data->role_access ?> </td>
                                    <td><?php echo $data->remark ?></td>
                                    <td><?php echo ('Submitted From Requestor'); ?></td>
                                    <td><?php echo date("d-m-Y", strtotime($data->idt)) ?></td>

                                    <td>
                                        <div class="" style="width:100px">


                                            <?php if ($data->status_req == 1) { ?>
                                                <form action="<?php echo site_url('dApproval_reqRole') ?>" method="post">
                                                    <input type="hidden" name="idR" value="<?php echo $data->id ?>">
                                                    <button class="btn btn-info">

                                                        <i class="fas fa-info" style="font-size: 20ypx;"></i>
                                                        Detail
                                                    </button>
                                                </form>
                                            <?php } ?>

                                            <!-- <a href="" style="width: 90px;" class="btn btn-danger">
                                        <i class="fas fa-times-circle" style="font-size: 12px;">Reject</i>
                                    </a> -->
                                        </div>

                                    </td>


                                </tr>

                                <!-- Approved or Rejecting By Manager IT -->
                            <?php } elseif (($this->session->userdata('nik') == '20004') && ($data->status_req == 2)) { ?>
                                <tr>

                                    <td><?php echo $data->iby ?></td>
                                    <td><?php echo $data->fullname ?></td>
                                    <td><?php echo $data->positionname ?></td>
                                    <td><?php echo $data->email ?></td>
                                    <td><?php echo $data->hpnumber ?></td>
                                    <td><?php echo $data->requestform_name ?></td>
                                    <td><?php echo $data->role_access ?> </td>
                                    <td><?php echo $data->remark ?></td>
                                    <td><?php echo ('Approved by Manager User'); ?></td>
                                    <td><?php echo date("d-m-Y", strtotime($data->udt)); ?></td>

                                    <td>
                                        <div class="" style="width:100px">

                                            <?php if ($data->status_req == 2) { ?>
                                                <form action="<?php echo site_url('dApproval_reqRole') ?>" method="post">
                                                    <input type="hidden" name="idR" value="<?php echo $data->id ?>">
                                                    <button class="btn btn-info">

                                                        <i class="fas fa-info" style="font-size: 20ypx;"></i>
                                                        Detail
                                                    </button>
                                                </form>
                                            <?php } ?>

                                            <!-- <a href="" style="width: 90px;" class="btn btn-danger">
                                        <i class="fas fa-times-circle" style="font-size: 12px;">Reject</i>
                                    </a> -->
                                        </div>

                                    </td>

                                </tr>

                                <!-- Approved or Rejecting By VP NIT -->

                            <?php } elseif (($this->session->userdata('nik') == '20005') && (($data->status_req == 3) || ($data->status_req == 4))) { ?>
                                <tr>
                                    <td><?php echo $data->iby ?></td>
                                    <td><?php echo $data->fullname ?></td>
                                    <td><?php echo $data->positionname ?></td>
                                    <td><?php echo $data->email ?></td>
                                    <td><?php echo $data->hpnumber ?></td>
                                    <td><?php echo $data->requestform_name ?></td>
                                    <td><?php echo $data->role_access ?> </td>
                                    <td><?php echo $data->remark ?></td>
                                    <td>
                                        <?php if ($data->status_req == 3) {
                                            echo ('Approved by Manager IT');
                                        } elseif ($data->status_req == 4) {
                                            echo ('Approved by VP NIT');
                                        } ?>

                                    </td>
                                    <td><?php echo date("d-m-Y", strtotime($data->udt)); ?></td>

                                    <td>
                                        <div class="" style="width:100px">

                                            <?php if ($data->status_req == 3) { ?>
                                                <form action="<?php echo site_url('dApproval_reqRole') ?>" method="post">
                                                    <input type="hidden" name="idR" value="<?php echo $data->id ?>">
                                                    <button class="btn btn-info">

                                                        <i class="fas fa-info" style="font-size: 20ypx;"></i>
                                                        Detail
                                                    </button>
                                                </form>
                                            <?php } elseif ($data->status_req == 4) { ?>
                                                <form action="<?php echo site_url('print_approval/print_reqRole') ?>" method="post">
                                                    <input type="hidden" name="idR" value="<?php echo $data->id ?>">
                                                    <button class="btn btn-success">

                                                        <i class="fas fa-print" style="font-size: 20ypx;"></i>
                                                        Print
                                                    </button>
                                                </form>


                                            <?php } ?>

                                            <!-- <a href="" style="width: 90px;" class="btn btn-danger">
                                        <i class="fas fa-times-circle" style="font-size: 12px;">Reject</i>
                                    </a> -->
                                        </div>

                                    </td>

                                </tr>

                            <?php } ?>
                        <?php } ?>



                    </tbody>
                </table>

            </div>

        </div>
    </div>


    <!-- Detail Information Button -->


    <script>
        $(document).ready(function() {
            $('#idRequest').DataTable();
        });
    </script>




</body>

</html>