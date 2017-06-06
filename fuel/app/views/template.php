<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title><?php echo $title; ?></title>
	
	<meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />

	<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons" />
    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700" />
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" />
	<?php echo Asset::css('bootstrap.min.css'); ?>
	<?php echo Asset::css('material-kit.css'); ?>

</head>

<?php if (Session::get_flash('success')): ?>
			<div class="alert alert-success">
				<strong>Success</strong>
				<p>
				<?php echo implode('</p><p>', e((array) Session::get_flash('success'))); ?>
				</p>
			</div>
<?php endif; ?>
<?php if (Session::get_flash('error')): ?>
			<div class="alert alert-danger">
				<strong>Error</strong>
				<p>
				<?php echo implode('</p><p>', e((array) Session::get_flash('error'))); ?>
				</p>
			</div>
<?php endif; ?>
		
<?php echo $content; ?>

	<!--   Core JS Files   -->
	<?php echo Asset::js('jquery.min.js'); ?>
	<?php echo Asset::js('bootstrap.min.js'); ?>
	<?php echo Asset::js('material.min.js'); ?>

	<!--  Plugin for the Sliders, full documentation here: http://refreshless.com/nouislider/ -->
	<?php echo Asset::js('nouislider.min.js'); ?>

	<!--  Plugin for the Datepicker, full documentation here: http://www.eyecon.ro/bootstrap-datepicker/ -->
	<?php echo Asset::js('bootstrap-datepicker.js'); ?>

	<!-- Control Center for Material Kit: activating the ripples, parallax effects, scripts from the example pages etc -->
	<?php echo Asset::js('material-kit.js'); ?>

	<script type="text/javascript">

		$().ready(function(){
			// the body of this function is in assets/material-kit.js
			materialKit.initSliders();
            window_width = $(window).width();

            if (window_width >= 992){
                big_image = $('.wrapper > .header');

				$(window).on('scroll', materialKitDemo.checkScrollForParallax);
			}

		});
	</script>

</html>
