<?php
session_start();

require_once('db_connect.php');
$loggedInUserName = false;
if (isset($_SESSION['user_id'])) {
    $userId = mysqli_real_escape_string($conn,$_SESSION['user_id']);

    $sql = "SELECT * FROM users WHERE id = $userId";
    $result = mysqli_query($conn, $sql);
    if ($result) {
        $matchedUser = mysqli_fetch_assoc($result);
        $loggedInUserName = $matchedUser['first_name'];
    }
}
$date = date_create();
$dateString = $date->format('Y-m-d H:i:s');
$errors = [];
if (isset($_POST['submit'])) {
    if (empty($_POST['title'])) {
        $errors[] = 'please enter an title';
    }
    if (strlen($_POST['title']) >60) {
        $errors[] = 'please enter an valid title';
    }
    if (empty($_POST['contents'])) {
        $errors[] = 'please enter an password';
    }
if(!count($errors)) {
    $title = mysqli_real_escape_string($conn, $_POST['title']);
    $body = mysqli_real_escape_string($conn, $_POST['contents']);
    $sql = "INSERT INTO forum (forum_name, body, time, author) VALUES ('$title','$body','$dateString','$loggedInUserName')";

    $stmt = mysqli_prepare($conn, $sql);

    mysqli_stmt_bind_param($stmt, "ssss", $title, $body, $dateString, $loggedInUserName);

    mysqli_stmt_execute($stmt);

    $result = mysqli_stmt_get_result($stmt);

    header('Location: index.php');
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
    <title>New Forum</title>
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
            min-width: 80%;
        }

    </style>
</head>
<body>
<div id="body-container" class="container">
    <?php include('includes/header.php'); ?>
</div>
<div class="row">

    <div id="form" class="col-sm-12" text-center>
        <?php if (count($errors)) : ?>
            <ul>
                <?php foreach ($errors as $error): ?>
                    <li><?= $error; ?></li>
                <?php endforeach; ?>
            </ul>
        <?php endif; ?>
        <form method="POST" aline="center">
            <label for="title">Title:</label> <br>
            <input type="text" id="text" name="title">
            <br>
            <label for="textarea">Forum Contents:</label> <br>
            <textarea name="contents" rows="6" cols="150" style="resize: none"></textarea>
            <br>
            <input type="submit" name="submit" value="Post">
        </form>
    </div>
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
