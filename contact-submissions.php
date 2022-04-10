<?php
if (isset($_POST['Email'])) {

    $email_to = "jessirosyln@gmail.com";
    $email_subject = "Contact form submission!";

    function problem($error)
    {
        echo "Uh oh, there was an error with your form.";
        echo "We found these errors with your form:<br><br>";
        echo $error . "<br><br>";
        echo "Please correct them and try again!<br><br>";
        die();
    }

    // validation expected data exists
    if (
        !isset($_POST['topic']) ||
        !isset($_POST['firstName']) ||
        !isset($_POST['lastName']) ||
        !isset($_POST['email']) ||
        !isset($_POST['location']) ||
        !isset($_POST['message'])
    ) {
        problem('Uh oh! There appears to be a problem with the form you submitted.');
    }

    $topic = $_TOPIC['Topic']; // required
    $firstName = $_POST['First Name']; // required
    $lastName = $_POST['Last Name'];
    $email = $_POST['Email Address']; // required
    $location = $_POST['City & Province'];
    $message = $_POST['Comments']; // required

    $error_message = "";
    $email_exp = '/^[A-Za-z0-9._%-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,4}$/';

    if (!preg_match($email_exp, $email)) {
        $error_message .= 'The Email address you entered does not exist.<br>';
    }

    $string_exp = "/^[A-Za-z .'-]+$/";

    if (!preg_match($string_exp, $topic)) {
      $error_message .= 'Please let us know what you are writing about';
    }

    if (!preg_match($string_exp, $firstName)) {
        $error_message .= 'Please ensure your name is correct.<br>';
    }

    if (strlen($message) < 2) {
        $error_message .= 'Please add details in the comment section.<br>';
    }

    if (strlen($error_message) > 0) {
        problem($error_message);
    }

    $email_message = "Find the form details below.\n\n";

    function clean_string($string)
    {
        $bad = array("content-type", "bcc:", "to:", "cc:", "href");
        return str_replace($bad, "", $string);
    }

    $email_message .= "Topic: " . clean_string($topic) . "\n";
    $email_message .= "First Name: " . clean_string($firstName) . "\n";
    $email_message .= "Last Name: " . clean_string($lastName) . "\n";
    $email_message .= "Email: " . clean_string($email) . "\n";
    $email_message .= "Location: " . clean_string($location) . "\n";
    $email_message .= "Message: " . clean_string($message) . "\n";

    $headers = 'From: ' . $email . "\r\n" .
        'Reply-To: ' . $email . "\r\n" .
        'X-Mailer: PHP/' . phpversion();
    @mail($email_to, $email_subject, $email_message, $headers);
?>

    Your message has been received. We'll get back to you soon.

<?php
}
?>
