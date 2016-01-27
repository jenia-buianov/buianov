<?
session_start();
include("bd.php");

?>
	<div class="row">
		<div class="col-md-3">
			<a class="btn btn-block btn-danger btn-compose" href="<? echo $admin_page.'inbox/compose/' ?>"><? echo language('compose',$lang) ?></a>

<div class="inbox-menu mt-lg">

	<div class="collapsible-menu" style="border-top: 0;">
		<span class="inbox-leftbar-category clearfix">
			<a href="javascript:;" data-toggle="collapse" data-target="#folders" class="category-heading"><? echo language('folders',$lang) ?></a>
			
		</span>
		<div class="collapse in" id="folders">
			<a href="<? echo $admin_page.'inbox/' ?>" class="inbox-menu-item active"><?echo language('inbox',$lang); ?> <?
			$sql_uid = mysql_query("SELECT uid FROM admin_code WHERE CODE='$_SESSION[s]'");
			$uid = mysql_fetch_array($sql_uid);
			
			$sql_first = mysql_query("SELECT * FROM admin_inbox_list WHERE uid='$uid[uid]' LIMIT 1");
			
			if (mysql_num_rows($sql_first)==0){ echo '<html><header><meta http-equiv="refresh" content="0;'.$admin_page.'inbox/add_inbox"></header></html>';exit;}
			$email_ = mysql_fetch_array($sql_first);
			
			$host_ = explode(" ",$email_[host]);
			$port_ = explode(" ",$email_[port]);
			$imapPath = '{'.$host_[1].':'.$port_[1].'/imap/ssl}INBOX';
$username = $email_[email];
$password = $email_[password];

// try to connect 
$inbox = imap_open($imapPath,$username,$password) or die('Cannot connect to Gmail: ' . imap_last_error());
 
 /* ALL - return all messages matching the rest of the criteria
    ANSWERED - match messages with the \\ANSWERED flag set
    BCC "string" - match messages with "string" in the Bcc: field
    BEFORE "date" - match messages with Date: before "date"
    BODY "string" - match messages with "string" in the body of the message
    CC "string" - match messages with "string" in the Cc: field
    DELETED - match deleted messages
    FLAGGED - match messages with the \\FLAGGED (sometimes referred to as Important or Urgent) flag set
    FROM "string" - match messages with "string" in the From: field
    KEYWORD "string" - match messages with "string" as a keyword
    NEW - match new messages
    OLD - match old messages
    ON "date" - match messages with Date: matching "date"
    RECENT - match messages with the \\RECENT flag set
    SEEN - match messages that have been read (the \\SEEN flag is set)
    SINCE "date" - match messages with Date: after "date"
    SUBJECT "string" - match messages with "string" in the Subject:
    TEXT "string" - match messages with text "string"
    TO "string" - match messages with "string" in the To:
    UNANSWERED - match messages that have not been answered
    UNDELETED - match messages that are not deleted
    UNFLAGGED - match messages that are not flagged
    UNKEYWORD "string" - match messages that do not have the keyword "string"
    UNSEEN - match messages which have not been read yet*/
 
// search and get unseen emails, function will return email ids
$emails = imap_search($inbox,'ALL');
 
$output = '';
 
