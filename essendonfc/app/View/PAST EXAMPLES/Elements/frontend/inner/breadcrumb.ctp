<?
$bc = "";

$fixed_array = array("/News", "/Event");

if( ($page['Page']['page_id'] == 1) || (! isset($page['ParentPage']['menu_name'])))
{
	$bc = $page['Page']['menu_name'];
}
else
{

	$bc =  $page['ParentPage']['menu_name'] . " > " . $page['Page']['menu_name'];
}
// 
echo $bc;

//echo urlencode($page['ParentPage']['menu_name']);
//debug($page);
?>