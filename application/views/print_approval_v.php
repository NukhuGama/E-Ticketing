<!DOCTYPE html>


<head>
    <meta http-equiv="content-type" content="text/html; charset=UTF-8">
    <style>
        page[size="A4"] {
            background: white;
            width: 21cm;
            height: 29.7cm;
            display: block;
            margin: 0 auto;
            margin-bottom: 0.5cm;
            box-shadow: 0 0 0.5cm rgba(0, 0, 0, 0.5);
        }

        @media print {

            body,
            page[size="A4"] {
                margin: 0;
                box-shadow: 0;
            }
        }


        sup {
            top: -0.4em;
            vertical-align: baseline;
            position: relative;
        }

        sub {
            top: 0.4em;
            vertical-align: baseline;
            position: relative;
        }

        a:link {
            text-decoration: none;
        }

        a:visited {
            text-decoration: none;
        }

        @media screen and (min-device-pixel-ratio:0),
        (-webkit-min-device-pixel-ratio:0),
        (min--moz-device-pixel-ratio: 0) {
            .stl_view {
                font-size: 10em;
                transform: scale(0.1);
                -moz-transform: scale(0.1);
                -webkit-transform: scale(0.1);
                /* -moz-transform-origin: top left;
                -webkit-transform-origin: top left; */

            }
        }



        .ie {
            font-size: 1pt;
        }

        .ie body {
            font-size: 12em;
        }

        .stl_01 {
            position: absolute;
            white-space: nowrap;

        }

        .stl_02 {
            height: 70.16666em;
            font-size: 1em;
            margin: 0em;
            line-height: 0.0em;
            display: block;
            border-style: none;
            width: 49.58333em;
        }

        @supports(-ms-ime-align:auto) {
            .stl_02 {
                width: auto;
                overflow: hidden;
            }
        }

        .stl_03 {
            position: relative;

        }

        .stl_04 {
            /* width: 100%; */
            /* border: 1px solid #000; */
            /* margin-top: 45px; */
            /* margin-left: 10px; */
            width: 150px;
            height: 80px;
            /* clip: rect(2.960836em, 47.14em, 62.62033em, 2.472917em); */
            /* position: absolute; */
            /* pointer-events: none; */

        }

        .stl_05 {
            position: relative;
            width: 49.58333em;
        }

        .stl_06 {
            height: 7.016666em;
        }

        .ie .stl_06 {
            height: 70.16666em;
        }

        .stl_07 {
            font-size: 2.1em;
            font-family: "DOTKHD+TimesNewRomanPS-BoldMT";
            color: #FFFFFF;
            line-height: 1.108521em;
        }

        .stl_08 {
            letter-spacing: 0.08em;
        }

        .stl_09 {
            letter-spacing: 0.07em;


        }

        .stl_10 {
            font-size: 1em;
            font-family: "DOTKHD+TimesNewRomanPS-BoldMT";
            color: #FFFFFF;
            line-height: 1.114174em;


        }


        .stl_11 {
            font-size: 0.83em;
            font-family: "CKFVSO+TimesNewRomanPSMT";
            color: #000000;
            line-height: 1.114174em;
        }

        .stl_12 {
            letter-spacing: 0.06em;
        }

        .stl_13 {
            letter-spacing: 0.04em;
        }

        .stl_14 {
            letter-spacing: 0.05em;
        }

        .stl_15 {
            font-size: 0.9em;
            font-family: "CKFVSO+TimesNewRomanPSMT";
            color: #000000;
            line-height: 1.107422em;
        }



        .stl_16 {
            font-size: 0.83em;
            font-family: "HLLSEB+TimesNewRomanPS-BoldMT";
            color: #000000;
            line-height: 1.114174em;
        }

        .stl_17 {
            font-size: 0.83em;
            font-family: "DOTKHD+TimesNewRomanPS-BoldMT";
            color: #000000;
            line-height: 1.114174em;
        }

        /* Table */
        table {
            font-family: "Times New Roman", Times, serif;
            border-collapse: collapse;
            width: 100%;
            margin-top: 20px;
        }

        td,
        th {
            border: 1px solid #000;
            text-align: left;
            padding: 8px;
        }
    </style>

    <meta charset="utf-8">
    <title>
    </title>

