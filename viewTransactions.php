<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Transaction History</title>
    <!-- bootstrap link -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css"
    integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">

    <link rel="stylesheet" href="Styles/navbar.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" href="Styles/transaction.css?v=<?php echo time(); ?>">
</head>
<?php include("data/getAllTransactions.php"); ?>
<body>
    <?php include("Templates/header.php") ?>
    <div class="container-fluid align-content-around w-75 text-dark mt-3 rounded text-center">
        <?php foreach($allTransactions as $transaction) { ?>
            <?php include("data/getNameFromId.php"); ?>
            <div class="row p-3 bg-light m-4">
                <div class="col-6">
                    <h4>From:  <?php echo $from_name['username']; ?> </h4>
                </div>
                <div class="col-6">
                    <h4>To: <?php echo $to_name['username']; ?> </h4>
                </div>
                <div class="col-12">
                    <hr class="bg-dark">

                </div>
                <div class="col-6 mt-2">
                    <h4>Amount: Rs. <?php echo $transaction['amount']; ?> </h4>
                </div>
                <div class="col-6 mt-2">
                    <h4>At: <?php echo $transaction['transactionDate']; ?></h4>
                </div>
            </div>
            <?php } ?>
    </div>
    <?php include("Templates/footer.php") ?> 
</body>
</html>