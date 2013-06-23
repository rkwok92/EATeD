<?php

  //-----------------------------------------------------------------

	date_default_timezone_set("America/New_York");

	session_start();

  //-----------------------------------------------------------------
  //setup
  
  //TODO: add option to email errors to administrator
  $display_errs = true;
  $display_msgs = false;

  //if in prod, would not want log file to be accessible via http
  $log_dir = "/Users/michaeladams/code/EATeD/";
  $log_path = $log_dir."guest.log";

	$db_user = "eateduser";
	$db_passwd = "eatedpasswd";
	$db_db = "eateddb";

  include "functions.php";

  //-----------------------------------------------------------------

?>
