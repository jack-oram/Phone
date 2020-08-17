<html>
<head>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
</head>
<body>
<div class="container">
    <div class="row">
        <div class="col">
                <h1>Phone Comparision</h1>
                <table class="table table-bordered">
                    <thead>
                    </thead>
                    <tbody>
                        <?php
                            if (count($_POST['check_list']) == 0) {
                                header('Location: ' . $_SERVER['HTTP_REFERER']);
                                exit();
                            }
                        ?>
                        <?php
                            $connection = mysqli_connect('localhost', 'root', '', 'phones');
                            $elements = array("Model", "Price", "Storage", "Camera Resolution", "5G enabled", "Size of Phone", "Operating System");
                            foreach ($elements as $value) {
                                $sql = "SELECT * FROM phones where ID IN (" . implode(",",$_POST['check_list']) . ")";
                                $result = mysqli_query($connection, $sql);
                            echo "<tr>" ;
                            echo "<th scope ='row'> " . $value . " </th>" ;
                            while($row = $result->fetch_assoc()) {
                                echo "<td> " . $row[$value] . " </td>" ;
                            }
                            echo "</tr>";
                            };

                            mysqli_close($connection);

                        ?>
                    </tbody>
                </table>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <form>
                <input type="button" class ="btn btn-primary" value="Compare More!" onclick="history.back()">
            </form>
        </div>
    </div>
</body>
</html>