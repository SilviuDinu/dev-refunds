<?php
/**
 * Created by PhpStorm.
 * User: silviu
 * Date: 22/07/2019
 * Time: 3:17 PM
 */
include "config.php";
$data = $_POST['date'];
$produs = $_POST['products'];
$type = $_POST['type_of_refund'];
$ticket = $_POST['ticket'];
$reason = $_POST['refund-reason'];
$feedback = $_POST['feedback'];
$github = $_POST['github'];

//echo  $data . '<br>' . $produs . '<br>'  . $type . '<br>' . $ticket . '<br>' . $reason . '<br>' . $feedback . '<br>' . $github;

if(isset($_POST['submit'])) {

    mysqli_query($con, "INSERT INTO refunds (`date` , `product`, `type_of_refund`, `ticket`, `reason`, `feedback`, `github`) VALUES ('$data', '$produs', '$type', '$ticket', '$reason', '$feedback', '$github')");
    echo '<h3>You have added the following details:</h3><br>';
    echo  $data . '<br>' . $produs . '<br>'  . $type . '<br>' . $ticket . '<br>' . $reason . '<br>' . $feedback . '<br>' . $github;
    echo '<span><br><br><button style=";background-color: #4CAF50;padding: 12px 20px;border: none;border-radius: 4px;"><a style="text-decoration: none; color:white" href="index.html"style="color: white;">Homepage</a></button>   ';
    echo '   <button style="margin: 5px 0px 0px 5px; background-color: #4CAF50;padding: 12px 20px;border: none;border-radius: 4px;"><a style="text-decoration: none; color:white" href="records.php" style="color: white;">View refunds</a></button></span>';

    $result = mysqli_query($con,"SELECT * FROM refunds WHERE `date`='$data' AND `product`='$produs' AND `type_of_refund`='$type' AND `ticket`='$ticket' AND `reason`='$reason' AND `feedback`='$feedback' AND `github`='$github'");
    //$row1 = mysqli_fetch_array($result);
    //echo $feedback;
    echo json_encode($feedback);
    var_dump($result);
   // var_dump($row1);
    if($result == null){
        echo 'null';
        var_dump($feedback);
        $run = "INSERT INTO refunds (`date` , `product`, `type_of_refund`, `ticket`, `reason`, `feedback`, `github`) VALUES ('$data', '$produs', '$type','$ticket', '$reason', '$feedback', '$github')";
        $con->query($run);
    }
$con->close();
}
?>

