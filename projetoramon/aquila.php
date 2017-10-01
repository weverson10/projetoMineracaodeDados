<?php include_once("conf/restricao.php");?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <!-- ========== Título ============ -->
    <title>Formulários</title>

    <!-- ========== Metas ============ -->
    <meta charset="utf-8">

    <!-- ========== Links ============ -->
    <link rel="stylesheet" href="css/formularios.css">
    <link rel="icon" href="img/icon.png">

    <!-- ========== Scripts ============ -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="js/sistema.js"></script>    
</head>


<body>
    <!-- ======== Cabeçalho ========== -->
    <header id="cabecalho">
        <a href="menu-usuario.php"><button class="botao btnBackMenu" title="">Área do Usuário</button></a>
        <button class="botao btnEnviar" name="enviar">Enviar</button>
    </header><!-- ======== Fim do cabeçalho ==========-->

    <!-- ====== container ====== -->
    <div class="container">
        <div class="area" align="center"><br>
            <h1>Seu formulário</h1><br>
        </div>

        <!-- ============== Campo de Título ===============-->
        <form class="titulo" >
            <input type="text" name="titulo" id="titulo" placeholder="Título do formulário" maxlength="30"><br><br>
            <input type="text" name="descricao" id="descricao" placeholder="Descrição do formulário" maxlength="30"><br><br>            
        </form><br><br>

        <!-- ============== Campo de resposta ===============-->
        <div class="questoes" id="divPergunta">
			
			<input type="text" name="pergunta" id="pergunta" placeholder="Pergunta">
				
			<select name="selecionar" id="selecionar">
				
				<option id="1" name="1" value="1">Tipo de resposta</option>
				
				<option id="2" name="2" value="2">Campo de texto</option>
				
				<option id="3" name="3" value="3">Multipla escolha</option>
				
			    <option id="4" name="4" value="4">Caixas de Seleção</option>
			
			</select>
				
			<br>
			
		</div>

        <div class="barra-inferior" id="menu">
            <div class="area-botoes">
                <img src="img/Defult Text.png" class="dublicar" id="duplicar" title="adicionar uma pergunta">      
                <img src="img/delete_remove_bin_icon-icons.com_72400.png" class="excluir" id="exclusao" title="excluir a ultima pergunta adicionada">
            </div>
        </div><!-- Fim da barra inferior -->
    </div><!-- Fim do container -->

    <div id="base" class="container"></div>		
		<div id="escondido">			
			<form name="EnviarFormulario" id="EnviarFormulario" method="post" action="teste.php">
				<input name="FormularioCompleto" id="FormularioCompleto" type="hidden" value="">
			</form>
		</div>

</body>

</html>