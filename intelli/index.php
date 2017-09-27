<?php
// session start
session_start();

/**
 * initialise autoload 
 * Pass debug=1 as parameter in URL to enable, and see useful error messages
 * Pass debug=0 as parameter to disable debugging
 * see init.php for implementation
 */

require_once('init.php');

// Route Object
$routeObj = new Route();
//Retrieving Route, sending scriptName and requestUri 
$route = $routeObj->appRoute($_SERVER['SCRIPT_NAME'],$_SERVER['REQUEST_URI']);


switch($route)
{
	// Route for index page
	case '/': 
		// Some SEO stuff	
		$seo = array(
			'title' => 'Intelli',
			'keywords' => 'Intelli, twitter hashtag fetch, sentiment analysis, CSV, twitter app',
			'description' => 'This App allows you to map and merge data from different sources',
			'site_name' => 'https://letsconnect.co/data/'
			);

		$view = "index.php";
			//RenderView Object
		$renderViewObj = new RenderView();
			// Rendering index.php and passing SEO array
		$renderViewObj->render("$view", $seo);
		break;

	case '/sqlLogin':
			if(isset($_POST['username']))
				$username = $_POST['username']; // fetch username if posted
			if(isset($_POST['password']))
				$password = $_POST['password']; // fetch password if posted
			if(isset($_POST['portAndIp']))
				$portAndIp = $_POST['portAndIp']; // fetch portAndIp if posted

			if(isset($_POST['query']))
				$query = $_POST['query']; // fetch Query if posted
			else
				$query = '';
			if(isset($_POST['db']))
				$db = $_POST['db']; // fetch DB if posted
			else
				$db = '';					

			
			// Object that will interact with DB
			$sqlObject = new sqlLogin();
			// Fetch Data
			if($db=='')
				$result = $sqlObject->displayData($username,$password,$portAndIp,$query,$db);
			else
				$result = $sqlObject->queryToArray($username,$password,$portAndIp,$query,$db);
			print_r($result);
			break;

	// Route for api call	
	case '/fetch':
			if(isset($_POST['hashtag']))
				$hashtag = $_POST['hashtag']; // fetch hashtag if posted
			else
				$hashtag = '';				

			if(isset($_POST['mode'])) 
			{
				// Mode = 1; new hashtag is searched unset maxId stored from previous call.
				if($_POST['mode'] == 1) 
					session_unset($_SESSION['maxId']);
			}
			// Object that will interact with Twitter Class
			$twitterObject = new Twitter($settings);
			// Fetch Tweets
			$tweets = $twitterObject->getMyTweets($hashtag);
			print_r($tweets);
			break;


	// If no route is matched
	default:
		require '404.html';

}

