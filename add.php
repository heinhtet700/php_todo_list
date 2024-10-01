<?php

require "config.php";

if($_POST) {
    $title = $_POST['title'];
    $desc = $_POST['description'];
    // $sql = "INSERT INTO todo(title, descriptionText) VALUES (:title, :descriptionText)";
    // $pdostatement = $pdo->prepare($sql);
    // $result = $pdostatement->execute(
    //     array(
    //         ':title'=>$title,
    //         ':descriptionText'=>$desc
    //     )
    // );

    $sql = "INSERT INTO todo (title, descriptionText) VALUES ('$title', '$desc')";
    $pdo->exec($sql);
    echo "<script>alert('Created successfully');window.location.href='index.php'</script>";
};
// if($result) {
//     echo "<script>alert('success')</script>";
// }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create New</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body style="padding: 20px">
    <div class="card">
    <h5 class="card-header">Create ToDo</h5>
    <div class="card-body">
       <form action="add.php" method="post">
       <div class="mb-3">
            <label for="title" class="form-label">Title</label>
            <input type="text" class="form-control" id="title" name="title" placeholder="title..." require>
        </div>
        <div class="mb-3">
            <label for="description"  class="form-label">Description</label>
            <textarea class="form-control" id="description" name="description" rows="3"></textarea>
        </div>
        <div class="mb-3">
            <button type="submit" class="btn btn-primary mb-3">Create</button>
            <a type="button" href="index.php" class="btn btn-default mb-3">Back</a>
        </div>
       </form>
    </div>
    </div>
</body>
</html>