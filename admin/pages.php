<content>

<div style="text-align:right;margin-bottom:20px;"><button class="btn-success btn" onclick=content("add_page");><? echo language('add',$lang); ?></button></div>
<div id="loading" style="text-align:center;display:none;margin:30px;"><img src="<? echo $admin_page;?>assets/img/load.gif"></div>

<?
$pp = '';
$sql_pages = mysql_query("SELECT * FROM pages");
if (mysql_num_rows($sql_pages)>0)
{
	$k = 0;
	?>
	<div id="content">
	
<div class="row" data-widget-group="group1">
	<div class="col-md-12">
		
		<div class="panel panel-default" id="panel-tabletools" data-widget='{"draggable":"false"}'>
			<div class="panel-heading">
				<h2><? echo language('pages',$lang);?></h2>
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
							<th><? echo language('title page',$lang);?></th>
							<th><? echo language('page',$lang);?></th>
							<th><? echo language('shown',$lang);?></th>
							<th><? echo language('edit',$lang);?></th>
							<th><? echo language('delete',$lang);?></th>
						</tr>
						</thead><tbody>
	<?
	$pages = mysql_fetch_array($sql_pages);
	$k=1;
	do
	{
		echo '<tr class="odd gradeX">
							<td>'.$k.'</td>
							<td>'.lang($pages[title_lang],$lang).'</td>
							<td>'.$pages[page].'</td>
							<td>';
							if ($pages[shown]=='y'){ echo language('yes',$lang);}
							else{echo language('no',$lang);}
							echo'</td>
							<td class="center"><a href="#" onclick=content("edit_page/'.$pages[page].'")>'.language('edit',$lang).'</a></td>
							<td class="center"><a href="#" onclick=deletes("pages","'.$pages[id].'","pages")>'.language('delete',$lang).'</a></td>
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