<html>
<body>

Welcome 
<?php
    foreach($_POST['check_list'] as $selected) {
        echo "<p>".$selected ."</p>";
    }


?><br>

</body>
</html>