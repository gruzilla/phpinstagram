<?php
/**
 * This example uses the instagram api for displaying your and other users feed.
 * you can pass the user-primary-key via the GET-parameter "user".
 *
 */
header('Content-Type: text/html; charset=utf-8');
include_once 'bootstrap.php';

$username = 'YOUR_USERNAME';
$password = 'YOUR_PASSWORD';
$deviceId = 'YOUR_DEVICES_ID';	// you can provide any device id you want eg. mylaptop
								// or iphone or whatever, but keep in mind, that your
								// iphone sends a specific key that is unique for your
								// iphone!
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" 
   "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html>
<head>
	<meta http-equiv="content-type" content="text/html; charset=utf-8" />
	<title>Instagram PHP-Library</title>
	<style type="text/css">
		body {
			font-family: Tahoma, Arial, sans-serif;
		}
		a {
			color: grey;
		}
		a:hover {
			color: light-grey;
		}
		div {
			margin-bottom: 50px;
		}
	</style><?php
		if (isset($_GET['customcss'])) {
			$url = parse_url($_GET['customcss']);
			$url = 'http://'.$url['host'].$url['path'].(!empty($url['query']) ? $url['query'] : '');
			echo '<link href="'.$url.'" rel="stylesheet" ref="stylesheet" />';
		}
	?>
</head>
<body>
<?php

/**
 * function for displaying an entry
 * @param Instagram_Feed_Entry $entry
 * @return string
 */
function printEntry(Instagram_Feed_Entry $entry) {
	$html = '
	<div>
	<p>
		<small><a href="index.php?user='.$entry->user->pk.'">'.$entry->user->username.'</a></small><br />
		'.(isset($entry->location) ?
			'<img src="img/location.png" style="height:15px" />'.
			(isset($entry->location->lng) ?
			'<a target="_blank" href="http://maps.google.at/?ie=UTF8&amp;ll='.$entry->location->lng.','.$entry->location->lat.'&amp;z=15">'
			: '').
				$entry->location->name.
			(isset($entry->location->lng) ?
				'</a>'
			: '').'<br />'
		: '').'
		<img src="'.$entry->image_versions[1]->url.'" />
	</p>';
	
	if (isset($entry->likers) && count($entry->likers) > 0) {
		$html .= '
	<p>';
		$lk = array();
		foreach ($entry->likers as $liker) {
			$lk[] = '<small><a href="index.php?user='.$liker->pk.'">'.$liker->username.'</a></small>';
		}
		$html .= join(', ', $lk).' likes it!
	</p>';
	}
	
	if (isset($entry->comments) && count($entry->comments) > 0) {
		$html .= '
	<p>';
		foreach ($entry->comments as $comment) {
			$html .= '<small><a href="index.php?user='.$comment->user->pk.'">'.$comment->user->username.'</a></small> '.
			htmlspecialchars($comment->text).'<br />';
		}
		$html .= '
	</p>';
	}
	$html .= '</div>';
	
	return $html;
}

/**
 * Do the API-calls now
 */
try {
	$inst = new Instagram();
	
	$inst->auth->login($username, $password, $deviceId);
	
	if (isset($_GET['user']) && is_numeric($_GET['user']) && !isset($_GET['hidebacklink'])) {
		echo '<p><a href="index.php">&lt;&lt; Back to my feed</a></p>';
		$feed = $inst->feed->user((int)$_GET['user']);
	} else {
		$feed = $inst->feed->timeline();
	}
	
	$inst->run();
	
	$response = $feed->getResponse()->getData();
	
	foreach ($response as $rentry) {
		echo printEntry($rentry);
	}
} catch (Instagram_Exception $ex) {
	echo "<pre>\n\n   ERROR: {$ex->getMessage()}\n\n".var_export($ex->getResponse(),1)."\n\n$ex\n\n</pre>";
}
?>
</body></html>