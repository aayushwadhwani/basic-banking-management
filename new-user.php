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

    <!-- fonts  -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+JP&display=swap" rel="stylesheet">
    <title>Document</title>
</head>
<?php include("data/createUser.php"); ?>
<body>
    <?php include "Templates/header.php"; ?>
    <div class="bg-light container p-3 mt-5 mb-5 w-50">
        <div class="text-center p-4">
            <form action="new-user.php" method="POST" class="form-validation">
                <p class="mb-0">
                    <label for="name">Name:</label>
                </p>
                <p class="mt-0">
                    <input type="text" name="name" placeholder="John Cena">
                </p>
                <p class="text-danger"> <?php echo $errors['name']; ?> </p>
                <p class="mb-0">
                    <label for="email">Email:</label>
                </p>
                <p class="mt-0">
                    <input type="email" name="email" placeholder="john.cena@gmail.com">
                </p>
                <p class="text-danger"> <?php echo $errors['email']; ?> </p>
                <p class="mb-0">
                    <label for="amount">Amount:</label>
                </p>
                <p class="mt-0">
                    <input type="number" name="amount" placeholder="1000">
                </p>
                <p class="text-danger"> <?php echo $errors['amount']; ?> </p>
                <p class="mt-0">
                    <input type="submit" value="Add" name="create-User">
                </p>
            </form>
        </div>
    </div>
    <?php include "Templates/footer.php"; ?>
    <script src="script/transaction-regex.js"></script>
</body>
</html>