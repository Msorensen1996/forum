<?php ?>
<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <title>forum</title>
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
        #forum {
            min-width: 60%;
            max-width: 60%;
            text-align: center;
            height: 100%;
            background-color: lightgrey;

        }
        #form{
            text-align: center;
            margin-top: 3%;
            margin-bottom: 3%;
            background-color: lightgrey;
            min-width: 80%;
        }

    </style>
</head>
<body>
<div id="body-container" class="container">
    <?php include('includes/header.php'); ?>
</div>

<div id="forum" class="container" style="margin-top: 6%">
    <div class="row">
        <div class="col-sm-2">
            <img src="img/avatar-placeholder.gif" height="20%" width="20%"><br>
            <p>Original poster</p>
        </div>
        <div class="col-sm-10">
            <p>In leo dolor, aliquet ut elementum vitae, convallis quis massa. Fusce cursus eros a lobortis consequat. Maecenas posuere, enim vel dictum pharetra, diam felis condimentum mi, nec ultrices augue elit sed lectus. Aenean feugiat ut lacus sed molestie. Praesent in convallis ligula, id tincidunt massa. Maecenas suscipit eros nec cursus molestie. Vivamus vel quam mauris. Phasellus ligula eros, laoreet sit amet libero vel, tincidunt dictum sapien. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Aenean facilisis dictum leo ut convallis. Donec porttitor maximus augue, nec mollis risus ullamcorper sit amet.</p>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-2">
            <img src="img/avatar-placeholder.gif" height="20%" width="20%"><br>
            <p>User 1</p>
        </div>
        <div class="col-sm-10">
            <p>Vivamus sodales leo id dapibus sagittis. Morbi vestibulum viverra dolor, eget ornare ex convallis ut. Donec mollis sollicitudin justo.</p>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-2">
            <img src="img/avatar-placeholder.gif" height="20%" width="20%"><br>
            <p>Original poster</p>
        </div>
        <div class="col-sm-10">
            <p>Curabitur a quam vehicula, convallis neque at, luctus lorem.</p>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-2">
            <img src="img/avatar-placeholder.gif" height="20%" width="20%"><br>
            <p>User 2</p>
        </div>
        <div class="col-sm-10">
            <p>Maecenas ut justo nisi. Morbi lobortis metus odio, ac iaculis velit venenatis laoreet. Curabitur a quam vehicula, convallis neque at, luctus lorem. Sed luctus pharetra sem, ut congue velit auctor vitae. </p>
        </div>
    </div>
</div class="row">
<div class="col-sm-12" id="form">
<form>
    <textarea rows="6" cols="150" name="Post" style="resize: none"></textarea>
    <br>
    <input type="submit" name="submit" value="Post">
</form>
</div>
<div class="row">
    <div class="col-sm-4"></div>
    <div class="col-sm-4 text-center">
        <a href="#">previous</a>         <a href="#">1</a>        |       <a href="#">2</a>        |       <a href="#">3</a>        |       <a href="#">4</a>        |       <a href="#">5</a>        |       <a href="#">6</a>        |       <a href="#">7</a>        |       <a href="#">8</a>        |       <a href="#">9</a>        |       <a href="#">10</a>      <a href="#">Next</a>
    </div>
    <div class="col-sm-4"></div>
</div>



<?php include('includes/footer.php'); ?>
<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>
