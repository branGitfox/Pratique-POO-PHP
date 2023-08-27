<?php 
$data = $db->recupArticle();
$db->Update();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
    <link rel="stylesheet" href="./assets/style.css">
    <title><?= $p ?></title>
</head>
<body>
    <form method="POST">
        <input type="text" name="modif" value="<?= $data['name']?>">
        <button type="submit">Edit</button>
    </form>     
</body>
</html>

