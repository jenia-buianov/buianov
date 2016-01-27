<?
session_start();
//session_destroy();
if (isset($_GET[ajax]))
{
	$_SERVER['REQUEST_URI'] = substr($_SERVER['REQUEST_URI'],0,strlen($_SERVER['REQUEST_URI'])-7);
}
if(!empty($_GET['route'])) {
	$web_page = explode("admin/",$_SERVER['REQUEST_URI']);
	$web_page = $web_page[1];
    $arr = explode( '/', trim($web_page,'/'));
    $count = count($arr);
	$k=0;
	do
	{
		$arr[$k] = htmlspecialchars($arr[$k],ENT_QUOTES);
		$page.='/'.$arr[$k];
		if ($arr[$k]=='edit_page') {break;}
		if ($arr[$k]=='edit_admin_user') {break;}
		if ($arr[$k]=='security') {break;}
		$k++;
	}
	while($k<$count);
	$page = substr($page,1,strlen($page));
}
include("bd.php");

if (empty($page))
{
	$page = 'home';
}
$sql_page = mysql_query("SELECT * FROM admin_pages WHERE page='$page'");
if (mysql_num_rows($sql_page)>0)
{
	$page_info = mysql_fetch_array($sql_page);
	
	if (!empty($_SESSION[s]))
	{
		$sql_admins = mysql_query("SELECT uid FROM admin_code WHERE session='$_SESSION[s]'");
	$adms = mysql_fetch_array($sql_admins);
	$sql_admin_user = mysql_query("SELECT * FROM admin_users WHERE id='$adms[uid]'");
	if (mysql_num_rows($sql_admin_user)>0)
	{
		$admin_user = mysql_fetch_array($sql_admin_user);
		$lang = $admin_user[lang];
	}
	else{echo 'Erorr: '.$_SESSION[s]; exit;}
	
	}	
	if ($page_info[showed]=='n'&&!empty($_SESSION[s]))
	{
		if ($page=='logout')
		{
			$_SESSION['s']='';
			session_destroy();
			header("Location: ".$admin_page);
			exit;
		}
		else
		{
			include($page_info[include_file]);
			exit;
		}
	}
	
	if (isset($_GET[ajax]))
	{
		include($page_info[include_file]);
		exit;
	}
}
else
{
	echo '<html><head>
	<link rel="stylesheet" href="'.$admin_page.'/buianov.css"></head>
	<body>';
	echo error('fatal',404);
	echo'</body></html>';
	exit;
}
$sql_admin_settings = mysql_query("SELECT * FROM admin_settings");
if (mysql_num_rows($sql_admin_settings)>0)
{
	$admin_settings = mysql_fetch_array($sql_admin_settings);
	$k=0;
	do
	{
		$settings[$k] = $admin_settings['value']; 
	}
	while($admin_settings = mysql_fetch_array($sql_admin_settings));
}
$update_version = connect_to_buianov($buianov_name,$buianov_lastname,$buianov_password,$lang,$home_url);

$expl = explode('(?)',$update_version);
$avatar = $expl[0];
if (empty($avatar)) $avatar = 'http://placehold.it/300&text=Placeholder';
$update_aval = $expl[1];

