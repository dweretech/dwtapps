<?php

// Create connection to Oracle
//$conn = oci_connect("www", "dwere4u", "//172.16.10.26/dwtdb");

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
}

function get_enrollm($header,$query) {
	// Display list
	$conn = db_connet();
	$stid = oci_parse($conn, $query);
	$r = oci_execute($stid);
	
	// Fetch each row in an associative array
	print '<table border="1" align="center">';
	print $header;
	while ($row = oci_fetch_array($stid, OCI_RETURN_NULLS+OCI_ASSOC)) {
	   print '<tr>';
	   foreach ($row as $item) {
		   print '<td>'.($item !== null ? htmlentities($item, ENT_QUOTES) : '&nbsp').'</td>';
	   }
	   print '</tr>';
	}
	print '</table>';
return 0;
}

// Main area
$hdr='<tr><td>S_ID </td><td> C_SEC_ID </td><td>GRA</td></tr>';
$qry = 'select * from enrollment';
get_enrollm($hdr,$qry );
//=============
$hdr='<tr><td>COURSE_ID </td><td> CALL_ID </td><td><a href="#" onclick="javascript:alert(\'Testing 123\')">COURSE_NAME</a></td> <td>CREDITS</td><td></td></tr>';
$qry = 'select * from www.course';
get_enrollm($hdr,$qry );
//$hdr='<tr><td>S_ID </td><td> C_SEC_ID </td><td>GRA</td></tr>';
//$qry = "update www.enrollment set grade='A' where c_sec_id=1011";
//get_enrollm($hdr,$qry );
// COURSE_ID CALL_ID COURSE_NAME CREDITS
//---------------------------------------------------
// COURSE_ID                                 NOT NULL NUMBER(6)
 //CALL_ID                                            VARCHAR2(10)
 //COURSE_NAME                                        VARCHAR2(25)
 //CREDITS                                            NUMBER(2)
 //SCHOOL                                             VARCHAR2(20)

//$qry = "insert into course(COURSE_ID,CALL_ID,COURSE_NAME,CREDITS) values(7,'MATH 210','Calculus I',4)";
//get_enrollm($hdr,$qry );
?>
