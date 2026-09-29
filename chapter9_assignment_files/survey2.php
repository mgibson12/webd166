<?php
session_start();

$allowedAges = ['under 18', '18 - 29', '30 - 49', '50 - 65', 'over 65'];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $age = $_POST['age'] ?? '';

    if (!in_array($age, $allowedAges, true)) {
        exit('There was a problem with your age selection. Please go back and try again.');
    }

    $_SESSION['age'] = $age;

    // Redirect after processing the POST request.
    header('Location: survey2.php');
    exit;
}

if (empty($_SESSION['age'])) {
    header('Location: survey.php');
    exit;
}
?>
<!doctype html>
<!-- Name: Your Name -->
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Anonymous Survey - Page 2</title>
    <link rel="stylesheet" href="survey.css">
</head>
<body>
<div class="wrapper">
    <header>
        <h1>Anonymous Survey - Page 2</h1>
        <img class="survey-image" src="images/survey.png"
             alt="Clipboard with survey checkboxes">
    </header>

    <main>
        <form action="survey3.php" method="post">
            <fieldset>
                <legend>What is your highest level of education?</legend>

                <div class="choice">
                    <input type="radio" id="hs" name="education" value="high school" required>
                    <label for="hs">High School</label>
                </div>

                <div class="choice">
                    <input type="radio" id="associate" name="education" value="associate degree">
                    <label for="associate">Associate Degree</label>
                </div>

                <div class="choice">
                    <input type="radio" id="bachelors" name="education" value="bachelor's degree">
                    <label for="bachelors">Bachelor's Degree</label>
                </div>

                <div class="choice">
                    <input type="radio" id="masters" name="education" value="master's degree">
                    <label for="masters">Master's Degree</label>
                </div>

                <div class="choice">
                    <input type="radio" id="doctoral" name="education" value="doctoral degree">
                    <label for="doctoral">Doctoral Degree</label>
                </div>
            </fieldset>

            <button type="submit">Next &gt;&gt;</button>
        </form>
    </main>
</div>
</body>
</html>
