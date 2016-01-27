<content>

<div id="loading" style="text-align:center;display:block;margin:30px;"><img src="<? echo  $admin_page;?>assets/img/load.gif"></div>
    <script>
	$.post(admin_page+"inbox_content.php", {s:''},function(data){
	$("content").html(data);
	});
	</script>

</content>
