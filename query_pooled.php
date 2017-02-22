<?php

$c  = oci_connect("www", "dwere4u", "//172.16.10.26/dwtdb:pooled");

$s = oci_parse($c, 'select * from employees');
oci_execute($s);
oci_fetch_all($s, $res);
echo "<pre>\n";
var_dump($res);
echo "</pre>\n";

?>
