<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Ver exclusão</title>
        <link href="../css/estiloform.css" rel="stylesheet"/> 
    </head>
    <body>
            <?php
            include_once('conexao.php');

            $id = $_POST['id'];

            $sqlconsulta = "select * from lanches where id = $id";

            $resultado = @mysqli_query($conexao, $sqlconsulta);
            if (!$resultado) {
                echo '<form name="voltar" class="estiloForm" style="text-align: center;">';
                die('Desculpe, algo de errado aconteceu. Erro:' . @mysqli_error($conexao));
                echo '<input type="button" onclick="window.location=' . "'exclusao.php'" . ';" value="Voltar"><br/><br/>';
                echo '</form>';
            } else {
                $num = @mysqli_num_rows($resultado);
                if ($num == 0) {
                    echo '<form name="voltar" class="estiloForm" style="text-align: center;">';
                    echo "Desculpe, não foi encontrado nenhum produto com esse ID.<br/><br/>";
                    echo '<input type="button" onclick="window.location=' . "'exclusao.php'" . ';" value="Voltar"><br/><br/>';
                    echo '</form>';
                    exit;
                } else {
                    $dados = mysqli_fetch_array($resultado);
                }
            }
            mysqli_close($conexao);
            ?>
        <form name="exclusao" action="excluir.php" method="post" class="estiloForm">
            <label>ID:</label><br/>
            <input type="number" value="<?php echo $dados['id']; ?>" readonly/>
            <br/><br/>

            <label>Nome do lanche:</label><br/>
            <input type="text" maxlength='80' style="width:550px" value="<?php echo utf8_encode($dados['nome']); ?>" readonly/>
            <br/><br/>

            <label>Descrição:</label><br/>
            <textarea rows='3' cols='100' style="resize: none;" readonly><?php echo utf8_encode($dados['descricao']); ?></textarea>
            <br/><br/>

            <label>Ingredientes:</label><br/>
            <textarea rows='3' cols='100' style="resize: none;" readonly><?php echo utf8_encode($dados['ingredientes']); ?></textarea>
            <br/><br/>

            <label>Montagem:</label><br/>
            <textarea rows='3' cols='100' style="resize: none;" readonly><?php echo utf8_encode($dados['montagem']); ?></textarea>
            <br/><br/>

            <label>Tempo de preparo:</label><br/>
            <input type="time" value="<?php echo $dados['tempoPrep']; ?>" readonly/>
            <br/><br/>

            <label>Itens do combo:</label><br/>
            <textarea rows='3' cols='100' style="resize: none;" readonly><?php echo utf8_encode($dados['itensCombo']); ?></textarea>
            <br/><br/>

            <label>Calorias:</label><br/>
            <input type="text" name="calorias" value="<?php echo $dados['calorias']; ?> kcal" readonly/>
            <br/><br/>

            <label>Valor:</label><br/>
            <input type="text" name="valor" value="R$ <?php echo str_replace('.', ',', $dados['valor']); ?>" readonly/>
            <br/><br/>

            <label>Imagem:</label><br/>
            <?php if (file_exists('../imagens/cardapio/' . $dados['imagem']) && $dados['imagem'] != '') { ?>
                <img src="../imagens/cardapio/<?php echo $dados['imagem'] ?>"/>
            <?php } else { ?>
                <img src="../imagens/cardapio/erro.jpg"/>
            <?php } ?>
            <br/><br/>        
            <input type='hidden' name='id' value="<?php echo $dados['id']; ?>">
            <input type='submit' value='Apagar'>
            <input type='button' onclick="window.location = 'exlusao.php';" value="Voltar">
        </form>
    </body>
</html>
