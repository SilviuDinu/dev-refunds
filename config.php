<?php
try {
    $mysqli = new mysqli("localhost", "root", "");
} catch (\Exception $e) {
    echo $e->getMessage(), PHP_EOL;
}
if ($mysqli->select_db('refunds') === false) {
    $sql = "CREATE DATABASE refunds";
    if ($mysqli->query($sql) === TRUE) {
        echo "<span id='success'>Database <b>refunds</b> created successfully</span>";
        echo "</script></head></html>";
    } else {
        echo "Error creating database: " . $mysqli->error;
    }
}

$con = mysqli_connect("localhost", "root", "", "refunds");
if (mysqli_connect_errno()) {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

$trial = mysqli_query($con, "SELECT * FROM refunds");
if ($trial == null){
    echo "non-existing table refunds";
    mysqli_query($con, "CREATE TABLE refunds (date DATE, product TEXT NOT NULL, type_of_refund TEXT NOT NULL ,ticket TEXT NOT NULL, reason TEXT, feedback TEXT, github TEXT)");
}

