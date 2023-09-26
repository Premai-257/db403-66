<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>คำสั่ง SQL สำหรับเรียนข้อมูล</title>
    <style>
        table {
            border-spacing: 0;
            margin; 5px
        }
        table, th, td {
            border : 1px solid black;
        }
        th, td {
            padding: 3px;
        }
        code { 
            display: block;
            margin: 3px 0 3px;
            padding: 2px;
            background-color: red;
        }
        </style>
</head>
<body>
    <? 
    $conn = new mysqli ('db403-mysql', 'root', 'P@ssw0rd', 'northwind');
    if ($conn ->connect_error){
        echo $conn ->connect_error;
        die ();
    }
    ?>
    <H1>คำสั่ง SQL สำหรับเรียนข้อมูล</H1>
    <ol>
        <li>เรียกดูชื่อสินค้าที่เลิกผลิตแล้ว แต่ยังมีจำนวนสินค้าคงเหลือค้างอยู่ใน Stock
            <div>
            <code>SELECT ProductName, UnitsInStock, Discontinued FROM products WHERE Discontinued=1 AND UnitsInStock>0 
            </code>
            <br>
            <table>
                <tr>
                    <th>ProductName</th>
                    <th>UnitsInStock</th>
                    <th>Discontinued</th>
                </tr>
                <?
                $sql = 'SELECT ProductName, UnitsInStock, Discontinued
                FROM products
                WHERE Discontinued=1 AND UnitsInStock>0';
                $result = $conn->query($sql);
                while ($row = $result->fetch_assoc()) {
                    echo "<tr>
                        <td> {$row['ProductName']}</td>
                        <td> {$row['UnitsInStock']}</td>
                        <td> {$row['Discontinued']}</td>
                        </tr>";
                }
                ?>
            </table>
            </div>
        </li>
        <li>เรียกดูชื่อสินค้าที่มียอดสั่งซื้อมูลค่าเกิน 500<div>
            <code>SELECT ProductName,UnitPrice,UnitsOnOrder,UnitPrice*UnitsOnOrder AS มูลค่ามากกกว่า500
