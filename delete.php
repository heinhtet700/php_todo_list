<?php

require "config.php";
if($_GET){
    $pdostatement = $pdo->prepare("DELETE FROM todo WHERE id=".$_GET['id']);
    $result = $pdostatement->execute();

    if($result){
        echo "<script>alert('Delete successfully');window.location.href='index.php'</script>";
    }
}
?>