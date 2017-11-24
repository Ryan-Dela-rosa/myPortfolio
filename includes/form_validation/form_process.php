<?php
require_once "includes/Database/db_connect.php";
// define variables and set to empty values

$contactName_error = $contactEmail_error = $contactNumber_error = $contactMessage_error = "";
$contactName = $contactEmail = $contactNumber = $contactMessage =  "";


if (isset($_POST['submit'])){
session_start();

    if (!empty($_POST["name"]) && ($_POST["email"]) && ($_POST["number"]) && ($_POST["message"])) {
        $name = mysqli_real_escape_string($connect, $_POST['name']);
        $email = mysqli_real_escape_string($connect, $_POST['email']);
        $number = mysqli_real_escape_string($connect, $_POST['number']);
        $message = mysqli_real_escape_string($connect, $_POST['message']);
        
            if ($name_valid && $email_valid && $number_valid && $message_valid){

                $name_valid    = preg_match("/^[a-zA-Z ]*$/",$_POST["name"]);
                $email_valid   = filter_var($_POST['email'], FILTER_VALIDATE_EMAIL);
                $number_valid  = preg_match("/^(\d[\s-]?)?[\(\[\s-]{0,2}?\d{3}[\)\]\s-]{0,2}?\d{3}[\s-]?\d{4}$/i",$_POST["number"]);
                $message_valid = (strlen($_POST["message"]) < 500);

                if ($name_valid && $email_valid && $number_valid && $message_valid){
                    $sqlinsert  = "INSERT INTO myclients (name, email, number, message) VALUES (?,?,?,?)";

                    if ($stmt = mysqli_prepare($connect, $sqlinsert)) {
                    mysqli_stmt_bind_param($stmt, "ssis", $name, $email, $number, $message);
                        mysqli_stmt_execute($stmt);
                        header("Location: thankyou.php");
                    }
            } 
            else {
                  echo 'ERROR: Could not prepare query: $sqlinsert. ' . mysqli_error($connect);
            }

            mysqli_stmt_close($stmt);    
    }

} //<-- end of main if statement

mysqli_close($connect);


//form is submittsed with POST method
if ($_SERVER["REQUEST_METHOD"] == "POST") {

  if (empty($_POST["name"])) {
    $contactName_error = "*Name is required";
  } else {
    $contactName = test_input($_POST["name"]);
    // check if name only contains letters and whitespace
    if (!preg_match("/^[a-zA-Z ]*$/",$_POST["name"])) {
      $contactName_error = "Only letters and white space allowed";
    }
  }

  if (empty($_POST["email"])) {
    $contactEmail_error = "*Email is required";
  }
  else {
    $contactEmail = test_input($_POST["email"]);

    // check if e-mail address is well-formed
    if (!filter_var($contactEmail, FILTER_VALIDATE_EMAIL)) {
      $contactEmail_error = "Invalid email format";
    }
  }

  if (empty($_POST["number"])) {
    $contactNumber_error = "*Phone is required";
  }
  else {
    $contactNumber = test_input($_POST["number"]);
    // check if phone address is well-formed
    if (!preg_match("/^(\d[\s-]?)?[\(\[\s-]{0,2}?\d{3}[\)\]\s-]{0,2}?\d{3}[\s-]?\d{4}$/i",$_POST["number"])) {
      $contactNumber_error = "Invalid phone number";
    }
  }

    if (empty($_POST["message"])) {
        $contactMessage_error = "*Message is required";
    }
    if (strlen($_POST["message"]) > 500){
        $contactMessage_error = "*Message to long";
        $contactMessage = test_input($_POST["message"]);
    }
    else {
        $contactMessage = test_input($_POST["message"]);
    }

  if ($contactName_error == '' && $contactEmail_error == '' && $contactNumber_error == '' && $contactMessage_error == ''){
      $contactMessage = '';
      unset($_POST['submit']);

      foreach ($_POST as $key => $value){
          $contactMessage .=  "$key: $value\n";
      }
      $to = 'ryandelarosa08@gmail.com';
      $subject = 'Contact Form Submit';
      if (mail($to, $subject, $contactMessage)){
          $contactName = $contactEmail = $contactNumber = $contactMessage = '';
      }
      
      $subject2 = "Copy of your form submission ";
      $message2 = "Here is the copy of your message:\n\n" . "Name: " . $name. "\n\n" . "Phone: " . $number. "\n\n" . "Email used: " . $email. "\n\n" . "Message: \n\n" . $message;
      $headers2 = "From: " .  $to ;
      mail($email, $subject2, $message2, $headers2);
      $headers.= "MIME-version: 1.0\n";                             // to avoid getting into spam message
      $headers.= "Content-type: text/html; charset= iso-8859-1\n";  // to avoid getting into spam message
  }
}


function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
