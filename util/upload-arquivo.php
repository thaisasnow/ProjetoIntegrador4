<?php

    date_default_timezone_set(('America/Sao_Paulo'));

    function uploadImg($file) {
                
        switch($file['error']) {
            case UPLOAD_ERR_OK:
                //echo 'O arquivo foi upado com sucesso.';
                break;
            case UPLOAD_ERR_INI_SIZE:
            case UPLOAD_ERR_FORM_SIZE:
                echo 'O arquivo excedeu o tamanho limite.';
                exit;
            case UPLOAD_ERR_NO_FILE:
                echo 'O arquivo não foi enviado.';
                exit;
            default:
                echo 'Erro desconhecido.';
                exit;
        }

        # valida se o arquivo possui até 10mb, ele "lê" em bytes
        if($file['size'] > 10000000) {
            echo 'Tamanho superior a 10mb.';
        }
        
        #valida o tipo do arquivo
        $tiposValidos = array(
            'zip' => 'application/x-zip-compressed',
            'rar' => 'application/octet-stream',
            'docx' => 'application/vd.openxmlformats-officedocument.wordprocessingml.document',
            'doc' => 'application/msword',
            'pdf' => 'application/pdf'
            
        );

        if(!$ext = array_search($file['type'], $tiposValidos, true)) {
            echo 'O arquivo enviado não é válido.';
        } 
        
        $localSalvar = sprintf('.' . DIRECTORY_SEPARATOR . 'arquivos' . DIRECTORY_SEPARATOR . '%s.%s', 'download', $ext);
 
        if(move_uploaded_file($file['tmp_name'], $localSalvar)) {
            return substr($localSalvar, 2);
        }
            echo 'Ocorreu um erro ao tentar efetuar o upload.';
    }