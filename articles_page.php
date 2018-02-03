<?php
require "includes/config.php";
include "admin_header.php";
?>

<div id="portfolio" class="bottom-border-shadow">
    <div class="container bottom-border">
        <div class="row padding-top-40">
    <button type="text"><a href="article_add.php">Создать новую cтатью</a></button><hr>
    <div class="blog-post padding-bottom-20">
        <?php
        $articles = mysqli_query($connection, "SELECT * FROM `articles` ORDER BY id DESC");
        if($articles->num_rows != 0) {
            while ($article = mysqli_fetch_assoc($articles)) {
                ?>
                <!-- Blog Item Body -->
                <div class="blog">
                    <div class="clearfix"></div>
                    <div class="blog-post-body row margin-top-15">

                        <div class="col-md-5">
                            <img class="margin-bottom-20" src="images/<?php echo $article['image']; ?>"
                                 alt="thumb1">
                        </div>
                        <div class="col-md-7">
                            <h2><?php echo $article['title']; ?></h2>
                        </div>
                        <div class="col-md-7">
                            <p><?php echo mb_substr($article['text'], 0, 200, 'utf-8'); ?></p>
                            <!-- Read More -->
                            <a href="article.php?id=<?php echo $article['id']; ?>"
                               class="btn btn-primary">
                                Read More
                                <i class="icon-chevron-right readmore-icon"></i>
                            </a>
                            <button type="text"><a href="article_delete.php?id=<?php echo $article['id']; ?>">Удалить статью</a></button>
                            <button type="text"><a href="article_add.php?id=<?php echo $article['id']; ?>">Редактировать статью</a></button>
                            <!-- End Read More -->
                        </div>
                    </div>
                </div>
                <!-- End Blog Item Body -->
                <?php
            }
        } else {
            echo 'Статьи не найдены';
        }
        ?>
        <!-- End Blog Item Header -->

    </div>
        </div>
    </div>
    </div>
    
    <!-- JS -->
    <script type="text/javascript" src="assets/js/jquery.min.js" type="text/javascript"></script>
    <script type="text/javascript" src="assets/js/bootstrap.min.js" type="text/javascript"></script>
    <script type="text/javascript" src="assets/js/scripts.js"></script>
    <!-- Isotope - Portfolio Sorting -->
    <script type="text/javascript" src="assets/js/jquery.isotope.js" type="text/javascript"></script>
    <!-- Mobile Menu - Slicknav -->
    <script type="text/javascript" src="assets/js/jquery.slicknav.js" type="text/javascript"></script>
    <!-- Animate on Scroll-->
    <script type="text/javascript" src="assets/js/jquery.visible.js" charset="utf-8"></script>
    <!-- Sticky Div -->
    <script type="text/javascript" src="assets/js/jquery.sticky.js" charset="utf-8"></script>
    <!-- Slimbox2-->
    <script type="text/javascript" src="assets/js/slimbox2.js" charset="utf-8"></script>
    <!-- Modernizr -->
    <script src="assets/js/modernizr.custom.js" type="text/javascript"></script>
    <!-- End JS -->




