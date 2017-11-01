<?php 

	include_once("../db/conexao.php");	
	
	$funcao = $_POST["funcao"];
	
	if($funcao == "login")
	{	
		login();
	}
	
	else if($funcao == "cadastro")
	{	
		cadastro();
	}
	
	function login(){
		
		$email = $_POST["email"];	
		
		$senha = $_POST["senha"];		

		try
		{
			$pdo = conectar();					
			
			$sql = "SELECT * FROM users WHERE user_email=?";
			
			$listar = $pdo->prepare($sql);					
			
			$listar->execute(array($email));
			
			$res = $listar->fetch(PDO::FETCH_ASSOC);
			
			$linha = $listar->rowCount();

			if($linha == 0)
			{
				$sucess = "0";
				
				echo $sucess;
				
				return 0;
			}
			
			else
			{
				session_start();
				
				$_SESSION["userId"] = $res["user_id"];
				
				$_SESSION["nomeUser"] = $res["user_name"];
				
				$_SESSION["logado"] = true;	
				
				if($senha == $res["user_password"])
				{	
					$sucess = "11";	
				}
				
				else
				{
					$sucess = "111";
				}									
			}						
		
			echo $sucess;
		} 
		
		catch(PDOException $e)
		{
			$sucess = "0";
		
			echo $sucess;
		
			return 0;
		}						

	}

	function cadastro(){
		
		$nome = $_POST["nome"];
		
		$email = $_POST["email"];
		
		$senha = $_POST["senha"];
		
		try
		{
			$pdo = conectar();								
			$sql = "SELECT user_email FROM users";
			$listar = $pdo->prepare($sql);								
			$listar->execute();
			$res = $listar->fetchAll(PDO::FETCH_ASSOC);
		}
		
		catch(PDOException $e)
		{
			$sucess = "0";
		
			echo $sucess;
		
			return 0;
		}

		foreach ($res as &$value) 
		{
			if($email == $value["user_email"])
			{
				$sucess = "01";
				
				echo $sucess;
				
				return 0;
			}
		}
		
		try
		{
			$pdo = conectar();	
			
			$sql = "INSERT INTO users(user_name, user_email, user_password, user_password_temp, user_ativado) VALUES(:nome, :email, :senha, :temp, :ativado)";
				
			$inserir = $pdo->prepare($sql);
				
			$inserir->bindValue(":nome", $nome);
				
			$inserir->bindValue(":email", $email);
				
			$inserir->bindValue(":senha", $senha);
				
			$inserir->bindValue(":temp", "");
				
			$inserir->bindValue(":ativado", 0);
				
			$inserir->execute();
			
			$sucess = "1";
				
			echo $sucess;
		} 
				
		catch(PDOException $e)
		{
			$sucess = "0";
	
			echo $sucess;
		
			return 0;
		}						
	}


?>