
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
<div class="overlay">
    <form method="post">
        <div class="con">
            <header class="head-form">
                <h2>Log In</h2>
                <p>login here using your username and password</p>
            </header>
            <br>
            <div class="field-set">

                <span class="input-item">
           <i class="fa fa-user-circle"></i>
         </span>
                <input class="form-input" id="txt-input" type="text" placeholder="@UserName" name="username">

                <br>
                <span class="input-item">
        <i class="fa fa-key"></i>
       </span>
                <input class="form-input" type="password" placeholder="Password" id="pwd" name="password">
                <br>

                <span>
                     <i class="fa fa-key"></i>
     </span>
                <input class="form-input" type="password" placeholder="Password" id="pwd" name="importPassword">


                <br>
<!--                <button class="log-in" name="login"> Log In</button>-->
                <button class="btn submits sign-up" name="signup">Sign Up
                    <i class="fa fa-user-plus" aria-hidden="true"></i>
                </button>
            </div>

        </div>
    </form>
</div>
</body>
</html>
<?php
include_once "DataLogin.php";
include_once "Users.php";

if (isset($_POST['signup'])) {
    $name = $_REQUEST['username'];
    $pass1 = $_REQUEST['password'];
    $pass2 = $_REQUEST['importPassword'];

    if (empty($name) || empty($pass1) || empty($pass2)) {
        echo '<b>incomplete information</b>';
    } else if (!($pass1 == $pass2)) {
        echo "<b>Invalid password</b>";
    }else {
        $user = new Users($name, $pass1);
        DataLogin::addUser($user);
        header('location: loginAdmin.php');
    }

}
?>

