<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="css/feedback.css">
    <link rel="stylesheet" href="css/index.css">
    <link rel="stylesheet" href="css/feedbackmobile.css">
    <link rel="stylesheet" href="css/headermobile.css">
    <link rel="stylesheet" href="css/footermobile.css">
    <meta name="viewport" content="width=device-width, initial-scale=-1">
    <link rel="shortcut icon" type="image/x-icon" href="img/logo 1.svg" />
    <title>FEEDBACK</title>
</head>

<body>
    <?php 
    $code = "Feedback";
    include_once("header.php");
     ?>
    <hr class="hr_feedback_main">
    <main class="main_ok">
        <div class="ok_feedback">
            <h1 class="h1_ok">Мы получили ваше сообщение!</h1>
            <div class="div_image"></div>
            <div class="buttons_ok">
                <a class='button_ok' href="feedback.php">Назад</a>
                <a class='button_ok' href="index.php">На главную</a>
            </div>
        </div>
    </main>
    <?php include_once("footer.php"); ?>
</body>

</html>