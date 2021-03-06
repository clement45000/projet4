<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> <?= $title ?> </title> 
    <link rel="stylesheet" href="<?= URL ?>public/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?= URL ?>public/css/main.css">
</head>
<body>
    <?php include("menu.php"); //menu ?>
    <?php echo $content ?>

<script src="https://cdn.tiny.cloud/1/vmby97kegyza9ueuf6kdpnrcft9fqa1fwrlunll2yyiuk7zi/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
<script>tinymce.init({selector: '#content', height:500});</script>   
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="<?= URL ?>public/bootstrap/js/bootstrap.js"></script>
</body>
</html>