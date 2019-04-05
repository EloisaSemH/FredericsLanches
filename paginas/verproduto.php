<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Ver produto</title>
        <link href="../css/estiloform.css" rel="stylesheet"/> 
    </head>
    <body>
        <?php
        include_once('conexao.php');
        if (isset($_GET['id']) && is_numeric(base64_decode($_GET['id']))) {
            $id = base64_decode($_GET['id']);
        } else {
            header('Location: principal.php');
        }

        $query = mysqli_query($conexao, "call p_ConsultarLanchePorID('$id')");

        if (!$query) {
            echo '<form name="voltar" class="estiloForm" style="text-align: center;">';
            echo '<input type="button" onclick="window.location=' . "'consulta.php'" . ';" value="Voltar"><br><br>';
            die('<b>Desculpe, algo de errado ocorreu. Erro:</b>' . @mysqli_error($conexao));
            echo '</form>';
        }

        $dados = mysqli_fetch_array($query);
        ?>
        <table class="estiloForm">
            <th>
                <?php if (file_exists('../imagens/cardapio/' . $dados['imagem']) && $dados['imagem'] != '') { ?>
                <img src="../imagens/cardapio/<?php echo $dados['imagem'] ?>" alt=""/>
                <?php } else { ?>
                <img src="../imagens/cardapio/erro.jpg" alt=""/>
                <?php } ?>
            </th>
            <td style="text-align: justify; padding: 10px;">
                <span class="bold">Id:</span> <?php echo $dados['id'] ?>
                <br/>
                <span class="bold">Nome:</span> <?php echo utf8_encode($dados['nome']) ?>
                <br/>
                <span class="bold">Descrição:</span> <?php echo utf8_encode($dados['descricao']) ?>
                <br/>
                <span class="bold">Ingredientes:</span> <?php echo utf8_encode($dados['ingredientes']) ?>
                <br/>
                <span class="bold">Montagem:</span><br/><?php echo utf8_encode($dados['montagem']) ?>
                <br/>
                <span class="bold">Tempo de preparo:</span> <?php echo utf8_encode($dados['tempoPrep']) ?>
                <br/>
                <span class="bold">Itens do combo:</span> <?php echo utf8_encode($dados['itensCombo']) ?>
                <br/>
                <span class="bold">Calorias:</span> <?php echo utf8_encode($dados['calorias']) ?>
                <br/>
                <span class="bold">Valor: R$</span> <?php echo str_replace('.', ',', $dados['valor']) ?>
            </td>
        </table>
        <?php
        mysqli_close($conexao);
        ?>
    </body>
</html>
