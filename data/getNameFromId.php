<?php 
    include("config/db_connect.php");
    $to_id = $transaction['to_id'];
    $from_id = $transaction['from_id'];
    $query = "SELECT username from users where id=$to_id";
    $result = mysqli_query($conn,$query);
    $to_name = mysqli_fetch_assoc($result);
    $from_id =  $transaction['from_id'];
    $query = "SELECT username from users where id=$from_id";
    $result = mysqli_query($conn,$query);
    $from_name = mysqli_fetch_assoc($result);
    mysqli_free_result($result);
    mysqli_close($conn);
?>
