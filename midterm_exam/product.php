<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Products</title>
</head>
<body>
<?php
include('db_connect.php')
?>
<?php 
        $sql = 'select ProductName, UnitsInStock from products where CategoryID=1';
        ?>
  <table>
    <tr>
      <th>Product name</th>
      <th>Units in stock</th>
    </tr>
    <?
                $sql ="SELECT ProductName, UnitsInStock FROM products WHERE CategoryID=1";
                $result = $conn->query($sql);
                while ($row = $result->fetch_assoc()) {
                    echo "<tr>
                        <td> {$row['ProductName']}</td>
                        <td> {$row['UnitsInStock']}</td>
                        </tr>";
                }
                ?>
  </table>
</body>
</html>