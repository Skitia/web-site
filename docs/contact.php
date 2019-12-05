<?php 



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
   $mail->From = "skitiatheskittles@gmail.com";
   $mail->FromName = "Skitia's Stories";
   $mail->addAddress("skitiatheskittles@gmail.com", 'Skitia');
   $mail->Subject = $inputSubject;
  $mail->IsHTML(true);
   $mail->Body = "<p><span style = 'font-weight: bold';>Name</span>: " . $inputName . "</p>" . 
     "<p><span style = 'font-weight: bold';>Email</span>: " . $inputEmail . "</p>" .
     "<p><span style = 'font-weight: bold';>Subject</span>: " . $inputSubject . "</p>" .
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
   echo $e->errorMessage();
}
catch (\Exception $e)
{
   echo $e->getMessage();
}
}
?>



<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8" name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Contact</title>
  
<link rel="stylesheet" type="text/css" href="css/Skitia.css">
<script src="javascript/Skitia.js"></script>
 <link href="https://fonts.googleapis.com/css?family=Cinzel+Decorative|Lato&display=swap" rel="stylesheet">
<style>
  #contactHead{
     font-family: 'Cinzel Decorative', cursive;
   text-align:center;
    
   margin-bottom:25px;
    text-decoration:underline;
    color: gold;
        font-size: 40px;
  }
    #contactText{
    
   text-align:center;
   padding-bottom:25px;
  
    color: gold;
      
  }
  #contactBackground{
        background-image: url("images/NCadetGnomeAndFerretSmallTransparentPNG.png"), linear-gradient(Aliceblue,skyblue,lightblue,Aliceblue);
   background-repeat: no-repeat, repeat;
     background-position: 1000px -250px; 
    padding-bottom:50px;
    padding-top:50px;
    border-bottom:2px solid gold;


  
    
  }
  </style>
</head>

  
<nav id = "mainNav">
   <a href="index.html" target = "_top"> <span id = "logoLabel">§<span class = "logoUnderline">kitia's</span> §<span class = "logoUnderline">tories</span></a></span>
   <span id = "mobileBar" onclick="openNav()">&#9776;</span>
  <a href="mods.html" target = "_top"> <span class = "navLink">Mods</a></span> 
   <a href="news.php" target = "_top"> <span class = "navLink">News</a></span> 
   <a href="about.html" target = "_top"> <span class = "navLink">About</a></span>
   <a href="https://forums.beamdog.com/" target = "_top"> <span class = "navLink">Beamdog Forums</a></span>
    <a href="contact.php" target = "_top"> <span class = "navLink" id = "navContact">Contact</a></span> 

  </nav>

<div id="mobileNav" class="mobileOverlay">
  <a href="javascript:void(0)" class="overlayCloseBtn" onclick="closeNav()">&times;</a>
  <div class="mobileOverlay-content">
   <a href="index.html" target = "_top">Home</a>
    <a href="mods.html" target = "_top">Mods</a>
     <a href="news.php" target = "_top"> News</a>
     <a href="about.html" target = "_top"> About</a>
     <a href="https://forums.beamdog.com/" target = "_top">Beamdog Forums</a>
   <a href="contact.php" target = "_top"> Contact</a>
  </div>
  </div>
<div id = contactBackground>
    
<?php
if (!isset($_POST['contactSubmit'])){
  ?>


        

      <form method="post" id = "centerContact">
                     
     <h1 id = "contactHead">
       Contact
      </h1> 
            <p id = "contactText">
        Please enter your contact details with your inquiry.
      </p>
    
        Name
    <br><input type = "text" class = "contactInput" placeholder = "Name (Required)" required name = "Name"> <br>        

        Email
     <br> <input type = "email" class = "contactInput" placeholder = "Email (Required)" required pattern="[^@\s]+@[^@\s]+" name = "Email"> <br>

       Subject
 <br> <input type = "text" class = "contactInput" placeholder = "Subject (Required)" required name = "Subject"><br>

Message<br><textarea placeholder="Message (Required)" name="Message" id = "contactMessage"  rows="5" cols="33" required minlength=20></textarea>
<br>
 
        <input type = "submit" value = "Submit" id = "contactSubmit" name = "contactSubmit"></input>
            </form>
<?php 
}
  else {
    
  ?>

             
         
      <form action = "" id = "centerContact">
                         
     <h1 id = "contactHead">
       Contact
      </h1> 
            <p id = "contactText">
        Your message has been sent! You will receive a reply within 24 hours.
      </p>

        Name
    <br><input type = "text" class = "contactInput" value = "<?php echo $inputName;?>" disabled  > <br>        

        Email
     <br> <input type = "email" class = "contactInput"  value = "<?php echo $inputEmail;?>" disabled> <br>

       Subject
 <br> <input type = "text" class = "contactInput" placeholder = "Required" value = "<?php echo $inputSubject;?>" disabled><br>

        Message<br><textarea name="Message" id = "contactMessage"  rows="5" cols="33" disabled ><?php echo $inputMessage;?></textarea>
<br>
 
        <input type = "submit" value = "Go Back" id = "contactSubmit" name = "contactSubmit" >
            </form>

<?php 
  }
        ?>
  </div>
  <footer>
  
     
     <h1 id = "footHead"><a href="index.html" target = "_top">§<span class = "logoUnderline">kitia's</span> §<span class = "logoUnderline">tories</span>   </a></h1>
     
 
    <div id = "footContent">
           <a href="news.php" target = "_top">Mods </a> |
  <a href="mods.html" target = "_top">News</a> |
             <a href="about.html" target = "_top">About </a> |
      <a href="https://forums.beamdog.com/" target = "_top">Beamdog Forums </a> |
    <a href = "#" target = "_top" >Contact </a> 
          </div>
  </footer>

     
</body>
</html>
