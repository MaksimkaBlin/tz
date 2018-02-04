<?php
require "includes/config.php";
include "admin_header.php";
?>

<!-- Portfolio -->
<div id="portfolio" class="bottom-border-shadow">
    <div class="container bottom-border">
        <div class="row padding-top-40">

            <button type="text"><a href="banner_add.php">Создать новый баннер</a></button>
            <hr>

            <ul class="portfolio-group">

                <!-- Portfolio Item -->
                <?php
                $banners = mysqli_query($connection, "SELECT * FROM `banners`");

                while ($banner = mysqli_fetch_assoc($banners)) {
                    ?>
                    <li class="portfolio-item col-sm-4 col-xs-6 margin-bottom-40">

                        <figure class="animate fadeInLeft">
                            <img alt="image" src="images/<?php echo $banner['image']; ?>">
                            <figcaption>
                                <h3><?php echo $banner['title']; ?></h3>
                            </figcaption>
                        </figure>

                        <button type="text"><a href="banner_delete.php?id=<?php echo $banner['id']; ?>">Удалить
                                баннер</a></button>
                        <button type="text"><a href="banner_add.php?id=<?php echo $banner['id']; ?>">Редактировать
                                баннер</a></button>
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




