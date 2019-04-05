<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Consulta geral</title>
        <link href="../css/estiloform.css" rel="stylesheet"/> 
    </head>
    <body>
        <?php
        include_once('conexao.php');

        $query = mysqli_query($conexao, "call p_ConsultarLanches()");

        if (!$query) {
            echo '<form name="voltar" class="estiloForm" style="text-align: center;">';
            die('Desculpe, algo de errado aconteceu. Erro:' . @mysqli_error($conexao));
            echo '<br/><br/><input type="button" onclick="window.location=' . "'alteracao.php'" . ';" value="Voltar">';
            echo '</form>';
        }
        ?>
        <table class="estiloForm">
            <tr>
                <th width='30px' align='center'>ID</th>
                <th width='100px'>Nome</th>
                <th width='250px'>Descrição</th>
                <th width='250px'>Ingredientes</th>
                <th width='250px'>Montagem</th>
                <th width='100px'>Tempo de preparo</th>
                <th width='250px'>Itens do combo</th>
                <th width='100px'>Calorias</th>
                <th width='100px'>Valor</th>
                <th width='100px'>Imagem</th>
            </tr>
            <?php
            while ($dados = mysqli_fetch_array($query)) {
                echo "<tr>";
                echo "<td>" . $dados['id'] . "</td>";
                echo "<td>" . utf8_encode($dados['nome']) . "</td>";
                echo "<td>" . utf8_encode($dados['descricao']) . "</td>";
                echo "<td>" . utf8_encode($dados['ingredientes']) . "</td>";
                echo "<td>" . utf8_encode($dados['montagem']) . "</td>";
                echo "<td>" . utf8_encode($dados['tempoPrep']) . "</td>";
                echo "<td>" . utf8_encode($dados['itensCombo']) . "</td>";
                echo "<td>" . utf8_encode($dados['calorias']) . " kcal</td>";
                echo "<td> R$ " . $dados['valor'] . "</td>";
                
                $id = base64_encode($dados['id']);
                if (file_exists('../imagens/cardapio/' . utf8_encode($dados['imagem'])) && utf8_encode($dados['imagem']) != '') {
            ?>
                <td align='center'>
                    <a href='verproduto.php?id=<?php echo $id; ?>'>
                        <img src="../imagens/cardapio/<?php echo utf8_encode($dados['imagem']) ?>"/>
                    </a>
                </td>
            <?php } else { ?>
                <td align='center'>
                    <a href='verproduto.php?id=<?php echo $id; ?>'>
                        <img src="../imagens/cardapio/erro.jpg"/>
                    </a>
                </td>
            <?php
                }
                echo "</tr>";
            }
            ?>
        </table>
    </body>
</html>