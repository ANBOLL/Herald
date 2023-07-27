<?php
    session_start(); 
    $code = "Index";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="css/index.css">
    <link rel="stylesheet" href="css/indexmobile.css">
    <link rel="stylesheet" href="css/headermobile.css">
    <link rel="stylesheet" href="css/footermobile.css">
    <meta name="viewport" content="width=device-width, initial-scale=-1">
    <link rel="shortcut icon" type="image/x-icon" href="img/logo 1.svg" />
    <title>HERALD</title>
</head>

<body>
    <?php 
    $limit = 4;
    if (isset($_GET['page'])){$page = $_GET['page'];}else {$page = 1;}
    $number = ($page * $limit) - $limit;
    include("NewsModel.php");
    $str_page = NewsModel::getCount($limit);
    $query = NewsModel::getList($number, $limit);
    $resi = NewsModel::getList(0, 1);;
    include_once("header.php");
    $pagesession = $page;
    $_SESSION['pagesession'] = $pagesession;
?>
    <main class="main_index">
        <section class="hero_section">
            <?php while($rowi = $resi->fetch()){ ?>
            <div class="hero_image">
                <img src="image/<?=$rowi['image']; ?>" alt="hero_image">
            </div>
            <div class="hero_text">
                <h1 class="hero_h1"><?=$rowi['title']; ?></h1>
                <p class="hero_p"><?=$rowi['announce']; ?></p>
            </div>
            <?php } ?>
        </section>
        <section class="news_title">
            <h2 class="news_title_h2">
                Новости
            </h2>
        </section>
        <section class="news_block">
            <?php while($article = $query->fetch()){ ?>
            <div class="news">
                <div class="data_news"><?=$article["dt"]; ?></div>
                <div class="title_news"><?=$article["title"]; ?></div>
                <div class="announce_news"><?=$article["announce"]; ?></div>
                <a href="/page.php?id=<?=$article['id']; ?>" class="a_style_button">
                    <div class="button_news" <?php $_GET['pagenow'] = $page; ?>>
                        Подробнее<div class="arrow_button"></div>
                    </div>
                </a>
            </div>
            <?php } ?>
        </section>
        <section class="pagination">
            <ul class="pagination_item">
                <?php
                            function navigation($page, $count, $str_page, $show_link)
                            {
                            if ($str_page == 1) return false;
                            $sperator = ' ';
                            $begin = $page - intval($show_link / 2);

                            if ($str_page <= $show_link);

                            if (($begin >= 1) && ($str_page - $show_link >= 1)) 
                                {
                                    echo '<a class="pagination_list_1" href=index.php?page=1> <div class="arrow_first_page"></div> </a> ';
                                }

                            for ($j = 0; $j <= $show_link; $j++)
                                {
                                $i = $begin + $j;
                            if ($i < 1) continue;
                            if ($i > $str_page) break;
                            if ($i == $page) 
                                    {
                                        echo ' <a class="pagination_list active" ><b>'.$i.'</b></a> ';
                                    } 
                                else
                                    {
                                        echo ' <a class="pagination_list" href=index.php?page='.$i.'>'.$i.'</a> ';
                                    }
                                }
                            if ($begin + $show_link <= $str_page) 
                                {
                                    echo ' <a class="pagination_list_1" href=index.php?page='.$str_page.'> <div class="arrow_last_page"></div> </a>';
                                }
                            return true;
                            }

                            if (empty($_GET['page']) || ($_GET['page'] <= 0)) 
                                {
                                    $page = 1;
                                } 
                            else 
                                {
                                    $page = (int) $_GET['page'];
                                }      
                            navigation($page, $count, $str_page, 2);
                        ?>

            </ul>
        </section>
    </main>
    <?php
    include_once("footer.php");
?>
</body>

</html>