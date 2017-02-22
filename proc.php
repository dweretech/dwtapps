<?php

$c = oci_connect('www', 'dwere4u', '//172.16.10.26/dwtdb');
$s = oci_parse($c, "call myproc('mydata', 123)");
oci_execute($s);
echo "Completed";

?>
