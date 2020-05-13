<?php
if (isset($_SESSION)) {
    session_destroy();
}
require_once('db_connect.php');

$errors = [];
if (isset($_POST['submit'])) {
    if (empty($_POST['email'])) {
        $errors[] = 'please enter an email address';
    }
    if(strlen($_POST['email']) >512) {
        $errors[] = 'please enter a valid email';
    }
    if (empty($_POST['password'])) {
        $errors[] = 'please enter an password';
    }
    if (empty($_POST['confirmPassword'])) {
        $errors[] = 'please confirm password';
    }
    if ($_POST['password'] != $_POST['confirmPassword']) {
        $errors[] = 'passwords do not match';
    }
    if (empty($_POST['lastName'])) {
        $errors[] = 'please enter an last name';
    }
    if (strlen($_POST['lastName']) >40) {
        $errors[] = 'please enter an valid last name';
    }
    if (empty($_POST['firstName'])) {
        $errors[] = 'please enter an first name';
    }
    if (strlen($_POST['firstName']) >30) {
        $errors[] = 'please enter an valid first name';
    }
    if (empty($_POST['user_name'])) {
        $errors[] = 'please enter an user name';
    }
    if (strlen($_POST['user_name']) >30) {
        $errors[] = 'please enter an valid user name';
    }
if(!count($errors)) {
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $firstName = mysqli_real_escape_string($conn, $_POST['firstName']);
    $lastName = mysqli_real_escape_string($conn, $_POST['lastName']);
    $username = mysqli_real_escape_string($conn, $_POST['user_name']);

    $bcrypt_options = [
        'cost' => 12,
    ];
    $hashedPassword = password_hash($_POST['password'], PASSWORD_BCRYPT, $bcrypt_options);

    $sql = "INSERT INTO users (email, first_name, last_name, username, password) VALUES (?,?,?,?,?)";

    $stmt = mysqli_prepare($conn, $sql);

    mysqli_stmt_bind_param($stmt, "sssss", $email, $firstName, $lastName, $username, $hashedPassword);

    mysqli_stmt_execute($stmt);

    $result = mysqli_stmt_get_result($stmt);

    header('Location: login.php');
    die();
}

}
?>

<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <title>Register</title>
    <style>
        body {
            background-color: gray;

        }

        #body-container {
            min-width: 80%;
            max-width: 80%;
            min-height: 100%;
            height: 100%;
            margin: auto;
            background-color: white;
        }
        #form{
            text-align: center;
            margin-top: 4%;
            margin-bottom: 4%;
            background-color: lightgrey;
        }
        #heading {
            text-align: center;
        }

    </style>
</head>

<body>
<div id="body-container" class="container">
    <?php include('includes/header.php'); ?>
</div>
    <div id="heading" class="row">
        <div class="col-sm-2"></div>
        <div class="col-sm-8" text-center>
            <h1>Welcome. Please register.</h1>
        </div>
        <div class="col-sm-2"></div>
    </div>
    <div class="row">
    <div class="col-sm-2"></div>
    <div id="form" class="col-sm-8" text-center>

        <?php if (count($errors)) : ?>
            <ul>
                <?php foreach ($errors as $error): ?>
                    <li><?= $error; ?></li>
                <?php endforeach; ?>
            </ul>
        <?php endif; ?>

    <form method="POST" aline="center">
        <label for="email">Email Address:</label> <br>
        <input type="email" id="email" name="email">
        <br>
        <label for="user_name">User Name:</label><br>
        <input type="user_name" id="user_name" name="user_name">
        <br>
        <label for="password">Password:</label> <br>
        <input type="password" id="password" name="password">
        <br>
        <label for="confirmPassword">Confirm Password:</label> <br>
        <input type="Password" id="confirmPassword" name="confirmPassword">
        <br>
        <label for="firstName">First Name:</label><br>
        <input type="firstName" id="firstName" name="firstName">
        <br>
        <label for="lastName">Last Name:</label><br>
        <input type="lastName" id="lastName" name="lastName">
        <br>
        <input type="checkbox" name="terms" value="True" checked> I Agree to the terms<br>
        <br>
        <input type="submit" name="submit" value="Register">
    </form>
    </div>
        <div class="col-sm-2"></div>
    </div>
</div>



    <?php include('includes/footer.php'); ?>
<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>