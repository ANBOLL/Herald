<header>
    <a href="index.php" class="header_a">
        <div class="logotype">
            <img src="img/logo 1.svg" alt="logo" class="logo_image">
            <p class="text_logo">Галактический<br>вестник</p>
        </div>
    </a>
    <div class="navigation">
        <ul class="header_item">
            <?php 
                include_once("menu.php");

                foreach ($arr as $key => $value){
                    $pageName = $value["title"];

                    if ($key == $code){?>
            <li class="header_list active">

                <a class="header_a" href="
                        <?
                        if($pageName == "Главная") { echo "index.php" ; } else if($pageName=="Новости" ) { echo "" ; }
                    else if($pageName=="Связь" ) { echo "feedback.php" ; } ?>
                    ">
                    <h4><?=$pageName ?></h4>
                </a>
            </li>
            <?php 
                    } else{ ?>
            <?php if($pageName != "Новости") { ?>

            <li class="header_list">
                <a class="header_a" href="
                        <?
                        if($pageName == "Главная") { echo "index.php" ; } else if($pageName=="Связь" ) {
                    echo "feedback.php" ; } ?>
                    ">
                    <h4>
                        <?php
                        if($pageName != "Новости")
                        { echo $pageName; }
                        ?>
                    </h4>
                </a>
            </li>
            <?php } 
                    }
                }
            ?>
        </ul>
    </div>
</header>