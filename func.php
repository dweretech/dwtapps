<?php

$c = oci_connect('www', 'dwere4u', '//172.16.10.26/dwtdb');
$s = oci_parse($c, "begin :bv := myfunc('mydata', 123); end;");
oci_bind_by_name($s, ":bv", $v, 10);
oci_execute($s);
echo $v, "<br>\n";
echo "Completed";

?>