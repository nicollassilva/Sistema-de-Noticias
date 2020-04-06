<?php
	require_once "assets/php/Config.php";

	$id = (int) $_GET['id'];

	$new = $pdo->prepare("SELECT * FROM noticias WHERE id = :id");
	$new->bindParam(':id', $id);
	$new->execute();
	if($new->rowCount() == 0) {
		echo "Notícia não encontrada";
	} else {
		$row = $new->fetch(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html>
<head>
	<base href="<?= $config['base'] ?>">
	<meta charset="utf-8">
	<meta http-equiv="content-language" content="pt-br">
	<meta name="author" content="Nícollas Silva">
	<meta name="copyright" content="© nicksilva">
	<meta name="description" content="Sistema de envio de Notícias feito em PHP/PDO, código livre">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Notícia: <?= $row['titulo'] ?></title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
	<link rel="stylesheet" href="assets/css/default.css">
</head>
<body>
	<ul class="nav nav-pills">
		<li class="nav-item">
		<a class="nav-link active" href="index.php">Voltar</a>
		</li>
	</ul><br>
		<div class="new">
			<div class="top">ID da notícia: <b><?= $row['id'] ?></b></div>
			<div class="top">Título: <b><?= $row['titulo'] ?></b></div>
			<div class="top">Descrição: <b><?= $row['descricao'] ?></b></div>
			<div class="top">Autor: <b><?= $row['autor'] ?></b></div>
			<div class="top">Data enviada: <b><?= date("d/m/Y \à\s H:i", $row['data']) ?></b></div>
			<div class="top"><?= $row['texto'] ?></b></div>
		</div>
<?php } ?>
</body>
</html>