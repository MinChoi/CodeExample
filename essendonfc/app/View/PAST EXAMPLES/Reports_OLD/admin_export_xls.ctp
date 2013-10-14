<?
	App::import('Helper','Excel');
	$excel = new ExcelHelper();
	function processRow($row,$result_fields){
		$newRow = array();
		$newOrderRow = array();
		foreach($row as $key=>$irow){
			if(is_array($irow)){
				foreach($irow as $ikey=>$inrow){
					$newRow[$key.'.'.$ikey] = $inrow;
				}
			}else{
				$newRow[$key] = $irow;
			}
		}
		foreach($result_fields as $kfield){
			$newOrderRow[$kfield] = trim($newRow[$kfield])==''?'-':$newRow[$kfield];
		}
		return $newOrderRow;
	}
	$rows = array();
	foreach($result as $key=>$row){
		$rows[$key] = processRow(&$row,&$result_fields);
	}

    $excel->generate($rows,$report['Report']['name']);

	exit();
?>