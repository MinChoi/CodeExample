<?
	//pr($result);
	//pr($result_fields);
	
	/* foreach($result_fields as &$val){
		$val = trim($val);
	} */
	
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

	$columns = array();
	foreach($rows as $key=>$row){
		foreach($row as $ikey=>$irow){
			$columns[$ikey][$key] = $irow;
		}
	}
	
	$column_len = count($columns);
?>

<style type="text/css">
<!--
div.report_top{
    background-image: url("/themes/default/images/reports/top_bg.png");
    height: 44px;
    margin-top: -1px;
    position: fixed;
    width: 100%;
    z-index: 5000;
}
div.report_top div.btn_holders{
    float: right;
    padding-bottom: 10px;
    padding-top: 10px;
    width: 330px;
}
div.report_top div.btn_holders a{
    margin-right: 5px;
    outline: medium none;
    text-decoration: none;
}
div.report_top div.btn_holders a img{
	border:0px;
}

div.report_top div.btn_holders a img{
	border:0px;
}
div.report_top span{
    color: #FFFFFF;
    display: block;
    float: left;
    font-size: 14px;
    font-weight: normal;
    margin-left: 17px;
    margin-top: 11px;
    width: 550px;
}

div.report_container{
	
    border: 0px solid #413B3B;
    display: inline-block;
    margin-left: 15px;
    margin-top: 60px;
    overflow: auto;
    width:<?=($column_len*200)+100;?>px;
}
div.report_container div.column_container{
	width:<?=($column_len*200)+2;?>px;
}
div.report_container div.column{
	width:200px;
	float:left;
}
div.report_container div.hoverclass{
	background-color:#FEFFBF;
}

div.report_container div.column_last{
	border-right: 1px solid #AEAFB1;
}
div.report_container h2.column_head{
    background-color: #F3F4F6;
    background-image: url("/themes/default/images/reports/drag.png");
    background-position: 177px center;
    background-repeat: no-repeat;
    border-left: 1px solid #AEAFB1;
	border-top: 1px solid #AEAFB1;
	border-right: 1px solid #AEAFB1;
    display: block;
    height: 27px;
    padding-left: 10px;
    padding-top: 5px;
    width: 189px;
	margin:0px;
	font-size: 11px;
	cursor:move;
	position: absolute;
}
div.report_container span.row{
    border-left: 1px solid #AEAFB1;
	border-right: 1px solid #AEAFB1;
    border-top: 1px solid #AEAFB1;
    display: table-cell;
    float: left;
    height: 27px;
    overflow: auto;
    padding-left: 5px;
    vertical-align: middle;
    width: 194px;
	display:block;
	overflow:hidden;
}
div.report_container span.row_spacer{
    border-left: 1px solid #AEAFB1;
	border-right: 1px solid #AEAFB1;
    border-top: 1px solid #AEAFB1;
    display: table-cell;
    float: left;
    height: 32px;
    overflow: auto;
    padding-left: 5px;
    vertical-align: middle;
    width: 194px;
	display:block;
}
div.report_container span.row_last{
	border-bottom: 1px solid #AEAFB1;
	display:block;
}
//-->
</style>

<div class="report_top">
	<span><?=ucfirst($report['Report']['name']);?></span>
	<div class="btn_holders">
		<a href="/admin/reports/export_xls/<?=$report_id;?>" target="_blank"><img src="/themes/default/images/reports/export_xls.png" alt="Export XLS" ></a>
		<a href="/admin/reports/export_pdf/<?=$report_id;?>" target="_blank"><img src="/themes/default/images/reports/export_pdf.png" alt="Export PDF" ></a>
		<a href="/admin/reports/export_report/<?=$report_id;?>.csv" target="_blank"><img src="/themes/default/images/reports/export_csv.png" alt="Export CSV" ></a>
		<!--<a href="#" onclick="javascript:window.opener='x';window.close();"><img src="/themes/default/images/reports/close.png" alt="Close" ></a>-->
	</div>
</div>

<div class="report_container">
	<div id="column_container_div" class="column_container">
		<?
			$col_cnt = 0;
			$columns_length = count($columns);
			foreach($columns as $key=>$items){
				$col_cnt++;
				if($col_cnt==$columns_length){
					echo '<div class="column">';// column_last
				}else{
					echo '<div class="column">';
				}

				echo '<h2  id="'.$key.'" class="column_head">'.ucwords(str_replace(array('.','_'),' ',$text->truncate($key,25))).'</h2><span class="row_spacer"></span>';
				for($i=0;$i<1;$i++){
					foreach($items as $key=>$item){
						if(isset($items[$key+1])){
							echo '<span class="row">'.$text->truncate($item,30).'</span>';
						}else{
							echo '<span class="row row_last">'.$text->truncate($item,30).'</span>';
						}
					}
				}
				echo '</div>';
			}
		?>
	</div>
</div>

<script type='text/javascript'>
<!--
function close_window() {
  if (confirm("Close Window?")) {
    close();
  }
}

function writeupdate () {
	var ele_array = $$('div#column_container_div h2.column_head');
	var id_array = new Array();
	for(var $i=0;$i<ele_array.length;$i++){
		id_array[id_array.length] =ele_array[$i].id;
	}
	new Ajax.Request('/admin/report_details/update_fields_order/<?=$report_detail_id;?>',
	{
		method:'post',
		parameters: { 
			'data[ReportDetail][fields]':id_array.join(',')
		},
		onSuccess: function(transport){
			var ivalue = transport.responseText || "no response text";	
			//if(ivalue!="no response text"){
				//alert('Updated Successfully');
			//}else{
				//alert('Something gone wrong');
			//}	
		},
		onFailure: function(){ alert('Something went wrong...') }
	});
}
//-->
</script>
<? //'url'=>'/admin/reports/'
	echo $ajax->sortable('column_container_div',array('scroll'=>'window','ghosting'=>false,'tag'=>'div','only'=>'column','onUpdate'=>'writeupdate','onChange'=>'writeupdate','constraint'=>'horizontal','handle'=>'h2','hoverclass'=>'hoverclass','overlap'=>'horizontal'));
?>