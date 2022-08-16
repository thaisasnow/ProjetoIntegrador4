<?php

    use PHPMailer\PHPMailer\PHPMailer;
    require_once('vendor/autoload.php'); 

    date_default_timezone_set('America/Sao_Paulo');

    define('GUSER', 'bibliotecamansur.php@gmail.com');
    define('GPWD', 'dldbevdnelnqsszn');

    function send($usuario){

        $mail = new PHPMailer;

        # config do email
        $mail->isSMTP();
        $mail->SMTPDebug = 2; 
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPSecure = 'tls'; 
        $mail->Port = 587;
        $mail->SMTPAuth = true;
        $mail->Usarname = GUSER;
        $mail->Password = GPWD;
        
        $mail->setFrom('recupera-senha@senac.com.br', 'Biblioteca'); 
        $mail->addAddress($usuario->email); //destino
        $mail->Subject = 'Recuperação de senha.'; //assunto

        $mail->msgHTML(constroiMensagem($usuario->senha));
        $mail->AltBody = "Sua nova senha é: {$usuario->senha}";

        // Envio do email
        $response = $mail->send();
        if($response) {
            #manipulação de arquivos leitura/escrita
            $log_file = fopen('log_email.log', 'a');
            $date = date('Y-m-d H:i');
            fwrite($log_file, "E-mail enviado com sucesso: {$usuario->email} - {$date}\r\n\r\n"); // \n corresponde a quebra de linha e o \r é como se pulasse a linha (é o return) - isso é necessário dno Windows
            fclose($log_file);
            redirect('success', 'Uma nova senha foi gerada e enviada para o seu e-mail.');
        }
        if(!$response) {
            $log_file = fopen('log_email.log', 'a');
            $date = date('Y-m-d H:i');
            fwrite($log_file, "{$mail->ErrorInfo}\r\n{$usuario->email}\r\n{$date}\r\n\r\n");
            fclose($log_file);
            redirect('danger', 'Ocorreu uma falha ao recuperar a senha.'); 
        }
    }
    function constroiMensagem($senha){
        return "<!DOCTYPE html>"
                . "<html lang='pt-br'>"
                . "<head>"
                    . "<meta charset='UTF-8'>"
                    . "<meta http-equiv='X-UA-Compatible' content='IE=edge'>"
                    . "<meta name='viewport' content=width='device-width, initial-scale=1.0'>"
                    . "<title>Recuperação de senha</title>"
                . "</head>"
                . "<body>"
                        ."<h1>Recuperação de senha <strong>Biblioteca</strong></h1>"
                        . "<div align='center'>"
                            ."<h3>Sua nova senha é: {$senha}</h3>"
                        . "</div>"        
                . "</body>"
                . "</html>";
    }

    function redirect($status, $msg){
        setcookie('notify', $msg, time() + 10, "projeto/forgot-password.php", 'localhost');
        setcookie('status', $msg, time() + 10, "projeto/forgot-password.php", 'localhost');
        header("location: forgot-password.php");
        exit;

    }
