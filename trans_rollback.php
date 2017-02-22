<?php

$conn = oci_connect("www", "dwere4u", "//172.16.10.26/dwtdb");


// PHP function to get a formatted date
$d = date('j:M:y H:i:s');

// Insert the date into mytable
$s = oci_parse($conn,
		       "insert into mytable values (to_date('" . $d . "', 
        'DD:MON:YY HH24:MI:SS'))");

// Use OCI_DEFAULT to insert without committing
$r = oci_execute($s, OCI_DEFAULT);

echo "Previous INSERT rolled back as no commit is done before script ends\n";

?>
