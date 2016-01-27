<?
session_start();
include('bd.php');
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
$title = language('update',$lang);
echo '<h1 style="margin-top20px;text-align:center">'.strtoupper($title).'</h1>';
echo '<div id="procces" style="text-align:center;margin-top:10%"></div>';
echo '<div id="loading2" style="text-align:center;display:none;margin:30px;margin-top:10%"><img src="'.$admin_page.'assets/img/load.gif"></div>';

?>
<script type="text/javascript" src="<? echo $admin_page;?>assets/js/jquery-1.10.2.min.js"></script> 							<!-- Load jQuery -->
<script type="text/javascript" src="<? echo $admin_page;?>assets/js/jqueryui-1.9.2.min.js"></script> 							<!-- Load jQueryUI -->

<script type="text/javascript" src="<? echo $admin_page;?>assets/js/bootstrap.min.js"></script> 								<!-- Load Bootstrap -->

<script>
function th()
{
	$.post(admin_page+"download_update.php", {s:''},function(data){
	$('#procces').html(data);
	if (data=='update ok') content('home');
	});
}
function second_(name)
{
	$.post(admin_page+"backup3.php", {name:name},function(data){
	 $('#procces').html(data);
	th();
	});
}
function start_backup()
{
	$("#loading2").css("display","block");
	$.post(admin_page+"backup1.php", {s:''},function(data){
	 $('#procces').html('Database was backuped');
	 second_(data);
	
	 });
}
start_backup();
</script>