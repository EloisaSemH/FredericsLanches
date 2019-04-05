<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Alterar</title>
        <link href="../css/estiloform.css" rel="stylesheet"/> 
    </head>
    <body>
        <form name="voltar" class="estiloForm" style="text-align: center;">
        <?php
            include_once ('conexao.php');
            
            $id = $_POST['id'];
            
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
            
            $imagembanco = "";
            $imagembanco = utf8_decode($imagembanco);
            
            $sqlconsulta = "call p_ConsultarLanchePorID('$id')";
            
            $resultado = @mysqli_query($conexao, $sqlconsulta);
                if (!$resultado) {
                } else {
                        $num = @mysqli_num_rows($resultado);
                        if ($num==0){
                            exit;		
                        }else{
                            $dados = mysqli_fetch_array($resultado);
                        }
                } 
            
            if($dados['imagem'] != "" && $nomeimagem != ""){
                unlink('../imagens/cardapio/' . $dados['imagem']);
                move_uploaded_file($imagem['tmp_name'], '../imagens/cardapio/' . $nomeimagem);
                $imagembanco = $nomeimagem;
            } elseif ($dados['imagem'] != "" && $nomeimagem == "") {
                $imagembanco = $dados['imagem'];
            } elseif ($dados['imagem'] == "" && $nomeimagem != ""){
                move_uploaded_file($imagem['tmp_name'], '../imagens/cardapio/' . $nomeimagem);
                $imagembanco = $nomeimagem;
            }            
            mysqli_close($conexao);
            
            $conexao = @mysqli_connect($host, $user, $pass, $banco)
            or die("Desculpe, houve uma falha com a conexão do banco de dados");
            
            $imagembanco = utf8_decode($imagembanco);
            
            $sqlupdate = "call p_AlterarLanche('$nome', '$descricao', '$ingredientes', '$montagem', '$tempoPrep', '$itensCombo', '$calorias', '$valor', '$imagembanco', '$id')";

            $resultado1 = @mysqli_query($conexao, $sqlupdate);
            if (!$resultado1) {
                die('<label>Desculpe, algo de errado aconteceu. Erro: ' . @mysqli_error($conexao)) . '</label><br/><br/>'; 
                echo '<input type="button" onclick="window.location='."'alteracao.php'".';" value="Voltar">';
            } else {
		echo "<label>Lanche alterado com sucesso ;)</label><br/><br/>";
                echo '<input type="button" onclick="window.location='."'alteracao.php'".';" value="Voltar">';
            } 
            
            mysqli_close($conexao);
        ?>
        </form>
    </body>
</html>
