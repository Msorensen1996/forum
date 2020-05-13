<?php


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
?>

<div id="navbar" class="row">
    <div class="col-sm-4">
        <a href="index.php">Home</a>
    </div>
    <div class="col-sm-4">

    </div>
    <div class="col-sm-2">
        <?php if ($loggedInUserName) : ?>
        <a href="new_forum.php">New Post</a>
        <?php endif; ?>
    </div>
    <div class="col-sm-2">
        <?php if ($loggedInUserName) : ?>
            <p><?= $loggedInUserName ?>     |<a HREF="logout.php">Log Out</a></p>
        <?php else: ?>
            <p>
                <a HREF="login.php">Log In</a>     |
                <a HREF="register.php">Register</a>
            </p>
        <?php endif; ?>
    </div>
