<?php
	require_once "assets/php/Config.php";
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
	<title>Index - Notícias</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
	<link rel="stylesheet" href="assets/css/default.css">
</head>
<body>
	<ul class="nav nav-pills">
  <li class="nav-item">
    <a class="nav-link active" href="sendNew.php" style="float: left">Enviar notícia</a>
    <a class="nav-link disabled" style="width: 500px;">Sistema de envio de notícia feito em PHP / PDO</a>
  </li>
</ul><br>
<div class="content">
<?php
	$new = $pdo->prepare("SELECT * FROM noticias ORDER BY id DESC");
	$new->execute();
	while($row = $new->fetch(PDO::FETCH_ASSOC)) {

		$category = $pdo->query("SELECT categoria FROM noticias_cat WHERE id = '{$row['categoria']}'")->fetch(PDO::FETCH_ASSOC);

?>
	<div class="card">
		<img src="assets/uploads/<?= $row['imagem'] ?>" class="card-img-top" alt="Noticia-<?= $row['id'] ?>">
			<div class="card-body">
				<h5 class="card-title"><?= $row['titulo'] ?></h5>
				<p class="card-text"><?= $row['descricao'] ?></p>
			</div>
			<ul class="list-group list-group-flush">
				<li class="list-group-item">Categoria: <b><?= $category['categoria'] ?></b></li>
				<li class="list-group-item">Autor: <b><?= $row['autor'] ?></b></li>
			</ul>
		<div class="card-body">
			<a href="noticia/<?= $row['id'] ?>" class="card-link">Visualizar notícia</a>
		</div>
	</div>
<?php } ?>
</div>
</body>
</html>