<?php 
  $con = pg_connect("host=$host dbname=$db user=$user password=$pass");
  if(isset($_POST['search']))
  {
    $valueToSearch = $_POST['valueToSearch'];
      $query = "SELECT * FROM public.institution WHERE CONCAT('name', 'address', 'description', 'location') LIKE '%".$valueToSearch."%'";
      $search_result = filterTable($query);
      
  }
   else {
      $select_query = 'SELECT * FROM "public.institution"';
      $search_result = filterTable($select_query);
  }
  
  function filterTable($select_query)
  {
      $filter_Result = pg_query($con, $select_query) or die('A consulta falhou: ' . pg_last_error());
      return $filter_Result;
  }
  
  ?>
  
      
          <style>
              table,tr,th,td
              {
                  border: 1px solid black;
              }
          </style>

          <form action="test.php" method="post">
              <input type="text" name="valueToSearch" placeholder="Value To Search"><br><br>
              <input type="submit" name="search" value="Filter"><br><br>
              
              <table>
                  <tr>
                      <th>Name</th>
                      <th>Address</th>
                      <th>Description</th>
                      <th>Location</th>
                  </tr>
  
        <!-- populate table from mysql database -->
                  <?php while($row = pg_fetch_row($search_result)):?>
                  <tr>
                      <td><?php echo $row['name'];?></td>
                      <td><?php echo $row['address'];?></td>
                      <td><?php echo $row['description'];?></td>
                      <td><?php echo $row['location'];?></td>
                  </tr>
                  <?php endwhile;?>
              </table>
          </form>