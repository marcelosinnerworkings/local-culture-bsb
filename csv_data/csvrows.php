<?php
  echo '<table class="w3-table">';
  echo "<tr>";
  echo "<th><strong> Name </strong></th>";
  echo "<th><strong> Address </strong></th>";
  echo "<th><strong> Description </strong></th>";
  echo "<th><strong> Location (Google Maps) </strong></th>";
  echo "</tr>";
  
  // Read CSV file
  $handle = fopen($csvFilePath, 'r');
  if (!$handle) {
      die("Failed to open CSV file.");
  }
  
  // Skip the header line of the CSV file
  $header = fgetcsv($handle);
  
  // Output CSV data as table rows
  while (($row = fgetcsv($handle)) !== false) {
      // Check if the row is an array (to avoid printing the header line)
      if (is_array($row)) {
          echo "<tr>";
          echo "<td>" . htmlspecialchars($row[1]) . "</td>"; // Assuming name is the first column
          echo "<td>" . htmlspecialchars($row[2]) . "</td>"; // Assuming address is the second column
          echo "<td>" . htmlspecialchars($row[3]) . "</td>"; // Assuming description is the third column
          echo "<td><a href='" . htmlspecialchars($row[4]) . "' target='_blank'>Map</a></td>"; // Assuming location (Google Maps) URL is the fourth column
          echo "</tr>";
      }
  }
  
  // Close the CSV file
  fclose($handle);
  
  echo "</table>";     
?>