</head>

<body data-new-gr-c-s-check-loaded="8.876.0" data-gr-ext-installed="">

    <a> <?php echo  current_url() . $_SERVER['QUERY_STRING']; ?> </a>
    <table style=" border-collapse:separate;  border-spacing: 0 5px;">
        <tr>
            <th> <img src="<?= base_url('assets/img/brand/logo_telkomcel.png') ?>" alt="" class="stl_04"> </th>
            <th style="background-color: #000; color: antiquewhite; font-size: 25px; width:450px ">TOOL REQUEST FORM</th>
        </tr>

    </table>
    <table class="req_info" id="" style="margin-right: 18px;">
        <tr>
            <th colspan=" 3" style="background-color: #000; color: antiquewhite;">REQUESTOR INFORMATION</th>

        </tr>
        <tr>
            <td style="width: 200px;">Name</td>
            <td style="width: 10px;">:</td>
            <td><?= $query['fullname'] ?></td>
        </tr>
        <tr>
            <td style="width: 200px;">NIK</td>
            <td style="width: 10px;">:</td>
            <td><?= $query['nik'] ?></td>
        </tr>
        <tr>
            <td style="width: 200px;">Address</td>
            <td style="width: 10px;">:</td>
            <td><?= $query['address'] ?></td>
        </tr>
        <tr>
            <td style="width: 200px;">e-Mail Address</td>
            <td style="width: 10px;">:</td>
            <td><?= $query['email'] ?></td>
        </tr>
        <tr>
            <td style="width: 200px;">Phone/Ext</td>
            <td style="width: 10px;">:</td>
            <td><?= $query['phonenumber'] ?></td>
        </tr>
        <tr>
            <td style="width: 200px;">GSM Number</td>
            <td style="width: 10px;">:</td>
            <td></td>
        </tr>

    </table>

    <table class="app_desc" id="" style="margin-right: 16px;">

        <tr>
            <th colspan="3" style="background-color: #000; color: antiquewhite;">APPLICATION DESCRIPTION</th>

        </tr>
        <tr>
            <td style="width: 200px;">Project Name</td>
            <td style="width: 10px;">:</td>
            <td><?= $query['req_name'] ?></td>
        </tr>
        <tr>
            <td style="width: 200px;">Description</td>
            <td style="width: 10px;">:</td>
            <td style="height: 100px;"><?= $query['descrip'] ?></td>
        </tr>
        <tr>
            <td style="width: 200px;">Request Date</td>
            <td style="width: 10px;">:</td>
            <td><?= date("d-M-Y", strtotime($query['req_date'])); ?></td>
        </tr>
        <tr>
            <td style="width: 200px;">Notes IT</td>
            <td style="width: 10px;">:</td>
            <td style="height: 50px;"><?= $query['notes'] ?></td>
        </tr>
    </table>

    <table class="approval_tb" id="">
        <tr>
            <th colspan="4" style="background-color: #000; color: antiquewhite;">APPROVAL</th>

        </tr>
        <tr>
            <td colspan="4" style="text-align: center;">Dili , <?php echo date("d-M-Y"); ?></td>

        </tr>
        <tr>
            <td style="height: 100px; ">Requestor <p style="color: green;">Approved</p>
            </td>
            <td style="height: 100px; ">Manager User<p style="color: green;">Approved</p>
            </td>
            <!-- <td style="height: 100px; ">VP ________ <p style="color: green;">Approved</p>
            </td> -->
            <td style="height: 100px; ">Manager IT <p style="color: green;">Approved</p>
            </td>
            <td style="height: 100px; "> VP NITS&IT <p style="color: green;">Approved</p>
            </td>
        </tr>

        <tr>
            <td>NIK : <?php echo ($query['nik']); ?> </td>
            <td>NIK : <?php echo ('20002'); ?></td>
            <td>NIK : <?php echo ('20004'); ?></td>
            <td>NIK : <?php echo ('20005'); ?></td>
        </tr>


    </table>






</body>

</html>