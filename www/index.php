<?php

if (isset($_POST['search']))
	{
	$valueToSearch = $_POST['valueToSearch'];

	// search in all table columns
	// using concat mysql function

	$query = "SELECT * FROM `kaaslased` WHERE CONCAT(`id`, `eesnimi`, `perenimi`, `synniaasta`, `sisetamise_aeg`) LIKE '%" . $valueToSearch . "%'";
	$search_result = filterTable($query);
	}
  else
	{
	$query = "SELECT * FROM `kaaslased`";
	$search_result = filterTable($query);
	}

// function to connect and execute the query

function filterTable($query)
	{
	$connect = mysqli_connect("localhost", "root", "", "grupp15");
	$filter_Result = mysqli_query($connect, $query);
	return $filter_Result;
	}

?>

<!DOCTYPE html>
<html>
    <head>
      <link rel="stylesheet" href="css.css">
      <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,700" rel="stylesheet">

      <title>Grupikaaslased</title>
    </head>
    <body>


      <ul>
        <div class="navbarButtons">
          <li><a href="index.php">Avaleht</a></li>
          <li><a href="search.php">Otsing</a></li>
          <li><a href="modify.php">Muuda</a></li>
        </div>
      </ul>
<div class="content">
  <div class="siteName">
    <a>Avaleht</a>
  </div>

<div class="table">
            <table>
                <tr>
                    <th>ID</th>
                    <th>EESNIMI</th>
                    <th>PERENIMI</th>
                    <th>SÜNNIAASTA</th>
                    <th>SISESTATUD</th>
                </tr>

      <!-- populate table from mysql database -->
                <?php

while ($row = mysqli_fetch_array($search_result)):
?>
               <tr>
                    <td><?php
	echo $row['id'];
?></td>
                    <td><?php
	echo $row['eesnimi'];
?></td>
                    <td><?php
	echo $row['perenimi'];
?></td>
                    <td><?php
	echo $row['synniaasta'];
?></td>
                    <td><?php
	echo $row['sisetamise_aeg'];
?></td>
                </tr>
                <?php
endwhile;
?>
           </table>
        </form>
        </div>
        <div class="footer">
        <footer>
          <a> Eliise Soolepp MM-15 </a>
        </footer>
      </div>
      </div>
    </body>
</html>
