<?php
    $users = "";
    include('config/db_connect.php');
    $query = "SELECT * FROM users order by username;";
    $result = mysqli_query($conn,$query);
    if($result){
        $users = mysqli_fetch_all($result,MYSQLI_ASSOC);
    }else{
        // echo "Query error: ".mysqli_error($conn);
        $users = false;
    }
    mysqli_free_result($result);
    mysqli_close($conn);
?>