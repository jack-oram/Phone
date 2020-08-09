<html>
<body>

Welcome 
<?php
    foreach($_POST['check_list'] as $selected) {
        echo "<p>".$selected ."</p>";
    }


?><br>
<?php
    $connection = mysqli_connect('localhost', 'root', '', 'phones');
                // Check connection
                if (!$connection) {
                    die("Connection failed: " . mysqli_connect_error());
                }

                $sql = "SELECT * FROM phones where ID IN (" . implode(",",$_POST['check_list']) . ")";
                $result = mysqli_query($connection, $sql);

                if (mysqli_num_rows($result) > 0) {
                    // output data of each row
                    while($row = mysqli_fetch_assoc($result)) {
                    echo "<tr> <th>";
                    echo "</th><th> " . $row["Model"]. "</th><th> " . $row["Price"]. "</th></tr>";

                    }
                } else {
                    echo "0 results";
                }
                
                mysqli_close($connection);
?>

<h1>My First Heading</h1>
<?php
    $elements = array("Model", "Price");
    echo "<table>";
    foreach ($elements as $value) {
       echo "<tr>" ;
       echo "</tr>";
     };
    echo "</table>";

?>
</body>
</html>