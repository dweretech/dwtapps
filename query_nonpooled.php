<?php

$c = oci_pconnect("www", "dwere4u", "//172.16.10.26/dwtdb");

$s = oci_parse($c, 'select * from employees');
oci_execute($s);
oci_fetch_all($s, $res);
echo "<pre>\n";
var_dump($res);
echo "</pre>\n";

?>
