<?php
require('connect.php');
$username='';
$pass='';
$resetSuccess=0;
if(isset($_GET['success'])){
    $resetSuccess=1;
}
if($resetSuccess==1){
    echo"<center><h3 style='color: red'>Password Successfully Changed!</h1></center>";
}
echo "<span style='opacity: 0'>trigger now</span>";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Network</title>
    <link rel="stylesheet" type="text/css" href="loginPage.css?ver=<?php echo rand(111,999);?>">
</head>
<body>
    <div class="formBox">
        <img src="ultFinal.jpg" alt="logo" class="image">
        <h1 data-text="ENTER JIIT NETWORK">ENTER JIIT NETWORK</h1>
        <form action="index.php" method="POST">
            <div class="inputBox">
                <input type="text" name="username" placeholder=" ">
                <label name="l-username">
                    UserName
                </label>
            </div>
            <div class="inputBox">
                <input type="password" name="pass" placeholder=" ">
                <label name="l-pass">
                    Password
                </label>
            </div>
            <div class="inputBox">
                <a href="forgotPassword.php">Forgot Password ?</a>
                <button type="submit" name="login">Login</button>
                <button type="submit" name="signup">Sign Up</button>
            </div>
        </form>
    </div>
</body>
</html>
<?php
    if($_SERVER["REQUEST_METHOD"]=="POST"){
        if(isset($_POST["login"])){
            $username=$_POST["username"];
            $pass=$_POST["pass"];
            $pass_md5=md5($pass);
            $sql="select * from userData where username='$username' and password='$pass_md5'";
            $res=$conn->query($sql);
            if($res->num_rows!=0){
                session_start();
                $_SESSION['username']=$username;
                header('Location: home.php?username='.$username);
            }
            else{
                echo"<center><h3 style='color: red'>Wrong ID or Password please try again!</h1></center>";
            }
        }
        if(isset($_POST["signup"])){
            header("Location: signup.php");
        }
    }
?>