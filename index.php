<!DOCTYPE html>

<!-- Styles -->

<?php
  include "global.php";
?>
<html>
  <head>
	<link href="css/bootstrap.css" rel="stylesheet">
	<style>
      body {
        padding-top: 60px; 
		padding-bottom: 40px;
      }
    </style>
	<link href="css/bootstrap-responsive.css" rel="stylesheet">
	
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <title>PROD PAGE</title>
  </head>
  <body>

    <div class="navbar navbar-inverse navbar-fixed-top">
      <div class="navbar-inner">
        <div class="container">
          <button type="button" class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="brand" href="#"> <img class="img-circle" src="images/logo.png" width="200"></a>
          <div class="nav-collapse collapse">
            <ul class="nav">
              <li class="active"><a href="#">Home</a></li>
              <li><a href="#about">About</a></li>
              <li><a href="#contact">Contact</a></li>
            </ul>
            <form class="navbar-form pull-right">
              <input class="span2" type="text" placeholder="Email">
              <input class="span2" type="password" placeholder="Password">
              <button type="submit" class="btn">Sign in</button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </head>
  <body>
	
	<div class="container">

      <!-- Main hero unit for a primary marketing message or call to action -->
      <div class="hero-unit">
			<h1>EduHack</h1>
        <p></p>
        <p>There are 10000000 unfilled jobs in the United States today - EduHack addresses this problem by enabling job seekers to match the needs of employers </p>
      </div>

      <!-- Example row of columns -->
      <div class="row">
        <div class="span4">
          <h2>For Job Seekers</h2>
          <p>No degree? No problem. </p>
		  <p>Most recruiters today are looking for specific skills and experience. We provide job seekers with a plan to attain those skills, and personal mentorship along the way. If you're looking to transition into a completely new field, don't let your past stop you and EduHack your way there! </p>
          <p><a class="btn btn-warning" href="#">Register &raquo;</a></p>
        </div>
        <div class="span4">
          <h2>For Employers</h2>
          <p>Find your asdfasdfasd at EduHack</p>
		  <p>Instead of sifting through piles of unqualified resume's and candidates, find real talent specific to your needs here at EduHack.  </p>
          <p><a class="btn btn-primary" href="#">Register &raquo;</a></p>
       </div>
        <div class="span4">
          <h2>Mentorship</h2>
		  <p>What courses should I take? How am I performing? Am I on track to complete my goals by December? What do I do after passing the course? These are the questions our highly qualified mentors will help you with...</p>
          <p><a class="btn" href="#">Learn More &raquo;</a></p>
        </div>
      </div>
	
<!-- <?php

  print "<h1>EATed Test Page - ".date("m/d/Y  H:i:s", time())."</h1>";
  print "<h2>PHP Version - ".phpversion()."</h2>";
  print "<h3>Current Year - ".date("Y")."</h3>";

  //causes error for error handling testing
  //require "this file does not exist";

  //-----------------------------------------------------------------
  //execute the query

	$conn = db_open_conn();
  $sql = "select company_id, company_name from companies order by company_name";
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
    print "<tr><td>{$row['company_id']}</td><td>{$row['company_name']}</td></tr>";
  }
  print "</table>";

  print "<br /><br />";

  //-----------------------------------------------------------------
  //close connection

  $result->close();
  $conn->close();

?> -->


<script src="../assets/js/jquery.js"></script>
<script src="../assets/js/bootstrap-transition.js"></script>
<script src="../assets/js/bootstrap-alert.js"></script>
<script src="../assets/js/bootstrap-modal.js"></script>
<script src="../assets/js/bootstrap-dropdown.js"></script>
<script src="../assets/js/bootstrap-scrollspy.js"></script>
<script src="../assets/js/bootstrap-tab.js"></script>
<script src="../assets/js/bootstrap-tooltip.js"></script>
<script src="../assets/js/bootstrap-popover.js"></script>
<script src="../assets/js/bootstrap-button.js"></script>
<script src="../assets/js/bootstrap-collapse.js"></script>
<script src="../assets/js/bootstrap-carousel.js"></script>
<script src="../assets/js/bootstrap-typeahead.js"></script>

  </body>
</html>
