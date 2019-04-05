<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Excluir</title>
        <link href="../css/estiloform.css" rel="stylesheet"/>
    </head>
    <body>
        <form name="voltar" class="estiloForm" style="text-align: center;">
            <?php
            include_once ('conexao.php');

            $id = $_POST['id'];

            $sqldelete = "delete from lanches where id = '$id'";

            $resultado = @mysqli_query($conexao, $sqldelete);

            if (!$resultado) {
                die('Desculpe, algo de errado aconteceu. Erro:' . @mysqli_error($conexao) . '<br/><br/>');
                echo '<input type="button" onclick="window.location=' . "'alteracao.php'" . ';" value="Voltar"><br/><br/>';
            } else {
                echo "Lanche excluido com sucesso ;)";
            }

            mysqli_close($conexao);
            ?>
            <br/><br/>
            <input type='button' onclick="window.location = 'exclusao.php';" value="Voltar">
        </form>
    </body>
</html>