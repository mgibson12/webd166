<?php
session_start();

// Starting the survey again creates a fresh set of survey responses.
if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    unset($_SESSION['age'], $_SESSION['education'], $_SESSION['income']);
}
?>
<!doctype html>
<!-- Name: Your Name -->
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Anonymous Survey</title>
    <link rel="stylesheet" href="survey.css">
</head>
<body>
<div class="wrapper">
    <header>
        <h1>Please Take Our Anonymous Survey</h1>
        <img class="survey-image" src="images/survey.png"
             alt="Clipboard with survey checkboxes">
    </header>

    <main>
        <form action="survey2.php" method="post">
            <fieldset>
                <legend>What is your age group?</legend>

                <div class="choice">
                    <input type="radio" id="under18" name="age" value="under 18" required>
                    <label for="under18">Under 18</label>
                </div>

                <div class="choice">
                    <input type="radio" id="age18-29" name="age" value="18 - 29">
                    <label for="age18-29">18 - 29</label>
                </div>

                <div class="choice">
                    <input type="radio" id="age30-49" name="age" value="30 - 49">
                    <label for="age30-49">30 - 49</label>
                </div>

                <div class="choice">
                    <input type="radio" id="age50-65" name="age" value="50 - 65">
                    <label for="age50-65">50 - 65</label>
                </div>

                <div class="choice">
                    <input type="radio" id="over65" name="age" value="over 65">
                    <label for="over65">Over 65</label>
                </div>
            </fieldset>

            <button type="submit">Next &gt;&gt;</button>
        </form>
    </main>
</div>
</body>
</html>
