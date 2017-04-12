<!DOCTYPE html>
<html lang="en-us">
	<head>
		<meta charset="utf-8">
		<!--<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">-->

		<title><?php echo $page_title; ?></title>
		<meta name="description" content="">
		<meta name="author" content="">
			
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">

		<!-- Basic Styles -->
		<link rel="stylesheet" type="text/css" media="screen" href="<?php echo base_url().'css/bootstrap.min.css'; ?>">
		<link rel="stylesheet" type="text/css" media="screen" href="<?php echo base_url().'css/font-awesome.min.css'; ?>">

		<!-- SmartAdmin Styles : Caution! DO NOT change the order -->
		<link rel="stylesheet" type="text/css" media="screen" href="<?php echo base_url().'css/smartadmin-production-plugins.min.css'; ?>">
		<link rel="stylesheet" type="text/css" media="screen" href="<?php echo base_url().'css/smartadmin-production.min.css'; ?>">
		<link rel="stylesheet" type="text/css" media="screen" href="<?php echo base_url().'css/smartadmin-skins.min.css'; ?>">

		<!-- SmartAdmin RTL Support  -->
		<link rel="stylesheet" type="text/css" media="screen" href="<?php echo base_url().'css/smartadmin-rtl.min.css'; ?>">

		<!-- We recommend you use "your_style.css" to override SmartAdmin
		     specific styles this will also ensure you retrain your customization with each SmartAdmin update. 
		<link rel="stylesheet" type="text/css" media="screen" href="<?php //echo base_url().'css/your_style.css'; ?>">-->

		<!-- Demo purpose only: goes with demo.js, you can delete this css when designing your own WebApp -->
		<link rel="stylesheet" type="text/css" media="screen" href="<?php echo base_url().'css/demo.min.css'; ?>">

		<!-- FAVICONS -->
		<link rel="shortcut icon" href="<?php echo base_url().'img/favicon/favicon.png';?>" type="image/x-icon">
		<link rel="icon" href="<?php echo base_url().'img/favicon/favicon.png'; ?>" type="image/x-icon">

		<!-- GOOGLE FONT -->
		<link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Open+Sans:400italic,700italic,300,400,700">

		<!-- Specifying a Webpage Icon for Web Clip 
			 Ref: https://developer.apple.com/library/ios/documentation/AppleApplications/Reference/SafariWebContent/ConfiguringWebApplications/ConfiguringWebApplications.html -->
		<link rel="apple-touch-icon" href="<?php echo base_url().'img/splash/sptouch-icon-iphone.png'; ?>">
		<link rel="apple-touch-icon" sizes="76x76" href="<?php echo base_url().'img/splash/touch-icon-ipad.png'; ?>">
		<link rel="apple-touch-icon" sizes="120x120" href="<?php echo base_url().'img/splash/touch-icon-iphone-retina.png'; ?>">
		<link rel="apple-touch-icon" sizes="152x152" href="<?php echo base_url().'img/splash/touch-icon-ipad-retina.png'; ?>">
		
		<!-- iOS web-app metas : hides Safari UI Components and Changes Status Bar Appearance -->
		<meta name="apple-mobile-web-app-capable" content="yes">
		<meta name="apple-mobile-web-app-status-bar-style" content="black">
		
		<!-- Startup image for web apps -->
		<link rel="apple-touch-startup-image" href="<?php echo base_url().'img/splash/ipad-landscape.png'; ?>" media="screen and (min-device-width: 481px) and (max-device-width: 1024px) and (orientation:landscape)">
		<link rel="apple-touch-startup-image" href="<?php echo base_url().'img/splash/ipad-portrait.png'; ?>" media="screen and (min-device-width: 481px) and (max-device-width: 1024px) and (orientation:portrait)">
		<link rel="apple-touch-startup-image" href="<?php echo base_url().'img/splash/iphone.png'; ?>" media="screen and (max-device-width: 320px)">
                
                
                <script data-pace-options='{ "restartOnRequestAfter": true }' src="<?php echo base_url().'js/plugin/pace/pace.min.js'; ?>"></script>

		
		<script src="http://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
		<script>
			if (!window.jQuery) {
				document.write('<script src="<?php echo base_url().'js/libs/jquery-2.1.1.min.js'; ?>"><\/script>');
			}
		</script>

		<script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.10.3/jquery-ui.min.js"></script>
		<script>
			if (!window.jQuery.ui) {
				document.write('<script src="<?php echo base_url().'js/libs/jquery-ui-1.10.3.min.js'; ?>"><\/script>');
			}
		</script>

		<!-- IMPORTANT: APP CONFIG -->
		<script src="<?php echo base_url().'js/app.config.js'; ?>"></script>

		<!-- JS TOUCH : include this plugin for mobile drag / drop touch events-->
		<script src="<?php echo base_url().'js/plugin/jquery-touch/jquery.ui.touch-punch.min.js'; ?>"></script> 

		<!-- BOOTSTRAP JS -->
		<script src="<?php echo base_url().'js/bootstrap/bootstrap.min.js'; ?>"></script>

		<!-- CUSTOM NOTIFICATION -->
		<script src="<?php echo base_url().'js/notification/SmartNotification.min.js'; ?>"></script>

		<!-- JARVIS WIDGETS -->
		<script src="<?php echo base_url().'js/smartwidgets/jarvis.widget.min.js'; ?>"></script>

		<!-- EASY PIE CHARTS -->
		<script src="<?php echo base_url().'js/plugin/easy-pie-chart/jquery.easy-pie-chart.min.js'; ?>"></script>

		<!-- SPARKLINES -->
		<script src="<?php echo base_url().'js/plugin/sparkline/jquery.sparkline.min.js'; ?>"></script>

		<!-- JQUERY VALIDATE -->
		<script src="<?php echo base_url().'js/plugin/jquery-validate/jquery.validate.min.js'; ?>"></script>

		<!-- JQUERY MASKED INPUT -->
		<script src="<?php echo base_url().'js/plugin/masked-input/jquery.maskedinput.min.js'; ?>"></script>

		<!-- JQUERY SELECT2 INPUT -->
		<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>
                <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css" rel="stylesheet" />

		<!-- JQUERY UI + Bootstrap Slider -->
		<script src="<?php echo base_url().'js/plugin/bootstrap-slider/bootstrap-slider.min.js'; ?>"></script>

		<!-- browser msie issue fix -->
		<script src="<?php echo base_url().'js/plugin/msie-fix/jquery.mb.browser.min.js'; ?>"></script>

		<!-- FastClick: For mobile devices -->
		<script src="<?php echo base_url().'js/plugin/fastclick/fastclick.min.js'; ?>"></script>

		<!--[if IE 8]>

		<h1>Your browser is out of date, please update your browser by going to www.microsoft.com/download</h1>

		<![endif]-->

		<!-- Demo purpose only -->
		<script src="<?php echo base_url().'js/demo.min.js'; ?>"></script>

		<!-- MAIN APP JS FILE -->
		<script src="<?php echo base_url().'js/app.min.js'; ?>"></script>

		<!-- ENHANCEMENT PLUGINS : NOT A REQUIREMENT -->
		<!-- Voice command : plugin -->
		<script src="<?php echo base_url().'js/speech/voicecommand.min.js'; ?>"></script>

		<!-- SmartChat UI : plugin -->
		<script src="<?php echo base_url().'js/smart-chat-ui/smart.chat.ui.min.js'; ?>"></script>
		<script src="<?php echo base_url().'js/smart-chat-ui/smart.chat.manager.min.js'; ?>"></script>
		
		<!-- PAGE RELATED PLUGIN(S) -->
		
		<!-- Flot Chart Plugin: Flot Engine, Flot Resizer, Flot Tooltip -->
		<script src="<?php echo base_url().'js/plugin/flot/jquery.flot.cust.min.js'; ?>"></script>
		<script src="<?php echo base_url().'js/plugin/flot/jquery.flot.resize.min.js'; ?>"></script>
		<script src="<?php echo base_url().'js/plugin/flot/jquery.flot.time.min.js'; ?>"></script>
		<script src="<?php echo base_url().'js/plugin/flot/jquery.flot.tooltip.min.js'; ?>"></script>
		
		<!-- Vector Maps Plugin: Vectormap engine, Vectormap language -->
		<script src="<?php echo base_url().'js/plugin/vectormap/jquery-jvectormap-1.2.2.min.js'; ?>"></script>
		<script src="<?php echo base_url().'js/plugin/vectormap/jquery-jvectormap-world-mill-en.js'; ?>"></script>
		
		<!-- Full Calendar -->
		<script src="<?php echo base_url().'js/plugin/moment/moment.min.js'; ?>"></script>
		<script src="<?php echo base_url().'js/plugin/fullcalendar/jquery.fullcalendar.min.js'; ?>"></script>
                
                <!-- PAGE RELATED PLUGIN(S) -->
		<script src="<?php echo base_url().'js/plugin/datatables/jquery.dataTables.min.js'; ?>"></script>
		<script src="<?php echo base_url().'js/plugin/datatables/dataTables.colVis.min.js'; ?>"></script>
		<script src="<?php echo base_url().'js/plugin/datatables/dataTables.tableTools.min.js'; ?>"></script>
		<script src="<?php echo base_url().'js/plugin/datatables/dataTables.bootstrap.min.js'; ?>"></script>
		<script src="<?php echo base_url().'js/plugin/datatable-responsive/datatables.responsive.min.js'; ?>"></script>
                <script> var base_url = "<?php echo base_url(); ?>"</script>
	</head>
	<body class="">
            
               
		