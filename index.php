<?php
require "config.php";

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>To Do Home Page</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body style="padding: 20px;">
    <?php
        $pdostatement = $pdo->prepare("SELECT * FROM todo ORDER BY id DESC");
        $pdostatement->execute();
        $result = $pdostatement->fetchAll();
    ?>
    <div class="card">
        <div class="card-body">
            <h2>Home Page</h2>
            <a type="button" class="btn btn-success" href="add.php">Create Todo</a>
            <table class="table table-striped">
               <thead>
                <tr>
                    <th>ID</th>
                    <th>Title</th>
                    <th>Description</th>
                    <th>Created</th>
                    <th>Action</th>
                </tr>
               </thead>
               <tbody>
                <?php
                if($result) {
                    $i = 1;
                    foreach ($result as $value) {
                ?>
                <tr>
                    <td><?php echo $i?></td>
                    <td><?php echo $value['title'];?></td>
                    <td><?php echo $value['descriptionText'];?></td>
                    <td><?php echo date('Y-m-d', strtotime($value['created_at']))?></td>
                    <td>
                        <a type="button" class="btn btn-danger" href="edit.php?id=<?php echo $value['id']?>">Edit</a>
                        <a type="button" class="btn btn-warning" href="delete.php?id= <?php echo $value['id']?>">Delete</a>
                    </td>
                </tr>
                <?php
                $i++;
                    }
                }
                ?>
               </tbody>
            </table>
        </div>
    </div>
</body>
</html>