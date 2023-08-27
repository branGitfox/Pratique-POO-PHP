<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $p ?></title>
</head>
<body>
    <div class="container">
        <div class="title"><h1>CRUD managment</h1></div>
        <div class="form-search">
            <form method="POST">
                <div class="input-search"><input type="text" name="" id="" placeholder="Search articles here..."></div>
                <div class="submit-search"><button type="submit">Search</button></div>
            </form>
        </div>
        <div class="articles-container">
            <div class="new-button"><a href="index.php?p=new">new</a></div>
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
                                <a href="index.php?p=delete&id=<?=$data['id']?>">Delete</a>
                                <a href="index.php?p=edit&id=<?=$data['id']?>">Edit</a>
                            </td>
                        </tr>
                    <?php endforeach ?>    
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>
