<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <title></title>
       
    </head>
    <body>
        <?php
        /*
		$nome = $_POST['nome'];
		$email = $_POST['email'];
		$assunto = $_POST['assunto'];
		$mensagem = $_POST['mensagem'];
		
        require 'vendor/autoload.php';

        $from = new SendGrid\Email(null, "luisfernandim1@gmail.com"); //de email
        $subject = "Mensagem de contato";
        $to = new SendGrid\Email(null, "luisfernandim1@gmail.com"); //para tal email
        $content = new SendGrid\Content("text/html", "Olá Luis Fernando, <br><br>Nova mensagem de contato<br><br>Nome: $nome<br>Email: $email 
        	<br>Assunto: $assunto <br><br>Mensagem: $mensagem");
        $mail = new SendGrid\Mail($from, $subject, $to, $content);
        
        //Necessário inserir a chave
        $apiKey = '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';
        $sg = new \SendGrid($apiKey);

        $response = $sg->client->mail()->send()->post($mail);
            //header("Location: index.html");
            echo "Mensagem enviada com sucesso";
        */

    require 'vendor/autoload.php';

	$nome = $_POST['nome'];
	$foremail = $_POST['email'];
	$assunto = $_POST['assunto'];
	$mensagem = $_POST['mensagem'];

	$email = new \SendGrid\Mail\Mail(); 
	$email->setFrom("luisfernandim1@gmail.com", "Example User");
	$email->setSubject("Mensagem de Contato");
	$email->addTo("luisfernandim1@gmail.com", "Example User");
	$email->addContent(
	    "text/html", "<br>Assunto: $assunto <br>"
	);
	$email->addContent(
	    "text/html", "Olá Luis Fernando, <br><br>Nova mensagem de contato<br><br>Nome: $nome<br>Email: $foremail 
	        	<br>Mensagem: $mensagem");

	$sendgrid = new \SendGrid(getenv('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'));
	try {
	    $response = $sendgrid->send($email);
	    print $response->statusCode() . "\n";
	    print_r($response->headers());
	    print $response->body() . "\n";
	} catch (Exception $e) {
	    echo 'Caught exception: ',  $e->getMessage(), "\n";
	}

?>


    </body>
</html>
