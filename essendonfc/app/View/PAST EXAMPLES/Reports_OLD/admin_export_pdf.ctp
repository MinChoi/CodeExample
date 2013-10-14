<?
	App::import('Helper','Pdf');
	$pdf = new PdfHelper();
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
	
	$css = 'h1{color:#99A5AF}table{border-top: 1px solid #AEAFB1;border-right: 1px solid #AEAFB1}td{border-bottom: 1px solid #AEAFB1;border-left: 1px solid #AEAFB1} th{ background-color: #F3F4F6;border-bottom: 1px solid #AEAFB1;border-left: 1px solid #AEAFB1}';

	$pdf->setStyleSheet($css);

	$html = '<h1>'.ucfirst($report['Report']['name']).'</h1><table width="100%" cellspacing="0"  cellpadding="4">';

	$html .= '<tr>';
	foreach($result_fields as $kfield){
		$fname = str_replace(array('MemberDetail','postcode','.','_'),array('Member','pincode',' ',' '),$kfield);
		
		$html .='<th>'.str_replace(' ','&nbsp;',ucwords($fname)).'</th>';
	}
	$html .='</tr>';
	
	foreach($rows as $key=>$items){
		$html .='<tr>';
		foreach($items as $vfield){
			if(is_numeric($vfield)){
				$html .='<td style="text-align:right;">'.$vfield.'</div></td>';
			}else{
				$html .='<td>'.$vfield.'</td>';
			}
		}
		$html .='</tr>';
	}
	$html .='</table>';

	$pdf->render($html);
?>