FROM products
WHERE UnitPrice*UnitsOnOrder > 500
            </code>
            <br>
            <table>
                <tr>
                    <th>ProductName</th>
                    <th>UnitPrice</th>
                    <th>UnitsOnOrder</th>
                </tr>
                <?
                $sql = 'SELECT ProductName,UnitPrice,UnitsOnOrder,UnitPrice*UnitsOnOrder AS มูลค่ามากกกว่า500
                FROM products
                WHERE UnitPrice*UnitsOnOrder > 500';
                $result = $conn->query($sql);
                while ($row = $result->fetch_assoc()) {
                    echo "<tr>
                        <td> {$row['ProductName']}</td>
                        <td> {$row['UnitPrice']}</td>
                        <td> {$row['UnitsOnOrder']}</td>
                        </tr>";
                }
                ?>
            </table>
            </div></li>
        <li>ลูกค้าจากประเทศ France มาจากเมือง (city) อะไรบ้าง
            <div>
            <code>SELECT CompanyName,City,Country FROM `customers` WHERE Country ='France';
            </code>
            <br>
            <table>
                <tr>
                    <th>CompanyName</th>
                    <th>City</th>
                    <th>Country</th>
                </tr>
                <?
                $sql = "SELECT CompanyName,City,Country FROM `customers` WHERE Country = 'France'";
                $result = $conn->query($sql);
                while ($row = $result->fetch_assoc()) {
                    echo "<tr>
                        <td> {$row['CompanyName']}</td>
                        <td> {$row['City']}</td>
                        <td> {$row['Country']}</td>
                        </tr>";
                }
                ?>
            </table>
            </div>
        </li>
        <li>เรียกดูรายชื่อผู้ติดต่อ (ContactName) และชื่อบริษัท (CompanyName) ของลูกค้า เฉพาะบริษัทที่มีชื่อขึ้นต้นด้วย a <div>
            <code>SELECT ContactName,CompanyName FROM customers WHERE CompanyName LIKE 'a%';
            </code>
            <br>
            <table>
                <tr>
                    <th>ContactName</th>
                    <th>CompanyName</th>
                </tr>
                <?
                $sql ="SELECT ContactName,CompanyName FROM customers WHERE CompanyName LIKE 'a%';";
                $result = $conn->query($sql);
                while ($row = $result->fetch_assoc()) {
                    echo "<tr>
                        <td> {$row['ContactName']}</td>
                        <td> {$row['CompanyName']}</td>
                        </tr>";
                }
                ?>
            </table>
            </div></li>
        <li>เรียกดูชื่อผู้ติดต่อ (ContactName) และชื่อบริษัท (CompanyName) ของลูกค้า เฉพาะบริษัทที่ชื่อลงท้ายว่า markets <div>
            <code>SELECT ContactName,CompanyName FROM `customers` WHERE CompanyName LIKE'%Markets';
            </code>
            <br>
            <table>
                <tr>
                    <th>ContactName</th>
                    <th>CompanyName</th>
                </tr>
                <?
                $sql ="SELECT ContactName,CompanyName FROM `customers` WHERE CompanyName LIKE'%Markets';";
                $result = $conn->query($sql);
                while ($row = $result->fetch_assoc()) {
                    echo "<tr>
                        <td> {$row['ContactName']}</td>
                        <td> {$row['CompanyName']}</td>
                        </tr>";
                }
                ?>
            </table>
            </div></li>
        <li>เรียกดูชื่อผู้ติดต่อ (ContactName) และชื่อบริษัท (CompanyName) ของลูกค้า เฉพาะบริษัทที่มีตัวอักษร et อยู่ในชื่อบริษัท<div>
            <code>SELECT ContactName,CompanyName FROM customers WHERE CompanyName LIKE '%et';
            </code>
            <br>
            <table>
                <tr>
                    <th>ContactName</th>
                    <th>CompanyName</th>
                </tr>
                <?
                $sql ="SELECT ContactName,CompanyName FROM customers WHERE CompanyName LIKE '%et';";
                $result = $conn->query($sql);
                while ($row = $result->fetch_assoc()) {
                    echo "<tr>
                        <td> {$row['ContactName']}</td>
                        <td> {$row['CompanyName']}</td>
                        </tr>";
                }
                ?>
            </table>
            </div></li>
        <li>เรียกดูชื่อผู้ติดต่อ (ContactName) และชื่อบริษัท (CompanyName) ของลูกค้า เฉพาะชื่อบริษัทที่มีตัวอักษร e และ t โดยมีตัวอักษร 1 ตัว คั่นกลางระหว่าง e และ t เช่น ect, ent, est<div>
            <code>SELECT ContactName,CompanyName FROM customers WHERE CompanyName LIKE '%e_t%';
            </code>
            <br>
            <table>
                <tr>
                    <th>ContactName</th>
                    <th>CompanyName</th>
                </tr>
                <?
                $sql ="SELECT ContactName,CompanyName FROM customers WHERE CompanyName LIKE '%e_t%';";
                $result = $conn->query($sql);
                while ($row = $result->fetch_assoc()) {
                    echo "<tr>
                        <td> {$row['ContactName']}</td>
                        <td> {$row['CompanyName']}</td>
                        </tr>";
                }
                ?>
            </table>
            </div></li>
        <li>เรียกดูชื่อผู้ติดต่อ (ContactName) และชื่อบริษัท (CompanyName) ของลูกค้า เฉพาะบริษัทที่มีชื่อขึ้นต้นด้วยตัวอักษร b และลงท้ายด้วย s<div>
            <code>SELECT ContactName,CompanyName FROM customers WHERE CompanyName LIKE 'b%s';
            </code>
            <br>
            <table>
                <tr>
                    <th>ContactName</th>
                    <th>CompanyName</th>
                </tr>
                <?
                $sql ="SELECT ContactName,CompanyName FROM customers WHERE CompanyName LIKE 'b%s';";
                $result = $conn->query($sql);
                while ($row = $result->fetch_assoc()) {
                    echo "<tr>
                        <td> {$row['ContactName']}</td>
                        <td> {$row['CompanyName']}</td>
                        </tr>";
                }
                ?>
            </table>
            </div></li>
        <li>รายชื่อสินค้าและราคาต่อหน่วย เฉพาะสินค้าที่มีราคาต่อหน่วยตั้งแต่ 20 ถึง 50 <div>
            <code>SELECT ProductName,UnitPrice FROM `products` WHERE UnitPrice BETWEEN 20 AND 50;
            </code>
            <br>
            <table>
                <tr>
                    <th>ProductName</th>
                    <th>UnitPrice</th>
                </tr>
                <?
                $sql ="SELECT ProductName,UnitPrice FROM `products` WHERE UnitPrice BETWEEN 20 AND 50;";
                $result = $conn->query($sql);
                while ($row = $result->fetch_assoc()) {
                    echo "<tr>
                        <td> {$row['ProductName']}</td>
                        <td> {$row['UnitPrice']}</td>
                        </tr>";
                }
                ?>
            </table>
            </div></li>
        <li>จากตารางข้อมูลลูกค้า เรียกดูชื่อผู้ติดต่อ (ContactName), ตำแหน่งผู้ติดต่อ (ContactTitle), ประเทศ (Country) โดยเรียกดูเฉพาะลูกค้าที่มีตำแหน่งเป็น Owner และอยู่ในประเทศ Mexico, Spain, Francediv><div>
            <code>SELECT ContactName,ContactTitle,Country FROM customers WHERE ContactTitle ='Owner' AND Country IN('Mexico','Spain','France');
            </code>
            <br>
            <table>
                <tr>
                    <th>ContactName</th>
                    <th>ContactTitle</th>
                    <th>Country</th>
                </tr>
                <?
                $sql ="SELECT ContactName,ContactTitle,Country FROM customers WHERE ContactTitle ='Owner' AND Country IN('Mexico','Spain','France');";
                $result = $conn->query($sql);
                while ($row = $result->fetch_assoc()) {
                    echo "<tr>
                        <td> {$row['ContactName']}</td>
                        <td> {$row['ContactTitle']}</td>
                        <td> {$row['Country']}</td>
                        </tr>";
                }
                ?>
            </table>
            </div></li>
        <li>จากตารางข้อมูลลูกค้า เรียกดูชื่อบริษัท (CompanyName), ตำแหน่งผู้ติดต่อ (ContactTitle), ประเทศ (Country) โดยเรียกดูเฉพาะลูกค้าที่มีตำแหน่งเป็น Owner และอยู่ในประเทศ Mexico, Spain, France เรียงลำดับตามชื่อบริษัท โดยแสดงข้อมูลแค่ 2 รายการ
        <div>
            <code>
            SELECT ContactName, ContactTitle, Country
            FROM customers
            WHERE ContactTitle LIKE 'Owner%' AND (Country = 'Mexico' OR Country='spain' OR Country='France');

            </code>
