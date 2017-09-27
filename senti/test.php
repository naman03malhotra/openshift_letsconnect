<?php
ini_set('display_startup_errors', 1);
ini_set('display_errors', 1);
error_reporting(-1);

 echo $_SERVER['SCRIPT_NAME'];
 echo '<br>';
 echo $_SERVER['REQUEST_URI'];
 echo '<br>';

$array_slice=array_slice(explode('/', $_SERVER['SCRIPT_NAME']), 0, -1);
print_r($array_slice);
echo '<br>';
       echo $basepath = implode('/', $array_slice) . '/';
       echo '<br>';
       echo $uri = substr($_SERVER['REQUEST_URI'], strlen($basepath));
       echo '<br>';
		if (strstr($uri, '?')) $uri = substr($uri, 0, strpos($uri, '?'));
		echo 'ifURi'.$uri;
		echo '<br>';
		$uri = '/' . trim($uri, '/');
		echo $uri;