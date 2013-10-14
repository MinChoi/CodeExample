<?
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
	
	 echo "\"".$report['Report']['name']."\"\n\n";
	
	
	// Loop through the data array
    foreach ($result_fields as &$result_field)
    {
		$result_field = str_replace(array('MemberDetail','postcode','.','_'),array('Member','pincode',' ',' '),$result_field);
        $result_field = "\"".ucwords($result_field)."\"";
       
    } 
	 echo implode(",",$result_fields)."\n";
	// Loop through the data array
    foreach ($rows as $row)
    {
        // Loop through every value in a row
        foreach ($row as &$value)
        {
            // Apply opening and closing text delimiters to every value
            $value = "\"".$value."\"";
        }
        // Echo all values in a row comma separated
        echo implode(",",$row)."\n";
    } 
	exit;
?>