foreach($emails as $mail) {
    
    $headerInfo = imap_headerinfo($inbox,$mail);
    
    $emailStructure = imap_fetchstructure($inbox,$mail);
    
    if(!isset($emailStructure->parts)) {
         $text = imap_body($inbox, $mail, FT_PEEK); 
    } else {
        //    
    }
    $subj = decode_imap_text($headerInfo->subject);
	$from = decode_imap_text($headerInfo->fromaddress);
	$date_ = decode_imap_text($headerInfo->date);
	
	$sql_mess = mysql_query("SELECT id from admin_inbox WHERE email_id='$email_[id]' and folder='' and datetime='$date_' and `from`='$from' and subject='$subj'");
	if (mysql_num_rows($sql_mess)==0)
		$ins = mysql_query("INSERT INTO admin_inbox(email_id,folder,subject,message,`from`,datetime,viewed)VALUES('$email_[id]','','$subj','$text','$from','$date_','n')");
    
}
imap_expunge($inbox);
imap_close($inbox);

			
			$sql_inbox = mysql_query("SELECT id FROM admin_inbox WHERE viewed='n' and folder='' and email_id='$email_[id]'");
			if (mysql_num_rows($sql_inbox)>0)
			{
				echo '<span class="badge badge-primary">'.mysql_num_rows($sql_inbox).'</span>';
			}
			
			?></a>
			<?
			$sql_folders = mysql_query("SELECT folder_title FROM admin_inbox_folders WHERE email_id='$email_[id]'");
			if (mysql_num_rows($sql_folders)>0)
			{
				$folder = mysql_fetch_array($sql_folders);
				do
				{
					echo '<a href="#" class="inbox-menu-item">'.$folder[folder_title].' ';
					
					$sql_folder = mysql_query("SELECT id FROM admin_inbox WHERE folder='$folder[id]' and viewed='n'");
					if (mysql_num_rows($sql_folder)>0)
					{
						echo '<span class="badge badge-warning">'.mysql_num_rows($sql_folder).'</span>';
					}
					echo'</a>';
				}
				while($folder = mysql_fetch_array($sql_folders));
			}
			

			?>
			
		</div>
	</div>

</div>

	<a class="btn btn-block btn-danger btn-compose" href="<? echo $admin_page.'inbox/add_inbox/' ?>" style="margin-top:15px;"><? echo language('add inbox',$lang) ?></a>
	<?
	$sql_inbox_list = mysql_query("SELECT * FROM admin_inbox_list WHERE uid='$uid[uid]'");
	if (mysql_num_rows($sql_inbox_list)>1)
	{
		?>
		<select id="inb" onchange=realod_mail() style="margin-top:5px;background:transparent;border:none;width:100%">
		<?
		$inbox_list = mysql_fetch_array($sql_inbox_list);
		do
		{
			if ($inbox_list[email]==$email_[email]) {echo '<option value="'.$email_[email].'" selected>'.$inbox_list[email].'</option>';}
			else{echo '<option value="'.$email_[email].'">'.$inbox_list[email].'</option>';}
		}
		while($inbox_list = mysql_fetch_array($sql_inbox_list));
		echo '</select>';
	}
	?>
		</div>
		<div class="col-md-9">
            <div class="input-group mb-lg">
				<input type="text" class="form-control" placeholder="<? echo language('search email',$lang);?>">
				<span class="input-group-btn">
					<a class="btn btn-primary" href="#"><i class="fa fa-fw fa-search"></i></a>
				</span>
			</div>
			<div class="panel panel-inbox">
				<div class="panel-body">
					<div class="inbox-mail-heading">
						<div class="clearfix">
							<div class="pull-left">
								<div class="btn-group">
						            <a href="#" class="btn btn-default dropdown-toggle" data-toggle="dropdown"><div class="checkbox-inline icheck"><div class="icheckbox_minimal-blue" style="position: relative;"><input type="checkbox" value="" style="position: absolute; opacity: 0;"><ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; border: 0px; opacity: 0; background: rgb(255, 255, 255);"></ins></div></div><i class="caret"></i></a>
						            <ul class="dropdown-menu">
						                <li><a href="#"><? echo language('select all',$lang);?></a></li>
						                <li><a href="#"><? echo language('unselect all',$lang);?></a></li>
						            </ul>
						        </div>
						        <div class="btn-group">
		                            <a href="#" class="btn btn-default"><i class="fa fa-fw fa-archive"></i></a>
		                            <a href="#" class="btn btn-default"><i class="fa fa-fw fa-folder"></i></a>
		                            <a href="#" class="btn btn-default"><i class="fa fa-fw fa-trash-o"></i></a>
		                        </div>
						    </div>
						    <div class="pull-right hidden-xs">
							<? $sql_inbox = mysql_query("SELECT * FROM `admin_inbox` WHERE `email_id`='$email_[id]' and folder='0' ORDER BY id DESC"); ?>
						    	<span class="mr10 pull-left" style="margin-top: 9px;"><strong>1 - <? if (mysql_num_rows($sql_inbox)>20)echo'20</strong> of <strong>'.mysql_num_rows($sql_inbox);else{echo mysql_num_rows($sql_inbox);}  ?></strong></span>
						    	<div class="btn-group pull-right">
		                            <a href="#" class="btn btn-default"><i class="fa fa-fw fa-angle-left"></i></a>
		                            <a href="#" class="btn btn-default"><i class="fa fa-fw fa-angle-right"></i></a>
		                        </div>
						    </div>
						</div>
					</div>
					<?
					
	
