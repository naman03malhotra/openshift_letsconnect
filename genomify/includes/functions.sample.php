<?php
ob_start();

function filter($big)
{

	$var=filter_var($big, FILTER_SANITIZE_MAGIC_QUOTES);
	return $var;


}
 function en_de($action, $string) {
    $output = false;

    $encrypt_method = "AES-256-CBC";
    $secret_key = 'roxyboxy';
    $secret_iv = 'This is my secret iv';

    // hash
    $key = hash('sha256', $secret_key);
    
    // iv - encrypt method AES-256-CBC expects 16 bytes - else you will get a warning
    $iv = substr(hash('sha256', $secret_iv), 0, 16);

    if( $action == 'en' ) {
        $output = openssl_encrypt($string, $encrypt_method, $key, 0, $iv);
        $output = base64_encode($output);
    }
    else if( $action == 'de' ){
        $output = openssl_decrypt(base64_decode($string), $encrypt_method, $key, 0, $iv);
    }

    return $output;
}

function redirect($destination)
{
    		//ob_start();
	
	if (preg_match("/^https?:\/\//", $destination))
	{
		header("Location: " . $destination);
	}

	
	else if (preg_match("/^\//", $destination))
	{
		$protocol = (isset($_SERVER["HTTPS"])) ? "https" : "https";
		$host = $_SERVER["HTTP_HOST"];
		header("Location: $protocol://$host$destination");
	}

	
	else
	{
		
		$protocol = (isset($_SERVER["HTTPS"])) ? "https" : "https";
		$host = $_SERVER["HTTP_HOST"];
		$path = rtrim(dirname($_SERVER["PHP_SELF"]), "/\\");
		header("Location: $protocol://$host$path/$destination");
	}

	
	exit;
}

function query($q){
	$connection = mysqli_connect("IP","USER_NAME","PASSWORD","DB_NAME");
	
	$result=mysqli_query($connection, $q);
	return $result;
	mysqli_close();
}



function random_string($length) {
	$key = '';
	$keys = array_merge(range(0, 9));

	for ($i = 0; $i < $length; $i++) {
		$key .= $keys[array_rand($keys)];
	}

	return $key;
}
function random_string2($length) {
	$key = '';
	$keys = array_merge(range(0, 9), range('a', 'z'));

	for ($i = 0; $i < $length; $i++) {
		$key .= $keys[array_rand($keys)];
	}

	return $key;
}
function render($template, $values = [])
    {
        // if template exists, render it
        if (file_exists("templates/$template"))
        {
            // extract variables into local scope
            extract($values);

            // render header
            //require("/templates/header.php");
		
            // render template
	//	if(!(($template=="login_form.php")))
      //      	{require("../templates/tab.php");}
		require("templates/$template");
            // render footer
		require("/templates/howitworks.php");
            require("/templates/footer.php");
        }

        // else err
        else
        {
            trigger_error("Invalid template: $template", E_USER_ERROR);
        }
    }


if ( isset($_SERVER['HTTP_CLIENT_IP']) && ! empty($_SERVER['HTTP_CLIENT_IP'])) {
	$ip = $_SERVER['HTTP_CLIENT_IP'];
} elseif ( isset($_SERVER['HTTP_X_FORWARDED_FOR']) && ! empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
	$ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
} else {
	$ip = (isset($_SERVER['REMOTE_ADDR'])) ? $_SERVER['REMOTE_ADDR'] : '0.0.0.0';
}

$ip = filter_var($ip, FILTER_VALIDATE_IP);
$ip = ($ip === false) ? '0.0.0.0' : $ip;

?>