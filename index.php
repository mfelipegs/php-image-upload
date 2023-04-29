<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Upload</title>
    <link rel="stylesheet" href="assets/css/index.css" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0" />
</head>
<body>
    <form action="upload.php" method="post" enctype="multipart/form-data">
        <input type="hidden" name="MAX_FILE_SIZE" value="10000000">
        <div class="input_file_form">
            <span class="material-symbols-outlined">
                upload_file
            </span>
            <label for="arquivo">Selecionar arquivo</label>
            <input type="file" name="arquivo[]" multiple="multiple" id="arquivo" />
        </div>
        <input type="submit" name="enviar" value="Enviar" class="btn_enviar">
    </form>
    <hr>
    <?php
        $path = "arquivos/";
        $diretorio = dir($path);
    ?>

    <table border="1" class="table_exibe">
        <thead>
            <tr>
                <th>Arquivo</th>
                <th>Ação</th>
            </tr>
        </thead>   
        <tbody>
        <?php
        while($arquivo = $diretorio -> read()) {
        ?>
            <tr>
                <td>
                    <a href="<?php echo $path.$arquivo ?>">
                    <img src="<?=$path."/".$arquivo?>" alt=<?=$arquivo?> width="300" height="300"/>
                    </a>
                </td>
                <td>
                    <a href="deletar.php?deletarArquivo=<?php echo $arquivo ?>">
                        <span class="material-symbols-outlined">
                            delete
                        </span>

                        Excluir
                    </a>
                </td>
            </tr>
        <?php }
        $diretorio -> close();
        ?>
        </tbody>
    </table>
</body>
</html>