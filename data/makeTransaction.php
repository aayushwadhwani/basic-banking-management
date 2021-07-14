<?php
    include('config/db_connect.php');
    $id = "";
    // $id = mysqli_real_escape_string($conn, $_GET['id']);
    $result = "";
    if(isset($_GET['id'])) {
        if (isset($_GET['id'])) {
            global $id;
            $id  = mysqli_real_escape_string($conn, $_GET['id']);
            $query = "SELECT email,username,amount FROM users where id=$id";
            $result = mysqli_query($conn, $query);
            if ($result) {
                $infoOfSender = mysqli_fetch_assoc($result);
                // print_r($infoOfSender);
            }
            mysqli_free_result($result);
        }
        $from = $to = $amount = "";
        $to_id = "";
        $from_id = $id;
        $amount_current = $infoOfSender['amount'];
        $amount_current_to = "";
        $from = $infoOfSender['email'];
        $errors = array('to'=>'','amount'=>'');
        if (isset($_POST['makeTransaction'])) {
            echo htmlspecialchars($_POST['to']);
            if(empty($_POST['to'])){
                $errors['to'] = "Email field can't be Empty.";
            }else{
                $to = htmlspecialchars($_POST['to']);
                if(!preg_match('/^([a-zA-Z\d\.-]+)@([a-zA-Z\d-]+)\.([a-zA-Z]{2,8})(\.[a-zA-Z]{2,8})?$/',$to)){
                $errors['to'] = "Email isn't Valid.";
                }
            }
            if(empty($_POST['amount'])){
                $errors['amount'] = "Amount field can't be Empty.";
            }else{
                $amount = $_POST['amount'];
                if(!preg_match('/^[\d]+$/',$amount)){
                $errors['amount'] = "Amount isn't Valid.";
                }
            }
            if(!array_filter($errors)) {
                $query = "SELECT id,amount FROM users WHERE email='$to'";
                $result = mysqli_query($conn,$query);
                $gettingid = mysqli_fetch_assoc($result);
                if(empty($gettingid['id'])){
                    $errors['to'] = "No such user found";
                }else if($gettingid['id'] == $from_id){
                    $errors['to'] = "Cannot Transfer money to Self.";
                }else if($amount == 0){
                    $errors['amount'] = "Amount cannot to 0.";
                }else if($amount > $amount_current){
                    $errors['amount'] = "Amount Exceeded Your Current Balance.";
                }else{
                    $to_id = $gettingid['id'];
                    $amount_current_to = $gettingid['amount'];
                    $amount_current_to = $amount_current_to + $amount;
                    $amount_current = $amount_current - $amount;
                    $query = "update users set amount=$amount_current where id=$from_id";
                    $result = mysqli_query($conn,$query);
                    mysqli_free_result($result);
                    $query = "update users set amount=$amount_current_to where id=$to_id";
                    $result = mysqli_query($conn,$query);
                    mysqli_free_result($result);

                    $query = "insert into transactions(from_id,to_id,amount) values($from_id,$to_id,$amount)";
                    if(mysqli_query($conn,$query)){
                    echo "<script>alert('Transaction Successful')</script>";
                    echo "<script>window.location = 'index.php';</script>";
                    }
                }
            }
        }
    }
    // print_r($errors);
?>