if (mysql_num_rows($sql_inbox)>0)
{
	echo '<table class="table table-striped table-hover table-inbox mb0 table-vam">
						<tbody>';
	$inbox = mysql_fetch_array($sql_inbox);
	do
	{
		$in= explode("<",$inbox[from]);
		$inbox[from] = $in[0];
		$dt = explode(", ",$inbox[datetime]);
		
		$date_ = explode(" ",$dt[count($dt)-1]);
		if ($date_[1]=='Jan') {$mn = '01';}
		if ($date_[1]=='Feb') {$mn = '02';}
		if ($date_[1]=='Mar') {$mn = '03';}
		if ($date_[1]=='May') {$mn = '05';}
		if ($date_[1]=='Apr') {$mn = '04';}
		if ($date_[1]=='Jun') {$mn = '06';}
		if ($date_[1]=='Jul') {$mn = '07';}
		if ($date_[1]=='Aug') {$mn = '08';}
		if ($date_[1]=='Oct') {$mn = '09';}
		if ($date_[1]=='Nov') {$mn = '10';}
		if ($date_[1]=='Dec') {$mn = '11';}
		
		if ($date_[0]<10) $date_[0] = '0'.$date_[0];
		$inbox[datetime] = time_elapsed_string($date_[2].'-'.$mn.'-'.$date_[0].' '.$date_[3],$lang);
		//$inbox[datetime] = time_elapsed_string($date_[2].'-'.$mn.'-'.$date_[1].' '.$date[3],$lang);
		echo '<tr';if($inbox[viewed]=='n') echo ' class="unread"'; echo' onclick=location.reload("'.$admin_page.'inbox/read/'.$inbox[id].'")>
								<td class="inbox-msg-check" width="5%"><div class="checkbox-inline icheck"><div class="icheckbox_minimal-blue" style="position: relative;"><input type="checkbox" value="" style="position: absolute; opacity: 0;"><ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; border: 0px; opacity: 0; background: rgb(255, 255, 255);"></ins></div></div> </td>
								<td class="inbox-msg-from hidden-xs hidden-sm" width="20%"><div>'.$inbox[from].'</div></td>
								<td class="inbox-msg-snip">'.$inbox[subject].'</td>
								<td class="inbox-msg-attach"></td>
								<td class="inbox-msg-time" width="12%">'.$inbox[datetime].'</td>
							</tr>';
	}
	while($inbox = mysql_fetch_array($sql_inbox));
	echo '</tbody></table>';
	//time_elapsed_string($inbox[datetime],$lang)
}	
					?>
					
						</tbody>
					</table>
					<div class="inbox-mail-footer">
						<div class="clearfix">
						    <div class="pull-right">
						    	<span class="mr10 pull-left" style="margin-top: 9px;"><strong>1 - <? if (mysql_num_rows($sql_inbox)>20)echo'20</strong> of <strong>'.mysql_num_rows($sql_inbox);else{echo mysql_num_rows($sql_inbox);}  ?></strong></span>
						    	<div class="btn-group pull-right">
		                            <a href="#" class="btn btn-default"><i class="fa fa-fw fa-angle-left"></i></a>
		                            <a href="#" class="btn btn-default"><i class="fa fa-fw fa-angle-right"></i></a>
		                        </div>
						    </div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>