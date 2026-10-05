<?php

// Initialize the message variable with an error preamble.
// This will be overwritten if the form submission succeeds.
$msg = "<p>Please <a href=\"donation2.html\">GO BACK</a> and fill in the following errors:</p>\n";

// Flag variable to track validation success:
$okay = true;

// Assign default values to avoid undefined array key warnings.
// Trim text values right away so extra spaces are removed before validation.
$fname      = trim($_POST['fname'] ?? '');
$lname      = trim($_POST['lname'] ?? '');
$email      = trim($_POST['email'] ?? '');
$amount_raw = trim($_POST['amount'] ?? '');

// Validate the first name:
if (empty($fname)) {
    $msg .= "\t\t<p>First Name must be filled in.</p>\n";
    $okay = false;
}

// Validate the last name:
if (empty($lname)) {
    $msg .= "\t\t<p>Last Name must be filled in.</p>\n";
    $okay = false;
}

// Validate the email address:
if (empty($email)) {
    $msg .= "\t\t<p>Email address must be filled in.</p>\n";
    $okay = false;
} elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $msg .= "\t\t<p>A valid email address must be entered.</p>\n";
    $okay = false;
}

// Validate the donation amount:
if ($amount_raw === '') {
    $msg .= "\t\t<p>The amount must be filled in.</p>\n";
    $okay = false;
} elseif (!is_numeric($amount_raw)) {
    $msg .= "\t\t<p>The amount must be a number.</p>\n";
    $okay = false;
} elseif ($amount_raw <= 0) {
    $msg .= "\t\t<p>The amount must be greater than zero.</p>\n";
    $okay = false;
}

// If there were no validation errors, create the success message:
if ($okay) {

    // Check for free subscription checkbox status:
    if (isset($_POST['subscription'])) {
        $subscription_status = 'no_subscription';
    } else {
        $subscription_status = 'subscription';
    }

    // Use a switch statement for the subscription text assignment:
    switch ($subscription_status) {
        case 'no_subscription':
            $subscription_text = "You have chosen not to receive a free one-year subscription to our e-magazine.";
            break;

        case 'subscription':
            $subscription_text = "You will receive a free one-year subscription to our e-magazine.";
            break;

        default:
            $subscription_text = "Subscription information was not available.";
            break;
    }

    // Determine the donation level using the numeric unformatted input:
    if ($amount_raw >= 100) {
        $level = "Gold Supporter";
    } elseif ($amount_raw >= 50) {
        $level = "Silver Supporter";
    } elseif ($amount_raw >= 25) {
        $level = "Bronze Supporter";
    } else {
        $level = "Friend of the Animals";
    }

    // Now that validation and logic are complete, format the amount as currency:
    $formatted_amount = number_format((float) $amount_raw, 2);

    // Create a confirmation number:
    $rand   = random_int(1000, 9999);
    $substr = strtoupper(substr($lname, 0, 1));
    $length = strlen($lname);
    $conf   = $length . $substr . $rand;

    // Use a for loop to repeat part of the thank-you message:
    $thanks = '';

    for ($i = 1; $i <= 3; $i++) {
        $thanks .= "Thank you! ";
    }

    // Escape user-entered values with htmlspecialchars before displaying them in the browser:
    $safe_fname = htmlspecialchars($fname, ENT_QUOTES, 'UTF-8');
    $safe_lname = htmlspecialchars($lname, ENT_QUOTES, 'UTF-8');
    $safe_email = htmlspecialchars($email, ENT_QUOTES, 'UTF-8');
    $safe_conf  = htmlspecialchars($conf, ENT_QUOTES, 'UTF-8');

    // Build the final success message.
    // Use = instead of .= to replace the old error message.
    $msg  = "<p>Thank you $safe_fname $safe_lname for your donation of \$$formatted_amount.</p>\n";
    $msg .= "\t\t<p>Your confirmation number is $safe_conf.</p>\n";
    $msg .= "\t\t<p>We will email your receipt to $safe_email.</p>\n";
    $msg .= "\t\t<p>$subscription_text</p>\n";
    $msg .= "\t\t<p>Your donation level is $level.</p>\n";
    $msg .= "\t\t<p>$thanks</p>\n";
}

?>

<!DOCTYPE html>
<!-- Student Name -->
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Assignment 6 Control Structures</title>

    <style>
        body {
            font-family: Arial, sans-serif;
            font-size: 100%;
        }

        #outer {
            width: 960px;
            margin: 50px auto;
            padding: 10px;
            border: 1px solid #a8a8a8;
            box-shadow: 0px 0px 20px #a8a8a8;
            background-color: aliceblue;
        }

        h1,
        h2 {
            font-size: 1.5em;
            color: navy;
            text-align: center;
        }

        .info {
            text-align: left;
        }
    </style>

</head>

<body>
    <header>
        <h1>Humane Society Donations</h1>
        <h2>Help the Animals</h2>
    </header>

    <section id="outer">
        <h1 class="info">Your Contribution</h1>

        <?php echo $msg; ?>

    </section>

</body>

</html>
