<?php
  echo '<table class="w3-table">';
  echo "<tr>";
  echo "<th><strong> Name </strong></th>";
  echo "<th><strong> Address </strong></th>";
  echo "<th><strong> Description </strong></th>";
  echo "<th><strong> Location (Google Maps) </strong></th>";
  echo "</tr>";
  while ($row = pg_fetch_row($results)) {
    echo "<tr> <td>$row[1]</td> <td>$row[2]</td> <td>$row[3]</td> <td><a href=$row[4] target='_blank'>Map</a></td> </tr>";
  }
  echo "</table>";

  pg_close($con);
?>