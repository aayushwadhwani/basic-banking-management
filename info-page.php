<?php
    include('config/db_connect.php');
    $details = "";
    if(isset($_GET['id'])){
        $id = mysqli_real_escape_string($conn,$_GET['id']);
        $query = "SELECT * FROM users WHERE id=$id";
        $result = mysqli_query($conn,$query);
        if($result){
            $details = mysqli_fetch_assoc($result);
            print_r($details);
        }else{
            echo "Query Error: ".mysqli_error($conn);
        }
    }
    mysqli_free_result($result);
    mysqli_close($conn);
?>

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
    <title>Information | </title>
</head>
<body>
    <?php include("Templates/header.php");?>
    <?php if($details) {?>
    <div class="container w-50 text-center bg-light font-size  p-3 text-dark mt-5">
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
    <div class="container p-5">
        <div class="row bg-success p-3 rounded">
            <div class="col-12 m-auto">
                <div class="row text-center font-p">
                    <div class="col-4">
                        <span class="font-weight-bolder font-to">To: </span> aayush@gmail.com
                    </div>
                    <div class="col-4">
                        <span class="font-weight-bolder span-on">On Date: </span>11/11/1111 11:11:11
                    </div>
                    <div class="col-4">
                        <span class="font-weight-bolder font-amount">Amount: </span> Rs.10000
                    </div>
                </div>
                <!-- <p class="m-3 font-p"><span class="font-weight-bolder font-to">To: </span> aayush@gmail.com <span class="font-weight-bolder span-on">On Date: </span>11/11/1111 11:11:11<span class="font-weight-bolder font-amount">Amount: </span> Rs.10000</p> -->
            </div>
        </div>   
    </div>
    <?php } else{?>
        <h1 class="text-center m-5">No such User found</h1>
    <?php }?> 
    <?php include("Templates/footer.php");?>
</body>
</html>