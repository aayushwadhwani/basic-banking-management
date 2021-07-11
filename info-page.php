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
    <link rel="stylesheet" href="Styles/info-page.css?v=<?php echo time(); ?>">
    <title>Information |</title>
</head>
<?php include("data/getInfo.php") ?>
<body>
    <?php include("Templates/header.php");?>
    <?php if($details) {?>
    <div class="container-fluid w-50 text-center bg-light font-size  p-3 text-dark mt-5">
        <p class=" mt-2 mb-2 font-weight-bolder">Customer Name: </p>
        <p class=" mt-2 mb-2"><?php echo $details['username']?></p>
        <p class=" mt-2 mb-2 font-weight-bolder">Email: </p>
        <p class=" mt-2 mb-2"><?php echo $details['email']?></p>
        <p class=" mt-2 mb-2 font-weight-bolder">Amount Remaining: </p>
        <p class=" mt-2 mb-2">Rs.<?php echo $details['amount']?></p>
        <p class=" mt-2 mb-2 font-weight-bolder">Signed up with us on: </p>
        <p class=" mt-2 mb-2"><?php echo $details['createdAt']?></p>
    </div>
    <h1 class="text-center m-5">Transaction History</h1>
    <?php if(!empty($transactionHistory[0]['id'])) { ?>
        <div class="container-fluid w-75 p-5 mx-auto">
            <div class="row p-3 rounded">
                <?php foreach($transactionHistory as $transaction) { ?>
                    <?php include("data/getTransaction.php") ?>
                    <div class="col-12 my-3 p-3 bg-light">
                        <div class="row text-center font-p">
                            <div class="col-4">
                                <span class="font-weight-bolder font-to">To: </span> <?php echo $emailOfReciever['email']; ?>
                            </div>
                            <div class="col-4">
                                <span class="font-weight-bolder span-on">On Date: </span> <?php echo $transaction['transactionDate']; ?>
                            </div>
                            <div class="col-4">
                                <span class="font-weight-bolder font-amount">Amount: </span> Rs.<?php echo $transaction['amount']; ?>
                            </div>
                        </div>
                    </div>
                <?php  } ?>
            </div>   
        </div>
    <?php } else { ?>
        <h1 class="m-5 text-center">No transactions done yet.</h1>
        <?php } ?>
    <?php } else {?>
        <h1 class="text-center m-5">No such User found</h1>
    <?php }?> 
    <?php include("Templates/footer.php");?>
</body>
</html>