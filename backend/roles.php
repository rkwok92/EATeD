<?php
  include "global.php";
?>
<html>
  <head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <title>ROLES PAGE</title>
    <link href="css/ui-lightness/jquery-ui-1.10.3.custom.min.css" rel="stylesheet">
    <script type="text/javascript" src="js/jquery-2.0.0.min.js"></script>
    <script type="text/javascript" src="js/jquery-ui-1.10.3.custom.min.js"></script>
  </head>
  <body>
    <h1>ROLES PAGE</h1>
    <table><tr><td valign="top">
    	<div>
			<label for="role">Role:</label><select id="role">
<?php

  //-----------------------------------------------------------------
  //execute the query

	$conn = db_open_conn();
  $sql = "select role_id, role_name from roles order by role_id";
  $result = db_exec_query($conn, $sql);

  //-----------------------------------------------------------------
  //output the results

  $rows = array();
  while ($row = $result->fetch_assoc()) {
    $rows[] = $row;
  }

  foreach ($rows as $row) {
    print "<option value=\"{$row['role_id']}\">{$row['role_name']}</option>";
  }

  //-----------------------------------------------------------------
  //close connection

  $result->close();
  $conn->close();

?>
			</select><input type="button" value="Select" id="select_role"><span id="span1"></span></div>
		</td>
		<td>&nbsp;</td>
		<td>&nbsp;</td>
		<td>&nbsp;</td>
		<td>
			<div id="company_results"></div>
		</td>
		</tr>
		</table>
		<br><br>
    <div id="results"></div>
    <script>
$(function() {
	
			//load button click event handler
      $("#select_role").click(function() {

        var role_id = $("#role").val();
				if (role_id == "") {
	        $("#results").html("<font color=red>No Role Selected</font>");
					return false;
				}

        $("#company_results").html("Loading...");

        $.ajax({
          url: "load_companies.php",
          
          data: {
            role_id: role_id,
          },
          
          type: "POST",
          
          dataType: "html",
          
          success: function(html) {
          	$("#company_results").html(html);
          },
          
          error: function(xhr, status) {
            alert( "Sorry, there was a problem!" );
          },
          
          complete: function(xhr, status) {
            //alert( "The request is complete!" );
          }
          
        });

        $("#results").html("Loading...");

        $.ajax({
          url: "load_skills.php",
          
          data: {
            role_id: role_id,
          },
          
          type: "POST",
          
          dataType: "html",
          
          success: function(html) {
          	$("#results").html(html);
          },
          
          error: function(xhr, status) {
            alert( "Sorry, there was a problem!" );
          },
          
          complete: function(xhr, status) {
            //alert( "The request is complete!" );
          }
          
        });
      });

});
    </script>
<?php


  //next line causes error for error handling testing
  //require "this file does not exist";

  //-----------------------------------------------------------------


?>
  </body>
</html>
