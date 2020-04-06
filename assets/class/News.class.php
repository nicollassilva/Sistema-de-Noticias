<?php 
	require_once "../php/Config.php";
class News {
	private $title;
	private $description;
	private $author;
	private $text;
	private $image;
	private $error = false;

	function __construct($title, $description, $author, $text, $image, $category) {
		$this->title = htmlspecialchars(strip_tags($title));
		$this->description = htmlspecialchars(strip_tags($description));
		$this->author = htmlspecialchars(strip_tags($author));
		$this->text = nl2br(trim(strip_tags(htmlspecialchars($text))));
		$this->image = $image;
		$this->category = (int) $category;

		if($this->category == '' || $this->category == NULL || empty($this->category)) {
			$this->error = true;
			$_SESSION['emptyCategory'] = 'A categoria não pode ficar vazia.';
			$_SESSION['title'] = $this->title;
			$_SESSION['description'] = $this->description;
			$_SESSION['author'] = $this->author;
			$_SESSION['text'] = $this->text;
			header("Location: ../../sendNew.php");
		} else {
			self::validationForm();
		}
	}

	private function validationForm() {
		global $pdo; global $config;
		if(@!preg_match("/^image\/(pjpeg|jpeg|png|gif|bmp)$/", $this->image["type"])){
			unset($_SESSION['emptyCategory']);
			$this->error = true;
			$_SESSION['typeImage'] = 'O formato da imagem não é aceito no sistema.';
			$_SESSION['title'] = $this->title;
			$_SESSION['description'] = $this->description;
			$_SESSION['author'] = $this->author;
			$_SESSION['text'] = $this->text;
			header("Location: ../../sendNew.php");
			} else {
				if(isset($_SESSION['typeImage'])) unset($_SESSION['typeImage']);
				if(isset($_SESSION['title'])) unset($_SESSION['title']);
				if(isset($_SESSION['description'])) unset($_SESSION['description']);
				if(isset($_SESSION['author'])) unset($_SESSION['author']);
				if(isset($_SESSION['text'])) unset($_SESSION['text']);
				$diretory = '../uploads/';
				preg_match("/\.(gif|bmp|png|jpg|jpeg){1}$/i", $this->image["name"], $ext);
   				$image_name = 'noticia-'.md5(uniqid(time())) . "." . $ext[1];
		        $st_image = $diretory.$image_name;
		        move_uploaded_file($this->image["tmp_name"], $st_image);
				$sql = $pdo->prepare("INSERT INTO noticias (titulo, descricao, texto, imagem, categoria, data, autor) VALUES (:ti, :d, :tx, :im, '$this->category', '{$config['time']}', :a)");
				$sql->bindParam(':ti', $this->title);
				$sql->bindParam(':d', $this->description);
				$sql->bindParam(':tx', $this->text);
				$sql->bindParam(':im', $image_name);
				$sql->bindParam(':a',$this->author);
				$sql->execute();
			}
			if($sql) {
				$_SESSION['sendNew'] = 'Noticia enviada';
				header("Location: ../../sendNew.php");
			}
	}
}


$new = new News($_POST['title'], $_POST['description'], $_POST['author'], $_POST['text'], $_FILES['image'], $_POST['category']);