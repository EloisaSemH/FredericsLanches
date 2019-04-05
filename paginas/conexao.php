<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>Conexão com o Banco de Dados</title>
        <link href="../css/estiloform.css" rel="stylesheet"/> 
    </head>
    <body>
        <?php
            $host = "localhost";
            $user = "root";
            $pass = "";
            $banco = "fredericsMenu";
            
            $conexao = @mysqli_connect($host, $user, $pass, $banco)
                    or die("Desculpe, houve uma falha com a conexão do banco de dados");
        ?>
    </body>
</html>
