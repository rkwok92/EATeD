<table>
	<tr>
		<td>
<?php

  include "global.php";

  //-----------------------------------------------------------------

	$role_id = post_to_string("role_id");
	//$bullets = post_to_string("bullets");

	if ((!is_int($role_id)) && ($role_id < 1)) {

		print "<font color=red>Invalid Role</font>";
	
	} else {

		//print "<font color=blue>{$role_id}</font>";


  	//-----------------------------------------------------------------
	  //execute the query
	
		$conn = db_open_conn();
		$sql = "select company_name";
		$sql .= " from vw_company_to_role where role_id=".$role_id;
		$sql .= " order by company_name";
	  $result = db_exec_query($conn, $sql);

	  //-----------------------------------------------------------------

		$rows = array();
		while ($row = $result->fetch_assoc()) {
			$rows[] = $row;
		}

	  //-----------------------------------------------------------------
		
		$count = count($rows);
		if ($count > 0) {

			print "<table border=1 cellpadding=8 cellspacing=0><tr><td>\n";
			print "Companies interested in this role:\n";
			print "<ul>";

		  foreach ($rows as $row) {
	  	  print "<li>{$row['company_name']}</li>";
	  	}
	  	print "</ul>";
			print "</td></tr></table>";



		}
		else {
			print "<font color=red>No Companies Found</font>";
		}
	
	  //-----------------------------------------------------------------
	  //close connection
	
	  $result->close();
	  $conn->close();
		
	}

?>
</td>
</tr>
</table>