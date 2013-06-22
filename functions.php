<?php

	//reusable file across projects

	//-----------------------------------------------------------------
	//logging

	function append_to_log($text) {
		global $log_path;
		$time_stamp = date('Ymd H:i:s');
		$line = $time_stamp."|".$text."\n"; 
		$fd = fopen($log_path, "a");
		fwrite($fd, $line);
		fclose($fd);
	}

	function log_msg($text) {
		global $display_msgs;
		append_to_log($text);
		if ($display_msgs) {
			print "<p>".$text."</p>";
		}
	}

	function log_err($text) {
		global $display_errs;
		append_to_log($text);
		if ($display_errs) {
			die("<p>".$text."</p>");
		}
		else {
			die("<p>Error Occurred</p>");
		}
	}

	//-----------------------------------------------------------------
	//error handling

	error_reporting(E_ALL);
	//error_reporting(E_ERROR | E_WARNING | E_PARSE | E_COMPILE_ERROR);

	function error_handler($err_num, $err_str, $file_name, $line_num)
	{
		//may want to switch the $err_num to filter out some error types
		if (is_readable($file_name)) {
			$source = file($file_name);
			$line = $source[$line_num-1];
			$len = strlen($line);
			if ($len > 1) {
				$code = substr($line, 0, $len-1);
			} else {
				$code = "n/a";
			}
		} else { 
			$code = "n/a"; 
		}

		if ($err_num == E_NOTICE) {
			$msg = "Error $err_num: <font color=yellow>$err_str</font><br>in $file_name at line $line_num:<br><code>$code</code>";
			log_msg($msg);
		} else {
			$msg = "Error $err_num: <font color=red>$err_str</font><br>in $file_name at line $line_num:<br><code>$code</code>";
			log_err($msg);
		}
	}
	set_error_handler("error_handler");

	//-----------------------------------------------------------------
	//mysql

	function db_open_conn()
	{
		global $db_user, $db_passwd, $db_db;
		$mysqli = new mysqli("localhost", $db_user, $db_passwd, $db_db);
		if ($mysqli->connect_errno) {
			log_err("Connect Error: <font color=red>{$mysqli->connect_error}</font>");
		}
		return $mysqli;
	}

	function db_exec_query($mysqli, $sql)
	{
		log_msg("Executed Query: <font color=blue>{$sql}</font>");  
		$result = $mysqli->query($sql);
		if ($mysqli->errno) {
			log_err("Query Error: <font color=red>{$mysqli->error}</font>");
		}
		return $result;
	}

	//-----------------------------------------------------------------
	//post

	function post_to_bool($var) {
		if (!array_key_exists($var, $_POST)) {
			$msg = "Warning: <font color=yellow>POST key ['$var'] does not exist</font>";
			log_msg($msg);
			return false;
		} else {
			return ($_POST[$var] == "true");
		}
	}

	function post_to_string($var) {
		if (!array_key_exists($var, $_POST)) {
			$msg = "Warning: <font color=yellow>POST key ['$var'] does not exist</font>";
			log_msg($msg);
			return "";
		} else {
			return $_POST[$var];
		}
	}

	//-----------------------------------------------------------------
	//arrays

	function trim_array($old) {
		$new = array();
		foreach ($old as $str) {
			$trimmed = trim($str);
			if (strlen($trimmed) > 0) {
				$new[] = $trimmed;
			}
		}
		return $new;
	}

	//-----------------------------------------------------------------

	function dir_to_files($dir) {
		$files = array();
		if ($handle = opendir($dir)) {
			while (($file = readdir($handle)) !== false) {
				if ($file != "." && $file != "..") {
					$files[] = $file;
				}
			}
			closedir($handle);
		}
		return $files;
	}

	function dir_to_files_with_ext($dir, $ext) {
		$files = array();
		$len = strlen($ext);
		if ($handle = opendir($dir)) {
			while (($file = readdir($handle)) !== false) {
				if ($file != "." && $file != "..") {
					if (substr($file, -1 * $len) == $ext) {
						$files[] = $file;
					}
				}
			}
			closedir($handle);
		}
		return $files;
	}

?>
