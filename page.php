<?php
    session_start();
    $code = "News";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="css/index.css">
    <link rel="stylesheet" href="css/page.css">
    <link rel="stylesheet" href="css/pagemobile.css">
    <link rel="stylesheet" href="css/headermobile.css">
    <link rel="stylesheet" href="css/footermobile.css">
    <link rel="stylesheet" href="css/pagemobile.css">
    <meta name="viewport" content="width=device-width, initial-scale=-1">
    <link rel="shortcut icon" type="image/x-icon" href="img/logo 1.svg" />
    <title>NEWS</title>
</head>

<body>
    <?php
        include_once("header.php");
        include("NewsModel.php");
        $row = NewsModel::getID();
    ?>
    <main class="main_page">
        <hr class="hr_page_main">
        <div class="page_navigation_link">
            <p class="page_navigation_link_p">
                <a href="index.php">Главная</a>&nbsp;/&nbsp;<?=$row['title']; ?>
            </p>
        </div>
        <div class="page_hero">
            <h1 class="page_hero_h1">
                <?=$row['title']; ?>
            </h1>
        </div>
        <div class="page_block_news">
            <div class="left_block_news">
                <div class="left_block_news_data"><?=$row['dt']; ?></div>
                <div class="left_block_news_announce"><?=$row['announce']; ?></div>
                <div class="left_block_news_content"><?=$row['content']; ?></div>
                <a href="index.php?page=<?=$_SESSION['pagesession']; ?>" class="a_style_button">
                    <div class="left_block_news_button">
                        <div class="arrow_button_page"></div>назад к новостям
                    </div>
                </a>
            </div>
            <div class="right_block_news">
                <img src="image/<?=$row['image']; ?>" alt="page_news_image" class="page_news_image">
            </div>
        </div>
    </main>
    <?php
        include_once("footer.php"); 
    ?>
</body>

</html>