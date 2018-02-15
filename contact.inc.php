<?php

 $name_error = $email_error = $tel_error = $url_error = "";
 $name = $email = $tel = $url = $message = $success = "";

if($_SERVER["REQUEST_METHOD"] == "POST"){

  if(empty($_POST["name"])){
      $name_error = "Name is required";
  }else {
      $name = test_input($_POST["name"]);
      if(!preg_match("/^[a-zA-Z ]*$/",$name)){
          $name_error = "Only letters and white spaces allowed";
      }
  }

   if(empty($_POST['email'])){
       $email_error = "E-mail is required";
   }else {
       $email = test_input($_POST['email']);
       if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
           $email_error = "Invalid email format";
       }
   }

    if(empty($_POST["tel"])){
        $tel_error = "Phone is required";
    }else {
        $tel = test_input($_POST["tel"]);
        if(!preg_match("/^(\d[\s-]?)?[\(\[\s-]{0,2}?\d{3}[\)\]\s-]{0,2}?\d{3}[\s-]?\d{4}$/i", $tel)){
            $tel_error = "Invalid phone number";
        }
    }

    if(empty($_POST["url"])){
        $url_error = "URL is required";
    }else {
        $url = test_input($_POST["url"]);
        if(!preg_match("/\b(?:(?:https?|ftp):\/\/|www\.)[-a-z0-9+&@#\/%?=~_|!:,.;]*[-a-z0-9+&@#\/%=~_|]/i", $url)){
            $url_error = "Invalid URL";
        }
    }

    if(empty($_POST["message"])){
        $message = "Please write a message";
    }else {
        $message = test_input($_POST["message"]);
    }
if ($name_error == '' and $email_error == '' and $tel_error == '' and $url_error == '') {
       $message_body = '';
       unset($_POST['submit']);
       foreach ($_POST as $key => $value) {
           $message_body .= "$key: $value\n";
       }
       $to = 'thabohappy55@gmail.com';
       $subject = 'User query';
       if (mail($to, $subject, $message)) {
           $success = "Message sent, thank you for contacting us.";
           $name = $email = $tel = $url = $message = '';
       }
    }

}

   function test_input($data){
       $data = trim($data);
       $data = stripslashes($data);
       $data = htmlspecialchars($data);
       return $data;
   }
