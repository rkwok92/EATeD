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
		$sql = "select skill_id, skill_name";
		$sql .= " from vw_role_to_skill where role_id=".$role_id;
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

//			print "<script>\n";
//			print "$(function() {\n";
//			print "  $( \"#accordion\" ).accordion();\n";
//			print "});\n";
//			print "</script>\n";
  
//			print "<div id=\"accordian\">\n";
//
//		  foreach ($rows as $row) {
//	  	  print "<h3>{$row['skill_id']}</h3>\n";
//	  	  print "<div>{$row['skill_name']}</div>\n";
//	  	}
//
//			print "</div>\n";



			print "<table border=1 cellpadding=8 cellspacing=0>";
		  foreach ($rows as $row) {
	  	  print "<tr><td>{$row['skill_name']}</td>";
	  	  print "<td><input type=button value=\"Select Skill\" onclick=\"javascript:load_skill({$row['skill_id']});\"></td>";
	  	  //print "<td>{$row['skill_id']}</td></tr>";
	  	  print "</tr>";
	  	}
			print "</table>";



		}
		else {
			print "<font color=red>No Skills Found</font>";
		}
	
	  //-----------------------------------------------------------------
	  //close connection
	
	  $result->close();
	  $conn->close();
		
	}

?>
</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td valign="top" align="center">
	<div id="skill_results"></div>
    <script>
	
	function load_skill(skill_id) {
	
				if (skill_id == "") {
	        $("#skill_results").html("<font color=red>No Skill Selected</font>");
					return false;
				}

        $("#skill_results").html("Loading...");

        $.ajax({
          url: "load_courses.php",
          
          data: {
            skill_id: skill_id,
          },
          
          type: "POST",
          
          dataType: "html",
          
          success: function(html) {
          	$("#skill_results").html(html);
          },
          
          error: function(xhr, status) {
            alert( "Sorry, there was a problem!" );
          },
          
          complete: function(xhr, status) {
            //alert( "The request is complete!" );
          }
          
        });

	};

    </script>
</td>
</tr>
</table>