<!doctype html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<?php
foreach ($produtos as $p) {
    echo $p['nome_prod'] . "<br />";
}
?>
<br/>
<a href="/cadastro">Cadastro de Produto</a>
</body>
</html>

