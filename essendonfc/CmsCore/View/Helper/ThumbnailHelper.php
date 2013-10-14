<?
class ThumbnailHelper extends AppHelper {
    function render($image, $params) {
        //Set defaults
        $path='';
        $width=150;
        $height=225;
        $quality=75;
        $extension='jpg';
		$zoom_crop = false;

        //Extract Parameters
        if (isset($params['path'])) {
            $path = str_replace(array('\/', '//'),'/', $params['path'].DS);
        }
        if (isset($params['width'])) {
            $width = $params['width'];
        }
        if (isset($params['height'])) {
            $height = $params['height'];
        }
        if (isset($params['quality'])) {
            $quality = $params['quality'];
        }
        if (isset($params['extension'])) {
            $extension = $params['extension'];
        }
		if (isset($params['zoom_crop'])) {
            $zoom_crop = $params['zoom_crop'];
        }
        //import phpThumb class
        app::import('Vendor', 'phpthumb', array('file' => 'phpThumb'.DS.'phpthumb.class.php'));
        $thumbNail = new phpthumb;
        $thumbNail->src = $path.$image;//WWW_ROOT.'img'.DS.
        $thumbNail->w = $width;
        $thumbNail->h = $height;
        $thumbNail->q = $quality;
		$thumbNail->zc = $zoom_crop;
        $thumbNail->config_imagemagick_path = 'convert';///usr/bin/convert
        $thumbNail->config_prefer_imagemagick = true;
        $thumbNail->config_output_format = $extension;
        $thumbNail->config_error_die_on_error = true;
        $thumbNail->config_document_root = '';
        $thumbNail->config_temp_directory = APP . 'tmp';
        $thumbNail->config_cache_directory = WWW_ROOT.'img'.DS.'thumbs'.DS;
        $thumbNail->config_cache_disable_warning = true;
        $cacheFilename = $cacheFilename = $width.'x'.$height.'_'.$image; //$image;
        $thumbNail->cache_filename = $thumbNail->config_cache_directory.$cacheFilename;
        if (!is_file($thumbNail->cache_filename)) {
            if ($thumbNail->GenerateThumbnail()) {
                $thumbNail->RenderToFile($thumbNail->cache_filename);
            }
        }
        if (is_file($thumbNail->cache_filename)) {
            return $cacheFilename;
        }
    }
	
	function validate($path) {
		if (file_exists(realpath($path))) {
			if (strlen(trim(realpath($path)))>0) {
				return true;
			} else {
				return false;
			}
		} else {
			return false;
		}
	}
}
?>