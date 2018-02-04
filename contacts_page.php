<?php
require "includes/config.php";
include "admin_header.php";
?>

<div id="portfolio" class="bottom-border-shadow">
    <div class="container bottom-border">
        <div class="row padding-top-40">
            <button type="text"><a href="contact_add.php">Создать новые данные</a></button>
            <hr>
            <div class="blog-post padding-bottom-20">
                <?php
                $contacts = mysqli_query($connection, "SELECT * FROM `main` ORDER BY id DESC");
                if ($contacts->num_rows != 0) {
                    while ($contact = mysqli_fetch_assoc($contacts)) {
                        ?>
                        <!-- Blog Item Body -->
                        <div class="blog">
                            <div class="clearfix"></div>
                            <div class="blog-post-body row margin-top-15">

                                <div class="col-md-5">
                                    <img class="margin-bottom-20" src="images/<?php echo $contact['image']; ?>"
                                         alt="thumb1">
                                </div>
                                <div class="col-md-7">
                                    <h2>Контактный телефон: <?php echo $contact['phone']; ?></h2>
                                </div>
                                <div class="col-md-7">
                                    <h2>Электронная почта: <?php echo $contact['mail']; ?></h2>
                                </div>
                                <div class="col-md-7">
                                    <h2>Электронный адрес: <?php echo $contact['Eaddress']; ?></h2>
                                </div>
                                <div class="col-md-7">
                                    <h2>Адрес: <?php echo $contact['address']; ?></h2>
                                </div>

                                <div class="col-md-7">
                                    <p>Информация: <?php echo mb_substr($contact['info'], 0, 200, 'utf-8'); ?></p>

                                    <button type="text"><a href="contact_delete.php?id=<?php echo $contact['id']; ?>">Удалить
                                            данные</a></button>
                                    <button type="text"><a href="contact_add.php?id=<?php echo $contact['id']; ?>">Редактировать
                                            данные</a></button>

                                </div>
                            </div>
                        </div>
                        <!-- End Blog Item Body -->
                        <?php
                    }
                } else {
                    echo 'Данные не найдены';
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




