<?php

/**
 * Novel - Contact
 */

    session_start();        // starting user session to pass variables through the POST-REDIRECT-GET process

    $echoedName = "";       // vars to hold persistant display of user input
    $echoedEmail = "";
    $echoedMessage = "";
    $alert = "";

    function validEmail ($email) {      // true email validation by Douglas Lovell http://www.linuxjournal.com/article/9585
        $isValid = true;        // var to return success/fail of validation
        $atIndex = strrpos($email, "@");        // var to find location of @ symbol

        if (is_bool($atIndex) && !$atIndex) {
           $isValid = false;        // incorrect location or lack of @ symbol
        } else {
            $local = substr($email, 0, $atIndex);   // var to hold first half of address, local part
            $domain = substr($email, $atIndex+1);   // var to hold last half of address, domain part
            $localLen = strlen($local);     // finding length of local part
            $domainLen = strlen($domain);   // finding length of domain part

            if ($localLen < 1 || $localLen > 64) {
                $isValid = false;       // local part length exceeded
            } else if ($domainLen < 1 || $domainLen > 255) {
                $isValid = false;       // domain part length exceeded
            } else if ($local[0] == '.' || $local[$localLen-1] == '.') {
                $isValid = false;       // local part starts or ends with '.'
            } else if (preg_match('/\\.\\./', $local)) {
                $isValid = false;       // local part has two consecutive dots
            } else if (!preg_match('/^[A-Za-z0-9\\-\\.]+$/', $domain)) {
                $isValid = false;       // character not valid in domain part
            } else if (preg_match('/\\.\\./', $domain)) {
                $isValid = false;       // domain part has two consecutive dots
            } else if (!preg_match('/^(\\\\.|[A-Za-z0-9!#%&`_=\\/$\'*+?^{}|~.-])+$/', str_replace("\\\\","",$local))) {
                if (!preg_match('/^"(\\\\"|[^"])+"$/', str_replace("\\\\","",$local))) {
                    $isValid = false;   // character not valid in local part unless local part is quoted
                }
            }
            
            if ($isValid && !(checkdnsrr($domain,"MX") || checkdnsrr($domain,"A"))) {
                $isValid = false;       // domain not found in DNS
            }
        }
        return $isValid;        // valid email address
    }


    if(count($_POST) > 0) {     // P-R-G process
        $_SESSION['name'] = Trim(stripslashes($_POST['name']));     // get POSTs from form submission
        $_SESSION['email'] = Trim(stripslashes($_POST['email']));   // strip slashes and whitespaces
        $_SESSION['message'] = Trim(stripslashes($_POST['message']));   // save values to session

        header("HTTP/1.1 303 See Other");
        header("Location: http://www.zachfedor.com/contact/index.php");      // redirect back to here
        die();
    } else if (isset($_SESSION['name'])) {      // if session variables are set...
        $echoedName = $_SESSION['name'];        // save session variables to working variables
        $echoedEmail = $_SESSION['email'];
        $echoedMessage = $_SESSION['message'];

        if (!empty($echoedName) && !empty($echoedEmail) && !empty($echoedMessage)) {    // check for empty/missing inputs
            if (validEmail($echoedEmail) == true) {     // check for valid email
                $EmailTo = "zachfedor@gmail.com";       // set recipient
                $Subject = "Message From Portfolio Contact Page";   // set email subject line

                $Body = "";     // prepare email body text
                $Body .= "Name: ";
                $Body .= $_SESSION['name'];
                $Body .= "\n";
                $Body .= "Email: ";
                $Body .= $_SESSION['email'];
                $Body .= "\n";
                $Body .= "Message: ";
                $Body .= $_SESSION['message'];
                $Body .= "\n";
 
                $success = mail($EmailTo, $Subject, $Body, "From: <$Email>");       // send email

                if ($success){      // on success...
                    $alert = "<h2 class=\"contactThanks\">Thanks ".htmlspecialchars($echoedName).".<br>I'll get back to you as soon as I can!</h2>";        // print thank you message after send
                } else {        // on fail...
                    $alert = "<p class=\"contactError\">There seems to have been a problem sending the message. Try refreshing the page and submitting it again.</p>";  // print error message
                }

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
