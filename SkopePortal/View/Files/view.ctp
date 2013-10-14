<?php
$finfo = finfo_open(FILEINFO_MIME_TYPE);
$type = finfo_file($finfo, $file['File']['file_path']);
header('Content-Disposition: attachment; filename='.$file['File']['file']);
header('Pragma: no-cache');
header('Expires: 0');
header('Content-Type: ' . $type);
readfile($file['File']['file_path']);
exit;
?>
