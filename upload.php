<?php

include("conexao.php");

$diretorio = "arquivos/";
$arquivo = isset($_FILES['arquivo']) ? $_FILES['arquivo'] : FALSE;

for($k=0; $k < count($arquivo['name']); $k++) {
    
    //Extrair o nome do arquivo
    $nome_arquivo = pathinfo($arquivo['name'][$k], PATHINFO_FILENAME);

    //Extrair a extensão do arquivo
    $extensao_arquivo = pathinfo($arquivo['name'][$k], PATHINFO_EXTENSION);

    $random = mt_rand(0,999999999999);

    //Criptografar um número aleatório concatenado com o nome do arquivo
    $imagem = md5($random."_".$nome_arquivo).".".$extensao_arquivo;

    //arquivos/nome_imagem_criptografada.extensao
    $destino = $diretorio.$imagem;

    if($extensao_arquivo === "jpg" || $extensao_arquivo === "png" || $extensao_arquivo === "jpeg" || $extensao_arquivo === "jfif") {
        //Query para inserir apenas o nome da imagem (nome criptografado + extensão do arquivo)
        $query = mysqli_query($conexao, "INSERT INTO teste_imagem(imagem) VALUES ('".$imagem."')");

        //Tentativa de fazer upload da imagem e executar a query
        if(move_uploaded_file($arquivo['tmp_name'][$k], $destino) && $query) {
            header("location:index.php");
        } else {
            echo "Erro ao enviar o arquivo!";
        }
    } else {
        echo "A extensão do arquivo não é permitida.";
    }
}

?>