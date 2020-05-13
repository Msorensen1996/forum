<?php
session_start();

require_once('db_connect.php');
$sql = "SELECT * FROM forum ORDER BY forum_id DESC";
$select = mysqli_query($conn, $sql);
?>

<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <title>My forum</title>
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
        #post {
        }

        #post {
            text-align-all: center;
            margin-top: 1%;
            margin-bottom: 1%;
            background-color: lightgrey;
        }

    </style>
</head>
<body>
<div id="body-container" class="container">
    <?php include('includes/header.php'); ?>


   </div>
<?php while ($row = mysqli_fetch_array($select,MYSQLI_ASSOC)){ ?>
    <div class="row">
        <div class="col-sm-4">

        </div>

        <div id="post" class="col-sm-4 text-center">
          <tr>
                <td>Author:<?php echo $row['author']; ?></td><br>
                <td><a href="forum_post.php?id=<?php echo $row['forum_id']; ?>">View</a><BR></td>
                <td>Title: <?php echo $row['forum_name']; ?></td><br><br>
            </tr>
        <tr>
            <td>
                <?php echo $row['body'] ?><br>
            </td>
        </tr>
            <tr>
                <td align="center">Time: <?php echo $row['time']; ?></td>
            </tr>
        </div>
        <?php } ?>
    </div>


        <?php include('includes/footer.php'); ?>


<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>