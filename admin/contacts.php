<content>
<div class="row">
    <div class="col-md-12">
        <div class="panel panel-info" style="border-color:#FF8346;">
            <div class="panel-heading" style="background-color:#FF8346;border-color:#FF8346;color:#fff;"><h2><? echo language('write admin',$lang); ?></h2></div>
            <div class="panel-body">
                <select class="form-control" onchange=subject() onclick=subject() id="subject">
				<option value=""><? echo language('subject',$lang); ?></option>
				<option value="error"><? echo language('find error',$lang); ?></option>
				<option value="order"><? echo language('make order',$lang); ?></option>
				<option value="other"><? echo language('other subject',$lang); ?></option>
				</select>
				<div id="res" style="margin-top:5px"></div>
				<div style="margin-top:20px;margin-bottom:30px;">
					<font style="display:inline-block;width:30%;"><b><? echo language('message from',$lang); ?></b></font>
					<select id="from" onchange=from_message() onclick=from_message() style="display:inline-block;font-size:13px;color:#666;border:none;">
						<option value="0"><? echo $buianov_name.' '.$buianov_lastname; ?> (<? echo language('from company',$lang); ?>)</option>
						<option value="1"><? echo $admin_user[name]; ?> (<? echo language('by myself',$lang); ?>)</option>
					</select>
					<font id="contacts" style="display:inline-block;"></font>
				</div>
				<?
				$lst = '<script>
	$(".composer").summernote({
		height: 350
	});
</script>';
				?>
				<div class="composer" id="text"><? echo language('message',$lang); ?></div>
				<div style="text-align:center;margin-top:20px;"><button class="btn-success btn" onclick=send_message()><? echo language('send message',$lang); ?></button></div>
			</div>
        </div>
    </div>
</div>
</content>
<div id="loading" style="text-align:center;display:none;margin:30px;"><img src="<? echo  $admin_page;?>assets/img/load.gif"></div>
