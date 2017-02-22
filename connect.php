<?php

// Create connection to Oracle
function db_connet(){
  // define conn as a static to avoid connecting more than once
  static $conn;
  	 // Try connection to the db, if a connection has not been established yet
	if (!isset($conn)) {
		//load configuration as array.  Use the actual location of your config file
		$config = parse_ini_file('db/config.ini');
		$conn = oci_connect($config['dbuser'], $config['dbpass'], "//".$config['dbhost']."/".$config['dbname']);

	}
	if ($conn==false){
        // Handle error - notify administrator, log to a file, show an error screen, etc.
        return mysqli_connect_error(); 
	   
	}
	return $conn;
	// Close the Oracle connection
	//oci_close($conn);

}
?>
