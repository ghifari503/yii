<?php
  Yii::$app->session->open();
  $sess = Yii::$app->session['user'];

?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
		<title><?php echo$title; ?></title>
		<link href="<?php echo$base_url; ?>views/site/vendor/plugins/morris/morris.css" rel="stylesheet" />
		<link href="<?php echo$base_url; ?>views/site/vendor/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
		<link href="<?php echo$base_url; ?>views/site/vendor/css/icons.css" rel="stylesheet" type="text/css" />
		<link href="<?php echo$base_url; ?>views/site/vendor/css/style.css" rel="stylesheet" type="text/css" />
		<script src="<?php echo$base_url; ?>views/site/vendor/js/modernizr.min.js"></script>
		<script src="<?php echo$base_url; ?>views/site/vendor/js/jquery.min.js"></script>
		<script src="<?php echo$base_url; ?>views/site/vendor/js/"></script>
		<script src="<?php echo$base_url; ?>view/site/vendor/plugins/chart.js/chart.min.js"></script>
		<script src="<?php echo$base_url; ?>views/site/vendor/js/popper.min.js"></script>
		<script src="<?php echo$base_url; ?>views/site/vendor/js/bootstrap.min.js"></script>
		<script src="<?php echo$base_url; ?>views/site/vendor/js/waves.js"></script>
		<script src="<?php echo$base_url; ?>views/site/vendor/js/jquery.slimscroll.js"></script>
		<script src="<?php echo$base_url; ?>views/site/vendor/plugins/morris/morris.min.js"></script>
		<script src="<?php echo$base_url; ?>views/site/vendor/plugins/raphael/raphael-min.js"></script>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css" />

		<style type="text/css">.hide{display:none!important}.show{display:block!important}</style>
		<script type="text/javascript">
        function modal_open(type, url) {
			$('#modal').modal('show');
			if (type == 'add') {
				$('#modal-title').html('<i class="fa fa-plus-square"></i> Tambah Data');
			} else if (type == 'edit') {
				$('#modal-title').html('<i class="fa fa-edit"></i> Ubah Data');
			} else if (type == 'delete') {
				$('#modal-title').html('<i class="fa fa-trash"></i> Hapus Data');
			} else if (type == 'detail') {
				$('#modal-title').html('<i class="fa fa-search"></i> Detail Data');
			} else {
				$('#modal-title').html('Empty');
			}
        	$.ajax({
        		type: "GET",
        		url: url,
        		beforeSend: function() {
        			$('#modal-detail-body').html('Sedang memuat...');
        		},
        		success: function(result) {
        			$('#modal-detail-body').html(result);
        		},
        		error: function() {
        			$('#modal-detail-body').html('Terjadi kesalahan.');
        		}
        	});
        	$('#modal-detail').modal();
        }
    	</script>
	</head>
	<body>
	<header id="topnav">
			<div class="topbar-main">
				<div class="container-fluid">
					<div class="logo">
						<a href="" class="logo">
							<span class="logo-small"><i class="fa fa-globe"></i></span>
							<span class="logo-large"><i class="fa fa-globe"></i> <?php echo$title; ?></span>
						</a>
					</div>
					<div class="menu-extras topbar-custom">
						<ul class="list-unstyled topbar-right-menu float-right mb-0">
							<li class="menu-item">
								<a class="navbar-toggle nav-link">
									<div class="lines">
										<span></span>
										<span></span>
										<span></span>
									</div>
								</a>
							</li>
														<li style="padding: 0 10px;">
							</li>
							<li class="notification-list">
								<a class="nav-link waves-effect nav-user" href="" role="button"
									aria-haspopup="false" aria-expanded="false">
									<img src="<?php echo$base_url; ?>views/site/vendor/images/profile.png" alt="user" class="rounded-circle"> <span class="ml-1 pro-user-name"><?php echo$sess; ?> </span> </span>
								</a>
							</li>
													</ul>
					</div>
					<div class="clearfix"></div>
				</div>
			</div>
			<div class="navbar-custom">
				<div class="container-fluid">
					<div id="navigation">
						<ul class="navigation-menu">						<li>
									<a href="index"><i class="fa fa-home"></i>  Wilayah</a>
								</li>
							    <li>
									<a href="pendaftaran"><i class="fa fa-plus-square"></i> Pendaftaran</a>
								</li>

								<?php
                                $db = Yii::$app->db;
                                   $query_level = $db->createCommand("SELECT * FROM users WHERE username = '$sess'")->query();
                                   foreach ($query_level as $e) {
                                ?>
								<?php
                                    if($e['level'] == 'admin'){
                                ?>
                                <li>
									<a href="tambah_obat"> <i class="fa fa-gear"></i> Tambah Obat</a>
								</li>
                                <?php
                                    }
								?>
								<?php
                                   }
								?>

								<?php
                                $db = Yii::$app->db;
                                   $query_level = $db->createCommand("SELECT * FROM users WHERE username = '$sess'")->query();
                                   foreach ($query_level as $e) {
                                ?>
								<?php
                                    if($e['level'] == 'admin'){
                                ?>
                                <li>
									<a href="tindakan"> <i class="fa fa-gear"></i> Tindakan</a>
								</li>
                                <?php
                                    }
								?>
								<?php
                                   }
								?>

<?php
                                $db = Yii::$app->db;
                                   $query_level = $db->createCommand("SELECT * FROM users WHERE username = '$sess'")->query();
                                   foreach ($query_level as $e) {
                                ?>
								<?php
                                    if($e['level'] == 'admin'){
                                ?>
                                <li>
									<a href="pembayaran"> <i class="fa fa-gear"></i> Pembayaran</a>
								</li>
                                <?php
                                    }
								?>
								<?php
                                   }
								?>
								

								<li>
									<a href="grafik"> <i class="fa fa-user"></i> Laporan</a>
								</li>
                                <?php
                                $db = Yii::$app->db;
                                   $query_level = $db->createCommand("SELECT * FROM users WHERE username = '$sess'")->query();
                                   foreach ($query_level as $e) {
                                ?>
								<?php
                                    if($e['level'] == 'admin'){
                                ?>
                                <li>
									<a href="admin"> <i class="fa fa-gear"></i> Admin</a>
								</li>
                                <?php
                                    }
								?>
								<?php
                                   }
								?>
							    
							
								
								<li>
									<a href="logout"> <i class="fa fa-power-off"></i> Logout</a>
								</li>
										
                        </ul>
					</div>
				</div>
			</div>
		</header>

        <div class="wrapper">
			<div class="container-fluid" style="padding-top: 30px;">
			<div class="modal fade" id="modal" id="modal-detail" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true" style="display: none;">
				<div class="modal-dialog modal-dialog-centered modal-lg">
					<div class="modal-content">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
							<h4 class="modal-title" id="modal-title"></h4>
						</div>
						<div class="modal-body" id="modal-detail-body">
						</div>
						<div class="modal-footer">
							<button type="button" class="btn btn-light" data-dismiss="modal">Tutup</button>
						</div>
					</div>
				</div>
			</div>
						
				