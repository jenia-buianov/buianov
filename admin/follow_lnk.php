﻿<?$sql_admin_settings = mysql_query("SELECT * FROM admin_settings");if (mysql_num_rows($sql_admin_settings)>0){	$admin_settings = mysql_fetch_array($sql_admin_settings);	$k=0;	do	{		$settings[$k] = $admin_settings['value']; 	}	while($admin_settings = mysql_fetch_array($sql_admin_settings));}?><!DOCTYPE html><html><head>    <meta charset="utf-8">    <title><? echo $settings[0]; ?></title>    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0, user-scalable=no">    <meta name="apple-mobile-web-app-capable" content="yes">    <meta name="apple-touch-fullscreen" content="yes">        <link href='http://fonts.googleapis.com/css?family=RobotoDraft:300,400,400italic,500,700' rel='stylesheet' type='text/css'>    <link href='http://fonts.googleapis.com/css?family=Open+Sans:300,400,400italic,600,700' rel='stylesheet' type='text/css'><link rel="stylesheet" type="text/css" href="http://s62.ucoz.net/src/ckeditor/custom/ueditor.css">    <!--[if lt IE 10]>        <script type="text/javascript" src="<? echo $admin_page;?>assets/js/media.match.min.js"></script>        <script type="text/javascript" src="<? echo $admin_page;?>assets/js/placeholder.min.js"></script>    <![endif]--><link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">    <link type="text/css" href="<? echo $admin_page;?>assets/fonts/font-awesome/css/font-awesome.min.css" rel="stylesheet">        <!-- Font Awesome -->    <link type="text/css" href="<? echo $admin_page;?>assets/css/styles.css" rel="stylesheet">                                     <!-- Core CSS with all styles --><link type="text/css" href="<? echo $admin_page;?>assets/plugins/jstree/dist/themes/avenger/style.min.css" rel="stylesheet">    <!-- jsTree -->    <link type="text/css" href="<? echo $admin_page;?>assets/plugins/codeprettifier/prettify.css" rel="stylesheet">                <!-- Code Prettifier -->    <link type="text/css" href="<? echo $admin_page;?>assets/plugins/iCheck/skins/minimal/blue.css" rel="stylesheet">              <!-- iCheck -->    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries. Placeholdr.js enables the placeholder attribute -->    <!--[if lt IE 9]>        <link type="text/css" href="<? echo $admin_page;?>assets/css/ie8.css" rel="stylesheet">        <script type="text/javascript" src="http://cdnjs.cloudflare.com/ajax/libs/respond.js/1.1.0/respond.min.js"></script>        <script type="text/javascript" src="<? echo $admin_page;?>assets/plugins/charts-flot/excanvas.min.js"></script>        <script type="text/javascript" src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>    <![endif]-->    <!-- The following CSS are included as plugins and can be removed if unused-->	<link type="text/css" href="<? echo $admin_page;?>assets/plugins/form-daterangepicker/daterangepicker-bs3.css" rel="stylesheet"> 	<!-- DateRangePicker --><link type="text/css" href="<? echo $admin_page;?>assets/plugins/fullcalendar/fullcalendar.css" rel="stylesheet"> 					<!-- FullCalendar --><link type="text/css" href="<? echo $admin_page;?>assets/plugins/charts-chartistjs/chartist.min.css" rel="stylesheet"> 				<!-- Chartist --><!-- /Switcher -->    <!-- Load site level scripts --><!-- <script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script><script src="//ajax.googleapis.com/ajax/libs/jqueryui/1.9.2/jquery-ui.min.js"></script> --><script type="text/javascript" src="<? echo $admin_page;?>assets/js/jquery-1.10.2.min.js"></script> 							<!-- Load jQuery --><script type="text/javascript" src="<? echo $admin_page;?>assets/js/jqueryui-1.9.2.min.js"></script> 							<!-- Load jQueryUI --><script type="text/javascript" src="<? echo $admin_page;?>assets/js/bootstrap.min.js"></script> 								<!-- Load Bootstrap --><script type="text/javascript" src="<? echo $admin_page;?>assets/plugins/easypiechart/jquery.easypiechart.js"></script> 		<!-- EasyPieChart--><script type="text/javascript" src="<? echo $admin_page;?>assets/plugins/sparklines/jquery.sparklines.min.js"></script>  		<!-- Sparkline --><script type="text/javascript" src="<? echo $admin_page;?>assets/plugins/jstree/dist/jstree.min.js"></script>  				<!-- jsTree --><script type="text/javascript" src="<? echo $admin_page;?>assets/plugins/codeprettifier/prettify.js"></script> 				<!-- Code Prettifier  --><script type="text/javascript" src="<? echo $admin_page;?>assets/plugins/bootstrap-switch/bootstrap-switch.js"></script> 		<!-- Swith/Toggle Button --><script type="text/javascript" src="<? echo $admin_page;?>assets/plugins/bootstrap-tabdrop/js/bootstrap-tabdrop.js"></script>  <!-- Bootstrap Tabdrop --><script type="text/javascript" src="<? echo $admin_page;?>assets/plugins/iCheck/icheck.min.js"></script>     					<!-- iCheck --><script type="text/javascript" src="<? echo $admin_page;?>assets/js/enquire.min.js"></script> 									<!-- Enquire for Responsiveness --><script type="text/javascript" src="<? echo $admin_page;?>assets/plugins/bootbox/bootbox.js"></script>							<!-- Bootbox --><script type="text/javascript" src="<? echo $admin_page;?>assets/plugins/simpleWeather/jquery.simpleWeather.min.js"></script> <!-- Weather plugin--><script type="text/javascript" src="<? echo $admin_page;?>assets/plugins/nanoScroller/js/jquery.nanoscroller.min.js"></script> <!-- nano scroller --><script type="text/javascript" src="<? echo $admin_page;?>assets/plugins/jquery-mousewheel/jquery.mousewheel.min.js"></script> 	<!-- Mousewheel support needed for jScrollPane --><script type="text/javascript" src="<? echo $admin_page;?>assets/js/application.js"></script><script type="text/javascript" src="<? echo $admin_page;?>assets/demo/demo.js"></script><script type="text/javascript" src="<? echo $admin_page;?>assets/demo/demo-switcher.js"></script><link type="text/css" href="<? echo $admin_page;?>assets/plugins/datatables/dataTables.css" rel="stylesheet"><link type="text/css" href="<? echo $admin_page;?>assets/plugins/datatables/ColReorder/css/dataTables.colReorder.css" rel="stylesheet"> 	<!-- ColReorder --><link type="text/css" href="<? echo $admin_page;?>assets/plugins/datatables/KeyTable/css/dataTables.keyTable.css" rel="stylesheet"> 		<!-- KeyTable --><link type="text/css" href="<? echo $admin_page;?>assets/plugins/datatables/dataTables.bootstrap.css" rel="stylesheet"> 					<!-- Bootstrap Support for Datatables --><link type="text/css" href="<? echo $admin_page;?>assets/plugins/datatables/dataTables.fontAwesome.css" rel="stylesheet"> <link type="text/css" href="<? echo $admin_page;?>assets/plugins/summernote/dist/summernote.css" rel="stylesheet"> 	<link type="text/css" href="<? echo $admin_page;?>assets/plugins/jquery-notific8/jquery.notific8.css" rel="stylesheet"> <link type="text/css" href="<? echo $admin_page;?>assets/plugins/form-nestable/jquery.nestable.css" rel="stylesheet">	<script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script><script>admin_page = '<? echo $admin_page;?>';home_url = '<? echo $home_url;?>';</script><link rel="stylesheet" href="<? echo $admin_page; ?>/buianov.css"><script type="text/javascript" src="<? echo $admin_page;?>java_admin.js"></script>    </head><?if (!empty($_SESSION['s'])){		$sql_admins = mysql_query("SELECT uid FROM admin_code WHERE session='$_SESSION[s]'");	$adms = mysql_fetch_array($sql_admins);	$sql_admin_user = mysql_query("SELECT * FROM admin_users WHERE id='$adms[uid]'");	if (mysql_num_rows($sql_admin_user)>0)	{		$admin_user = mysql_fetch_array($sql_admin_user);		$lang = $admin_user[lang];		echo '<div style="margin-left:45%;width:150px;heigth:150px;"><div class="form-group">    <label for="exampleInputEmail1">'.language('old pass',$lang).':</label>    <input type="password" name="text" class="form-control" id="opass">	</div>	<div class="form-group">    <label for="exampleInputEmail1">'.language('new password',$lang).':</label>    <input type="password" name="pass" class="form-control" id="pass">	</div>		<div class="form-group">    <label for="exampleInputEmail1">'.language('repeat password',$lang).':</label>    <input type="password" name="pass" class="form-control" id="pass2">	</div>		<div id="alerts" style="color:red;font-size:14px;"></div><div style="margin-top:20px;text-align:center"><button type="submit" class="btn btn-primary" id="b1" onclick=change_pass()>'.language('change_pass',$lang).'</button></div></div><div id="loading" style="text-align:center;display:none;margin:50px;"><img src="'.$admin_page.'assets/img/load.gif"></div>';	}	else	{ echo 'Error: '.$_SESSION['s'];}}else{	echo 'Error: Session ID is Empty';}
?>