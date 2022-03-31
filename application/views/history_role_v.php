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

                <h3>LOG HISTORY ROLE ACCESSIBILITY</h3> </br>


            </div>

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
                            <th>Log Date</th>
                        </tr>
                    </thead>

                    <tbody id="listRecords">
                        <?php foreach ($query as $data) { ?>

                            <?php if ($data->iby == $this->session->userdata('nik')) { ?>

                                <tr>
                                    <td> <?php echo $data->iby; ?></td>
                                    <td> <?php echo $data->fullname; ?></td>
                                    <td> <?php echo $data->positionname; ?></td>
                                    <td> <?php echo $data->address; ?></td>
                                    <td> <?php echo $data->email; ?></td>
                                    <td> <?php echo $data->hpnumber; ?></td>
                                    <td> <?php echo $data->requestform_name; ?></td>
                                    <td> <?php echo $data->role_access; ?> </td>
                                    <td> <?php echo $data->remark; ?></td>
                                    <td>
                                        <?php
                                        if ($data->is_deleted == 0) {
                                            if ($data->status_req == 0) {
                                                if ($data->uby == "") {
                                                    echo $data->status_req . ' by ' . $data->fullname;
                                                } else {
                                                    echo 'Updated Draft' . ' by ' . $data->fullname;
                                                }
                                            } else {
                                                if ($data->status_req < 0) {
                                                    echo $data->status_req . ' by ' . $test->fullname;
                                                } else {
                                                    echo $data->status_req . ' by ' . $data->uby;
                                                }
                                            }
                                        } elseif ($data->is_deleted == 1) {
                                            echo 'Deleted' . ' by ' . $data->fullname;
                                        }


                                        ?>
                                    </td>
                                    <td>
                                        <?php
                                        if ($data->uby == "") {
                                            echo date("d-m-Y", strtotime($data->idt));
                                        } else {
                                            echo date("d-m-Y", strtotime($data->udt));
                                        }
                                        ?>
                                    </td>


                                </tr>

                            <?php } ?>
                        <?php } ?>

                    </tbody>

                </table>

            </div>

        </div>


        <!-- Edit Form -->


        <!-- Delete Form -->



        <!-- Submit Form -->

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