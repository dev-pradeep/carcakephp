<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	 <title> TuroScrape | <?= $this->fetch('title') ?> </title>
	<!-- Tell the browser to be responsive to screen width -->
	<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
	<!-- Bootstrap 3.3.7 -->
	<?php echo $this->Html->css('/bower_components/bootstrap/dist/css/bootstrap.min.css'); ?>
	<!-- Font Awesome -->
	<?php echo $this->Html->css('/bower_components/font-awesome/css/font-awesome.min.css'); ?>
	<!-- Ionicons -->
	<?php echo $this->Html->css('/bower_components/Ionicons/css/ionicons.min.css'); ?>
	<!-- Theme style -->
	<?php echo $this->Html->css('/dist/css/AdminLTE.min.css'); ?>
	<!-- iCheck -->
	<?php echo $this->Html->css('/plugins/iCheck/square/blue.css'); ?>

	<?php echo $this->Html->css('https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic') ?>
	
	<?php echo $this->Html->css('/bower_components/toastr/toastr.min.css'); ?>	
	
	<style>
        /* Loading Spinner */
        
        .spinner {
            margin: 0;
            width: 70px;
            height: 18px;
            margin: -35px 0 0 -9px;
            position: absolute;
            top: 50%;
            left: 50%;
            text-align: center
        }
        
        .spinner > div {
            width: 18px;
            height: 18px;
            background-color: #333;
            border-radius: 100%;
            display: inline-block;
            -webkit-animation: bouncedelay 1.4s infinite ease-in-out;
            animation: bouncedelay 1.4s infinite ease-in-out;
            -webkit-animation-fill-mode: both;
            animation-fill-mode: both
        }
        
        .spinner .bounce1 {
            -webkit-animation-delay: -.32s;
            animation-delay: -.32s
        }
        
        .spinner .bounce2 {
            -webkit-animation-delay: -.16s;
            animation-delay: -.16s
        }
        
        @-webkit-keyframes bouncedelay {
            0%,
            80%,
            100% {
                -webkit-transform: scale(0.0)
            }
            40% {
                -webkit-transform: scale(1.0)
            }
        }
        
        @keyframes bouncedelay {
            0%,
            80%,
            100% {
                transform: scale(0.0);
                -webkit-transform: scale(0.0)
            }
            40% {
                transform: scale(1.0);
                -webkit-transform: scale(1.0)
            }
        }
		.demo-icon {
			font-size: 18px;
			line-height: 30px;
			float: left;
			width: 30px;
			height: 30px;
			margin: 2px;
			text-align: center;
			color: #92A0B3;
			border: 0px;
			border-radius: 3px;
		}
		html{
			overflow: hidden;
		}
    </style>
	<!-- jQuery 3 -->
	<?php echo $this->Html->script('/bower_components/jquery/dist/jquery.min.js'); ?>
	<!-- Bootstrap 3.3.7 -->
	<?php echo $this->Html->script('/bower_components/bootstrap/dist/js/bootstrap.min.js'); ?>
	<!-- iCheck -->
	<?php echo $this->Html->script('/plugins/iCheck/icheck.min.js'); ?>
	
	<?php echo $this->Html->script('/bower_components/toastr/toastr.min.js'); ?>
</head>
	<body class="hold-transition login-page">
		<?php use Cake\Core\Configure; ?>	
		<input type="hidden" id="pk_api_key" name="pk_api_key" value="<?php echo Configure::read('pk_key'); ?>" />
		<input type="hidden" id="sk_api_key" name="sk_api_key" value="<?php echo Configure::read('sk_key'); ?>" />
		<?php use Cake\Routing\Router; ?>
		<input type="hidden" value="<?php echo Router::url('/', true); ?>" id="base_url" name="base_url" >
		
		<?= $this->fetch('content') ?>
		
		<!-- /.login-box -->
		<script>
			$(function () {
			$('input').iCheck({
				checkboxClass: 'icheckbox_square-blue',
				radioClass: 'iradio_square-blue',
				increaseArea: '20%' /* optional */
				});
			});
		</script>
	</body>
	<?php echo $this->Flash->render(); ?> 	
</html>
