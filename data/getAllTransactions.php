<?php
    include("config/db_connect.php");
    $query = "SELECT from_id,to_id,amount,transactionDate from transactions order by transactionDate";
    $result = mysqli_query($conn,$query);
    $allTransactions = mysqli_fetch_all($result,MYSQLI_ASSOC);
?>
