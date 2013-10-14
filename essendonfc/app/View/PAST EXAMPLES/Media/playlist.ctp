<?
/*
$playlistData = file_get_contents(APP.'/webroot/videos/playlist.json');
$playlists = json_decode($playlistData);
if(isset($playlistId) && $playlistId != ''){
    foreach ($playlists as $key => $value) {
        $playlist = $value->{'playlist'.$playlistId};
        if(!empty($playlist)) break;
    }
}else{
    $playlist = $playlists;
}
header('Content-Type: application/json; charset=utf-8');
echo json_encode($playlist);
*/
$json_pl = '';
if(isset($playlist[0])){
	$json_pl_arr = array();
	foreach($playlist as $pl){
		
		if(strlen(trim($pl['Media']['preview_file']))==0 || trim($pl['Media']['preview_file'])=='Click here and select a file double clicking on it'){
			$preview_img = 'http://'.$_SERVER['HTTP_HOST'].'/img/nopreview.jpg'; 
		}else{
			$preview_img = 'http://'.$_SERVER['HTTP_HOST'].'/attachments/photos/small/'.$pl['Media']['preview_file']; 
		}
		$json_pl_arr[] ='{
				"movieUploadedTime": "'.date('j F Y',strtotime($pl['Media']['created'])).'",
                "movieTitle": "'.$text->truncate($pl['Media']['title'],40).'",
                "movieLength": "'.$pl['Media']['duration'].'",
                "movieFileUrl": "http://'.$_SERVER['HTTP_HOST'].'/uploads/'.$pl['Media']['video_file'].'",
                "movieThumbnailUrl": "'.$preview_img.'"
			}';
	}
	$json_pl .='['.implode(',',$json_pl_arr).']';
	header('Content-Type: application/json; charset=utf-8');
	echo $json_pl;//json_encode($playlist);
}else{
	header('Content-Type: application/json; charset=utf-8');
	echo json_encode('[]');
}







?>
