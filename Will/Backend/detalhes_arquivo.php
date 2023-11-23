<?php


if(isset($_GET['id'])) {
    
    $id = $_GET['id'];
    header("Location: ../acompanharid.php?id=$id");
    exit();
    
} else {
    
}
?>
