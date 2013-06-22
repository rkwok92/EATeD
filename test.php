<?php
  include "global.php";
?>
<html>
  <head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <title>PROD PAGE</title>
  </head>
  <body>
<?php

  print "<h1>EATed Test Page - ".date("m/d/Y  H:i:s", time())."</h1>";
  print "<h2>PHP Version - ".phpversion()."</h2>";
  print "<h3>Current Year - ".date("Y")."</h3>";

  //causes error for error handling testing
  //require "this file does not exist";

  //-----------------------------------------------------------------
  //execute the query

	$conn = db_open_conn();
  $sql = "select test_id, test_text from test order by test_id";
  $result = db_exec_query($conn, $sql);

  //-----------------------------------------------------------------
  //output the results

  $rows = array();
  while ($row = $result->fetch_assoc()) {
    $rows[] = $row;
  }

  print "<table border='1' cellspacing='0' cellpadding='15'>";
  print "<tr><th colspan='2'>Iterator</th></tr>";
  foreach ($rows as $row) {
    print "<tr><td>{$row['test_id']}</td><td>{$row['test_text']}</td></tr>";
  }
  print "</table>";

  print "<br /><br />";

  //-----------------------------------------------------------------
  //close connection

  $result->close();
  $conn->close();

?>
  </body>
</html>
