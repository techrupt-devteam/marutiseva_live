<?php
include('connection.php');
if(isset($_POST["area"])){
$area = $_POST["area"];
$is_active =1;

    $sql = "SELECT `contact_no` FROM `locations` WHERE `is_active` = '1' AND `area` = '".$area."'";
    $result = $conn->query($sql);
    $row=mysqli_fetch_assoc($result);
    echo $row['contact_no'];  
}
?>