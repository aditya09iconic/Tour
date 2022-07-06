<?php
$showAlert = false;
$showError = false;
if($_SERVER["REQUEST_METHOD"] == "POST"){
    include '_dbconnect.php';
    $username = $_POST["username"];
    $email =$_POST["email"];
    $password = $_POST["pass"];
    $cpassword = $_POST["cpass"];
    // $exists=false;

    // Check whether this username exists
    $existSql = "SELECT * FROM `login` WHERE username = '$username'";
    $result = mysqli_query($conn, $existSql);
    $numExistRows = mysqli_num_rows($result);
    if($numExistRows==1){
        // $exists = true;
        $showError = "Username Already Exists";
    }
    else{
        if(($password == $cpassword)){
            $sql = "INSERT INTO `login` ( `username`, `email`, `password`, `dt`) VALUES ( '$username', '$email', '$password', current_timestamp())";
            $result = mysqli_query($conn, $sql);
            if ($result){
                $showAlert = true;
            }
        }
        else{
            $showError = "Passwords do not match";
        }
    }
}
    
?>

<!DOCTYPE html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="utf-8">
    <title> Sign Up Form</title>
    <link rel="shortcut icon" href="/assets/favicon.ico">
    <link rel="stylesheet" href="login.css">
   
</head>
<body>
    <div class="container">
    <?php
    if($showAlert){
    echo ' <div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Success!</strong> Your account is now created and you can <a href="login.php">Login</a>
    </div> ';
    }
    if($showError){
    echo ' <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong>Error!</strong> '. $showError.'
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div> ';
    }
    ?>
        <form class="form" id="createAccount" action="signup.php" method="post">
            <h1 class="form__title">Create Account</h1>
            <div class="form__message form__message--error"></div>
            <div class="form__input-group">
                <input type="text" id="signupUsername" name="username" class="form__input" autofocus placeholder="Username"  required>
                <div class="form__input-error-message"></div>
            </div>
            <div class="form__input-group">
                <input type="email" class="form__input" name="email" autofocus placeholder="Email Address" required>
                <div class="form__input-error-message"></div>
            </div>
            <div class="form__input-group">
                <input type="password" class="form__input" name="pass" autofocus placeholder="Password" required>
                <div class="form__input-error-message"></div>
            </div>
            <div class="form__input-group">
                <input type="password" class="form__input" name="cpass" autofocus placeholder="Confirm password" required>
                <div class="form__input-error-message"></div>
            </div>
            <button class="form__button" type="submit">Continue</button>
            <p class="form__text">
                <a class="form__link" href="login.php" id="linkLogin">Already have an account? Sign in</a>
            </p>
        </form>
    </div>
    <script src="js/login.js"></script>
</body>