<?
	foreach($categories as $val=>$name){
		if($sel_cat == $val){
			echo '<option value="'.$val.'" selected="selected">'.$name.'</option>';
		}else{
			echo '<option value="'.$val.'">'.$name.'</option>';
		}
	}
?>