<?php 
        $firstname = $lastname = $email = $comment = "";
        $firstnameERR = $lastnameERR = $emailERR = "";
        #$fname = $_POST['firstname'];
        #$lname = $_POST['lastname'];
        #$eml = $_POST['email'];
        #$com = $_POST['comment'];

        if($_SERVER["REQUEST_METHOD"] == "POST"){
            if(empty($_POST["firstname"])){
                $firstnameERR = "First name is required";
            }else{
                $firstname = test_input($_POST["firstname"]);
               //check for letters and whitespace
                if(!preg_match("/^[a-zA-Z ]*$/",$firstname)){
                    $firstnameERR = "Only letters and spaces allowed";
                }
            }

            if(empty($_POST["lastname"])){
                $lastnameERR = "Last name is required";
            }else{
            $lastname = test_input($_POST["lastname"]);
            //check for letters and whitespace
            if(!preg_match("/^[a-zA-Z ]*$/",$lastname)){
                    $lastnameERR = "Only letters and spaces allowed";
                }
            }

            if(empty($_POST["email"])){
                $emailERR = "Email is required";
            }else{
            $email = test_input($_POST["email"]);
            //check if email address is well-formed
            if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
                    $emailERR = "Invalid email format";
                }
            }

            $comment = test_input($_POST["comment"]);
        }

        function test_input($data){
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
        }
    ?>

<!doctype html>
<html lang="en">
    <head>
        <title>Katelyn Peterson ePortfolio - Contact</title>
    <link rel="stylesheet" type="text/css" href="KatelynPetersonEPortfolio.css">
    <link rel="stylesheet" type="text/css" href="">
    <meta charset="utf-8">
    </head>
    
        <body>
            
            <header>
                <!--Logo-->
                <a href="KatelynPetersonOnlinePortfolio.html"> 
                    <img alt="Katelyn Peterson logo" src="KP%20Logo_100X88px.png" class="logo">
                </a>
                
                <!--Page Title-->
                <div class="title">
                    <h1>CONTACT</h1>
                </div>
                
                <!--Menu-->
              <div class="menu">
                  <div class="item">
                      <a href="KatelynPetersonOnlinePortfolio.html">Home</a>
                    </div>
                   <div class="item">
                      <a href="KatelynPetersonEPortfolio%20Contact.php">Contact</a>
                       </div>
                   
                </div>
            </header>
            
            <!--Content-->
               
            <div class="body">
                       
            
                <h4 class="welcome">Contact Me!</h4>
                <p>I would love to hear from you to know what you think about my projects! I learned some great things as I worked on them. Please fill out the form below to send me any questions or comments you have.</p>
                
                <div class="form">
                    <p><span class="error">*Required Field</span></p>
                    
        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
           
             <table>
                <tr><td>First Name: <input type="text"  name="firstname" value="<?php echo $firstname;?>" placeholder = "John"><span class="error">* <?php echo $firstnameERR;?></span><br><br>
                    </td></tr>
                <tr><td>Last Name: <input type="text" name="lastname" value="<?php echo $lastname;?>" placeholder = "Doe"><span class="error">* <?php echo $lastnameERR;?></span><br><br></td></tr>
            
            <tr><td>Email: <input type="email" name="email" value="<?php echo $email;?>" placeholder = "johndoe@mail.com"><span class="error">* <?php echo $emailERR;?></span><br><br></td></tr>
            
            <tr><td>Questions/Comments:<br><textarea name="comment" rows="5" cols="40" placeholder = "Type in questions or comments"><?php echo $comment;?></textarea><br><br></td></tr>
            
            <tr><td><input type="submit" name = "submit" value="Submit"></td></tr>
            </table>
        </form>
        </div>
        
        </div>
             
           
    <footer>
        <!--Social Media Weblinks-->
        <div class="weblinks">
        
           <a href="https://www.facebook.com/katelyn.nielsen.549">
                <img alt="facebook logo" src="facebook%20button_25X25.png">
            </a>
            
            <a href="https://github.com/katelynpeterson">
                <img alt="github logo" src="github%20button_25X25.png">
            </a>

            <a href="https://www.linkedin.com/in/katelyn-peterson01">
                <img alt="linkedIn logo" src="linkedIn%20button_25X25px.png">
            </a>
        </div>    
        <!--Copyright-->
        <h6>&copy; 2018 KPeterson <br/> All rights reserved</h6>
    </footer>
    </body>
</html>

<?php 
    $header = "MIME-Version: 1.0" . "\r\n";
    $header .= "Content-type:text/html;charset=UTF-8" . "\r\n";
	$msg="From: " . $firstname . " " . $lastname . "\n" . $email > "\n" . $comment;
    $subject = "Message from " . $firstname . " " . $lastname;
    $header .= "From: contact@katelynpeterson.github.io" . "\r\n";
    mail("howdyhorses@yahoo.com", $subject, $msg, $header);
?>