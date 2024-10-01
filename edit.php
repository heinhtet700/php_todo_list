<?php
require "config.php";

if($_POST){
    $title = $_POST['title'];
    $desc = $_POST['description'];
    $id = $_POST['id'];

    $pdostatement = $pdo->prepare("UPDATE todo SET title = '$title', descriptionText = '$desc' WHERE id = '$id'");
    $result = $pdostatement->execute();
    
    if($result){
        echo "<script>alert('Update successfully');window.location.href='index.php'</script>";
    }
    
} else{
    $pdostatement = $pdo->prepare("SELECT * FROM todo WHERE id=".$_GET['id']);
    $pdostatement->execute();
    $result = $pdostatement->fetchAll();
    // print_r($result[0]);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Todo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body style="padding: 20px">
    <div class="card">
    <h5 class="card-header">Edit ToDo</h5>
    <div class="card-body">
       <form action="" method="post">
            <input type="hidden" name = 'id' value="<?php echo $result[0]['id']?>">
            <div class="mb-3">
                <label for="title" class="form-label">Title</label>
                <input type="text" class="form-control" id="title" name="title" value="<?php echo $result[0]['title']?>">
            </div>
            <div class="mb-3">
                <label for="description"  class="form-label">Description</label>
                <textarea class="form-control" id="description" name="description" rows="3"><?php echo $result[0]['descriptionText']?></textarea>
            </div>
            <div class="mb-3">
                <button type="submit" class="btn btn-primary mb-3">Update</button>
                <a type="button" href="index.php" class="btn btn-default mb-3">Back</a>
            </div>
       </form>
    </div>
    </div>
</body>
</html>