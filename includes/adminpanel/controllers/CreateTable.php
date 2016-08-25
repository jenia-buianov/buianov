<?php

class CreateTable extends ADMIN_CONFIGURATION{
	
	private $Text;
		
	public function __construct()
	{
		if(!empty($_POST['values'])) $this->Post();
		elseif(empty($_POST['now'])) $this->ShowForm();
		else $this->AddRows(htmlspecialchars($_POST['count'],ENT_QUOTES),htmlspecialchars($_POST['now'],ENT_QUOTES));		
	}
	
	private function AddRows($count,$now)
	{
		for($k=$now;$k<$count;$k++)
		{
			echo '<div class="form-group"> 
			<div class="col-lg-2">
            	<input type="text" class="form-control" id="assocName'.$k.'" placeholder="'.new ADMIN_TRANSLATION(LANG,'AssocRowName',1,0).' '.($k+1).'">
            </div>
			<div class="col-lg-3">
            	<input type="text" class="form-control" id="rowName'.$k.'" placeholder="'.new ADMIN_TRANSLATION(LANG,'RowName',1,0).' '.($k+1).'">
            </div>
			<div class="col-lg-2">
            	<select id="rowType'.$k.'" class="form-control" placeholder="'.new ADMIN_TRANSLATION(LANG,'RowType',1,0).'">
				<option value="">'.new ADMIN_TRANSLATION(LANG,'RowType',1,0).'</option>
				<option value="int">'.new ADMIN_TRANSLATION(LANG,'int',1,0).'</option>
				<option value="float">'.new ADMIN_TRANSLATION(LANG,'float',1,0).'</option>
				<option value="varchar">'.new ADMIN_TRANSLATION(LANG,'varchar',1,0).'</option>
				<option value="text">'.new ADMIN_TRANSLATION(LANG,'text',1,0).'</option>
				<option value="date">'.new ADMIN_TRANSLATION(LANG,'date',1,0).'</option>
				</select>
            </div>
			<div class="col-lg-2">
            	<input type="text" class="form-control" id="rowLength'.$k.'" placeholder="'.new ADMIN_TRANSLATION(LANG,'rowLength',1,0).'">
            </div>
			<div class="col-lg-3">
            	<input type="checkbox" id="rowPrtimary'.$k.'"> '.new ADMIN_TRANSLATION(LANG,'primary',1,0).'<br>
				<input type="checkbox" id="rowUniq'.$k.'"> '.new ADMIN_TRANSLATION(LANG,'unique',1,0).'
            </div>
		</div>';
		}
	}
	
	private function ShowForm()
	{
		if(defined('CreateTable')) $id = "CreateTableForm2";
		else {
			$id = "CreateTableForm";
			define('CreateTable',$id);
		}
		echo '<form action="'.parent::$CONFIG['adminURL'].LANG.'/'.MODULE.'" class="form-horizontal"  method="post" id="'.$id.'" onsubmit="return CreateTable('."'".$id."'".')">
		<div class="form-group">              <label class="col-lg-3 control-label">'.new ADMIN_TRANSLATION(LANG,'TableName',1,0).'</label>
                                                  <div class="col-lg-6">
												  <div class="input-group">
													  <div class="input-group-addon">'.DB_PREFIX.'</div>
													   <input type="text" class="form-control" id="tableName" placeholder="'.new ADMIN_TRANSLATION(LANG,'TableName',1,0).'">
												 </div>
                                                     
                                                  </div>
												  <div class="col-lg-3">
                                                      <input type="text" class="form-control" onchange="ChangeCountRows('."'".$id."'".')" id="countRows" placeholder="'.new ADMIN_TRANSLATION(LANG,'CountRowsTable',1,0).'" value="5">
                                                  </div>
												  </div>';
		$this->AddRows(5,0);
		
		echo'
		<div id="here">
		</div>
		<input type="hidden" id="idFormInput" value="moduleNameLang,moduleDirectory,StartFile">
		<input type="hidden" id="FormTitle" value="'.new ADMIN_TRANSLATION(LANG,ADMIN_CONFIGURATION::$PAGE['moduleNameLang'],1,0).'">
		<input type="hidden" id="FormResultStatus" value="'.new ADMIN_TRANSLATION(LANG,'FormError',1,0).','.new ADMIN_TRANSLATION(LANG,'FormEmpty',1,0).','.new ADMIN_TRANSLATION(LANG,'FormSuccessAdded',1,0).'">
		<div style="text-align:center"><button type="submit" class="btn btn-send">'.new ADMIN_TRANSLATION(LANG,'Add',1,0).'</button></div>
		</form>
		<script>'."
		countRows = 5;
		</script>
		";
	}
	private function Post()
	{
		$table = strtolower(htmlspecialchars($_POST['values'][0],ENT_QUOTES));
		$query = "CREATE TABLE `".DB_PREFIX.$table."` (";
		$arrayWhat = array();
		$arrayValues = array();
		for($k=2;$k<count($_POST['values']);$k+=6)
		{
			$comment = htmlspecialchars($_POST['values'][$k],ENT_QUOTES);
			$name = htmlspecialchars($_POST['values'][$k+1],ENT_QUOTES);
			$type = htmlspecialchars($_POST['values'][$k+2],ENT_QUOTES);
			(int) $length = htmlspecialchars($_POST['values'][$k+3],ENT_QUOTES);	
			$primary = htmlspecialchars($_POST['values'][$k+4],ENT_QUOTES);	
			$uniq = htmlspecialchars($_POST['values'][$k+5],ENT_QUOTES);
			array_push($arrayWhat,'`table`,`name`,`title`,`timeSeconds`,`isEnabled`');
			array_push($arrayValues,"'{$table}','{$name}','{$comment}','".ADMIN_CONFIGURATION::$CONFIG['timeSeconds']."','1'");
			
			$query.=" `{$name}` ";
			if ($type!=='text' and $type!=='date') $query.=strtoupper($type)."({$length}) ";else $query.=strtoupper($type).' ';
			if($primary=='true')
			{
				$query.=" AUTO_INCREMENT PRIMARY KEY COMMENT '{$comment}', ";
			}
			if ($primary=='false' and $uniq=='true')
			{
				$query.="COMMENT '{$comment}', UNIQUE ({$name}), ";
			}
			if ($primary=='false' and $uniq=='false') $query.=" COMMENT '{$comment}',";
		}
		$insert = DATABASE::query(mb_substr($query,0,mb_strlen($query,"UTF-8")-1,"UTF-8").')');
		if (is_bool($insert)&&$insert==true) echo '0'; else echo $insert;
		$insert2 = DATABASE::insert('admin_tabletitles',$arrayWhat,$arrayValues,1);
		if ((is_bool($insert2)&&$insert2==true) or is_array($insert)) echo '';
		
	}
	
	
}

new CreateTable();
?>