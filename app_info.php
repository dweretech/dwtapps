<?php

$c = oci_pconnect('www', 'dwere4u', '172.16.10.26/dwtdb');
oci_set_module_name($c, 'Home Page');
oci_set_action($c, 'Friend Lookup');

$s = oci_parse($c, "select * from dual");
oci_execute($s);

$r = oci_fetch_array($s);
echo "Value returned is ", $r[0];

?>
