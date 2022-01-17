<?php
// Handles all Form submission tasks for modernchanakya.live
if (isset($_POST['form-submit'])) { //detect form submission
    // determine form subject
    if (isset($_POST['form-subject'])) {

        $formSub = htmlspecialchars($_POST['form-subject']);

        // send mail
        $to = "info@modernchanakya.live, dharmenderrajput382@gmail.com";
        $subject = strtoupper($formSub) . " Request From ModernChanakya.live";

        // form data
        $formData = "";
        foreach ($_POST as $key => $value) {
            $formData .= '<tr><th>' . ucfirst($key) . '</th><th>' . $value . '</th></tr>';
        }

        $message = "
            <html>
            <head>
            <title>HTML email</title>
            </head>
            <body>
            <h2><b>" . strtoupper($formSub) . " Request</b></h2>
            <table>
            " . $formData . "
            </table>
            </body>
            </html>
        ";

        // Always set content-type when sending HTML email
        $headers = "MIME-Version: 1.0" . "\r\n";
        $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

        // More headers
        $headers .= 'From: info@modernchanakya.live' . "\r\n";
        // $headers .= 'Cc: myboss@example.com' . "\r\n";

        $response = mail($to, $subject, $message, $headers);
    }

    // redirect to home page
    header("location: ./");
}
