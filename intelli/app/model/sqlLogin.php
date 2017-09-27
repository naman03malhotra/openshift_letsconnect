<?php

/**
 * Class sqlLogin 
 *
 * Fetch data from DB
 *
 */


class sqlLogin

{

	/**
	 * Stores final result
	 */
	private $final_result;

	/**
	 * Constructor
	 */
	public function __construct() 
	{
		if(!isset($_SESSION['username']))
			$this->username = "admin58tfrzD";
		else
			$this->username = $_SESSION['username'];

		if(!isset($_SESSION['password']))
			$this->password = "5Et_ZFEqUWg-";
		else
			$this->password = $_SESSION['password'];

		if(!isset($_SESSION['portAndIp']))
			$this->portAndIp = "127.13.163.2:3306";
		else
			$this->portAndIp = $_SESSION['portAndIp'];

		$this->query = "SHOW DATABASES";

		$this->db = "";
	}


	
	
	public function queryToArray($username,$password,$portAndIp,$query,$db)
	{
		if($query!='')
			$this->query = $query; 
		if($db!='')
			$this->db = $db;
		if($username!='')
			$this->username = $username;
		if($password!='')
			$this->password = $password;
		if($portAndIp!='')
			$this->portAndIp = $portAndIp;

		$result = $this->processQuery($this->username,$this->password,$this->portAndIp,$this->query,$this->db);

		
		$final_result = array();

		//if($result)
		//	$final_result['res'] =TRUE;
		
		
		$final_result['data'] = array();

		foreach ($result as $key => $row) 
       	 		{
       	 			
       	 			array_push($final_result['data'],$row);
       	 		}
       	return json_encode($final_result);



	}
	
	public function processQuery($username,$password,$portAndIp,$query,$db) 
	{
		// If hashtag is not empty
		if($query!='')
			$this->query = $query; 
		if($db!='')
			$this->db = $db;
		if($username!='')
			$this->username = $username;
		if($password!='')
			$this->password = $password;
		if($portAndIp!='')
			$this->portAndIp = $portAndIp;

		

		try 
		{


		$connection = mysqli_connect($this->portAndIp,$this->username,$this->password);

		
		if($this->db!='')
			{
				mysqli_select_db($connection, $this->db); 
				$final_result['db']=TRUE;
			}
		
		return $result=mysqli_query($connection, $this->query);		
		mysqli_close();
			
		}
		catch (\Exception $e) 
		{
            // status => FALSE meaning unable to fetch, some error occured
			$final_result['con'] = FALSE;
			$final_result['error_msg'] = $e->getMessage();
		}

		
	}


	public function displayData($username,$password,$portAndIp,$query,$db)
	{

		if($query!='')
			$this->query = $query; 
		if($db!='')
			$this->db = $db;
		if($username!='')
			{
				$this->username = $username;
				$_SESSION['username'] = $username;
			}
		if($password!='')
			{
				$this->password = $password;
				$_SESSION['password'] = $password;
			}
		if($portAndIp!='')
			{
				$this->portAndIp = $portAndIp;
				$_SESSION['portAndIp'] = $portAndIp;
			}

		$result = $this->processQuery($this->username,$this->password,$this->portAndIp,$this->query,$this->db);

		$final_result = array();

		if($result)
			$final_result['res'] =TRUE;
		
		
		$final_result['data'] = array();	

		$count=0;
		while($row = mysqli_fetch_assoc($result))
    	{
       	 	array_push($final_result['data'], $row);
       	 	$this->db = $row['Database'];
       	 	$query = 'SHOW TABLES';

       	 	
       	 	$resultx = $this->processQuery($this->username,$this->password,$this->portAndIp,$query,$this->db);
       	 	$colName = 'Tables_in_'.$row['Database'];
       	 	$count2 = 0;
       	 	foreach($resultx as $key => $rowx)
       	 	
       	 	{
       	 		$rowx['table'] = $rowx[$colName];
       	 		
       	 		
       	 		array_push($final_result['data'][$count], $rowx);

       	 		$query = 'SHOW COLUMNS from '.$rowx[$colName];
       	 		$resultx2 = $this->processQuery($this->username,$this->password,$this->portAndIp,$query,$this->db);

       	 		foreach ($resultx2 as $key => $rowx2) 
       	 		{
       	 			
       	 			array_push($final_result['data'][$count][$count2], $rowx2['Field']);
       	 		}
       	 		$count2++;

       	 	}
       	 	$count++;
	    }

	    return json_encode($final_result); // return final_result
	    
	}

}