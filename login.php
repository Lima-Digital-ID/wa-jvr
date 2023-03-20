<?php
include_once("helper/koneksi.php");
include_once("helper/function.php");


$login = cekSession();
if($login == 1){
    redirect("index.php");
}

if(post("username")){
    $username = post("username");
    $password = post("password");

    $login = login($username, $password);
    if($login == true){
        
        redirect("index.php");
    }else{
        toastr_set("error", "Username / password salah");
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="logo.svg" rel="shortcut icon">
    <meta name="description" content="WA JVR adalah Aplikasi WhatsApp Gateway untuk para marketing atau developer yang dirancang untuk dapat memudahkan anda untuk berpromosi">
    <meta name="keywords" content="whatsapp api, whatsapp api sender, api whatsapp, whatsapp, whatsapp api free, provider api whatsapp, whatsapp api provider, gateway wa, whatsapp api gateway indonesia">
  
    <title>JVR WA - Login</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css" integrity="sha512-3pIirOrwegjM6erE5gPSwkUzO+3cTjpnV9lexlNZqvupR64iZBnOOTiiLPb9M36zpMScbmUNIcHUqKD47M719g==" crossorigin="anonymous" />
</head>

<body>
    <section id="login">
        <div class="left">
        
        </div>
        <div class="right">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-7">
                        <img class="mb-3" src="img/common/jvto.png" alt="">
                        <h4 class="font-weight-bold mb-4">Welcome to JVR WA APP <br> Sign in to continue</h4>
                        <div class="card p-4">
                            <form class="user" method="POST">
                                <label for="" class="font-weight-bold"><span class="fa fa-user mr-2"></span> Username</label>
                                <input type="text" name="username" class="form-control" placeholder='Masukkan username'>
                                <br>
                                <label for="" class="font-weight-bold"><span class="fa fa-lock mr-2"></span> Password</label>
                                <input type="password" name="password" class="form-control" placeholder='Masukkan password'>
                                <br>
                                <button class="btn-block btn btn-primary py-3 font-weight-bold">Sign In</button>
                            </form>
                        </div>
                        <p class="mt-3 text-center" style="opacity:0.3">@Copyright Java Volcano Rendezvous</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js" integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw==" crossorigin="anonymous"></script>
    <script>
        <?php

        toastr_show();

        ?>
    </script>
</body>

</html>