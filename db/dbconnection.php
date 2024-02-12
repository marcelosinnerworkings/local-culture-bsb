<!-- 
  Note that the .env file contains the variables $dbHost, $dbName, $dbUser, and $dbPass.
  This file has not been shared due to its sensitive data. 
-->

<?php 
  $con = pg_connect("host=$dbHost dbname=$dbName user=$dbUser password=$dbPass") 
  or die ("The database connection was not possible.\n");

  $select_query = 'SELECT * FROM "public.institution"';
  $results = pg_query($con, $select_query) or die('The query failed: ' . pg_last_error());
?>