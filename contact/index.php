<?php

/**
 * Novel - Contact
 *
 * author: zachfedor
 * url: http://zachfedor.com
 * license: MIT
 * version: 1.2
 */

    // starting user session to pass variables through the POST-REDIRECT-GET process
    session_start();

    // vars to hold persistant display of user input
    $echoedName = "";
    $echoedEmail = "";
    $echoedMessage = "";
    $alert = "";

    // validate email input
    function validEmail ($email) {
        $isValid = true;
        $atIndex = strrpos($email, "@");

        if (is_bool($atIndex) && !$atIndex) {
           $isValid = false;
        } else {
	    // grab strings of user and domain and find their length
            $local = substr($email, 0, $atIndex);
            $domain = substr($email, $atIndex+1);
            $localLen = strlen($local);
            $domainLen = strlen($domain);

            // test for valid length and other invalid strings
            if ($localLen < 1 || $localLen > 64) {
                $isValid = false;
            } else if ($domainLen < 1 || $domainLen > 255) {
                $isValid = false;
            } else if ($local[0] == '.' || $local[$localLen-1] == '.') {
		// if email starts with a period
                $isValid = false;
            } else if (preg_match('/\\.\\./', $local)) {
		// if there are two consecutive periods in user
                $isValid = false;
            } else if (!preg_match('/^[A-Za-z0-9\\-\\.]+$/', $domain)) {
		// if there are invalid characters
                $isValid = false;
            } else if (preg_match('/\\.\\./', $domain)) {
		// if there are two consecutive periods in domain
                $isValid = false;
            } else if (!preg_match('/^(\\\\.|[A-Za-z0-9!#%&`_=\\/$\'*+?^{}|~.-])+$/', str_replace("\\\\","",$local))) {
		// looking for invalid characters in user unless escaped
                if (!preg_match('/^"(\\\\"|[^"])+"$/', str_replace("\\\\","",$local))) {
                    $isValid = false;
                }
            }
            
	    // quick DNS check for domain
            if ($isValid && !(checkdnsrr($domain,"MX") || checkdnsrr($domain,"A"))) {
                $isValid = false;
            }
        }

        return $isValid;
    }

    // P-R-G process
    if(count($_POST) > 0) {
        // get POST data, strip slashes and whitespace, and save to session variable
        $_SESSION['name'] = Trim(stripslashes($_POST['name']));
        $_SESSION['email'] = Trim(stripslashes($_POST['email']));
        $_SESSION['message'] = Trim(stripslashes($_POST['message']));

	// redirect back to here
        header("HTTP/1.1 303 See Other");
        header("Location: http://www.zachfedor.com/contact/index.php");
        die();
    } else if (isset($_SESSION['name'])) {
	// if session variables are already set, save as working variables
        $echoedName = $_SESSION['name'];
        $echoedEmail = $_SESSION['email'];
        $echoedMessage = $_SESSION['message'];

	// checking for empty inputs
        if (!empty($echoedName) && !empty($echoedEmail) && !empty($echoedMessage)) {
	    // on valid email input, create the message
            if (validEmail($echoedEmail) == true) {
                $EmailTo = "zachfedor@gmail.com";
                $Subject = "Message From Portfolio Contact Page";

		// preparing the body of the message
                $Body = "";
                $Body .= "Name: ";
                $Body .= $_SESSION['name'];
                $Body .= "\n";
                $Body .= "Email: ";
                $Body .= $_SESSION['email'];
                $Body .= "\n";
                $Body .= "Message: ";
                $Body .= $_SESSION['message'];
                $Body .= "\n";
 
		// and send it
                $success = mail($EmailTo, $Subject, $Body, "From: <$Email>");

                if ($success) {
	            // print thank you message after send
                    $alert = "<h2 class=\"contactThanks\">Thanks ".htmlspecialchars($echoedName).".<br>I'll get back to you as soon as I can!</h2>";
                } else {
		    // print error message on fail
                    $alert = "<p class=\"contactError\">There seems to have been a problem sending the message. Try refreshing the page and submitting it again.</p>";
                }

		// reset session
                session_unset();
                session_destroy();
            } else {
               $alert = "<p class=\"contactError\">Please enter a valid email address.</p>";
            }
        } else {
            $alert = "<p class=\"contactError\">Please fill in all fields.</p>";
        }
    }
?>

<!DOCTYPE HTML>
<html>

<head>
    <title>Contact</title>

<?php include '../includes/header.php' ?>

    <main role="main">
        <article id="main" class="row clearfix">
            <div id="contactBlock" class="column full">
                <?php echo $alert; ?>
                <form method="post" action="index.php">
                    <label for="name">Name:</label>
                    <input type="text" name="name" id="name" autofocus="autofocus" required="required" value="<?php echo htmlspecialchars($echoedName); ?>"/><br />

                    <label for="email">Email:</label>
                    <input type="email" name="email" id="email" required="required" value="<?php echo htmlspecialchars($echoedEmail); ?>"/><br>
                    
                    <label for="message">Message:</label>
                    <textarea name="message" rows="20" cols="20" id="message" required="required" ><?php echo htmlspecialchars($echoedMessage); ?></textarea><br>

                    <input type="submit" name="submit" value="Submit" class="submit-button" />
                </form>

                <div style="clear:both;"></div>
            
            </div>
        </article>
    </main>

<?php include '../includes/footer.php' ?>
