<?php 
function conectar(){
	$host = "mysql:host=localhost; dbname=mineracao";
	$usuario = "root";
	$senha = "";

	try{
		$pdo = new PDO($host, $usuario, $senha);		
	} catch(PDOException $e){
		echo "Erro: " . $e->getMessage() . "<br>";
	}
	return $pdo;
}	

?>