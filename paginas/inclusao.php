<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Inclusão</title>
        <link href="../css/estiloform.css" rel="stylesheet"/> 
    </head>
    <body>
        <?php
            include_once('conexao.php');
            $idMax = "select max(id) from lanches";
            $resultado = @mysqli_query($conexao, $idMax);
            $campo = mysqli_fetch_array($resultado);
            (int)$idNovo = $campo['max(id)'];
            $idNovo = $idNovo + 1;
        ?>
        <form action="incluir.php" method="post" enctype="multipart/form-data" class="estiloForm">
            <label>ID:</label><br/>
            <input type="number" value="<?php echo $idNovo; ?>" readonly/>
            <br/><br/>

            <label>Nome do lanche:</label><br/>
            <input type="text" maxlength='32' name="nome" required=""/>
            <br/><br/>
            
            <label>Descrição:</label><br/>
            <textarea rows='3' cols='100' maxlength='255' name="descricao"></textarea>
            <br/><br/>
            
            <label>Ingredientes:</label><br/>
            <textarea rows='3' cols='100' maxlength='255' name="ingredientes" required=""></textarea>
            <br/><br/>
            
            <label>Montagem:</label><br/>
            <textarea rows='3' cols='100' maxlength='255' name="montagem" required=""></textarea>
            <br/><br/>
            
            <label>Tempo de preparo:</label><br/>
            <input type="time" name="tempoPrep" required=""/>
            <br/><br/>
            
            <label>Itens do combo:</label><br/>
            <textarea rows='3' cols='100' maxlength='64' name="itensCombo"></textarea>
            <br/><br/>
            
            <label>Calorias:</label><br/>
            <input type="text" maxlength='5' name="calorias"/>
            <br/><br/>
            
            <label>Valor:<br/>R$ </label>
            <input type="number" step="0.01" maxlength="4" name="valor"/>
            <br/><br/>
            
            <label>Insira uma imagem:</label><br/><br/>
            <input type="file" name="imagem" required=""/>
            <br/><br/>
            

            <input type="submit" value="Ok">
            <input type="reset" value="Limpar">
            <input type='button' onclick="window.location='principal.php';" value="Voltar">
        </form>
        <?php mysqli_close($conexao) ?>
    </body>
</html>