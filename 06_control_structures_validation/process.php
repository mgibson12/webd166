<?php
// process.php

// Retrieve the submitted text-field values.
// The null coalescing operator provides an empty string
// if an expected form field was not submitted.
$name = trim((string)($_GET['name'] ?? ''));
$email = trim((string)($_GET['email'] ?? ''));

// Determine whether the checkbox was checked.
// A checked checkbox is included in the submitted data.
// An unchecked checkbox is not included.
if (isset($_GET['news'])) {
    $news = 'yes';
    $checkbox_message = 'The checkbox was checked.';
} else {
    $news = 'no';
    $checkbox_message = 'The checkbox was not checked.';
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Form Results</title>
</head>

<body>

    <header>
        <h1>Form Results</h1>
    </header>

    <main>
        <section>
            <h2>You submitted the following information:</h2>

            <p>
                Name:
                <?= htmlspecialchars($name, ENT_QUOTES, 'UTF-8') ?>
            </p>

            <p>
                Email:
                <?= htmlspecialchars($email, ENT_QUOTES, 'UTF-8') ?>
            </p>

            <p>
                Receive Newsletter:
                <?= htmlspecialchars($news, ENT_QUOTES, 'UTF-8') ?>
            </p>

            <p>
                <?= htmlspecialchars($checkbox_message, ENT_QUOTES, 'UTF-8') ?>
            </p>
        </section>
    </main>

</body>

</html>