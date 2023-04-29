<?php

include("conexao.php");
$file = $_GET["deletarArquivo"];
$dir = "arquivos/";

$query = mysqli_query($conexao, "DELETE FROM teste_imagem WHERE imagem = '".$file."'");

if(unlink($dir . $file) && $query) {
    header("location:index.php");
} else {
    echo "Erro ao excluir o arquivo!";
}

?>