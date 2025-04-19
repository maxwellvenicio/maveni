    <?php
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;

    require 'phpmailer/src/Exception.php';
    require 'phpmailer/src/PHPMailer.php';
    require 'phpmailer/src/SMTP.php';

    $mail = new PHPMailer(true);

    try {
        header('Content-Type: application/json');
        // Configurações SMTP
        $mail->isSMTP();
        $mail->Host = 'smtp.hostinger.com'; 
        $mail->SMTPAuth = true;
        $mail->Username = 'contato@mavenistudio.com.br'; 
        $mail->Password = 'Gusnhde@190321'; 
        $mail->SMTPSecure = 'tls';
        $mail->Port = 587;
        $mail->CharSet = 'UTF-8';

        // Dados do formulário
        $name = $_POST['name'];
        $email = $_POST['email'];
        $message = $_POST['message'];

        // Configuração do e-mail
        $mail->setFrom('contato@mavenistudio.com.br', 'Formulário do Site');
        $mail->addReplyTo($email, $name);
        $mail->addAddress('maxwellvenicio@gmail.com'); 
        $mail->isHTML(true);
        $mail->Subject = 'Novo contato de ' . $name;
        $mail->Body = "
            <h2>Novo Contato</h2>
            <p><strong>Nome:</strong> {$name}</p>
            <p><strong>E-mail:</strong> {$email}</p>
            <p><strong>Mensagem:</strong> {$message}</p>
        ";

        $mail->send();
        echo json_encode(['success' => true, 'message' => 'Mensagem enviada com sucesso!']);
    } catch (Exception $e) {
        echo json_encode(['success' => false, 'message' => "Erro ao enviar: {$mail->ErrorInfo}"]);
    }
    ?>