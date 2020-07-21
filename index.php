<!DOCTYPE html>
<html>
<body>

<h1>My First Heading</h1>
<p>My first paragraph.</p>
<form action="compare.php" method="post">
    <table name = "Phones">
            <tr>
                <th>ID</th>
                <th>Model</th>
                <th>Price</th>
            </tr>
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
                echo "<tr> <th>";
                echo "<input type='checkbox' value=" . $row["ID"] . " name='check_list[]'>";
                echo "</th><th> " . $row["Model"]. "</th><th> " . $row["Price"]. "</th></tr>";

                }
            } else {
                echo "0 results";
            }
            
            mysqli_close($connection);

            
            
        ?>




    </table>

    <input type="submit">

</form>

</body>
<html/>
