<!DOCTYPE html>
<html>
<body>

<h1>My First Heading</h1>
<p>My first paragraph.</p>
<?php
echo "My first PHP script!";
?>
</body>
</html>

<?php
    $connection = mysqli_connect('localhost', 'root', '', 'phones');
    // Check connection
    if (!$connection) {
        die("Connection failed: " . mysqli_connect_error());
    }

    $sql = "SELECT ID, Model, Price FROM phones";
    $result = mysqli_query($connection, $sql);

    if (mysqli_num_rows($result) > 0) {
        // output data of each row
        while($row = mysqli_fetch_assoc($result)) {
          echo "id: " . $row["ID"]. " - Name: " . $row["Model"]. " " . $row["Price"]. "<br>";
        }
    } else {
        echo "0 results";
    }
      
    mysqli_close($connection);

    
    
?>

<html>
<head></head>

<body>
    <table name = "Phones">
        <tr>
            <th>ID</th>
            <th>Model</th>
            <th>Price</th>
        </tr>
    </table>

</body>
<html/>
