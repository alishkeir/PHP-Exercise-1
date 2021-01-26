<?php
$fullnameErr = $usernameErr = $passwordErr = $confirmpasspassErr = $emailErr = $phoneErr = $birthdatedateErr = $nssfErr =
    '';
$fullname = $username = $password = $confirmpasspass = $email = $phone = $birthdate = $nssf =
    '';
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (empty($_POST['fullname'])) {
        $fullnameErr = 'Full Name is required';
    } else {
        $fullname = test_input($_POST['fullname']);
        if (!preg_match("/^[a-zA-Z-' ]*$/", $fullname)) {
            $fullnameErr = 'Only letters and white space allowed';
        }
    }
    if (empty($_POST['username'])) {
        $usernameErr = 'Username is required';
    }
    if (empty($_POST['password'])) {
        $passwordErr = 'Password is required';
    } else {
        $password = test_input($_POST['password']);
        if (strlen($password) < 8) {
            $passwordErr = 'Your Password Must Contain At Least 8 Characters!';
        }
    }
    if (empty($_POST['confirm'])) {
        $confirmpasspassErr = 'Confirmation is required';
    } else {
        $confirmpass = test_input($_POST['confirm']);
        if ($confirmpass != $password) {
            $confirmpasspassErr = 'Password does not match';
        }
    }
    if (empty($_POST['email'])) {
        $emailErr = 'Email is required';
    } else {
        $email = test_input($_POST['email']);
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $emailErr = 'Invalid email format';
        }
    }
    if (empty($_POST['phone'])) {
        $phoneErr = 'Phone Number is required';
    }
    if (empty($_POST['birth'])) {
        $birthdateErr = 'Date of Birth is required';
    }
    if (empty($_POST['security'])) {
        $nssfErr = 'Social Security Number is required';
    }
}
function test_input($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
?>

<?php $img = 'bg.jpg'; ?>
<!DOCTYPE html>
<html lang = 'en'>

<head>
<meta charset = 'UTF-8'>
<meta name = 'viewport' content = 'width=device-width, initial-scale=1.0'>
<link href = 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css' rel = 'stylesheet' />
<link href = 'https://fonts.googleapis.com/css2?family=Roboto:ital,wght@1,900&family=Ubuntu:wght@700&display=swap'
rel = 'stylesheet'>
<style type = 'text/css'>
body {
    margin: 0;
    background-image: url( '<?php echo $img; ?>' ) ;
    background-image:url( 'bg.jpg' );
    background-image: linear-gradient( 315deg, #045de9 0%, #09c6f9 74% );
    background-size: cover;
    background-repeat: no-repat;
    font-family: 'Ubuntu', sans-serif;
}

body .container {
    display: flex;
    color: white;
    justify-content: center;
    margin-top: 5%;
    text-align: center;
}

.container .login, .container .signup {
    display: flex;
    flex-direction: column;
    width: 35%;
    align-items: center;
    padding-bottom: 1%;
}

.login {
    padding-top: 5%;
    background: linear-gradient( 360deg, #1C1C1C 10%, #494949 360% );
}

.signup {
    padding-top: 5%;
    background: -webkit-linear-gradient( 360deg, #383836 10%, #4a4a4a 360% );
    background: linear-gradient( 360deg, #383836 10%, #4a4a4a 360% );
}

.login input, .signup input {
    width: 40%;
    height: 50px;
    margin: 10px;
    color: white;
}</html>

.login input:first-child {
    margin-top: 28%;
}

.login input {
    background-color: transparent;
    border: none;
    border-bottom: 2px solid #494949;
}

.signup input {
    background-color: transparent;
    border: none;
    border-bottom: 2px solid #222222;
}

input:focus {
    border-bottom: 2px solid orange;
    outline: none;
}

body .or {
    position: absolute;
    top: 80%;
    left: 48.2%;
    background-color: #045de9;
    background-image: linear-gradient( 315deg, #045de9 0%, #09c6f9 74% );
    width: 50px;
    height: 50px;
    text-align: center;
    line-height: 50px;
    border-radius: 50%;
}

::placeholder {
    color: #9d9d9d;
}

::-webkit-calendar-picker-indicator {
    filter: invert( 1 );
}
button {
    font-weight: bolder;
    font-size: 15px;
}
.login button {
    margin-top: 20px;
    width: 150px;
    height: 40px;
    border-radius: 20em;
    border: 1px solid #1f1f1f;
    background: #00B4DB;
    background: -webkit-linear-gradient( to right, #0083B0, #00B4DB );
    background: linear-gradient( to right, #0083B0, #00B4DB );
}

.signup button {
    margin-top: 20px;
    width: 150px;
    height: 40px;
    border-radius: 20em;
    border: 1px solid #383836;
    background: #00B4DB;
    background: -webkit-linear-gradient( to right, #0083B0, #00B4DB );
    background: linear-gradient( to right, #0083B0, #00B4DB );
}

button:focus {
    outline: none;
}

button:hover {
    border: 2px solid white;
}

#login, #signup {
    position: absolute;
    top: 11%;
}

#signup {
    left: 29%;
}

#login {
    right: 28%;
}

#signup, #login {
    color: white;
    font-size: 38px;
    font-weight: bolder;
}

.alert {
    color:red;
font-size:10px;
}

.result {
    position:relative;

}

            .info{
                color:purple;
                font-style:italic;
            }
            .information{
                background-color:#a3d8f4;
                margin: auto;
                width:50%;
                margin-top: 50px;
                padding-left: 30px;
                padding-top: 30px;
                padding-bottom: 30px;
                font-size: 20px;
            }
</style>

<title>Document</title>
</head>

<body style = "background-image: url ('bg.jpg')">
<div class = 'container'>

<h1 id = 'signup'>Sign Up</h1>
<form action = "<?php echo htmlspecialchars(
    $_SERVER['PHP_SELF']
); ?>" method = 'POST'  class="signup">
<input type = 'text' id = 'fullname' placeholder = 'Full Name' value="<?php echo $fullname; ?>">
 <span class="alert"> <?php echo $fullnameErr; ?></span>
<input type = 'text' id = 'username' placeholder = 'Username' value="<?php echo $username; ?>">
<span class="alert"> <?php echo $usernameErr; ?></span>
<input type = 'password' id = 'password' placeholder = 'Password' name = 'password value="<?php echo $password; ?>"'>
<span class="alert"> <?php echo $passwordErr; ?></span>
<input type = 'password' id = 'confirmpass' placeholder = 'Confirm Password'  name = 'confirmpass' value="<?php echo $confirmpass; ?>" >
<span class="alert"> <?php echo $confirmpassErr; ?></span>
<input type = 'email' id = 'email' placeholder = 'E-mail Address'  value="<?php echo $email; ?>">
<span class="alert"> <?php echo $emailErr; ?></span>
<input type = 'tel' id = 'phone' placeholder = 'Tel. Number' value="<?php echo $phone; ?>" name="phone">
<span class="alert"> <?php echo $phoneErr; ?></span>
<input type = 'text' id = 'birthdate' placeholder = 'Date of Birth' onfocus = "(this.type='date')"
onblur = "(this.type='text')" value="<?php echo $birthdate; ?>">
<span class="alert"> <?php echo $birthdateErr; ?></span>
<input type = 'text' name = 'nssf' id = 'Social Security Number' placeholder = 'Social Security Number'  value="<?php echo $nssf; ?>">
<span class="alert"> <?php echo $nssfErr; ?></span>
<button type = 'submit' value="register" name="submit">Sign Up</button>
</form>

<h1 id = 'login'>Login</h1>
<form action="safe.php" class = 'login' method = 'POST'>
<input type = 'text' id = 'username_login' name = 'username_login' placeholder = 'Username' name="username_login">
<input type = 'text' id = 'password_login'  name = 'password_login' placeholder = 'Password' name="password_login">
<button type = 'submit'>Login</button>
</form>
<span class = 'or'>Or</span>
</div>

    <?php
    $myemail = 'ali_shkeir1996@hotmail.com';
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        if ($email == $myemail) {
            echo "<div class='information'> This email is already registered, please choose another email </div>";
        } elseif (
            $fullnameErr == '' &&
            $usernameErr == '' &&
            $passwordErr == '' &&
            $emailErr == '' &&
            $phoneErr == '' &&
            $birthErr == '' &&
            $securityErr == ''
        ) {
            echo "<div class='information'>";
            echo "Hi <span class='about'>$fullname</span><br><br>'";
            echo "You username is : <span class='about'>$username</span> .<br><br>'";
            echo "You password is: <span class='about'>$password</span> .<br><br>'";
            echo "Your email is: <span class='about'>$email</span><br><br>'";
            echo "Your phone number is: <span class='about'>$phone</span><br><br>'";
            echo "Your birthday is:  <span class='about'>$birth</span>.<br><br>'";
            echo "Your social security number is: <span class='about'>$security</span><br><br>'";
            echo '</div>';
        }
    }
    ?>
        <script>
            function myFunction() {
            var pass = document.getElementById("password");
            if (pass.type === "password") {
                pass.type = "text";
            } else {
                pass.type = "password";
            }
            }
        </script>



</body>

</html></html>