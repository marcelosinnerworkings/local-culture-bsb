<!-- 
  Note that connectiondata.php contains the variables $host, $db, $user, and $pass.
  This file has not been shared due to its sensitive data. 
-->
<?php include 'db/connectiondata.php';?>

<?php 
  $con = pg_connect("host=$host dbname=$db user=$user password=$pass") 
  or die ("The database connection was not possible.\n");

  $select_query = 'SELECT * FROM "public.institution"';
  $results = pg_query($con, $select_query) or die('The query failed: ' . pg_last_error());
?>