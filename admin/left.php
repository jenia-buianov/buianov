<content>
<?
if ($admin_user[group]=='Admin')
{
	echo '<div style="text-align:right;margin-bottom:20px;"><button class="btn-success btn" onclick=content("add_left");>'.language('add',$lang).'</button></div>';
}
?>
<div id="loading" style="text-align:center;display:none;margin:30px;"><img src="<? echo  $admin_page;?>assets/img/load.gif"></div>
<?
//$sql_left = mysql_query("SELECT * FROM admin_blocks WHERE ");
?>
<div class="row">
    <div class="col-md-12">
        <div class="panel panel-info">
            <div class="panel-heading"><h2><? echo language('left_menu',$lang); ?></h2></div>
            <div class="panel-body">
                <?
				//$iop = mysql_query("update admin_blocks SET system='y'");
				echo '<h2>'.language('modules',$lang).'</h2>';
				$sql_left = mysql_query("SELECT * FROM admin_blocks WHERE type='modules' ORDER BY orders");
				if (mysql_num_rows($sql_left)>0)
				{
					$left = mysql_fetch_array($sql_left);$k=1;
					do
					{
						echo '<div style="margin:5px;padding:5px;font-size:15px;"><font style="left:20px;font-size:13px;position:absolute;width:60px;color:#666">'.$k.'</font>'.language($left[title_lang],$lang).'<font style="position:absolute;right:25px;">';
						if ($k<mysql_num_rows($sql_left)) echo '<a href="#" class="btn btn-primary-alt" onclick=order("'.$left[id].'",'.($k+1).')><i class="fa fa-arrow-down" onclick=order("'.$left[id].'",'.($k+1).')></i></a>';
						if ($k>1) echo '<a href="#" class="btn btn-success-alt" style="margin-left:15px;" onclick=order("'.$left[id].'",'.($k-1).')><i class="fa fa-arrow-up" onclick=order("'.$left[id].'",'.($k-1).')></i></a>';
						if ($left['system']!=='y') echo '<a href="#" class="btn btn-danger-alt" style="margin-left:15px;" onclick=deletes("admin_blocks","'.$left[id].'","settings/left")><i class="fa fa-trash" onclick=deletes("admin_blocks","'.$left[id].'","settings/left")></i></a>';
						echo'</font></div>';
						$k++;
					}
					while($left = mysql_fetch_array($sql_left));
				}
				
				
				echo '<h2>'.language('apps',$lang).'</h2>';
				$sql_left = mysql_query("SELECT * FROM admin_blocks WHERE type='apps' ORDER BY orders");
				if (mysql_num_rows($sql_left)>0)
				{
					$left = mysql_fetch_array($sql_left);$k=1;
					do
					{
						echo '<div style="margin:5px;padding:5px;font-size:15px;"><font style="left:20px;font-size:13px;position:absolute;width:60px;color:#666">'.$k.'</font>'.language($left[title_lang],$lang).'<font style="position:absolute;right:25px;">';
						if ($k<mysql_num_rows($sql_left)) echo '<a href="#" class="btn btn-primary-alt" onclick=order("'.$left[id].'",'.($k+1).')><i class="fa fa-arrow-down" onclick=order("'.$left[id].'",'.($k+1).')></i></a>';
						if ($k>1) echo '<a href="#" class="btn btn-success-alt" style="margin-left:15px;" onclick=order("'.$left[id].'",'.($k-1).')><i class="fa fa-arrow-up" onclick=order("'.$left[id].'",'.($k-1).')></i></a>';
						if ($left['system']!=='y') echo '<a href="#" class="btn btn-danger-alt" style="margin-left:15px;" onclick=deletes("admin_blocks","'.$left[id].'","settings/left")><i class="fa fa-trash" onclick=deletes("admin_blocks","'.$left[id].'","settings/left")></i></a>';
						echo'</font></div>';
						$k++;
					}
					while($left = mysql_fetch_array($sql_left));
				}

				
				echo '<h2>'.language('templates',$lang).'</h2>';
				$sql_left = mysql_query("SELECT * FROM admin_blocks WHERE type='templates' ORDER BY orders");
				if (mysql_num_rows($sql_left)>0)
				{
					$left = mysql_fetch_array($sql_left);$k=1;
					do
					{
						echo '<div style="margin:5px;padding:5px;font-size:15px;"><font style="left:20px;font-size:13px;position:absolute;width:60px;color:#666">'.$k.'</font>'.language($left[title_lang],$lang).'<font style="position:absolute;right:25px;">';
						if ($k<mysql_num_rows($sql_left)) echo '<a href="#" class="btn btn-primary-alt" onclick=order("'.$left[id].'",'.($k+1).')><i class="fa fa-arrow-down" onclick=order("'.$left[id].'",'.($k+1).')></i></a>';
						if ($k>1) echo '<a href="#" class="btn btn-success-alt" style="margin-left:15px;" onclick=order("'.$left[id].'",'.($k-1).')><i class="fa fa-arrow-up" onclick=order("'.$left[id].'",'.($k-1).')></i></a>';
						if ($left['system']!=='y') echo '<a href="#" class="btn btn-danger-alt" style="margin-left:15px;" onclick=deletes("admin_blocks","'.$left[id].'","settings/left")><i class="fa fa-trash" onclick=deletes("admin_blocks","'.$left[id].'","settings/left")></i></a>';
						echo'</font></div>';
						$k++;
					}
					while($left = mysql_fetch_array($sql_left));
				}
				
				?>
            </div>
        </div>
    </div>
</div>
</content>
