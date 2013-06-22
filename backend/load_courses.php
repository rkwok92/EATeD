<table>
	<tr>
		<td>
<?php

  include "global.php";

  //-----------------------------------------------------------------

	$skill_id = post_to_string("skill_id");

	if ((!is_int($skill_id)) && ($skill_id < 1)) {

		print "<font color=red>Invalid Skill</font>";
	
	} else {

		//print "<font color=blue>{$skill_id}</font>";


  	//-----------------------------------------------------------------
	  //execute the query
	
		$conn = db_open_conn();
		$sql = "select skill_name, provider_name, course_name, level, url";
		$sql .= " from vw_courses where skill_id=".$skill_id;
		$sql .= " order by skill_id";
	  $result = db_exec_query($conn, $sql);

	  //-----------------------------------------------------------------

		$rows = array();
		while ($row = $result->fetch_assoc()) {
			$rows[] = $row;
		}

	  //-----------------------------------------------------------------
		
		$count = count($rows);
		if ($count > 0) {

			print "<table border=1 cellpadding=8 cellspacing=0>";
			print "<tr><th>Course</th><th>Provider</th><th>Level</th></tr>";
		  foreach ($rows as $row) {
	  	  print "<tr><td><a href=\"{$row['url']}\" target=\"_blank\">{$row['course_name']}</a></td>";
	  	  print "<td>{$row['provider_name']}</td>";
	  	  print "<td>{$row['level']}</td></tr>";
	  	}
			print "</table>";



		}
		else {
			print "<font color=red>No Courses Found</font>";
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