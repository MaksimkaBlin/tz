<?php
include "header.php";
?>
    <!-- === BEGIN CONTENT === -->
    <div id="content">
        <div class="container background-white">
            <div class="row margin-vert-30">
                <!-- Main Column -->
                <div class="col-md-9">
                    <!-- Blog Post -->
                    <div class="blog-post padding-bottom-20">
                        <!-- Blog Item Header -->
                        <div class="blog-item-header">
                            <!-- Title -->

                            <?php
                            $categories = mysqli_query($connection, "SELECT * FROM `articles_categories` WHERE id=".(int)$_GET['category']);
                            $category = mysqli_fetch_assoc($categories);
                            ?>
                            <h2>
                                <a href="#">
                                    <?php echo $category['title'];?></a>
                            </h2>
                            <div class="clearfix"></div>

                        </div>
                            <!-- End Title -->
                            <?php
                            $articles = mysqli_query($connection, "SELECT * FROM `articles` WHERE category_id=".(int)$_GET['category']);
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
                    <!-- End Blog Item -->

                    <!-- Pagination -->
                    <ul class="pagination">
                        <li>
                            <a href="#">&laquo;</a>
                        </li>
                        <li class="active">
                            <a href="#">1</a>
                        </li>
                        <li>
                            <a href="#">2</a>
                        </li>
                        <li>
                            <a href="#">3</a>
                        </li>
                        <li class="disabled">
                            <a href="#">4</a>
                        </li>
                        <li>
                            <a href="#">5</a>
                        </li>
                        <li>
                            <a href="#">&raquo;</a>
                        </li>
                    </ul>
                    <!-- End Pagination -->
                </div>
                <!-- End Main Column -->
                <!-- Side Column -->
                <div class="col-md-3">
                    <!-- Blog Tags -->
                    <div class="blog-tags">
                        <h3>Tags</h3>
                        <ul class="blog-tags">
                            <li>
                                <a href="#" class="blog-tag">HTML</a>
                            </li>
                            <li>
                                <a href="#" class="blog-tag">CSS</a>
                            </li>
                            <li>
                                <a href="#" class="blog-tag">JavaScript</a>
                            </li>
                            <li>
                                <a href="#" class="blog-tag">jQuery</a>
                            </li>
                            <li>
                                <a href="#" class="blog-tag">PHP</a>
                            </li>
                            <li>
                                <a href="#" class="blog-tag">Ruby</a>
                            </li>
                            <li>
                                <a href="#" class="blog-tag">CoffeeScript</a>
                            </li>
                            <li>
                                <a href="#" class="blog-tag">Grunt</a>
                            </li>
                            <li>
                                <a href="#" class="blog-tag">Bootstrap</a>
                            </li>
                            <li>
                                <a href="#" class="blog-tag">HTML5</a>
                            </li>
                        </ul>
                    </div>
                    <!-- End Blog Tags -->
                    <!-- Latest news -->
                    <div class="recent-posts">
                        <h3>Latest news</h3>
                        <ul class="posts-list margin-top-10">
                            <?php
                            $articles = mysqli_query($connection, "SELECT * FROM `articles` ORDER BY id DESC LIMIT 5");

                            while($article = mysqli_fetch_assoc($articles))
                            {
                                ?>
                                <li>
                                    <div class="recent-post">
                                        <a href="article.php?id=<?php echo $article['id'];?>">
                                            <img class="pull-left" src="images/<?php echo $article['image'];?>" alt="thumb1">
                                        </a>
                                        <a href="article.php?id=<?php echo $article['id'];?>" class="posts-list-title"><?php echo $article['title'];?></a>
                                        <br>
                                        <span class="recent-post-date">
                                                <?php echo $article['publication_date'];?>
                                            </span>
                                    </div>
                                    <div class="clearfix"></div>
                                </li>
                                <?php
                            }
                            ?>


                        </ul>
                    </div>
                    <!-- End Latest news -->
                </div>
                <!-- End Side Column -->
            </div>
        </div>
    </div>
    <!-- === END CONTENT === -->

<?php
include "footer.php";
?>