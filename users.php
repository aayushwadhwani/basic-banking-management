<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- bootstrap link -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css"
    integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">

    <link rel="stylesheet" href="Styles/navbar.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" href="Styles/userpage.css?v=<?php echo time(); ?>">
    <title>Users Details</title>
</head>
<?php
    $users = "";
    include('config/db_connect.php');
    $query = "SELECT * FROM users;";
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
<body>
    <?php include('templates/header.php');?>
    <div class="container-fluid width-container">
        <?php if($users) {?>
        <div class="row user-div">
            <?php foreach($users as $user){ ?>
            <div class="col-12 bg-light mt-5 mb-2 w-100 rounded">
                <div class="container text-center">
                    <div class="row justify-content-around  details-adjust">
                        <div class="col-4">
                            <span class="">Name: <?php echo $user['username'] ?></span>
                        </div>
                        <div class="col-4">
                            <span class="">Email: <?php echo $user['email']?></span>
                        </div>
                        <div class="col-4">
                            <span class="">Amount: Rs.<?php echo $user['amount']?></span>
                        </div>
                    </div>
                </div>
                <!-- <p class="details-adjust"> <span class="ml-4">Name: <?php echo $user['username'] ?></span><span class="email-span">Email: <?php echo $user['email']?></span><span class="amount-span">Amount: Rs.<?php echo $user['amount']?></span></p> -->
                <hr>
                <div class="mb-3 container text-center">
                    <div class="row justify-content around">
                        <div class="col-6">
                            <a href="info-page.php?id=<?php echo $user['id'];?>" class="info-button"><button class="btn btn-outline-info rounded">View Info</button></a>
                        </div>
                        <div class="col-6">
                            <a href="transaction.php?id=<?php echo $user['id'];?>" class="transaction-button"><button class="btn btn-outline-info rounded">Do A Transaction</button></a>
                        </div>
                    </div>
                </div>
            </div>
            <?php }?>
        </div>
        <?php }else {?>
            <h1 class="text-center m-5 text-danger font-weight-bolder">Not connected to database.</h1>
        <?php }?>
    </div>
    <?php include('templates/footer.php');?>
</body>
</html>