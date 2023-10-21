<?php
ini_set('display_errors', 1);
if (isset($_POST['contactSubmit'])){
/* required files */
 require '../phpmailer/PHPMailerAutoload.php';

$inputSubject = $_POST['Subject'];
$inputEmail = $_POST['Email'];
$inputName = $_POST['Name'];
  $inputMessage = $_POST['Message'];
$mail = new PHPMailer;

try {
  $mail->Host='smtp.gmail.com';

$mail->Port=587;
$mail->SMTPAuth=true;
$mail->SMTPSecure='tls';
   $mail->From = $inputEmail;
   $mail->FromName = $inputName;
   $mail->addAddress("skitiatheskittles@gmail.com", 'Skitia');
   $mail->Subject = $inputSubject;
  $mail->IsHTML(true);
   $mail->Body = 
     "<p><span style = 'font-weight: bold';>Message</span>: " . $inputMessage . "</p>" . 
     "<p> (Sent via <a href = 'https://skitias-stories.com/' style = 'font-style: italic; text-decoration: underline;'>Skitia's Stories</a>)</p>";
   


/* Username (email address). */
$mail->Username = 'skitiatheskittles@gmail.com';


/* Google account password. */
$mail->Password = 'Vulpesune2!';

   
   /* Finally send the mail. */
   $mail->send();
}
catch (Exception $e)
{
   die();
}
catch (\Exception $e)
{
   echo $e->getMessage();
   die();
}
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Contact | Skitia's Stories</title>
  <link href="https://fonts.googleapis.com/css?family=Cinzel+Decorative|Lato&display=swap" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="css/main.css">
<style>
  </style>
</head>
<body>
  <div id="header-container"></div>
<div id = contactBackground>
    


        

  <form method="post" id = "centerContact">
                 
 <h1 id = "contactHead">
   Contact
  </h1> 
        <p id = "contactText">
           <?php if(isset($_POST['contactSubmit'])){ echo "Your message has been sent! You will receive a reply within 24 hours."; }
       else{ echo "Please enter your contact details with your inquiry."; } ?>
  </p>
<br>
<label for = "full-name">Full Name</label>
<br><input type = "text" class = "contactInput" <?php if(isset($_POST['contactSubmit'])){ echo "disabled"; }?> placeholder = "Name (Required)" required name = "Name" id = "full-name"> <br>        

<label for = "email">Email</label>
 <br> <input type = "email" class = "contactInput" <?php if(isset($_POST['contactSubmit'])){ echo "disabled"; }?> placeholder = "Email (Required)" required pattern="[^@\s]+@[^@\s]+" name = "Email" id = "email"> <br>

  <label for = "subject">Subject</label>
<br> <input type = "text" class = "contactInput" <?php if(isset($_POST['contactSubmit'])){ echo "disabled"; }?> placeholder = "Subject (Required)" required name = "Subject" id = "subject"><br>
<label for = "message">Message</label>
<br><textarea placeholder="Message (Required)" <?php if(isset($_POST['contactSubmit'])){ echo "disabled"; }?> name="Message" id = "contactMessage"  rows="5" cols="33" required minlength=20 id = "message"></textarea>
<br>
  <input type = "submit" value = "Submit" <?php if(isset($_POST['contactSubmit'])){ echo "disabled"; }?> id = "contactSubmit" name = "contactSubmit"></input>
  </form>
</div>
<div id="footer-container"></div>
</body>
<script src="js/main.js"></script>

</html>