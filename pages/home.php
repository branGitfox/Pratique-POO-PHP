<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./assets/style.css">
    <title><?= $p ?></title>
</head>
<body>
    <div class="container">
        <div class="title"><h1>CRUD managment</h1></div>
        <div class="form-search">
            <form method="GET">
                <div class="input-search"><input type="text" name="q" id="" placeholder="Search articles here..."></div>
                <div class="submit-search"><button type="submit">Search</button></div>
            </form>
        </div>
        <div class="new-button"><a class="new" href="index.php?p=new">new+</a></div>
        <div class="articles-container">
            
            <table>
                <thead>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Actions</th>
                </thead>
                <tbody>
                    <?php foreach($db->fetchAll() as $data):?>
                        <tr>
                            <td><?= $data['id']?></td><td><?=$data['name']?></td>
                            <td>
                                <a class="delete" href="index.php?p=delete&id=<?=$data['id']?>">Delete</a>
                                <a class="edit" href="index.php?p=edit&id=<?=$data['id']?>">Edit</a>
                            </td>
                        </tr>
                    <?php endforeach ?>    
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>
