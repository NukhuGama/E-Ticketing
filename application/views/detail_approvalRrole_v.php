<head>
    <link rel="stylesheet" href="<?= base_url('assets/bootstrap/css/bootstrap.css') ?>">
    <link rel="stylesheet" href="<?= base_url('assets/css/style.css') ?>">
    <style>
        /* .con {
            display: grid;
            grid-gap: 5px;
            grid-template-columns: repeat(auto-fit, 100px); 
            grid-template-rows: repeat(2, 100px);
        } */
    </style>

</head>
<div class="page">
    <div class="main-content app-content">

        <div style="text-align:center; margin-top:60px;">
            <center>
                <h3>E-TICKETING INTERNAL TELKOMCEL TIMOR-LESTE</h3>
                <h6>Timor Plaza, 4th Floor. Rua Presidente Nicolau Lobato Comoro</h6>
                <h6> WEBSITE https://telkomcel.tl</h6>
                <h6>TELP : 7373 7373 || EMAIL : care@telkomcel.tl</h6>
            </center>
        </div>
        </br>
        <hr>
        </hr>

        <div class="container" style=" margin-top:40px; ">
            <table class="table  table-striped table-bordered " style="font-size: 16px;">

                <tr style="text-align: center;">
                    <th> Application Name </th>
                    <th style="width: 450px;"> Role Accessibility </th>
                    <th> Request Date </th>
                </tr>

                <tr>
                    <!-- <td>Project name</td> -->
                    <td> <?= $query['req_name']; ?></td>
                    <td> <?= $query['role_access']  ?></td>
                    <td> <?= date("d-M-Y", strtotime($query['req_date'])) ?> </td>
                </tr>
                <!-- <tr>
                <td>Request type</td>
                <td>:> </td>
            </tr> -->
                <!-- <tr>
                <td>Description</td>

            </tr>
            <tr>
                <td> Request Date </td>

            </tr> -->

            </table><br>
            <br><br> </br> </br>

            <?php if ($query['status_req'] == 1) { ?>
                <h6 style="color:green; font-size:16px">Status : This ticket is uploaded by <?= $query['fullname'] ?></h6>
            <?php } elseif ($query['status_req'] == 2) { ?>
                <h5 style="color:green; font-size:16px "> This ticket is approved by Manager User </h5>
            <?php } elseif ($query['status_req'] == 3) { ?>
                <h5 style="color:green; font-size:16px "> This ticket is approved by Manager IT </h5>
            <?php } elseif ($query['status_req'] == 4) { ?>
                <h5 style="color:green; font-size:16px "> This ticket is approved by VP NIT </h5>
            <?php } ?>

            <!-- <p>Note For Reject</p> -->
            <!-- <textarea name="rejectNote" id="" cols="40" rows="5" placeholder="Please write the notes for rejecting"></textarea> </br></br> -->

            <div style="margin-bottom: 20px;">
                <!-- Satust Request is uploaded by the requestor -->
                <?php if ($query['status_req'] == 1) { ?>
                    <form action="<?= site_url('approval_r_role/rejectedManagerUser') ?>" method="post">
                        <input type="hidden" value="<?= $query['id']; ?>" name="id_reject_user">

                        <textarea name="rejectNoteMuser" id="txtArea" cols="40" rows="5" placeholder="Please write the notes for rejecting"></textarea></br></br>
                        <button type="submit" class="btn btn-danger" id="btnReject" style='display:none;'>
                            Reject
                        </button>

                    </form> </br>

                    <form action="<?= site_url('approval_r_role/approvalManagerUser') ?>" method="post">
                        <input type="hidden" value="<?= $query['id']; ?>" name="id_approve_user">
                        <button type="submit" class="btn btn-success" id="btnApprove">
                            Approve
                        </button>
                    </form></br>
                    <!-- If status request is approved by Manager User -->
                <?php } elseif ($query['status_req'] == 2) { ?>
                    <form action="<?= site_url('approval_r_role/rejectedManagerIT') ?>" method="post">
                        <input type="hidden" value="<?= $query['id']; ?>" name="id_reject_IT">

                        <textarea name="rejectNoteMIT" id="txtArea" cols="40" rows="5" placeholder="Please write the notes for rejecting"></textarea></br></br>
                        <button type="submit" class="btn btn-danger" id="btnReject" style='display:none;'>
                            Reject
                        </button>

                    </form> </br>

                    <form action="<?= site_url('approval_r_role/approvalManagerIT') ?>" method="post">
                        <input type="hidden" value="<?= $query['id']; ?>" name="id_approve_IT">
                        <button type="submit" class="btn btn-success" id="btnApprove">
                            Approve
                        </button>
                    </form></br>

                    <!-- Is status Status Request is approved by Manager IT -->
                <?php } elseif ($query['status_req'] == 3) { ?>
                    <form action="<?= site_url('approval_r_role/rejectedVP_NIT') ?>" method="post">
                        <input type="hidden" value="<?= $query['id']; ?>" name="id_reject_VP">

                        <textarea name="rejectNoteVP" id="txtArea" cols="40" rows="5" placeholder="Please write the notes for rejecting"></textarea></br></br>
                        <button type="submit" class="btn btn-danger" id="btnReject" style='display:none;'>
                            Reject
                        </button>

                    </form> </br>

                    <form action="<?= site_url('approval_r_role/approvalVP_NIT') ?>" method="post">
                        <input type="hidden" value="<?= $query['id']; ?>" name="id_approve_VP">
                        <button type="submit" class="btn btn-success" id="btnApprove">
                            Approve
                        </button>
                    </form></br>
                <?php } ?>


            </div>


        </div>



    </div>

</div>


<script>
    $(document).ready(function() {
        $("#txtArea").on('click', function() {
            $("#btnReject").show();
            $("#btnApprove").hide();
        });


    });
</script>