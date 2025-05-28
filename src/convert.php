<html>
<head>
<link href="stile.css" type="text/css" rel="stylesheet"/>
</head>
<body>
<div id="wrapper">

<div id="html_div">
<?php

include('connect.php');




$tables = array();

$result = mysqli_query($conn,"SHOW TABLES");
while ($row = mysqli_fetch_row($result)) {
    $tables[] = $row[0];

    echo $row[0]."   ";
}







?>
</div>

</div>
</body>


</html>

