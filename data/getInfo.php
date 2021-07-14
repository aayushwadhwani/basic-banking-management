<?php
    include("config/db_connect.php");
    $details = "";
    if(isset($_GET['id'])){
        $id = mysqli_real_escape_string($conn,$_GET['id']);
        $query = "SELECT * FROM users WHERE id=$id";
        $result = mysqli_query($conn,$query);
        if($result){
            $details = mysqli_fetch_assoc($result);
        }else{
            echo "Query Error: ".mysqli_error($conn);
        }
        $query = "SELECT * FROM transactions WHERE from_id=$id";
        $result = mysqli_query($conn,$query);
        $transactionHistory = mysqli_fetch_all($result,MYSQLI_ASSOC);
        // print_r($transactionHistory);
    }
    mysqli_free_result($result);
?>