if ($update_aval!=='ok')
{
	$sql_1 = mysql_query("SELECT open_window FROM admin_notifications ORDER BY id desc LIMIT 1");
	$tt = mysql_fetch_array($sql_1);
	if ($tt[open_window]!=='upd')
	{
		$ins = mysql_query("INSERT INTO admin_translation(title,lang,text)VALUES('avaliable new version','$lang','$update_aval')");
		$ins = mysql_query("INSERT INTO admin_notifications(viewed,val,open_window,icon,type,title_lang,time,date)VALUES('n','$visit','upd','fa-upload','danger','avaliable new version','$t_now','$date')");
		if (!$ins) exit(mysql_error());
	}
}
if (count($expl)>2)
{
	$k=2;
	do
	{
		$sql = mysql_query($expl[$k]);
		$k++;
	}
	while($k<count($expl)-1);
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title><? echo $settings[0]; ?></title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0, user-scalable=no">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-touch-fullscreen" content="yes">
    
    <link href='http://fonts.googleapis.com/css?family=RobotoDraft:300,400,400italic,500,700' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:300,400,400italic,600,700' rel='stylesheet' type='text/css'>

<link rel="stylesheet" type="text/css" href="http://s62.ucoz.net/src/ckeditor/custom/ueditor.css">
    <!--[if lt IE 10]>
        <script type="text/javascript" src="<? echo $admin_page;?>assets/js/media.match.min.js"></script>
        <script type="text/javascript" src="<? echo $admin_page;?>assets/js/placeholder.min.js"></script>
    <![endif]-->

<link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
    <link type="text/css" href="<? echo $admin_page;?>assets/fonts/font-awesome/css/font-awesome.min.css" rel="stylesheet">        <!-- Font Awesome -->
    <link type="text/css" href="<? echo $admin_page;?>assets/css/styles.css" rel="stylesheet">                                     <!-- Core CSS with all styles -->
<link type="text/css" href="<? echo $admin_page;?>assets/plugins/jstree/dist/themes/avenger/style.min.css" rel="stylesheet">    <!-- jsTree -->
    <link type="text/css" href="<? echo $admin_page;?>assets/plugins/codeprettifier/prettify.css" rel="stylesheet">                <!-- Code Prettifier -->
    <link type="text/css" href="<? echo $admin_page;?>assets/plugins/iCheck/skins/minimal/blue.css" rel="stylesheet">              <!-- iCheck -->

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries. Placeholdr.js enables the placeholder attribute -->
    <!--[if lt IE 9]>
        <link type="text/css" href="<? echo $admin_page;?>assets/css/ie8.css" rel="stylesheet">
        <script type="text/javascript" src="http://cdnjs.cloudflare.com/ajax/libs/respond.js/1.1.0/respond.min.js"></script>
        <script type="text/javascript" src="<? echo $admin_page;?>assets/plugins/charts-flot/excanvas.min.js"></script>
        <script type="text/javascript" src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->

    <!-- The following CSS are included as plugins and can be removed if unused-->

	
<link type="text/css" href="<? echo $admin_page;?>assets/plugins/form-daterangepicker/daterangepicker-bs3.css" rel="stylesheet"> 	<!-- DateRangePicker -->
<link type="text/css" href="<? echo $admin_page;?>assets/plugins/fullcalendar/fullcalendar.css" rel="stylesheet"> 					<!-- FullCalendar -->
<link type="text/css" href="<? echo $admin_page;?>assets/plugins/charts-chartistjs/chartist.min.css" rel="stylesheet"> 				<!-- Chartist -->

<!-- /Switcher -->
    <!-- Load site level scripts -->

<!-- <script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
<script src="//ajax.googleapis.com/ajax/libs/jqueryui/1.9.2/jquery-ui.min.js"></script> -->

<script type="text/javascript" src="<? echo $admin_page;?>assets/js/jquery-1.10.2.min.js"></script> 							<!-- Load jQuery -->
<script type="text/javascript" src="<? echo $admin_page;?>assets/js/jqueryui-1.9.2.min.js"></script> 							<!-- Load jQueryUI -->

<script type="text/javascript" src="<? echo $admin_page;?>assets/js/bootstrap.min.js"></script> 								<!-- Load Bootstrap -->


<script type="text/javascript" src="<? echo $admin_page;?>assets/plugins/easypiechart/jquery.easypiechart.js"></script> 		<!-- EasyPieChart-->
<script type="text/javascript" src="<? echo $admin_page;?>assets/plugins/sparklines/jquery.sparklines.min.js"></script>  		<!-- Sparkline -->
<script type="text/javascript" src="<? echo $admin_page;?>assets/plugins/jstree/dist/jstree.min.js"></script>  				<!-- jsTree -->

<script type="text/javascript" src="<? echo $admin_page;?>assets/plugins/codeprettifier/prettify.js"></script> 				<!-- Code Prettifier  -->
<script type="text/javascript" src="<? echo $admin_page;?>assets/plugins/bootstrap-switch/bootstrap-switch.js"></script> 		<!-- Swith/Toggle Button -->

<script type="text/javascript" src="<? echo $admin_page;?>assets/plugins/bootstrap-tabdrop/js/bootstrap-tabdrop.js"></script>  <!-- Bootstrap Tabdrop -->

<script type="text/javascript" src="<? echo $admin_page;?>assets/plugins/iCheck/icheck.min.js"></script>     					<!-- iCheck -->

<script type="text/javascript" src="<? echo $admin_page;?>assets/js/enquire.min.js"></script> 									<!-- Enquire for Responsiveness -->

<script type="text/javascript" src="<? echo $admin_page;?>assets/plugins/bootbox/bootbox.js"></script>							<!-- Bootbox -->

<script type="text/javascript" src="<? echo $admin_page;?>assets/plugins/simpleWeather/jquery.simpleWeather.min.js"></script> <!-- Weather plugin-->

<script type="text/javascript" src="<? echo $admin_page;?>assets/plugins/nanoScroller/js/jquery.nanoscroller.min.js"></script> <!-- nano scroller -->

<script type="text/javascript" src="<? echo $admin_page;?>assets/plugins/jquery-mousewheel/jquery.mousewheel.min.js"></script> 	<!-- Mousewheel support needed for jScrollPane -->

<script type="text/javascript" src="<? echo $admin_page;?>assets/js/application.js"></script>
<script type="text/javascript" src="<? echo $admin_page;?>assets/demo/demo.js"></script>
<script type="text/javascript" src="<? echo $admin_page;?>assets/demo/demo-switcher.js"></script>

<link type="text/css" href="<? echo $admin_page;?>assets/plugins/datatables/dataTables.css" rel="stylesheet">

<link type="text/css" href="<? echo $admin_page;?>assets/plugins/datatables/ColReorder/css/dataTables.colReorder.css" rel="stylesheet"> 	<!-- ColReorder -->
<link type="text/css" href="<? echo $admin_page;?>assets/plugins/datatables/KeyTable/css/dataTables.keyTable.css" rel="stylesheet"> 		<!-- KeyTable -->

<link type="text/css" href="<? echo $admin_page;?>assets/plugins/datatables/dataTables.bootstrap.css" rel="stylesheet"> 					<!-- Bootstrap Support for Datatables -->
<link type="text/css" href="<? echo $admin_page;?>assets/plugins/datatables/dataTables.fontAwesome.css" rel="stylesheet"> 
<link type="text/css" href="<? echo $admin_page;?>assets/plugins/summernote/dist/summernote.css" rel="stylesheet"> 	
<link type="text/css" href="<? echo $admin_page;?>assets/plugins/jquery-notific8/jquery.notific8.css" rel="stylesheet"> 
<link type="text/css" href="<? echo $admin_page;?>assets/plugins/form-nestable/jquery.nestable.css" rel="stylesheet">
	
<script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
<script>
admin_page = '<? echo $admin_page;?>';
home_url = '<? echo $home_url;?>';
</script>
<link rel="stylesheet" href="<? echo $admin_page; ?>/buianov.css">
<script type="text/javascript" src="<? echo $admin_page;?>java_admin.js"></script>
    </head>
<?
if (empty($_SESSION['s']))
{
echo '<div style="margin-left:45%;width:150px;heigth:150px;">
<div class="form-group">

    <label for="exampleInputEmail1">'.language('login',$lang).':</label>

    <input type="text" name="text" class="form-control" id="text">

	</div>

	<div class="form-group">

    <label for="exampleInputEmail1">'.language('password',$lang).':</label>

    <input type="password" name="pass" class="form-control" id="pass">

	</div>
	

	<div id="alerts" style="color:red;"></div>

<div style="margin-top:20px;text-align:center"><button type="submit" class="btn btn-primary" id="b1" onclick=enters()>'.language('enter',$lang).'</button></div>

</div>
<div id="loading" style="text-align:center;display:none;margin:50px;"><img src="'.$admin_page.'assets/img/load.gif"></div>';

exit;	

}
?>
    <body class="infobar-offcanvas" style="overflow-x:hidden">
        
        <div id="headerbar">
	<div class="container-fluid">
		<div class="row">
			<div class="col-xs-6 col-sm-2">
				<a href="#" class="shortcut-tile tile-brown">
					<div class="tile-body">
						<div class="pull-left"><i class="fa fa-pencil"></i></div>
					</div>
					<div class="tile-footer">
						<? echo language('add',$lang);?>
					</div>
				</a>
			</div>
			<div class="col-xs-6 col-sm-2">
				<a href="#" class="shortcut-tile tile-grape">
					<div class="tile-body">
						<div class="pull-left"><i class="fa fa-group"></i></div>
						<?
						?>
					</div>
					<div class="tile-footer">
						<? echo language('users',$lang);?>
					</div>
				</a>
			</div>
			<div class="col-xs-6 col-sm-2">
				<a href="#" class="shortcut-tile tile-primary">
					<div class="tile-body">
						<div class="pull-left"><i class="fa fa-envelope-o"></i></div>
						<?
						$sql_users = mysql_query("SELECT id FROM admin_inbox WHERE viewed='n'");
						if (mysql_num_rows($sql_users)>0)
						{
							echo '<div class="pull-right"><span class="badge">'.mysql_num_rows($sql_users).'</span></div>';
						}
						?>
					</div>
					<div class="tile-footer">
						<? echo language('inbox',$lang);?>
					</div>
				</a>
			</div>
			<div class="col-xs-6 col-sm-2">
				<a href="<? echo $admin_page;?>chat" class="shortcut-tile tile-inverse">
					<div class="tile-body">
						<div class="pull-left"><i class="fa fa-camera"></i></div>
						<?
						$sql_users = mysql_query("SELECT DISTINCT `from` FROM admin_chat WHERE viewed='n' and `from`<>'chatroom'");
						if (mysql_num_rows($sql_users)>0)
						{
							echo '<div class="pull-right"><span class="badge">'.mysql_num_rows($sql_users).'</span></div>';
						}
						?>
					</div>
					<div class="tile-footer">
					<? echo language('chat',$lang);?>
					</div>
				</a>
			</div>

			<div class="col-xs-6 col-sm-2">
				<a href="<? echo $admin_page;?>settings" class="shortcut-tile tile-midnightblue">
					<div class="tile-body">
						<div class="pull-left"><i class="fa fa-cog"></i></div>
					</div>
					<div class="tile-footer">
						<? echo language('settings',$lang);?>
					</div>
				</a>
			</div>
			<div class="col-xs-6 col-sm-2">
				<a href="#" class="shortcut-tile tile-orange">
					<div class="tile-body">
						<div class="pull-left"><i class="fa fa-wrench"></i></div>
					</div>
					<div class="tile-footer">
						<? echo language('plugins',$lang);?>
					</div>
				</a>
			</div>
		</div>
	</div>
</div>
        <header id="topnav" class="navbar navbar-midnightblue navbar-fixed-top clearfix" role="banner">

	<span id="trigger-sidebar" class="toolbar-trigger toolbar-icon-bg">
		<a data-toggle="tooltips" data-placement="right" title="<? echo language('menu',$lang); ?>"><span class="icon-bg"><i class="fa fa-fw fa-bars"></i></span></a>
	</span>

	<a class="navbar-brand" href="<? echo $admin_page;?>"><? echo $settings[0];?></a>

	<span id="trigger-infobar" class="toolbar-trigger toolbar-icon-bg">
		<a data-toggle="tooltips" data-placement="left" title="<? echo language('right_panel',$lang); ?>"><span class="icon-bg"><i class="fa fa-fw fa-bars"></i></span></a>
	</span>
	
	<?
	$sql_admin_menu_blocks = mysql_query("SELECT * FROM admin_top_menu_block");
	if (mysql_num_rows($sql_admin_menu_blocks)>0)
	{
		$admin_menu_blocks = mysql_fetch_array($sql_admin_menu_blocks);
	?>
	<div class="yamm navbar-left navbar-collapse collapse in">
		<ul class="nav navbar-nav">
		<?
		do
		{
			echo'<li class="dropdown">
				<a href="#" class="dropdown-toggle" data-toggle="dropdown">'.language($admin_menu_blocks['title_lang'],$lang).'<span class="caret"></span></a>
				<ul class="dropdown-menu" style="width:250px;">
					<li>
					<div class="yamm-content container-sm-height" style="padding:0px">
							<div class="row row-sm-height yamm-col-bordered" style="padding:0px;margin:0px;text-align:left;width:200px;">
								<div class="col-sm-3 col-sm-height yamm-col" style="width:100%">';
								
					$sql_block = mysql_query("SELECT * FROM `admin_top_menu` WHERE block_id='0' and bl='$admin_menu_blocks[id]'");
					if (mysql_num_rows($sql_block)>0)
					{
						$blocks_top = mysql_fetch_array($sql_block);
						do
						{
							echo'<h3 class="yamm-category">'.language($blocks_top['title_lang'],$lang).'</h3>
                                    <ul class="list-unstyled mb20">';
									$sql_menu_top = mysql_query("SELECT * FROM admin_top_menu WHERE block_id='$blocks_top[id]' and bl='$admin_menu_blocks[id]' ORDER BY id");
									if (mysql_num_rows($sql_menu_top)>0)
									{
										$top_menu = mysql_fetch_array($sql_menu_top);
										do
										{
											echo'<li><a href="'.$top_menu[href].'">'.language($top_menu['title_lang'],$lang).'</a></li>';
										}
										while($top_menu = mysql_fetch_array($sql_menu_top));
									}
                                    echo' </ul>';
						}
						while($blocks_top = mysql_fetch_array($sql_block));
					}
				echo'</div></div></div></li>
			</ul>';
		}
		while($admin_menu_blocks = mysql_fetch_array($sql_admin_menu_blocks));
		?>
			
		</ul>
	</div>
<? }	?>
	<ul class="nav navbar-nav toolbar pull-right">
		<li class="dropdown toolbar-icon-bg">
			<a href="#" id="navbar-links-toggle" data-toggle="collapse" data-target="header>.navbar-collapse">
				<span class="icon-bg">
					<i class="fa fa-fw fa-ellipsis-h"></i>
				</span>
			</a>
		</li>

		<li class="dropdown toolbar-icon-bg demo-search-hidden">
			<a href="#" class="dropdown-toggle tooltips" data-toggle="dropdown"><span class="icon-bg"><i class="fa fa-fw fa-search"></i></span></a>
			
			<div class="dropdown-menu dropdown-alternate arrow search dropdown-menu-form">
				<div class="dd-header">
					<span><? echo language('search',$lang); ?></span>
					<span><a href="#"><? echo language('search_advanced',$lang);?></a></span>
				</div>
				<div class="input-group">
					<input type="text" class="form-control" placeholder="">
					
					<span class="input-group-btn">
						
						<a class="btn btn-primary" href="#"><? echo language('search',$lang); ?></a>
					</span>
				</div>
			</div>
		</li>

		<li class="toolbar-icon-bg demo-headerdrop-hidden">
            <a href="#" id="headerbardropdown"><span class="icon-bg"><i class="fa fa-fw fa-level-down"></i></span></i></a>
        </li>

        <li class="toolbar-icon-bg hidden-xs" id="trigger-fullscreen">
            <a href="#" class="toggle-fullscreen"><span class="icon-bg"><i class="fa fa-fw fa-arrows-alt"></i></span></i></a>
        </li>

		<?
		$sql_notification = mysql_query("SELECT * FROM admin_notifications WHERE viewed='n'");
	
		?>
		<li class="dropdown toolbar-icon-bg">
			<a href="#" class="hasnotifications dropdown-toggle" data-toggle='dropdown'><span class="icon-bg"><i class="fa fa-fw fa-bell"></i></span>
			<?
			if (mysql_num_rows($sql_notification)) echo '<span class="badge badge-info">'.mysql_num_rows($sql_notification).'</span>';
			?></a>
			<div class="dropdown-menu dropdown-alternate notifications arrow">
				<div class="dd-header">
					<span><? echo language('notification',$lang); ?></span>
					<span><a href="#"><? echo language('settings',$lang); ?></a></span>
				</div>
				
<div class="scrollthis scroll-pane">
					
					<?
					$sql_notification = mysql_query("SELECT * FROM admin_notifications ORDER BY id DESC LIMIT 7");
					if (mysql_num_rows($sql_notification)>0)
					{
						echo'<ul class="scroll-content">';
						
						$notification = mysql_fetch_array($sql_notification);
						do{
							
							
							$m_ago = time_elapsed_string($notification['date'].' '.$notification['time'],$lang);
							echo '<li class="">
							<a href="#" class="notification-'.$notification[type].'"';
							if ($notification[open_window]=='upd'){ echo ' onclick=update()';}
							echo'>
								<div class="notification-icon"><i class="fa '.$notification[icon].' fa-fw"></i></div>
								<div class="notification-content" style="width:175px;">'.language($notification[title_lang],$lang).'</div>
								<div class="notification-time">'.$m_ago.'</div>
							</a>
						</li>';
						}
						while($notification = mysql_fetch_array($sql_notification));
						echo '</ul>';
					}else{echo '<ul class="scroll-content">'.language('no_notifications',$lang).'</ul>';}
						?>
				</div>
				<div class="dd-footer">
					<a href="#"><? echo language('all_notifications',$lang); ?></a>
				</div>
			</div>
		</li>
</header>
        <div id="wrapper">
		
            <div id="layout-static">
                <div class="static-sidebar-wrapper sidebar-midnightblue">
                    <div class="static-sidebar">
                        <div class="sidebar">
    <div class="widget stay-on-collapse" id="widget-welcomebox">
        <div class="widget-body welcome-box tabular">
            <div class="tabular-row">
                <div class="tabular-cell welcome-avatar">
                    <a href="#"><img src="<? echo $avatar; ?>" class="avatar"></a>
                </div>
                <div class="tabular-cell welcome-options">
                    <span class="welcome-text"><? echo language('welcome',$lang);?></span>
                    <a href="#" class="name"><? echo $admin_user[name];?></a>
                </div>
            </div>
        </div>
    </div>
	<div class="widget stay-on-collapse" id="widget-sidebar">
        <nav role="navigation" class="widget-body">
	<ul class="acc-menu">
		<li class="nav-separator"><? echo language('modules',$lang); ?></li>
		<?
		$sql_block = mysql_query("SELECT * FROM admin_blocks WHERE type='modules' ORDER BY orders");
		if (mysql_num_rows($sql_block)>0)
		{
			$left_block = mysql_fetch_array($sql_block);
			do
			{
				echo '<li><a href="'.$admin_page.$left_block[href].'"><i class="fa '.$left_block['icon'].'"></i><span>'.language($left_block['title_lang'],$lang).'</span></a></li>';
			}
			while($left_block = mysql_fetch_array($sql_block));
			echo'<li><a href="'.$admin_page.'settings"><i class="fa fa-cog"></i><span>'.language('settings',$lang).'</span></a></li>';
		}
		?>
		<li class="nav-separator"><? echo language('apps',$lang); ?></li>
		<?
		$sql_block = mysql_query("SELECT * FROM admin_blocks WHERE type='apps' ORDER BY orders");
		if (mysql_num_rows($sql_block)>0)
		{
			$left_block = mysql_fetch_array($sql_block);
			do
			{
				echo '<li><a href="'.$admin_page.$left_block[href].'"><i class="fa '.$left_block['icon'].'"></i><span>'.language($left_block['title_lang'],$lang).'</span></a></li>';
			}
			while($left_block = mysql_fetch_array($sql_block));
		}
		?>
		<li class="nav-separator"><? echo language('templates',$lang); ?></li>
		<?
		$sql_block = mysql_query("SELECT * FROM admin_blocks WHERE type='templates' ORDER BY orders");
		if (mysql_num_rows($sql_block)>0)
		{
			$left_block = mysql_fetch_array($sql_block);
			do
			{
				echo '<li><a href="'.$admin_page.$left_block[href].'"><i class="fa '.$left_block['icon'].'"></i><span>'.language($left_block['title_lang'],$lang).'</span></a></li>';
			}
			while($left_block = mysql_fetch_array($sql_block));
		}
		?>
		
	</ul>
</nav>
    </div>
</div>                    </div>
                </div>
                <div class="static-content-wrapper">
				
				<div class="task__content" data-id="1">
                    <div class="static-content">
                        <div class="page-content">
                           
							<div class="container-fluid" style="margin-top:30px;">
							<font id="content">

<?php
include($page_info['include_file']);

?>	
</font>

<font class="st1"><font class="static-back"></font></font>
<footer role="contentinfo">
    <div class="clearfix">
        <ul class="list-unstyled list-inline pull-left">
            <li><h6 style="margin: 0;"> &copy; 2015<?if ($yaer>2015) echo '-'.$yaer;?> BUIANOV</h6></li>
        </ul>
        <button class="pull-right btn btn-link btn-xs hidden-print" id="back-to-top"><i class="fa fa-arrow-up"></i></button>
    </div>
</footer>
                </div>
            </div>
        </div>
</DIV>

  <nav id="context-menu" class="context-menu">
    <ul class="context-menu__items">
      <li class="context-menu__item">
        <a href="#" class="context-menu__link" data-action=""><i class="fa fa-home"></i> <? echo language('home',$lang); ?></a>
      </li>
      <li class="context-menu__item">
        <a href="#" class="context-menu__link" data-action="settings/security"><i class="fa fa-lock"></i> <? echo language('security',$lang); ?></a>
      </li>
      <li class="context-menu__item">
        <a href="#" class="context-menu__link" data-action="contacts"><i class="fa fa-bold"></i> <? echo language('write admin',$lang); ?></a>
      </li>
	  
      <li class="context-menu__item">
        <a href="#" class="context-menu__link" data-action="inbox"><i class="fa fa-inbox"></i> <? echo language('inbox',$lang); ?></a>
      </li>
      <li class="context-menu__item">
        <a href="#" class="context-menu__link" data-action="settings"><i class="fa fa-cog"></i> <? echo language('settings',$lang); ?></a>
      </li>
	  
      <li class="context-menu__item">
        <a href="#" class="context-menu__link" data-action="logout"><i class="fa fa-sign-out"></i> <? echo language('sing out',$lang); ?></a>
      </li>
	  
    </ul>
  </nav>
        <div class="infobar-wrapper scroll-pane">
            <div class="infobar scroll-content">

    <div id="widgetarea">
	<?php
	echo '<a href="#" onclick=open_window("'.$admin_page.'settings/right_panel") class="more" style="display:block;margin-bottom:10px;text-align:right">'.language('right_settings',$lang).'</a>';
	$sql_right_panel = mysql_query("SELECT * FROM admin_right ORDER BY pr");
	if (mysql_num_rows($sql_right_panel)>0)
	{
		$admin_right = mysql_fetch_array($sql_right_panel);
		do
		{
			echo'<div class="widget"'; 
			if (!empty($admin_right[type])){ echo ' class="'.$admin_right[type].'"';}
			echo'>
            <div class="widget-heading">
                <a href="'.$admin_page.'settings/right" data-toggle="collapse" data-target="#recentactivity"><h4>'.language($admin_right[title_lang],$lang).'</h4></a>
            </div>
            <div id="'.$admin_right[title_lang].'" class="collapse in">
                <div class="widget-body">
                   '.include($admin_right['include_file']).'
                </div>
            </div>
        </div>';
		}
		while($admin_right = mysql_fetch_array($sql_right_panel));
	}
	else
	{
		echo language('no_widget',$lang);
	}
	?>
	</div>
        </div>


    
    
<!-- End loading site level scripts -->
    
    <!-- Load page level scripts-->
    
<script type="text/javascript" src="<? echo $admin_page;?>assets/plugins/fullcalendar/fullcalendar.min.js"></script>   				<!-- FullCalendar -->

<script type="text/javascript" src="<? echo $admin_page;?>assets/plugins/wijets/wijets.js"></script>     								<!-- Wijet -->

<script type="text/javascript" src="<? echo $admin_page;?>assets/plugins/charts-chartistjs/chartist.min.js"></script>               	<!-- Chartist -->
<script type="text/javascript" src="<? echo $admin_page;?>assets/plugins/charts-chartistjs/chartist-plugin-tooltip.js"></script>    	<!-- Chartist -->

<script type="text/javascript" src="<? echo $admin_page;?>assets/plugins/form-daterangepicker/moment.min.js"></script>              	<!-- Moment.js for Date Range Picker -->
<script type="text/javascript" src="<? echo $admin_page;?>assets/plugins/form-daterangepicker/daterangepicker.js"></script>     				<!-- Date Range Picker -->

<script type="text/javascript" src="<? echo $admin_page;?>assets/demo/demo-index.js"></script> 										<!-- Initialize scripts for this page-->
<link type="text/css" href="<? echo $admin_page;?>assets/plugins/progress-skylo/skylo.css" rel="stylesheet"> 	<!-- Skylo -->

<script type="text/javascript" src="<? echo $admin_page;?>assets/plugins/datatables/jquery.dataTables.js"></script> 						<!-- Data Tables -->

<script type="text/javascript" src="<? echo $admin_page;?>assets/plugins/datatables/TableTools/js/dataTables.tableTools.js"></script> 		<!-- Table Tools --> 
<script type="text/javascript" src="<? echo $admin_page;?>assets/plugins/datatables/ColReorder/js/dataTables.colReorder.min.js"></script> 	<!-- ColReorder -->
<script type="text/javascript" src="<? echo $admin_page;?>assets/plugins/datatables/KeyTable/js/dataTables.keyTable.js"></script> 			<!-- KeyTable -->

<script type="text/javascript" src="<? echo $admin_page;?>assets/plugins/datatables/dataTables.bootstrap.js"></script> 					<!-- Bootstrap Support for Datatables -->

<script type="text/javascript" src="<? echo $admin_page;?>assets/plugins/wijets/wijets.js"></script>     									<!-- Wijet -->

<script type="text/javascript" src="<? echo $admin_page;?>assets/demo/demo-tables-advanceddatatables.js"></script>

 
<script type="text/javascript" src="<? echo $admin_page;?>assets/plugins/progress-skylo/skylo.js"></script> 		<!-- Skylo -->
<script type="text/javascript" src="<? echo $admin_page;?>assets/plugins/summernote/dist/summernote.js"></script>
<script type="text/javascript" src="<? echo $admin_page;?>assets/plugins/jquery-notific8/jquery.notific8.js"></script> 		<!-- Notific8 Plugin -->

<script type="text/javascript" src="<? echo $admin_page;?>assets/demo/demo-custom-notific8.js"></script>


<script type="text/javascript" src="<? echo $admin_page; ?>assets/plugins/form-nestable/jquery.nestable.min.js"></script>
<script type="text/javascript" src="<? echo $admin_page; ?>assets/demo/demo-nestable.js"></script>
<?
echo $lst;
?>
<script>

(function() {
  
  "use strict";
function clickInsideElement( e, className ) {
    var el = e.srcElement || e.target;
    
    if ( el.classList.contains(className) ) {
      return el;
    } else {
      while ( el = el.parentNode ) {
        if ( el.classList && el.classList.contains(className) ) {
          return el;
        }
      }
    }

    return false;
  }
function getPosition(e) {
    var posx = 0;
    var posy = 0;

    if (!e) var e = window.event;
    
    if (e.pageX || e.pageY) {
      posx = e.pageX;
      posy = e.pageY;
    } else if (e.clientX || e.clientY) {
      posx = e.clientX + document.body.scrollLeft + document.documentElement.scrollLeft;
      posy = e.clientY + document.body.scrollTop + document.documentElement.scrollTop;
    }

    return {
      x: posx,
      y: posy
    }
  }
  var contextMenuClassName = "context-menu";
  var contextMenuItemClassName = "context-menu__item";
  var contextMenuLinkClassName = "context-menu__link";
  var contextMenuActive = "context-menu--active";

  var taskItemClassName = "static-content-wrapper";
  var taskItemInContext;

  var clickCoords;
  var clickCoordsX;
  var clickCoordsY;

  var menu = document.querySelector("#context-menu");
  var menuItems = menu.querySelectorAll(".context-menu__item");
  var menuState = 0;
  var menuWidth;
  var menuHeight;
  var menuPosition;
  var menuPositionX;
  var menuPositionY;

  var windowWidth;
  var windowHeight;

  /**
   * Initialise our application's code.
   */
  function init() {
    contextListener();
    clickListener();
    keyupListener();
    resizeListener();
  }

  /**
   * Listens for contextmenu events.
   */
  function contextListener() {
    document.addEventListener( "contextmenu", function(e) {
      taskItemInContext = clickInsideElement( e, taskItemClassName );

      if ( taskItemInContext ) {
        e.preventDefault();
        toggleMenuOn();
        positionMenu(e);
      } else {
        taskItemInContext = null;
        toggleMenuOff();
      }
    });
  }

  /**
   * Listens for click events.
   */
  function clickListener() {
    document.addEventListener( "click", function(e) {
      var clickeElIsLink = clickInsideElement( e, contextMenuLinkClassName );

      if ( clickeElIsLink ) {
        e.preventDefault();
        menuItemListener( clickeElIsLink );
      } else {
        var button = e.which || e.button;
        if ( button === 1 ) {
          toggleMenuOff();
        }
      }
    });
  }

  /**
   * Listens for keyup events.
   */
  function keyupListener() {
    window.onkeyup = function(e) {
      if ( e.keyCode === 27 ) {
        toggleMenuOff();
      }
    }
  }

  /**
   * Window resize event listener
   */
  function resizeListener() {
    window.onresize = function(e) {
      toggleMenuOff();
    };
  }

  /**
   * Turns the custom context menu on.
   */
  function toggleMenuOn() {
    if ( menuState !== 1 ) {
      menuState = 1;
      menu.classList.add( contextMenuActive );
    }
  }

  /**
   * Turns the custom context menu off.
   */
  function toggleMenuOff() {
    if ( menuState !== 0 ) {
      menuState = 0;
      menu.classList.remove( contextMenuActive );
    }
  }

  /**
   * Positions the menu properly.
   * 
   * @param {Object} e The event
   */
  function positionMenu(e) {
    clickCoords = getPosition(e);
    clickCoordsX = clickCoords.x-248;
    clickCoordsY = clickCoords.y-50;

    menuWidth = menu.offsetWidth -100;
    menuHeight = menu.offsetHeight -100;

    windowWidth = window.innerWidth;
    windowHeight = window.innerHeight;

    menu.style.left = clickCoordsX + "px";
	menu.style.top = clickCoordsY + "px";
    
  }

  /**
   * Dummy action function that logs an action when a menu item link is clicked
   * 
   * @param {HTMLElement} link The link that was clicked
   */
  function menuItemListener( link ) {
    content(link.getAttribute("data-action"));
	toggleMenuOff();
  }

  /**
   * Run the app.
   */
  init();

})();
</script>
    <!-- End loading page level scripts-->
</body>
</html>