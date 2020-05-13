<?php
session_start();

require_once ('db_connect.php');

$loginError = false;

if (isset($_POST['submit'])) {
    $loginError = true;
    if (isset($_POST['email']) && isset($_POST['password'])) {
        $email = mysqli_real_escape_string($conn, $_POST['email']);
        $password = mysqli_real_escape_string($conn, $_POST['password']);

        $sql = "SELECT * FROM users WHERE email = ?;";

        $stmt = mysqli_prepare($conn,$sql);

        mysqli_stmt_bind_param($stmt,"s",$email);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);

        if (mysqli_num_rows($result) == 1){
            $row = mysqli_fetch_assoc($result);
            if(password_verify($password,$row['password'])){
                $_SESSION['user_id'] = $row['id'];
                header("Location: index.php");
                die();
            }
        }
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
    <title>login</title>
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
        <h1>Welcome. Please Login.</h1>
    </div>
    <div class="col-sm-2"></div>
</div>
<div class="row">
    <div class="col-sm-2"></div>
    <div id="form" class="col-sm-8" text-center>
        <form method="POST" aline="center">
            <?php if($loginError): ?>
                <p>Invalid email address or password.</p>
            <?php endif; ?>
            <label for="email">Email Address:</label> <br>
            <input type="email" id="email" name="email">
            <br>
            <label for="password">Password:</label> <br>
            <input type="password" id="password" name="password">
            <br>
            <input type="checkbox" name="remember" value="True" checked> Remember Me<br>
            <br>
            <input type="submit" name="submit" value="Login">
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