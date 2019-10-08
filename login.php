<?php 
session_start();
if($_SESSION['txtun']){
    header('Location: index.php');
}
include_once("model/user.php");
$user=null;
// if(isset($_SESSION['txtus']))
if($_SERVER["REQUEST_METHOD"] == 'POST'){
    $username = $_REQUEST['txtun'];
    $password = $_REQUEST['txtpw'];
    $user = User::authentication($username,$password);
    if($user!=null){
        $_SESSION['txtun'] = $username;
        $_SESSION['txtpw'] = $password;
        header('Location: index.php');
        $information = "Đăng nhập thành công rồi đó th lo".$user->fullname;
    }else{
        $information = "Đăng nhập thất bại";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<style>
    .button-color {
        background-color: #4287f5;
        color: white;
        width: 150px;
        height: 30px;
    }

    .background-color-form{
        background-color: #c9c9c9;
        border-radius: 7px;
    }

    .text-input{
        margin-top: 10px
    }
    .center-al{
        font-size: 12px;
    }

</style>

<body>
    <div class="row">
        <div class="col-md-5">
        </div>
        <div class=" col-md-2 text-center background-color-form">
            <form action="" method="POST">
                <input class="text-input" type="text" name="txtun" placeholder="Username"> <br>
                <input class="text-input" type="password" name="txtpw" placeholder="Password"> <br>
                <input type="checkbox" name="rememberPasswordCB"> Remember Password <br>
                <button class="button-color" type="submit">Login</button><br>
                <?php
                    echo $information;
                ?>
                <br>
                <a href="#" class="center-al"> Register an Account</a><br>
                <a href="#" class="center-al"> Forgot Password?</a><br>
            </form>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>

</html>