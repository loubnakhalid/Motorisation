<?php
    $subject='test';
    $headers =  'MIME-Version: 1.0' . "\r\n"; 
    $headers .= 'From: Your name <test@gmail.com>' . "\r\n";
    $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n"; 
    $to="motorify23@gmail.com";
    $message='test';
    mail($to,$subject,$message,$headers);
    ?>