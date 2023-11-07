<?php
    include_once 'Conexion.php';
    $conex = mysqli_connect('localhost','root','','searchproject');

    //Libreria de PHPMailer, si se borra no funciona nada jaja :P
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;
    require ('PHPMailer/src/Exception.php');
    require ('PHPMailer/src/PHPMailer.php');
    require ('PHPMailer/src/SMTP.php');


    //Para confirmar si el email existe
        $email = $_POST['mail'];
        $id= $_POST['id'];
        $bd= new Database();
        $stmt = $bd-> connectar() -> prepare('SELECT IdDatosPersonales FROM tbldatospersonales  WHERE Correo=:mail');
        $stmt->execute(['mail' => $email]);
        $user = $stmt->fetch(PDO::FETCH_NUM);

        if (!$user) {
            echo "<script>
                window.location.replace('../html/MailPassword.html');
                alert('Email no encontrado, intente de nuevo');
            </script>";
            exit;
        }

    //Generar y guardar token 

        $token = bin2hex(random_bytes(13));
        //$expires = time() + 3600; 3600 segundos = 1 hora
        $insertar="UPDATE tbldatospersonales SET tokens = '$token' WHERE Correo = '$email'";
        $ejecutar=mysqli_query($conex,$insertar);

        //$reset_url = "localhost/SearchProject/php/ResetPassword.php?token=$token";

        if($ejecutar)
        {
            echo ('<script>
            window.location.replace("../html/ResetPassword.html");
            alert("Hemos enviado un codigo de reestablecimiento a su correo");
            </script>');

            //Enviar email con PHPMailer
            $mail = new PHPMailer(true);

            try {
                //Server settings
                $mail->SMTPDebug = 0;                      //Enable verbose debug output
                $mail->isSMTP();                                            //Send using SMTP
                $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
                $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
                $mail->Username   = 'searchproject9@gmail.com';                     //SMTP username
                $mail->Password   = 'kaaxgxbbjocsjlzd';                               //SMTP password
                $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
                $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

                //Recipients
                $mail->setFrom('searchproject9@gmail.com', 'Search Project');
                $mail->addAddress($email);     //Add a recipient

                //Content 
                $mail->CharSet = 'UTF-8';                               
                $mail->Subject = 'Reestablecimiento de contraseña';
                $mail->isHTML(true);    //Set email format to html
                $mail->Body= ("
                    <html>

                    <body>

                    Para reestablecer su contraseña, copie este codigo: ".$token."

                    </body>

                    </html>

                ");

                $mail->send();
                echo ('<script>
                window.location.replace("../html/Iniciar Sesion.html");
                alert("Hemos enviado un enlace de reestablecimiento a su correo");
                </script>');
            } catch (Exception $e) {
                echo "Hubo un error al enviar el mensaje: {$mail->ErrorInfo}";
            }
        }

        ?>




