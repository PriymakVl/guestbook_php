<?php

include 'functions.php';
include 'connect.php';

$sql = "SELECT * FROM `posts`";

$result = mysqli_query($link, $sql);

while($row = mysqli_fetch_assoc($result)) {
	$posts[] = $row;
} 

?>
<!DOCTYPE html>
<html lang="ru">
	<head>
		<meta charset="utf-8">  
		<title>Гостевая книга</title>
		<link rel="stylesheet" href="css/bootstrap/css/bootstrap.css">
		<link rel="stylesheet" href="css/styles.css">
	</head>
	<body>
		<div id="wrapper">
			<h1>Гостевая книга</h1>

			<?php foreach ($posts as $post): ?>
				<div class="note">
					<p>
						<span class="date"><? echo date('d.m.Y H:i:s', $post['date']); ?></span>
						<span class="name"><? echo $post['author']; ?></span>
					</p>
					<p><? echo $post['text']; ?></p>
				</div>	
			<? endforeach; ?>
			
			<? if ($_GET['mess'] == 'add'): ?>
				<div class="info alert alert-info">
					Запись успешно сохранена!
				</div>
			<? elseif ($_GET['error']  == 'add'): ?>
				<div class="alert alert-danger">
					При добалении произошла ошибка!
				</div>
			<? endif; ?>

			<div id="form">
				<form action="add.php" method="POST">
					<p>
						<input type="text" name="author" class="form-control" placeholder="Ваше имя">
					</p>
					<p>
						<textarea class="form-control" name="text" placeholder="Ваш отзыв"></textarea>
					</p>
					<p><input type="submit" class="btn btn-info btn-block" value="Сохранить"></p>
				</form>
			</div>
		</div>
	</body>
</html>

