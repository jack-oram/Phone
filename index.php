<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
</head>
<body>
<div class="container">
    <div class="row">
        <div class="col">
        </div>
        <div class="col">

            <h1>Phone Comparision Tool</h1>
            <p>Click on the phones you want to compare then click compare!</p>
            <form action="compare.php" method="post">
                <table name = "Phones" class="table">
                    <thead>
                        <tr>
                            <th></th>
                            <th>Model</th>
                            <th>Price</th>
                        </tr>
                    </thead>
                    <tbody>
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
                                echo "<tr> <td>";
                                echo "<input type='checkbox' value=" . $row["ID"] . " name='check_list[]'>";
                                echo "</td><td> " . $row["Model"]. "</td><td> " . $row["Price"]. "</td></tr>";

                                }
                            } else {
                                echo "0 results";
                            }
                            
                            mysqli_close($connection);

                            
                            
                        ?>
                    </tbody>



                </table>

                <input type="submit" class="btn btn-primary" value="Compare">

            </form>
        </div>
        <div class="col">
        </div>
    </div>
</div>

</body>
</html>
