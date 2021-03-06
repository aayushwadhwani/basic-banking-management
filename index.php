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

    <!-- fonts  -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+JP&display=swap" rel="stylesheet">
    
    <title>Home Page</title>
</head>
<body>
    <?php include('Templates/header.php'); ?>
    <div class="row width m-auto p-5">
        <div class="col-6 mt-5">
            <div class="container text-center">
                <h1 class="m-2">
                    Hello Users
                </h1>
                <h3 class="mb-5">
                    A Basic Banking Management System
                </h3>
            </div>
            <div class="p-5">
                <h2>
                    <span class="mr-2" ><i class="fas fa-clipboard-list"></i></span>
                    Highlighted Feactures
                </h2>
                <ul class="list-unstyled font-weight-bold text-left" >
                    <li><span class="mr-4"><i class="fas fa-check"></i></span>User Creation</li>
                    <li><span class="mr-4"><i class="fas fa-check"></i></span>See All Users</li>
                    <li><span class="mr-4"><i class="fas fa-check"></i></span>Do A transaction</li>
                    <li><span class="mr-4"><i class="fas fa-check"></i></span>User-Info-Page</li>
                    <li><span class="mr-4"><i class="fas fa-check"></i></span>transaction-History</li>
                </ul>
            </div>
        </div>
        <div class="col-6 text-center">
            <img src="img/home.svg" alt="" width="500" height="500">
        </div>
    </div>
    <?php include('Templates/footer.php'); ?>
    <script src="https://kit.fontawesome.com/56bbfc97eb.js" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js?v=<?php echo time(); ?>"
    integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj"
    crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js?v=<?php echo time(); ?>"
    integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN"
    crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.min.js?v=<?php echo time(); ?>"
    integrity="sha384-+YQ4JLhjyBLPDQt//I+STsc9iw4uQqACwlvpslubQzn4u2UU2UFM80nGisd026JF"
    crossorigin="anonymous"></script>
</body>
</html>
