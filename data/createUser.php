<?php
    include "config/db_connect.php";
    $errors = ["name"=>"", "amount"=>"", "email"=>""];
    if(isset($_POST['create-User'])){
        // print_r($_POST);
        if(empty($_POST['name'])){
            $errors['name'] = "Field cannot be empty";
        }else{
            $name = htmlspecialchars($_POST['name']);
            if(!preg_match("/^[a-zA-Z ]{2,50}$/",$name)){
                $errors['name'] = "Name is not valid";
            }
        }
        if(empty($_POST['email'])){
            $errors['email'] = "Field cannot be empty";
        }else{
            $email = htmlspecialchars($_POST['email']);
            if(!preg_match("/^([a-zA-Z\d\.-]+)@([a-zA-Z\d-]+)\.([a-zA-Z]{2,8})(\.[a-zA-Z]{2,8})?$/",$email)){
                $errors['email'] = "Email is not valid";
            }
        }
        if(empty($_POST['amount'])){
            $errors['amount'] = "Field cannot be empty";
        }else{
            $amount = htmlspecialchars($_POST['amount']);
            if(!preg_match("/^[\d]+$/",$amount)){
                $errors['amount'] = "amount is not valid";
            }else if($amount>10000){
                $errors['amount'] = "Amount cannot exceed Rs. 10000";
            }
        }

        if(!array_filter($errors)){
            $query = "select id from users where email='$email'";
            $result = mysqli_query($conn,$query);
            $idRecieved = mysqli_fetch_assoc($result);
            if(!empty($idRecieved['id'])){
                $errors['email'] = "Email already taken";
            }
        }

        if(!array_filter($errors)){
            $qeury = "insert into users(username,email,amount) values('$name','$email','$amount');";
            if(mysqli_query($conn,$qeury)){
                mysqli_free_result($result);
                mysqli_close($conn);
                echo "<script>alert('User Created')</script>";
                echo "<script>window.location = 'index.php';</script>";
            }
        }
    }
?>
