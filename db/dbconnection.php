<!-- 
  Note that connectiondata.php contains the variables $host, $db, $user, and $pass.
  This file has not been shared due to its sensitive data. 
-->
<?php include 'db/connectiondata.php';?>

<?php 
  $con = pg_connect("host=$host dbname=$db user=$user password=$pass")
  or die ("Could not connect to server\n");

  $select_query = 'SELECT * FROM "public.institution"';
  $results = pg_query($con, $select_query) or die('Query failed: ' . pg_last_error());

  echo "<table>";
  echo "<tr>";
  echo "<th><strong> Name </strong></th>";
  echo "<th><strong> Address </strong></th>";
  echo "<th><strong> Description </strong></th>";
  echo "<th><strong> Location (Google Maps) </strong></th>";
  echo "</tr>";
  while ($row = pg_fetch_row($results)) {
    echo "<tr> <td>$row[1]</td> <td>$row[2]</td> <td>$row[3]</td> <td><a href=$row[4] target='_blank'>Map</a></td> </tr>";
    echo "<br />\n";
  }
  echo "</table>";

  pg_close($con);
?>