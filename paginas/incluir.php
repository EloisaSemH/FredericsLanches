<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Incluir</title>
        <link href="../css/estiloform.css" rel="stylesheet"/> 
    </head>
    <body>
        <form name="voltar" class="estiloForm" style="text-align: center;">
        <?php
            include_once ('conexao.php');
            
            $nome = $_POST['nome'];
            $nome = utf8_decode($nome);
            
            $descricao = $_POST['descricao'];
            $descricao = utf8_decode($descricao);
            
            $ingredientes = $_POST['ingredientes'];
            $ingredientes = utf8_decode($ingredientes);
            
            $montagem = $_POST['montagem'];
            $montagem = utf8_decode($montagem);
            
            $tempoPrep = $_POST['tempoPrep'];
            $itensCombo = $_POST['itensCombo'];
            $calorias = $_POST['calorias'];
            $valor = str_replace(",", ".", $_POST['valor']);
            
            $imagem = $_FILES['imagem'];
            
            $nomeimagem = $imagem['name'];
            $nomeimagem = utf8_decode($nomeimagem);
            
            move_uploaded_file($imagem['tmp_name'], '../imagens/cardapio/' . $nomeimagem); 
            
            $sqlinsert = "call p_CadastrarLanche('$nome', '$descricao', '$ingredientes', '$montagem', '$tempoPrep', '$itensCombo', '$calorias', '$valor', '$nomeimagem')";
            
            $resultado = @mysqli_query($conexao, $sqlinsert);
            
            if (!$resultado) {
                die('<b>Desculpe, algo de errado aconteceu. Erro: </b>' . @mysqli_error($conexao)); 
                echo '<br/><br/><input type="button" onclick="window.location='."'inclusao.php'".';" value="Voltar">';
            } else {
                echo "Lanche cadastrado com sucesso ;)";
            } 
            mysqli_close($conexao);
        ?>
            <br/><br/><input type='button' onclick="window.location='inclusao.php';" value="Voltar">
        </form>
    </body>
</html>