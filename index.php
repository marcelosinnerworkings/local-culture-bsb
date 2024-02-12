<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width">
    <link rel="stylesheet" href="style/reset.css">
    <link rel="stylesheet" href="style/style.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Inconsolata">
    <title>Brasilia - Brazil</title>
  </head>
  <body>
  <?php
    $dotenvFile = __DIR__ . '/.env';
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
    ?>
    <?php include 'src/header.php';?>
    <?php include 'src/map.php';?>
    <?php include 'src/attractions.php';?>
    <?php include 'src/about.php';?>  
  </body>
</html>