<?php
    function sanitise_input($data){
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    //to check for spam
    function isSpamAttempt($email, $name){
        $submission_limit = 3;
        $time_window = 20 * 60;

        if (!isset($_SESSION['submissions'])){
            $_SESSION['submissions'] = array();
        }

        $ename = $email . '_' . $name;

        if(!isset($_SESSION['submissions'][$ename])){
            $_SESSION['submissions'][$ename] = array(1, time());
            return false; 
        } else {
            $submitted = &$_SESSION['submissions'][$ename];

            $time_since_first_submission = time() - $submitted[1];

            if ($time_since_first_submission > $time_window){
                $submitted[0] = 1; 
                $submitted[1] = time();
                return false;
            } else{
                $submitted[0]++;

                if ($submitted[0] > $submission_limit){
                    return true;
                } else{
                    return false;
                }
            }
        }
    }

    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\SMTP;
    use PHPMailer\PHPMailer\Exception;

    require __DIR__ . '/../phpmailer/src/Exception.php';
    require __DIR__ . '/../phpmailer/src/PHPMailer.php';
    require __DIR__ . '/../phpmailer/src/SMTP.php';

    function sendEmail($to, $subject, $message) {
        require_once __DIR__ . '/../config.php';
        try {
            $mail = new PHPMailer(true);
            $mail->isSMTP();
            $mail->Host = 'smtp.gmail.com';
            $mail->SMTPAuth = true;
            $mail->Username = MAIL_USER;
            $mail->Password = MAIL_PASS;
            $mail->SMTPSecure = 'ssl';
            $mail->Port = 465;

            $mail->setFrom(MAIL_USER);
            $mail->addAddress($to);
    
            $mail->isHTML(false);
            $mail->Subject = $subject;
            $mail->Body    = $message;
    
            $mail->send();
    
            return true;
        } catch (Exception $e) {
            return "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        }
    }
?>