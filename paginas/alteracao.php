<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Alteração</title>
        <link href="../css/estiloform.css" rel="stylesheet"/> 
    </head>
    <body>
        <form name="alteracao" action="veralteracao.php" method="post" class="estiloForm">
            <label>ID:</label>
            <input type="number" name="id"/>
            <br/><br/>
            <input type="submit" value="Ok">
            <input type="reset" value="Limpar">
            <input type='button' onclick="window.location='principal.php';" value="Voltar">
        </form>
    </body>
</html>
