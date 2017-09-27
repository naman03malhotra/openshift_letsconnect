<?php
ini_set('post_max_size', '164M');
ini_set('upload_max_filesize', '164M');
@session_start();
error_reporting(E_ALL ^ E_NOTICE ^ E_WARNING);

  echo 'Upload';
   
    if (isset($_FILES["${type}-file"])) 
    {
    
      
        
		$fileName = $_POST["${type}-filename"];
    $uploadDirectory = 'uploads/'.$fileName;
       
        
        if (!move_uploaded_file($_FILES["${type}-file"]["tmp_name"], $uploadDirectory))
         {
            echo(" problem moving uploaded file");
        }
        else
        {
           include_once('yt.php');
        }
		
		
        $_SESSION['file_name']=$fileName;
        
    }
    else
    {
       
    }






?>