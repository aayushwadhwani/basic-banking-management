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
    <link rel="stylesheet" href="Styles/transaction.css?v=<?php echo time(); ?>">
    <title>Document</title>
</head>
<body>
    <?php include('Templates/header.php');?>
    <div class="container-fluid w-75 bg-light text-dark mt-5">
        <div class="row p-3">
            <div class="col-4 text-center">
                <h4>From: Aayush Wadhwani</h4>
            </div>
            <div class="col-4">
                <h4>Current Balance: Rs.100000000</h4>
            </div>
            <div class="col-4">
                <h4>Email: aayush@gmail.commmmm</h4>
            </div>
        </div>
    </div>
    <div class="container w-50 text-center bg-light text-dark p-4 mt-5 ml-auto mr-auto rounded">
        <form action="">
            <input type="hidden" value=1235 >
            <p class="mb-0">
                <label for="email ">To: (Email)</label>
            </p>
            <p class="mt-0">
                <input type="email" placeholder="maria@gmail.com">
            </p>
            <p class="mb-0">
                <label for="email ">Amount:</label>
            </p>
            <p class="mt-0">
                <input type="number" placeholder="12345">
            </p>
            <p class="mt-0">
                <input type="submit" value="Make Transaction">
            </p>
        </form>   
    </div>
    <?php include('Templates/footer.php');?>
</body>
</html>