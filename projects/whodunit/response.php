<?php
if(isset($_POST['email'])) {
    $email_to = "x.0dyss3us.x@gmail.com";
    $email_subject = "whodunit response";
     
     
    function died($error) {
		echo "<!DOCTYPE html>";
		echo "<html><head><title>Whodunit? - Solution</title>";
		echo "<meta http-equiv=\"content-type\" content=\"text/html; charset=UTF-8\"/>";
		echo "<link rel=\"stylesheet\" href=\"whodunit.css\" type=\"text/css\" />";
		echo "</head><body><div class=\"wrapper\"><h1><a href=\"index.html\"><img src=\"whodunit.png\" alt=\"Whodunit\" class=\"heading\" /></a></h1>";
		echo "<h2>Solve It!</h2>";
        echo "<p>I apologize, but there seems to have been a problem with the form you submitted: </p>";
        echo "<p style='color:red;'>".$error."</p>";
        echo "<p>Press the browser's back button and fix this to recieve the answer.</p>";
		echo "</div></body></html>";
        die();
    }
     
    // validation expected data exists
    if(!isset($_POST['email']) || !isset($_POST['answer'])) {
        died('Sorry, but there was a problem');       
    }
     
	$email_from = $_POST['email']; // required
    $answer = $_POST['answer']; // required
     
    $error_message = "";
	$email_exp = '/^[A-Za-z0-9._%-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,4}$/';
  if(!preg_match($email_exp,$email_from)) {
    $error_message .= 'The EMAIL ADDRESS you entered does not appear to be valid.<br />';
  }
  if(strlen($answer) < 2) {
    $error_message .= 'The ANSWER you entered did not appear to be valid.<br />';
  }
  if(strlen($error_message) > 0) {
    died($error_message);
  }
     
    function clean_string($string) {
      $bad = array("content-type","bcc:","to:","cc:","href");
      return str_replace($bad,"",$string);
    }
	
	$email_message = "Email: ".clean_string($email_from)."\n";
    $email_message .= "Answer:   ".clean_string($answer)."\n";
     
// create email headers
$headers = 'From: '.$email_from."\r\n".
'Reply-To: '.$email_from."\r\n" .
'X-Mailer: PHP/' . phpversion();
@mail($email_to, $email_subject, $email_message, $headers); 
?>

<!DOCTYPE html>

<html>
<head>
	<title>Whodunit? - The Answer</title>
	
	<meta http-equiv="content-type" content="text/html; charset=UTF-8"/>
	<meta name="description" content="Welcome to the crime scene, Detective. Explore it as best you can, and use the QR Codes to examine the evidence. Put all the pieces together to solve this case. Good luck." />
	
	<link rel="stylesheet" href="whodunit.css" type="text/css" />
</head>
<body>
	<div class="wrapper">
		<h1><a href="index.html"><img src="whodunit.png" alt="Whodunit" class="heading" /></a></h1>
		<h2>The Answer</h2>
		<p>Fred Connoly was not murdered. After returning from work last night, he found the note from his wife Marla waiting for him on the kitchen table. Obviously broken up at this turn of events, he desperately tried to reach her. As the night went on, he began to realize she was never going to pick up her phone. </p>
		<p>After a long night of trying to come up with a plan to get his wife back, he called his friend Ray Prezluski, asking to borrow his car upon his arrival in Philadelphia. Prez assumed he was flying in, and in a way, he was.</p>
		<p>Since his wife cleaned out their joint account, Fred didn't have enough funds to buy a ticket to Philly. Instead, he showed up to work as usual. Once arriving at the tarmac, he made his way to a flight heading to PHL. When no one was looking, he climbed up the landing gear and stowed away inside the compartment.</p>
		<p>The plane takes off without anyone noticing, and the landing gear retracts up into the fuselage. Luckily, there is enough room for Fred. Unluckily for Fred, this compartment is not temperature controlled like the passenger compartment, and it is a heck of a lot colder at 30,000 feet than it is on sea level. Poor Fred died of hypothermia before he made it to Philadelphia.</p>
		<p>As the plane made its approach to the airport, it lowered the landing gear. Fred's body tumbled out of the opening towards Temple University's campus. Fred's fall was only interupted by the branches of a tree before a hard landing on the sidewalk, only to be discovered a few short minutes later.</p>
		<h4>Thanks for playing along, and I hope you enjoyed the riddle!</h4>
	</div>
</body>
</html>
<?php
}
?>