<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chess Board</title>
    <style>
        * {
            box-sizeing: border-box;
        }
        table {
            border-spacing : 0;
            border: 2px solid black;
        }
        td {
            width: 90px;
            height: 90px;
        }
        .black{
            background-color : black;
        }
    </style>
</head>
<body>
 <table>
    <?php
      for ($i=0;$i< 8;$i++) {
    ?>
    <tr>
        <?php
        for ($j=0;$j< 8;$j++) {
            if (($i + $j) % 2 == 0){
                echo '<td class="black"></td>';
            } else {
                echo '<td></td>';
            }
        }
        ?>
    <tr>
     <?php
  }
    ?>
 </table>
</body>
</html>