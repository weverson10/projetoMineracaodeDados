<?php 
include_once("db/conexao.php");

	$FormularioCompletoQuestoes = $_POST["FormularioCompletoQuestoes"];
	
	$FormularioCompleto = $_POST["FormularioCompleto"];
	
	$FormularioCompletoX = str_replace('|', ' ', $FormularioCompleto);
	
	$FormularioCompletoTitulo = $_POST["FormularioCompletoTitulo"];
	
	$FormularioQuantidadeCheckbox = $_POST["FormularioQuantidadeCheckbox"];

	if($FormularioCompletoX == "")
	{
		
		return false;
		
		header("location:menu-usuario.php");	
		
	}
	
	else
	{
		try
		{
			$pdo = conectar();
			
			$sql = "INSERT INTO forms(form_id, form_titulo, form_conteudo, form_questoes, form_checkbox) VALUES(:form_id, :form_titulo, :form_conteudo, :form_questoes, :form_checkbox)";
			
			$insert = $pdo->prepare($sql);	
			
			$insert->bindValue(":form_id", 0);
				
			$insert->bindValue(":form_titulo", $FormularioCompletoTitulo);	
			
			$insert->bindValue(":form_conteudo", $FormularioCompletoX);
			
			$insert->bindValue(":form_questoes", $FormularioCompletoQuestoes);
			
			$insert->bindValue(":form_checkbox", $FormularioQuantidadeCheckbox);
			
			$insert->execute();
			
		} 
		catch(PDOException $e)
		{
			echo "Erro: " . $e->getMessage();
		}
	}
	
	header("location:menu-usuario.php");	
?>