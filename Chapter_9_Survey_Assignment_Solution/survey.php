<?php
session_start();

// Starting the survey again clears answers from a previous attempt.
$_SESSION = [];

$showError = isset($_GET['error']);
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Anonymous Survey</title>
    <link rel="stylesheet" href="survey.css">
</head>
<body>
    <header>
        <h1>Anonymous Survey</h1>
        <p>Answer one question on each page.</p>
    </header>

    <main>
        <?php if ($showError): ?>
            <p class="error">Please choose one of the available answers.</p>
        <?php endif; ?>

        <form action="survey2.php" method="post">
            <fieldset>
                <legend>What is your age group?</legend>

                <div class="option">
                    <input type="radio" id="under18" name="age" value="Under 18" required>
                    <label for="under18">Under 18</label>
                </div>

                <div class="option">
                    <input type="radio" id="age18-29" name="age" value="18–29">
                    <label for="age18-29">18–29</label>
                </div>

                <div class="option">
                    <input type="radio" id="age30-49" name="age" value="30–49">
                    <label for="age30-49">30–49</label>
                </div>

                <div class="option">
                    <input type="radio" id="age50-65" name="age" value="50–65">
                    <label for="age50-65">50–65</label>
                </div>

                <div class="option">
                    <input type="radio" id="over65" name="age" value="Over 65">
                    <label for="over65">Over 65</label>
                </div>
            </fieldset>

            <button type="submit">Next</button>
        </form>
    </main>
</body>
</html>
