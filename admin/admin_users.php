<content>

<div style="text-align:right;margin-bottom:20px;"><button class="btn-success btn" onclick=content("add_admin_user");><? echo language('add',$lang); ?></button></div>
<div id="loading" style="text-align:center;display:none;margin:30px;"><img src="<? echo $admin_page;?>assets/img/load.gif"></div>


<?
$pp = '';
$sql_pages = mysql_query("SELECT * FROM admin_users");
if (mysql_num_rows($sql_pages)>0)
{
	$k = 0;
	?>
	<div id="content">
	
<div class="row" data-widget-group="group1">
	<div class="col-md-12">
		
		<div class="panel panel-default" id="panel-tabletools" data-widget='{"draggable":"false"}'>
			<div class="panel-heading">
				<h2><? echo language('admin users',$lang);?></h2>
				<div class="panel-ctrls"
					data-actions-container="" 
					data-action-collapse='{"target": ".panel-body"}'
					data-action-expand=''
					data-action-colorpicker=''
				>
				</div>
			</div>
			<div class="panel-editbox" data-widget-controls=""></div>
			<div class="panel-body panel-no-padding">

				<table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered datatables" id="tabletools">
					<thead>
					<tr>	<th>#</th>
							<th><? echo language('name',$lang);?></th>
							<th><? echo language('login',$lang);?></th>
							<th><? echo language('email',$lang);?></th>
							<th><? echo language('group',$lang);?></th>
							<th><? echo language('language',$lang);?></th>
							<th><? echo language('edit',$lang);?></th>
						<? if ($admin_user[group]=='Admin') {?>	<th><? echo language('delete',$lang);?></th> <? } ?>
						</tr>
						</thead><tbody>
	<?
	$pages = mysql_fetch_array($sql_pages);
	$k=1;
	do
	{
		echo '<tr class="odd gradeX">
							<td>'.$k.'</td>
							<td>'.$pages[name].'</td>
							<td>'.$pages[user].'</td>
							<td>'.$pages[email].'</td>
							<td>'.$pages[group].'</td>
							<td>';
							$sql_languge = mysql_query("SELECT lang FROM admin_languages WHERE abb='$pages[lang]'");
							if (mysql_num_rows($sql_languge)>0)
							{
								$ln = mysql_fetch_array($sql_languge);
								echo $ln[lang];
							}
							echo'</td>
							<td class="center"><a href="#" onclick=content("edit_admin_user/'.$pages[user].'")>'.language('edit',$lang).'</a></td>
							';
							if ($admin_user[group]=='Admin') {
								if ($admin_user[id]!==$pages[id])	{echo'<td class="center"><a href="#" onclick=deletes("admin_users","'.$pages[id].'","admin_users")>'.language('delete',$lang).'</a></td>';
								}else{echo '<td></td>';}
							}
							echo'
						</tr>';
						$k++;
	}
	while($pages = mysql_fetch_array($sql_pages));
	?>
	
					
						
					</tbody>
				</table>

				<div class="panel-footer"></div>
			</div>
		</div>
	</div>

	
		</div>
	</div>
</div>
	</div>
	
<script type="text/javascript" src="<? echo $admin_page;?>assets/plugins/datatables/jquery.dataTables.js"></script> 						<!-- Data Tables -->

<script type="text/javascript" src="<? echo $admin_page;?>assets/plugins/datatables/TableTools/js/dataTables.tableTools.js"></script> 		<!-- Table Tools --> 
<script type="text/javascript" src="<? echo $admin_page;?>assets/plugins/datatables/ColReorder/js/dataTables.colReorder.min.js"></script> 	<!-- ColReorder -->
<script type="text/javascript" src="<? echo $admin_page;?>assets/plugins/datatables/KeyTable/js/dataTables.keyTable.js"></script> 			<!-- KeyTable -->

<script type="text/javascript" src="<? echo $admin_page;?>assets/plugins/datatables/dataTables.bootstrap.js"></script> 					<!-- Bootstrap Support for Datatables -->

<script type="text/javascript" src="<? echo $admin_page;?>assets/plugins/wijets/wijets.js"></script>     									<!-- Wijet -->

<script type="text/javascript" src="<? echo $admin_page;?>assets/demo/demo-tables-advanceddatatables.js"></script>
	<?
}
else
{
	echo '<div id="error"><medium>'.language('nothing found',$lang).'</medium></div>';
}
?>
</content>