<br>   
        <table>
            <tr>
                <th>ProductName</th>
                <th>UnitPrice</th>
            </tr>
    <?php
    $sql = "SELECT ContactName, ContactTitle, Country
            FROM customers
            WHERE ContactTitle LIKE 'Owner%' AND (Country = 'Mexico' OR Country='spain' OR Country='France')";

    $result = $conn->query($sql);
    while ($row = $result->fetch_assoc()) {
        echo "<tr>
            <td>{$row['ContactName']}</td>
            <td>{$row['ContactTitle']}</td>
            <td>{$row['Country']}</td>
            </tr>";
    }
    ?>
        </table>
        </div></li>
        <li>แสดงชื่อสินค้า ราคาต่อหน่วย และจำนวนสินค้าต่อหน่วย โดยแสดงเฉพาะสินค้าที่มีหน่วยเป็นกล่อง (box) 5 รายการที่มีราคาต่อหน่วยสูงสุด
        <div>
        <code>
        SELECT ProductName,UnitPrice,QuantityPerUnit FROM `products` WHERE QuantityPerUnit LIKE '%Box%' ORDER BY UnitPrice DESC LIMIT 5;

            </code>
<br>   
        <table>
            <tr>
                <th>ProductName</th>
                <th>UnitPrice</th>
                <th>QuantityPerUnit</th>
            </tr>
    <?php
    $sql = "SELECT ProductName,UnitPrice,QuantityPerUnit FROM `products` WHERE QuantityPerUnit LIKE '%Box%' ORDER BY UnitPrice DESC LIMIT 5;";

    $result = $conn->query($sql);
    while ($row = $result->fetch_assoc()) {
        echo "<tr>
            <td>{$row['ProductName']}</td>
            <td>{$row['UnitPrice']}</td>
            <td>{$row['QuantityPerUnit']}</td>
            </tr>";
    }
    ?>
        </table>
        </div>
        </li>
        <li>มีจำนวนลูกค้ากี่คนที่อยู่ในแต่ละประเทศ UK, France หรือ Spain เรียงลำดับตามจำนวนลูกค้า<div>
        <code>
        SELECT country,COUNT(*) AS member FROM customers WHERE Country IN ('UK','France','Spain') GROUP BY Country;
        </code>
