<!DOCTYPE html>
<html lang="en">
<head>
<link href = 'https://fonts.googleapis.com/css2?family=Roboto:ital,wght@1,900&family=Ubuntu:wght@700&display=swap'
rel = 'stylesheet'>
<style type = 'text/css'>
body {
    margin: 0;
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

h2{
color: black;
font-size:5rem;
text-align:center;
}
    </style>
    <meta charset="UTF-8">
    <title>Login</title>
</head>
<body>
<?php
$username = 'alishkeir';
$password = 'alishk1020';

if ($_POST['user'] != $username) {
    echo '<h2> Wrong username</h2>';
} elseif ($_POST['pass'] != $password) {
    echo '<h2> Wrong password</h2>';
} else {
    echo '<h2>Successful</h2>';
}
?>
</body>
</html>
