<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
		$name = $_POST['name'];
		$email = $_POST['email'];
		$mensagem = $_POST['message'];
		
        require 'vendor/autoload.php';

        $from = new SendGrid\Email(null, "felype49@gmail.com");
        $subject = "Mensagem de contato";
        $to = new SendGrid\Email(null, "leandro@calina.ag");
        $content = new SendGrid\Content("text/html", "Olá, <br><br>Nova mensagem de contato<br><br>Nome: $name<br>Email: $email <br>Mensagem: $mensagem");
        $mail = new SendGrid\Mail($from, $subject, $to, $content);
        
        $apiKey = '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';
        $sg = new \SendGrid($apiKey);

        $response = $sg->client->mail()->send()->post($mail);
        echo "Mensagem enviada com sucesso";
        ?>
        <br>
        <br>
        <a class="btn btn-primary" href="index.html" role="button">Voltar ao início</a>
    </body>
</html>
