<?php
    $code = "Feedback";
    include("NewsModel.php");
    $st = NewsModel::getMail();
    if(isset($_POST['name']) && isset($_POST['email']) && isset($_POST['quest']))
    {
       $st->bindValue(1, $_POST['name'], PDO::PARAM_STR);
       $st->bindValue(2, $_POST['email'], PDO::PARAM_STR);
       $st->bindValue(3, $_POST['quest'], PDO::PARAM_STR);
       $st->execute();
       mail("myglavniyacount@gmail.com", "Вопросы:", "Меня зовут: " . $_POST['name'] . "E-mail: " . $_POST['email'] . "Вопрос: " . $_POST['quest']);
       header('Location: /ok.php'); die;
    }
?>
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
    <script src="js/script.js"></script>
    <title>FEEDBACK</title>
</head>

<body>
    <?php 
        include_once("header.php");
    ?>
    <hr class="hr_feedback_main">
    <main class="main_feedback">
        <section class="Form_feedback">
            <div class="hero_feedback">
                <h1 class="hero_feedback_h1">
                    Задайте нам вопрос!
                </h1>
            </div>
            <form method="post" class="form_feedback" id="form">

                <label class="hide" id="label_name">Ваше имя*</label>
                <input class="name_feedback" type="text" placeholder="Иванов Иван" onfocus="if (placeholder == 'Иванов Иван') 
                                {placeholder = ''}" onblur="if (placeholder == '') 
                                {placeholder = 'Иванов Иван'}" name="name" />
                <label class="hide" id="label_email">Ваш E-mail*</label>
                <input class="email_feedback" type="text" placeholder="name@mail.com" onfocus="if (placeholder == 'name@mail.com') 
                                {placeholder = ''}" onblur="if (placeholder == '') 
                                {placeholder = 'name@mail.com'}" name="email" />
                <label class="hide" id="label_quest">Задайте вопрос:</label>
                <textarea type="text" name="quest" class="quest_feedback" placeholder="Кто создал этот прекрасный сайт?"
                    onfocus="if (placeholder == 'Кто создал этот прекрасный сайт?') 
                                {placeholder = ''}" onblur="if (placeholder == '') 
                                {placeholder = 'Кто создал этот прекрасный сайт?'}"></textarea>
                <button class="button_feedback" type="submit">Отправить</button>
            </form>
        </section>
    </main>
    <?php 
    include_once("footer.php");
?>
</body>

</html>