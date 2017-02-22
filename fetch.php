<?php

$conn = oci_connect("www", "dwere4u", "//172.16.10.26/dwtdb");
$query = 'select * from employees where employee_id = 101';
$stid = oci_parse($conn, $query);
oci_execute($stid);

echo "<pre>";
while ($row = oci_fetch_array($stid)) {
  var_dump($row); // display PHP's representation of $row
}
echo "</pre>";

oci_close($conn);

?>