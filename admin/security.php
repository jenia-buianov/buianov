<content>
<div class="row">
    <div class="col-md-12">
        <div class="panel panel-info">
            <div class="panel-heading"><h2><? echo language('security',$lang); ?></h2></div>
            <div class="panel-body">
                <select class="form-control" id="send_" style="width:100%;margin-bottom:20px;">
				<option value="y"><? echo language('ok_send_code',$lang); ?></option>
				<option value="n" <? if ($admin_user[send_code]=='n') echo ' selected';?>><? echo language('no_send_code',$lang); ?></option>
				</select>
			<input id="user" type="hidden" value="<? echo $admin_user[user];?>">
			<input id="adms" type="hidden" value="n">
			<input id="elements" type="hidden" value="user,send_">
			<input id="add_to_lng" type="hidden" value="">
			<input id="rows" type="hidden" value="user,send_code">
			<input id="classes" type="hidden" value="">
			<input id="icon" type="hidden" value="fa-lock">
			<input type="hidden" value="<? echo language('snd_code',$lang).','.language('snd_code',$lang).','.language('not found',$lang).','.language('snd_code',$lang).','.language('admin user edited',$lang).','.language('error edited',$lang); ?>" id="tts">
				
            <div style="text-align:center;margin-top:20px;"><button class="btn-success btn" onclick=main('admin_users','edit')><? echo language('edit',$lang); ?></button></div>
			<div id="loading" style="text-align:center;display:none;margin:30px;"><img src="<? echo $admin_page;?>assets/img/load.gif"></div>
			<? if ($admin_user[group]!=='Admin'){ ?>
			<input type="hidden" value="<? echo language('change_pass',$lang).','.language('code was send',$lang).','.language('error send code',$lang); ?>" id="tts2">
			<div style="text-align:center;margin-top:50px;"><button class="btn-danger btn" onclick=security()><? echo language('change_pass',$lang); ?></button></div>
			<? } ?>
			</div>
        </div>
    </div>
</div>

</content>