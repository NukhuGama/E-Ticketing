<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>
<!DOCTYPE html>
<html lang="en">

<head>
	<!-- Favicon -->
	<link rel="icon" href="<?= base_url('assets/img/brand/logo_telkomcel.png" type="image/x-icon') ?>" />

	<!-- Icons css -->
	<link href="<?= base_url('assets/css/icons.css') ?>" rel="stylesheet">

	<!--  Owl-carousel css-->
	<link href="<?= base_url('assets/plugins/owl-carousel/owl.carousel.css') ?>" rel="stylesheet" />

	<!-- P-scroll bar css-->
	<link href="<?= base_url('assets/plugins/perfect-scrollbar/p-scrollbar.css') ?>" rel="stylesheet" />

	<!--  Right-sidemenu css -->
	<link href="<?= base_url('assets/plugins/sidebar/sidebar.css') ?>" rel="stylesheet">

	<!-- Sidemenu css -->
	<link rel="stylesheet" href="<?= base_url('assets/css/sidemenu.css') ?>">

	<!-- Maps css -->
	<link href="<?= base_url('assets/plugins/jqvmap/jqvmap.min.css') ?>" rel="stylesheet">

	<!-- style css -->
	<link href="<?= base_url('assets/css/style.css') ?>" rel="stylesheet">
	<link href="<?= base_url('assets/css/style-dark.css') ?>" rel="stylesheet">

	<!---Skinmodes css-->
	<link href="<?= base_url('assets/css/skin-modes.css') ?>" rel="stylesheet" />

</head>

