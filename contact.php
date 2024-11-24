<?php
    header("Access-Control-Allow-Origin:* ");
    header("Access-Control-Allow-Headers:* ");
    header("Access-Control-Allow-Methods:* ");

    $method = $_SERVER["REQUEST_METHOD"];

    if ($method === "POST") {
        $form_data = json_decode(file_get_contents("php://input"));
        $subject = "Work mail from ".($form_data->name);
        $to = "lsargsyan8137@gmail.com";
        $message = wordwrap($form_data->message, 70);
        $message = str_replace("\n.", "\n..", $message);
        $headers = "From: ".($form_data->email);

        mail($to, $subject, $message, $headers);
    }
?>

