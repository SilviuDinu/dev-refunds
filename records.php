<?php

include "config.php";

$query = mysqli_query($con, "SELECT * FROM refunds");

$data = array();
while ($row = mysqli_fetch_assoc($query)) {
    $data[] = $row;
}
//echo json_encode($data);
$myfile = fopen("results.json", "w+") or die("Unable to open file!");

fwrite($myfile, json_encode($data));
fclose($myfile);
$con->close();
?>

<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="style.css">
    <meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>

<h3 style="text-align: center"><a href="index.html">Report a refund</a></h3>

<div id="wrapper">
    <div id="select" style="display: inline">
        <button style="width: auto" id="show" @click="showTable">{{ this.title }}</button>
    </div>
    <div id="temp"></div>
</div>

<script src="https://cdn.jsdelivr.net/npm/vue"></script>
<script src="assets/js/build.js"></script>
</body>
</html>