<br>   
        <table>
            <tr>
                <th>country</th>
                <th>member</th>
            </tr>
    <?php
    $sql = "SELECT country,COUNT(*) AS member FROM customers WHERE Country IN ('UK','France','Spain') GROUP BY Country;";

    $result = $conn->query($sql);
    while ($row = $result->fetch_assoc()) {
        echo "<tr>
            <td>{$row['country']}</td>     
            <td>{$row['member']}</td>
            </tr>";
    }
    ?>
        </table>
        </div></li>
        <li>จำนวนลูกค้าจากประเทศ UK, France หรือ Spain  โดยแสดงเฉพาะประเทศที่มีลูกค้ามากกว่า 5 ราย และแสดงผลเรียงลำดับตามจำนวนลูกค้าจากมากไปน้อย<div>
        <code>
        SELECT country, COUNT(*) AS member FROM customers WHERE Country IN ('UK','France','Spain') GROUP BY Country HAVING member > 5 Order BY COUNT(*);
        </code>
<br>   
        <table>
            <tr>
                <th>country</th>
                <th>member</th>
            </tr>
    <?php
    $sql = "SELECT country, COUNT(*) AS member FROM customers WHERE Country IN ('UK','France','Spain') GROUP BY Country HAVING member > 5 Order BY COUNT(*);";

    $result = $conn->query($sql);
    while ($row = $result->fetch_assoc()) {
        echo "<tr>
            <td>{$row['country']}</td>     
            <td>{$row['member']}</td>
            </tr>";
    }
    ?>
        </table>
        </div></li>
        <li>ราคาเฉลี่ยของสินค้าที่มีค้างอยู่ใน Stock จำแนกตามหมวดหมู่(CategoryID)<div>
        <code>
        SELECT CategoryID, AVG(UnitPrice) avg_price FROM products WHERE UnitsInStock > 0 GROUP BY CategoryID;
        </code>
<br>   
        <table>
            <tr>
                <th>CategoryID</th>
                <th>AVG</th>
            </tr>
    <?php
    $sql = "SELECT CategoryID, AVG(UnitPrice) AS avg FROM products WHERE UnitsInStock > 0 GROUP BY CategoryID;";

    $result = $conn->query($sql);
    while ($row = $result->fetch_assoc()) {
        echo "<tr>
            <td>{$row['CategoryID']}</td>     
            <td>{$row['avg']}</td>
            </tr>";
    }
    ?>
        </table>
        </div></li>
    </ol>
    <?
     $conn->close();
    ?>
</body>
</html>