<body class="main-body app sidebar-mini">
	<!-- Page -->
	<!-- main-sidebar -->
	<div class="app-sidebar__overlay" data-toggle="sidebar"></div>
	<aside class="app-sidebar sidebar-scroll">
		<div class="main-sidebar-header active">
			<a class="desktop-logo logo-light active" href="<?= site_url('welcome') ?>"><img src="<?= base_url('assets/img/brand/logo_telkomcel.png') ?>  " class="main-logo" alt="logo"></a>

		</div>
		<div class="main-sidemenu">
			<div class="app-sidebar__user clearfix">
				<div class="dropdown user-pro-body">
					<div class="">
						<img alt="user-img" class="avatar avatar-xl brround" src="<?= base_url() . 'uploads/' . $query['imgemp'] ?>"><span class="avatar-status profile-status bg-green"></span>
					</div>
					<div class="user-info">
						<h4 class="font-weight-semibold mt-3 mb-0"><?php echo $query['fullname']; ?></h4>
						<span class="mb-0 text-muted"><?php echo $query['positionname']; ?></span>
					</div>
				</div>
			</div>
			<ul class="side-menu">

				<li class="side-item side-item-category">General</li>

				<li class="slide">
					<a class="side-menu__item" data-toggle="slide" href="#"><img src="assets/img/brand/request.png" class="side-menu__icon" alt="picture" viewBox="0 0 24 24">
						<path d="M0 0h24v24H0V0z" fill="none" />
						<path d="M19 5H5v14h14V5zM9 17H7v-7h2v7zm4 0h-2V7h2v10zm4 0h-2v-4h2v4z" opacity=".3" />
						<path d="M3 5v14c0 1.1.9 2 2 2h14c1.1 0 2-.9 2-2V5c0-1.1-.9-2-2-2H5c-1.1 0-2 .9-2 2zm2 0h14v14H5V5zm2 5h2v7H7zm4-3h2v10h-2zm4 6h2v4h-2z" />Request Form &emsp;&emsp;&emsp;&ensp;<i class="angle fe fe-chevron-down"></i>
					</a>
					<ul class="slide-menu">
						<li><a class="slide-item" href="<?= site_url('request_role') ?>">Request Role Accessibility</a></li>

						<li><a class="slide-item" href="<?= site_url('request_tools') ?>">Request Tools (Project)</a></li>




					</ul>
				</li>


				<!-- Approval -->
				<?php if (($this->session->userdata('nik') == '20002') || ($this->session->userdata('nik') == '20004') || ($this->session->userdata('nik') == '20005')) { ?>
					<li class="slide">
						<a class="side-menu__item" data-toggle="slide" href="#"><img src="assets/img/brand/approved.png" class="side-menu__icon" viewBox="0 0 24 24">
							<path d="M0 0h24v24H0V0z" fill="none" />
							<path d="M19 5H5v14h14V5zM9 17H7v-7h2v7zm4 0h-2V7h2v10zm4 0h-2v-4h2v4z" opacity=".3" />
							<path d="M3 5v14c0 1.1.9 2 2 2h14c1.1 0 2-.9 2-2V5c0-1.1-.9-2-2-2H5c-1.1 0-2 .9-2 2zm2 0h14v14H5V5zm2 5h2v7H7zm4-3h2v10h-2zm4 6h2v4h-2z" />Approval &emsp;&emsp;&emsp;&emsp;&emsp;&ensp;&nbsp;<i class="angle fe fe-chevron-down"></i>
						</a>
						<ul class="slide-menu">



							<li><a class="slide-item" href="<?= site_url("approval_r_role") ?>">Approval Request Role</a></li>
							<li><a class="slide-item" href="<?= site_url("approval_r_tool") ?>">Approval Request Tools</a></li>


						</ul>
					</li>
				<?php } ?>

				<li class="slide">
					<a class="side-menu__item" data-toggle="slide" href="#"><img src="assets/img/brand/history1.png" class="side-menu__icon" style="width: 23px;">
						<path d="M0 0h24v24H0V0z" fill="none" />
						<path d="M3.31 11l2.2 8.01L18.5 19l2.2-8H3.31zM12 17c-1.1 0-2-.9-2-2s.9-2 2-2 2 .9 2 2-.9 2-2 2z" opacity=".4" />
						<path d="M22 9h-4.79l-4.38-6.56c-.19-.28-.51-.42-.83-.42s-.64.14-.83.43L6.79 9H2c-.55 0-1 .45-1 1 0 .09.01.18.04.27l2.54 9.27c.23.84 1 1.46 1.92 1.46h13c.92 0 1.69-.62 1.93-1.46l2.54-9.27L23 10c0-.55-.45-1-1-1zM12 4.8L14.8 9H9.2L12 4.8zM18.5 19l-12.99.01L3.31 11H20.7l-2.2 8zM12 13c-1.1 0-2 .9-2 2s.9 2 2 2 2-.9 2-2-.9-2-2-2z" />History &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&ensp;<i class="angle fe fe-chevron-down"></i>
					</a>

					<ul class="slide-menu">
						<li><a class="slide-item" href="<?= site_url(('history_role')) ?>">History Request Role</a></li>
						<li><a class="slide-item" href="<?= site_url(('history_tools')) ?>">History Request Tools</a></li>

					</ul>

				</li>


				<li class="slide">
					<a class="side-menu__item" data-toggle="slide" href="#"><img src="assets/img/brand/setting.png" class="side-menu__icon" viewBox="0 0 24 24">
						<path d="M0 0h24v24H0V0z" fill="none" />
						<path d="M3.31 11l2.2 8.01L18.5 19l2.2-8H3.31zM12 17c-1.1 0-2-.9-2-2s.9-2 2-2 2 .9 2 2-.9 2-2 2z" opacity=".3" />
						<path d="M22 9h-4.79l-4.38-6.56c-.19-.28-.51-.42-.83-.42s-.64.14-.83.43L6.79 9H2c-.55 0-1 .45-1 1 0 .09.01.18.04.27l2.54 9.27c.23.84 1 1.46 1.92 1.46h13c.92 0 1.69-.62 1.93-1.46l2.54-9.27L23 10c0-.55-.45-1-1-1zM12 4.8L14.8 9H9.2L12 4.8zM18.5 19l-12.99.01L3.31 11H20.7l-2.2 8zM12 13c-1.1 0-2 .9-2 2s.9 2 2 2 2-.9 2-2-.9-2-2-2z" />Setting &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&ensp;<i class="angle fe fe-chevron-down"></i>
					</a>
					<ul class="slide-menu">
						<li><a class="slide-item" href="<?= site_url(('employee')) ?>">Edit Profile</a></li>

					</ul>
				</li>

			</ul>
		</div>
	</aside>
	<!-- main-sidebar -->


	<!-- /main-content -->
	<!-- End Page -->
	<!-- Back-to-top -->
	<script src="<?= base_url('assets/plugins/jquery/jquery.min.js') ?>"></script>

	<!-- Bootstrap Bundle js -->
	<script src="<?= base_url('assets/plugins/bootstrap/js/bootstrap.bundle.min.js') ?>"></script>

	<!--Internal  Chart.bundle js -->
	<script src="<?= base_url('assets/plugins/chart.js/Chart.bundle.min.js') ?>"></script>

	<!-- Ionicons js -->
	<script src="<?= base_url('assets/plugins/ionicons/ionicons.js') ?>"></script>

	<!-- Moment js -->
	<script src="<?= base_url('assets/plugins/moment/moment.js') ?>"></script>

	<!--Internal Sparkline js -->
	<script src="<?= base_url('assets/plugins/jquery-sparkline/jquery.sparkline.min.js') ?>"></script>

	<!-- Moment js -->
	<script src="<?= base_url('assets/plugins/raphael/raphael.min.js') ?>"></script>

	<!--Internal Apexchart js-->
	<script src="<?= base_url('assets/js/apexcharts.js') ?>"></script>

	<!-- Rating js-->
	<script src="<?= base_url('assets/plugins/rating/jquery.rating-stars.js') ?>"></script>
	<script src="assets/plugins/rating/jquery.barrating.js"></script>

	<!--Internal  Perfect-scrollbar js -->
	<script src="<?= base_url('assets/plugins/perfect-scrollbar/perfect-scrollbar.min.js') ?>"></script>
	<script src="<?= base_url('assets/plugins/perfect-scrollbar/p-scroll.js') ?>"></script>

	<!-- Eva-icons js -->
	<script src="<?= base_url('assets/js/eva-icons.min.js') ?>"></script>

	<!-- right-sidebar js -->
	<script src="<?= base_url('assets/plugins/sidebar/sidebar.js') ?>"></script>
	<script src="<?= base_url('assets/plugins/sidebar/sidebar-custom.js') ?>"></script>

	<!-- Sticky js -->
	<script src="<?= base_url('assets/js/sticky.js') ?>"></script>
	<script src="<?= base_url('assets/js/modal-popup.js') ?>"></script>

	<!-- Left-menu js-->
	<script src="<?= base_url('assets/plugins/side-menu/sidemenu.js') ?>"></script>

	<!-- Internal Map -->
	<script src="<?= base_url('assets/plugins/jqvmap/jquery.vmap.min.js') ?>"></script>
	<script src="<?= base_url('assets/plugins/jqvmap/maps/jquery.vmap.usa.js') ?>"></script>

	<!--Internal  index js -->
	<script src="<?= base_url('assets/js/index.js') ?>"></script>

	<!-- Apexchart js-->
	<script src="<?= base_url('assets/js/apexcharts.js') ?>"></script>
	<script src="<?= base_url('assets/js/jquery.vmap.sampledata.js') ?>"></script>

	<!-- custom js -->
	<script src="<?= base_url('assets/js/custom.js') ?>"></script>

</body>

</html>