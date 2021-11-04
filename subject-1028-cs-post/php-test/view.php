<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.1.3/css/bootstrap.min.css">
    <title>PHP TEST</title>
</head>

<body>
    <h3 class="alert alert-primary">掲示板</h3>
    <div id="base" class="m-4">
        <form method="POST" action="<?= $_SERVER['PHP_SELF'] ?>">
            <input type="text" name="personal_name"><br><br>
            <textarea name="contents" rows="8" cols="40"></textarea><br><br>
            <input type="submit" name="send" value="投稿">
        </form>

        <?php readData(); ?>

    </div>
</body>

</html>