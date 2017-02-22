<?php

function do_insert($conn)
{
  $stmt = "insert into mytable values (to_date('01-JAN-08 10:20:35', 
        'DD:MON:YY HH24:MI:SS'))";
  $s = oci_parse($conn, $stmt);
  $r = oci_execute($s, OCI_DEFAULT);  // Don't commit
}

function do_row_check($conn)
{
  $stid = oci_parse($conn, "select count(*) c from mytable");
  oci_execute($stid);
  oci_fetch_all($stid, $res);
  echo "Number of rows: ", $res['C'][0], "<br>";
}

function do_delete($conn)
{
  $stmt = "delete from mytable";
  $s = oci_parse($conn, $stmt);
  $r = oci_execute($s);
}

// Program starts here
$c = oci_connect("www", "dwere4u", "//172.16.10.26/dwtdb");

$starttime = microtime(TRUE);
for ($i = 0; $i < 10000; $i++) {
  do_insert($c);
}
oci_commit($c);  // Explicitly commit all changed rows at once
$endtime = microtime(TRUE) - $starttime;
echo "Time was ".round($endtime,3)." seconds<br>";

do_row_check($c);  // Check insert done
do_delete($c);     // cleanup committed rows

?>
