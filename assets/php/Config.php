<?php 
	session_start();

	date_default_timezone_set("America/Sao_Paulo");
	setlocale(LC_ALL, "pt_BR", "pt_BR.utf-8", "portuguese");

	$config = array(
		'base' => '/',
		'hostname' => 'localhost', // seu ip local, se a porta for diferente de 80 adicione-a na frente do link, ex: localhost:8080
		'username' => 'root', // user do phpmyadmin
		'password' => '', // senha do phpmyadmin
		'dbname' => 'systemnew', // nome da database
		'time' => time()
	);

	try {

		$pdo = new PDO("mysql:host=".$config['hostname'].";dbname=".$config['dbname'], $config['username'], $config['password']);
		
	} catch(PDOException $e) {

		echo "Erro ao conectar com o banco de dados: ". $e->getMessage();

	}