<!-- === BEGIN FOOTER === -->
<div id="base">
    <div class="container bottom-border padding-vert-30">
        <div class="row">
            <!-- Disclaimer -->
            <?php
            $contacts = mysqli_query($connection, "SELECT * FROM `main` ORDER BY id DESC");
            $contact = mysqli_fetch_assoc($contacts);
            ?>
            <div class="col-md-4">
                <h3 class="class margin-bottom-10">Информация</h3>
                <p><?php echo $contact['info']; ?></p>
            </div>
            <!-- End Disclaimer -->
            <!-- Contact Details -->
            <div class="col-md-4 margin-bottom-20">
                <h3 class="margin-bottom-10">Контактная информация</h3>
                <p>
                    <span class="fa-phone">Telephone:</span><?php echo $contact['phone']; ?>
                    <br>
                    <span class="fa-envelope">Email:</span>
                    <a href="mailto:info@example.com"><?php echo $contact['mail']; ?></a>
                    <br>
                    <span class="fa-link">Website:</span>
                    <a href="http://www.example.com"><?php echo $contact['Eaddress']; ?></a>
                    <br>
                    <span class="fa-building">Address:</span>
                    <a href="mailto:info@example.com"><?php echo $contact['address']; ?></a>
                </p>

            </div>
            <!-- End Contact Details -->
            <!-- Sample Menu -->
            <div class="col-md-4 margin-bottom-20">
                <h3 class="margin-bottom-10">CATEGORIES</h3>
                <?php
                $categories = mysqli_query($connection, "SELECT * FROM `articles_categories`")
                ?>
                <ul class="menu">
                    <?php
                    while($category = mysqli_fetch_assoc($categories))
                    {
                        ?>
                        <li>
                            <a class="fa-tasks" href="categories.php?category=<?php echo $category['id'];?>"><?php echo $category['title'];?></a>
                        </li>
                        <?php
                    }
                    ?>
                </ul>
                <div class="clearfix"></div>
            </div>
            <!-- End Sample Menu -->
        </div>
    </div>
</div>
<!-- Footer -->
<div id="footer" class="background-grey">
    <div class="container">
        <div class="row">

            <!-- Copyright -->
            <div id="copyright" class="col-md-4">
                <p class="pull-right">Смиренный игумен Пафнутий руку приложил</p>
            </div>
            <!-- End Copyright -->
        </div>
    </div>
</div>
<!-- End Footer -->
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
</div>
</body>
</html>
<!-- === END FOOTER === -->