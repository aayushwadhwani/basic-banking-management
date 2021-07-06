<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- bootstrap link -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">

    <link rel="stylesheet" href="Styles/navbar.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" href="Styles/transaction.css?v=<?php echo time(); ?>">
    <title>Document</title>
</head>
<?php
    include('config/db_connect.php');
    $id = mysqli_real_escape_string($conn, $_GET['id']);
    $result = "";
    if (isset($_GET['id'])) {
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
    print_r($errors);
?>

<body>
    <?php include('Templates/header.php'); ?>
    <div class="container-fluid w-75 bg-light text-dark mt-5">
        <div class="row p-3">
            <div class="col-4 text-center">
                <h4>From: <?php echo $infoOfSender['username']; ?> </h4>
            </div>
            <div class="col-4">
                <h4>Current Balance: Rs. <?php echo $infoOfSender['amount']; ?> </h4>
            </div>
            <div class="col-4">
                <h4>Email: <?php echo $infoOfSender['email']; ?></h4>
            </div>
        </div>
    </div>
    <div class="container w-50 text-center bg-light text-dark p-4 mt-5 ml-auto mr-auto rounded">
        <form action="transaction.php?id=<?php echo $id ?>" class="form-validation" method="POST">
            <input type="hidden" name="from" value=<?php echo $infoOfSender['email']; ?>>
            <p class="mb-0">
                <label for="email">To: (Email)</label>
            </p>
            <p class="mt-0">
                <input type="email" name="to" placeholder="maria@gmail.com">
            </p>
            <p class="text-danger"> <?php echo $errors['to']; ?> </p>
            <p class="mb-0">
                <label for="email">Amount:</label>
            </p>
            <p class="mt-0">
                <input type="number" name="amount" placeholder="12345">
            </p>
            <p class="text-danger"> <?php echo $errors['amount']; ?> </p>
            <p class="mt-0">
                <input type="submit" value="Make Transaction" name="makeTransaction">
            </p>
        </form>
        <p class="text-danger"> <span class="font-weight-bold">Note:</span> Email Should have a domain and less than 60 characters long. Also can't transfer money to <?php echo $infoOfSender['email']; ?> </p>
        <p class="text-danger"><span class="font-weight-bold">Note:</span>Amount cannot be negative. Also can't transfer money to <?php echo $infoOfSender['email']; ?> </p>
    </div>
    <?php include('Templates/footer.php'); ?>
    <script src="script/transaction-regex.js?<?php echo time(); ?>"></script>
</body>

</html>