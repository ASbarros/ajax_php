<?php

if (isset($_POST[['Enviar']])) {
    $formatosPermitidos = array('png', 'jpeg', 'jpg', 'gif');
    $extencao = pathinfo($_FILES['arquivo']['name'], PATHINFO_EXTENSION);
    if (in_array($extencao, $formatosPermitidos)) {
        $pasta = 'arquivos/';
        $temporario = $_FILES['arquivo']['tmp_name'];
        $novoNome = uniqid().".$extencao";
        if (move_uploaded_file($temporario, $pasta.$novoNome)) {
            $mensagem = 'Upload feito com sucesso!';
        } else {
            $mensagem = 'Erro, não foi possivel fazer o upload';
        }
    } else {
        $mensagem = 'Formato inválido!';
    }
}
$files = $_FILES['files'];
 move_uploaded_file($files['tmp_name'], "/home/anderson/$files[name]");
