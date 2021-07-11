<?php 
    $to_id = $transaction['to_id'];
    $query = "SELECT email from users where id=$to_id";
    $result = mysqli_query($conn,$query);
    $emailOfReciever = mysqli_fetch_assoc($result);
?>