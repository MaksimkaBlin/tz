<!-- === BEGIN CONTENT === -->
<div id="slideshow" class="bottom-border-shadow">
    <div class="container no-padding background-white bottom-border">
        <div class="row">
            <!-- Carousel Slideshow -->
            <div id="carousel-example" class="carousel slide" data-ride="carousel">
                <!-- Carousel Indicators -->
                <ol class="carousel-indicators">
                    <li data-target="#carousel-example" data-slide-to="0" class="active"></li>
                    <li data-target="#carousel-example" data-slide-to="1"></li>
                    <li data-target="#carousel-example" data-slide-to="2"></li>
                </ol>
                <div class="clearfix"></div>
                <!-- End Carousel Indicators -->
                <!-- Carousel Images -->
                <div class="carousel-inner">
                    <?php
                    $banners = mysqli_query($connection, "SELECT * FROM `banners`");
                    $banner = mysqli_fetch_assoc($banners)
                    ?>
                    <div class="item active">
                        <img src="images/<?php echo $banner['image']; ?>">
                    </div>
                    <?php
                    while ($banner = mysqli_fetch_assoc($banners)) {
                        ?>
                        <div class="item">
                            <img src="images/<?php echo $banner['image']; ?>">
                        </div>
                        <?php
                    } ?>
                </div>
                <!-- End Carousel Images -->
                <!-- Carousel Controls -->
                <a class="left carousel-control" href="#carousel-example" data-slide="prev">
                    <span class="glyphicon glyphicon-chevron-left"></span>
                </a>
                <a class="right carousel-control" href="#carousel-example" data-slide="next">
                    <span class="glyphicon glyphicon-chevron-right"></span>
                </a>
                <!-- End Carousel Controls -->
            </div>
            <!-- End Carousel Slideshow -->
        </div>
    </div>
</div>
<!--тут были виджиты которые теперь в админке -->
<div id="content" class="bottom-border-shadow">
    <div class="container background-white bottom-border">
        <div class="row margin-vert-30">
            <!-- Main Text -->
            <?php
            $articles = mysqli_query($connection, "SELECT * FROM `articles` ORDER BY id DESC ");
            $article = mysqli_fetch_assoc($articles);
            ?>
            <div class="col-md-6">
                <h2>Текст самой последней статьи</h2>
                <h2><?php echo $article['title']; ?></h2>
                <p><?php echo $article['text']; ?></p>
            </div>
            <!-- End Main Text -->

        </div>
    </div>
</div>
<!-- Portfolio -->
<div id="portfolio" class="bottom-border-shadow">
    <div class="container bottom-border">
        <div class="row padding-top-40">
            <ul class="portfolio-group">
                <!-- Portfolio Item -->
                <?php
                $categories = mysqli_query($connection, "SELECT * FROM `articles_categories`");

                while ($category = mysqli_fetch_assoc($categories)) {
                    ?>
                    <li class="portfolio-item col-sm-4 col-xs-6 margin-bottom-40">
                        <a href="categories.php?category=<?php echo $category['id']; ?>">
                            <figure class="animate fadeInLeft">
                                <img alt="image" src="images/<?php echo $category['image']; ?>">
                                <figcaption>
                                    <h3><?php echo $category['title']; ?></h3>
                                </figcaption>
                            </figure>
                        </a>
                    </li>
                    <?php
                }
                ?>
                <!-- //Portfolio Item// -->

            </ul>
        </div>
    </div>
</div>
<!-- End Portfolio -->
<!-- === END CONTENT === -->