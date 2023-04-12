<?php
  Yii::$app->session->open();
  if(Yii::$app->session['user']){
  ?>
    <script type="text/javascript">
        window.location.replace('index');
    </script>
  <?php
  }
 ?>
<html>
	<head>
		<meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
		<meta name="author" content="<br />
<b>Notice</b>:  Undefined variable: config in <b>C:\xampp\htdocs\ghifari-telegram\lib\header.php</b> on line <b>6</b><br />
">
		<title><?php echo$title; ?></title>
		<link href="<?php echo$base_url; ?>views/site/vendor/plugins/morris/morris.css" rel="stylesheet" />
		<link href="<?php echo$base_url; ?>views/site/vendor/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
		<link href="<?php echo$base_url; ?>views/site/vendor/css/icons.css" rel="stylesheet" type="text/css" />
		<link href="<?php echo$base_url; ?>views/site/vendor/css/style.css" rel="stylesheet" type="text/css" />
		<script src="<?php echo$base_url; ?>views/site/vendor/js/modernizr.min.js"></script>
		<script src="<?php echo$base_url; ?>views/site/vendor/js/jquery.min.js"></script>
		<script src="<?php echo$base_url; ?>views/site/vendor/js/"></script>
		<script src="<?php echo$base_url; ?>views/site/vendor/js/popper.min.js"></script>
		<script src="<?php echo$base_url; ?>views/site/vendor/js/bootstrap.min.js"></script>
		<script src="<?php echo$base_url; ?>views/site/vendor/js/waves.js"></script>
		<script src="<?php echo$base_url; ?>views/site/vendor/js/jquery.slimscroll.js"></script>
		<script src="<?php echo$base_url; ?>views/site/vendor/plugins/morris/morris.min.js"></script>
		<script src="<?php echo$base_url; ?>views/site/vendor/plugins/raphael/raphael-min.js"></script>
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
        <div class="row justify-content-center">
        	 <div class="card col-lg-5 mt-5">
        	 	<div class="card-body">
        	 		<?php
                      
                      if(isset(Yii::$app->session['alert'])){
                        echo Yii::$app->session['alert'];
                        unset(Yii::$app->session['alert']);
                      }

                      if(isset(Yii::$app->session['user'])){
                        header('location:site/index');
                      }
        	 		?>
        	 		 <form action="widhy" method="POST">
                        <input type="hidden" name="_csrf" value="<?= Yii::$app->request->csrfToken ?>">
        	 		 	 <div class="form-group">
        	 		 	 	<label>Username</label>
        	 		 	 	<input type="text" name="username" placeholder="Username" class="form-control">
        	 		 	 </div>

        	 		 	 <div class="form-group">
        	 		 	 	<label>Password</label>
        	 		 	 	<input type="password" name="password" placeholder="Password" class="form-control">
        	 		 	 </div>
        	 		 	 <div class="mt-1">
        	 		 	 	 <p class="text-right">
        	 		 	 	 	<button type="submit" class="btn btn-success" name="kirim">Submit</button>
        	 		 	 	 	<button type="reset" class="btn btn-danger">Reset</button>
        	 		 	 	 </p>
        	 		 	 </div>

        	 		 </form>
        	 	</div>
        	 </div>
        </div>
		<script src="<?php echo$base_url; ?>views/site/vendor/js/jquery.core.js"></script>
		<script src="<?php echo$base_url; ?>views/site/vendor/js/jquery.app.js"></script>
		<script src="<?php echo$base_url; ?>view/site/vendor/plugins/chart.js/chart.min.js"></script>

	</body>
</html>