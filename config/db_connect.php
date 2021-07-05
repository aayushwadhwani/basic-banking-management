<?php
    $conn = mysqli_connect('localhost','Bank Manager','Manager@Manager','banking-management');
    if(!$conn){
        echo "Connection error: ".mysqli_error($conn);
    }
else{
    echo "wohoo ! connection successful.";
}
?>