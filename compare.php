<html>
<body>


<h1>My First Heading</h1>
<?php
    if (count($_POST['check_list']) == 0) {
        header('Location: ' . $_SERVER['HTTP_REFERER']);
        exit();
    }
?>
<?php
    $connection = mysqli_connect('localhost', 'root', '', 'phones');
    $elements = array("Model", "Price", "Storage", "Camera Resolution", "5G enabled", "Size of Phone", "Operating System");
    echo "<table>";
    foreach ($elements as $value) {
        $sql = "SELECT * FROM phones where ID IN (" . implode(",",$_POST['check_list']) . ")";
        $result = mysqli_query($connection, $sql);
       echo "<tr>" ;
       echo "<td> " . $value . " </td>" ;
       while($row = $result->fetch_assoc()) {
        echo "<td> " . $row[$value] . " </td>" ;
       }
       echo "</tr>";
     };
    echo "</table>";

    mysqli_close($connection);

?>
</body>
</html>