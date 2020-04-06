<?php
	require_once "assets/php/Config.php";

	if(isset($_SESSION['title'])) { $title = "value='".$_SESSION['title']."'"; } else { $title = ''; }
	if(isset($_SESSION['description'])) { $description = "value='".$_SESSION['description']."'"; } else { $description =  ''; }
	if(isset($_SESSION['author'])) { $author = "value='".$_SESSION['author']."'"; } else { $author = ''; }
	if(isset($_SESSION['text'])) { $text = $_SESSION['text']; } else { $text = ''; }
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
    <a class="nav-link active" href="index.php">Voltar</a>
  </li>
</ul><br>
<div class="container">
	<?php if(isset($_SESSION['emptyCategory']) && $_SESSION['emptyCategory'] != '') { ?>
	<div class="alert alert-danger" role="alert">
  <?= $_SESSION['emptyCategory']; ?>
	</div>
<?php unset($_SESSION['emptyCategory']); } else if(isset($_SESSION['typeImage']) && $_SESSION['typeImage'] != '') { ?>
	<div class="alert alert-danger" role="alert">
  <?= $_SESSION['typeImage']; ?>
	</div>
<?php } else if(isset($_SESSION['sendNew']) && $_SESSION['sendNew'] != '') { ?>
  <div class="alert alert-success" role="alert">
  <?= $_SESSION['sendNew']; ?>
  </div>
<?php } unset($_SESSION['sendNew']) ?>
<form action="assets/class/News.class.php" enctype="multipart/form-data" method="post">
  <div class="form-group">
    <label for="title">Título</label>
    <input type="text" class="form-control" id="title" name="title" placeholder="Digite um título" required <?= $title ?>>
  </div>
  <div class="form-group">
    <label for="description">Descrição</label>
    <input type="text" class="form-control" id="description" name="description" placeholder="Digite uma descrição" required <?= $description ?>>
  </div>
  <div class="form-group">
    <label for="author">Autor</label>
    <input type="text" class="form-control" id="author" name="author" placeholder="Digite seu nome" required <?= $author ?>>
  </div>
  <div class="form-group">
    <label for="category">Categoria</label>
    <select multiple class="form-control" id="category" name="category">
      <?php
      $searchCat = $pdo->prepare("SELECT * FROM noticias_cat ORDER BY id");
      $searchCat->execute();
      while($category = $searchCat->fetch(PDO::FETCH_ASSOC)) {
      ?>
      <option value="<?= $category['id'] ?>"><?= $category['categoria'] ?></option>
	  <?php } ?>
    </select>
  </div>
  <div class="custom-file">
   <input type="file" class="custom-file-input" id="image" name="image" required>
   <label class="custom-file-label" for="image">Insira uma imagem para a notícia</label>
  </div>
  <div class="form-group">
    <label for="text">Texto</label>
    <textarea class="form-control" id="text" name="text" required><?= $text ?></textarea>
  </div>
  <button class="btn btn-success">Enviar notícia</button>
</form>
</div>
</body>
</html>