<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        <link href="../css/estiloform.css" rel="stylesheet"/> 
    </head>
    <body>
        <?php
            include_once('conexao.php');

            $id = $_POST['id'];

            $sqlconsulta = "call p_ConsultarLanchePorID('$id')";

            $resultado = @mysqli_query($conexao, $sqlconsulta);

            if (!$resultado) {
                echo '<form name="voltar" class="estiloForm" style="text-align: center;">';
                die('Desculpe, algo de errado aconteceu. Erro:' . @mysqli_error($conexao));
                echo '<input type="button" onclick="window.location=' . "'alteracao.php'" . ';" value="Voltar"><br/><br/>';
                echo '</form>';
            } else {
                $num = @mysqli_num_rows($resultado);
                if ($num == 0) {
                    echo '<form name="voltar" class="estiloForm" style="text-align: center;">';
                    echo "Desculpe, não foi encontrado nenhum produto com esse ID.<br/><br/>";
                    echo '<input type="button" onclick="window.location=' . "'alteracao.php'" . ';" value="Voltar"><br/><br/>';
                    echo '</form>';
                    exit;
                } else {
                    $dados = mysqli_fetch_array($resultado);
                }
            }
            @mysqli_close($conexao);
        ?>
        <form name="alteracao" action="alterar.php" method="post" enctype="multipart/form-data" class="estiloForm">
            <label>ID:</label><br/>
            <input type="number"  value="<?php echo $dados['id']; ?>" name="id" readonly/>
            <br/><br/>

            <label>Nome do lanche:</label><br/>
            <input type="text" maxlength='32' style="width:550px" value="<?php echo utf8_encode($dados['nome']); ?>" name="nome"/>
            <br/><br/>
            
            <label>Descrição:</label><br/>
            <textarea rows='3' cols='100' maxlength='255' style="resize: none;" name="descricao"><?php echo utf8_encode($dados['descricao']); ?></textarea>
            <br/><br/>

            <label>Ingredientes:</label><br/>
            <textarea rows='3' cols='100' maxlength='255' style="resize: none;" name="ingredientes"><?php echo utf8_encode($dados['ingredientes']); ?></textarea>
            <br/><br/>
            
            <label>Montagem:</label><br/>
            <textarea rows='3' cols='100' maxlength='255' style="resize: none;" name="montagem"><?php echo utf8_encode($dados['montagem']); ?></textarea>
            <br/><br/>
            
            <label>Tempo de preparo:</label><br/>
            <input type="time" style="width:550px" name="tempoPrep" value="<?php echo utf8_encode($dados['tempoPrep']); ?>"/>
            <br/><br/>
            
            <label>Itens do combo:</label><br/>
            <textarea rows='3' cols='100' maxlength='255' style="resize: none;" name="itensCombo" ><?php echo utf8_encode($dados['itensCombo']); ?></textarea>
            <br/><br/>
            
            <label>Calorias:</label><br/>
            <input type="text"  maxlength='5' style="width:550px" name="calorias" value="<?php echo utf8_encode($dados['calorias']); ?>"/>
            <br/><br/>

            <label>Valor:<br/>R$</label>
            <input type="text" name="valor" value="<?php echo str_replace('.', ',', $dados['valor']); ?>"/>
            <br/><br/>
            
            <label>Imagem:</label><br/>
            <?php if(file_exists('../imagens/cardapio/' . $dados['imagem']) && $dados['imagem'] != '') { ?>
            <img src="../imagens/cardapio/<?php echo $dados['imagem']?>"/>
            <?php } else { ?>
            <img src="../imagens/cardapio/erro.jpg"/>
            <?php } ?>
            <br/><br/>
            
            <label>Insira uma nova imagem:</label><br/>
            <input type="file" name="imagem"/>
            <br/><br/>
            
            <input type='submit' value='Alterar'>
            <input type="reset" value="Limpar">
            <input type='button' onclick="window.location='alteracao.php';" value="Voltar">
        </form>
    </body>
</html>
