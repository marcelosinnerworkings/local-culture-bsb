<!-- 
  Note that the .env file contains the CSV directory.  
  This file has not been shared due to its sensitive data. 
-->

<?php 
  $dotenvFile = __DIR__ . '/../.env';
  if (file_exists($dotenvFile)) {
      $lines = file($dotenvFile, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
      foreach ($lines as $line) {
          if (strpos($line, '=') !== false) {
              list($key, $value) = explode('=', $line, 2);
              $_ENV[$key] = $value;
              $_SERVER[$key] = $value;
          }
      }
  }
  
  // Replace database connection variables with CSV file path
  $csvFilePath = $_ENV['CSV_FILE_PATH']; // Assuming you have a CSV_FILE_PATH variable in your .env file
  
  // Read CSV file
  $handle = fopen($csvFilePath, 'r');
  if (!$handle) {
      die("Failed to open CSV file.");
  }
  
  // Initialize an empty array to store CSV data
  $csvData = [];
  
  // Read CSV data line by line
  while (($data = fgetcsv($handle)) !== false) {
      $csvData[] = $data;
  }
  
  // Close the CSV file
  fclose($handle);
?>