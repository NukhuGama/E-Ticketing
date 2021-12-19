<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">

    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="<?= base_url('assets/bootstrap/css/bootstrap.css') ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets11/css/bootstrap.css')  ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets11/css/jquery.dataTables.css') ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets11/css/dataTables.bootstrap4.css') ?>">

    <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/datatables/css/jquery.dataTables.min.css') ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/datatables/css/buttons.dataTables.min.css') ?>">

    <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/style.css') ?>">





</head>

<body>

    <div class="page">
        <div class="main-content app-content">

            <div class="chart-container" style="margin-left: 100px; margin-top:30px;">
                <div width="600" height="250" id="chart"></div>

            </div>



        </div>

    </div>

    <script type="text/javascript">
        var options = {

            title: {
                text: 'Total Request and Approval',
                align: 'center',


                style: {
                    responsive: true,
                    color: '#444',
                    fontSize: '20',
                }
            },
            series: [{
                name: 'Total',
                data: [<?php echo $num_reqRole ?>, <?php echo $num_reqTools ?>, <?php echo $num_ApprovalReqRole ?>, <?php echo $num_ApprovalReqTools ?>]
            }],
            chart: {
                // width: window.innerWidth,
                responsive: true,
                height: 400,
                // width: 1000,
                type: 'bar',
                "toolbar": {
                    "show": true,
                    "tools": {
                        "download": true,
                        "selection": true,
                        "zoom": true,
                        "zoomin": true,
                        "zoomout": true,
                        "pan": true,
                        "reset": true
                    },
                    "autoSelected": "zoom"
                }
            },
            "plotOptions": {
                "bar": {
                    "vertical": true
                }
            },

            "dataLabels": {
                "enabled": true,
                "offsetX": -6,
                "style": {
                    "fontSize": "12px",
                    "colors": [
                        null
                    ]
                }
            },

            xaxis: {
                categories: [
                    ['Request Role Accessibility'],
                    ['Request Tools'],
                    ['Approval Request Role Accessibility'],
                    ['Approval Request Tools'],

                ],
            },


        };

        var chart = new ApexCharts(document.querySelector("#chart"), options);
        // chart.style.width = 100;
        chart.render();
    </script>
    <script src="<?php echo base_url('assets/js/apexcharts.js') ?>"></script>
</body>

</html>