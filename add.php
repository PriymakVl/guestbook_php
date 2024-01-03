<?php
include 'functions.php';
include 'connect.php';

$author = $_POST['author'];
$text = $_POST['text'];
$date = time();

$sql = "INSERT INTO `posts`(`author`, `text`, `date`) VALUES ('$author', '$text', '$date')";

$result = mysqli_query($link, $sql);

if ($result) {
    header('Location: index.php?mess=add');
    exit;
}
else {
    header('Location: index.php?error=add');
    exit;
}


