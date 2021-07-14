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
<?php include("data/makeTransaction.php") ?>
<body>
    <?php include('Templates/header.php'); ?>
    <?php if(isset($_GET['id'])) { ?>
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
        <div class="container w-50 text-center bg-light text-dark p-4 m-5 ml-auto mr-auto rounded">
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
    <?php } else { ?>
        
    <?php } ?>
    <script src="script/transaction-regex.js?<?php echo time(); ?>"></script>
    <?php include('Templates/footer.php'); ?>
</body>

</html>