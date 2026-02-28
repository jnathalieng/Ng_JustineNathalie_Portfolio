<?php
//this is okay for dev purposes, but remove for live server. 
    header("Access-Control-Allow-Origin: *");
// sets the content type - header, 
    header("Content-Type: application/json; charset=UTF-8");

    require_once __DIR__ . '/../../vendor/autoload.php';

    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\SMTP;
    use PHPMailer\PHPMailer\Exception;

    $db_host = 'localhost:8889';
    $db_user = 'root';
    $db_pass = 'root';
    $db_name = 'ng_portfolio';

    $connection = mysqli_connect($db_host, $db_user, $db_pass, $db_name);
    $errors = array();

    $name = mysqli_real_escape_string($connection, $_POST['name']);
    if ($name == NULL) {
        $errors[] = "Name field is empty.";
    }

    $email = $_POST['email'];
    if ($email == NULL) {
        $errors[] = "Email field is empty.";
    }

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors[] = "\"" . $email . "\" is not a valid email address.";
    }

    $message = mysqli_real_escape_string($connection, $_POST['message']);
    if ($message == NULL) {
        $errors[] = "Message field is empty.";
    }

    $errcount = count($errors);
    if ($errcount > 0) {
        $errmsg = array();
        for ($i = 0; $i < $errcount; $i++) {
            $errmsg[] = $errors[$i];
        }
        echo json_encode(array("errors" => $errmsg));
    } else {

        // Save to database
        $querystring = "INSERT INTO contacts(id,contact_name,contact_email,contact_message) VALUES(NULL,'" . $name . "','" . $email . "','" . $message . "')";
        $qpartner = mysqli_query($connection, $querystring);

        // Send email via PHPMailer
        $mail = new PHPMailer(true);

        try {
            // Server settings
            $mail->isSMTP();
            $mail->Host       = 'smtp.gmail.com';
            $mail->SMTPAuth   = true;
            $mail->Username   = 'ngjnathalie.ca@gmail.com'; 
            $mail->Password   = 'chuzzle2689BEAR@@';   
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
            $mail->Port       = 587;

            // Recipients
            $mail->setFrom($email, $name);
            $mail->addAddress('ngjnathalie.ca@gmail.com', 'Justine Nathalie');

            // Content
            $mail->isHTML(false);
            $mail->Subject = 'New Portfolio Contact from ' . $name;
            $mail->Body    = "Name: " . $name . "\nEmail: " . $email . "\n\nMessage:\n" . $message;

            $mail->send();
            echo json_encode(array("message" => "Form submitted. Thank you for getting in touch!"));

        } catch (Exception $e) {
            echo json_encode(array("errors" => ["Email could not be sent. Please try again later."]));
        }
    }
?>