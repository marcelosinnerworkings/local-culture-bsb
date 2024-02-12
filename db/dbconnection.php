<!-- 
  Note that the .env file contains the variables $dbHost, $dbName, $dbUser, and $dbPass.
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
  $dbHost = $_ENV['DB_HOST'];
  $dbName = $_ENV['DB_NAME'];
  $dbUser = $_ENV['DB_USER'];
  $dbPass = $_ENV['DB_PASS'];   
  
  $con = pg_connect("host=$dbHost dbname=$dbName user=$dbUser password=$dbPass") 
  or die ("The database connection was not possible.\n");

  $select_query = 'SELECT * FROM "public.institution"';
  $results = pg_query($con, $select_query) or die('The query failed: ' . pg_last_error());
?>