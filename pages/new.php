<?php 
    $db->checkInput();
    $db->insertInto();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/style.css">
    <title><?= $p ?></title>
</head>
<body>
    <form method="POSt">
        <input type="text" name="name" placeholder="new articles here...">
        <button type="submit">New</button>
    </form>
    <?php if (!empty($db->ErrorMessages)) :?>
        <div class="alert alert-danger"><?=$db->ErrorMessages?></div>
    <?php endif ?>    
    <?php if (!empty($db->successMessages)) :?>
        <div class="alert alert-success"><?=$db->successMessages?></div>
    <?php endif ?> 
</body>
</html>
